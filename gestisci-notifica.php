<?php
require_once "required.php";
if($SetParameters["logged"] && isset($_POST["ID_Notifica"]) && isset($_POST["action"])){
    if($_POST["action"] == 0){
        $dbh->setNotificationRead($_POST["ID_Notifica"]);
        echo "eliminato";
    }
}
?>