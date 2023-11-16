<main>
    <div class="contenedor-formulario">
        <h1 class="centrar-texto">Iniciar Sesión</h1>
        <form action="/iniciar-sesion" class="formulario centrar-texto" method="POST">
            <a href="" class="logo"><span>bx</span></a>
            <?php include_once __DIR__ . "/../templates/alertas.php" ?>
            <input 
                type="text" 
                name="username" 
                placeholder="Nombre de usuario" 
                
            />
            <input 
                type="password" 
                name="contrasena" 
                placeholder="Contraseña" 
                
            />

            <input type="submit" value="Iniciar Sesión" class="btn btn-2">

            <p>¿Olvido su contraseña? - <a href="" onclick="return alert('Contactese con el administrador');">Recuperar Contraseña</a></p>
        </form>
    </div>
</main>