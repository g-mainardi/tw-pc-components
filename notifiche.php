<?php
require_once 'required.php';

if(!$SetParameters["logged"]){
    // Utente non loggato -> mando alla pagina di login
    header("location:login.php");
}

$SetParameters["titolo"] = "Notifiche"; 
$SetParameters["file"] = "notifiche_form.php";

// Controllo se ci sono azioni da eseguire
if(isset($_GET["action"])&&isset($_GET["notifica"])) {
    if($_GET["action"] == "1"){
        $dbh->deleteNotification($_GET["notifica"]); // Funzione non ancora implementata
    } else if($_GET["action"] == "2"){
        $dbh->setNotificationRead($_GET["notifica"]); // Funzione non ancora implementata
    }
}

$SetParameters["notifiche"] = $dbh->getAllNotifications($SetParameters["ID_Utente"]);

array_push($SetParameters["scripts"], "./script/notifiche.js");

require("template/base.php");
?> 