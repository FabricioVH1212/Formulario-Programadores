<?php
/*
    Autor:  Fabricio Vindas Hernandez
    
    Descripción: Este archivo es pare ingreso, eliminación , actualización y selección de programadores
    
    Fecha           Nombre                  Resumen de Revisión
    --------        --------------          ---------------------
    21/11/2020      Fabricio Vindas         Creación del archivo

*/
include("../Models/ConexionMysql.php");
class programadores extends ConexionMysql{
    //Atributos
    private $num_ide;
    private $nombre;
    private $apellidos;
    private $telefono;
    private $correo;
    private $provincia;    
    private $direccion;
    private $genero;
    private $archivo;
    private $lenguajes;
    private $sql;
    private $resultado;
    private $update_archivo = "";
    private $total_lenguajes;
    private $bandera = 0;

    //Getters y Setters
    public function set_num_ide($num_ide){
        $this->num_ide = $num_ide;
    }

    public function get_num_ide(){
        return $this->num_ide;
    }

    public function set_nombre($nombre){
        $this->nombre = $nombre;
    }

    public function get_nombre(){
        return $this->nombre;
    }    

    public function set_apellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function get_apellidos(){
        return $this->apellidos;
    } 
    
    public function set_telefono($telefono){
        $this->telefono = $telefono;
    }

    public function get_telefono(){
        return $this->telefono;
    }    

    public function set_correo($correo){
        $this->correo = $correo;
    }

    public function get_correo(){
        return $this->correo;
    }    

    public function set_provincia($provincia){
        $this->provincia = $provincia;
    }

    public function get_provincia(){
        return $this->provincia;
    }   
    
    public function set_direccion($direccion){
        $this->direccion = $direccion;
    }

    public function get_direccion(){
        return $this->direccion;
    }     

    public function set_genero($genero){
        $this->genero = $genero;
    }

    public function get_genero(){
        return $this->genero;
    }    

    public function set_archivo($archivo){
        $this->archivo = $archivo;
    }

    public function get_archivo(){
        return $this->archivo;
    }    
    
    public function set_lenguajes($lenguajes){
        $this->lenguajes = $lenguajes;
    }

    public function get_lenguajes(){
        return $this->lenguajes;
    }

    //Metodos CRUD

