function histerosonografia() {
    var url = baseurl + "administracion/histerosonografia"; // Ajusta la URL según tu necesidad
    var documento_paciente = $("#documento_paciente").val(),
        codigo_doctor = $("#codigo_doctor").val(),
        motivo = $("#motivo").val(),
        descripcionProcedimiento = $("#descripcionProcedimiento").val(),
        conclusiones = $("#conclusiones").val(),
        sugerencias = $("#sugerencias").val();
  
    $.ajax({
      url: url,
      method: "POST",
      data: {
        documento_paciente: documento_paciente,
        codigo_doctor: codigo_doctor,
        motivo: motivo,
        descripcionProcedimiento: descripcionProcedimiento,
        conclusiones: conclusiones,
        sugerencias: sugerencias
      },
      success: function() {
        $("body").overhang({
          type: "success",
          message: "Histerosonografía registrada correctamente"
        });
  
        // Limpiar los campos después de un insert exitoso
        $("#documento_paciente").val('');
        $("#codigo_doctor").val('');
        $("#motivo").val('');
        $("#descripcionProcedimiento").val('Previa colocación de sondas foley N° 8 se instila 15 cc de NaCl 0.9%, se observa imágenes en cavidad endometrial una de 6 x 4 mm en pared posterior a 17 mm del fondo de cavidad endometrial (tipo 0 ) y otro de 4 x 5 mm en cara anterior a 8 mm del fondo de la cavidad endometrial. LA PACIENTE TOLERA EL PROCEDIMIENTO.');
        $("#conclusiones").val('');
        $("#sugerencias").val('');
      },
      error: function() {
        $("body").overhang({
          type: "error",
          message: "Alerta! Tenemos un problema al conectar con la base de datos. Verifica tu red.",
        }); 
      }
    });  
  }
