<!DOCTYPE html>
<html>

<head>

	<title>Administration - Neue Nachanmeldung</title>
	<link rel="stylesheet" href="_css/style.css" type="text/css">
	<link rel="stylesheet" href="_css/style_teilnehmer.css" type="text/css">
	<script src="_js/teilnehmer.js" type="text/javascript"></script>

    <?php 
		error_reporting(0);
        include 'php/config.php';
		include 'includes/sessions.php';
    ?>

	<script>
        //Livesearch
		function showResult(str) 
		{
			if (str.length==0) 
			{ 
				document.getElementById("livesearch").innerHTML="";
				document.getElementById("livesearch").style.border="0px";
				return;
			}
			if (window.XMLHttpRequest) 
			{
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			} 
			else 
			{  // code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function() 
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200) 
				{
					document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
					document.getElementById("livesearch").style.border="1px solid #A5ACB2";
				}
			}
			xmlhttp.open("GET","livesearch.php?q="+str,false);
			xmlhttp.send();
		}
    </script>
 
	<?php
		if(isset($_GET['vorname']))
		{
			$vorname =$_GET['vorname'];
			$nachname =$_GET['nachname'];

			$sql = "SELECT * FROM `person` where `name` = '".$nachname."' and `firstname` = '".$vorname."';";
    
			$res = mysqli_query($db,$sql);
    
			if (!$res) 
			{
				printf("Error: %s\n", mysqli_error($db));
				exit();
			}
    
			$count = mysqli_num_rows ($res);
    
			if ($count =0)
			{
				$id='';
				$gebdatum = '';
				$strasse = '';
				$plz = '';
				$ort = '';
			}
			else
			{
				while($row = mysqli_fetch_array($res))
				{
					$id = $row['person_id'];
					$gebdatum = $row['birthdate'];
					$strasse = $row['street'];
					$plz = $row['plz'];
					$ort = $row['place'];
				}          
			}
		}
		
		if(isset($_POST['speichern_button_neuer_teilnehmer']))
		{
			$id = $_POST['id'];
			$vorname =$_POST['vorname'];
			$nachname =$_POST['nachname'];
			$gebdatum = $_POST['gebdatum'];
			$strasse = $_POST['strasse'];
			$plz = $_POST['plz'];
			$ort = $_POST['ort'];
			
			$anlass = $_SESSION['event'];
			$kategorie = $_POST['kategorie'];
    
			if($id='')
			{         
				$id = 0;
            } 
    
			if($id !=0)
			{
				$sql = "Update `person` set `name` = '".$nachname."' , `firstname` = '".$vorname."', `birthdate` = '".$gebdatum."', `plz` = '".$plz."', `place` = '".$ort."', `street` = '".$strasse."' where `person_id` = ".$id.";";
				$res = mysqli_query($db,$sql);
				
				if (!$res) 
				{    
					printf("Error: %s\n", mysqli_error($db));    
					exit();    
				}
			}
			else
			{
				$sql = "INSERT INTO `person` (`name`, `firstname`, `birthdate`, `plz`, `place`, `street`) VALUES ('".$nachname."', '".$vorname."', '".$gebdatum."', '".$plz."', '".$ort."', '".$strasse."');";
				$res = mysqli_query($db,$sql);
				
				if (!$res) 
				{    
					printf("Error: %s\n", mysqli_error($db));    
					exit();    
				}
       
				$sql = "SELECT person_id FROM person WHERE name = '".$nachname."' AND firstname =  '".$vorname."';";
				$res = mysqli_query($db,$sql);
				
				if (!$res) 
				{    
					printf("Error: %s\n", mysqli_error($db));    
					exit(); 
				}
        
				$row = mysqli_fetch_array($res);
				$id= $row['person_id'];       
			}
   
			$sql = "INSERT INTO participants (fs_person,fs_category,fs_event,late_registration) VALUES (".$id.",".$kategorie.",".$anlass.",1);";
			$res = mysqli_query($db,$sql); 
		
			if (!$res) 
			{
				printf("Error: %s\n", mysqli_error($db));
				exit();
			}
		}
	?>
   
</head>

