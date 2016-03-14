<!DOCTYPE html>
<html>

<head>
	<title>De schnellst Eschenbacher - Login</title>
	<link rel="stylesheet" href="_css/style2.css" type="text/css">
	
	
	
</head>

<body>

	<div id="sitediv">
			
			<img id="scdiemberg_logo" src="_img/sportclubdiemberg_logo_klein.png"/>
			<img id="deschnellsteschenbacher_logo" src="_img/deschnellsteschenbacher_logo_klein.png"/>
		  
            <?php
             include 'includes/navigation.php';
            ?>
        
		<div id="content">
		
			<h1 id="site_title">Login</h1>
			
			<form action="" method="POST" id="login_form">
				Benutzername: <input type="text" name="username" id="login_form_username" /></br>
				Passwort: <input type="password" name="password" id="login_form_password"/></br></br>
				<input type="submit" name="submit" value="Anmelden" />
			</form>
		</div>
		
		<div id="footer">
		</div>
	
	
	</div>
</body>

</html>