<?php
  session_start();
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['brukernavn']);
  	header("location: index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  </style>
	<title>Bygda Casino</title>
	<link rel="stylesheet" type="text/css" href="style-index.css">
</head>
<body>
<?php include('header.php'); ?>
  <section id="content">
    <header id="header-index" class="grid">
      <div class="bg-image"></div>
        <div class="content-wrap">
        <h1>Velkommen til Bygda Casino!</h1>
        <p>Vi er her for deg slik at du skal bli rik på en trygg og god måte!</p>

        <a href="#section-b" class="btn"> Se våre mest spilte spill!</a>
        </div>
    </header>
    <main id="main">
      <section id="section-a" class="grid">
        <div class="content-wrap">
          <div class="content-text">
            <h2 class="content-title">
            Ny dag, nye muligheter. LIMITED OFFER </h2>
            <p>Sett inn valgt beløp og få 350,- gratis!</p>
          </div>
        </div>
      </section>

      <section id="section-b" class="grid">
        <ul>
          <li>
            <div class="card-spill">
              <a href="www.vg.no">
                <img class="img" src="https://images.pexels.com/photos/210600/pexels-photo-210600.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                <div class="card-content">
                  <h3 class="card-title">Coin-flip</h3>
                  <p>Mynt-kast med store muligheter for gevinst! Prøv vårt mest spilte spill!</p>
                </div>
              </a>

            </div>

          </li>
          <li>
            <div class="card-spill">
              <a href="www.dagbladet.no">
                <img class="img" src="https://res.cloudinary.com/twenty20/private_images/t_watermark-criss-cross-10/v1515993040000/photosp/23f481d0-780c-47cc-8d0c-c3a157f890d0/stock-photo-love-red-heart-individuality-gambling-different-cards-ace-blackjack-23f481d0-780c-47cc-8d0c-c3a157f890d0.jpg">
                  <h3 class="card-title">Blackjack</h3>
                  <p>Verdens mest spilte spill. Enjoy!</p>
                </div>
              </a>
            </div>

          </li>
          <li>
            <div class="card-spill">
              <a href="aftenposten.no">
                <img class="img" src="https://res.cloudinary.com/twenty20/private_images/t_watermark-criss-cross-10/v1453252034000/photosp/88cd5657-83ac-4e73-80c6-0ea532a6e009/stock-photo-light-fish-game-casino-poker-paillette-play-poker-88cd5657-83ac-4e73-80c6-0ea532a6e009.jpg">
                <div class="card-content">
                  <h3 class="card-title">Danay's svindel</h3>
                  <p>Luringen Danay har fikset ett spill for oss!</p>
                </div>
              </a>
            </div>

          </li>
        </ul>
      </section>

      <section id="section-c" class="grid">
        <div class="content-wrap">
              <h2 class="content-title">
                Kontakt oss i Bø kasino
              </h2>
              <p> Er det noe du lurer på er det bare å kontakte oss. Følg linken under eller bruk navigeringen øverst
                på websiden for å finne kontakt informasjon. May the odds ever be in your favor!
              </p>
              <a href="omoss.php#section-b-AboutUs" class="btn"> Mer.. </a>
        </div>
      </section>
    </main>
  </section>
  <?php include('footer.php'); ?>

  <script>
  function endDiv(){
    setTimeout(function () {
            var elem;
            while(elem = document.getElementById('searchtitle')){
              elem.parentNode.removeChild(elem);
            }
      }, 150);

  }
  //Dette er kopiert kode, er det en enklere/bedre måte å gjøre dette på?
  function search(string){
    var xmlhttp;
    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
    }else{
      xmlhttp = new ActiveXObject("XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
        document.getElementById("search").innerHTML = xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET", "server.php?s="+string, true);
    xmlhttp.send(null);
  }
  </script>
</body>
</html>
