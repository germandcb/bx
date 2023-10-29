<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bx</title>
    <link rel="stylesheet" href="../build/css/style.css">
    <link rel="stylesheet" href="../build/css/normalize.css">
</head>

<body>
    <header class="header">
        <div class="contenedor">
            <div class="barra">
                <a href="/" class="logo"><span>bx</span></a>
                <nav class="navegacion ">
                    <a href="/">{ Inicio }</a>
                    <a href="/about">{ Sobre el proyecto }</a>
                    <div class="user">
                        <a href="/registrarse" class="btn">{ Registrarse }</a>
                        <a href="/login" class="btn">{ Iniciar Sesión }</a>
                    </div>
                </nav>
                <button class="mobile-menu btn-m">≡</button>
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