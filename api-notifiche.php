<?php
require_once "required.php";
if($SetParameters["logged"]){

    $notifiche = $dbh->getAllNotifications($SetParameters["ID_Utente"]);

    header("Content-type: application/json");
    echo json_encode($notifiche);
}
?>