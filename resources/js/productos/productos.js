$(document).ready(function () {
    $("#tablaProductos").dataTable({
        responsive: {
            details: false,
        },
        scrollY: "100%",
        scrollCollapse: true,
        deferRender: true,
        scroller: true,
        scrollX: true,
        processing: true,
        searching: true,
    });
});

const btnNuevoProducto = document.getElementById("btnNuevoProducto");
if (btnNuevoProducto) {
    btnNuevoProducto.addEventListener("click", function () {
        window.location.href = "../../views/productos/registrarProductos.php";
    });
}

function guardarProducto() {
    const formulario = document.getElementById("formRegistrarProducto");
    const formData = new FormData(formulario);

    formData.append("accion", "registrarProducto");

    $.ajax({
        url: "../../controller/productosController.php",
        method: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.log(response);

            if (response.status) {
                $.confirm({
                    title: "Éxito",
                    content: response.msg,
                    type: "green",
                    theme: "modern",
                    typeAnimated: true,
                    buttons: {
                        confirm: {
                            text: "Aceptar",
                            btnClass: "btn btn-success",
                            action: function () {
                                window.location.href = "../../views/productos/productos.php";
                            },
                        },
                    },
                });
            } else {
                $.confirm({
                    title: "Error",
                    content: response.msg,
                    type: "red",
                    theme: "modern",
                    typeAnimated: true,
                    buttons: {
                        confirm: {
                            text: "Aceptar",
                            btnClass: "btn btn-danger",
                            action: function () {
                                window.location.href = "../../views/productos/productos.php";
                            },
                        },
                    },
                });
            }
        },
        error: function (e) {
            console.log(e);
        },
    });
}

function actualizarProducto() {
    const formulario = document.getElementById("formEditarProducto");
    const formData = new FormData(formulario);

    formData.append("accion", "editarProducto");

    $.ajax({
        url: "../../controller/productosController.php",
        method: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.log(response);

            if (response.status) {
                $.confirm({
                    title: "Éxito",
                    content: response.msg,
                    type: "green",
                    theme: "modern",
                    typeAnimated: true,
                    buttons: {
                        confirm: {
                            text: "Aceptar",
                            btnClass: "btn btn-success",
                            action: function () {
                                window.location.href = "../../views/productos/productos.php";
                            },
                        },
                    },
                });
            } else {
                $.confirm({
                    title: "Error",
                    content: response.msg,
                    type: "red",
                    theme: "modern",
                    typeAnimated: true,
                    buttons: {
                        confirm: {
                            text: "Aceptar",
                            btnClass: "btn btn-danger",
                            action: function () {
                                window.location.href = "../../views/productos/productos.php";
                            },
                        },
                    },
                });
            }
        },
        error: function (e) {
            console.log(e);
        },
    });
}

function eliminarProducto(idProducto) {
    if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
        const data = {

            accion: "borrarProducto",
            idProducto: idProducto
            };
        $.ajax({
            url: "../../controller/productosController.php",
            method: "POST",
            data: data,
            cache: false,
            dataType: "json",
            success: function (response) {
                console.log(response);

                if (response.status) {
                    $.confirm({
                        title: "Éxito",
                        content: response.msg,
                        type: "green",
                        theme: "modern",
                        typeAnimated: true,
                        buttons: {
                            confirm: {
                                text: "Aceptar",
                                btnClass: "btn btn-success",
                                action: function () {
                                    window.location.href = "../../views/productos/productos.php";
                                },
                            },
                        },
                    });
                } else {
                    $.confirm({
                        title: "Error",
                        content: response.msg,
                        type: "red",
                        theme: "modern",
                        typeAnimated: true,
                        buttons: {
                            confirm: {
                                text: "Aceptar",
                                btnClass: "btn btn-danger",
                                action: function () {
                                    window.location.href = "../../views/productos/productos.php";
                                },
                            },
                        },
                    });
                }
            },
            error: function (e) {
                console.log(e);
            },
        });
    }
}
