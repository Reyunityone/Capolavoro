<?php
    include "connessione.php";
    $destinazione = $_POST["destinazione"];
    $data_partenza = $_POST["andata"];
    $data_ritorno = $_POST["ritorno"];
    $nPersone = $_POST["nPersone"];
    echo "".$data_partenza. " ".$data_ritorno. " ".$nPersone;
    $stmt = $conn->prepare("SELECT * FROM viaggio v JOIN prenotazione p ON v.id_viaggio = p.viaggio JOIN destinazioni d ON v.id_viaggio = d.id_viaggio
    WHERE d.destinazione = ? AND p.data_partenza <= ? AND p.data_ritorno >= ?");
    $stmt->bind_param("sss", $destinazione, $data_partenza, $data_ritorno);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()){
        echo "".$row;
    }

?>