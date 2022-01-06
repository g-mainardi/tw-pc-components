<?php
session_start();

define("IMG_DIR", "./immagini/");

require_once("functions.php");
require_once("database/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "hd_progetto", 3306);

// Controllo se l'utente sia loggato o no
if(isLoggedIn()){
    // Loggato -> Non mostro Accedi e Registrati, mostro icona notifiche e quantità carrello
    $SetParameters["logged"] = true;

    // Prendo dati utente per usarli nella pagina
    $SetParameters["ID_Utente"] = $_SESSION["ID_Utente"];
    $SetParameters["nome"] = $_SESSION["nome"];
    $SetParameters["username"] = $_SESSION["username"];
    if(!isVenditore()){
        $SetParameters["cart"]=$dbh->getCartProducts($SetParameters["ID_Utente"]);
    }
    $SetParameters["Tipo"] = isVenditore()? "venditore" : "cliente";
} else {
    // Non loggato -> Visualizzazione normale
    $SetParameters["logged"] = false;
}

?>