<?php include('server.php');
 if (!isset($_SESSION['brukernavn'])) {

    header('location: index.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
    #slettB{
        margin-top: 20px!important;
    }

    #slettB a{
        font-size: 0.9em!important;
        font-weight: normal!important;
        color: red!important;
    }

    #rightBox{
        width: calc(80% - 35px);
        margin-top: 8px;
        height: 500px;
        border-radius: 10px;
        //background-color: rgba(100,0,200,0.2);
        border: 1px solid #5F9EA0;
        box-shadow: 5px 10px 8px #888888;
        overflow: hidden;
        float: right;
        margin-right: 10px;
    }
    #saldo{
        margin: 0;
        margin-top: 5px;
        margin-left: 5px;
    }
</style>
</head>
<body><?php include('header.php') ?>

    <div class="leftBox">
        <a href="profil.php"><h3>Min profil</h3></a>
        <ul>
            <h2>Gjør endringer:</h2>
            <li><a href="profil.php?arg=passord">Bytt passord</a></li>
            <li><a href="profil.php?arg=epost">Bytt email</a></li>
            <li><a href="profil.php?arg=pengerinn">Sett inn penger</a></li>
            <li><a href="profil.php?arg=pengerut">Ta ut penger</a></li>
            <li id="slettB"><a href="profil.php?arg=slett">Slett bruker</a></li>
        </ul>
    </div>
    <div id="rightBox">
        <?php if (isset($_GET['arg'])) : ?>
        <?php if ($_GET['arg'] == "passord") : ?>
            <div class="header">
                <h1>Bytt passord</h1>
            </div>

            <form method="post" action="profil.php?arg=passord">
            <?php include('errors.php'); ?>
            <div class="input-group">
              <label>Gamelt passord</label>
              <input type="password" name="passord_0">
            </div>
            <div class="input-group">
              <label>Nytt passord</label>
              <input type="password" name="passord_1">
            </div>
            <div class="input-group">
              <label>Gjenta passord</label>
              <input type="password" name="passord_2">
            </div>
            <div class="input-group">
              <button type="submit" class="btn" name="change_pwd">Bytt Passord</button>
            </div>
          </form>
        <?php endif ?>
        <?php if ($_GET['arg'] == "epost") : ?>
            <div class="header">
                <h1>Bytt epost</h1>
            </div>
            <form method="post" action="profil.php?arg=epost">
                <?php include('errors.php'); ?>
                <div class="input-group">
                  <label>Epost</label>
                  <input type="email" name="email" value="<?php echo $_SESSION['epost']; ?>">
                </div>
                <button type="submit" class="btn" name="change_epost">Bytt epost</button>
            </form>
        <?php endif ?>
        <?php if ($_GET['arg'] == "pengerinn") : ?>
            <div class="header">
                <h1>Sett inn penger</h1>
            </div>
            <form method="post" action="profil.php?arg=pengerinn">
                <?php include('errors.php'); ?>
                <div class="input-group">
                  <label>Saldo: $<?php echo $_SESSION['penger']; ?></label>
                </div>
                <div class="input-group">
                  <label>Antall Kr</label>
                  <input type="number" name="penger" min="10" max="10000" value="500" requiered>
                </div>
                <button type="submit" class="btn" name="penger_inn">Betal</button>
            </form>
        <?php endif ?>

        <?php if ($_GET['arg'] == "pengerut") : ?>
            <div class="header">
                <h1>Ta ut penger</h1>
            </div>
            <form method="post" action="profil.php?arg=pengerut">
                <?php include('errors.php'); ?>
                <div class="input-group">
                  <label>Saldo: $<?php echo $_SESSION['penger']; ?></label>
                </div>
                <div class="input-group">
                  <label>Antall Kr</label>
                  <input type="number" name="penger" min="100" max="100000" value="100" requiered>
                </div>
                <button type="submit" class="btn" name="penger_ut">Ta ut</button>
            </form>
        <?php endif ?>

        <?php if ($_GET['arg'] == "slett") : ?>
            <div class="header">
                <h1>Vil du slette din bruker?</h1>
            </div>

            <form method="post" action="profil.php?arg=slett">
                <p>Vær klar over at hvis du sletter kontoen din er det ingen måte å gjenoprette den igjen. Det vil si at alle penger også er tapt!</p>
                <button type="submit" id="dlt_usr" class="btn" name="dlt_usr" onclick="return confirm('Er du helt sikker på at du vill slette kontoen din for alltid??')">Slett bruker</button>
            </form>
        <?php endif ?>
        <?php endif ?>
        <?php if (!isset($_GET['arg'])) : ?>
            <a class="topLink" href="profil.php?arg=pengerinn"><h3 id="saldo">Din saldo: $<?php echo $_SESSION['penger']; ?></h3></a>
            <h1 align="center">Sjekk ut min profil</h1>
            <table border="1px solid black" align="center">
                <tr ><th colspan="3"><h3>Eksempel verdier:</h3></th></tr>
                <tr><th>Beskrivelse</th><th>verdi</th><th>dato</th></tr>
                <tr><td>Kron&mynt</td><td>100kr</td><td>3/30/2018</td></tr>
                <tr><td>Blackjack</td><td>500kr</td><td>2/13/2018</td></tr>
                <tr><td>Kron&mynt</td><td>-75kr</td><td>1/23/2018</td></tr>
                <tr><td>Kron&mynt</td><td>-200kr</td><td>3/15/2018</td></tr>
            </table>
        <?php endif ?>
    </div>
<?php include('footer.php') ?>
</body>
</html>
