function createEcografiaGenetica() {
    var url = baseurl + "administracion/ecografiagenetica";
    var documento_paciente = $("#dni").val(); 
    var codigo_doctor = $("#codigo_doctor").val();
    var fetoembrion = $("input[name='fetoembrion']:checked").val(); 
    var situacion = $("input[name='situacion']:checked").val(); 
    var liquidoAmniotico = $("#liquidoAmniotico").val();
    var placenta = $("#placenta").val();
    var lcr = $("#lcr").val();
    var lcf = $("#lcf").val();
    var artUteder = $("#art-Uteder").val();
    var artUteizq = $("#art-Uteizq").val();
    var ippromedio = $("#ippromedio").val();
    var huesoNasal = $("#huesoNasal").val();
    var translucenciaNucal = $("#translucenciaNucal").val();
    var ductudVenosa = $("#ductudVenosa").val();
    var conclusion_mama = $("#conclusion").val(); 
    var sugerencias_mama = $("#sugerencia").val(); 

    $.ajax({
        url: url,
        method: "POST",
        data: {
            documento_paciente: documento_paciente,
            codigo_doctor: codigo_doctor,
            fetoembrion: fetoembrion,
            situacion: situacion,
            liquidoAmniotico: liquidoAmniotico,
            placenta: placenta,
            lcr: lcr,
            lcf: lcf,
            artUteder: artUteder,
            artUteizq: artUteizq,
            ippromedio: ippromedio,
            huesoNasal: huesoNasal,
            translucenciaNucal: translucenciaNucal,
            ductudVenosa: ductudVenosa,
            conclusion_mama: conclusion_mama,
            sugerencias_mama: sugerencias_mama
        },
        success: function() {
            $("body").overhang({
              type: "success",
              message: "Ecografía de Mama registrada correctamente"
            });
            

            $("#dni").val(''); 
            $("#codigo_doctor").val('');
            $("input[name='fetoembrion']").prop('checked', false); 
            $("input[name='situacion']").prop('checked', false); 
            $("#liquidoAmniotico").val('volumen normal para la edad gestacional');
            $("#huesoNasal").val('Hueso nasal presente');
            $("#ductudVenosa").val('Ductus venosa onda trifasica normal.');
            $("#placenta").val('');
            $("#lcr").val('');
            $("#lcf").val('');
            $("#art-Uteder").val('');
            $("#art-Uteizq").val('');
            $("#ippromedio").val('');
            $("#translucenciaNucal").val('');
            $("#conclusion").val(''); 
            $("#sugerencia").val(''); 
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
      function generarpdfGenetica() {
        let dni = $("#dni").val();
        let url = baseurl + "administracion/pdfecografiagenetica/" + dni;
        window.open(url, "_blank", " width=950, height=1000");
      }    