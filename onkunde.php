<?php

	$skill = $_POST["skill"];
	$persoon = $_POST["persoon"];
	$getal = $_POST["getal"];
	$vakantie = $_POST["vakantie"];
	$eigenschap = $_POST["eigenschap"];
	$slechtsteEigenschap = $_POST["slechtsteEigenschap"];
	$overkomen = $_POST["overkomen"];

	$showResults = false;
	$error = false;

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if ($skill == "" || $persoon == "" || $getal == "" || $vakantie == "" || $eigenschap == "" || $slechtsteEigenschap== "" || $overkomen == "") {
			$error = true;
		}
		else {
			$showResults = true;
			$skill = checkInput($skill);
			$persoon = checkInput($persoon);
			$getal = checkInput($getal);
			$vakantie = checkInput($vakantie);
			$eigenschap = checkInput($eigenschap);
			$slechtsteEigenschap = checkInput($slechtsteEigenschap);
			$overkomen = checkInput($overkomen);
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
					<li><a href="index.php">Er heeft paniek...</a></li>
					<li style="text-decoration: underline; color: white;">Onkunde</li>
				</ul>
			</nav>
			<div class="content">
				<h1>Onkunde</h1>
				<?php 
					if ($error == true) {
				?>
				<p style="color: red; margin: 6px 0;">Zorg dat je alle velden invult.</p>
				<?php
					}	
					if ($showResults == false ) {
				?>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<label>Wat zou je graag willen kunnen?
						<input type="text" name="skill">
					</label>
					<br>
					<label>Met welke persoon kun je goed opschieten?
						<input type="text" name="persoon">
					</label>
					<br>
					<label>Wat is je favoriete getal?
						<input type="text" name="getal">
					</label>
					<br>
					<label>Wat heb je altijd bij je als je op vakantie gaat?
						<input type="text" name="vakantie">
					</label>
					<br>
					<label>Wat is je beste persoonlijke eigenschap?
						<input type="text" name="eigenschap">
					</label>
					<br>
					<label>Wat is je slechtste persoonlijke eigenschap?
						<input type="text" name="slechtsteEigenschap">
					</label>
					<br>
					<label>Wat is het ergste dat je kan overkomen?
						<input type="text" name="overkomen">
					</label>
					<br>
					<input type="submit" name="submit" value="Versturen">
				</form>	
			<?php 
				}
				else {	
			?>
				<p>
					Er zijn veel mensen die niet kunnen <?php echo $skill ?>. Neem nou <?php echo $persoon ?>. Zelfs met de hulp van een <?php echo $vakantie ?> of zelfs <?php echo $getal ?> kan <?php echo $persoon ?> niet <?php echo $skill ?>. Dat heeft niet te maken met een gebrek aan <?php echo $eigenschap ?>, maar met een te veel aan <?php echo $slechtsteEigenschap ?>. Te veel <?php echo $slechtsteEigenschap ?> leidt tot <?php echo $overkomen ?> en dat is niet goed als je wilt <?php echo $skill ?>. Helaas voor <?php echo $persoon ?>.
				</p>
			<?php
				}
			?>

			</div>
			<footer> &copy; Vitja Nosa 2021</footer>
		</div>
		
	</body>
</html>