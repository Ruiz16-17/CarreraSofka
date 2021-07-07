<?php 

require('../models/pista.php');

function mostrarPistas(){

    $modelo = new pista(null,null,null) ;

    return $modelo->Mostrar();
    
}