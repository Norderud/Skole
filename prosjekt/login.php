<?php include('server.php');
 if (isset($_SESSION['brukernavn'])) {

    header('location: index.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Innlogging</title>
  <link rel="stylesheet" type="text/css" href="style-index.css">
</head>
<body>
  <?php include('header.php') ?>
    <div class="content-main">
      <form method="post" action="login.php">
      	<?php include('errors.php'); ?>
        <h1>LOGG INN</h1>
        <div class="form-container"><input type="text"  class="form-design" name="brukernavn" placeholder="Brukernavn..."></div>
        <div class="form-container"><input type="password" class="form-design" name="passord" placeholder="Passord..."></div>
        <div class="form-container"><button type="submit" class="btn-form" name="login_bruker">Logg inn</button></div>
      	<p>
      		Ikke medlem? <a href="register.php">Registrer her</a>
      	</p>
      </form>
    </div>
  <?php include('footer.php') ?>
</body>
</html>
