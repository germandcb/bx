<?php 
namespace Model;
use DateTime;

class Usuario extends ActiveRecord{

    protected static $tabla = "usuario";
    protected static $columnasDB = ['id', 'username', 'correo', 'fechaNacimiento', 'contrasena'];

    public $id;
    public $username;
    public $correo;
    public $fechaNacimiento;
    public $contrasena;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->username = $args['username'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->fechaNacimiento = $args['fecha-nacimiento'] ?? '';
        $this->contrasena = $args['contrasena'] ?? '';
        
    }

    public function validarNuevaCuenta() {
        if (!$this->username) {
            self::$alertas['error'][] = 'El nombre de usuario es obligatorio';
        }
        $usuario = Usuario::where('username', $this->username);
        if (!is_null($usuario)) {
            if ($usuario->username === $this->username || !$usuario) {
                self::$alertas['error'][] = 'Debe elegir otro nombre de usuario, este ya existe';
            }
        }
        if (!$this->contrasena) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        } 
        // Verificar longitud minima
        if (strlen($this->contrasena) < 6 ) {
            self::$alertas['error'][] = 'La contraseña debe contener almenos 6 caracteres';
        }
        // Verificar si contiene al menos una letra minúscula, una mayúscula, un número y un carácter especial
        if (!preg_match('/[a-z]/', $this->contrasena) || !preg_match('/[A-Z]/', $this->contrasena) ||
        !preg_match('/[0-9]/', $this->contrasena) ||
        !preg_match('/[!@#$%^&*()_+{}":;<>,.?~\-]/', $this->contrasena)) {
            self::$alertas['error'][] = 'El password debe contener una letra mayúscula, minúscula, un número y un carácter especial';
        }
        if (!$this->correo) {
            self::$alertas['error'][] = 'El correo es obligatorio';
        }
        if (!$this->fechaNacimiento) {
            self::$alertas['error'][] = 'El fecha de nacimiento es obligatorio';
        }
        // Valida edad, debe ser mayor de 20 años para registrasrse
        $fechaActual = new DateTime();
        $fechaNacimiento = new DateTime($this->fechaNacimiento);
        $edad = $fechaActual->diff($fechaNacimiento)->y;
        if ($edad <= 20 || $fechaNacimiento >= $fechaActual) {
            self::$alertas['error'][] = 'Debe ser mayor de edad para registrarse o colocar una fecha valida';
        }

        return self::$alertas;
    }

    public function validarLogin() {
        if (!$this->username) {
            self::$alertas['error'][] = 'El nombre de usuario es obligatorio';
        }
        if (!$this->contrasena) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        } 
        return self::$alertas;
    }

    public function existeUsuario() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE correo ='" . $this->correo . "' LIMIT 1;";

        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El usuario ya esta registrado';
        }
        return $resultado;
    }

    public function hashPassword() {
        $this->contrasena = password_hash($this->contrasena,PASSWORD_BCRYPT);
    }

    public function comprobarContrasena($contrasena) {
        $resultado = password_verify($contrasena, $this->contrasena);
        if (!$resultado) {
            self::$alertas['error'][] = 'Contraseña incorrecto';
        } else {
            return true;
        }
    }
}
?>