<?php
require_once 'required.php';

$SetParameters["titolo"] = isset($SetParameters["nome"])? "Carrello di ".$SetParameters["nome"] : "Carrello"; 
$SetParameters["file"] = "carrello_form.php";

require("template/base.php");
?>