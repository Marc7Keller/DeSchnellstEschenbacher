<!DOCTYPE html>
<html>

<head>

	<title>Administration - Neuer Teilnehmer</title>
	<link rel="stylesheet" href="_css/style.css" type="text/css">
	<link rel="stylesheet" href="_css/style_teilnehmer.css" type="text/css">

    
    <?php 
            include("php/config.php");
    ?>
    
    
	<script>
        //Livesearch
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,false);
  xmlhttp.send();
}
    </script>

<?php
if(isset($_GET['vorname'])){
    
    $vorname =$_GET['vorname'];
    $nachname =$_GET['nachname'];

    $sql = "SELECT * FROM `person` where `name` = '".$nachname."' and `firstname` = '".$vorname."';";
    
    $res = mysqli_query($db,$sql);
    
    if (!$res) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}
    $count = mysqli_num_rows ( $res );
    echo $count;
    if ($count =0){
            $id='';
           $gebdatum = '';
           $strasse = '';
           $plz = '';
           $ort = '';
    }else{
    while($row = mysqli_fetch_array($res)){
    
           $id=$row['person_id'];
           $gebdatum = $row['birthdate'];
           $strasse = $row['street'];
           $plz = $row['plz'];
           $ort = $row['place'];
            }
            
          
}
}
if(isset($_POST['gebdatum']))
{
    
    $id = $_POST['id'];
    
    $vorname =$_POST['vorname'];
    $nachname =$_POST['nachname'];
    $gebdatum = $_POST['gebdatum'];
    $strasse = $_POST['strasse'];
    $plz = $_POST['plz'];
    $ort = $_POST['ort'];
    
    $anlass = $_POST['anlass'];
    $klasse = $_POST['klasse'];
    $kategorie = $_POST['kategorie'];
    
    if($id=''){         
             
               $id = 0;
            } 
    
    
    if($id !=0){
        
        $sql = "Update `person` set `name` = '".$nachname."' , `firstname` = '".$vorname."', `birthdate` = '".$gebdatum."', `plz` = '".$plz."', `place` = '".$ort."', `street` = '".$strasse."' where `person_id` = ".$id.";";
        $res = mysqli_query($db,$sql);
         if (!$res) {    printf("Error: %s\n", mysqli_error($db));    exit();    }
    }else{
      
        $sql = "INSERT INTO `person` (`name`, `firstname`, `birthdate`, `plz`, `place`, `street`) VALUES ('".$nachname."', '".$vorname."', '".$gebdatum."', '".$plz."', '".$ort."', '".$strasse."');";
        $res = mysqli_query($db,$sql);
        if (!$res) {    printf("Error: %s\n", mysqli_error($db));    exit();    }
        $sql = "SELECT person_id FROM person WHERE name = '".$nachname."' AND firstname =  '".$vorname."';";
        $res = mysqli_query($db,$sql);
        if (!$res) {    printf("Error: %s\n", mysqli_error($db));    exit();    }
        $row = mysqli_fetch_array($res);
        $id= $row['person_id'];
        
        
        
        
}
   
   $sql = "INSERT INTO participants (fs_person,fs_class,fs_category,fs_event) VALUES (".$id.",".$klasse.",".$kategorie.",".$anlass.");";
        $res = mysqli_query($db,$sql); 
      if (!$res) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}
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
						<li><a href="#">Lehrerverwaltung</a>
							<ul>
								<li><a href="neuer_lehrer.php">Neuer Lehrer</a></li>
								<li><a href="lehrer_bearbeiten.php">Lehrer bearbeiten</a></li>
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
		
		<h1 id="site_title">Neuer Teilnehmer</h1>
		
		<form id="form_verwaltung" action="" method="GET">
			</br><p style="font-size: 11px;">Felder mit * markiert sind Pflichtfelder</p></br>
			
            Nachname:*		<input  class="form_cells" type="text" name="nachname" value="<?php if(isset($_GET['nachname'])){echo $nachname;}?>"  onkeyup="showResult(this.value)"/></br>
    <div id="livesearch"></div>
			Vorname:*		<input id="vorname" class="form_cells" type="text" name="vorname" value="<?php if(isset($_GET['vorname'])){echo $vorname;}?>" onkeyup="showResult(this.value)"/></br>
    
     <input id="speichern_button"type="submit" name="submit" value="Speichern"/>
    
    </form>

<form id="form_verwaltung" action="neuer_teilnehmer.php" method="POST">
    <?php
    if(isset($_GET['vorname']) && isset($_GET['nachname'])){
    ?>
                            <input  class="form_cells" type="hidden" name="id" value="<?php echo $id;?>" /></br>
                            <input  class="form_cells" type="hidden" name="vorname" value="<?php if(isset($_GET['vorname'])){echo $vorname;}?>" /></br>
                            <input  class="form_cells" type="hidden" name="nachname" value="<?php if(isset($_GET['nachname'])){echo $nachname;}?>" /></br>
            Geburtsdatum:**	<input id="gebdatum" class="form_cells" type="text" name="gebdatum" value="<?php echo $gebdatum;?>"/></br>
			Strasse:		<input id="strasse" class="form_cells" type="text" name="strasse" value="<?php echo $strasse;?>"/></br>
			PLZ:			<input id="plz" class="form_cells" type="text" name="plz" value="<?php echo $plz;?>"/></br>
			Ort:**			<input id="ort" class="form_cells" type="text" name="ort" value="<?php echo $ort;?>"/></br></br>
							
    
     <br><hr><br>
			<?php
            echo 'Anlass:* <select  id="anlass" type="text" name="anlass" size="1">';
            $res2 = mysqli_query($db,"SELECT * FROM event;");
           
            while($row = mysqli_fetch_array($res2))
            {
                echo '<option value="'.$row['event_id'].'">'.$row['event_name'].'</option>';
            }
            
            echo '</select><br>';
        
            
        echo 'Klasse:* <select  id="klasse" type="text" name="klasse" size="1">';
            $res2 = mysqli_query($db,"SELECT * FROM class;");
           
            while($row = mysqli_fetch_array($res2))
            {
                echo '<option value="'.$row['class_id'].'">'.$row['bezeichnung'].'</option>';
            }
            
            echo '</select><br>';


        echo 'Kategorie:*  <select  id="kategorie" type="text" name="kategorie" size="1">';
            $res2 = mysqli_query($db,"SELECT * FROM category;");
           
            while($row = mysqli_fetch_array($res2))
            {
                echo '<option value="'.$row['category_id'].'">'.$row['bezeichnung'].'</option>';
            }
            
            echo '</select>';


?>

            <input id="speichern_button"type="submit" name="submit" value="Speichern"/>
			
		</form>
		<?php
    }
    ?>
		</div>
		
		<div id="footer">
		</div>
	
	
	</div>
</body>

</html>