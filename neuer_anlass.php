<!DOCTYPE html>
<html>

<head>
	<title>Administration - Neuer Anlass</title>
	<link rel="stylesheet" href="_css/style.css" type="text/css">
	<link rel="stylesheet" href="_css/style_anlass.css" type="text/css">
	<?php 
            include("php/config.php");
    ?>
	<?php
    if(isset($_POST['bezeichnung'])){
        $sql = "INSERT INTO event (event_name, year) VALUES ('".$_POST['bezeichnung']."','".$_POST['veranstaltungsjahr']."');";
        $res = mysqli_query($db,$sql);
    }
    ?>
	
</head>

<body>

	<div id="sitediv">
		
			<a href="index.php"><img id="scdiemberg_logo" src="_img/sportclubdiemberg_logo_klein.png"/></a>
			<a href="index.php"><img id="deschnellsteschenbacher_logo" src="_img/deschnellsteschenbacher_logo_klein.png"/></a>
			
			<nav id="nav">
			<ul>
				<li class="nav1">
					 <a href="zeiten_erfassen.php">Zeiten erfassen</a>
				</li>
			
				<li class="nav2">
					<a href="#">Auswertungen</a>
					<ul>
						<li><a href="#">Das ist ein Test</a></li>
						<li><a href="#">Das ist noch ein Test</a></li>
						<li><a href="#">Unterpunkt3</a></li>
					</ul>
				</li>
				
				<li class="nav3">
					<a href="#">Administration</a>
					<ul>
						<li><a href="#">Teilnehmerverwaltung</a>
							<ul>
								<li><a href="neuer_teilnehmer.php">Neuer Teilnehmer</a></li>
								<li><a href="teilnehmer_bearbeiten.php">Teilnehmer bearbeiten</a></li>
							</ul>
						</li>
						<li><a href="#">Personenverwaltung</a>
							<ul>
								<li><a href="neue_person.php">Neue Person</a></li>
								<li><a href="person_bearbeiten.php">Person bearbeiten</a></li>
							</ul>
						</li>
						<li><a href="#">Kategorieverwaltung</a>
							<ul>
								<li><a href="neue_kategorie.php">Neue Kategorie</a></li>
								<li><a href="kategorie_bearbeiten.php">Kategorie bearbeiten</a></li>
							</ul>
						</li>
						<li><a href="#">Klassenverwaltung</a>
							<ul>
								<li><a href="neue_klasse.php">Neue Klasse</a></li>
								<li><a href="klasse_bearbeiten.php">Klasse bearbeiten</a></li>
							</ul>
						</li>
						<li><a href="#">Lehrerverwaltung</a>
							<ul>
								<li><a href="neuer_lehrer.php">Neuer Lehrer</a></li>
								<li><a href="lehrer_bearbeiten.php">Lehrer bearbeiten</a></li>
							</ul>
						</li>
						<li><a href="#">Anlassverwaltung</a>
							<ul>
								<li><a href="neuer_anlass.php">Neuer Anlass</a></li>
								<li><a href="anlass_bearbeiten.php">Anlass bearbeiten</a></li>
							</ul>
						</li>
						<li><a href="#">Benutzerverwaltung</a>
							<ul>
								<li><a href="neuer_benutzer.php">Neuer Benutzer</a></li>
								<li><a href="benutzer_bearbeiten.php">Benutzer bearbeiten</a></li>
							</ul>
						</li>
					</ul>
				</li>
				
			</ul>
		</nav>
		
		<div id="content">
		
		<h1 id="site_title">Neuer Anlass</h1>
		
		<form id="form_verwaltung" action="neuer_anlass.php" method="POST">
			</br><p style="font-size: 11px;">Felder mit * markiert sind Pflichtfelder</p></br>
			
			Bezeichnung:*	<input  id="bezeichnung" type="text" name="bezeichnung"/></br>
			Veranstaltungsjahr:*	<input  id="veranstaltungsjahr" type="text" name="veranstaltungsjahr"/></br></br>
							<input id="speichern_button"type="submit" name="submit" value="Speichern"/>
		</form>
		
		</div>
		
		<div id="footer">
		</div>
	
	
	</div>
</body>

</html>