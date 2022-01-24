<?php
require_once 'required.php';

if(isset($_POST["submit"])){
    $SetParameters["titolo"] = "Grazie"; 
    $SetParameters["file"] = "pagamento_fatto.php";
    
    $carrello = $dbh->getCartProducts($SetParameters["ID_Utente"]);

    foreach($carrello as $articolo){
        $id = $articolo["ID_Articolo"];

        // Rimuovo disponibilità su db
        $dbh->removeQuantityArticles($id, $articolo["quantità"]);

        // Controllo se il prodotto sia esaurito, nel caso mando notifica al venditore
        if($dbh->getQuantitaProdotti($id) <= 0){
            $dbh->insertNotification($articolo["venditore"], null, "Prodotto esaurito", "Attenzione, dopo l'ultimo ordine, l'articolo ".
                $articolo["nome"]." risulta esaurito. Provveda a rifornirlo al più presto");
        }

        // Creo l'ordine per questo articolo
        $ordine = $dbh->createOrder($SetParameters["ID_Utente"], $id);

        // Mando notifica al venditore che l'ordine è stato effettuato
        $dbh->insertNotification($articolo["venditore"], $ordine, "Prodotto acquistato", $SetParameters["nome"]." ha ordinato ".$articolo["quantità"].
         " quantità dell'articolo ".$articolo["nome"].". Provveda a spedirlo al più presto");
    }

    // Elimino le righe di carrello
    $dbh->deleteCart($SetParameters["ID_Utente"]);

} else {
    $SetParameters["titolo"] = "Pagamento"; 
    $SetParameters["file"] = "pagamento_form.php";
}

require("template/base.php");
?>