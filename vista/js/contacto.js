$(".enviar-contacto").click(function(){
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var telefono = $("#telefono").val();
    var mensaje = $("#mensaje").val();
    var datos = new FormData();
    datos.append("nombre", nombre);
    datos.append("email", email);
    datos.append("telefono", telefono);
    datos.append("mensaje", mensaje);
	$.ajax({
        url:"vista/ajax/contacto.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
        success:function(respuesta){
            console.log(respuesta);
            if(respuesta == "ok"){
                setTimeout(function(){
                    swal({
                        title: "Mensaje enviado",
                        text: "Pronto te contactaremos",
                        type: "success",
                        closeOnConfirm: false,
                        confirmButtonText: "Ok"
                        },
                        function(isConfirm){
                            alert("ok");
                            });
                            $(".swal2-confirm").click(function(){
                                location.reload();
                            });
                },250)
            }
        }
	});
});
