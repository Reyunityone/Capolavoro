<?php
session_start();
include "../connessione.php";

$tipo = $_POST["send"];
$data_partenza = $_POST["data_partenza"];
$data_ritorno = $_POST["data_ritorno"];
$viaggio = $_POST["viaggio"];

try {
    switch ($tipo) {
        case "inserimento":
            inserimento($conn, $data_partenza, $data_ritorno, $viaggio);
            break;
        case "modifica":
            modifica($conn, $data_partenza, $data_ritorno, $viaggio);
            break;
        case "rimozione":
            rimozione($conn);
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

function inserimento($conn, $data_partenza, $data_ritorno, $viaggio)
{
    $stmt = $conn->prepare("INSERT INTO prenotazione (data_partenza, data_ritorno, viaggio) VALUES (?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Preparazione dello statement fallita: " . $conn->error);
    }

    $stmt->bind_param("ssi", $data_partenza, $data_ritorno, $viaggio);
    if (!$stmt->execute()) {
        throw new Exception("Esecuzione dello statement fallita: " . $stmt->error);
    }

    $stmt->close();
}

function modifica($conn, $data_partenza, $data_ritorno, $viaggio)
{
    $id = $_POST["idPrenotazione"];

    $stmt = $conn->prepare("UPDATE prenotazione SET data_partenza=?, data_ritorno=?, viaggio=? WHERE id_prenotazione=?");
    if (!$stmt) {
        throw new Exception("Preparazione dello statement fallita: " . $conn->error);
    }

    $stmt->bind_param("ssii", $data_partenza, $data_ritorno, $viaggio, $id);
    if (!$stmt->execute()) {
        throw new Exception("Esecuzione dello statement fallita: " . $stmt->error);
    }

    $stmt->close();
}

function rimozione($conn)
{
    $id = $_POST["idPrenotazione"];

    $stmt = $conn->prepare("DELETE FROM prenotazione WHERE id_prenotazione = ?");
    if (!$stmt) {
        throw new Exception("Preparazione dello statement fallita: " . $conn->error);
    }

    $stmt->bind_param("i", $id);
    if (!$stmt->execute()) {
        throw new Exception("Esecuzione dello statement fallita: " . $stmt->error);
    }

    $stmt->close();
}