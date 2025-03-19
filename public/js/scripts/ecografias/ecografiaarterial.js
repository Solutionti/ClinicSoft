function createEcografiaArterial() {
    var url = baseurl + "administracion/ecografiaarterial"; // Ajusta la URL según tu necesidad
    var documento_paciente = $("#dni").val(),
        codigo_doctor = $("#codigo_doctor").val(),
        motivo = $("#motivo").val(),
        descripcionProcedimientoDerecho = $("#descripcionProcedimiento").eq(0).val(),
        descripcionProcedimientoIzquierdo = $("#descripcionProcedimientoIzquierdo").val(),
        // Miembro inferior derecho
        vps_fc_derecho = $("input[name='vps_fc']").eq(0).val(),
        onda_fc_derecho = $("input[name='onda_fc']").eq(0).val(),
        vps_fs_derecho = $("input[name='vps_fs']").eq(0).val(),
        onda_fs_derecho = $("input[name='onda_fs']").eq(0).val(),
        vps_poplitea_derecho = $("input[name='vps_poplitea']").eq(0).val(),
        onda_poplitea_derecho = $("input[name='onda_poplitea']").eq(0).val(),
        vps_tp_derecho = $("input[name='vps_tp']").eq(0).val(),
        onda_tp_derecho = $("input[name='onda_tp']").eq(0).val(),
        vps_ta_derecho = $("input[name='vps_ta']").eq(0).val(),
        onda_ta_derecho = $("input[name='onda_ta']").eq(0).val(),
        vps_media_derecho = $("input[name='vps_media']").eq(0).val(),
        onda_media_derecho = $("input[name='onda_media']").eq(0).val(),
        // Miembro inferior izquierdo
        vps_fc_izquierdo = $("input[name='vps_fc']").eq(1).val(),
        onda_fc_izquierdo = $("input[name='onda_fc']").eq(1).val(),
        vps_fs_izquierdo = $("input[name='vps_fs']").eq(1).val(),
        onda_fs_izquierdo = $("input[name='onda_fs']").eq(1).val(),
        vps_poplitea_izquierdo = $("input[name='vps_poplitea']").eq(1).val(),
        onda_poplitea_izquierdo = $("input[name='onda_poplitea']").eq(1).val(),
        vps_tp_izquierdo = $("input[name='vps_tp']").eq(1).val(),
        onda_tp_izquierdo = $("input[name='onda_tp']").eq(1).val(),
        vps_ta_izquierdo = $("input[name='vps_ta']").eq(1).val(),
        onda_ta_izquierdo = $("input[name='onda_ta']").eq(1).val(),
        vps_media_izquierdo = $("input[name='vps_media']").eq(1).val(),
        onda_media_izquierdo = $("input[name='onda_media']").eq(1).val(),
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
        vps_fc_derecho: vps_fc_derecho,
        onda_fc_derecho: onda_fc_derecho,
        vps_fs_derecho: vps_fs_derecho,
        onda_fs_derecho: onda_fs_derecho,
        vps_poplitea_derecho: vps_poplitea_derecho,
        onda_poplitea_derecho: onda_poplitea_derecho,
        vps_tp_derecho: vps_tp_derecho,
        onda_tp_derecho: onda_tp_derecho,
        vps_ta_derecho: vps_ta_derecho,
        onda_ta_derecho: onda_ta_derecho,
        vps_media_derecho: vps_media_derecho,
        onda_media_derecho: onda_media_derecho,
        // Miembro inferior izquierdo
        vps_fc_izquierdo: vps_fc_izquierdo,
        onda_fc_izquierdo: onda_fc_izquierdo,
        vps_fs_izquierdo: vps_fs_izquierdo,
        onda_fs_izquierdo: onda_fs_izquierdo,
        vps_poplitea_izquierdo: vps_poplitea_izquierdo,
        onda_poplitea_izquierdo: onda_poplitea_izquierdo,
        vps_tp_izquierdo: vps_tp_izquierdo,
        onda_tp_izquierdo: onda_tp_izquierdo,
        vps_ta_izquierdo: vps_ta_izquierdo,
        onda_ta_izquierdo: onda_ta_izquierdo,
        vps_media_izquierdo: vps_media_izquierdo,
        onda_media_izquierdo: onda_media_izquierdo,
        // Conclusiones y sugerencias
        conclusiones: conclusiones,
        sugerencias: sugerencias
      },
      success: function() {
        $("body").overhang({
          type: "success",
          message: "Ecografía Arterial registrada correctamente"
        });
  
        // Limpiar los campos después de un insert exitoso
        $("#documento_paciente").val('');
        $("#codigo_doctor").val('');
        $("#motivo").val('');
        $("#descripcionProcedimiento").eq(0).val('PLACAS ATEROMATOSAS EN TIBIAL ANTERIOR DISTAL Y PEDIA.');
        $("#descripcionProcedimientoIzquierdo").eq(0).val('PLACAS ATEROMATOSA A PREDOMINIO DE PIERNA.');
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

        generarpdfArterial()

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

  function generarpdfArterial() {
    let dni = $("#dni").val();
    let url = baseurl + "administracion/pdfecografiaarterial/" + dni;
    window.open(url, "_blank", " width=950, height=1000");
  } 