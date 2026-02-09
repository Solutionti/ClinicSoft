function createEcografiaTrasvaginal() {
    var url = baseurl + "administracion/ecografiatrasvaginal";
    var documento_paciente = $("#dni").val(),
        codigo_doctor = $("#codigo_doctor").val();
         uteroTipo = $("#utero-tipo").val();
    var superficie = $("#superficie").val();
    var miometrio = $("#miometrio").val();
        endometrio = $("#endometrio_grosor").val();
    var   ut_l = $("#ut_l").val();
    var ut_ap = $("#ut_ap").val();
    var ut_t = $("#ut_t").val();
    var ut_vol = $("#ut_vol").val();
         comentarioUtero = $("#comentarioUtero").val();
    var od_l = $("#od_l").val();
         ovarioDer1 = $("#ovario-der1").val();
         ovarioDer2 = $("#ovario-der2").val();
         comentarioOvarioDer = $("#comentarioOvario-der").val();
         ovarioIz1 = $("#ovario-iz1").val();
         ovarioIz2 = $("#ovario-iz2").val();
         comentarioOvarioIzq = $("#comentarioOvario-izq").val();
         fondosaco = $("#fondosaco").val();
         conclusion = $("#conclusion").val();
         sugerencias = $("#sugerencias").val();
  
    $.ajax({
      url: url,
      method: "POST",
      data: {
        documento_paciente: documento_paciente,
        codigo_doctor: codigo_doctor,
        uteroTipo: uteroTipo,
        superficie: superficie,
        miometrio: miometrio,
        endometrio: endometrio_grosor,
        ut_l: ut_l,
        ut_ap: ut_ap,
        ut_t: ut_t,
        ut_vol: ut_vol,
        comentarioUtero: comentarioUtero,
        od_l: od_l,
        ovarioDer1: ovarioDer1,
        ovarioDer2: ovarioDer2,
        comentarioOvarioDer: comentarioOvarioDer,
        ovarioIz1: ovarioIz1,
        ovarioIz2: ovarioIz2,
        comentarioOvarioIzq: comentarioOvarioIzq,
        fondosaco: fondosaco,
        conclusion: conclusion,
        sugerencias: sugerencias
      },
      success: function() {
        $("body").overhang({
          type: "success",
          message: "Ecografía de Trasvaginal registrada correctamente"
        });
  
        // Limpiar los campos después de un insert exitoso
        $("#documento_paciente").val('');
        $("#codigo_doctor").val('');
        $("#utero-tipo").val('Anteverso'); // Valor por defecto
        $("#superficie").val('Regular');
        $("#miometrio").val('Homogenio');
        $("#endometrio_grosor").val('Grosor mm libre');
        $("#ut_l").val('');
        $("#ut_ap").val('');
        $("#ut_t").val('');
        $("#ut_vol").val('');
        $("#comentarioUtero").val('DE BORDES REGULARES Y PARENQUIMA HOMOGENEO');
        $("#od_l").val('');
        $("#ovario-der1").val('');
        $("#ovario-der2").val('');
        $("#comentarioOvario-der").val('DE ASPECTO NORMAL.');
        $("#ovario-iz1").val('');
        $("#ovario-iz2").val('');
        $("#comentarioOvario-izq").val('DE ASPECTO NORMAL.');
        $("#fondosaco").val('Libre');
        $("#conclusion").val('');
        $("#sugerencias").val('');
        generarpdfTrasvaginal()
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
  function generarpdfTrasvaginal() {
    let dni = $("#dni").val();
    let url = baseurl + "administracion/pdfecografiatrasvaginal/" + dni;
    window.open(url, "_blank", " width=950, height=1000");
  }    
function cargarTransvaginalNormal() {
    document.getElementById('utero-tipo').value = "Anteverso";
    document.getElementById('superficie').value = "Regular";
    document.getElementById('miometrio').value = "Homogéneo";
    document.getElementById('comentarioUtero').value = "Parenquima homogéneo, bordes regulares.";
    
    document.getElementById('comentarioOvario-der').value = "Aspecto y ecogenicidad conservada.";
    document.getElementById('comentarioOvario-izq').value = "Aspecto y ecogenicidad conservada.";
    
    document.getElementById('fondosaco').value = "Libre (Sin líquido).";
    document.getElementById('tumorAnexial-com').value = "No se evidencian masas sólidas ni quísticas.";
    
    document.getElementById('conclusion').value = "ÚTERO Y OVARIOS DE CARACTERÍSTICAS ECOGRÁFICAS NORMALES.";
    document.getElementById('sugerencias').value = "Control anual.";
}

// 2. CALCULADORA DE VOLÚMENES (Se activa sola)
document.querySelectorAll('input[type="number"]').forEach(item => {
    item.addEventListener('change', calcularVolumenes);
});

function calcularVolumenes() {
    // ÚTERO
    let ul = parseFloat(document.getElementById('ut_l').value) || 0;
    let uap = parseFloat(document.getElementById('ut_ap').value) || 0;
    let ut = parseFloat(document.getElementById('ut_t').value) || 0;
    if(ul*uap*ut > 0) document.getElementById('ut_vol').value = (ul*uap*ut*0.523).toFixed(1) + ' cc';

    // OVARIO DER
    let odl = parseFloat(document.getElementById('od_l').value) || 0;
    let odap = parseFloat(document.getElementById('od_ap').value) || 0;
    let odt = parseFloat(document.getElementById('od_t').value) || 0;
    if(odl*odap*odt > 0) document.getElementById('od_vol').value = (odl*odap*odt*0.523).toFixed(1) + ' cc';

    // OVARIO IZQ
    let oil = parseFloat(document.getElementById('oi_l').value) || 0;
    let oiap = parseFloat(document.getElementById('oi_ap').value) || 0;
    let oit = parseFloat(document.getElementById('oi_t').value) || 0;
    if(oil*oiap*oit > 0) document.getElementById('oi_vol').value = (oil*oiap*oit*0.523).toFixed(1) + ' cc';
}