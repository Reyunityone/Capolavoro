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

<body class="transition-colors duration-200 bg-base-100:important flex flex-col">
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
    <form class="container z-50 sticky top-20 left-0 flex items-center justify-center w-screen gap-10 bg-base-200 p-6 rounded-xl" method="POST" action="search_viaggi.php">
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
        <input type="number" min="1" name="nPersone" class="grow cursor-text" placeholder="Quante persone viaggeranno?" required='' />
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
        <input type="date" name="andata" class="grow cursor-text" placeholder="Quando vuoi partire?" onclick="this.showPicker?.()" />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
          <path
            d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM11 13V17H6V13H11ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z">
          </path>
        </svg>
      </label>
    </div>
    <div class="search-component w-1/4">
      <label class="input input-bordered flex items-center gap-2 w-full h-16 cursor-text">
        <input type="date" name="ritorno" class="grow cursor-text" placeholder="Quando tornerai?" onclick="this.showPicker?.()" />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
          <path
            d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM11 13V17H6V13H11ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z">
          </path>
        </svg>
      </label>
    </div>
    <div class="flex flex-col justify-end h-full mt-auto mb-2 pointer">
      <button class="btn btn-circle pointer shadow-2xl btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor" class="pointer" >
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
    while ($row = $result->fetch_assoc()){
        echo '
        <div class="card card-side bg-base-200 shadow-xl w-3/4 my-12">
        <div class="card-body">
          <h2 class="card-title">'.$row["partenza"].' - '.$row["destinazione"].'</h2>
          <p>Click the button to watch on Jetflix app.</p>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Prenota</button>
          </div>
        </div>
      </div>
      ';
    }

