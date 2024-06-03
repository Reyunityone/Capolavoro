<!DOCTYPE html>
<html lang="en" data-theme="cmyk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
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
    $logged_in_user = $_SESSION['codice_fiscale']; // Assuming user info is stored in session
    include "connessione.php";

    // Fetch bookings for the logged-in user
    $sql = "SELECT pr.id_prenotato, p.id_prenotazione, p.data_partenza, p.data_ritorno, v.partenza, v.costo, v.tipo_sistemazione, d.destinazione, d.mezzo 
            FROM prenotazione p
            JOIN viaggio v ON p.viaggio = v.id_viaggio
            JOIN destinazioni d ON v.id_viaggio = d.id_viaggio
            JOIN prenotato pr ON p.id_prenotazione = pr.id_prenotazione
            WHERE pr.cliente = '$logged_in_user'";

    $result = $conn->query($sql);
    ?>

    <div class="navbar bg-base-200 fixed top-0 left-0">
        <div class="flex-none">
            <div class="dropdown">
                <button class="btn btn-square btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-5 h-5 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="homepage.php">Homepage</a></li>
                    <li><a href="riepilogo.php">Riepilogo</a></li>
                    <li>
                        <form action="logout.php" method="POST">
                            <button type="submit" name="logout" class="">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex-1">
            <a class="btn btn-ghost text-xl" style="font-family: Pacifico;">Paper Travels</a>
        </div>
        <div class="flex-none">
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

    <div class="container mx-auto mt-20 p-4">
        <h2 class="text-2xl font-bold mb-4">Riepilogo delle tue prenotazioni</h2>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $viaggiatori = $conn->query("SELECT * FROM viaggiatori WHERE id_prenotazione = ".$row["id_prenotato"]);
                echo '<div class="card bg-base-100 shadow-xl mb-4">';
                echo '<div class="card-body">';
                echo '<h3 class="card-title">' . $row["destinazione"] . '</h3>';
                echo '<p><strong>Partenza:</strong> ' . $row["partenza"] . '</p>';
                echo '<p><strong>Data Partenza:</strong> ' . $row["data_partenza"] . '</p>';
                echo '<p><strong>Data Ritorno:</strong> ' . $row["data_ritorno"] . '</p>';
                echo '<p><strong>Mezzo:</strong> ' . $row["mezzo"] . '</p>';
                echo '<p><strong>Costo:</strong> €' . $row["costo"] . '</p>';
                echo '<p><strong>Tipo di Sistemazione:</strong> ' . $row["tipo_sistemazione"] . '</p>';
                echo '<p><strong>Viaggiatori: </strong>';
                 while($row2 = $viaggiatori->fetch_assoc()){
                     echo "<p>".$row2["nome"]." ".$row2["cognome"]."</p>";
                 }
                echo '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p class="text-center">Non hai nessuna prenotazione.</p>';
        }
        $conn->close();
        ?>
    </div>
    <svg class="trail" viewBox="0 0 400 400">
        <path d="M 100 100 L 200 200 L 300 100" />
    </svg>
    <script src="trail.js"></script>
    <script>
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