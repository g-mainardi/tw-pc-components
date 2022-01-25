<?php
require_once "required.php";
if($SetParameters["logged"] && isset($_POST["ID_Notifica"]) && isset($_POST["action"])){
    if($_POST["action"] == 0){
        // Azione per la chiusura di una notifica a schermo
        $dbh->changeNotification($_POST["ID_Notifica"], "not read");
        // Per testing: echo "eliminato notifica con id : ".$_POST["ID_Notifica"];
    } elseif($_POST["action"] == 1){
        // Azione per la lettura di una notifica non ancora letta (aperta)
        $dbh->changeNotification($_POST["ID_Notifica"], "read");
        // Per testing: echo "letta notifica con id : ".$_POST["ID_Notifica"];

        // Prendo l'idordine della notifica per comunicare che l'azione è stata eseguita
        $idordine = $dbh->getOrderIdByNotification($_POST["ID_Notifica"]);
        if($idordine != NULL){
            // Prendo l'articolo che è presente nell'ordine
            $articolo = $dbh->getOrderProduct($idordine);

            // Setto lo stato dell'ordine in base all'utente che legge la notifica
            if($SetParameters["Tipo"] == "cliente"){
                // Il cliente conferma al venditore la ricezione dell'ordine
                $stato = "delivered";
                $dbh->insertNotification($articolo["venditore"], $idordine, "Prodotto consegnato", $SetParameters["nome"].
                " ha ricevuto l'articolo ".$articolo["nome"].".");
            } else {
                $stato = "shipped";
                // Il venditore notifica il cliente della partenza dell'ordine
                $cliente = $dbh->getOrderClient($idordine);

                $dbh->insertNotification($cliente["ID_Utente"], $idordine, "Prodotto spedito", "Gentile ".$cliente["nome"].", il tuo articolo ".$articolo["nome"].
                " è stato spedito, puoi confermare l'avvenuta consegna.");
            }
            $dbh->changeStateOrder($stato, $idordine);

        }

    } elseif($_POST["action"] == 2){
        // Azione per l'eliminazione di una notifica
        $dbh->deleteNotification($_POST["ID_Notifica"]);
        // Per testing: echo "eliminata notifica con id : ".$_POST["ID_Notifica"];
    }
}
?>