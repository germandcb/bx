<main>
    <div class="contenedor-entrada">
        <div class="caja">
            <h1 class="centrar-texto"><?php echo $entrada->titulo_entrada; ?></h1>
            <div class="info-entrada">
                <p> 
                    Usuario : <span><?php echo $usuario->username?></span> | 
                    Fecha de Creación: <span><?php echo $entrada->fecha_entrada?></span>
                </p>
            </div>  
            <p class="contenido-entrada">
                <?php echo $entrada->contenido_entrada; ?>
            </p>
        </div>
    </div>
</main>