<h1>Gestion de productos</h1>
<a href="<?=base_url?>producto/crear">
    Crear producto
</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <strong>El producto se creo</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] == 'failed'): ?>  
    <strong>El producto no  se pudo crear</strong>
<?php endif;?>
<?php Utils::deleteSession('producto');?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong>El producto se elimino</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>  
    <strong>El producto no  se pudo eliminar</strong>
<?php endif;?>
<?php Utils::deleteSession('delete');?>

<table>
    <tr>
        <th>Id</th>
        <th>Departamento</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Acciones</th>
    </tr>
    <?php while($pro = $productos->fetch_object()): ?>
        <tr>
            <td><?=$pro->idProducto ?></td>
            <td><?=$pro->idDepartamento ?></td>
            <td><?=$pro->descripcion ?></td>
            <td><?=$pro->precio ?></td>
            <td>
                <a href="<?=base_url?>producto/editar&idProducto=<?=$pro->idProducto?>" class="button">Modificar</a>
                <a href="<?=base_url?>producto/eliminar&idProducto=<?=$pro->idProducto?>" class="button">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>    
</table>
