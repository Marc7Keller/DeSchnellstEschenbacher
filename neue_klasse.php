<!DOCTYPE html>
<html>

<head>
	<title>Administration - Neue Klasse</title>
	<link rel="stylesheet" href="_css/style.css" type="text/css">
	<link rel="stylesheet" href="_css/style_klasse.css" type="text/css">
	
	<?php 
            include("php/config.php");
    ?>
    
	 <?php
    if(isset($_POST['bezeichnung']))
	{
	    $sql = "INSERT INTO `sport_program`.`class` (`stufe`, `bezeichnung`, `fs_teacher`) VALUES ('".$_POST['stufe']."','".$_POST['bezeichnung']."','".$_POST['klassenlehrperson']."');";
        $res = mysqli_query($db,$sql);
    }
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
		
		<h1 id="site_title">Neue Klasse</h1>
		
		<form id="form_verwaltung" action="neue_klasse.php" method="POST">
			</br><p style="font-size: 11px;">Felder mit * markiert sind Pflichtfelder</p></br>
			Stufe:*		<select  id="stufe" type="text" name="stufe" size="1">
										<option>1. Klasse</option>
										<option>2. Klasse</option>
										<option>3. Klasse</option>
										<option>4. Klasse</option>
										<option>5. Klasse</option>
										<option>6. Klasse</option>
										<option>7. Klasse</option>
										<option>8. Klasse</option>
										<option>9. Klasse</option>
									</select></br>
			Bezeichnung:*		<input  id="bezeichnung" type="text" name="bezeichnung"/></br>
			
			<?php 
				$sql = "SELECT * FROM `teacher`inner join person on (person_id = fs_person);";
				$res = mysqli_query($db,$sql);
			?>
			Klassenlehrperson:*		<?php
			echo"<select  id='klassenlehrperson' type='text' name='klassenlehrperson' size='1'>";
										while($row = mysqli_fetch_array($res)){
										echo"<option value=".$row['teacher_id'].">".$row['name']." ".$row['firstname']."</option>";
									};
									echo "</select></br></br>";
									?>
								<input id="speichern_button"type="submit" name="submit" value="Speichern"/>
		</form>
		
		</div>
		
		<div id="footer">
		</div>
	
	
	</div>
</body>

</html>