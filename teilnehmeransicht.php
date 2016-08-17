<!DOCTYPE html>
<html>

<head>

	<title>Administration - Teilnehmeransicht</title>
	<link rel="stylesheet" href="_css/style.css" type="text/css">
	<link rel="stylesheet" href="_css/style_teilnehmer.css" type="text/css">
	<script src="_js/teilnehmer.js" type="text/javascript"></script>

    <?php 
		error_reporting(0);
        include 'php/config.php';
		include 'includes/sessions.php';
    ?>
 
	<?php
		if(isset($_GET['laden_button_name_teilnehmeransicht']))
		{
			$vorname =$_GET['vorname_teilnehmeransicht_suche'];
			$nachname =$_GET['nachname_teilnehmeransicht_suche'];

			$sql = "SELECT * FROM participants INNER JOIN person ON participants.fs_person=person.person_id INNER JOIN class ON participants.fs_class=class.class_id INNER JOIN category ON participants.fs_category=category.category_id INNER JOIN event ON participants.fs_event=event.event_id WHERE person.name = '".$nachname."' and person.firstname= '".$vorname."' && event.event_id= '".$_SESSION['event']."';";
    
			$res = mysqli_query($db,$sql);
    
			if (!$res) 
			{
				printf("Error: %s\n", mysqli_error($db));
				exit();
			}
    
			$count = mysqli_num_rows ($res);
    
			if ($count =0)
			{
				echo '<script type="text/javascript">alert("Test");</script>';
			}
			else
			{
				while($row = mysqli_fetch_array($res))
				{
					$vorname = $row['firstname'];
					$nachname = $row['name'];
					$gebjahr = $row['year_of_birth'];
					$strasse = $row['street'];
					$plz = $row['plz'];
					$ort = $row['place'];
					$klasse = $row['class_name'];
					$kategorie = $row['category_name'];
					$startnummer = $row['start_number'];
				}          
			}
		}
		
		if(isset($_GET['laden_button_startnummer_teilnehmeransicht']))
		{
			$startnummer = $_GET['startnummer_teilnehmeransicht_suche'];
			
			$sql = "SELECT * FROM participants INNER JOIN person ON participants.fs_person=person.person_id INNER JOIN class ON participants.fs_class=class.class_id INNER JOIN category ON participants.fs_category=category.category_id INNER JOIN event ON participants.fs_event=event.event_id WHERE start_number = '".$startnummer."' && event.event_id= '".$_SESSION['event']."';";
			
			$res = mysqli_query($db,$sql);
    
			if (!$res) 
			{
				printf("Error: %s\n", mysqli_error($db));
				exit();
			}
    
			$count = mysqli_num_rows ($res);
    
			if ($count =0)
			{
				echo '<script type="text/javascript">alert("Test");</script>';
			}
			else
			{
				while($row = mysqli_fetch_array($res))
				{
					$vorname = $row['firstname'];
					$nachname = $row['name'];
					$gebjahr = $row['year_of_birth'];
					$strasse = $row['street'];
					$plz = $row['plz'];
					$ort = $row['place'];
					$klasse = $row['class_name'];
					$kategorie = $row['category_name'];
					$startnummer = $row['start_number'];
				}          
			}
		}
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
			
			<h1 id="site_title">Teilnehmeransicht</h1></br>
			
			<form id="form_verwaltung" action="" method="GET">
			
				Nachname:*		<input  class="form_cells" type="text" id="nachname_teilnehmeransicht_suche" name="nachname_teilnehmeransicht_suche" value="<?php if(isset($_GET['nachname'])){echo $nachname;}?>"  onblur="colorEmptyField9();" onkeyup="enableLoadButtonNameSearch();"/></br>
				Vorname:*		<input class="form_cells" type="text" id="vorname_teilnehmeransicht_suche" name="vorname_teilnehmeransicht_suche" value="<?php if(isset($_GET['vorname'])){echo $vorname;}?>" onblur="colorEmptyField10();" onkeyup="enableLoadButtonNameSearch();"/></br></br>
    
				<input id="laden_button_name" type="submit" name="laden_button_name_teilnehmeransicht" value="Nach nach Name suchen" disabled/>
    
			</form>
			
			<form id="form_verwaltung" action="" method="GET">
			
				Startnummer:*	<input id="startnummer_teilnehmeransicht_suche" class="form_cells" type="text" name="startnummer_teilnehmeransicht_suche" value="<?php if(isset($_GET['startnummer'])){echo $startnummer;}?>" onblur="colorEmptyField11();" onkeyup="enableLoadButtonStartnumberSearch();"/></br></br>
    
				<input id="laden_button_startnummer" type="submit" name="laden_button_startnummer_teilnehmeransicht" value="Nach Startnummer suchen" diabled/></br></br>
    
			</form>

			<form id="form_verwaltung" action="" method="POST">
	
				<?php
					if(isset($_GET['laden_button_name_teilnehmeransicht']) || isset($_GET['laden_button_startnummer_teilnehmeransicht']))
					{
				?>
				Vorname:		<input disabled id="vorname_teilnehmeransicht" class="form_cells" type="text" name="vorname_teilnehmeransicht" value="<?php echo $vorname;?>" /></br>
				Nachname:		<input disabled id="nachname_teilnehmeransicht" class="form_cells" type="text" name="nachname_teilnehmeransicht" value="<?php echo $nachname;?>" /></br></br>
				Geburtsjahr:	<input disabled id="gebjahr_teilnehmeransicht" class="form_cells" type="text" name="gebjahr_teilnehmeransicht" value="<?php echo $gebjahr;?>"/></br>
				Strasse:		<input disabled id="strasse_teilnehmeransicht" class="form_cells" type="text" name="strasse_teilnehmeransicht" value="<?php echo $strasse;?>"/></br>
				PLZ:			<input disabled id="plz_teilnehmeransicht" class="form_cells" type="text" name="plz_teilnehmeransicht" value="<?php echo $plz;?>"/></br>
				Ort:			<input disabled id="ort_teilnehmeransicht" class="form_cells" type="text" name="ort_teilnehmeransicht" value="<?php echo $ort;?>"/></br></br>
				Klasse:			<input disabled id="klasse_teilnehmeransicht" class="form_cells" type="text" name="klasse_teilnehmeransicht" value="<?php echo $klasse;?>"/></br> 
				Kategorie:		<input disabled id="kategorie_teilnehmeransicht" class="form_cells" type="text" name="kategorie_teilnehmeransicht" value="<?php echo $kategorie;?>"/></br></br>
				Startnummer:	<input disabled id="startnummer_teilnehmeransicht" class="form_cells" type="text" name="startnummer_teilnehmeransicht" value="<?php echo $startnummer;?>"/></br>
    
				</br></br>
			
			</form>
		
			<?php
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