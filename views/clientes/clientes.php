<?php
include '../../app/header.php';
include '../../app/topNav.php';
?>

<div class="container mt-5">
    <table class="table table-striped border border-black border-opacity-50">
        <thead>
            <tr>
                <th>Cliente_id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../../model/clientesModel.php';
            $result = obtenerClientes($conn);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['cliente_id'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['correo'] . "</td>";
                    echo "<td>" . $row['telefono'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "Error en la consulta: " . mysqli_error($conn);
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include 'app/footer.php';
mysqli_close($conn);
?>