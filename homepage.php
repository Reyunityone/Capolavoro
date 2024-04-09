<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <title>Document</title>
</head>
<body>
    <svg class="trail" viewBox="0 0 400 400">
        <path d="M 100 100 L 200 200 L 300 100" />
    </svg>
    <?php
    session_start();
        echo "Ciao ".$_SESSION["nome"]." ".$_SESSION["cognome"];
    ?>
    <script src="trail.js"></script>
</body>
</html>