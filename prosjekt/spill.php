<?php include('server.php');
 if (!isset($_SESSION['brukernavn'])) {
    
    header('location: spillinfo.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hjem</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include('header.php'); ?>
<div id="container">
<?php if (isset($_GET['arg'])) : ?>
	<button id="tilbake" class="buttonHeader" onclick="window.location.href='spill.php'">tilbake</button>

    <?php if ($_GET['arg'] == "kronmynt") : ?>
		<div id="kron_mynt" align="center">
			<?php include('coinflip.php'); ?>
		</div>
	<?php endif ?>
    <?php if ($_GET['arg'] == "blackjack") : ?>
		<div id="blackjack" align="center">
			<?php include('blackjack.php'); ?>
		</div>
	<?php endif ?>
<?php endif ?>
<?php if (!isset($_GET['arg'])) : ?>
<div class="leftBox">
        <ul>
            <h2>Spill:</h2>
            <li><a href="spill.php?arg=kronmynt">Kron og mynt</a></li>
            <li><a href="spill.php?arg=blackjack">Blackjack</a></li>
        </ul>
    </div>
<?php endif ?>
</div>
<?php include('footer.php'); ?>
</body>
</html>