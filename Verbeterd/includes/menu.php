<header>
  <nav id='menu'>
    <ul class='logo'>
      <li>
        <a href='index.php' class='logo'>
          <img src="src/assets/images/new-logo.png" alt="De Schuilplaats logo" class="logo" />
        </a>
      </li>
    </ul>
    <ul class='nav-links'>
      <?php if (isset($user_data['user_name'])): ?>
        <li><a class='dropdown-arrow' href=''>Admin</a>
          <ul class='sub-menus'>
            <li><a href='admin_services'>- Diensten</a></li>
            <li><a href='admin_sermons'>- Preken beheren</a></li>
            <li><a href='signup'>- Registreren</a></li>
          </ul>
        </li>
      <?php endif; ?>
      <li><a class='dropdown-arrow' href='agenda'>Agenda</a>
        <ul class='sub-menus'>
          <li><a href='services'>- Diensten</a></li>
          <li><a href='alpha'>- Alpha</a></li>
          <li><a href='huiskring'>- Kringen</a></li>
          <li><a href='bidstond'>- Bidstond</a></li>
        </ul>
      </li>
      <li><a class='dropdown-arrow' href='about_us'>Over ons</a>
        <ul class='sub-menus'>
          <li><a href='our_team'>- Stuurgroep</a></li>
          <li><a href='history'>- Geschiedenis</a></li>
          <li><a href='route'>- Route</a></li>
        </ul>
      </li>
      <li><a class='dropdown-arrow' href='education'>Onderwijs</a>
        <ul class='sub-menus'>
          <li><a href='sermons'>- Preken luisteren</a></li>
          <li><a href='children'>- Kinderen</a></li>
          <li><a href='teens'>- Tieners</a></li>
          <li><a href='youth'>- Jeugd</a></li>
        </ul>
      </li>
      <li><a class='dropdown-arrow' href='contact'>Contact</a>
        <ul class='sub-menus'>
          <li><a href='privacy_statement'>- Privacy statement</a></li>
          <li><a href='protocols'>- Protocollen</a></li>
          <li><a href='anbi'>- ANBI</a></li>
        </ul>
      </li>
      <li><a href='donate'>Doneren</a></li>
    </ul>
    <div id="right">
                              <!-- <?php if (isset($user_data['user_name'])): ?>
        <p id="user-greeting">Ingelogd als <?php echo htmlspecialchars($user_data['user_name'], ENT_QUOTES, 'UTF-8'); ?>. <a href="logout">Uitloggen</a></p>
                              <?php else: ?>
        <p id="user-greeting"><a href="login" class="login-button">Inloggen</a></p>
                              <?php endif; ?> -->

      <form class="search-bar" method="GET" action="search">
        <input type="text" id="search" name="q" placeholder="Zoek...">
        <button type="submit">Zoek</button>
      </form>

      <!-- RESULTATEN IN APARTE PAGINA (door google gehost) -->

      <!-- <script async src="https://cse.google.com/cse.js?cx=d0640339ea3834a63">
      </script>
      <div class="gcse-searchbox-only"></div> -->

      <!-- RESULTATEN IN APARTE KOLOM -->
      <!-- <script async src="https://cse.google.com/cse.js?cx=d0640339ea3834a63">
      </script>
      <div class="gcse-searchbox"></div> -->

      <!-- overlay -->
      <!-- <script async src="https://cse.google.com/cse.js?cx=d0640339ea3834a63"></script>
      <div class="gcse-search"></div> -->
    </div>

    <button class="menu-toggle">☰</button>
  </nav>



  <script>
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');
    const rightDiv = document.querySelector('#right');

    menuToggle.addEventListener('click', function() {
      navLinks.classList.toggle('active');
      rightDiv.classList.toggle('active');
    });

    window.addEventListener("scroll", function() {
      const menu = document.getElementById("menu");
      if (window.scrollY > 50) {
        menu.classList.add("scrolled");
      } else {
        menu.classList.remove("scrolled");
      }
    });


    (function() {
      const INTERVAL_MS = 30 * 60 * 1000;

      async function keepAlive() {
        try {
          await fetch('<?= BASE_PATH ?>keepalive.php', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
              'Accept': 'application/json'
            }
          });
        } catch (e) {
          // fail silently
          console.log('keepalive error', e);
        }
      }

      // ping direct en elke 30min; ook ping wanneer tab zichtbaar wordt
      document.addEventListener('DOMContentLoaded', function() {
        keepAlive();
        setInterval(keepAlive, INTERVAL_MS);
        document.addEventListener('visibilitychange', function() {
          if (document.visibilityState === 'visible') keepAlive();
        });
      });
    })();
  </script>
</header>
