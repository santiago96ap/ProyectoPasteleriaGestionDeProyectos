<?php

include './ClienteBusiness.php';

if (isset($_POST['update'])) {

    if (isset($_POST['estado']) && isset($_POST['idCliente']) && isset($_POST['nombre']) && isset($_POST['apellidoUno']) && isset($_POST['apellidoDos']) && isset($_POST['correo'])) {

        $id= $_POST['idCliente'];
        $nombre = $_POST['nombre'];
        $apellidoUno = $_POST['apellidoUno'];
        $apellidoDos = $_POST['apellidoDos'];
        $correo = $_POST['correo'];
        $estado= $_POST['estado'];


        if (strlen($estado) > 0 && strlen($id) > 0 && strlen($nombre) > 0 && strlen($apellidoUno) > 0 && strlen($apellidoDos) > 0 && strlen($correo) > 0) {
            if (!is_numeric($nombre)) {
                $cliente = new Cliente($id, $nombre, $apellidoUno, $apellidoDos, $correo, $estado);

                $clienteBusiness = new ClienteBusiness();

                $resultado = $clienteBusiness->actualizarCliente($cliente);
                if ($resultado == 1) {
                    header("location: ../view/ClienteView.php?success=updated");
                } else {
                    header("location: ../view/ClienteView.php?error=dbError");
                }
            } else {
                header("location: ../view/ClienteView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/ClienteView.php?error=emptyField");
        }
    } else {
        header("location: ../view/ClienteView.php?error=error");
    }
} else if (isset($_POST['delete'])) {

    if (isset($_POST['idCliente'])) {

        $idcliente = $_POST['idCliente'];

        $clienteBusiness = new ClienteBusiness();
        $resultado = $clienteBusiness->borrarCliente($idcliente);

        if ($resultado == 1) {
            header("location: ../view/ClienteView.php?success=deleted");
        } else {
            header("location: ../view/ClienteView.php?error=dbError");
        }
    } else {
        header("location: ../view/ClienteView.php?error=error");
    }
} else if (isset($_POST['create'])) {

    if (isset($_POST['nombre']) && isset($_POST['apellidoUno']) && isset($_POST['apellidoDos']) && isset($_POST['correo'])) {
        $nombre = $_POST['nombre'];
        $apellidoUno = $_POST['apellidoUno'];
        $apellidoDos = $_POST['apellidoDos'];
        $correo = $_POST['correo'];


        if (strlen($nombre) > 0 && strlen($apellidoUno) > 0 && strlen($apellidoDos) > 0 && strlen($correo) > 0) {
            if (!is_numeric($nombre)) {

                $cliente = new Cliente(0, $nombre, $apellidoUno, $apellidoDos, $correo, 1);

                $clienteBusiness = new ClienteBusiness();

                $resultado = $clienteBusiness->insertarCliente($cliente);

                if ($result == 1) {
                    header("location: ../view/ClienteView.php?success=inserted");
                } else {
                    header("location: ../view/ClienteView.php?error=dbError");
                }
            } else {
                header("location: ../view/ClienteView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/ClienteView.php?error=emptyField");
        }
    } else {
        header("location: ../view/ClienteView.php?error=error");
    }
}