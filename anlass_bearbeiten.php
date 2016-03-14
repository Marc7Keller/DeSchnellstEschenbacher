<!DOCTYPE html>
<html>

    <head>
        <title>Administration - Anlass bearbeiten</title>
        <link rel="stylesheet" href="_css/style.css" type="text/css">
        <link rel="stylesheet" href="_css/style_anlass.css" type="text/css">

        <?php 
        include("php/config.php");





        if(isset($_POST['bezeichnung'])){

            $sql = "UPDATE event SET event_name ='".$_POST['bezeichnung']."', year =".$_POST['veranstaltungsjahr']." WHERE event_id = ".$_POST['event_id'].";";
            $res = mysqli_query($db,$sql);
            $res = mysqli_query($db,$sql); 
            if (!$res) {
                printf("Error: %s\n", mysqli_error($db));
                exit();
            }
        }

        ?>

    </head>

    <body>

        <div id="sitediv">

            <a href="index.php"><img id="scdiemberg_logo" src="_img/sportclubdiemberg_logo_klein.png"/></a>
            <a href="index.php"><img id="deschnellsteschenbacher_logo" src="_img/deschnellsteschenbacher_logo_klein.png"/></a>

            <?php
            include 'includes/navigation.php';
            ?>

            <div id="content">

                <h1 id="site_title">Anlass bearbeiten</h1>

                <form id="form_verwaltung" action="anlass_bearbeiten.php" method="GET">
                    </br><p style="font-size: 11px;">Felder mit * markiert sind Pflichtfelder</p></br>

                <?php
                echo 'Anlass:* <select  id="anlass" type="text" name="anlass" size="1">';
                $res2 = mysqli_query($db,"SELECT * FROM event;");

                while($row = mysqli_fetch_array($res2))
                {
                    echo '<option value="'.$row['event_id'].'">'.$row['event_name'].'</option>';
                }

                echo '</select><br>';

                ?>
                <input id="speichern_button"type="submit" name="submit" value="Speichern"/>
                </form>
                <?php
                if(isset($_GET['anlass'])){
                ?>
                <form id="form_verwaltung" action="anlass_bearbeiten.php" method="POST">
                    <input  id="event_id" type="hidden" name="event_id" value="<?php echo $_GET['anlass']; ?>"/></br>
                    Bezeichnung:*			<input  id="bezeichnung" type="text" name="bezeichnung"/></br>
                    Veranstaltungsjahr:*	<input  id="veranstaltungsjahr" type="text" name="veranstaltungsjahr"/></br></br>
                    <input id="speichern_button"type="submit" name="submit" value="Speichern"/>				
                </form>
                <?php
                }
                ?>
            </div>

            <div id="footer">
            </div>


        </div>
    </body>

</html>