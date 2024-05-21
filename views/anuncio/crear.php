<main class="contenedor">
    <h1 class="centrar-texto">Crear un Nuevo Anuncio</h1>
    <form action="/anuncios/crear" method="POST">
        <?php include_once __DIR__ . "/../templates/formulario-anuncio.php" ?>

        <div class="formulario-acciones">
            <a href="/anuncios" class="btn btn-2">&laquo; Volver</a>
            <input type="submit" value="Publicar Anucio" class="btn btn-2">
        </div>
    </form>
</main>