<?php 

require('../db/Conectar.php');

class pista{

    private $conexionDB;
    private $id;
    private $km;
    private $carriles;

    public function __construct($id, $km, $carriles){

        $this->conexionDB = new Conectar();
        $this->id = $id;
        $this->km = $km;
        $this->carriles = $carriles;
    }

    public function Mostrar() {

        try {

            $sql = "SELECT * FROM tbl_pista";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }
    

    /**
     * Get the value of carriles
     */ 
    public function getCarriles()
    {
        return $this->carriles;
    }

    /**
     * Set the value of carriles
     *
     */ 
    public function setCarriles($carriles)
    {
        $this->carriles = $carriles;

    }

    /**
     * Get the value of km
     */ 
    public function getKm()
    {
        return $this->km;
    }

    /**
     * Set the value of km
     *
     */ 
    public function setKm($km)
    {
        $this->km = $km;

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
