<?php

use Model\Usuario;

function debugear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function usuariodlaentrada($id):string {
    $usuario = Usuario::find($id);
    $username = $usuario->username;
    return $username;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function validarORedireccionar(string $url) {
    // Validar la URL por ID Válido
    $id = $_GET['id'];
    $id = filter_var( $id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: {$url}");
    }

    return $id;
}

function validarTipoContenido ($tipo) {
    $tipos = ['entrada'];
    return in_array($tipo, $tipos);
}