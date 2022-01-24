<?php
require_once "required.php";
if($SetParameters["logged"] && $SetParameters["Tipo"] == "cliente"){

    $carrello = $dbh->getCartProducts($SetParameters["ID_Utente"]);

    for($i = 0; $i < count($carrello); $i++){
        $carrello[$i]["img"] = IMG_DIR.$carrello[$i]["img"];
    }

    header("Content-type: application/json");
    echo json_encode($carrello);
}
?>