function buscarPaciente() {
    
    let url = baseurl + "buscarpaciente", 
    dni = $("#dni").val(),
    nombre = $("#nombre").val(),
    apellidos = $("#apellidos").val(),
    edad = $("#edad").val(),
    hc = $("#edad").val();
  
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
            console.log(data);
              data = JSON.parse(data);
              console.log(data);
              $("#nombre").val( data.nombre);
              $("#apellidos").val(data.apellido);
              $("#hc").val(data.hc);
              $(".messageError").prop("hidden", true);
              
              calcularEdad(data.fecha_nacimiento);
          }
      },
      error: function () {
          $("body").overhang({
            type: "error",
            message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
          }); 
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

  function calcularEdad(fechanacimiento) {
    const date = new Date();
    const cumple = new Date(fechanacimiento);
    // const cumple = new Date("1993-12-26");

    let age = date.getFullYear() - cumple.getFullYear();
    const month = date.getMonth() - cumple.getMonth();
    if (month < 0 || (month === 0 && date.getDate() < cumple.getDate())) {
      age--;
    }
    
    $("#edad").val(age);
  }
