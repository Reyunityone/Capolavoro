<!DOCTYPE html>
<html lang="en" data-theme="cmyk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../homepage.css">
    <style>
        body {
            background-image: none !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="transition-colors duration-200"
    style='background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("https://wallpaperswide.com/download/travel_to_norway_s_lofoten_islands-wallpaper-1920x1080.jpg");'>
    <?php
        session_start();
        if($_SESSION["tipo_utente"] == "utente") header("Location: ../homepage.php");
    ?>
    <div class="navbar bg-base-200 fixed top-0 left-0">
        <div class="navbar-start">
            <form action="../logout.php" method="post">
                <button class="btn btn-ghost text-xl" style="font-family: Pacifico;" name="logout">Paper Travels</button>
            </form>
        </div>
        <div class="navbar-center">
            <button class="btn btn-ghost" onclick="showViaggio()">Gestione Viaggi</button>
            <button class="btn btn-ghost" onclick="showPrenotazione()">Gestione Prenotazioni</button>
            <button class="btn btn-ghost" onclick="showDestinazione()">Gestione Destinazioni</button>
            <a class="btn btn-ghost" href="visualizzaAll.php">Visualizza tutto</a>
        </div>
        <div class="navbar-end">
            <button class="btn btn-ghost" id="change-theme">
                <label for="change-theme" id="sun" class="hidden"><svg viewBox="0 0 384 512" height="1em"
                        xmlns="http://www.w3.org/2000/svg" class="moon stroke-white fill-white">
                        <path
                            d="M223.5 32C100 32 0 132.3 0 256S100 480 223.5 480c60.6 0 115.5-24.2 155.8-63.4c5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6c-96.9 0-175.5-78.8-175.5-176c0-65.8 36-123.1 89.3-153.3c6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z">
                        </path>
                    </svg></label>
                <label for="change-theme" id="moon" class=""><svg viewBox="0 0 512 512" height="1em"
                        xmlns="http://www.w3.org/2000/svg" class="sun">
                        <path
                            d="M361.5 1.2c5 2.1 8.6 6.6 9.6 11.9L391 121l107.9 19.8c5.3 1 9.8 4.6 11.9 9.6s1.5 10.7-1.6 15.2L446.9 256l62.3 90.3c3.1 4.5 3.7 10.2 1.6 15.2s-6.6 8.6-11.9 9.6L391 391 371.1 498.9c-1 5.3-4.6 9.8-9.6 11.9s-10.7 1.5-15.2-1.6L256 446.9l-90.3 62.3c-4.5 3.1-10.2 3.7-15.2 1.6s-8.6-6.6-9.6-11.9L121 391 13.1 371.1c-5.3-1-9.8-4.6-11.9-9.6s-1.5-10.7 1.6-15.2L65.1 256 2.8 165.7c-3.1-4.5-3.7-10.2-1.6-15.2s6.6-8.6 11.9-9.6L121 121 140.9 13.1c1-5.3 4.6-9.8 9.6-11.9s10.7-1.5 15.2 1.6L256 65.1 346.3 2.8c4.5-3.1 10.2-3.7 15.2-1.6zM160 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z">
                        </path>
                    </svg></label>
            </button>
        </div>
    </div>

    <div class="container w-screen flex flex-col h-screen overflow-hidden items-center justify-center">
        <?php

        if (isset($_SESSION['status']) && isset($_SESSION['message'])) {
            $status = $_SESSION['status'];
            $message = $_SESSION['message'];

            echo "<div class='message $status'>$message</div>";

            // Cancella i messaggi dalla sessione
            unset($_SESSION['status']);
            unset($_SESSION['message']);
        }
        ?>
        <div class="text-2xl mt-24" id="viaggioText">Gestione viaggi</div>
        <div class="text-2xl mt-24 hidden" id="prenotazioneText">Gestione prenotazioni</div>
        <div class="text-2xl mt-24 hidden" id="destinazioneText">Gestione destinazioni</div>
        <form action="viaggi.php" method="post"
            class="w-4/5 border-2 border-transparent rounded-xl shadow-xl h-3/4 mt-12 flex flex-col items-center"
            id="viaggio">
            <label class="label" for="partenza">Partenza:</label>
            <input class="w-3/4 input cursor-text input-bordered" type="text" id="partenza" name="partenza"><br>

            <label class="label" for="costo">Costo:</label>
            <input class="w-3/4 input cursor-text input-bordered" type="number" step="0.01" id="costo" name="costo"><br>

            <label class="w-3/4 label" for="tipo_sistemazione">Tipo di Sistemazione:</label>
            <select class="w-3/4 select cursor-text select-bordered" type="text" id="tipo_sistemazione"
                name="tipo_sistemazione"><br>
                <option value="Hotel">Hotel(camera e colazione)</option>
                <option value="Appartamento">Appartamento</option>
                <option value="Mezza pensione">Mezza pensione</option>
                <option value="All-inclusive">All-inclusive</option>
            </select>
            <label class="label" for="idViaggio">Id(solo per modifica e cancellazione):</label>
            <input class="w-3/4 input cursor-text input-bordered" type="number" step="1" id="idViaggio"
                name="idViaggio"><br>
            <div class="flex mt-auto mb-12">
                <button class="btn btn-primary mx-12" value="inserimento" name="send">
                    Inserisci
                </button>
                <button class="btn btn-primary mx-12" value="rimozione" name="send">
                    Rimuovi
                </button>
                <button class="btn btn-primary mx-12" value="modifica" name="send">
                    Modifica
                </button>
            </div>
        </form>
        <form action="prenotazione.php" method="post"
            class=" hidden w-4/5 border-2 border-transparent rounded-xl shadow-xl h-3/4 mt-12 flex flex-col items-center"
            id="prenotazione">
            <label class="label" for="data_partenza">Data Partenza:</label>
            <input class="w-3/4 input cursor-text input-bordered" type="date" id="data_partenza" name="data_partenza"
                required><br>

            <label class="label" for="data_ritorno">Data Ritorno:</label>
            <input class="w-3/4 input cursor-text input-bordered" type="date" id="data_ritorno" name="data_ritorno"
                required><br>
                
            <label class="label" for="viaggio">ID Viaggio:</label>
            <input class="w-3/4 input cursor-text input-bordered" type="number" id="viaggio" name="viaggio"
                required><br>

            <label class="label" for="idPrenotazione">ID Prenotazione (solo per modifica e cancellazione):</label>
            <input class="w-3/4 input cursor-text input-bordered" type="number" step="1" id="idPrenotazione"
                name="idPrenotazione"><br>

            <div class="flex mt-auto mb-12">
                <button class="btn btn-primary mx-12" value="inserimento" name="send">Inserisci</button>
                <button class="btn btn-primary mx-12" value="rimozione" name="send">Rimuovi</button>
                <button class="btn btn-primary mx-12" value="modifica" name="send">Modifica</button>
            </div>
        </form>
        <form action="destinazioni.php" method="post"
            class="hidden w-4/5 border-2 border-transparent rounded-xl shadow-xl h-3/4 mt-12 flex flex-col items-center"
            id="destinazione">
            <label class="label" for="id_viaggio">ID Viaggio:</label>
            <input class="w-3/4 input cursor-text input-bordered" type="number" id="id_viaggio" name="id_viaggio"
                required><br>

            <label class="label" for="destinazione">Destinazione:</label>
            <input class="w-3/4 input cursor-text input-bordered" type="text" id="destinazione" name="destinazione"
                required><br>

            <label class="label" for="mezzo">Mezzo:</label>
            <input class="w-3/4 input cursor-text input-bordered" type="text" id="mezzo" name="mezzo"><br>

            <div class="flex mt-auto mb-12">
                <button class="btn btn-primary mx-12" value="inserimento" name="send">Inserisci</button>
                <button class="btn btn-primary mx-12" value="rimozione" name="send">Rimuovi</button>
                <button class="btn btn-primary mx-12" value="modifica" name="send">Modifica</button>
            </div>
        </form>
    </div>
    <svg class="trail" viewBox="0 0 400 400">
        <path d="M 100 100 L 200 200 L 300 100" />
    </svg>
    <script src="../trail.js"></script>
    <script>
        function showViaggio() {
            hideAllForms();
            document.getElementById("viaggio").classList.remove("hidden");
            document.getElementById("viaggioText").classList.remove("hidden");
        }

        function showPrenotazione() {
            hideAllForms();
            document.getElementById("prenotazione").classList.remove("hidden");
            document.getElementById("prenotazioneText").classList.remove("hidden");
        }

        function showCliente() {
            hideAllForms();
            document.getElementById("cliente").classList.remove("hidden");
            document.getElementById("clienteText").classList.remove("hidden");
        }

        function showDestinazione() {
            hideAllForms();
            document.getElementById("destinazione").classList.remove("hidden");
            document.getElementById("destinazioneText").classList.remove("hidden");
        }

        function hideAllForms() {
            document.getElementById("viaggio").classList.add("hidden");
            console.log(document.getElementById("prenotazione"));
            document.getElementById("prenotazione").classList.add("hidden");
            document.getElementById("destinazione").classList.add("hidden");

            document.getElementById("viaggioText").classList.add("hidden");
            document.getElementById("prenotazioneText").classList.add("hidden");
            document.getElementById("destinazioneText").classList.add("hidden");
        }
        sessionStorage.getItem("tema") === "cmyk" ? changeDark() : changeLight();
        document.getElementById("change-theme").addEventListener('click', () => {
            if (sun.classList.contains("hidden")) {
                changeLight();
            }
            else {
                changeDark();
            }


        });

        function changeDark() {
            const sun = document.getElementById("sun");
            const moon = document.getElementById("moon");
            moon.classList.remove("hidden");
            sun.classList.add("hidden");
            document.querySelector("html").setAttribute("data-theme", "cmyk");
            sessionStorage.setItem("tema", "cmyk");
        }
        function changeLight() {
            const sun = document.getElementById("sun");
            const moon = document.getElementById("moon");
            sun.classList.remove("hidden");
            moon.classList.add("hidden");
            document.querySelector("html").setAttribute("data-theme", "dim");
            sessionStorage.setItem("tema", "dim");
        }
    </script>
</body>

</html>