<?php
    include "connessione.php";
    $email = strtolower($_POST["usernameLogin"]);
    $password = $_POST["passwordLogin"];

    $stmt = $conn->prepare("SELECT * FROM cliente WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $password_database = $row["password"];
        if(password_verify($password,$password_database)){
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["nome"] = $row["nome"];
            $_SESSION["cognome"] = $row["cognome"];
            $_SESSION["codice_fiscale"] = $row["codice_fiscale"];
            $_SESSION["loggedin"] = true;
            $_SESSION["tipo_utente"] = $row["tipo_utente"];
            if($row["tipo_utente"] == "admin") header("Location: admin/admin.php");
            else header("Location: homepage.php");
            exit;
        }
    }
    session_start();
    $_SESSION["error"] = "Credenziali errate";
    header("Location: login.php");
    
?>