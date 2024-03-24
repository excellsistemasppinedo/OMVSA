$(function(){
    $("#mnuConsulta").click(function(){
        $.ajax({
            url: 'pages/seleccionador.php',
            type: 'POST',
            data: {"accion": "consulta_tabla"},
            success: function(data){
                $("#contenido").html(data);
                articulo();
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(textStatus, errorThrown);
            },
        });
    });
});

function articulo(){
    $("#txtbusqueda").on("keyup", function(){
        var cadena = $("#txtbusqueda").val();
        var accion = "busqueda";
        var tparametro = {"cadena":cadena,
                          "accion": "busqueda"};
        $.ajax({
            url: 'pages/seleccionador.php',
            type: 'POST',
            data: tparametro,
            success: function(data){
                $("#tab_articulos").html(data);
                dv_datos();
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(textStatus, errorThrown);
            },

        })      
    });

function dv_datos(){
    var filas = document.querySelectorAll("table tbody tr td button.btn");
    for (var i = 0; i < filas.length; i++) {
        filas[i].addEventListener("click", seleccion_datos,false);
    }
}

add
function seleccion_datos(e){
    var idArticulo = $(e.currentTarget).closest("tr").data("id");
    var accion = 'ubicar_id';

    var tparametro = {"idArticulo":idArticulo,
                      "accion": accion};
    $.ajax({
        url: 'pages/seleccionador.php',
        type: 'POST',
        data: tparametro,
        success: function(data){
            var datos = JSON.parse(data);
            $("#txtexistencia").val(datos[0]["unidad_venta"]);
            $("#txtfucompra").val(datos[0]["ultima"]);
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(textStatus, errorThrown);
        },
    })
}
    
}