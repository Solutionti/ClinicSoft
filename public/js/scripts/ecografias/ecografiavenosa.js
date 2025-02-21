function createEcografiaVenosa() {
    var url = baseurl + "administracion/ecografiavenosa"; // Ajusta la URL según tu necesidad
    var documento_paciente = $("#dni").val(),
        codigo_doctor = $("#codigo_doctor").val(),
        motivo = $("#motivo").val(),
        descripcionProcedimientoDerecho = $("#descripcionProcedimiento").eq(0).val(),
        descripcionProcedimientoIzquierdo = $("#descripcionProcedimiento").eq(1).val(),
        // Miembro inferior derecho
        medida_fc_derecho = $("input[name='vps_fc']").eq(0).val(),
        reflujo_fc_derecho = $("input[name='onda_fc']").eq(0).val(),
        medida_fs_derecho = $("input[name='vps_fs']").eq(0).val(),
        reflujo_fs_derecho = $("input[name='onda_fs']").eq(0).val(),
        medida_poplitea_derecho = $("input[name='vps_poplitea']").eq(0).val(),
        reflujo_poplitea_derecho = $("input[name='onda_poplitea']").eq(0).val(),
        medida_tp_derecho = $("input[name='vps_tp']").eq(0).val(),
        reflujo_tp_derecho = $("input[name='onda_tp']").eq(0).val(),
        medida_ta_derecho = $("input[name='vps_ta']").eq(0).val(),
        reflujo_ta_derecho = $("input[name='onda_ta']").eq(0).val(),
        medida_media_derecho = $("input[name='vps_media']").eq(0).val(),
        reflujo_media_derecho = $("input[name='onda_media']").eq(0).val(),
        // Miembro inferior izquierdo
        medida_fc_izquierdo = $("input[name='vps_fc']").eq(1).val(),
        reflujo_fc_izquierdo = $("input[name='onda_fc']").eq(1).val(),
        medida_fs_izquierdo = $("input[name='vps_fs']").eq(1).val(),
        reflujo_fs_izquierdo = $("input[name='onda_fs']").eq(1).val(),
        medida_poplitea_izquierdo = $("input[name='vps_poplitea']").eq(1).val(),
        reflujo_poplitea_izquierdo = $("input[name='onda_poplitea']").eq(1).val(),
        medida_tp_izquierdo = $("input[name='vps_tp']").eq(1).val(),
        reflujo_tp_izquierdo = $("input[name='onda_tp']").eq(1).val(),
        medida_ta_izquierdo = $("input[name='vps_ta']").eq(1).val(),
        reflujo_ta_izquierdo = $("input[name='onda_ta']").eq(1).val(),
        medida_media_izquierdo = $("input[name='vps_media']").eq(1).val(),
        reflujo_media_izquierdo = $("input[name='onda_media']").eq(1).val(),
        // Conclusiones y sugerencias
        conclusiones = $("#conclusiones").val(),
        sugerencias = $("#sugerencias").val();
  
    $.ajax({
      url: url,
      method: "POST",
      data: {
        documento_paciente: documento_paciente,
        codigo_doctor: codigo_doctor,
        motivo: motivo,
        descripcionProcedimientoDerecho: descripcionProcedimientoDerecho,
        descripcionProcedimientoIzquierdo: descripcionProcedimientoIzquierdo,
        // Miembro inferior derecho
        medida_fc_derecho: medida_fc_derecho,
        reflujo_fc_derecho: reflujo_fc_derecho,
        medida_fs_derecho: medida_fs_derecho,
        reflujo_fs_derecho: reflujo_fs_derecho,
        medida_poplitea_derecho: medida_poplitea_derecho,
        reflujo_poplitea_derecho: reflujo_poplitea_derecho,
        medida_tp_derecho: medida_tp_derecho,
        reflujo_tp_derecho: reflujo_tp_derecho,
        medida_ta_derecho: medida_ta_derecho,
        reflujo_ta_derecho: reflujo_ta_derecho,
        medida_media_derecho: medida_media_derecho,
        reflujo_media_derecho: reflujo_media_derecho,
        // Miembro inferior izquierdo
        medida_fc_izquierdo: medida_fc_izquierdo,
        reflujo_fc_izquierdo: reflujo_fc_izquierdo,
        medida_fs_izquierdo: medida_fs_izquierdo,
        reflujo_fs_izquierdo: reflujo_fs_izquierdo,
        medida_poplitea_izquierdo: medida_poplitea_izquierdo,
        reflujo_poplitea_izquierdo: reflujo_poplitea_izquierdo,
        medida_tp_izquierdo: medida_tp_izquierdo,
        reflujo_tp_izquierdo: reflujo_tp_izquierdo,
        medida_ta_izquierdo: medida_ta_izquierdo,
        reflujo_ta_izquierdo: reflujo_ta_izquierdo,
        medida_media_izquierdo: medida_media_izquierdo,
        reflujo_media_izquierdo: reflujo_media_izquierdo,
        // Conclusiones y sugerencias
        conclusiones: conclusiones,
        sugerencias: sugerencias
      },
      success: function() {
        $("body").overhang({
          type: "success",
          message: "Ecografía Venosa registrada correctamente"
        });
  
        // Limpiar los campos después de un insert exitoso
        $("#documento_paciente").val('');
        $("#codigo_doctor").val('');
        $("#motivo").val('');
        $("#descripcionProcedimiento").eq(0).val('PAREDES LISAS, FLUJO FASICO CON LA RESPIRACIÓN, REFLUJOS SEGÚN DESCRIPCIÓN.');
        $("#descripcionProcedimiento").eq(1).val('PAREDES LISAS, FLUJO FASICO CON LA RESPIRACIÓN, REFLUJOS SEGÚN DESCRIPCIÓN.');
        $("input[name='vps_fc']").eq(0).val('65');
        $("input[name='onda_fc']").eq(0).val('Bifásica');
        $("input[name='vps_fs']").eq(0).val('60');
        $("input[name='onda_fs']").eq(0).val('Bifásica');
        $("input[name='vps_poplitea']").eq(0).val('45');
        $("input[name='onda_poplitea']").eq(0).val('Bifásica');
        $("input[name='vps_tp']").eq(0).val('40');
        $("input[name='onda_tp']").eq(0).val('Bifásica');
        $("input[name='vps_ta']").eq(0).val('40-42');
        $("input[name='onda_ta']").eq(0).val('Bifásica');
        $("input[name='vps_media']").eq(0).val('38');
        $("input[name='onda_media']").eq(0).val('Bifásica');
        $("input[name='vps_fc']").eq(1).val('60');
        $("input[name='onda_fc']").eq(1).val('Bifásica');
        $("input[name='vps_fs']").eq(1).val('50');
        $("input[name='onda_fs']").eq(1).val('Bifásica');
        $("input[name='vps_poplitea']").eq(1).val('35');
        $("input[name='onda_poplitea']").eq(1).val('Bifásica');
        $("input[name='vps_tp']").eq(1).val('35');
        $("input[name='onda_tp']").eq(1).val('Bifásica');
        $("input[name='vps_ta']").eq(1).val('38');
        $("input[name='onda_ta']").eq(1).val('Bifásica');
        $("input[name='vps_media']").eq(1).val('35');
        $("input[name='onda_media']").eq(1).val('Bifásica');
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

  
