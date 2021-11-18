<h1>Crear nuevo producto</h1>

<form action="<?=base_url?>producto/save" method="POST">
    <label for="descripcion">Nombre</label>
    <input type="text" name="descripcion">

    <label for="precio">Precio</label>
    <input type="text" name="precio">

    <label for="departamento">Departamento</label>
    <select name="departamento" id="departamento">
        <option value="tecnologia">Tecnologia</option>
        <option value="papeleria">Papeleria</option>
        <option value="oficina">Oficina</option>
    </select>
    <input type="submit" value="Guardar">
</form>