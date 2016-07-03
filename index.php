<!DOCTYPE html>
<html>

    <head>
        <title>Webseite</title>
        <link rel="stylesheet" href="_css/style.css" type="text/css">

<?php 
            include("php/config.php");
            include("includes/sessions.php");
?>

    </head>

    <body>

        <div id="sitediv">

            <a href="index.php"><img id="scdiemberg_logo" src="_img/sportclubdiemberg_logo_klein.png"/></a>
            <a href="index.php"><img id="deschnellsteschenbacher_logo" src="_img/deschnellsteschenbacher_logo_klein.png"/></a>

            <?php
             include 'includes/navigation.php';
			 include 'includes/event_selection.php';
            ?>
            
            <div id="content">

            </div>

            <div id="footer">
            </div>


        </div>
    </body>

</html>