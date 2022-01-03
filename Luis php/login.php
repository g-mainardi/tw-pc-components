<?php
require_once '../Luis php/required.php';

if(isset($_POST["username"]) && isset($_POST["password"])) {
    
    // Controllo se c'è su db
    $risultatologin = $dbh->checkLogin($_POST["username"], $_POST["password"]);

    if(count($risultatologin)==0) {
        $SetParameters["risultatologin"] = "Errore: username o password errati";
    } else {
        $SetParameters["risultatologin"] = "Login riuscito!";
        setLoggedUser($risultatologin[0]);
    }

}

if(isLoggedIn()){
    setParametersByType();
} else {
    $SetParameters["titolo"] = "Login";
    $SetParameters["file"] = "login_form.php";
}
    
require("template/base.php");

?>