<?php
require_once 'required.php';

// Pulisco cache sessione
$arrayParams = ["ID_Utente", "nome", "username", "Tipo"];

foreach ( $arrayParams as $param) {
    unsetParamIfPresent($param);
}

header("location:index.php");

?>