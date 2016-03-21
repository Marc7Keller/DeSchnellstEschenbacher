<!DOCTYPE html>
<html>

<head>
	<title>Administration - Neuer Anlass</title>
	<link rel="stylesheet" href="_css/style.css" type="text/css">
	<link rel="stylesheet" href="_css/style_anlass.css" type="text/css">
	<?php 
            include("php/config.php");
            include 'include/incl_neuer_anlass_form.php'
    ?>
	
	
</head>

<body>

	<div id="sitediv">
		
			<a href="index.php"><img id="scdiemberg_logo" src="_img/sportclubdiemberg_logo_klein.png"/></a>
			<a href="index.php"><img id="deschnellsteschenbacher_logo" src="_img/deschnellsteschenbacher_logo_klein.png"/></a>
			
			<?php
             include 'includes/navigation.php';
            ?>
		
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