?>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam ab ea, rerum odio voluptatem consequatur sit magnam accusantium omnis repellendus magni ex distinctio repudiandae maiores architecto iure suscipit labore. Reprehenderit sequi ad nemo animi consequatur quaerat. Hic doloremque modi fugit! Quos itaque hic asperiores unde ipsam quod quo, quis fuga saepe reprehenderit magnam perferendis nisi adipisci neque voluptate corrupti aut? Incidunt totam similique adipisci consectetur optio sapiente consequatur accusamus blanditiis ratione qui veniam fugiat quas dolor minus nam, debitis delectus aperiam dolorem autem tenetur asperiores quia magnam distinctio molestiae. Iste recusandae ad optio dignissimos doloremque numquam explicabo, pariatur distinctio culpa perspiciatis? Dignissimos quia dolorem veniam laborum suscipit eius culpa saepe nesciunt facilis perferendis autem neque eum, quisquam eveniet omnis unde corporis. Ipsum possimus temporibus consequuntur, laboriosam porro at labore magnam iste? Rem, neque doloremque. Porro repellat voluptates et obcaecati officiis? Impedit tenetur ipsum quo eligendi accusantium reprehenderit distinctio quia, voluptatem rem voluptatum est aliquid laborum eaque possimus nostrum ipsam quos iusto atque mollitia odit quam animi dolorum. Tempora voluptatem numquam eos earum temporibus rerum sed rem dignissimos consectetur! Doloremque neque cumque ad nesciunt rerum similique ipsa nisi necessitatibus beatae voluptatum odit inventore, quasi accusantium tenetur ex vel. Mollitia, perspiciatis porro aliquid qui fuga dolores! Debitis libero blanditiis sunt numquam ea neque, amet eos architecto doloribus placeat eaque ipsam ullam deserunt quidem animi nesciunt facere dolor consectetur, earum pariatur quo soluta. Accusamus temporibus maiores blanditiis veniam nihil facere. Nisi, ab? Quibusdam quasi quidem qui consequatur illum praesentium est. Voluptatum soluta blanditiis officia nesciunt praesentium eos perferendis quaerat at dolores! Illo, ducimus iste quisquam corrupti sint nobis totam nihil cupiditate inventore placeat, ad numquam, magnam iure. Obcaecati sapiente similique magni assumenda dignissimos labore nam, itaque possimus ducimus unde eos nulla quasi omnis temporibus quaerat tempora ullam eveniet vitae, alias eum, quis atque magnam? Quos alias maxime autem iusto dolorum numquam laboriosam exercitationem! Sit aliquam quas, ab dolorum mollitia illum doloribus? Ipsa, possimus. Adipisci perspiciatis sit accusamus ipsum praesentium in dolor aut. Cum minima id quas. Mollitia nobis, laudantium eius magni quasi reiciendis repudiandae maxime, fugit nesciunt aliquam harum dicta veritatis incidunt aperiam, ratione ad architecto quibusdam labore maiores quidem illum molestiae non dolorem commodi. Magni accusamus natus iusto voluptates eaque, impedit tenetur perspiciatis dolor facere laudantium optio, reprehenderit possimus quas beatae provident corporis harum molestias. Quod illum recusandae dolorem sapiente. Dignissimos numquam fugit fugiat molestiae quas harum repudiandae tempora molestias nulla? Quis laborum eligendi maiores, provident, repellendus amet quo quam quod repudiandae nobis doloremque cumque molestias nisi perspiciatis iste saepe itaque repellat? Ex molestiae explicabo earum saepe laborum accusamus beatae non, repudiandae in praesentium nam temporibus rerum cupiditate commodi soluta recusandae maiores unde quod neque ducimus! Vitae ducimus autem, deserunt ullam magni obcaecati minima debitis odio rem alias maxime enim aliquam porro neque? Cumque, officiis explicabo in ipsam error, eaque laboriosam vero, omnis corrupti repellendus non veniam repudiandae similique doloremque voluptas dolorem ab reprehenderit! Nostrum quidem odit quod. Pariatur molestiae, omnis facere alias ab quas expedita fugit, nemo enim temporibus, quod velit illum. Laudantium consequatur architecto iure impedit? Sunt rem mollitia fuga. Sapiente nisi accusantium molestias aperiam nam, illum, et dolores voluptatem omnis fugiat laborum eaque praesentium ipsum, laboriosam ab tenetur dolorum natus sed! Quasi cupiditate illo libero dignissimos dolorem harum provident nostrum ex, ullam soluta neque, cumque magni quam unde minus. Et odio mollitia enim similique porro quae, minus quis nisi! Exercitationem praesentium est minus nemo. Ipsam numquam suscipit minus itaque, inventore optio! Fuga, blanditiis similique? Soluta, nulla. Totam eius atque minus inventore asperiores qui sit accusantium placeat voluptatibus, dolore commodi perspiciatis, ipsum eveniet amet voluptates magni dolorem quibusdam beatae. Laboriosam ut vel, qui perspiciatis, animi facere nam distinctio quos tenetur, fugiat obcaecati aperiam corporis blanditiis voluptatibus possimus debitis hic. Dolorem nam, adipisci, corporis quia quisquam numquam iure voluptatibus cupiditate velit totam labore illo magni assumenda facere amet? Nam earum corporis incidunt debitis! Eius nisi hic magnam provident officia praesentium ratione eum suscipit temporibus est, repudiandae rem ipsum beatae quos quisquam aut sapiente recusandae! Dolores consectetur dolorum eos porro dolor, qui, culpa pariatur laborum recusandae eius perferendis rem! Repellat libero, provident delectus cumque facilis architecto. Veritatis saepe tenetur voluptates est nostrum consequuntur, dolor dolorum mollitia incidunt odio aliquid vel modi, impedit architecto sunt ducimus nemo commodi, laboriosam quibusdam quasi quisquam? Corrupti libero in ullam ipsa recusandae ea, saepe consectetur, id facere optio aut distinctio mollitia consequatur! Sunt quasi hic et obcaecati. Sapiente, perferendis harum placeat ducimus itaque maxime voluptates eveniet eligendi assumenda cupiditate consectetur et at, facere totam voluptatum laborum ab rem odio reprehenderit, architecto perspiciatis? Aliquam ex reprehenderit facilis, minima voluptatibus in consequatur sapiente optio laboriosam, sunt praesentium ratione suscipit officia iure accusantium vero ipsam odio, nemo assumenda? At ab dolore nesciunt perferendis minus, laborum eos ea inventore commodi sequi deleniti eum exercitationem quaerat ratione neque sint maiores molestias quis, veniam vitae similique doloremque consequuntur doloribus iusto. Nemo distinctio, corrupti rerum vel quas architecto obcaecati est pariatur unde minima vero repudiandae reiciendis deserunt repellendus culpa inventore ratione quisquam necessitatibus iure! Ipsa rem, iste quos adipisci quod, harum repudiandae nam qui laudantium quasi optio in illo est. Quos nulla quaerat recusandae officiis! Provident maxime autem voluptates quas? Odio, quaerat eveniet. Aliquid quidem ratione dolorem dolores libero modi. Dolores tenetur cum corporis enim ipsam aspernatur et illum ratione. Nemo, totam ab doloremque nostrum, consequatur aliquid hic saepe, dolor rerum velit repudiandae atque dolorum sapiente beatae ad porro eveniet? Numquam, officia voluptas officiis nihil quaerat esse doloremque rem quos iste mollitia. Eos voluptas impedit dicta consequatur deserunt, fugit nihil illum. Laudantium, illo eum! Voluptate illo veritatis fuga architecto delectus maiores quisquam tempore amet dicta similique ea magnam deleniti natus voluptatibus ratione commodi sint beatae officiis voluptatem quis, mollitia autem accusamus. Incidunt reprehenderit debitis nostrum saepe ab quam provident tempora culpa dolore ratione aliquid, veniam soluta voluptatum exercitationem consequatur aperiam deserunt dignissimos amet adipisci inventore aut totam facilis ullam? Reprehenderit obcaecati assumenda dignissimos laudantium, molestiae sequi ab debitis, officia libero ipsam dolorem ratione cupiditate ducimus doloremque! Assumenda consectetur, dignissimos facere amet possimus fugit incidunt accusamus! Impedit dolorum nobis ex earum, maiores repellendus, vitae aspernatur necessitatibus accusantium quaerat deserunt tempore nulla saepe rerum laudantium in magni quisquam quos? Perferendis dolores doloremque maiores repellat, aliquam explicabo sapiente dignissimos dolor culpa doloribus alias? Beatae exercitationem ex fugiat repudiandae obcaecati accusamus eos necessitatibus tenetur voluptas modi commodi voluptate quo, in ratione! Doloribus nam saepe minus facilis, nobis consequatur quo delectus quod labore ipsum! Unde quae accusantium, recusandae qui minus excepturi tempore, fugit possimus nobis aspernatur magni ipsam aliquid aliquam dolore neque vero dolorem ratione cupiditate, autem veniam exercitationem laudantium molestiae eum ipsum. Reiciendis accusamus aperiam soluta doloremque eligendi molestiae architecto, voluptatum explicabo repellendus aspernatur saepe sequi odit suscipit. Animi ipsum quas veniam delectus corporis in, temporibus dolore sed et repellendus nesciunt ducimus qui corrupti. Nihil accusamus minus iste iusto, excepturi culpa distinctio officia repellendus porro alias odit delectus dolorum iure quisquam non autem hic. Facilis perspiciatis, dolores doloribus nostrum modi quisquam quia dolore repellat fuga, itaque rem error praesentium ducimus minus exercitationem sit deserunt. Tenetur mollitia asperiores vitae error possimus beatae, iure voluptate voluptas accusantium quae officia atque harum. Sint reiciendis ipsum qui officiis tempora ratione vero beatae dicta rem sapiente fuga, repellat aperiam optio! Explicabo, dolores incidunt doloribus saepe numquam nesciunt debitis distinctio modi ad quos ullam sunt ipsam, accusantium eum molestias iusto, laudantium consequuntur aperiam adipisci consequatur recusandae ducimus? Quidem consectetur, veniam vel quae dolore beatae!
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