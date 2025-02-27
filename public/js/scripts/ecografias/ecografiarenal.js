function createEcografiaRenal() {
    var url = baseurl + "administracion/ecografiarenal"; // Ajusta la URL según tu necesidad
    var documento_paciente = $("#dni").val(),
        codigo_doctor = $("#codigo_doctor").val(),
        // Riñón derecho
        motivo = $("#motivo").val(),
        morfologia_movilidad_derecho = $("#morfologia_movilidad_derecho").val(),
        ecogenicidad_derecho = $("#ecogenicidad_derecho").val(),
        medidas_longitud_derecho = $("#medidas_longitud_derecho").val(),
        medidas_parenquima_derecho = $("#medidas_parenquima_derecho").val(),
        imagenes_expansivas_solidas_derecho = $("#imagenes_expansivas_solidas_derecho").val(),
        imagenes_expansivas_quisticas_derecho = $("#imagenes_expansivas_quisticas_derecho").val(),
        hidronefrosis_derecho = $("#hidronefrosis_derecho").val(),
        medidas_hidronefrosis_derecho = $("#medidas_hidronefrosis_derecho").val(),
        micro_litiasis_derecho = $("#micro_litiasis_derecho").val(),
        medidas_micro_litiasis_derecho = $("#medidas_micro_litiasis_derecho").val(),
        calculos_derecho = $("#calculos_derecho").val(),
        medidas_calculos_derecho = $("#medidas_calculos_derecho").val(),
        descripcion_otros_derecho = $("#descripcion_otros_derecho").val(),
        // Riñón izquierdo
        morfologia_movilidad_izquierdo = $("#morfologia_movilidad_izquierdo").val(),
        ecogenicidad_izquierdo = $("#ecogenicidad_izquierdo").val(),
        medidas_longitud_izquierdo = $("#medidas_longitud_izquierdo").val(),
        medidas_parenquima_izquierdo = $("#medidas_parenquima_izquierdo").val(),
        imagenes_expansivas_solidas_izquierdo = $("#imagenes_expansivas_solidas_izquierdo").val(),
        imagenes_expansivas_quisticas_izquierdo = $("#imagenes_expansivas_quisticas_izquierdo").val(),
        hidronefrosis_izquierdo = $("#hidronefrosis_izquierdo").val(),
        medidas_hidronefrosis_izquierdo = $("#medidas_hidronefrosis_izquierdo").val(),
        micro_litiasis_izquierdo = $("#micro_litiasis_izquierdo").val(),
        medidas_micro_litiasis_izquierdo = $("#medidas_micro_litiasis_izquierdo").val(),
        calculos_izquierdo = $("#calculos_izquierdo").val(),
        medidas_calculos_izquierdo = $("#medidas_calculos_izquierdo").val(),
        descripcion_otros_izquierdo = $("#descripcion_otros_izquierdo").val(),
        // Vejiga
        repelcion_vejiga = $("#repelcion_vejiga").val(),
        paredes_vejiga = $("#paredes_vejiga").val(),
        contenido_aneocoico = $("#contenido_aneocoico").val(),
        imagenes_expansivas_vejiga = $("#imagenes_expansivas_vejiga").val(),
        calculos_vejiga = $("#calculos_vejiga").val(),
        vol_pre_miccional = $("#vol_pre_miccional").val(),
        vol_post_miccional = $("#vol_post_miccional").val(),
        retencion = $("#retencion").val(),
        // Observaciones y conclusiones
        otra = $("#otra").is(":checked") ? "Sí" : "No",
        observacion_textarea = $("#observacion_textarea").val(),
        conclusiones = $("#conclusiones").val();
  
    $.ajax({
      url: url,
      method: "POST",
      data: {
        documento_paciente: documento_paciente,
        codigo_doctor: codigo_doctor,
        motivo: motivo,
        // Riñón derecho
        morfologia_movilidad_derecho: morfologia_movilidad_derecho,
        ecogenicidad_derecho: ecogenicidad_derecho,
        medidas_longitud_derecho: medidas_longitud_derecho,
        medidas_parenquima_derecho: medidas_parenquima_derecho,
        imagenes_expansivas_solidas_derecho: imagenes_expansivas_solidas_derecho,
        imagenes_expansivas_quisticas_derecho: imagenes_expansivas_quisticas_derecho,
        hidronefrosis_derecho: hidronefrosis_derecho,
        medidas_hidronefrosis_derecho: medidas_hidronefrosis_derecho,
        micro_litiasis_derecho: micro_litiasis_derecho,
        medidas_micro_litiasis_derecho: medidas_micro_litiasis_derecho,
        calculos_derecho: calculos_derecho,
        medidas_calculos_derecho: medidas_calculos_derecho,
        descripcion_otros_derecho: descripcion_otros_derecho,
        // Riñón izquierdo
        morfologia_movilidad_izquierdo: morfologia_movilidad_izquierdo,
        ecogenicidad_izquierdo: ecogenicidad_izquierdo,
        medidas_longitud_izquierdo: medidas_longitud_izquierdo,
        medidas_parenquima_izquierdo: medidas_parenquima_izquierdo,
        imagenes_expansivas_solidas_izquierdo: imagenes_expansivas_solidas_izquierdo,
        imagenes_expansivas_quisticas_izquierdo: imagenes_expansivas_quisticas_izquierdo,
        hidronefrosis_izquierdo: hidronefrosis_izquierdo,
        medidas_hidronefrosis_izquierdo: medidas_hidronefrosis_izquierdo,
        micro_litiasis_izquierdo: micro_litiasis_izquierdo,
        medidas_micro_litiasis_izquierdo: medidas_micro_litiasis_izquierdo,
        calculos_izquierdo: calculos_izquierdo,
        medidas_calculos_izquierdo: medidas_calculos_izquierdo,
        descripcion_otros_izquierdo: descripcion_otros_izquierdo,
        // Vejiga
        repelcion_vejiga: repelcion_vejiga,
        paredes_vejiga: paredes_vejiga,
        contenido_aneocoico: contenido_aneocoico,
        imagenes_expansivas_vejiga: imagenes_expansivas_vejiga,
        calculos_vejiga: calculos_vejiga,
        vol_pre_miccional: vol_pre_miccional,
        vol_post_miccional: vol_post_miccional,
        retencion: retencion,
        // Observaciones y conclusiones
        otra: otra,
        observacion_textarea: observacion_textarea,
        conclusiones: conclusiones
      },
      success: function() {
        $("body").overhang({
          type: "success",
          message: "Ecografía Renal registrada correctamente"
        });
  
        // Limpiar los campos después de un insert exitoso
        $("#motivo").val('');
        $("#documento_paciente").val('');
        $("#codigo_doctor").val('');
        // Riñón derecho
        $("#morfologia_movilidad_derecho").val('Normal');
        $("#ecogenicidad_derecho").val('Normal');
        $("#medidas_longitud_derecho").val('');
        $("#medidas_parenquima_derecho").val('');
        $("#imagenes_expansivas_solidas_derecho").val('No');
        $("#imagenes_expansivas_quisticas_derecho").val('No');
        $("#hidronefrosis_derecho").val('No');
        $("#medidas_hidronefrosis_derecho").val('');
        $("#micro_litiasis_derecho").val('No');
        $("#medidas_micro_litiasis_derecho").val('');
        $("#calculos_derecho").val('No');
        $("#medidas_calculos_derecho").val('');
        $("#descripcion_otros_derecho").val('');
        // Riñón izquierdo
        $("#morfologia_movilidad_izquierdo").val('Normal');
        $("#ecogenicidad_izquierdo").val('Normal');
        $("#medidas_longitud_izquierdo").val('');
        $("#medidas_parenquima_izquierdo").val('');
        $("#imagenes_expansivas_solidas_izquierdo").val('No');
        $("#imagenes_expansivas_quisticas_izquierdo").val('No');
        $("#hidronefrosis_izquierdo").val('No');
        $("#medidas_hidronefrosis_izquierdo").val('');
        $("#micro_litiasis_izquierdo").val('No');
        $("#medidas_micro_litiasis_izquierdo").val('');
        $("#calculos_izquierdo").val('No');
        $("#medidas_calculos_izquierdo").val('');
        $("#descripcion_otros_izquierdo").val('');
        // Vejiga
        $("#repelcion_vejiga").val('Normal');
        $("#paredes_vejiga").val('Normal');
        $("#contenido_aneocoico").val('Si');
        $("#imagenes_expansivas_vejiga").val('Si');
        $("#calculos_vejiga").val('No');
        $("#vol_pre_miccional").val('');
        $("#vol_post_miccional").val('');
        $("#retencion").val('');
        // Observaciones y conclusiones
        $("#otra").prop("checked", false);
        $("#observacion_textarea").val('');
        $("#conclusiones").val('');

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

  function generarpdfRenal() {
    let dni = $("#dni").val();
    let url = baseurl + "administracion/pdfecografiarenal/" + dni;
    window.open(url, "_blank", " width=950, height=1000");
  } 