<!DOCTYPE html>
<html>

<head>
	<title>Administration - Neue Lehrperson</title>
	<link rel="stylesheet" href="_css/style.css" type="text/css">
	<link rel="stylesheet" href="_css/style_person.css" type="text/css">
	
	<?php
		error_reporting(0);
		include 'php/config.php';
		include 'includes/sessions.php';
		include 'includes/incl_neue_lehrperson_form.php';
    ?>
	
</head>

<body>

	<div id="sitediv">
		
		<a><img id="scdiemberg_logo" src="_img/sportclubdiemberg_logo_klein.png"/></a>
		<a><img id="deschnellsteschenbacher_logo" src="_img/deschnellsteschenbacher_logo_klein.png"/></a>
			
		<?php
			include 'includes/navigation.php';
		?>
		
		<div id="content">
		
			<?php
				include 'includes/event_selection.php';
			?>
				
			<h1 id="site_title">Neue Lehrperson</h1>
		
			<form id="form_verwaltung" action="neue_person.php" method="POST">				
				Nachname:*				<input  id="nachname" type="text" name="name"/></br>
				Vorname:*				<input id="vorname" class="form_cells" type="text" name="vorname"/></br>
				Strasse:				<input id="strasse" class="form_cells" type="text" name="strasse"/></br>
				PLZ:					<input id="plz" class="form_cells" type="text" name="plz"/></br>
				Ort:					<input id="ort" class="form_cells" type="text" name="ort"/></br></br>
				
				Letztes aktives Jahr:	<input id="letztes_aktives_jahr" class="form_cells" type="text" name="letztes_aktives_jahr"/></br></br>
										<input id="speichern_button"type="submit" name="speichern_button_neue_lehrperson" value="Speichern"/>
			</form>
		
			<?php 
				echo "<br><br><br><br>";
			
				$sql = "SELECT * FROM `teacher` inner join person on fs_person = person.person_id ORDER BY teacher_id desc;";
				$res = mysqli_query($db,$sql);
				
				if(mysqli_num_rows($res) >= 1)
				{	 
					echo '<table border="1" style="width:100%">'; 
					echo "<tr><th>Name</th><th>Vorname</th><th>Letztes aktives Jahr</th></tr>"; 
					
					while($row = mysqli_fetch_array($res))
					{
						echo "<tr><td>"; 
						echo $row['name'];
						echo "</td><td>"; 
						echo $row['firstname'];
						echo "</td><td>"; 
						echo $row['last_active_year'];
						echo "</td></tr>";
					}
					
					echo "</table>";
				}
				else 
				{
					echo "There was no matching record for the name " . $searchTerm;
				}
			
			?>
			
		</div>
		
		<div id="footer">
		</div>
	
	</div>
</body>

</html>