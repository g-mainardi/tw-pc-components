<?php
require_once 'required.php';

if(!$SetParameters["logged"]){
    // Utente non loggato -> mando alla pagina di login
    header("location:login.php");
}

$SetParameters["titolo"] = "Notifiche"; 
$SetParameters["file"] = "notifiche_form.php";

require("template/base.php");
?>