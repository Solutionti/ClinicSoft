function createEcografiaHisterosonografia() {
  var url = baseurl + "administracion/ecografiahisterosonografia";

  var datos = {
    documento_paciente: $("#dni").val(),
    codigo_doctor: $("#codigo_doctor").val(),
    motivo: $("#motivo").val(),
    descripcionProcedimiento: $("#descripcionProcedimiento").val(),
    conclusiones: $("#conclusiones").val(),
    sugerencias: $("#sugerencias").val(),
    fecha: $("#fecha").val(),
    hora: $("#hora").val(),
    usuario: $("#usuario").val()
  };

  console.log(datos); // Verificar datos antes de enviarlos

  $.ajax({
    url: url,
    method: "POST",
    data: datos,
    dataType: "json",
    success: function(response) {
      if (response.status === "success") {
        $("body").overhang({
          type: "success",
          message: "Ecografía Histerosonografía registrada correctamente"
        });

        // Limpiar los campos después de un insert exitoso
        $("#dni, #codigo_doctor, #motivo, #descripcionProcedimiento, #conclusiones, #sugerencias, #fecha, #hora, #usuario").val('');
        generarpdfHisterosonografia()
        setTimeout(function() {
          location.reload();
        }, 2000);
      } else {
        $("body").overhang({
          type: "error",
          message: response.message || "Error al registrar la ecografía."
        });
      }
    },
    error: function(xhr, status, error) {
      console.log(xhr.responseText); // Ver error en consola
      $("body").overhang({
        type: "error",
        message: "Alerta! Tenemos un problema al conectar con la base de datos. Verifica tu red."
      });
    }
  });
}

function generarpdfHisterosonografia() {
  let dni = $("#dni").val();
  let url = baseurl + "administracion/pdfecografiahisterosonografia/" + dni;
  window.open(url, "_blank", " width=950, height=1000");
} 