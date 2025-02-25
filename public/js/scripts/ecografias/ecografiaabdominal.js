function createEcografiaAbdominal() {
    var url = baseurl + "administracion/ecografiaabdominal"; // Ajusta la URL según tu necesidad
    var documento_paciente = $("#dni").val(),
        codigo_doctor = $("#codigo_doctor").val(),
        motivo = $("#motivo").val(),
        estomago = $("#estomago").val(),
        higado = $("#higado").val(),
        coledoco_diametro = $("#coledoco_diametro").val(),
        vesicula_volumen = $("#vesicula_volumen").val(),
        vesicula_paredes = $("#vesicula_paredes").val(),
        bazo = $("#bazo").val(),
        rinon_derecho = $("#rinon_derecho").val(),
        rinon_izquierdo = $("#rinon_izquierdo").val(),
        otros_hallazgos = $("#otros_hallazgos").val(),
        conclusiones = $("#conclusiones").val(),
        sugerencias = $("#sugerencias").val();
  
    $.ajax({
      url: url,
      method: "POST",
      data: {
        documento_paciente: documento_paciente,
        codigo_doctor: codigo_doctor,
        motivo: motivo,
        estomago: estomago,
        higado: higado,
        coledoco_diametro: coledoco_diametro,
        vesicula_volumen: vesicula_volumen,
        vesicula_paredes: vesicula_paredes,
        bazo: bazo,
        rinon_derecho: rinon_derecho,
        rinon_izquierdo: rinon_izquierdo,
        otros_hallazgos: otros_hallazgos,
        conclusiones: conclusiones,
        sugerencias: sugerencias
      },
      success: function() {
        $("body").overhang({
          type: "success",
          message: "Ecografía Abdominal registrada correctamente"
        });
  
        // Limpiar los campos después de un insert exitoso
        $("#documento_paciente").val('');
        $("#codigo_doctor").val('');
        $("#motivo").val('');
        $("#estomago").val('');
        $("#higado").val('');
        $("#coledoco_diametro").val('');
        $("#vesicula_volumen").val('');
        $("#vesicula_paredes").val('');
        $("#bazo").val('');
        $("#rinon_derecho").val('');
        $("#rinon_izquierdo").val('');
        $("#otros_hallazgos").val('');
        $("#conclusiones").val('');
        $("#sugerencias").val('');
        setTimeout(function() {
          location.reload();
        }, 2000);
      },
      
      error: function() {
        $("body").overhang({
          type: "error",
          message: "Alerta! Tenemos un problema al conectar con la base de datos. Verifica tu red.",
        }); 
      }
    });  
  }

  function generarpdfAbdominal() {
    let dni = $("#dni").val();
    let url = baseurl + "administracion/pdfecografiaabdominal/" + dni;
    window.open(url, "_blank", " width=950, height=1000");
  }    