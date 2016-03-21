<?php
    if(isset($_POST['bezeichnung'])){
        $sql = "INSERT INTO category (bezeichnung) VALUES ('".$_POST['bezeichnung']."');";
        $res = mysqli_query($db,$sql);
    }
?>