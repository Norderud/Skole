
<footer>
		<div id="bottomNavBar">
			<a href="index.php">Hjem</a>
			| <a href="hvem.php">Om oss</a>
			| <a href="faq.php">FAQ</a>
			<?php  if (!isset($_SESSION['brukernavn'])) : ?>
			| <a href="register.php">Registrer</a>
			<a href="login.php">Logg inn</a>

			<?php endif ?>
			<?php  if (isset($_SESSION['brukernavn'])) : ?>
			| <a href="profil.php">Min profil</a>
			| <a href="index.php?logout='1'">Logg ut</a>

			<?php endif ?>
		</div>
		<div id="socialFooter">
			<a title="Følg oss på Facebook" href="http://facebook.com/"><img class="social" alt="Facebook" src="bilder/facebook.svg"/></a>

			<a title="Følg oss på Twitter" href="http://twitter.com/"><img class="social" alt="Twitter" src="bilder/twitter.svg"/></a>

			<a title="Følg oss på Youtube" href="http://youtube.com/"><img class="social" alt="Youtube" src="bilder/youtube.svg"/></a>
		</div>
</footer>
