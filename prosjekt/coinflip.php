<style type="text/css">
.lblKM > input{ /* HIDE RADIO */
  visibility: hidden; /* Makes input not-clickable */
  position: absolute; /* Remove input from document flow */
}
.lblKM > input + img{ /* IMAGE STYLES */
  cursor:pointer;
  border:2px solid transparent;
}
.lblKM > input:checked + img{ /* (RADIO CHECKED) IMAGE STYLES */
  border:2px solid #f00;
}
</style>

<audio autoplay hidden>
	<source src="musikk/bjack.m4a" type="audio/mpeg"> 
</audio>

<h1>Kron eller mynt?</h1>
<?php
if (isset($_POST['rbtn'])) {
	$rnd = rand(0,1);
	$date = date('F j, Y g:ia', time());
	if($_POST['rbtn']==0){echo "<p>Du har valgt kron: ";}else{echo "<p>Du har valgt mynt: ";}

	if ($rnd==0){
		$coin = "Kron!";
		$coinImg = "bilder/heads.jpg";
	}
	else{
		$coin = "Mynt!";
		$coinImg = "bilder/tails.jpg";
	}
	echo <<< EOF
	$date</p>
	<table style="text-align: center;">
		<tr>
			<td><img class="coins" src="$coinImg" width="100px"></td>
		</tr>
		<tr>
			<td><p style="margin: 0; font-size: 17px;">Det ble: $coin</p></td>
		</tr>
	</table>
EOF;
$value = $_POST['value'];
	if ($rnd == $_POST['rbtn']) {
		$value *= 2;
		echo "<p style='color: green; font-weight: bold; font-size: 20px;'>Du vant $value kr!</p>";
	}else{
		echo "<p style='color: red; font-weight: bold; font-size: 20px;'>Du tapte $value kr!</p>";
	}
	$index = "\"window.location.href='spill.php?arg=kronmynt'\"";
	echo "<button onclick=$index>Spill igjen</button>";
}
else{
echo <<< EOF
<form method="post">
	<table cellspacing="10px" style="text-align: center;">
		<tr>
			<td>
				<label class="lblKM">
					<input type="radio" name="rbtn" value="0" required>
					<img id="head" class="coins" src="bilder/heads.jpg" width="100px">
				</label>
			</td>
			<td><img src="bilder/velg.jpg" width="150px"></td>
			<td>
				<label class="lblKM">
					<input type="radio" name="rbtn" value="1" required>
					<img id="tail" class="coins" src="bilder/tails.jpg" width="100px">
				</label>
			</td>
		</tr>
		<tr>
			<td>Kron</td>
			<td>hvor mye sattser du?<br><input type="number" name="value" min="1" max="100" required></td>
			<td>Mynt</td>
		</tr>
	</table>
<input type="submit" name="submit" value="Start!">
</form>
EOF;
}
?>
