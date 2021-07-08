<?php 



class carril {

    private $conexionDB;
    private $id;
    private $id_Carro;
    private $desplazamiento;
    private $id_Pista;

    public function __construct($id, $id_Carro, $desplazamiento, $id_Pista){

        $this->conexionDB = new Conectar();
        $this->id = $id;
        $this->id_Carro = $id_Carro;
        $this->desplazamiento = $desplazamiento;
        $this->id_Pista = $id_Pista;
    }

    public function mostrar() {

        try {

            $sql = "SELECT * FROM tbl_Carril WHERE id_pista = " .$this->getId_Pista(). " AND id_carro = 0";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function buscar() {

        try {

            $sql = "SELECT * FROM tbl_Carril WHERE id = " . $this->getId();
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }
    
    public function asignacion() {

        try {

            $sql = "  UPDATE tbl_carril SET 
            id_carro = " .$this->getId_Carro(). "
            WHERE id = " .$this->getId();
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

        
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function sumarDesplazamiento() {

        try {

            $sql = "  UPDATE tbl_carril SET 
            desplazamiento = desplazamiento +" .$this->getDesplazamiento(). "
            WHERE id = " .$this->getId();
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

        
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }
    
    public function getDesplazamiento()
    {
        return $this->desplazamiento;
    }

    public function setDesplazamiento($desplazamiento)
    {
        $this->desplazamiento = $desplazamiento;

    }

    public function getId_Carro()
    {
        return $this->id_Carro;
    }

    public function setId_Carro($id_Carro)
    {
        $this->id_Carro = $id_Carro;

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

    }

    public function getId_Pista()
    {
        return $this->id_Pista;
    }

    public function setId_Pista($id_Pista)
    {
        $this->id_Pista = $id_Pista;

    }
}
