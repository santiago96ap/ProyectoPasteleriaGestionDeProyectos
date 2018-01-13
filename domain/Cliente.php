<?php

class Cliente {

    private $clienteid;
    private $clientenombre;
    private $clienteapellido1;
    private $clienteapellido2;
    private $clientecorreo;
    private $clienteestado;

    function Cliente($clienteid, $clientenombre,$clienteapellido1, $clienteapellido2, $clientecorreo, $clienteestado) {
        $this->clienteid = $clienteid;
        $this->clientenombre = $clientenombre;
        $this->clienteapellido1 = $clienteapellido1;
        $this->clienteapellido2= $clienteapellido2;
        $this->clientecorreo = $clientecorreo;
        $this->clienteestado = $clienteestado;
    }
    
    

    function getclienteid() {
        return $this->clienteid;
    }

    public function setclienteid($clienteid) {
        $this->clienteid = $clienteid;
    }
    
    public function getclientenombre() {
        return $this->clientenombre;
    }

    public function setclientenombre($clientenombre) {
        $this->clientenombre = $clientenombre;
    }

    function getclienteapellido1() {
        return $this->clienteapellido1;
    }

    public function setclienteapellido1($clienteapellido1) {
        $this->clienteapellido1 = $clienteapellido1;
    }

    function getclienteapellido2() {
        return $this->clienteapellido2;
    }

    public function setclienteapellido2($clienteapellido2) {
        $this->clienteapellido2 = $clienteapellido2;
    }
    
    function getclientecorreo() {
        return $this->clientecorreo;
    }

    public function setclientecorreo($clientecorreo) {
        $this->clientecorreo = $clientecorreo;
    }

    function getclienteestado() {
        return $this->clienteestado;
    }
    
    public function setclienteestado($clienteestado) {
        $this->clienteestado = $clienteestado;
    }

}
