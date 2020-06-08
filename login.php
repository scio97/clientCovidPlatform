<?php
    session_start();
    include("funzioni.php");
    $controllo=login();
    if($controllo==0){
        header("location: /index.php");
    }
    if($controllo==1){
        header("location: /index.php?err=password");
    }
    if($controllo==2){
        header("location: /index.php?err=user");
    }
?>