    //Método para insertar programador
    public function insertar_programador(){
        $this->sql = "INSERT INTO PROGRAMADOR (NUM_IDENTIFICACION, 
                                        DSC_NOMBRE, 
                                        DSC_APELLIDOS, 
                                        DSC_TELEFONO, 
                                        DSC_EMAIL, 
                                        IDE_PROVINCIA, 
                                        DSC_DIRECCION, 
                                        IND_GENERO, 
                                        DSC_ARCHIVO)
        VALUES (".$this->num_ide.", 
                '".$this->nombre."',
                '".$this->apellidos."',
                '".$this->telefono."',
                '".$this->correo."',
                ".$this->provincia.",
                '".$this->direccion."',
                '".$this->genero."',
                '".$this->archivo."')";
        parent::crearConexion();
        if(parent::ejecutarQuery($this->sql)){
            if(!empty($this->lenguajes)){
                $this->total_lenguajes = count($this->lenguajes);
                $this->sql = "INSERT INTO PROGRAMADOR_LENGUAJES (NUM_IDENTIFICACION, DSC_LENGUAJE) VALUES ";
                foreach ($this->lenguajes as $key => $value) {
                    $this->bandera += 1;
                    $this->sql .= "(".$this->num_ide.", '".$value."')";
                    if($this->bandera != $this->total_lenguajes){
                        $this->sql .= ",";
                    }
                }

                if(!parent::ejecutarQuery($this->sql)){
                    return false;
                }
            }
            parent::cerrarConexion();
            return true;
        }else{
            parent::cerrarConexion();
            return false;
        }
    }
    
    //Método para consultar programador
    public function consultarOferentes(){
        $this->sql = "SELECT NUM_IDENTIFICACION, DSC_NOMBRE, DSC_APELLIDOS,DSC_ARCHIVO FROM PROGRAMADOR ORDER BY DSC_NOMBRE ASC";
        parent::crearConexion();
        $this->resultado = parent::ejecutarQuery($this->sql);
        parent::cerrarConexion();
        return $this->resultado;
    }

    //Método para eliminar programador
    public function eliminarOferente() {
        $this->query = "DELETE FROM PROGRAMADOR_LENGUAJES WHERE NUM_IDENTIFICACION = ".$this->num_ide;
        parent::crearConexion();
        if(parent::ejecutarQuery($this->query)){
            $this->query = "DELETE FROM PROGRAMADOR WHERE NUM_IDENTIFICACION = ".$this->num_ide;
            unlink($_GET["ruta"]); //Borra la imagen del servidor
            if(!parent::ejecutarQuery($this->query)){
                parent::cerrarConexion();
                return false;
            }
        }else{
            parent::cerrarConexion();
        }
        parent::cerrarConexion();
        return true;
    }

    //Método para consultar programador por el número de identificación
    public function consultarProgramador(){
        $this->query = "SELECT 
            DSC_NOMBRE, 
            DSC_APELLIDOS, 
            DSC_TELEFONO, 
            DSC_EMAIL, 
            IDE_PROVINCIA, 
            DSC_DIRECCION, 
            IND_GENERO, 
            DSC_ARCHIVO
        FROM 
            PROGRAMADOR 
        WHERE 
            NUM_IDENTIFICACION = ".$this->num_ide;
        parent::crearConexion();
        $this->resultado = parent::ejecutarQuery($this->query);
        $this->resultado = $this->resultado->fetch_assoc();
        $this->set_nombre($this->resultado["DSC_NOMBRE"]);
        $this->set_apellidos($this->resultado["DSC_APELLIDOS"]);
        $this->set_correo($this->resultado["DSC_EMAIL"]);
        $this->set_telefono($this->resultado["DSC_TELEFONO"]);
        $this->set_provincia($this->resultado["IDE_PROVINCIA"]);
        $this->set_direccion($this->resultado["DSC_DIRECCION"]);
        $this->set_genero($this->resultado["IND_GENERO"]);

        $this->query = "SELECT DSC_LENGUAJE FROM PROGRAMADOR_LENGUAJES WHERE NUM_IDENTIFICACION = ".$this->num_ide;
        $this->resultado = parent::ejecutarQuery($this->query);
        $resultado_lenguajes = array();
        while ($dsc_lenguaje = $this->resultado->fetch_assoc()) {
            $resultado_lenguajes[] = $dsc_lenguaje["DSC_LENGUAJE"];
        }
        $this->set_lenguajes($resultado_lenguajes);
    }

    //Método para actualizar programador
    public function actualizarProgramador(){
        $this->query = "DELETE FROM PROGRAMADOR_LENGUAJES WHERE NUM_IDENTIFICACION = ".$this->num_ide;
        parent::crearConexion();
        if(parent::ejecutarQuery($this->query)){
            if(!empty($this->archivo)){
                unlink($_GET["ruta"]); //Borra la imagen del servidor
                $this->update_archivo = ", DSC_ARCHIVO = '".$this->archivo."'";
            }

            $this->query = "UPDATE PROGRAMADOR  SET
                    DSC_NOMBRE = '".$this->nombre."',
                    DSC_APELLIDOS = '".$this->apellidos."',
                    DSC_TELEFONO = '".$this->telefono."',
                    DSC_EMAIL = '".$this->correo."',
                    IDE_PROVINCIA = ".$this->provincia.",
                    DSC_DIRECCION = '".$this->direccion."',
                    IND_GENERO = '".$this->genero."'
                    ".$this->update_archivo."
                WHERE NUM_IDENTIFICACION = ".$this->num_ide;
            if(parent::ejecutarQuery($this->query)){
                if(!empty($this->lenguajes)){
                    $this->total_lenguajes = count($this->lenguajes);
                    $this->query = "INSERT INTO PROGRAMADOR_LENGUAJES (NUM_IDENTIFICACION, DSC_LENGUAJE) VALUES ";
                    foreach ($this->lenguajes as $key => $value) {
                        $this->bandera += 1;
                        $this->query .= "(".$this->num_ide.", '".$value."')";
                        if($this->bandera != $this->total_lenguajes){
                            $this->query .= ",";
                        } 
                    }

                    if(!parent::ejecutarQuery($this->query)){
                        parent::cerrarConexion();
                        return false;
                    }
                }
            }
        }else{
            parent::cerrarConexion();
            return false;
        }
        parent::cerrarConexion();
        return true;
    }
}

?>