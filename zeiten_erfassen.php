<!DOCTYPE html>
<html>

<head>
	<title>Zeiten erfassen</title>
	<link rel="stylesheet" href="_css/style.css" type="text/css">
	<link rel="stylesheet" href="_css/style_zeiten_erfassen.css" type="text/css">
	
	
	
</head>

<body>

    <?php 
            include("php/config.php");
    ?>
	<div id="sitediv">
		
			<a href="index.php"><img id="scdiemberg_logo" src="_img/sportclubdiemberg_logo_klein.png"/></a>
			<a href="index.php"><img id="deschnellsteschenbacher_logo" src="_img/deschnellsteschenbacher_logo_klein.png"/></a>
			
			<?php
            include("php/config.php");
            ?>
		
		<div id="content">
		
		<h1 id="site_title">Zeiten erfassen</h1>
		
            
            
            
            
            <?php
                if (isset($_POST["first_lap"])) {
                $first_lap = $_POST['first_lap'];
                $participant_id = $_POST['participant_id'];
                    
                    
                    
                $sql = "INSERT INTO `laptimes` (`first_lap`, `fs_Participant`) VALUES ('".$first_lap."', '".$participant_id."') ";
                    
                //$sql = "UPDATE participants SET first_lap = ". $_POST['zeit']. " WHERE startnummer = ".$_POST['startnummer']." ;";
                $res = mysqli_query($db,$sql);
            }
            if (isset($_POST["second_lap"])) {
                $second_lap = $_POST['second_lap'];
                $laptime_id = $_POST['laptime_id'];
                    
                    
                    
                $sql = "UPDATE `laptimes` SET second_lap = ".$second_lap." WHERE laptime_id = ".$laptime_id.";";
                
                $res = mysqli_query($db,$sql);
            }   
        ?>
        
        
        <a href="zeiten_erfassen.php?back=1">BACK</a>
        <a href="zeiten_erfassen.php?next=1"> NEXT </a>   
        

        
        <?php
        $sql = "SELECT * FROM `participants` INNER JOIN `person` on (`fs_person` = `person_id`) LEFT JOIN `laptimes` on (`fs_Participant` = `participant_id`);";
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
        
        <table border="solid">
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
            echo '<td> '. $row['startnummer']. '</td>';
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
           <td>  <input type="submit" value="Submit"> </td>
        </tr>
</form>
<?php } ?>
            
        </table>         
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
    
		</div>
		
		
	
	
	</div>
</body>

</html>