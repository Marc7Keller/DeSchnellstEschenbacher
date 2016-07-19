<!DOCTYPE html>
<html>

<head>
	<title>De schnellst Eschenbacher - Login</title>
	<link rel="stylesheet" href="_css/style2.css" type="text/css">
	<script src="_js/login.js" type="text/javascript"></script>
	
	<?php
		include 'php/config.php';
    ?>
</head>

<body>
	
	<div id="sitediv">
			
		<img id="scdiemberg_logo" src="_img/sportclubdiemberg_logo_klein.png"/>
		<img id="deschnellsteschenbacher_logo" src="_img/deschnellsteschenbacher_logo_klein.png"/>
		  
		<div id="content">
		
			<h1 id="site_title">Login</h1>
			
			<form name="login_form" action="" method="POST" id="login_form">
				Benutzername: <input type="text" name="username" id="login_form_username" onblur="colorEmptyField1();" onchange="enableSubmitButton();"/></br>
				Passwort: <input type="password" name="password" id="login_form_password" onblur="colorEmptyField2();" onchange="enableSubmitButton();" /></br></br>
				<input type="submit" id="anmelden_button" name="anmelden_button" value="Anmelden" disabled/>
			</form>
			
		</div>
		
		<div id="footer">
		</div>
	
	</div>
	
	<?php
		if(isset($_POST['username']))
		{
			if(isset($_POST['password']))
			{
				$user = $_POST['username'];
				$password = $_POST['password'];            
            
				$sql = sprintf("SELECT * FROM admin WHERE username='".$user."' AND password='".$password."';");
				echo $sql;
				$res = mysqli_query($db,$sql);
            
				if (!$res) 
				{
					printf("Error: %s\n", mysqli_error($db));
					exit();
				}
				
				$count = mysqli_num_rows($res);
				echo $count;
				
				if($count== 1)
				{
					session_start();
					$_SESSION['username'] = $user;
					header("location: neuer_teilnehmer.php"); 
                } 
            }   
        }
    ?>
	
</body>

</html>