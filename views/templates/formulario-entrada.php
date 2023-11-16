<div class="formulario">
    <?php include_once __DIR__ . "/../templates/alertas.php"?>
    <input type="text" name="titulo_entrada" placeholder="Titulo de la entrada"
        value="<?php echo s($entrada->titulo_entrada);?>"/>
    <textarea type="text" name="contenido_entrada"
        placeholder="Contenido de la entrada"><?php echo s($entrada->contenido_entrada);?></textarea>
</div>