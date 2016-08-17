<form action="login.php" type="GET">
	<input type="submit" name="logout_button" id="logout_button" value="Abmelden"/>
</form>

<?php
	if(isset($_GET['logout_button']))
	{
		$_SESSION['usertype']="";
		session_destroy();
	}
?>