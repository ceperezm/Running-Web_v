<?php  require_once __DIR__ . '/Conexion.php'; 

class Evento { 
    private $conexion;
   
    private $nombre_evento;
    private $fecha_evento;
    private $hora_evento;
    private $descripcion_evento;
    
    public function __construct($nombre_evento = null, $fecha_evento = null, $hora_evento = null, $descripcion_evento = null) {
        $this->nombre_evento = $nombre_evento;
        $this->fecha_evento = $fecha_evento;
        $this->hora_evento = $hora_evento;
        $this->descripcion_evento = $descripcion_evento;
        $this->conexion = (new Conexion())->getConexion();
    }

    //agregar un evento
    public function agregarEvento($nombre_evento, $fecha_evento, $hora_evento, $descripcion_evento){
        $stmt = $this->conexion->prepare('INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, descripcion_evento) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $nombre_evento, $fecha_evento, $hora_evento, $descripcion_evento);
        return $stmt->execute();
    }

    //actualizar un evento
public function actualizarEvento($id_evento, $nombre_evento, $fecha_evento, $hora_evento, $descripcion_evento){
    $stmt = $this->conexion->prepare('UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, descripcion_evento = ? WHERE id_evento = ?');
    $stmt->bind_param('sssss', $nombre_evento, $fecha_evento, $hora_evento, $descripcion_evento, $id_evento);
    return $stmt->execute();
}

//eliminar un evento
public function eliminarEvento($id_evento) {
    $stmt = $this->conexion->prepare('DELETE FROM eventos WHERE id_evento = ?');
    $stmt->bind_param('i', $id_evento);
    return $stmt->execute();
}

   //obtener todos los eventos
   public function obtenerTodosEventos() {
    $result = $this->conexion->query("SELECT * FROM eventos");
    $eventos = [];

    while ($fila = $result->fetch_assoc()) {
        $eventos[] = $fila;
    }

    return $eventos;
}

    public function getEvento($id_evento) {
        $stmt = $this->conexion->prepare('SELECT * FROM eventos WHERE id_evento = ?');
        $stmt->bind_param("i", $id_evento);
        $stmt->execute();
        $result = $stmt->get_result();
        $tabla_datos = $result->fetch_all(MYSQLI_ASSOC);
        
        $this->conexion = null;
        return $tabla_datos;
    }
    
    public function getNombreEvento() {
        return $this->nombre_evento;
    }
    
    public function getFechaEvento() {
        return $this->fecha_evento;
    }
    
    public function getHoraEvento() {
        return $this->hora_evento;
    }
    
    public function getDescripcionEvento() {
        return $this->descripcion_evento;
    }
    

}   