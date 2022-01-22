<?php
require_once "required.php";
if($SetParameters["logged"] && isset($_POST["ID_Notifica"]) && isset($_POST["action"])){
    if($_POST["action"] == 0){
        // Azione per la chiusura di una notifica a schermo
        $dbh->changeNotification($_POST["ID_Notifica"], "not read");
        // Per testing: echo "eliminato notifica con id : ".$_POST["ID_Notifica"];
    } elseif($_POST["action"] == 1){
        // Azione per la lettura di una notifica
        $dbh->changeNotification($_POST["ID_Notifica"], "read");
        // Per testing: echo "letta notifica con id : ".$_POST["ID_Notifica"];
    } elseif($_POST["action"] == 2){
        // Azione per l'eliminazione di una notifica
        $dbh->deleteNotification($_POST["ID_Notifica"]);
        // Per testing: echo "eliminata notifica con id : ".$_POST["ID_Notifica"];
    }
}
?>