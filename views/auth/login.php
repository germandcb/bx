<main>
    <div class="contenedor-formulario">
        <h1 class="centrar-texto">Iniciar Sesión</h1>
        <form action="/login" class="formulario centrar-texto" method="POST">
            <a href="" class="logo"><span>bx</span></a>

            <input type="text" name="usuario[username]" placeholder="Nombre de usuario" required>
            <input type="password" name="usuario[contrasena]" placeholder="Contraseña" required>

            <input type="submit" value="Iniciar Sesión" class="btn btn-2">

            <p>¿Olvido su contraseña? - <a href="">Recuperar Contraseña</a></p>
        </form>
    </div>
</main>