<?php 

require('../models/podio.php');

function ingresarPodio($puesto, $id_Jugador, $id_Podio){

    $modelo = new podio($id_Podio,null,null,null) ;

    return $modelo->asignarPuesto($puesto, $id_Jugador);
    
}

function traerPodio($id_Podio, $puesto){

    $modelo = new podio($id_Podio,null,null,null);

    $resultado = $modelo->puestoVacio($puesto);

    return $resultado;
}

function asignarPodio($id_Podio, $id_Jugador){
    $puestos = array('jugadorPrimero','jugadorSegundo','jugadorTercero');

    $i = 0;
    do{
        $disponible = traerPodio($id_Podio,$puestos[$i]);
        if ($disponible[0]['cantidad'] == 1) {
            ingresarPodio($puestos[$i], $id_Jugador, $id_Podio);
        }
        $i++;
    }while($disponible[0]['cantidad'] == 0);

}

