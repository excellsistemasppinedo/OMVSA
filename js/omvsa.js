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
        $("#loading-modal").modal("show");
        $.ajax({
            url: 'pages/seleccionador.php',
            type: 'POST',
            data: tparametro,
            success: function(data){
                $("#tab_articulos").html(data);
                $("#txtbusqueda").focus();
                dv_datos();
                $("#loading-modal").modal("hide");
                $("#txtbusqueda").focus();
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


function seleccion_datos(e){
    var idArticulo = $(e.currentTarget).closest("tr").data("id");
    var accion = 'producto_modal';

    var tparametro = {"idArticulo":idArticulo,
                      "accion": accion};
    $.ajax({    
        url: 'pages/seleccionador.php',
        type: 'POST',
        data: tparametro,
        success: function(res){
            $("#formulario-modal").html(res);
            $("#info-modal").modal("show");
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(textStatus, errorThrown);
        },
    })
}
    
}