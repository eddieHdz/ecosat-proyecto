<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && isset($_SESSION['register']) == 'complete'):?>
    <strong>Registro completado exitosamente</strong>
<?php elseif(isset($_SESSION['register']) && isset($_SESSION['register']) == 'failed'): ?>
    <strong>Registro fallido</strong>
<?php endif; ?>
<?php Utils::deleteSession('register');?>

<form action="<?=base_url?>usuario/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/>

    <label for="usuario">Usuario</label>
    <input type="text" name="usuario" required/>

    <label for="password">Password</label>
    <input type="password" name="password" required/>
    <input type="submit" value="Registrarse">
</form>