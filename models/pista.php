<?php 



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

    public function getCarriles()
    {
        return $this->carriles;
    }

    public function setCarriles($carriles)
    {
        $this->carriles = $carriles;

    }

    public function getKm()
    {
        return $this->km;
    }

    public function setKm($km)
    {
        $this->km = $km;

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

    }
}
