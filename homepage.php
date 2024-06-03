<!DOCTYPE html>
<html lang="en" data-theme="cmyk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="homepage.css">

  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Document</title>
</head>

<body class="transition-colors duration-200"
  style='background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("https://wallpaperswide.com/download/travel_to_norway_s_lofoten_islands-wallpaper-1920x1080.jpg");'>
  <div class="navbar bg-base-200 fixed top-0 left-0">
    <div class="flex-none">
      <div class="dropdown">
        <button class="btn btn-square btn-ghost btn-circle">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            class="inline-block w-5 h-5 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
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
  <form class="container flex items-center justify-center w-screen gap-10 bg-base-200 p-6 rounded-xl" method="POST"
    action="search_viaggi.php">
    <div class="search-component w-1/4">
      <div class="label">
        <span class="bold">Dove?</span>
      </div>
      <label class="input input-bordered flex items-center gap-2 w-full h-16 cursor-text">
        <?php
        session_start();
        echo "<input type='text' name='destinazione' class='grow cursor-text' placeholder='Dove vuoi andare, " . $_SESSION["nome"] . "?' required='' />";
        ?>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
          <path
            d="M12 20.8995L16.9497 15.9497C19.6834 13.2161 19.6834 8.78392 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.31658 8.78392 4.31658 13.2161 7.05025 15.9497L12 20.8995ZM12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13ZM12 15C9.79086 15 8 13.2091 8 11C8 8.79086 9.79086 7 12 7C14.2091 7 16 8.79086 16 11C16 13.2091 14.2091 15 12 15Z">
          </path>
        </svg>
      </label>
    </div>
    <div class="search-component w-1/4">
      <div class="label">
        <span class="bold">Chi?</span>
      </div>
      <label class="input input-bordered flex items-center gap-2 w-full h-16 cursor-text">
        <input type="number" min="1" name="nPersone" class="grow cursor-text" placeholder="Quante persone viaggeranno?"
          required='' />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
          <path
            d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z">
          </path>
        </svg>
        </svg>
      </label>
    </div>
    <div class="search-component w-1/4">
      <div class="label">
        <span class="bold">Partenza</span>
      </div>
      <label class="input input-bordered flex items-center gap-2 w-full h-16 cursor-text">
        <input type="date" name="andata" class="grow cursor-text" placeholder="Quando vuoi partire?"
          onclick="this.showPicker?.()" />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
          <path
            d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM11 13V17H6V13H11ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z">
          </path>
        </svg>
      </label>
    </div>
    <div class="search-component w-1/4">
      <div class="label">
        <span class="bold">Ritorno</span>
      </div>
      <label class="input input-bordered flex items-center gap-2 w-full h-16 cursor-text">
        <input type="date" name="ritorno" class="grow cursor-text" placeholder="Quando tornerai?"
          onclick="this.showPicker?.()" />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
          <path
            d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM11 13V17H6V13H11ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z">
          </path>
        </svg>
      </label>
    </div>
    <div class="flex flex-col justify-end h-full mt-auto mb-2 pointer">
      <button class="btn btn-circle pointer shadow-2xl btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"
          class="pointer">
          <path
            d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z">
          </path>
        </svg>
      </button>
    </div>
  </form>
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