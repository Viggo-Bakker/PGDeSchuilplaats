<!DOCTYPE html>
<html>
<meta charset='UTF-8'>
<link rel='stylesheet' href='css/menu.css'>

<header>
  <nav id='menu'>
    <ul class='logo'>
      <li>
        <a href='index.php' class='logo'>
          <img src="images/new-logo.png" alt="De Schuilplaats logo" class="logo" />
        </a>
      </li>
    </ul>
    <ul class='nav-links'>
      <?php if (isset($user_data['user_name'])): ?>
        <li><a class='dropdown-arrow' href=''>Admin</a>
          <ul class='sub-menus'>
            <li><a href='admin_services.php'>- Diensten</a></li>
            <li><a href='admin_sermons.php'>- Preken</a></li>
            <li><a href="signup.php">- Registreren</a></li>
          </ul>
        </li>
      <?php endif; ?>
      <li><a class='dropdown-arrow' href='agenda.php'>Agenda</a>
        <ul class='sub-menus'>
          <li><a href='services.php'>- Diensten</a></li>
          <li><a href='alpha.php'>- Alpha</a></li>
          <li><a href='huiskring.php'>- Kringen</a></li>
          <li><a href='bidstond.php'>- Bidstond</a></li>
        </ul>
      </li>
      <li><a class='dropdown-arrow' href='about_us.php'>Over ons</a>
        <ul class='sub-menus'>
          <li><a href='our_team.php'>- Stuurgroep</a></li>
          <li><a href='history.php'>- Geschiedenis</a></li>
          <li><a href='route.php'>- Route</a></li>
        </ul>
      </li>
      <li><a class='dropdown-arrow' href='education.php'>Onderwijs</a>
        <ul class='sub-menus'>
          <li><a href='sermons.php'>- Preken</a></li>
          <li><a href='children.php'>- Kinderen</a></li>
          <li><a href='teens.php'>- Tieners</a></li>
          <li><a href='youth.php'>- Jeugd</a></li>
        </ul>
      </li>
      <li><a class='dropdown-arrow' href='contact.php'>Contact</a>
        <ul class='sub-menus'>
          <li><a href='privacy_statement.php'>- Privacy statement</a></li>
          <li><a href='protocols.php'>- Protocollen</a></li>
          <li><a href='anbi.php'>- ANBI</a></li>
        </ul>
      </li>
      <li><a href='donate.php'>Doneren</a></li>
    </ul>
    <div id="right">
      <?php if (isset($user_data['user_name'])): ?>
        <p id="user-greeting"> Ingelogd als; <?php echo $user_data['user_name']; ?>! <a href="logout.php">Uitloggen</a></p>
      <?php else: ?>
        <p id="user-greeting"><a href="login.php" class="login-button">Inloggen</a></p>
      <?php endif; ?>

      <form class="search-bar" method="POST" action="">
        <input type="text" id="search" name="search" placeholder="Zoek... (werkt nog niet)">
        <button type="submit">Zoek</button>
      </form>
      <!-- 
      <script async src="https://cse.google.com/cse.js?cx=d0640339ea3834a63">
      </script>
      <div class="gcse-searchbox-only"></div> -->
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
  </script>
</header>

</html>