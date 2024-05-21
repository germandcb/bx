<?php foreach ($anuncios as $anuncio): ?>
    <!--.anuncio-blog-->
    <article class="anuncio">
        <h3><?php echo $anuncio->titulo; ?></h3>
        <p><?php echo $anuncio->descripcion; ?></p>
        <a class="btn btn-anuncio" target="__blank" href="<?php echo $anuncio->patrocinador; ?>">Link Patrocinador!!</a>

        <div class="datos-anuncio">
            <a href="/anuncios/actualizar?id=<?php echo $anuncio->id; ?>" class="btn-entrada btn-actualizar">Actualizar</a>
            |
            <form method="POST" action="/anuncios/eliminar">
                <input type="hidden" name="id" value="<?php echo $anuncio->id; ?>">
                <input type="hidden" name="tipo" value="anuncio">
                <input type="submit" class="btn-entrada btn-eliminar"
                    onclick="return confirm('Desea eliminar este Anuncio? ')" value="Eliminar">
            </form>
        </div>
    </article> <!-- .anuncio -->
<?php endforeach; ?>