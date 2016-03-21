<?php
    if(isset($_POST['bezeichnung'])){
        $sql = "INSERT INTO event (event_name, year) VALUES ('".$_POST['bezeichnung']."','".$_POST['veranstaltungsjahr']."');";
        $res = mysqli_query($db,$sql);
    }
    ?>