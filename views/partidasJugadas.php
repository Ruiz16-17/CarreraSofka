<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Carrera</title>

    <?php
    require('../db/Conectar.php');
    require('../controllers/ctrlJugador.php');
    require('../controllers/ctrlJuego.php');

    $partidas = mostrarPartidas_Juego();
    ?>

</head>

<body>
    <h1>Partidas jugadas</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Número de partida</th>
                <th scope="col">Pista</th>
                <th scope="col">Carriles</th>
                <th scope="col">Km</th>
                <th scope="col">Primer puesto</th>
                <th scope="col">Segundo puesto</th>
                <th scope="col">Tercer puesto</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($partidas as $fila) {

                $primer = mostrarJugador($fila['primero']);
                $segundo = mostrarJugador($fila['segundo']);
                $tercero = mostrarJugador($fila['tercero']);
            ?>
                <tr>
                    <td><?php echo $fila['idJuego'] ?></td>
                    <td><?php echo $fila['idPista'] ?></td>
                    <td><?php echo $fila['carriles'] ?></td>
                    <td><?php echo $fila['km'] ?></td>
                    <td><?php echo $primer[0]['nombre'] ?></td>
                    <td><?php echo $segundo[0]['nombre'] ?></td>
                    <td><?php echo $tercero[0]['nombre'] ?></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>