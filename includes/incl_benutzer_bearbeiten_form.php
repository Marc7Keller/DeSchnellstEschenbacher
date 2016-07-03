<?php
	if(isset($_POST["speichern_button_benutzer_bearbeiten"]))
	{
		if($_POST["passwort"] == $_POST["passwort_wdh"])
		{	
			$sql = "UPDATE `admin` SET `username` = '".$_POST["benutzername"]."', `password` = '".$_POST["passwort"]."' WHERE `admin`.`admin_id` = ".$_POST['admin_id'].";";
			$res = mysqli_query($db,$sql);
		}
		else
		{
			echo "Passwörter stimmen nicht überein";
		}
	}
?>
	
	