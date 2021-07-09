<?php 

class juego{

    private $conexionDB;
    private $id;
    private $id_pista;
    private $id_podio;

    public function __construct($id, $id_pista, $id_podio){

        $this->conexionDB = new Conectar();
        $this->id = $id;
        $this->id_pista = $id_pista;
        $this->id_podio = $id_podio;
    }

    public function crear() {

        try {

            $sql = "INSERT INTO `tbl_juego`(`id_Pista`, `id_Podio`) 
            VALUES (".$this->getId_pista().",".$this->getId_podio().");";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function mostrarPartidas() {

        try {

            $sql = "SELECT tbl_juego.id AS idJuego, tbl_pista.id AS idPista, tbl_pista.carriles, tbl_pista.km, tbl_podio.jugadorPrimero AS primero, tbl_podio.jugadorSegundo AS segundo, tbl_podio.jugadorTercero AS tercero FROM `tbl_juego` 
            INNER JOIN tbl_podio ON tbl_podio.id = tbl_juego.id_Podio
            INNER JOIN tbl_pista ON tbl_pista.id = tbl_juego.id_Pista";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function getId_podio()
    {
        return $this->id_podio;
    }

    public function setId_podio($id_podio)
    {
        $this->id_podio = $id_podio;

        
    }

    public function getId_pista()
    {
        return $this->id_pista;
    }

    public function setId_pista($id_pista)
    {
        $this->id_pista = $id_pista;

        
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