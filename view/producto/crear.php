<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <h1>Editar producto <?=$pro->descripcion ?></h1>
    <?php $url_action = base_url."producto/save&idProducto=".$pro->idProducto; ?>
<?php else: ?>
    <h1>Crear nuevo producto</h1>
    <?php $url_action = base_url."producto/save"; ?>
<?php endif; ?>

<form action="<?=$url_action?>" method="POST">
    <label for="descripcion">Nombre</label>
    <input type="text" name="descripcion" value="<?=isset($pro)&&is_object($pro)? $pro->descripcion : ''; ?>">

    <label for="precio">Precio</label>
    <input type="text" name="precio" value="<?=isset($pro)&&is_object($pro)? $pro->precio : ''; ?>">

    <label for="departamento">Departamento</label>
    <select name="departamento" id="departamento">
        <option value="tecnologia">Tecnologia</option>
        <option value="papeleria">Papeleria</option>
        <option value="oficina">Oficina</option>
    </select>
    <input type="submit" value="Guardar">
</form>