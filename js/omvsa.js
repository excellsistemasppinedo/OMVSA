$(function(){
    $("#mnuConsulta").click(function(){
        $.ajax({
            url: 'pages/seleccionador.php',
            type: 'POST',
            data: {"accion": "consulta_tabla"},
            success: function(data){
                $("#contenido").html(data);
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(textStatus, errorThrown);
            },
        });
    });
});