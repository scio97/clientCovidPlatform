<?php
    session_start();
    include("funzioni.php");
    $controllo=login();
    switch($controllo){
        case 0:
            header("location: /index.php");
        break;
        case 1:
            header("location: /index.php?err=password");
        break;
        case 2:
            header("location: /index.php?err=user");
        break;
    }
?>