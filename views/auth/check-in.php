<main>
    <div class="contenedor-formulario">
        <h1 class="centrar-texto">Registrarse</h1>
        <form action="/check-in" class="formulario centrar-texto" method="POST">
            <a href="" class="logo"><span>bx</span></a>

            <input type="text" name="usuario[username]" placeholder="Nombre de usuario" required>
            <input type="password" name="usuario[password]" placeholder="Contraseña" required>
            <input type="email" name="usuario[correo]" placeholder="correo@correo.com" required>
            <label for="fecha-nacimiento" class="alinear-izquierda">Fecha de Nacimiento</label>
            <input type="date" name="usuario[fecha-nacimiento]" id="fecha-nacimiento" required">

            <input type="submit" value="Registrarse" class="btn btn-2">
        </form>
    </div>
</main>