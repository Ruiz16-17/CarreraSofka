<?php 

require('../db/Conectar.php');

class jugador {

    private $conexionDB;
    private $id;
    private $nombre;
    private $primerLugar;

    public function __construct($id, $nombre, $primerLugar){

        $this->conexionDB = new Conectar();
        $this->id = $id;
        $this->nombre = $nombre;
        $this->primerLugar = $primerLugar;
    }

    public function Mostrar($condicion) {

        try {

            $sql = "SELECT * FROM tbl_jugador WHERE $condicion";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }
    

    

    /**
     * Get the value of primerLugar
     */ 
    public function getPrimerLugar()
    {
        return $this->primerLugar;
    }

    /**
     * Set the value of primerLugar
     *
    
     */ 
    public function setPrimerLugar($primerLugar)
    {
        $this->primerLugar = $primerLugar;

    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
    
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
    
     */ 
    public function setId($id)
    {
        $this->id = $id;

    }
}
