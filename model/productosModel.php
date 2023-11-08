<?php

class productosModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    ### funciones de consulta de informacion ###
    public function obtenerProductos(){
        $sqlConsulta = "SELECT * FROM producto";
        $result = mysqli_query($this->conn, $sqlConsulta);
        if($result){
            return $result;
        }
    }
    public function obtenerCategorias(){
        $sqlConsulta = "SELECT * FROM categoria";
        $result = mysqli_query($this->conn, $sqlConsulta);
        if($result){
            return $result;
        }
    }
    public function obtenerDepartamentos(){
        $sqlConsulta = "SELECT * FROM departamentos";
        $result = mysqli_query($this->conn, $sqlConsulta);
        if($result){
            return $result;
        }
    }
    public function obtenerProductoPorId($idProducto){
        $sqlConsulta = "SELECT * FROM producto WHERE producto_id = $idProducto;";
        $result = mysqli_query($this->conn, $sqlConsulta);
        $producto = $result->fetch_assoc();
        return $producto;
    }
    public function insertarProducto($txtNombre, $txtPrecio, $selectCategoria, $selectDepartamento){
        $sqlConsulta = "INSERT INTO producto(nombre, precio, categoria_id, departamento_id)
        VALUES('$txtNombre', $txtPrecio, $selectCategoria, $selectDepartamento);";
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;
    }
    public function editarProducto($txtNombre, $txtPrecio, $selectCategoria, $selectDepartamento, $txtIdProducto){
        $sqlConsulta = "UPDATE producto SET nombre = '$txtNombre', precio = $txtPrecio, categoria_id = $selectCategoria, departamento_id = $selectDepartamento WHERE producto_id = $txtIdProducto";
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;
    }
    public function eliminarProducto($idProducto){
        $sqlConsulta = "DELETE FROM producto WHERE producto_id = $idProducto";
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;
    }
}


?>
