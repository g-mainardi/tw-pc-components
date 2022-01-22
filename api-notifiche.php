<?php
require_once "required.php";
if($SetParameters["logged"]){

    if($_GET["statonotifica"] == 0){
        $notifiche = $dbh->getAllNotifications($SetParameters["ID_Utente"]);
    } else if($_GET["statonotifica"] == 1){
        $notifiche = $dbh->getOnlyUnreadNotifications($SetParameters["ID_Utente"]);
    } else if($_GET["statonotifica"] == 2){
        $notifiche = $dbh->getOnlyNotReadOnScreenNotifications($SetParameters["ID_Utente"]);
    }

    header("Content-type: application/json");
    echo json_encode($notifiche);
}
?>