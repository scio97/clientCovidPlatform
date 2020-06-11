<?php
session_start();
include("funzioni.php");
if(!isset($_SESSION["tipo"])||$_SESSION["tipo"]!=0){
    header("location: /index.php");
}else{
    switch($_GET["mod"]){
        case "nazione":
            modifica_nazione($_GET["data"], $_GET["chiave"], $_GET["valore"], $_SESSION["user"]);
            header("location: /pannello.php");
        break;
        case "regione":
            modifica_regione(str_replace(' ', '-', $_GET["regione"]), $_GET["data"], $_GET["chiave"], $_GET["valore"], $_SESSION["user"]);
            header("location: /pannello.php");
        break;
        case "provincia":
            modifica_provincia(str_replace(' ', '-', $_GET["provincia"]), $_GET["data"], $_GET["valore"], $_SESSION["user"]);
            header("location: /pannello.php");
        break;
    }
}
?>