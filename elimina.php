<?php
session_start();
include("funzioni.php");
if(!isset($_SESSION["tipo"])||$_SESSION["tipo"]!=0||!isset($_GET["id"])){
    header("location: /index.php");
}else{
    elimina($_GET["id"]);
    header("location: /pannello.php");
}
?>