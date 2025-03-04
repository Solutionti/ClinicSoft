function buscarPaciente() {
  // Obtener el valor del DNI
  let dni = $("#dni").val();
  
  // Validar que el DNI no esté vacío
  if (!dni || dni.trim() === "") {
    // Mostrar alerta visual con overhang
    $("body").overhang({
      type: "error",
      message: "Debe ingresar un DNI para buscar"
    });
    $("#dni").focus();
    return;
  }
  
  let url = baseurl + "buscarpaciente";
  
  $.ajax({
    url: url,
    method: "POST",
    data: {
      dni: dni
    },
    success: function(data) {
      if (data === "error") {
        // Mostrar mensaje en el contenedor de mensajes
        $(".messageError").html('<div class="alert alert-danger" role="alert">El paciente no se encuentra registrado en la base de datos</div>');
        
        // Añadir alerta visual con overhang
        $("body").overhang({
          type: "error",
          message: "El paciente no se encuentra registrado en la base de datos"
        });
        
        // Limpiar campos
        $("#nombre").val("");
        $("#apellidos").val("");
        $("#hc").val("");
        $("#edad").val("");
      } else {
        try {
          // Parsear los datos
          data = JSON.parse(data);
          
          // Llenar los campos con datos del paciente
          $("#nombre").val(data.nombre);
          $("#apellidos").val(data.apellido);
          $("#hc").val(data.hc);
          $(".messageError").prop("hidden", true);
          
          // Calcular edad
          calcularEdad(data.fecha_nacimiento);
          
          // Mostrar alerta de éxito
          $("body").overhang({
            type: "success",
            message: "Paciente encontrado correctamente"
          });
        } catch (e) {
          // Error al procesar los datos
          console.error("Error al procesar datos:", e);
          
          $("body").overhang({
            type: "error",
            message: "Error al procesar los datos del paciente"
          });
        }
      }
    },
    error: function() {
      // Error de conexión
      $("body").overhang({
        type: "error",
        message: "Alerta! Tenemos un problema al conectar con la base de datos. Verifica tu red."
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
