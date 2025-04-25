<?php  require_once __DIR__ . '/Conexion.php'; 

class Corredor {
    private $conexion;
   
    private $nombre_usuario;
    private $apellido_usuario;
    private $correo_electronico;
    private $contrasena;
    
    public function __construct($nombre_usuario = null, $apellido_usuario = null, $correo_electronico = null, $contrasena = null) {
        $this->nombre_usuario = $nombre_usuario;
        $this->apellido_usuario = $apellido_usuario;
        $this->correo_electronico = $correo_electronico;
        $this->contrasena = $contrasena;
        $this->conexion = (new Conexion())->getConexion();
    }

    public function registrar($nombre_usuario, $apellido_usuario,  $correo_electronico, $contrasena){
        $contrasena_hashed = password_hash($contrasena, PASSWORD_DEFAULT);
        $stmt = $this->conexion->prepare('INSERT INTO corredores (nombre_usuario, apellido_usuario, correo_electronico, contrasena) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $nombre_usuario,$apellido_usuario, $correo_electronico, $contrasena_hashed);
        return $stmt->execute();
    }

    public function verificarCredenciales($correo_electronico, $contrasena){
        $stmt = $this->conexion->prepare('SELECT contrasena FROM corredores WHERE correo_electronico = ?');
        $stmt->bind_param("s",$correo_electronico);
        $stmt->execute();
        $contrasena_hashed = null;
        $stmt->bind_result($contrasena_hashed);
        $stmt->fetch();
        if ($contrasena_hashed === null) {
            return false;
        }
        return password_verify($contrasena, $contrasena_hashed);
    }

    public function cambiarContrasena($correo_electronico, $new_password) {
        $stmt = $this->conexion->prepare("UPDATE corredores SET contrasena = ? WHERE correo_electronico = ?");
        $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt->bind_param("ss", $new_password_hashed, $correo_electronico);
        if ($stmt->execute()) {
            return true; // La actualización fue exitosa
        } else {
            return false; // Hubo un error al ejecutar la consulta
        }
    }

    public function getCorredor($correo_electronico) {
        $stmt = $this->conexion->prepare('SELECT * FROM corredores WHERE correo_electronico = ?');
        $stmt->bind_param("s", $correo_electronico);
        $stmt->execute();
        $result = $stmt->get_result();
        $tabla_datos = $result->fetch_all(MYSQLI_ASSOC);
        
        $this->conexion = null;
        return $tabla_datos;
    }
    

    public function getNombreUsuario() {
        return $this->nombre_usuario;
    }

    public function getApellidoUsuario() {
        return $this->apellido_usuario;
    }

    public function getCorreoElectronico() {
        return $this->correo_electronico;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

}   