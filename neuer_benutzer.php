<!DOCTYPE html>
<html>

<head>
	<title>Administration - Neuer Benutzer</title>
	<link rel="stylesheet" href="_css/style.css" type="text/css">
	<link rel="stylesheet" href="_css/style_benutzer.css" type="text/css">
	
	
	
</head>

<body>

	<div id="sitediv">
		
			<a href="index.php"><img id="scdiemberg_logo" src="_img/sportclubdiemberg_logo_klein.png"/></a>
			<a href="index.php"><img id="deschnellsteschenbacher_logo" src="_img/deschnellsteschenbacher_logo_klein.png"/></a>
			
			<?php
            include("php/config.php");
            ?>
		
		<div id="content">
		
		<h1 id="site_title">Neuer Benutzer</h1>
		
		<form id="form_verwaltung" action="" method="POST">
			</br><p style="font-size: 11px;">Felder mit * markiert sind Pflichtfelder</p></br>
			Benutzername:*		<input  id="benutzername" type="text" name="benutzername"/></br>
			Passwort:*					<input  id="passwort" type="password" name="passwort"/></br>
			Passwort wiederholen:*		<input  id="passwort_wdh" type="password" name="passwort_wdh"/></br></br>
			
			 <p style="font-weight: bold">Wählen Sie die gewünschten Berechtigungen:</p></br>
				<input type="checkbox" name="berechtigungen" value="zeit_erfassen"> Zeit erfassen</br> 
				<input type="checkbox" name="berechtigungen" value="teilnehmer_erfassen"> Teilnehmer erfassen</br> 
				<input type="checkbox" name="berechtigungen" value="benutzer_hinzufuegen"> Benutzer hinzufügen</br>
				<input type="checkbox" name="berechtigungen" value="alle_rechte"> Alle Rechte (Administrator)</br></br>
										<input id="speichern_button"type="submit" name="submit" value="Speichern"/>
		</form>
		
		</div>
		
		<div id="footer">
		</div>
	
	
	</div>
</body>

</html>