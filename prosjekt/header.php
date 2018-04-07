	<div class="top-sticky-bar">
			<a href="index.php"><img src="bilder/logo.png" alt=""></a>
		 <button class="nav-btn" onclick="window.location.href='omoss.php'">Om siden</button>
		 <button class="nav-btn" onclick="window.location.href='spill.php'">Spill</button>
		 <?php  if (isset($_SESSION['brukernavn'])) : ?>
		 <button class="nav-btn" onclick="window.location.href='profil.php'">Min profil</button>
		 <button class="nav-btn" onclick="window.location.href='index.php?logout=\'1\''">Logg ut</button>
		 <?php endif ?>
		 <?php  if (!isset($_SESSION['brukernavn'])) : ?>
			<button class="nav-btn" onclick="window.location.href='register.php'">Registrer</button>
			<button class="nav-btn tmp-btn" onclick="window.location.href='login.php'">Logg inn</button>
			 <?php endif ?>


			 <?php if (isset($_SESSION['brukernavn'])) : ?>
				 <a  href="profil.php"><?php echo $_SESSION['brukernavn'] ?> du har
				 <a  href="profil.php?arg=pengerinn">BELØP: <?php echo $_SESSION['penger'] ?></a>
			 <?php endif ?>
			 <input type="text" placeholder="Søk.." onblur="endDiv()" onkeyup="search(this.value)"
			 onfocus="search(this.value)">
	</div>
