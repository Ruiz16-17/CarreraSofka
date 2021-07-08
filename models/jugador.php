<?php 



class jugador {

    private $conexionDB;
    private $id;
    private $nombre;
    private $primerLugar;
    private $estaJugando;

    public function __construct($id, $nombre, $primerLugar, $estaJugando){

        $this->conexionDB = new Conectar();
        $this->id = $id;
        $this->nombre = $nombre;
        $this->primerLugar = $primerLugar;
        $this->estaJugando = $estaJugando;
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

    public function MostrarJugando() {

        try {

            $sql = "SELECT * FROM tbl_jugador WHERE estaJugando = 1";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }
    
    public function turno() {

        try {

            $sql = "UPDATE tbl_jugador SET turno = 1 WHERE estaJugando = 1 LIMIT 1";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function MostrarJugadoresCarrera() {

        try {

            $sql = "SELECT tbl_jugador.id AS id_Jugador, tbl_jugador.nombre, tbl_carro.color, tbl_carril.id,tbl_carril.desplazamiento,tbl_pista.km, tbl_pista.carriles, tbl_jugador.turno FROM tbl_jugador 
            INNER JOIN tbl_conductor ON tbl_jugador.id = tbl_conductor.id_jugador
            INNER JOIN tbl_carro ON tbl_carro.id_conductor = tbl_conductor.id
            INNER JOIN tbl_carril ON tbl_carro.id = tbl_carril.id_carro
            INNER JOIN tbl_pista ON tbl_pista.id = tbl_carril.id_pista WHERE tbl_jugador.estaJugando = 1";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function actualizarNombre() {

        try {

            $sql = "  UPDATE tbl_jugador SET nombre = '" .$this->getNombre(). "' WHERE id = " .$this->getId();
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function cumplirTurno() {

        try {

            $sql = "UPDATE tbl_jugador SET turno = 0 WHERE id = " . $this->getId();
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function otorgarTurno() {

        try {
            $sql = "UPDATE tbl_jugador
            INNER JOIN tbl_conductor ON (tbl_jugador.id = tbl_conductor.id_jugador) 
            INNER JOIN tbl_carro ON (tbl_carro.id_conductor = tbl_conductor.id)
            INNER JOIN tbl_carril ON (tbl_carro.id = tbl_carril.id_carro)
            INNER JOIN tbl_pista ON (tbl_pista.id = tbl_carril.id_pista)
            SET tbl_jugador.turno = 1 
            WHERE estaJugando = 1 AND (tbl_pista.km * 1000) > tbl_carril.desplazamiento";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function turnosDisponibles() {

        try {

            $sql = "SELECT COUNT(*) AS cantidad FROM tbl_jugador WHERE turno = 0 AND estaJugando = 1";
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;

        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }

    public function actualizarEstado($condicion, $estado) {

        try {

            $sql = "  UPDATE tbl_jugador SET estaJugando = " .$estado. " WHERE " . $condicion;
            $query = $this->conexionDB->conectar()->prepare($sql);

            $query->execute();

            
        } catch (Exception $e) {

            die("Se produjo un error $e");
        }
    }
    
    public function getPrimerLugar()
    {
        return $this->primerLugar;
    }

    public function setPrimerLugar($primerLugar)
    {
        $this->primerLugar = $primerLugar;

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

    public function getEstaJugando()
    {
        return $this->estaJugando;
    }

    public function setEstaJugando($estaJugando)
    {
        $this->estaJugando = $estaJugando;

    }
}
