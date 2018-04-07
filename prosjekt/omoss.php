<?php
  session_start();

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['brukernavn']);
  	header("location: index.php");
  }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style-index.css">
    <title>Om oss</title>
  </head>
  <body>
    <?php include('header.php'); ?>



      <section id="content">
        <header id="header-index" class="grid">
          <div class="max-width-img"></div>

        </header>
        <main id="main">
          <section id="section-a-AboutUs" class="grid">
            <div class="content-wrap">
              <div class="content-text">
                <h2 class="content-title">
                Om oss i Bygda Kasino </h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                  esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                   culpa qui officia deserunt mollit anim id est laborum. id est laborum.</p>
              </div>
            </div>
          </section>

          <section id="section-b-AboutUs" class="grid">
            <ul>
              <li>
                <div class="card">
                    <img class="img" src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    <div class="card-content">
                      <h3 class="card-title">Jacob Mol</h3>
                      <p>Spretten!</p>
                    </div>

                </div>
              </li>
              <li>
                <div class="card">
                    <img class="img" src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                      <h3 class="card-title">Jonathan Tønnesen</h3>
                      <p>Gal!</p>
                    </div>
                </div>
              </li>
              <li>
                <div class="card">
                    <img class="img" src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    <div class="card-content">
                      <h3 class="card-title">Åsmund Norderud</h3>
                      <p>Den  høylytte!</p>
                    </div>
                </div>

              </li>
              <li>
                <div class="card">
                    <img class="img" src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    <div class="card-content">
                      <h3 class="card-title">Danay Nelvik</h3>
                      <p>Syvsoveren!</p>
                    </div>
                </div>

              </li>
              <li>
                <div class="card">
                    <img class="img" src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    <div class="card-content">
                      <h3 class="card-title">Glenn Ove Kingestad</h3>
                      <p>Bølla!</p>
                    </div>
                </div>
              </li>
            </ul>
          </section>

          <section id="section-c-AboutUs" class="grid">
            <div class="content-wrap">
                  <h2 class="content-title">
                    Kontakt
                  </h2>

                  Borchs gate 73 - 3801 Bø i Telemark
                  kundeservice@bc.com
                  378 48 398


            </div>
          </section>
        </main>
      </section>
      <?php include('footer.php'); ?>
  </body>
</html>
