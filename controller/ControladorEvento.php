<?php require_once __DIR__ . '/../model/Evento.php';

class ControladorEvento{

    private $modelo;


    public function __construct()
    {
        $this->modelo = new Evento();
    }


    public function mostrarEventos()
    {
        require 'view/eventos.php';
    }


    public function obtenerTodosEventos()
    {
        $eventos = $this->modelo->obtenerTodosEventos();
        return $eventos;
    }


    public function agregarEvento($nombre_evento, $fecha_evento, $hora_evento, $descripcion_evento)
    {
        if ($this->modelo->agregarEvento($nombre_evento, $fecha_evento, $hora_evento, $descripcion_evento)) {
            echo "Evento agregado exitosamente.";
        } else {
            echo "Error al agregar el evento.";
        }
    }



    public function actualizarEvento($id_evento, $nombre_evento, $fecha_evento, $hora_evento, $descripcion_evento)
    {
        if ($this->modelo->actualizarEvento($id_evento, $nombre_evento, $fecha_evento, $hora_evento, $descripcion_evento)) {
            echo "Evento actualizado exitosamente.";
        } else {
            echo "Error al actualizar el evento.";
        }
    }

    public function eliminarEvento($id_evento)
    {
        if ($this->modelo->eliminarEvento($id_evento)) {
            echo "Evento eliminado exitosamente.";
        } else {
            echo "Error al eliminar el evento.";
        }
    }

}