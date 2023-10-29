<?php foreach ($entradas as $entrada):?>
<!--.entrada-blog-->
<article class="entrada">
    <div class="datos-us">
        <p><?php echo $usuario->username; ?></p>
        <a href="blog/entrada?id=<?php echo $entrada->id; ?>">
            <h2><?php echo $entrada->titulo_entrada; ?></h2>
        </a>
    </div>
    <div class="datos-entrada">
        <p><?php echo $entrada->fecha_entrada; ?></p>
        <!-- <p>Comentario</p>
        <p>Reaciones</p> -->
    </div>
</article> <!-- .entrada -->
<?php endforeach; ?>