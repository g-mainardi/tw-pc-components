<?php
require_once 'required.php';

if(!$SetParameters["logged"]){
    // Utente non loggato -> mando alla pagina di login
    header("location:login.php");
}

$SetParameters["titolo"] = "Notifiche"; 

array_push($SetParameters["scripts"], "./script/notifiche.js");

require("template/base.php");
?> 