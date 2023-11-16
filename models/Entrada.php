<?php
namespace Model;

class Entrada extends ActiveRecord {
    protected static $tabla = 'entrada';
    protected static $columnasDB = ['id', 'titulo_entrada', 'contenido_entrada', 'fecha_entrada', 'usuario_id'];

    public $id;
    public $titulo_entrada;
    public $contenido_entrada;
    public $fecha_entrada;
    public $usuario_id;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->titulo_entrada = $args['titulo_entrada'] ?? '';
        $this->contenido_entrada = $args['contenido_entrada'] ?? '';
        $this->fecha_entrada = $args['fecha_entrada'] ?? '';
        $this->usuario_id = $args['usuario_id'] ?? '';
    }

    public function validar() {
        if (!$this->titulo_entrada) {
            self::$alertas['error'][] = 'El titulo de la entrada es obligatorio';
        }
        if (!$this->contenido_entrada) {
            self::$alertas['error'][] = 'El contenido de la entrada es obligatorio';
        }
        return self::$alertas;
    }

    public static function misEntradas($columna, $valor) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE {$columna} = '{$valor}'";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public function setusuarioId($id){
        $this->usuario_id = $id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setFechaCreacion(){
        $this->fecha_entrada = date("Y-m-d H:i:s");
    }
}

?>