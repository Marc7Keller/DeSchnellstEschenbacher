<!DOCTYPE html>
<html>

<head>

	<title>Administration - Neuer Lehrer</title>
	<link rel="stylesheet" href="_css/style.css" type="text/css">
	<link rel="stylesheet" href="_css/style_lehrer.css" type="text/css">

    
    <?php 
            include("php/config.php");
			include("includes/sessions.php");
			include ("includes/event_selection.php");
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
    
    $letztesAktivesJahr = $_POST['letztesAktivesJahr'];
    
    if($id=''){         
             
               $id = 0;
            } 
    
    
    if($id !=0){
        
        $sql = "Update `person` set `name` = '".$nachname."' , `firstname` = '".$vorname."' where `person_id` = ".$id.";";
        $res = mysqli_query($db,$sql);
         if (!$res) {    printf("Error: %s\n", mysqli_error($db));    exit();    }
    }else{
      
        $sql = "INSERT INTO `person` (`name`, `firstname`) VALUES ('".$nachname."', '".$vorname."');";
        $res = mysqli_query($db,$sql);
        if (!$res) {    printf("Error: %s\n", mysqli_error($db));    exit();    }
        $sql = "SELECT person_id FROM person WHERE name = '".$nachname."' AND firstname =  '".$vorname."';";
        $res = mysqli_query($db,$sql);
        if (!$res) {    printf("Error: %s\n", mysqli_error($db));    exit();    }
        $row = mysqli_fetch_array($res);
        $id= $row['person_id'];
        
        
        
        
}
   
   $sql = "INSERT INTO teacher (last_active_year,fs_person) VALUES (".$letztesAktivesJahr.",".$id.");";
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
			
		<?php 
			include ("includes/navigation.php");
		?>
		
		<div id="content">
		
		<h1 id="site_title">Neuer Lehrer</h1>
		
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
							
    
     <br><hr><br>
	
	Letztes aktives Jahr:	<input id="letztesAktivesJahr" class="form_cells" type="text" name="letztesAktivesJahr"/><br/><br/>	

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