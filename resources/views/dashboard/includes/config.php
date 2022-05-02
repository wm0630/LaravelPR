<?php
    $conn = new mysqli("localhost", "coinstac_quiz", "Nickel#96", "coinstac_quiz");
    if($conn){
        //echo("Connected");
    }else if(!$conn){
        //echo("Not connected");
        die();
    }
?>