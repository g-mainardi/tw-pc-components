<?php
require_once 'required.php';

$SetParameters["titolo"] = "Carrello di ".$SetParameters["nome"]; // Inserire nome utente
$SetParameters["file"] = "carrello_form.php";

require("template/base.php");
?>