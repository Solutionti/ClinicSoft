function createEcografiaPelvica() {
    var url = baseurl + "administracion/ecografiapelvica";
    var documento_paciente = $("#dni").val(),
        codigo_doctor = $("#codigo_doctor").val(),
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
  
        // Limpiar los campos después de un insert exitoso
        $("#dni").val('');
        $("#codigo_doctor").val('');
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
  