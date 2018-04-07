<?php include('server.php');
 if (isset($_SESSION['brukernavn'])) {

    header('location: index.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrering</title>
  <link rel="stylesheet" type="text/css" href="style-index.css">
</head>
<body>
  <?php include('header.php') ?>
    <div class="content-main">
      <form method="post" action="register.php">
      	<?php include('errors.php'); ?>
        <h1>Registrering</h1>
        <div class="form-container"><input placeholder="Brukernavn.." class="form-design" type="text" name="username" value="<?php echo $brukernavn; ?>"></div>
        <div class="form-container"><input placeholder="Email.." class="form-design" type="email" name="email" value="<?php echo $epost; ?>"></div>
        <div class="form-container"><input placeholder="Passord.." class="form-design" type="password" name="passord_1"></div>
        <div class="form-container"><input placeholder="Bekreft passord.." class="form-design" type="password" name="passord_2"></div>
        <div class="form-container"><button type="submit" class="btn-form" name="reg_bruker">Registrer</button></div>
      	<p>Allerede medlem? <a href="login.php">Logg inn</a> </p>
      </form>
    </div>
  <?php include('footer.php') ?>
</body>

</html>
