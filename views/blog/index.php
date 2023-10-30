<main>
    <div class="contenedor">
        <div class="caja">
            <h1 class="centrar-texto">!Explore lo que la gente esta diciendo aa¡</h1>
            <div class="barra">
                <a href="/blog/crear-entrada" class="btn">[ Crear entrada ⇨ ]</a>
                <div class="consulta">
                    <a href="">[ Por Fecha ⇩ ]</a>
                    <a href="">[ Por Relevancia ⇩ ]</a>
                </div>
            </div>
            <div class="entradas">
                <?php include __DIR__ .'/../templates/listar-entradas.php' ?>
            </div>
        </div>
    </div>
</main>