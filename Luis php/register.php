<?php
require_once '../Luis php/required.php';

if(isset($_POST["username"]) && isset($_POST["nome"]) && isset($_POST["password"])) {
    
    // Controllo se c'è su db
    $risultatologin = $dbh->checkLogin($_POST["username"], $_POST["password"]);

    if(count($risultatologin)!=0) {
        setLoggedUser($risultatologin[0]);
    }
} else {
    $SetParameters["risultatoregister"] = "Riempi tutti i campi";
}

if(isLoggedIn()){
    setParametersByType();
} else {
    $SetParameters["titolo"] = "Register";
    $SetParameters["file"] = "register_form.php";
}
    
require("template/base.php");

?>