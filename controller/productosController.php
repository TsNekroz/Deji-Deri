<?php
include '../app/dbConnection.php';
include '../model/productosModel.php';
$accion = $_POST['accion'];
$modeloProductos = new productosModel($conn);

switch($accion){
    case 'registrarProducto':
    $txtNombre = $_POST['txtNombre'];
    $txtPrecio = $_POST['txtPrecio'];
    $selectCategoria = $_POST['selectCategoria'];
    $selectDepartamento = $_POST['selectDepartamento'];

    $result = $modeloProductos->insertarProducto($txtNombre, $txtPrecio, $selectCategoria, $selectDepartamento);
    
    if($result == 1){
        $resp['msg'] = "El producto se registró correctamente.";
        $resp['status'] = true;
        echo json_encode($resp);
    } else {
        $resp['msg'] = "Error al registrar el producto, favor de revisar.";
        $resp['status'] = false;
        echo json_encode($resp);
    }

    break;

    case 'editarProducto':
    $txtIdProducto = $_POST['txtIdProducto'];
    $txtNombre = $_POST['txtNombre'];
    $txtPrecio = $_POST['txtPrecio'];
    $selectCategoria = $_POST['selectCategoria'];
    $selectDepartamento = $_POST['selectDepartamento'];

    $result = $modeloProductos->editarProducto($txtNombre, $txtPrecio, $selectCategoria, $selectDepartamento, $txtIdProducto);
    
      if($result == 1){
        $resp['msg'] = "El producto se actualizó correctamente.";
        $resp['status'] = true;
        echo json_encode($resp);
    } else {
        $resp['msg'] = "Error al actualizar el producto, favor de revisar.";
        $resp['status'] = false;
        echo json_encode($resp);
    }

    break;

    case 'borrarProducto':
    $idProducto = $_POST['idProducto'];

    $result = $modeloProductos->eliminarProducto($idProducto);
    
      if($result == 1){
        $resp['msg'] = "El producto se eliminó correctamente.";
        $resp['status'] = true;
        echo json_encode($resp);
    } else {
        $resp['msg'] = "Error al eliminar el producto, favor de revisar.";
        $resp['status'] = false;
        echo json_encode($resp);
    }

    break;
    
    default:

    break;
}

?>
