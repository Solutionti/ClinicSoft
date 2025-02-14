// CREAR ECOGRAFIA DE MAMA
function createEcografiaMama() {
    var url = baseurl + "";
    var documento_paciente = $("#documento_paciente").val(),
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
        conclusion_mama: conclusion_mama,
        sugerencias_mama: sugerencias_mama
      },
      success: function() {
        $("body").overhang({
          type: "success",
          message: "Ecografia de Mama se ha registrado correctamente"
        });
      },
      error: function() {
        $("body").overhang({
          type: "error",
          message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
        }); 
      }
    });  
  }
  
  function imprimirEcografiaMama() {
    url = baseurl  + "";
    window.open(url, "_blank", " width=500, height=400");
  }
