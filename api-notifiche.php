<?php
require_once "required.php";
if($SetParameters["logged"]){

    $notifiche = $dbh->getOnlyNotReadOnScreenNotifications($SetParameters["ID_Utente"]);

    header("Content-type: application/json");
    echo json_encode($notifiche);
}
?>