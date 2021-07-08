<?php 



class conductor {

    private $conexionDB;
    private $id;
    private $nombre;
    private $id_Jugador;
    private $escogido;

    public function __construct($id, $nombre, $id_Jugador, $escogido){

        $this->conexionDB = new Conectar();
        $this->id = $id;
        $this->nombre = $nombre;
        $this->id_Jugador = $id_Jugador;
        $this->escogido = $escogido;
    }

    public function mostrar($condicion) {

        try {

            $sql = "SELECT tbl_conductor.id, tbl_conductor.nombre, tbl_carro.color, tbl_carro.id AS id_Carro FROM tbl_conductor 
            INNER JOIN tbl_carro on tbl_carro.id_conductor = tbl_conductor.id
            WHERE escogido = 0 ".$condicion;
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }
    
    public function actualizarEstado() {

        try {

            $sql = "  UPDATE tbl_conductor SET 
            escogido = " .$this->getEscogido(). " ,
            id_jugador = " . $this->getId_Jugador() . "
            WHERE id = " .$this->getId();
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }
    
    public function getId_Jugador()
    {
        return $this->id_Jugador;
    }

    public function setId_Jugador($id_Jugador)
    {
        $this->id_Jugador = $id_Jugador;

    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

    }

    public function getEscogido()
    {
        return $this->escogido;
    }

    public function setEscogido($escogido)
    {
        $this->escogido = $escogido;

    }
}
