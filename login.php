<!DOCTYPE html>
<html>

<head>
	<title>De schnellst Eschenbacher - Login</title>
	<link rel="stylesheet" href="_css/style2.css" type="text/css">
	
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
			
			<form action="" method="POST" id="login_form">
				Benutzername: <input type="text" name="username" id="login_form_username" /></br>
				Passwort: <input type="password" name="password" id="login_form_password"/></br></br>
				<input type="submit" name="submit" value="Anmelden" />
			</form>
		</div>
		
		<div id="footer">
		</div>
	
	</div>
	
	<?php
    if(isset($_POST['username'])){
        if(isset($_POST['password'])){

            $user = $_POST['username'];
            $password = $_POST['password'];            
            
            $sql = sprintf("SELECT * FROM admin WHERE username='".$user."' AND password='".$password."';");
            echo $sql;
            $res = mysqli_query($db,$sql);
            if (!$res) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
    }
            $count = mysqli_num_rows($res);
	echo $count;
            if($count== 1){
               
                     session_start();
                  
                    $_SESSION['username'] = $user;
                header("location: neuer_teilnehmer.php"); 
                }
               
            }
            
            //$escaped_username = mysql_real_escape_string($_POST['username'],$db);
            //$escaped_password = mysql_real_escape_string($_POST['password'],$db);
            //echo $escaped_username;
            
            
        }
   
    
    
    ?>
</body>

</html>