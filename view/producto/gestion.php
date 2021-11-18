<h1>Gestion de productos</h1>
<a href="<?=base_url?>producto/crear">
    Crear producto
</a>

<table>
    <tr>
        <th>Id</th>
        <th>Departamento</th>
        <th>Descripcion</th>
        <th>Precio</th>
    </tr>
    <?php while($pro = $productos->fetch_object()): ?>
        <tr>
            <td><?=$pro->idProducto ?></td>
            <td><?=$pro->idDepartamento ?></td>
            <td><?=$pro->descripcion ?></td>
            <td><?=$pro->precio ?></td>
        </tr>
    <?php endwhile; ?>    
</table>
