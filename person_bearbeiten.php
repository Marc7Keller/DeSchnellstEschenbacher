<!DOCTYPE html>
<html>

<head>
	<title>Administration - Person bearbeiten</title>
	<link rel="stylesheet" href="_css/style.css" type="text/css">
	<link rel="stylesheet" href="_css/style_person.css" type="text/css">
	
	<?php
		include 'php/config.php';
		include 'includes/sessions.php';
	    include 'includes/incl_lehrperson_bearbeiten_form.php';
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
				
			<h1 id="site_title">Lehrperson bearbeiten</h1>
		
			<form id="form_verwaltung" action="" method="GET">
			
				<?php 
					$sql = "SELECT * FROM `teacher` inner join person on fs_person = person.person_id;";
					$res = mysqli_query($db,$sql);
				?>
			
				<label style="font-weight: bold;">Person:*</label>
			
				<?php
					echo "<select  id='person' type='text' name='person' size='1'>";
				
					while($row = mysqli_fetch_array($res))
					{
						if(isset($_GET['person']) and $_GET['person'] == $row['person_id'])
						{
							echo"<option selected = 'selected' value=".$row['person_id'].">".$row['name']." ".$row['firstname']."</option>";
						}
						else
						{
							echo"<option value=".$row['person_id'].">".$row['name']." ".$row['firstname']."</option>";
						}
					};
				?>
			
				</select>
				</br></br>
			
				<input id="laden_button" type="submit" name="laden_button_lehrperson_bearbeiten" value="Laden"/>
			</form>
			
			<?php
				if(isset($_GET['person']))
				{
					$sql = "SELECT * FROM `person`,`teacher` WHERE person_id = '".$_GET['person']."' AND person_id = fs_person;";
					$res = mysqli_query($db,$sql);
					$row = mysqli_fetch_array($res);
					
					echo "<form id='form_verwaltung' action='person_bearbeiten.php' method='POST'>";
					echo "<input type='hidden' name='person_id' value='".$_GET['person']."'/>";
					echo "Vorname:				<input id='vorname' class='form_cells' type='text' name='vorname' value='".$row['firstname']."'/></br>";
					echo "Nachname:				<input id='nachname' class='form_cells' type='text' name='nachname' value='".$row['name']."'/></br>";
					echo "Strasse:				<input id='strasse' class='form_cells' type='text' name='strasse' value='".$row['street']."'/></br>";
					echo "PLZ:					<input id='plz' class='form_cells' type='text' name='plz' value='".$row['plz']."'/></br>";
					echo "Ort:					<input id='ort' class='form_cells' type='text' name='ort' value='".$row['place']."' /></br></br>";
					echo "Letztes aktives Jahr:	<input id='letztes_aktives_jahr' class='form_cells' type='text' name='letztes_aktives_jahr' value='".$row['last_active_year']."'/></br>";
					
					echo "<input id='speichern_button' type='submit' name='speichern_button_lehrperson_bearbeiten' value='Speichern'/>";
					echo "</form>";
					
				}
			?>
	
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