function createEcografiaTiroides() {
    var url = baseurl + "administracion/ecografiatiroides"; // Ajusta la URL según tu necesidad
    var documento_paciente = $("#dni").val(),
        codigo_doctor = $("#codigo_doctor").val(),
        motivo = $("#motivo").val(),
        descripcionTiroides = $("#descripcionTiroides").val(),
        lobuloDerecho = $("#lobuloDerecho").val(),
        lobuloIzquierdo = $("#lobuloIzquierdo").val(),
        istmo = $("#istmo").val(),
        estructurasVasculares = $("#estructurasVasculares").val(),
        glandulasSubmaxilares = $("#glandulasSubmaxilares").val(),
        adenopatiaCervicales = $("#adenopatiaCervicales").val(),
        piel = $("#piel").val(),
        tcsc = $("#tcsc").val(),
        conclusiones = $("#conclusiones").val(),
        sugerencias = $("#sugerencias").val();
  
    $.ajax({
      url: url,
      method: "POST",
      data: {
        documento_paciente: documento_paciente,
        codigo_doctor: codigo_doctor,
        motivo: motivo,
        descripcionTiroides: descripcionTiroides,
        lobuloDerecho: lobuloDerecho,
        lobuloIzquierdo: lobuloIzquierdo,
        istmo: istmo,
        estructurasVasculares: estructurasVasculares,
        glandulasSubmaxilares: glandulasSubmaxilares,
        adenopatiaCervicales: adenopatiaCervicales,
        piel: piel,
        tcsc: tcsc,
        conclusiones: conclusiones,
        sugerencias: sugerencias
      },
      success: function() {
        $("body").overhang({
          type: "success",
          message: "Ecografía de Tiroides registrada correctamente"
        });
  
        // Limpiar los campos después de un insert exitoso
        $("#documento_paciente").val('');
        $("#codigo_doctor").val('');
        $("#motivo").val('');
        $("#descripcionTiroides").val('Ubicación central, Parénquima homogéneo, Volumen normal, No se observan lesiones focales');
        $("#lobuloDerecho").val('');
        $("#lobuloIzquierdo").val('');
        $("#istmo").val('');
        $("#estructurasVasculares").val('');
        $("#glandulasSubmaxilares").val('');
        $("#adenopatiaCervicales").val('');
        $("#piel").val('');
        $("#tcsc").val('De caracteres normales ecográficamente normales, no se observan quistes, ni nódulos');
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

  function generarpdfTiroides() {
    let dni = $("#dni").val();
    let url = baseurl + "administracion/pdfecografiatiroides/" + dni;
    window.open(url, "_blank", " width=950, height=1000");
  } 