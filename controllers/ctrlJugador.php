<?php

require('../models/jugador.php');

function mostrarJugadores()
{

    $modelo = new jugador(null, null, null);

    return $modelo->Mostrar('1');
}

function jugadoresAleatorios($carriles)
{

    $x=0;
    $valores = array();
    while ($x < $carriles) {
        $num_aleatorio = rand(1, 6);
        if (!in_array($num_aleatorio, $valores)) {
            array_push($valores, $num_aleatorio);
            $x++;
        }
    }

    return $valores;
}

function mostrarJugadoresAleatorios($carriles)
{

    $modelo = new jugador(null, null, null);
    
    $jugadores = jugadoresAleatorios($carriles);
    $condicion = '';
    for ($i=0; $i < sizeof($jugadores) ; $i++) { 
        if($i==0){
            $condicion= 'id = ' . $jugadores[$i];
        }else{
            $condicion.= ' OR id = ' . $jugadores[$i];
        }
    }

    return $modelo->Mostrar($condicion);
}
