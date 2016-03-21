
	<?php
    if(isset($_POST['stufe']))
	{
	    $sql = "UPDATE `sport_program`.`class` SET `stufe` = '".$_POST['stufe']."', `fs_teacher` = '".$_POST['klassenlehrperson']."' WHERE `class`.`class_id` = '".$_POST['class_id']."';";
        $res = mysqli_query($db,$sql);
    }
    ?>
	
	