<?php

include '../data/ClienteData.php';

class ClienteBusiness {

    private $clienteData;

    public function ClienteBusiness() {
        $this->clienteData = new ClienteData();
    }

    public function insertarCliente($cliente) {
        return $this->clienteData->insertarCliente($cliente);
    }

    public function actualizarCliente($cliente) {
        return $this->clienteData->actualizarCliente($cliente);
    }

    public function borrarCliente($clienteId) {
        return $this->clienteData->borrarCliente($clienteId);
    }

    public function obtenerClientes() {
        return $this->clienteData->obtenerClientes();
    }
    
}