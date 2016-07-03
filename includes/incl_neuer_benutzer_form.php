<?php
	if(isset($_POST['speichern_button_neuer_benutzer']))
	{
		if($_POST["passwort"] == $_POST["passwort_wdh"])
		{
			$sql = "INSERT INTO `admin` (`username`, `password`) VALUES ('".$_POST['benutzername']."', '".$_POST['passwort']."');";
			$res = mysqli_query($db,$sql);
		}
		else
		{
			echo "Passwörter stimmen nicht überein";
		}
	}
?>