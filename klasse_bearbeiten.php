<!DOCTYPE html>
<html>

<head>
	<title>Administration - Neue Klasse</title>
	<link rel="stylesheet" href="_css/style.css" type="text/css">
	<link rel="stylesheet" href="_css/style_klasse.css" type="text/css">
	
	<?php 
			error_reporting(E_ERROR | E_PARSE);
            include("php/config.php");
    ?>
    
	<?php
    if(isset($_POST['stufe']))
	{
	    $sql = "UPDATE `sport_program`.`class` SET `stufe` = '".$_POST['stufe']."', `fs_teacher` = '".$_POST['klassenlehrperson']."' WHERE `class`.`class_id` = '".$_POST['class_id']."';";
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
		
		<h1 id="site_title">Klasse bearbeiten</h1>
		
		<form id="form_verwaltung" action="klasse_bearbeiten.php" method="POST">
			</br><p style="font-size: 11px;">Felder mit * markiert sind Pflichtfelder</p></br>
			<?php 
				$sql = "SELECT * FROM `class`;";
				$res = mysqli_query($db,$sql);
			?>
			Klasse:*	<?php
			
			echo "<select id='klasse' type='text' name='klasse' size='1'>";
										while($row = mysqli_fetch_array($res)){
										if(isset($_POST['klasse']) and $row['class_id']==$_POST['klasse'])
											{
												echo"<option selected = 'selected' value=".$row['class_id'].">".$row['bezeichnung']." ".$row['firstname']."</option>";
											}
											else{
										echo"<option value=".$row['class_id'].">".$row['bezeichnung']." ".$row['firstname']."</option>";
										}
									};
										?>
								</select></br></br>
			<input id="speichern_button"type="submit" name="submit" value="Speichern"/>
			</form>
			

			<form id="form_verwaltung" action="klasse_bearbeiten.php" method="POST">
			Stufe:*				<select  id="stufe" type="text" name="stufe" size="1">
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
											<?php
				if(isset($_POST['klasse']))
				{
					$sql = "SELECT * FROM `class`inner join teacher on (fs_teacher = teacher_id) inner join person on (person_id = fs_person);";
				}
				else
				{
					$sql = "SELECT * FROM `teacher`inner join person on (person_id = fs_person);";
				}
				$res = mysqli_query($db,$sql);
			?>
			Klassenlehrperson:*		<?php
									echo"<select  id='klassenlehrperson' type='text' name='klassenlehrperson' size='1'>";
										while($row = mysqli_fetch_array($res)){
										if(isset($_POST['klasse']) and $_POST['klasse']==$row['class_id'])
										{
											echo"<option selected = 'selected' value=".$row['teacher_id'].">".$row['name']." ".$row['firstname']."</option>";
										}
										else{
											echo"<option value=".$row['teacher_id'].">".$row['name']." ".$row['firstname']."</option>";
										}
									};
									echo "</select></br></br>";
									?>
									</select></br></br>
									<?php
										echo "<input type='hidden' name='class_id' value='".$_POST['klasse']."'>";
									?>
								<input id="speichern_button"type="submit" name="submit" value="Speichern"/>
		</form>
		
		</div>
		
		<div id="footer">
		</div>
	
	
	</div>
</body>

</html>