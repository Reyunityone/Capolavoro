<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
        <input type="checkbox" name="" id="check" aria-hidden="true" checked>
        <div class="signup">
            <form action="" method="post">
                <label for="check">Registrati</label>
                <input type="text" name="nome" placeholder="Nome" required="">
                <input type="text" name="cognome" placeholder="Cognome" required="">
                <input type="date" name="datadinascita" placeholder="Data di nascita" required="">
                <input type="text" name="cf" placeholder="Codice Fiscale" required="">
                <input type="text" name="via" placeholder="Via" required="">
                <input type="text" name="citta" placeholder="Città" required="">
                <input type="text" name="provincia" placeholder="Provincia" required="">
                <input type="tel" name="telefono" placeholder="Telefono/Cellulare" required="">
                <input type="text" name="username" placeholder="Username/E-Mail" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button>Registrati</button>
            </form>
        </div>

        <div class="login">
            <form action="loginHandler.php" method="post">
                <label for="check">Login</label>
                <input type="text" name="username" placeholder="Username/E-Mail" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button>Login</button>
            </form>
        </div>
    </div>
    <svg class="trail" viewBox="0 0 400 400">
        <path d="M 100 100 L 200 200 L 300 100" />
    </svg>
    <?php
      echo "<script>alert('Signup test')</script>";
    ?>
    <script>
        const svg = document.querySelector("svg.trail");
        const path = svg.querySelector("path");

        let points = [];
        let segments = 50;
        let mouse = {
            x: 0,
            y: 0
        }

        const moveTrail = (ev) => {
            const x = ev.clientX;
            const y = ev.clientY;

            mouse.x = x;
            mouse.y = y;

            if (points.length === 0) {
                for (let i = 0; i < segments; i++) {
                    points.push({
                        x: x,
                        y: y
                    });
                }
            }


        }

        const animate = () => {
            let startX = mouse.x;
            let startY = mouse.y;

            points.forEach((point, index) =>{
                point.x = startX;
                point.y = startY;

                let next = points[index + 1];

                if(next){
                    startX = startX - (point.x - next.x ) * 0.2;
                    startY = startY - (point.y - next.y) * 0.2;
                }
            })

            path.setAttribute("d", `M ${points.map(p => `${p.x} ${p.y}`).join(' L ')}`);

            requestAnimationFrame(animate);
        }

        const resize = () => {
            const windowWidth = window.innerWidth;
            const windowHeight = window.innerHeight;

            svg.style.width = windowWidth + "px";
            svg.style.height = windowHeight + "px";
            svg.setAttribute("viewBox", `0 0 ${windowWidth} ${windowHeight}`);
        }

        document.addEventListener("mousemove", moveTrail);
        window.addEventListener("resize", resize);
        animate();
        resize();
    </script>
</body>

</html>