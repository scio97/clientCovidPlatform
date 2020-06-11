<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location: /index.php");
}
include("funzioni.php");
switch($_SESSION["tipo"]){
    case 0:
        include("pannello-admin.php");
    break;
    case 1:
        include("pannello-ospite.php");
    break;
}
?>