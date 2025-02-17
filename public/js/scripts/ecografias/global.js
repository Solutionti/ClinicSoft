function buscarPaciente() {
    
  let url = baseurl + "buscarpaciente", 
  dni = $("#dni").val(),
  nombre = $("#nombre").val(),
  apellidos = $("#apellidos").val(),
  edad = $("#edad").val(),
  hc = $("#hc").val();

  $.ajax({
    url: url,
    method: "POST",
    data: {
      dni: dni
  },
    success: function(data) {
        if (data === "error") {
            $(".messageError").html('<div class="alert alert-danger" role="alert">El paciente no se encuentra registrado en la base de datos</div>');
        } else {
            data = JSON.parse(data);
            console.log(data);
            $("#nombre").val( data.nombre);
            $("#apellidos").val(data.apellido);
            $("#hc").val(data.hc);
            $("#edad").val(data.edad);
            $(".messageError").prop("hidden", true);
        }
    },
    error: function () {
        $("body").overhang({
          type: "error",
          message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
        }); 
      }
  });

}

function calcularEdad() {
  
}
