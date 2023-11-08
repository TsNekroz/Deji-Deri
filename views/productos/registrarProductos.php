<?php
include '../../app/header.php';
include '../../app/topNav.php';
include '../../model/productosModel.php';
$modeloProductos = new productosModel($conn);
$categorias = $modeloProductos->obtenerCategorias();
$departamentos = $modeloProductos->obtenerDepartamentos();
?>

<div class="container text-center mt-4">
    <h5>Registrar producto</h5>
    <form class="d-flex container" id="formRegistrarProducto">
        <div class="container my-3 me-5 ms-3">
            <div class="text-center my-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="txtNombre" name="txtNombre" />
            </div>
            <div class="text-center my-3">
                <label for="" class="form-label">Precio</label>
                <input class="form-control" type="number" id="txtPrecio" name="txtPrecio" step="0.01" min="0.01" required />
            </div>
        </div>
        <div class="container my-3 ms-5 me-3">
            <div class="text-center my-3">
                <label for="" class="form-label">Categoria</label>
                <select class="form-select" id="selectCategoria" name="selectCategoria">
                    <?php 
                        while ($row = mysqli_fetch_assoc($categorias)) {
                            ?>
                    <option value="<?= $row['categoria_id'] ?>">
                        <?= $row['nombre'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="text-center my-3">
                <label for="" class="form-label">Departamento</label>
                <select class="form-select" id="selectDepartamento" name="selectDepartamento">
                    <?php                 
                        while ($row = mysqli_fetch_assoc($departamentos)) {
                            ?>
                    <option value="<?= $row['departamento_id'] ?>">
                        <?= $row['nombre'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="container text-center">
                <button type="button" class="mx-3 btn btn-success fw-semibold my-3" onclick="guardarProducto()">Guardar</button>
                <button type="button" class="mx-3 btn btn-danger fw-semibold my-3">Cancelar</button>
            </div>
        </div>
    </form>
</div>

<?php
include '../../app/footer.php';
mysqli_close($conn);
?>

<script src="../../resources/js/productos/productos.js"></script>
