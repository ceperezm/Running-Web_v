<?php

class Conexion {
    private $conexion;

    public function __construct() {

        $config = include __DIR__ . '/../config/config.php';

        if (!is_array($config)) {
            die("Error: Config file is missing or does not return an array.");
        }

        $this->conexion = new mysqli($config['host'], $config['usuario'], $config['contrasena'], $config['base_de_datos']);
        
        if ($this->conexion->connect_error) {
            die("Conexion fallida: ". $this->conexion->connect_error);
        }
    }

    public function  getConexion(){
        return $this->conexion;
    }

    public function cerrarConexion(){
        $this->conexion->close();
    }


}