<aside id="lateral">
            <div id="login" class="block_aside">

                <?php if(!isset($_SESSION['identity'])):?>
                <form action="<?=base_url?>usuario/login" method="post">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password">
                    <input type="submit" value="Enviar">
                </form>
                <a href="<?=base_url?>usuario/registro">Registrarse</a>
                <?php else: ?>
                    <h3><?=$_SESSION['identity']->nombre ?></h3>
                <?php endif; ?>
                <ul>                
                <?php  if(isset($_SESSION['supervisor'])): ?>
                <li><a href="<?=base_url?>producto/gestion">Gestionar productos</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['identity'])): ?>
                <li><a href="#">Mis compras</a></li>
                <li><a href="<?=base_url?>usuario/logout">Cerrar sesion</a></li>
                <?php endif; ?>
                </ul>
                
            </div>
        </aside>
        <div id="central">