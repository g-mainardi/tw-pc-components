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




?>