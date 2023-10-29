<main>
    <div class="contenedor-formulario">
        <h1 class="centrar-texto">Registrarse</h1>
        <form action="/registrarse" class="formulario " method="POST">
            <a href="" class="logo centrar-texto"><span>bx</span></a>

            <?php include_once __DIR__ . "/../templates/alertas.php" ?>

            <input 
                type="text" 
                name="username" 
                placeholder="Nombre de usuario" 
                value="<?php echo s($usuario->username); ?>"
                required
            />
            <input 
                type="password" 
                name="contrasena" 
                placeholder="Contraseña" 
                required
                value="<?php echo s($usuario->contrasena); ?>"
            />
            <input 
                type="email" 
                name="correo" 
                placeholder="correo@correo.com"
                value="<?php echo s($usuario->correo); ?>"
                required
            />
            <label for="fechaNacimiento" class="alinear-izquierda">Fecha de Nacimiento</label>
            <input 
                type="date" 
                name="fechaNacimiento" 
                id="fechaNacimiento" 
                value="<?php echo s($usuario->fechaNacimiento); ?>"
                required"
            />

            <input type="submit" value="Registrarse" class="btn btn-2">
        </form>
    </div>
</main>