<?php 
namespace Model;

class Usuario {

    protected static $tabla = "usuario";
    protected static $columnasDB = ['id', 'username', 'correo', 'fecha_nacimiento', 'contrasena'];

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

    public function validar() {

    }
}

?>