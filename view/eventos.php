<?php
require_once __DIR__ . '/../controller/ControladorEvento.php';

// Inicializamos el controlador
$controlador = new ControladorEvento();

// Obtenemos todos los eventos
$eventos = $controlador->obtenerTodosEventos();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="icon" href="./view/assets/img/icon.ico" type="image/x-icon">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="index.html">
                        <div class= "contain-logo">
                            <img class= "logo" src="assets/img/icon-black.jpg" alt="icono">
                            <h2>Running Web</h1>
                         </div>
                    </a>
                </li>
                <li>
                    <a href="index.html">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="eventos.html">
                        Eventos
                    </a>
                </li>
                <li>
                    <a href="carreras.html">
                        Carreras
                    </a>
                </li>
                <li>
                    <a href="#">
                        Productos
                    </a>
                </li>
            </ul>
            <div class="profile-image">
                <a href="runner.html"><img src="assets/img/milei.png" alt="Perfil"></a>
            </div>
        </nav>
    </header>

    <h2 id="ts">
        Mas eventos
    </h2>
    <section>
    <div class="contenedor">
                <?php
                // Si no hay eventos, mostrar mensaje
                if (empty($eventos)) {
                    echo '<p class="no-eventos">No hay eventos disponibles en este momento.</p>';
                } else {
                    foreach ($eventos as $evento) {
                        $fecha_formateada = isset($evento['fecha']) ? date('d/m/Y', strtotime($evento['fecha'])) : 'Fecha no disponible';
                        $img_num = isset($evento['id']) ? ($evento['id'] % 6) + 4 : 4; // Un número entre 4 y 9 basado en el ID
                        $imagen = "assets/img/runner{$img_num}.png";

                        echo '<div class="card">
                            <img src="' . $imagen . '" alt="Imagen de evento de running">
                            <h3>' . (isset($evento['nombre']) ? htmlspecialchars($evento['nombre']) : 'Nombre no disponible') . '</h3>
                            <p>' . (isset($evento['descripcion']) ? htmlspecialchars($evento['descripcion']) : 'Descripción no disponible') . '</p>
                            <div class="evento-info">
                                <strong>' . $fecha_formateada . '</strong>
                                <span>' . (isset($evento['hora']) ? htmlspecialchars($evento['hora']) : 'Hora no disponible') . '</span>
                            </div>
                            <div class="card-actions">
                                <a href="detalle_evento.php?id=' . (isset($evento['id']) ? $evento['id'] : '#') . '" class="btn">Ver detalles</a>
                            </div>
                        </div>';
                    }
                }
                ?>
            </div>
    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <h3>Running web</h3>
            </div>
            <div class="footer-links">
                <div class="footer-section">
                    <h4>Contacto</h4>
                    <ul>
                        <li>Email: info@runningweb.com</li>
                        <li>Teléfono: +123 456 7890</li>
                        <li>Dirección: Calle Corredores 123</li>
                    </ul>
                </div>
            </div>
            <div class="footer-social">
                <h4>Síguenos</h4>
                <div class="social-icons">
                    <a href="#"><i class="facebook-icon"></i></a>
                    <a href="#"><i class="linkedin-icon"></i></a>
                    <a href="#"><i class="youtube-icon"></i></a>
                    <a href="#"><i class="instagram-icon"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Running web. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>