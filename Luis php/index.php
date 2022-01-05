<script src="progetto.js" type="text/javascript"></script>
<?php
require_once '../Luis php/required.php';

if(isset($_POST["username"]) && isset($_POST["password"])) {
    
    // Controllo se c'è su db
    $utente = $dbh->checkLogin($_POST["username"], $_POST["password"]);

    if(count($utente)==0) {
        // Login fallito -> ?
        // $SetParameters["risultatologin"] = "Errore: username o password errati";
    } else {
        // Login riuscito -> setto l'utente come loggato
        setLoggedUser($utente[0]);
        header();
    }

}

if($SetParameters["logged"]){
    // Loggato -> Non mostro Accedi e Registrati, mostro icona notifiche e quantità carrello
    
} else {
    // Non loggato -> Visualizzazione normale
}

// Per ora rimando a homepage in entrambi i casi
$SetParameters["titolo"] = "Home";
$SetParameters["file"] = "homepage.php";
    
require("template/base.php");

?>