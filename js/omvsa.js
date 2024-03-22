$(function(){
    $("#mnuConsulta").click(function(){
        $.ajax({
            url: 'pages\seleccionador.php',
            type: 'POST',
            data: {"accion": "consulta_datos"},
            success: function(data){
                $("#content").html(data);
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(textStatus, errorThrown);
            },
        });
    });
});