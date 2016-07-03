<!DOCTYPE html>
<html>

<head>
	<title>De schnellscht Eschenbacher - Zeiten erfassen</title>
	<link rel="stylesheet" href="_css/style.css" type="text/css">
	<link rel="stylesheet" href="_css/style_zeiten_erfassen.css" type="text/css">
	
	
	
</head>

<body>

    <?php 
			error_reporting(0);
            include("php/config.php");
			include("includes/sessions.php");

    ?>
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
			
		<h1 id="site_title">Zeiten erfassen</h1>
		
            <?php
				
				if(isset($_POST["num"]))
				{
					$sql = "SELECT * FROM `participants` WHERE fs_event = ".$_SESSION['event']." order by fs_category ;";
					$result = mysqli_query($db,$sql);
					$startnr = 0;
					while($row = mysqli_fetch_array($result))
					{
						$startnr = $startnr + 1;
						$sql = "UPDATE `participants` SET `start_number` = '".$startnr."' WHERE `participants`.`participant_id` = ".$row['participant_id']." AND fs_event = ".$_SESSION['event'].";";
						$res = mysqli_query($db,$sql);
					}
				}
				
                if (isset($_POST["first_lap"])) {
                $first_lap = $_POST['first_lap'];
                $participant_id = $_POST['participant_id'];
                    
                    
                    
                $sql = "INSERT INTO `laptimes` (`first_lap`, `fs_participant`) VALUES ('".$first_lap."', '".$participant_id."')";
                    
                //$sql = "UPDATE participants SET first_lap = ". $_POST['zeit']. " WHERE startnummer = ".$_POST['startnummer']." ;";
                $res = mysqli_query($db,$sql);
            }
            if (isset($_POST["second_lap"])) {
                $second_lap = $_POST['second_lap'];
                $laptime_id = $_POST['laptime_id'];
                    
                    
                    
                $sql = "UPDATE `laptimes` SET second_lap = ".$second_lap." WHERE laptime_id = ".$laptime_id.";";
                
                $res = mysqli_query($db,$sql);
            }   
			
		$sql = "SELECT * FROM `participants` WHERE start_number = 0 AND fs_event = ".$_SESSION['event'].";";
		 $result = mysqli_query($db,$sql);
         $count  = mysqli_num_rows($result);
		 if($count > 0)
		 {
        ?>
		
		<form id="form_verwaltung" action="zeiten_erfassen.php" method="POST">	<input  id="num" type="hidden" name="num" value="test"/>
		<input id="speichern_button" type="submit" name="speichern_button_zeiten_erfassen" value="Startnummern verteilen"/>
		</form>
		
		<?php 
		}
		else
		{
		?>
		
		<br><br><br>
        
		<p class="controls">
        <a href="zeiten_erfassen.php?back=1">< BACK</a>
		<span> | </span>
        <a href="zeiten_erfassen.php?next=1">NEXT ></a>
		</p></br>
        

        
        <?php
        $sql = "SELECT * FROM `participants` INNER JOIN `person` on (`fs_person` = `person_id`) LEFT JOIN `laptimes` on (`fs_participant` = `participant_id`) WHERE fs_event = ".$_SESSION['event'].";";
       // $sql = "SELECT * FROM `participants` INNER JOIN `person` on (`fs_person` = `person_id`) INNER JOIN `laptimes` on (`fs_Participant` = `participant_id`)"  ;  //das löschen
         $result = mysqli_query($db,$sql);
         $count  = mysqli_num_rows ($result);
        //echo $count;
          //  if( $count==0){
        //    echo $count;
        //$sql="SELECT * FROM `participants` INNER JOIN `person` on (`fs_person` = `person_id`) ";  //left join uf laptimes
        //$result = mysqli_query($db,$sql);
        //   }
        
        
        ?>
        
        <table border="1" id="zeiten_erfassen_tabelle">
        <tr>
            <th>Startnummer</th>
            <th>Name</th>
            <th>Lauf 1</th>
            <th>Lauf 2</th>
            <th>Submit</th>
        </tr>
            
    <?php
       
            
            
            while($row = mysqli_fetch_array($result)){
           
           echo '<form action="zeiten_erfassen.php" method="POST">';
            echo '<tr>';
            echo '<td> '. $row['start_number']. '</td>';
            echo '<td>' .$row['firstname']. " " .$row['name'].' </td>';
            
            if($row['first_lap']==''){
           ?> 
           <td> <input type="text" name="first_lap"> </td>
            <?php
                }else{
                    echo "<td>". $row['first_lap'] ."</td>";
                }        
            
            
            if($row['second_lap']==''){
           ?> 
           <td> <input type="text" name="second_lap"> </td>
            <?php
                }else{
                    echo "<td>". $row['second_lap'] ."</td>";
                }        
            ?>
            
            
           <input hidden="text" name="participant_id" value="<?php echo $row['participant_id'];?>"/>
            <?php 
                if($count!=0){
            ?>
            <input hidden="text" name="laptime_id" value=" <?php echo $row['laptime_id'];?>"/>
            <?php    
                }
            ?>
           <td>  <input type="submit" id="speichern_button" value="Speichern"> </td>
        </tr>
</form>
<?php }} ?>
            
        </table>         
       
		</br>
        <p class="controls">
        <a href="zeiten_erfassen.php?back=1">< BACK</a>
		<span> | </span>
        <a href="zeiten_erfassen.php?next=1">NEXT ></a>
		</p></br>   
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
    
		</div>
		
		
	
	
	</div>
</body>

</html>