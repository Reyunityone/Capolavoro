<?php
include "connessione.php";
session_start();
$nPersone = $_POST["submit"];
$id = $_GET["id"];
$stmt = $conn->prepare("INSERT INTO prenotato (id_prenotazione, cliente) VALUES (?, ?)");
$stmt->bind_param("is", $id, $_SESSION["codice_fiscale"]);
$stmt->execute();
$idstmt = $conn -> query("SELECT MAX(id_prenotato) as idmax FROM prenotato");
$result = $idstmt -> fetch_assoc();
$lastid = $result["idmax"];
for ($i = 1; $i <= $nPersone; $i++) {
    $cf = $_POST["codice_fiscale" . $i];
    $nome = $_POST["nome" . $i];
    $cognome = $_POST["cognome" . $i];
    $eta = $_POST["eta" . $i] == 1 ? "Adulto" : "Bambino";
    $stmt = $conn->prepare("INSERT INTO viaggiatori VALUES(?,?,?,?,?)");
    $stmt->bind_param("issss", $lastid, $cf, $nome, $cognome, $eta);
    $stmt->execute();
}
header("Location: homepage.php");