<?php
    $dbhost = "localhost";
    $dbname="agenzia_viaggi";
    $dbuser="root";
    $dbpass="";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        die("Connessione fallita: ". mysqli_connect_error());
    }
?>