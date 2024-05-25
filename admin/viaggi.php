<?php
session_start();  // Inizia la sessione
include "../connessione.php";

$tipo = $_POST["send"];
$partenza = $_POST["partenza"];
$costo = $_POST["costo"];
$sistemazione = $_POST["tipo_sistemazione"];

try {
    switch ($tipo) {
        case "inserimento":
            inserimento($conn, $partenza, $costo, $sistemazione);
            break;
        case "modifica":
            modifica($conn, $partenza, $costo, $sistemazione);
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

function inserimento($conn, $partenza, $costo, $sistemazione)
{
    if ($conn->connect_error) {
        throw new Exception("Connessione al database fallita: " . $conn->connect_error);
    }
    
    $stmt = $conn->prepare("INSERT INTO viaggio (partenza, costo, tipo_sistemazione) VALUES (?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Preparazione dello statement fallita: " . $conn->error);
    }
    
    $stmt->bind_param("sds", $partenza, $costo, $sistemazione);
    if (!$stmt->execute()) {
        throw new Exception("Esecuzione dello statement fallita: " . $stmt->error);
    }
    
    $stmt->close();
}

function modifica($conn, $partenza, $costo, $sistemazione)
{
    $id = $_POST["idViaggio"];
    
    $stmt = $conn->prepare("UPDATE viaggio SET partenza=?, costo=?, tipo_sistemazione=? WHERE id_viaggio = ?");
    if (!$stmt) {
        throw new Exception("Preparazione dello statement fallita: " . $conn->error);
    }
    
    $stmt->bind_param("sdsi", $partenza, $costo, $sistemazione, $id);
    if (!$stmt->execute()) {
        throw new Exception("Esecuzione dello statement fallita: " . $stmt->error);
    }
    
    $stmt->close();
}

function rimozione($conn)
{
    $id = $_POST["idViaggio"];
    
    $stmt = $conn->prepare("DELETE FROM viaggio WHERE id_viaggio = ?");
    if (!$stmt) {
        throw new Exception("Preparazione dello statement fallita: " . $conn->error);
    }
    
    $stmt->bind_param("i", $id);
    if (!$stmt->execute()) {
        throw new Exception("Esecuzione dello statement fallita: " . $stmt->error);
    }
    
    $stmt->close();
}
?>
