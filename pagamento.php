<?php
require_once 'required.php';

if(isset($_POST["submit"])){
    $SetParameters["titolo"] = "Grazie"; 
    $SetParameters["file"] = "pagamento_fatto.php";

    // Rimuovo quantità da tabella articoli
    // Controllo se la quantià residua è = 0 -> Notifica venditore

    // Creo un ordine per ogni articolo del carrello
    // Per ogni ordine creo una notifica al venditore (Ordine confermato)
    
    // Elimino le righe di carrello


} else {
    $SetParameters["titolo"] = "Pagamento"; 
    $SetParameters["file"] = "pagamento_form.php";
}

require("template/base.php");
?>