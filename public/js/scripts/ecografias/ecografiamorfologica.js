function createEcografiaMorfologica() {
    var url = baseurl + "administracion/ecografiamorfologica";
    var documento_paciente = $("#dni").val();
    var codigo_doctor = $("#codigo_doctor").val();
    var sexo = $("input[name='sexo']:checked").val();
    var situacion = $("input[name='situacion']:checked").val(); 
    var formacabeza = $("#formacabeza").val();
    var cerebelo = $("#cerebelo").val();
    var cisternaMagna = $("#cisternaMagna").val();
    var atrioVentricular = $("#atrioVentricular").val();
    var pliegueNucal = $("#pliegueNucal").val();
    var perfilCara = $("#perfilCara").val();
    var cuello = $("#cuello").val();
    var perfiltorax = $("#perfiltorax").val();
    var corazon = $("#corazon").val();
    var columnaVertebral = $("#columnaVertebral").val();
    var extremidades = $("#extremidades").val();
    var abdomen = $("#abdomen").val();
    var dbp = $("#dbp").val();
    var cc = $("#cc").val();
    var ca = $("#ca").val();
    var lf = $("#lf").val(); 
    var placenta_liquido = $("#placenta_liquido").val();
    var ipder = $("#ip-der").val();
    var ipizq = $("#ip-izq").val();
    var ip_promedio = $("#ip_promedio").val();
    var cervicometria = $("#cervicometria").val();
    var ponderadoFetal = $("#ponderadoFetal").val();
    var lcf = $("#lcf").val(); 
    var conclusiones = $("#conclusiones").val();

    $.ajax({
        url: url,
        method: "POST",
        data: {
            documento_paciente: documento_paciente,
            codigo_doctor: codigo_doctor,
            sexo: sexo,
            situacion:situacion,
            formacabeza: formacabeza,
            cerebelo: cerebelo,
            cisternaMagna: cisternaMagna,
            atrioVentricular: atrioVentricular,
            pliegueNucal: pliegueNucal,
            perfilCara: perfilCara,
            cuello: cuello,
            perfiltorax: perfiltorax,
            corazon: corazon,
            columnaVertebral: columnaVertebral,
            extremidades: extremidades,
            abdomen: abdomen,
            dbp: dbp,
            cc: cc,
            ca: ca,
            lf: lf, 
            placenta_liquido: placenta_liquido,
            ipder: ipder,
            ipizq: ipizq,
            ip_promedio: ip_promedio,
            cervicometria: cervicometria,
            ponderadoFetal: ponderadoFetal,
            lcf: lcf, 
            conclusiones: conclusiones
        },
        success: function() {
            $("body").overhang({
              type: "success",
              message: "Ecografía Morfologica registrada correctamente"
            });

            
            $("input[name='sexo']").prop('checked', false);
            $("input[name='situacion']").prop('checked', false); 
            $("#formacabeza").val('encefalo, ventriculos, linea media, talamos y cisuras normales, cavum del septum pellucidum y cuerpo calloso visible');
            $("#cerebelo").val('');
            $("#cisternaMagna").val('');
            $("#atrioVentricular").val('');
            $("#pliegueNucal").val('');
            $("#perfilCara").val('nariz y fosas nasales, labio superior, orbitas y cristalinos normales');
            $("#cuello").val('no masas');
            $("#perfiltorax").val('pulmones y corazon de tamaños adecuados, no masas');
            $("#corazon").val('situs solitus, tamaño, frecuencia cardiaca, 4 camaras y eje cardiaco normales, salida de aorta y arteria pulmonar normales y cruzamiento adecuados (vasos bien relacionados');
            $("#columnaVertebral").val('de aspecto normal en los planos sagital coronal y tranversal.');
            $("#extremidades").val('4 extremidades presentes y móviles. Manos y pies visibles.');
            $("#abdomen").val('pared normal, estomago presente, riñones normales, vejiga con 2 vasos (arterias umbilicales). intestinos de  ecogenicidad normal, insercion de cordon normal.');
            $("#dbp").val('');
            $("#cc").val('');
            $("#ca").val('');
            $("#lf").val(''); 
            $("#placenta_liquido").val('PLACENTA CORPORAL POSTERIOR GRADO “0”');
            $("#ip-der").val('');
            $("#ip-izq").val('');
            $("#ip_promedio").val('');
            $("#cervicometria").val('');
            $("#ponderadoFetal").val('');
            $("#lcf").val(''); 
            $("#conclusiones").val('');
            generarpdfMorfologica()
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

      function generarpdfMorfologica() {
        let dni = $("#dni").val();
        let url = baseurl + "administracion/pdfecografiamorfologica/" + dni;
        window.open(url, "_blank", " width=950, height=1000");
      }
      function cargarMorfologicaNormal() {
    // Llenar textos largos
    document.getElementById('formacabeza').value = "Encéfalo, ventrículos, línea media, tálamos y cisuras normales. Cavum del septum pellucidum y cuerpo calloso visibles.";
    document.getElementById('perfilCara').value = "Nariz, fosas nasales, labio superior íntegro, órbitas y cristalinos normales.";
    document.getElementById('cuello').value = "Sin masas ni circulares.";
    document.getElementById('perfiltorax').value = "Pulmones de ecogenicidad homogénea, diafragma íntegro, no masas.";
    document.getElementById('corazon').value = "Situs solitus, 4 cámaras simétricas, salida de grandes vasos normal. Ritmo regular.";
    document.getElementById('abdomen').value = "Pared íntegra, estómago presente, riñones normales, vejiga visible con 2 arterias umbilicales.";
    document.getElementById('columnaVertebral').value = "Íntegra en todos sus segmentos.";
    document.getElementById('extremidades').value = "4 extremidades presentes y móviles. Manos y pies visibles.";
    document.getElementById('placenta_liquido').value = "Placenta Corporal Posterior Grado I. Líquido Amniótico Normal.";
    
    // Valores normales por defecto
    document.getElementById('cervicometria').value = "35";
    
    // Conclusión
    document.getElementById('conclusiones').value = "GESTACIÓN ÚNICA CON MORFOLOGÍA FETAL DENTRO DE LÍMITES NORMALES.\nBIOMETRÍA ACORDE A EDAD GESTACIONAL.\nRIESGO DE PREMATURIDAD BAJO.";
}

function calcPromedioMorfo() {
    let d = parseFloat(document.getElementById('ip-der').value) || 0;
    let i = parseFloat(document.getElementById('ip-izq').value) || 0;
    if(d>0 && i>0) {
        document.getElementById('ip_promedio').value = ((d+i)/2).toFixed(2);
    }
}