<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <h1>Paper Travels</h1>
    <?php
        session_start();
        if(isset($_SESSION["error"])){
            echo "<h2>".$_SESSION["error"]."</h2>";
            unset($_SESSION["error"]);
        }
        else if(isset($_SESSION["email"])){
            header("Location: homepage.php");
        }
    ?>
    <div class="container">
        <input type="checkbox" name="" id="check" aria-hidden="true" checked>
        <div class="signup">
            <form action="signupHandler.php" method="post">
                <label for="check">Registrati</label>
                <input type="text" name="nome" placeholder="Nome" required="">
                <input type="text" name="cognome" placeholder="Cognome" required="">
                <input type="date" name="datadinascita" placeholder="Data di nascita" required="">
                <input type="text" name="cf" placeholder="Codice Fiscale" required="" maxlength="15" min="15">
                <input type="text" name="via" placeholder="Via" required="">
                <input type="number" name="civico" placeholder="N. Civico" required="">
                <input type="text" name="citta" placeholder="Città" required="">
                <input type="text" name="provincia" placeholder="Provincia" required="">
                <input type="tel" name="telefono" placeholder="Telefono/Cellulare" required="">
                <input type="text" name="username" placeholder="E-Mail" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button>Registrati</button>
            </form>
        </div>

        <div class="login">
            <form action="loginHandler.php" method="post">
                <label for="check">Login</label>
                <input type="text" name="usernameLogin" placeholder="E-Mail" required="">
                <input type="password" name="passwordLogin" placeholder="Password" required="">
                <button>Login</button>
            </form>
        </div>
    </div>
    <svg class="trail" viewBox="0 0 400 400">
        <path d="M 100 100 L 200 200 L 300 100" />
    </svg>

    <script src="trail.js">
        
    </script>
</body>

</html>
