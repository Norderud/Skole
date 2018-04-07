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
    <div id="boks">
      <h1> Spilleautomat </h1>
      <canvas width ="600" height="250"></canvas>
      <div id="knapper">
        <button type="button" onclick="spill()"><span>Spill</span></button>
        <label><input type="radio" name="toggle" value="5" checked="checked"><span>5kr</span></label>
        <label><input type="radio" name="toggle" value="10"><span>10kr</span></label>
        <label><input type="radio" name="toggle" value="20"><span>20kr</span></label>
        <label><input type="radio" name="toggle" value="50"><span>50kr</span></label>
        <label><input type="radio" name="toggle" value="100"><span>100kr</span></label>
      </div>
    </div>
  </div>
  <script src="spilleautomat/canvas.js"></script>
  <?php include('footer.php') ?>
</body>
</html>
