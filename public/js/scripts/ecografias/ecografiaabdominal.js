function ecografiaAbdominal() {
    var url = baseurl + "administracion/ecografiaabdominal"; // Ajusta la URL según tu necesidad
    var documento_paciente = $("#documento_paciente").val(),
        codigo_doctor = $("#codigo_doctor").val(),
        motivo = $("#motivo").val(),
        estomago = $("#estomago").val(),
        higado = $("#higado").val(),
        coledoco_diametro = $("#coledoco_diametro").val(),
        vesicula_volumen = $("#vesicula_volumen").val(),
        vesicula_paredes = $("#vesicula_paredes").val(),
        bazo = $("#bazo").val(),
        rinonDerecho = $("#rinonDerecho").val(),
        rinonIzquierdo = $("#rinonIzquierdo").val(),
        otrosHallazgos = $("#otrosHallazgos").val(),
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
        rinonDerecho: rinonDerecho,
        rinonIzquierdo: rinonIzquierdo,
        otrosHallazgos: otrosHallazgos,
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
        $("#rinonDerecho").val('');
        $("#rinonIzquierdo").val('');
        $("#otrosHallazgos").val('');
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