<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecosat</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
    <header id="header">
        <div id="logo">
            <h2>logo</h2>
            <a href="index.php">
                Proyecto Ecosat
            </a>
        </div>
    </header>
    <!--MENU-->
    <nav id="menu">
        <ul>
            <li>
                <a href="#">
                    Inicio
                </a>
            </li>
            <li>
                <a href="#">
                    Departamentos
                </a>
            </li>
        </ul>
    </nav>
    <div id="content">
        <aside id="lateral">
            <div id="login" class="block_aside">
                <form action="#" method="post">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password">
                    <input type="submit" value="Enviar">
                </form>
                <ul>
                <li><a href="#">Mis compras</a></li>
                <li><a href="#">Gestionar productos</a></li>
                </ul>
                
            </div>
        </aside>
        <div id="central">
            <div class="product">
                <h2>MOUSE INALAMBRICO</h2>
                <p>Tecnologia</p>
                <p>250.00</p>
                <a href="#" class="button">Comprar</a>
            </div>
            <div class="product">
                <h2>MOUSE INALAMBRICO</h2>
                <p>Tecnologia</p>
                <p>250.00</p>
                <a href="#" class="button">Comprar</a>
            </div>
            <div class="product">
                <h2>MOUSE INALAMBRICO</h2>
                <p>Tecnologia</p>
                <p>250.00</p>
                <a href="#" class="button">Comprar</a>
            </div>
        </div>
    </div>
    <footer id="footer">
        <p>Desarrollado por Eduardo Hernández <?=date('Y')?></p>
    </footer>
    </div>
</body>
</html>