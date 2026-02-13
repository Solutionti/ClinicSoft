function createEcografiaTrasvaginal() {
    var url = baseurl + "administracion/ecografiatrasvaginal";

    // Validar DNI
    if ($("#dni").val() == "") {
        $("body").overhang({ type: "error", message: "El DNI del paciente es obligatorio." });
        return;
    }

    var documento_paciente = $("#dni").val();
    var codigo_doctor = $("#codigo_doctor").val();
    var uteroTipo = $("#utero-tipo").val();
    var superficie = $("#superficie").val();
    var miometrio = $("#miometrio").val();
    var endometrio_grosor = $("#endometrio_grosor").val();
    var ut_l = $("#ut_l").val();
    var ut_ap = $("#ut_ap").val();
    var ut_t = $("#ut_t").val();
    var ut_vol = $("#ut_vol").val();
    var comentarioUtero = $("#comentarioUtero").val();
    var od_l = $("#od_l").val();
    var od_ap = $("#od_ap").val();
    var od_t = $("#od_t").val();
    var od_vol = $("#od_vol").val();
    var comentarioOvarioDer = $("#comentarioOvario-der").val();
    var oi_l = $("#oi_l").val();
    var oi_ap = $("#oi_ap").val();
    var oi_t = $("#oi_t").val();
    var oi_vol = $("#oi_vol").val();
    var comentarioOvarioIzq = $("#comentarioOvario-izq").val();
    var fondosaco = $("#fondosaco").val();
    var tiene_tumor = $("#tiene_tumor").is(':checked') ? 'Si' : 'No';
    var tumorAnexialCom = $("#tumorAnexial-com").val();
    var conclusion = $("#conclusion").val();
    var sugerencias = $("#sugerencias").val();
  
    $.ajax({
      url: url,
      method: "POST",
      data: {
        documento_paciente: documento_paciente,
        codigo_doctor: codigo_doctor,
        uteroTipo: uteroTipo,
        superficie: superficie,
        miometrio: miometrio,
        endometrio_grosor: endometrio_grosor,
        ut_l: ut_l,
        ut_ap: ut_ap,
        ut_t: ut_t,
        ut_vol: ut_vol,
        comentarioUtero: comentarioUtero,
        od_l: od_l,
        od_ap: od_ap,
        od_t: od_t,
        od_vol: od_vol,
        comentarioOvarioDer: comentarioOvarioDer,
        oi_l: oi_l,
        oi_ap: oi_ap,
        oi_t: oi_t,
        oi_vol: oi_vol,
        comentarioOvarioIzq: comentarioOvarioIzq,
        fondosaco: fondosaco,
        tiene_tumor: tiene_tumor,
        tumorAnexialCom: tumorAnexialCom,
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
        $("#miometrio").val('Homogéneo');
        $("#endometrio_grosor").val('');
        $("#ut_l").val('');
        $("#ut_ap").val('');
        $("#ut_t").val('');
        $("#ut_vol").val('');
        $("#comentarioUtero").val('DE BORDES REGULARES Y PARENQUIMA HOMOGENEO');
        $("#od_l").val('');
        $("#od_ap").val('');
        $("#od_t").val('');
        $("#od_vol").val('');
        $("#comentarioOvario-der").val('DE ASPECTO NORMAL.');
        $("#oi_l").val('');
        $("#oi_ap").val('');
        $("#oi_t").val('');
        $("#oi_vol").val('');
        $("#comentarioOvario-izq").val('DE ASPECTO NORMAL.');
        $("#fondosaco").val('Libre');
        $("#tiene_tumor").prop('checked', false);
        $("#tumorAnexial-com").val('');
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
