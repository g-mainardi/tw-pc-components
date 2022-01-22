<?php
require_once "required.php";
if($SetParameters["logged"] && $SetParameters["Tipo"] == "cliente"){

    $carrello = $dbh->getCartProducts($SetParameters["ID_Utente"]);

    header("Content-type: application/json");
    echo json_encode($carrello);
}
?>