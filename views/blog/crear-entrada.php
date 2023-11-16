<main>
    <div class="contenedor">
        <div class="caja">
            <h1 class="centrar-texto">Crear Entrada</h1>
            <form action="/blog/crear-entrada" method="POST">
            <?php include_once __DIR__ . "/../templates/formulario-entrada.php" ?>                        
            
            <div class="formulario-acciones">
                <a href="/" class="btn btn-2">&laquo; Volver</a>
             <input type="submit" value="Publicar entrada" class="btn btn-2">
            </div>
        </form>
        </div>
    </div>
</main>