function createEcografiaObstetrica() {
    var url = baseurl + "administracion/ecografiaobstetrica"; // Ajusta la URL según tu necesidad
    var documento_paciente = $("#dni").val(),
        codigo_doctor = $("#codigo_doctor").val(),
        fetoembrion = $("input[name='fetoembrion']:checked").val(),
        situacion = $("input[name='situacion']:checked").val(),
        estadoFeto = $("#estadoFeto").val(),
        placenta = $("#placenta").val(),
        dpb = $("#dpb").val(),
        lcf = $("#lcf").val(),
        min = $("#min").val(),
        cc = $("#cc").val(),
        ca = $("#ca").val(),
        lf = $("#lf").val(),
        ila = $("#ila").val(),
        percentil = $("#percentil").val(),
        tipoParto = $("#tipoParto").val(),
        conclusion = $("#conclusion").val(),
        sugerencia = $("#sugerencia").val();
  
    $.ajax({
      url: url,
      method: "POST",
      data: {
        
        documento_paciente: documento_paciente,
        codigo_doctor: codigo_doctor,
        fetoembrion: fetoembrion,
        situacion: situacion,
        estadoFeto: estadoFeto,
        placenta: placenta,
        dpb: dpb,
        lcf: lcf,
        min: min,
        cc: cc,
        ca: ca,
        lf: lf,
        ila: ila,
        percentil: percentil,
        tipoParto: tipoParto,
        conclusion: conclusion,
        sugerencia: sugerencia
      },
      success: function() {
        $("body").overhang({
          type: "success",
          message: "Ecografía Obstétrica registrada correctamente"
        });
  
        // Limpiar los campos después de un insert exitoso
        $("#documento_paciente").val('');
        $("#codigo_doctor").val('');
        $("input[name='fetoembrion']").prop("checked", false);
        $("input[name='situacion']").prop("checked", false);
        $("#estadoFeto").val('');
        $("#placenta").val('');
        $("#dpb").val('');
        $("#lcf").val('');
        $("#min").val('');
        $("#cc").val('');
        $("#ca").val('');
        $("#lf").val('');
        $("#ila").val('');
        $("#percentil").val('');
        $("#tipoParto").val('');
        $("#conclusion").val('');
        $("#sugerencia").val('');
      },
      error: function() {
        $("body").overhang({
          type: "error",
          message: "Alerta! Tenemos un problema al conectar con la base de datos. Verifica tu red.",
        }); 
      }
    });  
  }