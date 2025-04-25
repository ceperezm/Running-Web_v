<?php
session_start();

if (isset($_SESSION['nombre']) && isset($_SESSION['apellido']) && isset($_SESSION['correo_electronico'])) {
    $apellido = $_SESSION['apellido'];
    $nombre = $_SESSION['nombre'];
    $correo = $_SESSION['correo_electronico'];
} else {
    header('Location: ../index.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corredor</title>
    <link rel="stylesheet" href="css/runner.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon">
    <script src="js/modal.js"> </script>
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
                    <a href="../index.php?action=cerrarSesion">
                        Cerrar sesión
                    </a>
                </li>
            </ul>
            <div class="profile-image">
                <img src="assets/img/milei.png" alt="Perfil">
            </div>
        </nav>
    </header>
      
    <div>
        <h2>DATOS PERSONALES</h2>
    </div>
    <section class="perfil">
        <div>
            <img src="assets/img/milei.png" alt="Runner" class="est">
        </div>
        <table class="tabla">
            <tr>
                <td><?php echo htmlspecialchars($apellido); ?></td>
                <td><?php echo htmlspecialchars($nombre); ?></td>
            </tr>
            <tr>
                <td>N° Runner: 251</td>
                <td>Masculino</td>
            </tr>
            <tr>
                <td colspan="3"><?php echo htmlspecialchars($correo); ?></td>
            </tr>
            <tr>
                <td>Registro: 2025/02/02</td>
                <td>3894156224</td>
            </tr>
        </table>
        <br>
    </section>
    <section class="seccion">
        <table class="tabla">
            <tr>
                <th>Carreras a participar</th>
                <th>Fecha</th>
                <th>Categoría</th>
                <th>Tipo</th>
                <th>Distancia</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td>La media maratón </td>
                <td>2025/03/21</td>
                <td>Libre</td>
                <td>Normal</td>
                <td>8 km</td>
                <td><button class="details-btn" i="boton">Ver</button></td>
                <td><button class="details-btn" i="boton">Eliminar</button></td>
            </tr>
            <tr>
                <td>Carrera Insana</td>
                <td>2025/04/12</td>
                <td>Libre</td>
                <td>Insana</td>
                <td>20 km</td>
                <td><button class="details-btn" i="boton">Ver</button></td>
                <td><button class="details-btn" i="boton">Eliminar</button></td>
            </tr>
            <tr>
                <td>Vuelta a Chibolo Town</td>
                <td>2025/05/22</td>
                <td>Libre</td>
                <td>Normal</td>
                <td>10 km</td>
                <td><button class="details-btn" i="boton">Ver</button></td>
                <td><button class="details-btn" i="boton">Eliminar</button></td>
            </tr>
        </table>
        <table class="tabla">
            <tr>
                <th rowspan="2">Datos de carreras</th>
                <th colspan="2"></th>
            </tr>
            <tr>
                <th>N° de carreras</th>
                <th>Km recorridos</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <br>
    </section>
    <section>
        <button class="details-btn" id="boton">Actualizar contraseña</button>
        <button class="details-btn" i="boton">Eliminar cuenta</button>
          <!-- Ventana modal, por defecto no visiblel -->
          <div id="ventanaModal" class="modal" style="display: none;">
            <div class="contenido-modal">
              <span class="cerrar">&times;</span>
              <div class="form-container">
                <h2>Actualizar contrasena</h2>
                <form method="post" action="../index.php?action=cambiarContrasena">
                <div class="input-box">
                <label for="email">Email</label>
                <input type="hidden" name="correo_electronico"
                value="<?php echo htmlspecialchars($_SESSION['correo_electronico']); ?>">
            </div>
                    <div class="input-box">
                        <input name= "current_password" required type="password" id="password1" placeholder="Contraseña actual">
                    </div>
                    <div class="input-group">
                        <div class="input-box">
                            <input name= "new_password" required type="password" id="password2" placeholder="Contraseña nueva">
                        </div>

                        <div class="input-box">
                            <input name= "confirm_password" required type="password" id="password3" placeholder="Confirmar contraseña">
                        </div>

                    </div>
                    <button type="submit" class="btn">Cambiar contraseña</button>    
                </form>
            </div>
            </div>
          </div>
        </section>

    <footer>
        <link rel="stylesheet" type="text/css" href="css/footer.css">
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