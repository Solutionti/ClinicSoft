function createEcografiaPelvica() {
    var url = baseurl + "administracion/ecografiapelvica";
    var documento_paciente = $("#dni").val(),
        codigo_doctor = $("#codigo_doctor").val();
    var replecion = $("#replecion").val();
    var vejiga_desc = $("#vejiga_desc").val();
        uteroTipo = $("#utero-tipo").val();
        superficie = $("input[name='superficie']:checked").val();
        endometrio = $("#endometrio").val();
        tumoraxial = $("input[name='tumoraxial']:checked").val(); // ID corregido
        tumor_anexial_com = $("#tumor_anexial_com").val();
        uteroMedidas = $("#utero-medidas").val();
        medidaUtero1 = $("#medidaUtero1").val();
        medidaUtero2 = $("#medidaUtero2").val();
        comentarioUtero = $("#comentarioUtero").val();
        ovarioDer1 = $("#ovario-der1").val();
        ovarioDer2 = $("#ovario-der2").val();
        comentarioOvarioDer = $("#comentarioOvario-der").val();
        ovarioIz1 = $("#ovario-iz1").val();
        ovarioIz2 = $("#ovario-iz2").val();
        comentarioOvarioIzq = $("#comentarioOvario-izq").val();
        fondosaco = $("#fondosaco").val();
        miometrio = $("#miometrio").val();
        conclusion = $("#conclusion").val();
        sugerencias = $("#sugerencias").val();  

    $.ajax({
      url: url,
      method: "POST",
      data: {
        documento_paciente: documento_paciente,
        codigo_doctor: codigo_doctor,
        replecion: replecion,
        vejiga_desc: vejiga_desc,
        uteroTipo: uteroTipo,
        superficie: superficie,
        endometrio: endometrio,
        tumoraxial: tumoraxial, // ID corregido
        tumor_anexial_com: tumor_anexial_com,
        uteroMedidas: uteroMedidas,
        medidaUtero1: medidaUtero1,
        medidaUtero2: medidaUtero2,
        comentarioUtero: comentarioUtero,
        ovarioDer1: ovarioDer1,
        ovarioDer2: ovarioDer2,
        comentarioOvarioDer: comentarioOvarioDer,
        ovarioIz1: ovarioIz1,
        ovarioIz2: ovarioIz2,
        comentarioOvarioIzq: comentarioOvarioIzq,
        fondosaco: fondosaco,
        miometrio: miometrio,
        conclusion: conclusion,
        sugerencias: sugerencias  
      },

    
      success: function() {
        $("body").overhang({
          type: "success",
          message: "Ecografía de Pelvica registrada correctamente"
        });
        generarpdfPelvica()
        // Limpiar los campos después de un insert exitoso
        $("#dni").val('');
        $("#codigo_doctor").val('');
        $("#replecion").val('');
        $("#vejiga_desc").val('');
        $("#utero-tipo").val('Anteverso');
        $("input[name='superficie']").prop('checked', false);
        $("#endometrio").val('Grosor mm libre');
        $("input[name='tumoraxial']").prop('checked', false); // ID corregido
        $("#tumor_anexial_com").val('No hay masas solidas ni quisticas');
        $("#utero-medidas").val('');
        $("#medidaUtero1").val('');
        $("#medidaUtero2").val('');
        $("#comentarioUtero").val('DE BORDES REGULARES Y PARENQUIMA HOMOGENEO');
        $("#ovario-der1").val('');
        $("#ovario-der2").val('');
        $("#comentarioOvario-der").val('DE ASPECTO NORMAL.');
        $("#ovario-iz1").val('');
        $("#ovario-iz2").val('');
        $("#comentarioOvario-izq").val('DE ASPECTO NORMAL.');
        $("#fondosaco").val('Libre');
        $("#miometrio").val('Homogenio');
        $("#conclusion").val('');
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

  function generarpdfPelvica() {
    let dni = $("#dni").val();
    let url = baseurl + "administracion/pdfecografiapelvica/" + dni;
    window.open(url, "_blank", " width=950, height=1000");
  }  
  
  function cargarPelvicaNormal() {
    // 1. Vejiga
    document.getElementById('replecion').value = "Adecuada";
    document.getElementById('vejiga_desc').value = "Paredes delgadas, contenido anecoico.";

    // 2. Útero
    document.getElementById('utero-tipo').value = "Anteverso";
    document.getElementById('regular').checked = true;
    document.getElementById('miometrio').value = "Homogéneo";
    document.getElementById('no').checked = true;
    document.getElementById('tumor_anexial_com').value = "No se observan masas.";
    document.getElementById('comentarioUtero').value = "Parenquima homogéneo, bordes regulares.";

    // 3. Ovarios
    document.getElementById('comentarioOvario-der').value = "Conservado.";
    document.getElementById('comentarioOvario-izq').value = "Conservado.";

    // 4. Final
    document.getElementById('fondosaco').value = "Libre.";
    document.getElementById('conclusion').value = "ECOGRAFÍA PÉLVICA DENTRO DE LÍMITES NORMALES.";
    document.getElementById('sugerencias').value = "Ingesta de líquidos.";
}

// Calculadora automática (Se activa al cambiar cualquier número)
document.querySelectorAll('input[type="number"]').forEach(item => {
    item.addEventListener('change', () => {
        let f = 0.523;
        
        // Útero
        let ul = parseFloat(document.getElementById('utero-medidas').value) || 0;
        let uap = parseFloat(document.getElementById('medidaUtero1').value) || 0;
        let ut = parseFloat(document.getElementById('medidaUtero2').value) || 0;
        if(ul*uap*ut > 0) document.getElementById('ut_vol').value = (ul*uap*ut*f).toFixed(1) + ' cc';
        
        // Ovario Der
        let odl = parseFloat(document.getElementById('ovario-der1').value) || 0;
        let odap = parseFloat(document.getElementById('ovario-der2').value) || 0;
        let odt = parseFloat(document.getElementById('ov_der_t').value) || 0;
        if(odl*odap*odt > 0) document.getElementById('od_vol').value = (odl*odap*odt*f).toFixed(1) + ' cc';

        // Ovario Izq
        let oil = parseFloat(document.getElementById('ovario-iz1').value) || 0;
        let oiap = parseFloat(document.getElementById('ovario-iz2').value) || 0;
        let oit = parseFloat(document.getElementById('ov_izq_t').value) || 0;
        if(oil*oiap*oit > 0) document.getElementById('oi_vol').value = (oil*oiap*oit*f).toFixed(1) + ' cc';
    });
});
  