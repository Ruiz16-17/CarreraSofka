<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <title>Carrera</title>

    <?php

    require('../db/Conectar.php');
    require('../controllers/ctrlJugador.php');
    require('../controllers/ctrlConductor.php');
    require('../controllers/ctrlCarril.php');

    $carrera = mostrarCarrera();

    ?>
</head>

<body>
    <h1>¡CARRERA!</h1>
    <h2>Meta ¡<?php echo ($carrera[0]['km'] * 1000) ?>m!</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Jugador</th>
                <th scope="col">Auto</th>
                <th scope="col">Carril</th>
                <th scope="col">Recorrido en metros</th>
                <th scope="col">Turno</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($carrera as $fila) {

            ?>
                <form action="../controllers/ctrlCarril.php" method="post">
                    <tr>
                        <td><?php echo $fila['nombre'] ?></td>
                        <td><?php echo $fila['color'] ?></td>
                        <td><?php echo $fila['id'] ?></td>
                        <td><?php echo $fila['desplazamiento'] ?></td>
                        <td><?php echo $fila['turno'] ?></td>
                        <td>

                            <input type="text" id="txtRecorrido<?php echo $fila['id'] ?>" name="txtRecorrido<?php echo $fila['id'] ?>">
                            <input type="text" value="<?php echo $fila['id'] ?>" name="txtIdCarril">
                            <input type="text" value="<?php echo $fila['id_Jugador'] ?>" name="txtIdJugador">

                        </td>
                        <td>
                            <?php
                            $habilitado = '';
                            if ($fila['turno'] == 0) {
                                $habilitado =  'disabled';
                            }
                            ?>
                            <button type="button" class="btn btn-warning" <?php echo $habilitado ?> onclick="lanzar(<?php echo $fila['id'] ?>,'btnAvanzar');deshabilitar('btnLanzar<?php echo $fila['id'] ?>')" id="btnLanzar<?php echo $fila['id'] ?>">Lanzar</button>

                        </td>

                        <td>

                            <button type="submit" class="btn btn-outline-success" name="btnAvanzar" disabled="true" id="btnAvanzar<?php echo $fila['id'] ?>">Avanzar</button>

                        </td>

                    </tr>

                </form>

            <?php
            }
            ?>

        </tbody>
    </table>

    <div>
        <h2>Avanzaste</h2>
        <h2 name="txtAvanzar" id="txtAvanzar">0</h2>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="../js/dado.js"></script>

</body>

</html>