<?php

class Data {

    public $server;
    public $user;
    public $password;
    public $db;
    public $connection;
    public $isActive;

    /* constructor */

    public function Data() {


        $this->isActive = false;
        $this->server = "127.0.0.1";
        $this->user = "root";
        $this->password = "";
        $this->db = "Proyecto_Pasteleria";
    }

}
