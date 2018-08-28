<!DOCTYPE html>
<html>

    <head>
        <title>Webseite</title>
		<link rel="stylesheet" href="_css/style.css" type="text/css">
		<link rel="stylesheet" href="_css/style_teilnehmer.css" type="text/css">
		<script src="_js/startliste_exportieren.js" type="text/javascript"></script>

		<?php 
            include("php/config.php");
            include("includes/sessions4.php");
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
			
				<?php
					include 'includes/event_selection.php';
				?>
				
                <?php
                    $sql= "SELECT * from category where fs_event = ".$_SESSION['event'].";";
                    $res = mysqli_query($db,$sql);
                ?>
				
				<h1 id="site_title">Andenkkarten für den folgenden Teilnehmer generieren:</h1></br>
				
				<form id="form_verwaltung" action="" method="GET">
					Nachname:		<input class="form_cells" type="text" id="nachname_teilnehmeransicht_suche" name="nachname_teilnehmeransicht_suche" value="<?php if(isset($_GET['nachname_teilnehmeransicht_suche'])){echo $_GET['nachname_teilnehmeransicht_suche'];}?>"/></br>
					Vorname:		<input class="form_cells" type="text" id="vorname_teilnehmeransicht_suche" name="vorname_teilnehmeransicht_suche" value="<?php if(isset($_GET['vorname_teilnehmeransicht_suche'])){echo $_GET['vorname_teilnehmeransicht_suche'];}?>"/></br>
					<input id="laden_button_name" type="submit" name="laden_button_name_andenkkarte" value="Nach Name filtern"/>		
				</form>
				</br>
			<form id="form_verwaltung" action="" method="GET">
				Startnummer:	<input id="startnummer_teilnehmeransicht_suche" class="form_cells" type="text" name="startnummer_teilnehmeransicht_suche" value="<?php if(isset($_GET['startnummer_teilnehmeransicht_suche'])){echo $_GET['startnummer_teilnehmeransicht_suche'];}?>"/></br>
				<input id="laden_button_startnummer" type="submit" name="laden_button_startnummer_andenkkarte" value="Nach Startnummer filtern"/></br>
			</form>			
			<form id="form_verwaltung" action="" method="GET">
				<input id="laden_button_name" type="submit" name="show all" value="Alle Teilnehmer anzeigen"/>		
			</form>
			<?php	
				echo "<br><br><br>";
				if(isset($_GET['laden_button_startnummer_andenkkarte']) || isset($_POST['laden_button_startnummer_andenkkarte']) || isset($_GET['laden_button_name_andenkkarte']) || isset($_POST['laden_button_name_andenkkarte']))
				{
					if(isset($_GET['laden_button_name_andenkkarte']) || isset($_POST['laden_button_name_andenkkarte']))
					{
						if(isset($_POST['laden_button_name_andenkkarte']))
						{
							$vorname =$_POST['vorname_teilnehmeransicht_suche'];
							$nachname =$_POST['nachname_teilnehmeransicht_suche'];
						}
						else
						{
							$vorname =$_GET['vorname_teilnehmeransicht_suche'];
							$nachname =$_GET['nachname_teilnehmeransicht_suche'];
						}
						
						if($vorname != "" && $nachname != "")
						{
						   $sql = "SELECT participant_id, name, firstname, year_of_birth, plz, person.place, street, class.class_name as classbez, category.category_name as catbez, start_number, late_registration FROM `participants` inner join `person` on person.person_id = participants.fs_person inner join `category` on category.category_id = participants.fs_category INNER JOIN `class` on class.class_id = participants.fs_class WHERE participants.fs_event = ".$_SESSION['event']." and deleted != 1 and person.firstname = '".$vorname."' and person.name = '".$nachname."' ORDER BY name asc;";
						}
						else
						{
							if($vorname != "")
							{
								$sql = "SELECT participant_id, name, firstname, year_of_birth, plz, person.place, street, class.class_name as classbez, category.category_name as catbez, start_number, late_registration FROM `participants` inner join `person` on person.person_id = participants.fs_person inner join `category` on category.category_id = participants.fs_category INNER JOIN `class` on class.class_id = participants.fs_class WHERE participants.fs_event = ".$_SESSION['event']." and deleted != 1 and person.firstname = '".$vorname."' ORDER BY name asc;"; 
							}
							else
							{
								$sql = "SELECT participant_id, name, firstname, year_of_birth, plz, person.place, street, class.class_name as classbez, category.category_name as catbez, start_number, late_registration FROM `participants` inner join `person` on person.person_id = participants.fs_person inner join `category` on category.category_id = participants.fs_category INNER JOIN `class` on class.class_id = participants.fs_class WHERE participants.fs_event = ".$_SESSION['event']." and deleted != 1 and person.name = '".$nachname."' ORDER BY name asc;"; 
							}
						}
					}
					else
					{
						if(isset($_GET['laden_button_startnummer_andenkkarte']))
						{
							$startnummer = $_GET['startnummer_teilnehmeransicht_suche'];
						}
						else
						{
							$startnummer = $_POST['startnummer_teilnehmeransicht_suche'];
						}
						$sql = "SELECT participant_id, name, firstname, year_of_birth, plz, person.place, street, class.class_name as classbez, category.category_name as catbez, start_number, late_registration FROM `participants` inner join `person` on person.person_id = participants.fs_person inner join `category` on category.category_id = participants.fs_category INNER JOIN `class` on class.class_id = participants.fs_class WHERE participants.fs_event = ".$_SESSION['event']." and deleted != 1 and start_number = '".$startnummer."' ORDER BY name asc;";
					}
				}
				else
				{
					$sql = "SELECT participant_id, name, firstname, year_of_birth, plz, person.place, street, class.class_name as classbez, category.category_name as catbez, start_number, late_registration FROM `participants` inner join `person` on person.person_id = participants.fs_person inner join `category` on category.category_id = participants.fs_category INNER JOIN `class` on class.class_id = participants.fs_class WHERE participants.fs_event = ".$_SESSION['event']." and deleted != 1 ORDER BY name asc;";
				}
				$res = mysqli_query($db,$sql);
	 
				if(mysqli_num_rows($res) >= 1)
				{	 
					echo '<table border="1" id="teilnehmer_tabelle">'; 
					echo "<tr><th>Name</th><th>Vorname</th><th>Geburtsjahr</th><th>PLZ</th><th>Ort</th><th>Strasse</th><th>Klasse</th><th>Kategorie</th><th>Startnummer</th><th>Nachanmeldung</th><th>Andenkkarte</th></tr>"; 
					
					while($row = mysqli_fetch_array($res))
					{
						echo '<form action="einzelne_andenkkarten_exportieren_fpdf.php" target="_blank" method="POST">';
						echo "<tr><td>"; 
						echo $row['name'];
						echo "</td><td>"; 
						echo $row['firstname'];
						echo "</td><td>";   
						echo $row['year_of_birth'];
						echo "</td><td>";    
						echo $row['plz'];
						echo "</td><td>";
						echo $row['place'];
						echo "</td><td>";
						echo $row['street'];
						echo "</td><td>";
						echo $row['classbez'];
						echo "</td><td>";
						echo $row['catbez'];
						echo "</td><td>";
						echo $row['start_number'];
						echo "</td><td>";
						echo $row['late_registration'];
						echo "</td><td>";
						echo "<input id='laden_button' type='submit' name='laden_button_andenkkarte_generieren' value='generieren'/>";
						echo "</td></tr>";
						?>							
							<input hidden="text" name="participant_id" value="<?php echo $row['participant_id'];?>"/>
							<input hidden="text" name="startnummer_teilnehmeransicht_suche" value="<?php echo $_GET['startnummer_teilnehmeransicht_suche'];?>"/>
							<input hidden="text" name="vorname_teilnehmeransicht_suche" value="<?php echo $_GET['vorname_teilnehmeransicht_suche'];?>"/>
							<input hidden="text" name="nachname_teilnehmeransicht_suche" value="<?php echo $_GET['nachname_teilnehmeransicht_suche'];?>"/>
							<input hidden="text" name="laden_button_startnummer_andenkkarte" value="<?php echo $_GET['laden_button_startnummer_andenkkarte'];?>"/>
							<input hidden="text" name="laden_button_name_andenkkarte" value="<?php echo $_GET['laden_button_name_andenkkarte'];?>"/>
						<?php
						echo "</form>";
					}
					
					echo "</table>";
				}
				else 
				{
					echo "There was no matching record for the name " . $searchTerm;
				}
				
			?>	
			<br>
			<br>
            </div>

            <div id="footer">
				<center>
					<?php
						include 'includes/logout.php';
					?>
				</center>
			</div>
			
        </div>
    </body>

</html>