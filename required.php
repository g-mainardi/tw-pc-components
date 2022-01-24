<?php
session_start();

define("IMG_DIR", "immagini/");

require_once("functions.php");
require_once("database/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "hd_progetto", 3306);

$SetParameters["scripts"] = array();
array_push($SetParameters["scripts"], "./script/progetto.js");

// Controllo se l'utente sia loggato o no
if(isLoggedIn()){
    // Loggato -> Non mostro Accedi e Registrati, mostro icona notifiche e quantità carrello
    $SetParameters["logged"] = true;

    // Prendo dati utente per usarli nella pagina
    $SetParameters["ID_Utente"] = $_SESSION["ID_Utente"];
    $SetParameters["nome"] = $_SESSION["nome"];
    $SetParameters["username"] = $_SESSION["username"];
    if(!isVenditore()){
        // Controllo se è stato richiesto di aggiungere qualcosa al carrello
        if(isset($_POST["ID_Articolo"])){
            //Inserisco nel carrello dell'utente
            $dbh->insertProductInCart($SetParameters["ID_Utente"], intval($_POST["ID_Articolo"]), 1);
        }
    }
    $SetParameters["Tipo"] = isVenditore()? "venditore" : "cliente";

} else {

    // Controllo se è stato richiesto di aggiungere qualcosa al carrello
    if(isset($_POST["ID_Articolo"])){
        // Mando alla pagina di login
        header("location:login.php");
    }

    // Non loggato -> Visualizzazione normale
    $SetParameters["logged"] = false;

}

?>