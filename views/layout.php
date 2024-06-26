<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bx</title>
    <link rel="stylesheet" href="../build/css/normalize.css">
    <link rel="stylesheet" href="../build/css/style.css">
</head>

<body>

<?php 
    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
?>
    <header class="header">
        <div class="contenedor">
            <div class="header-barra">
                <a href="/" class="logo"><span>bx</span></a>
                <nav class="navegacion ">
                    <a href="/">Inicio</a>
                    <a href="/about">Sobre el proyecto</a>
                    <?php if ($auth) { ?>
                        <a href="/blog/mis-entradas">Mis Entradas</a>
                        <?php if(isset($_SESSION['admin'])) { ?>
                            <a href="/anuncios">Anuncios</a>
                        <?php } ?>
                    <?php }?>
                    <div class="user">
                        <?php if (!$auth) { ?>
                            <a href="/iniciar-sesion" class="btn">Iniciar Sesión</a>
                            <a href="/registrarse" class="btn">Registrarse</a>
                        <?php }?>
                    </div>
                </nav>
                <button class="mobile-menu btn-m">≡</button>
                <?php if ($auth) { ?>
                    <div class="user-acciones">
                        <a href="#" class="" onclick="return alert('Pagina en construcción');">Cuenta</a>
                        <a href="/cerrar-sesion" class="">Cerrar Sesión</a>
                    </div>
                    <span class="user-icon">OwO</span>
                <?php }?>
            </div>
        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer">
        <div class="contenedor">
            <p class="copy">Todos los derechos reservados @ bx</p>
        </div>
    </footer>
    <script src="../build/js/app.js" type="module"></script>
</body>

</html>