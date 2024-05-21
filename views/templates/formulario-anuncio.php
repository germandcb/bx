<div class="formulario">
    <?php include_once __DIR__ . "/../templates/alertas.php"?> 
    <label for="titulo">Titulo Anuncio</label>
    <input type="text" id="titulo" name="titulo" placeholder="Titulo del anuncio" value="<?php echo $anuncio->titulo; ?>"/>
    
    <label for="descripcion">Descripción</label>
    <input type="text" id="descripcion" name="descripcion" placeholder="Descripción del Anuncio" value="<?php echo $anuncio->descripcion; ?>">

    <label for="patrocinador">URL Patrocinador</label>
    <input type="text" id="patrocinador" name="patrocinador" placeholder="Debe colocar https://example.com" value="<?php echo $anuncio->patrocinador; ?>">

    <input type="hidden" name="usuario_id" value="<?php echo $usuarioId; ?>">
</div>