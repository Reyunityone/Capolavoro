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
    <div class="navbar bg-base-200 fixed top-0 left-0 z-50">
        <div class="navbar-start">
            <a class="btn btn-ghost text-xl" style="font-family: Pacifico;">Paper Travels</a>
        </div>
        <div class="navbar-center">
            <button class="btn btn-ghost" onclick="window.location.href='admin.php'">Torna alla gestione</button>
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
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mt-28">Visualizza e ricerca dati</h1>
        <div class="flex my-6">
            <input type="text" id="searchInput" class="w-full input input-bordered cursor-text" placeholder="Cerca...">
        </div>
        <?php
        // Connessione al database
        include "../connessione.php";

        // Funzione per creare le card
        function createCard($title, $content)
        {
            echo "<div class='card shadow-lg mb-6'>";
            echo "<div class='card-body'>";
            echo "<h2 class='card-title text-xl font-bold'>$title</h2>";
            echo "<p>$content</p>";
            echo "</div>";
            echo "</div>";
        }

        // Recupera e visualizza i dati dalla tabella 'cliente'
        echo "<h2 class='text-2xl font-bold mb-4'>Clienti</h2>";
        $result = $conn->query("SELECT * FROM cliente");
        while ($row = $result->fetch_assoc()) {
            createCard(
                "Cliente: " . $row['nome'] . " " . $row['cognome'],
                "Codice Fiscale: " . $row['codice_fiscale'] . "<br>" .
                "Indirizzo: " . $row['via'] . " " . $row['numero_civico'] . ", " . $row['citta'] . ", " . $row['provincia'] . "<br>" .
                "Telefono: " . $row['numero_telefono'] . "<br>" .
                "Email: " . $row['email']
            );
        }

        // Recupera e visualizza i dati dalla tabella 'destinazioni'
        echo "<h2 class='text-2xl font-bold mb-4'>Destinazioni</h2>";
        $result = $conn->query("SELECT * FROM destinazioni");
        while ($row = $result->fetch_assoc()) {
            createCard(
                "Destinazione: " . $row['destinazione'],
                "ID Viaggio: " . $row['id_viaggio'] . "<br>" .
                "Mezzo: " . $row['mezzo']
            );
        }

        // Recupera e visualizza i dati dalla tabella 'prenotazione'
        echo "<h2 class='text-2xl font-bold mb-4'>Prenotazioni</h2>";
        $result = $conn->query("SELECT * FROM prenotazione");
        while ($row = $result->fetch_assoc()) {
            createCard(
                "Prenotazione ID: " . $row['id_prenotazione'],
                "Data Partenza: " . $row['data_partenza'] . "<br>" .
                "Data Ritorno: " . $row['data_ritorno'] . "<br>" .
                "Viaggio: " . $row['viaggio']
            );
        }

        // Recupera e visualizza i dati dalla tabella 'viaggio'
        echo "<h2 class='text-2xl font-bold mb-4'>Viaggi</h2>";
        $result = $conn->query("SELECT * FROM viaggio");
        while ($row = $result->fetch_assoc()) {
            createCard(
                "Viaggio ID: " . $row['id_viaggio'],
                "Partenza: " . $row['partenza'] . "<br>" .
                "Costo: " . $row['costo'] . " EUR<br>" .
                "Tipo Sistemazione: " . $row['tipo_sistemazione']
            );
        }

        $conn->close();
        ?>
        <svg class="trail" viewBox="0 0 400 400">
            <path d="M 100 100 L 200 200 L 300 100" />
        </svg>
        <script src="../trail.js"></script>
        <script>
            document.getElementById("searchInput").addEventListener("input", handleSearch);

            function handleSearch() {
                let searchValue = this.value.toLowerCase();
                let cards = document.querySelectorAll(".card");
                cards.forEach(card => {
                    let cardText = card.textContent.toLowerCase();
                    if (cardText.includes(searchValue)) {
                        card.style.display = "block";
                    } else {
                        card.style.display = "none";
                    }
                });
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