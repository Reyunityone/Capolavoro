<?php
    include "connessione.php";
    $codice_fiscale = $_POST["cf"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $data_nascita = $_POST["datadinascita"];
    $via = $_POST["via"];
    $citta = $_POST["citta"];
    $provincia = $_POST["provincia"];
    $telefono = $_POST["telefono"];
    $email = strtolower($_POST["username"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $civico = $_POST["civico"];

    $stmt = $conn->prepare("INSERT INTO cliente (codice_fiscale, nome, cognome, via, numero_civico, citta, provincia, numero_telefono, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $codice_fiscale, $nome, $cognome, $via, $civico ,$citta, $provincia, $telefono, $email, $password);
    $stmt->execute();
    $stmt->close();
    header("Location:login.html");
?>