<?php
session_start();
include "../connessione.php";

$tipo = $_POST["send"];
$id_viaggio = $_POST["id_viaggio"];
$destinazione = $_POST["destinazione"];
$mezzo = $_POST["mezzo"];

try {
    switch ($tipo) {
        case "inserimento":
            inserimento($conn, $id_viaggio, $destinazione, $mezzo);
            break;
        case "modifica":
            modifica($conn, $id_viaggio, $destinazione, $mezzo);
            break;
        case "rimozione":
            rimozione($conn, $id_viaggio, $destinazione);
            break;
        default:
            throw new Exception("Tipo di operazione non valido");
    }
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Operazione completata con successo';
} catch (Exception $e) {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = $e->getMessage();
}

header("Location: admin.php");
exit();

function inserimento($conn, $id_viaggio, $destinazione, $mezzo)
{
    $stmt = $conn->prepare("INSERT INTO destinazioni (id_viaggio, destinazione, mezzo) VALUES (?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Preparazione dello statement fallita: " . $conn->error);
    }

    $stmt->bind_param("iss", $id_viaggio, $destinazione, $mezzo);
    if (!$stmt->execute()) {
        throw new Exception("Esecuzione dello statement fallita: " . $stmt->error);
    }

    $stmt->close();
}

function modifica($conn, $id_viaggio, $destinazione, $mezzo)
{
    $stmt = $conn->prepare("UPDATE destinazioni SET mezzo=? WHERE id_viaggio=? AND destinazione=?");
    if (!$stmt) {
        throw new Exception("Preparazione dello statement fallita: " . $conn->error);
    }

    $stmt->bind_param("sis", $mezzo, $id_viaggio, $destinazione);
    if (!$stmt->execute()) {
        throw new Exception("Esecuzione dello statement fallita: " . $stmt->error);
    }

    $stmt->close();
}

function rimozione($conn, $id_viaggio, $destinazione)
{
    $stmt = $conn->prepare("DELETE FROM destinazioni WHERE id_viaggio=? AND destinazione=?");
    if (!$stmt) {
        throw new Exception("Preparazione dello statement fallita: " . $conn->error);
    }

    $stmt->bind_param("is", $id_viaggio, $destinazione);
    if (!$stmt->execute()) {
        throw new Exception("Esecuzione dello statement fallita: " . $stmt->error);
    }

    $stmt->close();
}
?>