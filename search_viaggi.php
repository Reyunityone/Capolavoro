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

<body class="transition-colors duration-200 bg-base-100:important flex flex-col justify-start">
  <div class="navbar bg-base-200 sticky top-0 left-0 z-50">
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
    <form
      class="container z-50 sticky top-20 left-0 flex items-center justify-center w-screen gap-10 bg-base-200 p-6 rounded-xl"
      method="POST" action="search_viaggi.php">
      <div class="search-component w-1/4">
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
        <label class="input input-bordered flex items-center gap-2 w-full h-16 cursor-text">
          <input type="number" min="1" name="nPersone" class="grow cursor-text"
            placeholder="Quante persone viaggeranno?" required='' />
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
            <path
              d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z">
            </path>
          </svg>
          </svg>
        </label>
      </div>
      <div class="search-component w-1/4">
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
  <svg class="trail" viewBox="0 0 400 400">
    <path d="M 100 100 L 200 200 L 300 100" />
  </svg>
  <?php
  include "connessione.php";
  $destinazione = $_POST["destinazione"];
  $data_partenza = $_POST["andata"];
  $data_ritorno = $_POST["ritorno"];
  $nPersone = $_POST["nPersone"];
  $stmt = $conn->prepare("SELECT * FROM viaggio v JOIN prenotazione p ON v.id_viaggio = p.viaggio JOIN destinazioni d ON v.id_viaggio = d.id_viaggio
    WHERE d.destinazione = ? AND p.data_partenza >= ? AND p.data_ritorno <= ?");
  $stmt->bind_param("sss", $destinazione, $data_partenza, $data_ritorno);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()) {
    echo '
        <div class="card card-side bg-base-200 shadow-xl w-3/4 my-12">
        <figure><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="120" height="120" fill="currentColor"><path d="M1.94607 9.31543C1.42353 9.14125 1.4194 8.86022 1.95682 8.68108L21.043 2.31901C21.5715 2.14285 21.8746 2.43866 21.7265 2.95694L16.2733 22.0432C16.1223 22.5716 15.8177 22.59 15.5944 22.0876L11.9999 14L17.9999 6.00005L9.99992 12L1.94607 9.31543Z"></path></svg></figure>
        <div class="card-body">
          <h2 class="card-title text-primary">' . $row["partenza"] . ' - ' . ucfirst($destinazione) . '</h2>
          <div>';
    $stmt2 = $conn->prepare("SELECT destinazione, mezzo FROM destinazioni WHERE id_viaggio = ?");
    $stmt2 -> bind_param("i", $row["id_viaggio"]);
    $stmt2-> execute();
    $resultInner = $stmt2->get_result();
    $previousDestinazione = $row["partenza"];
    while($innerRow = $resultInner -> fetch_assoc()){
      switch($innerRow["mezzo"]){
        case "Aereo":
          $svg = '<span class="whitespace-nowrap">&nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12" fill="currentColor"><path d="M14 8.94737L22 14V16L14 13.4737V18.8333L17 20.5V22L12.5 21L8 22V20.5L11 18.8333V13.4737L3 16V14L11 8.94737V3.5C11 2.67157 11.6716 2 12.5 2C13.3284 2 14 2.67157 14 3.5V8.94737Z"></path></svg></span>';
          break;
        case "Treno":
          $svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12" fill="currentColor"><path d="M17.2 20L19 21.5V22H5V21.5L6.8 20H5C3.89543 20 3 19.1046 3 18V7C3 4.79086 4.79086 3 7 3H17C19.2091 3 21 4.79086 21 7V18C21 19.1046 20.1046 20 19 20H17.2ZM7 5C5.89543 5 5 5.89543 5 7V18H19V7C19 5.89543 18.1046 5 17 5H7ZM12 17C10.8954 17 10 16.1046 10 15C10 13.8954 10.8954 13 12 13C13.1046 13 14 13.8954 14 15C14 16.1046 13.1046 17 12 17ZM6 7H18V11H6V7Z"></path></svg>';
          break;
        case "Nave":
          $svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12" fill="currentColor"><path d="M4 10.4V4C4 3.44772 4.44772 3 5 3H10V1H14V3H19C19.5523 3 20 3.44772 20 4V10.4L21.0857 10.7257C21.5974 10.8792 21.8981 11.4078 21.7685 11.9261L20.2516 17.9938C20.1682 17.9979 20.0844 18 20 18C19.4218 18 18.8665 17.9019 18.3499 17.7213L19.6 12.37L12 10L4.4 12.37L5.65008 17.7213C5.13348 17.9019 4.5782 18 4 18C3.91564 18 3.83178 17.9979 3.74845 17.9938L2.23152 11.9261C2.10195 11.4078 2.40262 10.8792 2.91431 10.7257L4 10.4ZM6 9.8L12 8L18 9.8V5H6V9.8ZM4 20C5.53671 20 6.93849 19.4223 8 18.4722C9.06151 19.4223 10.4633 20 12 20C13.5367 20 14.9385 19.4223 16 18.4722C17.0615 19.4223 18.4633 20 20 20H22V22H20C18.5429 22 17.1767 21.6104 16 20.9297C14.8233 21.6104 13.4571 22 12 22C10.5429 22 9.17669 21.6104 8 20.9297C6.82331 21.6104 5.45715 22 4 22H2V20H4Z"></path></svg>';
          break;
      }
      echo $previousDestinazione." - ".$innerRow["destinazione"]. " - ".$svg."<br>";
      $previousDestinazione = $innerRow["destinazione"];
    }
    echo '</div>
          <div class="card-actions justify-end">
            <button class="btn btn-primary" value="'.$row["id_viaggio"].'">Prenota</button>
          </div>
        </div>
      </div>
      ';
  }

  ?>
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