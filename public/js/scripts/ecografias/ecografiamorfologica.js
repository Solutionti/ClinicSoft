function createEcografiaMorfologica() {
    var url = baseurl + "administracion/ecografiammorfologica";
    var documento_paciente = $("#documento_paciente").val();
    var sexo = $("input[name='sexo']:checked").val();
    var formacabeza = $("#formacabeza").val();
    var cerebelo = $("#cerebelo").val();
    var cisternaMagna = $("#cisternaMagna").val();
    var atrioVentricular = $("#atrioVentricular").val();
    var perfilCara = $("#perfilCara").val();
    var cuello = $("#cuello").val();
    var perfiltorax = $("#perfiltorax").val();
    var corazon = $("#corazon").val();
    var columnaVertebral = $("#columnaVertebral").val();
    var abdomen = $("#abdomen").val();
    var dbp = $("#dbp").val();
    var cc = $("#cc").val();
    var ca = $("#ca").val();
    var lf = $("#lf").val(); 
    var comentario = $("#comentario").val();
    var ipder = $("#ip-der").val();
    var ipizq = $("#ip-izq").val();
    var ponderadoFetal = $("#ponderadoFetal").val();
    var lcf = $("#lcf").val(); 
    var conclusiones = $("#conclusiones").val();

    $.ajax({
        url: url,
        method: "POST",
        data: {
            
            sexo: sexo,
            formacabeza: formacabeza,
            cerebelo: cerebelo,
            cisternaMagna: cisternaMagna,
            atrioVentricular: atrioVentricular,
            perfilCara: perfilCara,
            cuello: cuello,
            perfiltorax: perfiltorax,
            corazon: corazon,
            columnaVertebral: columnaVertebral,
            abdomen: abdomen,
            dbp: dbp,
            cc: cc,
            ca: ca,
            lf: lf, 
            comentario: comentario,
            ipder: ipder,
            ipizq: ipizq,
            ponderadoFetal: ponderadoFetal,
            lcf: lcf, 
            conclusiones: conclusiones
        },
        success: function() {
            $("body").overhang({
              type: "success",
              message: "Ecografía de Mama registrada correctamente"
            });

            
            $("input[name='sexo']").prop('checked', false);
            $("#formacabeza").val('encefalo, ventriculos, linea media, talamos y cisuras normales, cavum del septum pellucidum y cuerpo calloso visible');
            $("#cerebelo").val('');
            $("#cisternaMagna").val('');
            $("#atrioVentricular").val('');
            $("#perfilCara").val('nariz y fosas nasales, labio superior, orbitas y cristalinos normales');
            $("#cuello").val('no masas');
            $("#perfiltorax").val('pulmones y corazón de tamaños adecuados, no masas');
            $("#corazon").val('situs solitus, tamaño, frecuencia cardiaca, 4 camaras y eje cardiaco normales, salida de aorta y arteria pulmonar normales y cruzamiento adecuados (“vasos bien relacionados”');
            $("#columnaVertebral").val('de aspecto normal en los planos sagital coronal y tranversal.');
            $("#abdomen").val('pared normal, estomago presente, riñones normales, vejiga con 2 vasos (arterias umbilicales). intestinos de  ecogenicidad normal, insercion de cordon normal.');
            $("#dbp").val('');
            $("#cc").val('');
            $("#ca").val('');
            $("#lf").val(''); 
            $("#comentario").val('PLACENTA CORPORAL POSTERIOR GRADO “0”');
            $("#ip-der").val('');
            $("#ip-izq").val('');
            $("#ponderadoFetal").val('');
            $("#lcf").val(''); 
            $("#conclusiones").val('');
        },
        error: function() {
            $("body").overhang({
              type: "error",
              message: "Alerta! Tenemos un problema al conectar con la base de datos. Verifica tu red.",
            }); 
          }
        });  
      }