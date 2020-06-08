<?php
    session_start();
    include("funzioni.php");
    $controllo=registra();
    if($controllo==0){
        header("location: /index.php?err=regok");
    }
    if($controllo==1){
        header("location: /index.php?err=regerr");
    }
?>