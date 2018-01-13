<?php

include_once 'data.php';
include '../domain/Cliente.php';

class ClienteData extends Data {

    public function insertarCliente($cliente) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(clienteid) AS clienteid  FROM tbcliente";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        /*Cualquier cosa si no sirve es por las comillas*/
        $queryInsert = "INSERT INTO tbcliente VALUES ('" . $nextId . "','" .
                $cliente->getclientenombre() . "','" .
                $cliente->getclienteapellido1() . "','" .
                $cliente->getclienteapellido2() . "','" .
                $cliente->getclientecorreo() . "','" .
                $cliente->getclienteestado() . "');";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function actualizarCliente($cliente) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbcliente SET clientnombre='" . $cliente->getclientenombre() .
                "', clienteapellido1='" . $cliente->getclienteapellido1() .
                "', clienteapellido2='" . $cliente->getclienteapellido2() .
                "',clientecorreo='" . $cliente->getclientecorreo() .
                "',clienteestado='" . $cliente->getclienteestado() .
                "' WHERE clienteid='" . $cliente->getclienteid() . "';";      

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function  borrarCliente($clienteId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbcliente SET clienteestado='0' WHERE clienteid='" . $clienteId . "';";      
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function obtenerClientes() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbcliente WHERE clienteestado = '1';";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $clientes = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentCliente = new Cliente($row['clienteid'], $row['clientnombre'], $row['clienteapellido1'], $row['clienteapellido2'], $row['clientecorreo'], $row['clienteestado']);
            array_push($clientes, $currentCliente);
        }
        return $clientes;
    }
    

}
