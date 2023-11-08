<?php
include '../../app/header.php';
include '../../app/topNav.php';
include '../../model/productosModel.php';
$modeloProductos = new productosModel($conn);
$productos = $modeloProductos->obtenerProductos();
?>

<div class="container mt-5 text-center">
    <button type="button" class="btn btn-dark fw-semibold" id="btnNuevoProducto">Nuevo Producto</button>
</div>

<div class="container">
    <table id="tablaProductos" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline table-hover my-3 border border-black border-opacity-50">
        <thead>
            <tr>
                <th class="text-center">Producto_id</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Categoria_id</th>
                <th class="text-center">Departamento_id</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
          

            if ($productos) {
                while ($row = mysqli_fetch_assoc($productos)) { 
                    ?>
            <tr>
                <td class="text-center"><?= $row['producto_id'] . "</td>"; ?></td>
                <td class="text-center"><?= $row['nombre'] . "</td>"; ?></td>
                <td class="text-center"><?= $row['precio'] . "</td>"; ?></td>
                <td class="text-center"><?= $row['categoria_id'] . "</td>"; ?></td>
                <td class="text-center"><?= $row['departamento_id'] . "</td>"; ?></td>
                <td>
                    <a href="editarProductos.php?idProducto=<?= $row['producto_id']?>" class="btn btn-primary">Editar</a>
                    <button class="btn btn-danger" onclick="eliminarProducto(<?= $row['producto_id']?>)">Eliminar</button>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "Error en la consulta: " . mysqli_error($conn);
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include '../../app/footer.php';
mysqli_close($conn);
?>

<script src="../../resources/js/productos/productos.js"></script>
