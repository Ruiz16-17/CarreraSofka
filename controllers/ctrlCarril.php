<?php

require('../models/carril.php');

function asignarCarril_Carro($id_Carril, $id_Carro)
{

    $modelo = new carril($id_Carril, $id_Carro, null, null);

    $modelo->asignacion();
}

function mostrarCarriles($id_pista)
{

    $modelo = new carril(null, null, null, $id_pista);

    return $modelo->mostrar();
}

function actualizarDesplazamiento($id, $desplazamiento, $id_Jugador,$meta,$id_Podio)
{

    require('../db/Conectar.php');

    $modelo = new carril($id, null, null, null);

    $modelo->setDesplazamiento($desplazamiento);
    $modelo->sumarDesplazamiento();
    corregirRecorrido($id,$meta,$id_Podio, $id_Jugador);
    turnosActual($id_Jugador);

    header("Location: ../views/juego.php?idPodio=".$id_Podio);
}

function corregirRecorrido($id,$meta,$id_Podio, $id_Jugador)
{

    $modelo = new carril($id, null, null, null);

    $resultado = $modelo->buscar();

    if($resultado[0]['desplazamiento']>=$meta){
        $modelo->setDesplazamiento($meta);
        $modelo->corregirDesplazamiento();
        require('../controllers/ctrlPodio.php');

        asignarPodio($id_Podio, $id_Jugador);
    }
}

function turnosActual($id)
{
    require('../controllers/ctrlJugador.php');

    quitarTurno($id);

    $turnos = turnos();

    if ($turnos[0]['cantidad'] > 2) {
        asignarTurno();

    }
}

function estaSeleccionado_Carril()
{
    $modelo = new carril(null, null, null, null);

    return $modelo->seleccionado();
}

function reiniciarCarril()
{
    $modelo = new carril(null, null, null, null);
    $modelo->reiniciar();
}

if (isset($_POST['btnAvanzar'])) {
    actualizarDesplazamiento($_POST['txtIdCarril'], $_POST['txtRecorrido' . $_POST['txtIdCarril']],$_POST['txtIdJugador'],$_POST['txtMeta'],$_POST['idPodio']);
}
