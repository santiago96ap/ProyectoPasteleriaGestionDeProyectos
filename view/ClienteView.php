<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SHWI Bakery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    include '../business/ClienteBusiness.php';
    ?>

</head>

<body>

    <header> 
    </header>

    <?php
    //$ranchId = $_GET['id'];
    ?>

    <nav>
        <ul>
            <li><a href="indexToUser.php?idRanch=<?php echo $ranchId; ?>">Pastelerías</a></li>
        </ul>
    </nav>
    

    <section id="form">
        <table>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Apellido 1</th>
                <th>Apellido 2</th>
                <th>Correo electrónico</th>
                <th>estado</th>
                <th></th>
            </tr>
            <form method="post" enctype="multipart/form-data" action="../business/ClienteAction.php">
                <tr>
                    <td><input type="number" name="id" id="id"/></td>
                    <td><input required type="text" name="nombre" id="nombre"/></td>
                    <td><input required type="text" name="apellidoUno" id="apellidoUno"/></td>
                    <td><input required type="text" name="apellidoDos" id="apellidoDos"/></td>
                    <td><input required type="email" name="correo" id="correo"/></td>
                    <td><input  type="number" name="estado" id="estado"/></td>
                    <td><input type="submit" value="Registrarse" name="create" id="create"/></td>
                </tr>
            </form>
            <?php
            $clienteBusiness = new ClienteBusiness();
            $clientes = $clienteBusiness->obtenerClientes();
            foreach ($clientes as $clienteActual) {
                echo '<form method="post" enctype="multipart/form-data" action="../business/clienteAction.php">';
                echo '<td><input type="number" name="idCliente" id="idCliente" value="' . $clienteActual->getclienteid() . '"></td>';
                echo '<td><input type="text" name="nombre" id="nombre" value="' . $clienteActual->getclientenombre() . '"/></td>';
                echo '<td><input type="text" name="apellidoUno" id="apellidoUno" value="' . $clienteActual->getclienteapellido1() . '"/></td>';
                echo '<td><input type="text" name="apellidoDos" id="apellidoDos" value="' . $clienteActual->getclienteapellido2() . '"/></td>';
                echo '<td><input type="email" name="correo" id="correo" value="' . $clienteActual->getclientecorreo() . '"/></td>';
                echo '<td><input type="number" name="estado" id="estado" value="' . $clienteActual->getclienteestado() . '"/></td>';
                echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';
                echo '</tr>';
                echo '</form>';
            }
            ?>


            <tr>
                <td></td>
                <td>
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyField") {
                            echo '<p style="color: red">Campo(s) vacio(s)</p>';
                        } else if ($_GET['error'] == "numberFormat") {
                            echo '<p style="color: red">Error, formato de numero</p>';
                        } else if ($_GET['error'] == "dbError") {
                            echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
                        }
                    } else if (isset($_GET['success'])) {
                        echo '<p style="color: green">Transacción realizada</p>';
                    }
                    ?>
                </td>
            </tr>
        </table>
    </section>

    <footer>
    </footer>

</body>
</html>