<body onload="setFocus();">

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
			
			<h1 id="site_title">Neue Nachanmeldung / Neuer Plauschteilnehmer</h1>
		
			<form id="form_verwaltung" action="" method="GET">
			
				</br><p style="font-size: 11px;">Felder mit * markiert sind Pflichtfelder</p></br>
			
				Nachname:*		<input  class="form_cells" type="text" id="nachname" name="nachname" value="<?php if(isset($_GET['nachname'])){echo $nachname;}?>"  onkeyup="showResult(this.value)" onblur="colorEmptyField1();" onchange="enableLoadButton();"/></br>
				Vorname:*		<input id="vorname" class="form_cells" type="text" id="vorname" name="vorname" value="<?php if(isset($_GET['vorname'])){echo $vorname;}?>" onkeyup="showResult(this.value)" onblur="colorEmptyField2();" onchange="enableLoadButton();"/></br></br>
    
								<input id="laden_button" type="submit" name="laden_button_neuer_teilnehmer" value="Laden" disabled/>
    
			</form>

			<form id="form_verwaltung" action="neue_nachanmeldung.php" method="POST">
			
				<?php
					if(isset($_GET['vorname']) && isset($_GET['nachname']))
					{
				?>
								<input  class="form_cells" type="hidden" name="id" value="<?php echo $id;?>" /></br>
								<input  class="form_cells" type="hidden" name="vorname" value="<?php if(isset($_GET['vorname'])){echo $vorname;}?>" />
								<input  class="form_cells" type="hidden" name="nachname" value="<?php if(isset($_GET['nachname'])){echo $nachname;}?>" />
				Geburtsdatum:*	<input id="gebdatum" class="form_cells" type="text" name="gebdatum" value="<?php echo $gebdatum;?>" onblur="colorEmptyField3();" onchange="enableSubmitButton();"/></br>
				Strasse:		<input id="strasse" class="form_cells" type="text" name="strasse" value="<?php echo $strasse;?>"/></br>
				PLZ:			<input id="plz" class="form_cells" type="text" name="plz" value="<?php echo $plz;?>"/></br>
				Ort:*			<input id="ort" class="form_cells" type="text" name="ort" value="<?php echo $ort;?>" onblur="colorEmptyField4();" onchange="enableSubmitButton();"/></br></br>
							
    
				</br></br>
			
				<?php
					echo 'Kategorie:*  <select  id="kategorie" type="text" name="kategorie" size="1">';
				
					$res2 = mysqli_query($db,"SELECT * FROM category WHERE fs_event = ".$_SESSION['event']." ORDER BY category_id desc;");
			
					while($row = mysqli_fetch_array($res2))
					{
						echo '<option value="'.$row['category_id'].'">'.$row['category_name'].' / '.$row['track_length'].'m'.' / '.$row['year_of_birth_start'].' - '.$row['year_of_birth_end'].' / '.$row['gender'].'</option>';
					}
            
					echo '</select></br></br>';
				?>

								<input id="speichern_button"type="submit" name="speichern_button_neuer_teilnehmer" value="Speichern"/>
			
			</form>
		
			<?php
					}
				
				echo "</br></br></br></br>";
	
				$sql = "SELECT name, firstname, birthdate, plz, person.place, street, class.class_name as classbez, category.category_name as catbez, late_registration, start_number FROM `participants` inner join `person` on person.person_id = participants.fs_person inner join `category` on category.category_id = participants.fs_category INNER JOIN `class` on class.class_id = participants.fs_class WHERE participants.fs_event = ".$_SESSION['event']." AND late_registration = 1 ORDER BY participant_id desc;";
				$res = mysqli_query($db,$sql);
	 
				if(mysqli_num_rows($res) >= 1)
				{	 
					echo '<table border="1" id="teilnehmer_tabelle">'; 
					echo "<tr><th>Name</th><th>Vorname</th><th>Geburtsdatum</th><th>PLZ</th><th>Ort</th><th>Strasse</th><th>Kategorie</th><th>Startnummer</th></tr>"; 
					
					while($row = mysqli_fetch_array($res))
					{
						echo "<tr><td>"; 
						echo $row['name'];
						echo "</td><td>"; 
						echo $row['firstname'];
						echo "</td><td>";   
						echo $row['birthdate'];
						echo "</td><td>";    
						echo $row['plz'];
						echo "</td><td>";
						echo $row['place'];
						echo "</td><td>";
						echo $row['street'];
						echo "</td><td>";
						echo $row['catbez'];
						echo "</td><td>";
						echo $row['start_number'];
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
			<center>
				<?php
					include 'includes/logout.php';
				?>
			</center>
		</div>
		
	</div>
</body>

</html>