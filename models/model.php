<?php

class model{

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "db_cms";
    private $conect;

    public function __construct()
    {
        $stringConection = "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
        try {
            $this->conect = new PDO($stringConection,$this->user,$this->pass);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "conexion exitosa";
        } catch (Exception $e) {
            $this->conect = "Error de coneccion";
            echo "ERROR ".$e->getMessage();
        }
    }
    public function connect()
    {
        return $this->conect;
    }

}

