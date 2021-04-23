<?php
/*
    Autor:  Fabricio Vindas Hernandez
    
    Descripción: Este archivo es la conexión a la base de datos
    
    Fecha           Nombre                  Resumen de Revisión
    --------        --------------          ---------------------
    21/11/2020      Fabricio Vindas         Creación del archivo

*/
class ConexionMysql{

    private $conn;
    private $servidor = "localhost";
    private $user = "root";
    private $password = "";
    private $baseDeDatos = "programacion";
    private $result;
    
    public function crearConexion(){
        // Metodo que crea y retorna la conexion a la BD.
        $this->conn = new mysqli($this->servidor, $this->user, $this->password, $this->baseDeDatos);
        if($this->conn->connect_errno) {
            die("Error al conectarse a MySQL: (" . $this->conn->connect_errno . ") " . $this->conn->connect_error);
        }
    }

    public function ejecutarQuery($sql){
        /* Metodo que ejecuta un query sql
         Retorna un resultado si es un SELECT*/
         $this->result = $this->conn->query($sql);
         return $this->result;
    } 

    public function recuperarDatos($resultado){
        return $resultado->fetch_assoc();

    }
    
    public function cerrarConexion(){
        //Metodo que cierra la conexion a la BD
         $this->conn->close();
    }       
}
?>