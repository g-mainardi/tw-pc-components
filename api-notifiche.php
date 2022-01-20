<?php
require_once "required.php";
if($SetParameters["logged"]){

    $notifiche = $dbh->getOnlyUnreadNotifications($SetParameters["ID_Utente"]);

    header("Content-type: application/json");
    echo json_encode($notifiche);
}
?>