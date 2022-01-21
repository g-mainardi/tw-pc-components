<?php

function isLoggedIn(){
    return isset($_SESSION["ID_Utente"]) && isset($_SESSION["nome"]) && isset($_SESSION["username"]) && isset($_SESSION["Tipo"]);
}

function isVenditore(){
    return $_SESSION["Tipo"]=="venditore";
}

function setLoggedUser($user){
    $_SESSION["ID_Utente"] = $user["ID_Utente"];
    $_SESSION["nome"] = $user["nome"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["Tipo"] = $user["Tipo"];
}

function setParametersByType(){
    if(isVenditore()){
        header("location:gestione.php");
    } else {
        header("location:index.php");
    }
}

function unsetParamIfPresent($param) {
    if(isset($_SESSION[$param])){
        unset($_SESSION[$param]);
    }
}

function getSpecs($desc){
    $dictionary = [];
    $array = explode(':', $desc);
    for($i = 0; $i < count($array)-1; $i+=2){
        $dictionary[$array[$i]] = $array[$i+1];
    }

    return $dictionary;
}
?>