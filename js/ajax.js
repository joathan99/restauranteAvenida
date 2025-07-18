function modificarPaquete(id) {
    $("#nuevo").hide();
    $("#modificar").show();
    $.ajax({
        type:'POST',
        data:{
            accion:"modifica",
            id:$("#id"+id).val(),
            nombre:$("#nombre"+id).val(),
            duracion:$("#duracion"+id).val(),
            fechaInicio:$("#fechaInicio"+id).val(),
            descripcion:$("#descripcion"+id).val(),
            imagen:$("#imagen"+id).val(),
            promocional:$("#promocional"+id).val(),
            idAgente:$("#idAgente"+id).val(),
        },
        url:"controller/paquete_controller.php",
        success: function (response) {
            $("#modificar").html(response)
        },
        error: function (error) {
            console.log(error);
        }
    })
}

function cancelar() {
    $("#modificar").hide();
    $("#nuevo").show();
}