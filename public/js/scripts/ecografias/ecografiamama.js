function createEcografiaMama() {
  var url = baseurl + "administracion/ecografiamama";

  // Validar DNI
  if ($("#dni").val() == "") {
    $("body").overhang({ type: "error", message: "El DNI del paciente es obligatorio." });
    return;
  }

  var documento_paciente = $("#dni").val(),
      codigo_doctor = $("#codigo_doctor").val(),
      pezon_izq = $("#pezon_izq").val(),
      tcsc_izq = $("#tcsc_izq").val(),
      tejido_glandular_izq = $("#tejido_glandular_izq").val(),
      axila_izq = $("#axila_izq").val(),
      comentario_mama_izq = $("#comentario_mama_izq").val(),
      pezon_der = $("#pezon_der").val(),
      tcsc_der = $("#tcsc_der").val(),
      tejido_glandular_der = $("#tejido_glandular_der").val(),
      axila_der = $("#axila_der").val(),
      comentario_der = $("#comentario_der").val(),
      birads_final = $("#birads_final").val(),
      conclusion_mama = $("#conclusion_mama").val(),
      sugerencias_mama = $("#sugerencias_mama").val();

  $.ajax({
    url: url,
    method: "POST",
    data: {
      documento_paciente: documento_paciente,
      codigo_doctor: codigo_doctor,
      pezon_izq: pezon_izq,
      tcsc_izq: tcsc_izq,
      tejido_glandular_izq: tejido_glandular_izq,
      axila_izq: axila_izq,
      comentario_mama_izq: comentario_mama_izq,
      pezon_der: pezon_der,
      tcsc_der: tcsc_der,
      tejido_glandular_der: tejido_glandular_der,
      axila_der: axila_der,
      comentario_der: comentario_der,
      birads_final: birads_final,
      conclusion_mama: conclusion_mama,
      sugerencias_mama: sugerencias_mama
    },
    success: function() {
      $("body").overhang({
        type: "success",
        message: "Ecografía de Mama registrada correctamente"
      });

      // Limpiar los campos después de un insert exitoso
      $("#documento_paciente").val('');
      $("#codigo_doctor").val('');
      $("#pezon_izq").val('');
      $("#tcsc_izq").val('');
      $("#tejido_glandular_izq").val('');
      $("#axila_izq").val('');
      $("#comentario_mama_izq").val('');
      $("#pezon_der").val('');
      $("#tcsc_der").val('');
      $("#tejido_glandular_der").val('');
      $("#axila_der").val('');
      $("#comentario_der").val('');
      $("#birads_final").val('');
      $("#conclusion_mama").val('');
      $("#sugerencias_mama").val('');

      generarpdfMama();
      
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


function generarpdfMama() {
  let dni = $("#dni").val();
  let url = baseurl + "administracion/pdfecografiamama/" + dni;
  window.open(url, "_blank", " width=950, height=1000");
}


function cargarNormalMama() {
    // 1. MAMA IZQUIERDA (Llenado automático)
    document.getElementById('pezon_izq').value = "Normal / Evertido";
    document.getElementById('tcsc_izq').value = "Conservado";
    document.getElementById('tejido_glandular_izq').value = "Ecotextura Conservada";
    document.getElementById('axila_izq').value = "Ganglios Conservados";
    document.getElementById('comentario_mama_izq').value = "No se evidencian lesiones focales sólidas ni quísticas.";

    // 2. MAMA DERECHA (Llenado automático)
    document.getElementById('pezon_der').value = "Normal / Evertido";
    document.getElementById('tcsc_der').value = "Conservado";
    document.getElementById('tejido_glandular_der').value = "Ecotextura Conservada";
    document.getElementById('axila_der').value = "Ganglios Conservados";
    document.getElementById('comentario_der').value = "No se evidencian lesiones focales sólidas ni quísticas.";

    // 3. CONCLUSIÓN Y BI-RADS (Lo más importante)
    document.getElementById('conclusion_mama').value = "ECOGRAFÍA MAMARIA BILATERAL DENTRO DE LÍMITES NORMALES.";
    
    // Selecciona BI-RADS 1 automáticamente
    document.getElementById('birads_final').value = "BIRADS 1"; 
    
    // Sugerencia estándar
    document.getElementById('sugerencias_mama').value = "Control anual habitual.";

    // Opcional: Una pequeña alerta visual para confirmar
    // alert("Plantilla Normal cargada correctamente.");
}
  



