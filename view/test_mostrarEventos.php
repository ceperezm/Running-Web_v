<?php
require_once '../controller/ControladorEvento.php';

$controlador = new ControladorEvento();
$eventos = $controlador->obtenerTodosEventos();

echo '<pre>';
print_r($eventos);
echo '</pre>';