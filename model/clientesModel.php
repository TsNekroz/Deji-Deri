<?php
### funciones de consulta de informacion ###
function obtenerClientes($conn){
    $sqlConsulta = "SELECT * FROM clientes";
    $result = mysqli_query($conn, $sqlConsulta);
    if($result){
        return $result;
    }
}
?>