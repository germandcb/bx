<h4 class="centrar-texto">Información Relevante</h4>

<?php foreach ($anuncios as $anuncio): ?>
    <!--.anuncio-blog-->
    <article class="anuncio">
        <h4><?php echo $anuncio->titulo; ?></h4>
        <p><?php echo $anuncio->descripcion; ?></p>
        <a class="btn btn-anuncio" target="__blank" href="<?php echo $anuncio->patrocinador; ?>">Mas Información!!</a>
    </article> <!-- .anuncio -->
<?php endforeach; ?>