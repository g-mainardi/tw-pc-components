<?php
require_once "required.php";
if($SetParameters["logged"] && isset($_POST["action"])){
    if($_POST["action"] == 0){
        // Azione per l'elimazione di un prodotto dal carrello
        $dbh->removeCartArticle($SetParameters["ID_Utente"],$_POST["ID_Articolo"]);

        // Per testing: echo "eliminato articolo con id : ".$_POST["ID_Articolo"];
    } elseif($_POST["action"] == 1){
        // Azione per la modifica di un prodotto del carrello
        $dbh->modifyCartArticleQuantity($SetParameters["ID_Utente"], $_POST["ID_Articolo"], $_POST["quantità"]);
        // Per testing: echo "modificato articolo con id : ".$_POST["ID_Articolo"];
    } 
}
?>