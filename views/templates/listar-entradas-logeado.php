<?php foreach ($entradas as $entrada):?>
<!--.entrada-blog-->
<article class="entrada">
    <div class="datos-us">
        <p><?php echo usuariodlaentrada($entrada->usuario_id); ?></p>
        <a href="/blog/entrada?id=<?php echo $entrada->id; ?>">
            <h2><?php echo $entrada->titulo_entrada; ?></h2>
        </a>
    </div>
    <div class="datos-entrada">
        <p><?php echo $entrada->fecha_entrada; ?> |
        <a href="/blog/actualizar-entrada?id=<?php echo $entrada->id; ?>" class="btn-entrada btn-actualizar">Actualizar</a> | 
        <form method="POST" action="/blog/eliminar-entrada">
            <input type="hidden" name="id" value="<?php echo $entrada->id; ?>">
            <input type="hidden" name="tipo" value="entrada">
            <input type="submit" class="btn-entrada btn-eliminar" onclick="return confirm('Desea eliminar esta entrada')" value="Eliminar">
        </form>
    </p>
        
        <!-- <p>Comentario</p>
        <p>Reaciones</p> -->
    </div>
</article> <!-- .entrada -->
<?php endforeach; ?>