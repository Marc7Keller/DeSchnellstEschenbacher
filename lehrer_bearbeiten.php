<!DOCTYPE html>
<html>

<head>
	<title>Administration - Lehrer bearbeiten</title>
	<link rel="stylesheet" href="_css/style.css" type="text/css">
	<link rel="stylesheet" href="_css/style_lehrer.css" type="text/css">
	
	<?php 
            include("php/config.php");
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
		
		<h1 id="site_title">Lehrer bearbeiten</h1>
		
		<form id="form_verwaltung" action="lehrer_bearbeiten.php" method="GET">
			</br><p style="font-size: 11px;">Felder mit * markiert sind Pflichtfelder</p></br>

    
    <?php
           echo 'Person:* <select  id="person" type="text" name="person" size="1">';
            $res2 = mysqli_query($db,"SELECT * FROM person, participants WHERE (person_id = fs_person);");
           
            while($row = mysqli_fetch_array($res2))
            {
                echo '<option value="'.$row['person_id'].'">'.$row['name']." ".$row['firstname'].'</option>';
            }
            if(isset($_GET['person'])){
                $sql = "SELECT * from person, participants WHERE person_id = ".$_GET['person']." AND (person_id = fs_person);";
                $res2 = mysqli_query($db,$sql);
                while($row = mysqli_fetch_array($res2))
                {
                echo '<option selected="selected">'.$row['name']." ".$row['firstname'].'</option>';
            }}
            echo '</select><br>';
        ?>
    		<input id="speichern_button"type="submit" name="submit" value="Speichern"/>
		</form>
        <form id="form_verwaltung" action="teilnehmer_bearbeiten.php" method="POST">
        <?php
            if(isset($_GET['person'])){
                
                $sql = "SELECT * from person, participants, event, category, class  WHERE person_id = ".$_GET['person']." AND (person_id = fs_person) AND (class_id = fs_class) AND (category_id = fs_category) AND (event_id = fs_event);";
                $res = mysqli_query($db,$sql);
                while($row = mysqli_fetch_array($res))
                {
                    $anlass = $row['event_name'];
                    $klasse = $row['bezeichnung'];
                    $kategorie =$row['bezeichnung'];
                }
            
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
            }
        
        
            
    
    
    ?>
    
			<br>
							<input id="speichern_button"type="submit" name="submit" value="Speichern"/>
		</form>
		
		</div>
		
		<div id="footer">
		</div>
	
	
	</div>
</body>

</html>