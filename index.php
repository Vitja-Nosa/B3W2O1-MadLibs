<?php

	$huisdier = $_POST["huisdier"];
	$persoon = $_POST["persoon"];
	$land = $_POST["land"];
	$verveelt = $_POST["verveelt"];
	$speelgoed = $_POST["speelgoed"];
	$docent = $_POST["docent"];
	$kopen = $_POST["kopen"];
	$bezigheid = $_POST["bezigheid"];

	$showResults = false;
	$error = false;

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if ($huisdier == "" || $persoon == "" || $land == "" || $verveelt == "" || $speelgoed == "" || $docent == "" || $kopen == "" || $bezigheid == "") {
			$error = true;
		}
		else {
			$showResults = true;
			$huisdier = checkInput($huisdier);
			$persoon = checkInput($persoon);
			$land = checkInput($land);
			$verveelt = checkInput($verveelt);
			$speelgoed = checkInput($speelgoed);
			$docent = checkInput($docent);
			$kopen = checkInput($kopen);
			$bezigheid = checkInput($bezigheid);	
		}
		
	}

	function checkInput($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mad lips opdracht</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<img src="images/logo.png" alt="mad libs">
			<nav>
				<ul>
					<li style="text-decoration: underline; color: white;">Er heeft paniek...</li>
					<li><a href="onkunde.php">Onkunde</a></li>
				</ul>
			</nav>
			<div class="content">
				<h1>Er heerst paniek...</h1>
				<?php 
					if ($error == true) {
				?>
				<p style="color: red; margin: 6px 0;">Zorg dat je alle velden invult.</p>
				<?php
					}	
					if ($showResults == false ) {
				?>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<label>Welk dier zou je nooit als huisdier willen hebben?
						<input type="text" name="huisdier">
					</label>
					<br>
					<label>Wie is de belangrijkste persoon in je leven?
						<input type="text" name="persoon">
					</label>
					<br>
					<label>In welk land zou je graag willen wonen?
						<input type="text" name="land">
					</label>
					<br>
					<label>Wat doe je als je je verveelt?
						<input type="text" name="verveelt">
					</label>
					<br>
					<label>Met welk speelgoed speelde je als kind het meest?
						<input type="text" name="speelgoed">
					</label>
					<br>
					<label>Bij welke docent spijbel je het liefst?
						<input type="text" name="docent">
					</label>
					<br>
					<label>Als je &euro; 100.000,- had, wat zou je dan kopen?
						<input type="text" name="kopen">
					</label>
					<br>
					<label>Wat is je favoriete bezigheid?
						<input type="text" name="bezigheid">
					</label>
					<br>

					<input type="submit" name="submit" value="Versturen">
				</form>	
			<?php 
				}
				else {	
			?>
				<p>Er heerst paniek in het koningrijk <?php echo $land; ?>. Koning <?php echo $docent; ?> is ten einde raad en als koning <?php echo $docent; ?> ten einde raad is, dan roept hij ten-einde-raadsheer <?php echo $persoon; ?>. "<?php echo $persoon; ?>! Het is een ramp! Het is een schande!" <br> "Sire, Majesteit, Uwe Luidruchtigheid, wat is er aan de hand?" <br> "Mijn <?php echo $huisdier; ?> is verdwenen! Zo maar, zonder waarschuwing. En ik had net <?php echo $speelgoed; ?> voor hem gekocht!" <br> "Majesteit, uw <?php echo $huisdier; ?> komt vast vanzelf weer terug?" <br> "Ja, da's leuk en aardig, maar hoe moet ik in de tussentijd <?php echo $bezigheid; ?> leren?" <br> "Maar Sire, daar kunt u toch uw <?php echo $kopen; ?> voor gebruiken." <br> "<?php echo $persoon; ?>, je hebt helemaal gelijk! Wat zou ik doen als ik jou niet had." <br> "Mij <?php echo $verveelt; ?>, Sire" </p>
			<?php
				}
			?>

			</div>
			<footer> &copy; Vitja Nosa 2021</footer>
		</div>
		
	</body>
</html>