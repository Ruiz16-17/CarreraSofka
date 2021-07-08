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

function actualizarDesplazamiento($id, $desplazamiento, $id_Jugador)
{

    require('../db/Conectar.php');

    $modelo = new carril($id, null, null, null);

    $modelo->setDesplazamiento($desplazamiento);

    $modelo->sumarDesplazamiento();
    turnosActual($id_Jugador);

    header("Location: ../views/juego.php");
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

if (isset($_POST['btnAvanzar'])) {
    actualizarDesplazamiento($_POST['txtIdCarril'], $_POST['txtRecorrido' . $_POST['txtIdCarril']],$_POST['txtIdJugador']);
}
