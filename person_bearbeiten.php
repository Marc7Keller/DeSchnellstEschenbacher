<!DOCTYPE html>
<html>

<head>
	<title>Administration - Person bearbeiten</title>
	<link rel="stylesheet" href="_css/style.css" type="text/css">
	<link rel="stylesheet" href="_css/style_person.css" type="text/css">
	
	
	
</head>

<body>

	<div id="sitediv">
		
			<a href="index.php"><img id="scdiemberg_logo" src="_img/sportclubdiemberg_logo_klein.png"/></a>
			<a href="index.php"><img id="deschnellsteschenbacher_logo" src="_img/deschnellsteschenbacher_logo_klein.png"/></a>
			
			<?php
             include 'includes/navigation.php';
            ?>
		
		<div id="content">
		
		<h1 id="site_title">Person bearbeiten</h1>
		
		<form id="form_verwaltung" action="" method="POST">
			</br><p style="font-size: 11px;">Felder mit * markiert sind Pflichtfelder</p>
			<p style="font-size: 11px;">Felder mit ** markiert sind Pflichtfelder für Teilnehmer</p></br>
			
			<input type="Radio" name="personentyp" value="lehrperson"> Lehrperson&nbsp
			<input type="Radio" name="personentyp" value="teilnehmer" checked> Teilnehmer</br></br>
				
			Person:*		<select  id="person" type="text" name="person" size="1">
										<option>Alguacil Dominique</option>
										<option>Bisig Christian</option>
										<option>Keller Marc</option>
							</select></br>
			Geburtsdatum:**	<input id="gebdatum" class="form_cells" type="text" name="gebdatum"/></br>
			Strasse:		<input id="strasse" class="form_cells" type="text" name="strasse"/></br>
			Hausnummer:		<input id="hausnummer" class="form_cells" type="text" name="hausnummer"/></br>
			PLZ:			<input id="plz" class="form_cells" type="text" name="plz"/></br>
			Ort:**			<input id="ort" class="form_cells" type="text" name="ort"/></br>
			
			<input id="radio1" type="Radio" name="aktivitaet" value="aktiv" checked> Aktiv&nbsp
			<input type="Radio" name="aktivitaet" value="inaktiv"> Inaktiv</br></br>
							<input id="speichern_button"type="submit" name="submit" value="Speichern"/>
		</form>
		
		</div>
		
		<div id="footer">
		</div>
	
	
	</div>
</body>

</html>