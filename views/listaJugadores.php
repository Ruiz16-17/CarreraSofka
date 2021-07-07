<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Carrera</title>

    <?php

        require('../controllers/ctrlJugador.php');

        $lista = mostrarJugadoresAleatorios($_GET['carriles']);

    ?>

</head>

<body>
    <h1>Jugadores permitidos <?php echo $_GET['carriles'] ?></h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad de veces en primer lugar</th>
                <th scope="col">Elegir</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($lista as $fila) { ?>

            <tr>
                <th scope="row"><?php echo $fila['id'] ?></th>
                <td><?php echo $fila['nombre'] ?></td>
                <td><?php echo $fila['primerLugar'] ?></td>
                <td>
                
                <form action="" method="get" >
                    <button type="submit" class="btn btn-outline-success"></button>
                </form>

                </td>
            </tr>

            <?php } ?>

        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>