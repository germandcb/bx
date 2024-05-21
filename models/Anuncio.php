<?php 

namespace Model;

class Anuncio extends ActiveRecord {

    protected static $tabla = 'anuncio';
    protected static $columnasDB = ['id', 'titulo', 'descripcion', 'patrocinador', 'usuario_id'];

    public $id;
    public $titulo;
    public $descripcion;
    public $patrocinador;
    public $usuario_id;

    public function __construct( $args = [] ) {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->patrocinador = $args['patrocinador'] ?? '';
        $this->usuario_id = $args['usuario_id'] ?? '';
    }

    public function validar() {
        if(!$this->titulo) {
            self::$alertas['error'][] = 'El titulo del anuncio es obligatorio';
        }
        if(!$this->descripcion) {
            self::$alertas['error'][] = 'La descripción del anuncio es obligatorio';
        }
        if(!$this->patrocinador) {
            self::$alertas['error'][] = 'La URL del patrociandor del anuncio es obligatorio';
        }

        return self::$alertas;
    }
}