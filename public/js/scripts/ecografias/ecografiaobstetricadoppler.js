function createEcografiaDoppler() {
    // Asegúrate de que esta ruta exista en tu routes.php
    var url = baseurl + "administracion/ecografiaobstetricadoppler"; 

    // Validación básica
    if ($("#dni").val() == "") {
        $("body").overhang({ type: "error", message: "El DNI del paciente es obligatorio." });
        return;
    }
    if ($("#motivo").val() == "") {
        $("body").overhang({ type: "error", message: "El motivo es obligatorio." });
        return;
    }

    $.ajax({
        url: url,
        method: "POST",
        data: {
            // Datos Paciente (Están fuera del form, pero en el HTML global)
            documento_paciente: $("#dni").val(),
            codigo_doctor: $("#codigo_doctor").val(),
            motivo: $("#motivo").val(),

            // Sección 1: Biometría
            situacion: $("#situacion").val(),
            lcf: $("#lcf").val(),
            placenta_grado: $("#placenta_grado").val(),
            ila: $("#ila").val(),
            dbp: $("#dbp").val(),
            cc: $("#cc").val(),
            ca: $("#ca").val(),
            lf: $("#lf").val(),
            pfe: $("#pfe").val(), // Peso Fetal

            // Sección 2: Hemodinamia (Tabla)
            au_ip: $("#au_ip").val(), 
            au_ir: $("#au_ir").val(), 
            au_sd: $("#au_sd").val(),
            
            acm_ip: $("#acm_ip").val(), 
            acm_vmax: $("#acm_vmax").val(),
            
            ut_der_ip: $("#ut_der_ip").val(), 
            ut_izq_ip: $("#ut_izq_ip").val(), 
            ut_promedio: $("#ut_promedio").val(),

            // Inputs inferiores
            ductus_venoso: $("#ductus_venoso").val(),
            ratio_cerebro_placentario: $("#ratio_cerebro_placentario").val(),

            // Text Areas
            descripcion_anatomica: $("#descripcion_anatomica").val(),
            conclusiones: $("#conclusiones").val(),
            sugerencias: $("#sugerencias").val()
        },
        success: function() {
            $("body").overhang({ type: "success", message: "Doppler Obstétrico guardado correctamente." });
            
            // Generar PDF y Recargar
            generarPdfDoppler(); 
            
            setTimeout(function() {
                location.reload();
            }, 2000);
        },
        error: function() {
            $("body").overhang({ type: "error", message: "Error al guardar en la base de datos." });
        }
    });
}

// Función para abrir el PDF
function generarPdfDoppler(dni) {
    if(!dni) dni = $("#dni").val(); // Si no recibe DNI, lo toma del input
    window.open(baseurl + "administracion/pdfecografiaobstetricadoppler/" + dni, "_blank");
}

function cargarDopplerNormal() {
    // 1. Cabecera y Biometría (Valores promedio)
    $('#motivo').val('Control de bienestar fetal / Evaluación hemodinámica');
    $('#situacion').val('Cefálico / Dorso Derecho');
    $('#lcf').val('145 lpm (Rítmicos)');
    $('#placenta_grado').val('Corporal Posterior / Grado I');
    $('#ila').val('Normal (Pozo mayor > 3cm)');
    
    // Dejamos medidas vacías o con texto guía para que el doctor llene lo real
    $('#dbp').val('mm'); $('#cc').val('mm');
    $('#ca').val('mm');  $('#lf').val('mm');
    $('#pfe').val('Acorde a edad gestacional (P 50)');

    // 2. Hemodinamia (Doppler) - Textos sugeridos basados en la imagen
    $('#au_ip').val('Normal'); $('#au_ir').val('Normal'); $('#au_sd').val('Flujo diastólico presente');
    
    $('#acm_ip').val('Normal'); 
    $('#acm_vmax').val('< 1.5 MoM'); // Velocidad normal para anemia
    
    // Aquí agregamos el detalle de la "Muesca" o Notch que vimos en la imagen
    $('#ut_der_ip').val('Baja resistencia'); 
    $('#ut_izq_ip').val('Baja resistencia'); 
    $('#ut_promedio').val('Sin Notch protodiastólico');

    $('#ductus_venoso').val('Onda A positiva (Flujo anterógrado)');
    $('#ratio_cerebro_placentario').val('> 1.0 (Conservado)');

    // 3. DESCRIPCIÓN ANATÓMICA DETALLADA (Estilo "Union Vital")
    var anatomiaPro = "CABEZA: Calota íntegra, tálamo y ventrículos laterales normales. Fosa posterior conservada.\n" +
                      "CARA: Perfil facial normal, hueso nasal presente, labios simétricos.\n" +
                      "COLUMNA: Íntegra en toda su extensión, piel que la recubre intacta.\n" +
                      "TÓRAX/CORAZÓN: Situs solitus. 4 cámaras cardiacas visibles, tractos de salida normales. Ritmo regular.\n" +
                      "ABDOMEN: Pared abdominal íntegra. Cámara gástrica y vejiga visibles. Riñones normales.\n" +
                      "EXTREMIDADES: Visualización de huesos largos y segmentos distales (manos/pies) aparentes.";
    
    $('#descripcion_anatomica').val(anatomiaPro);

    // 4. Conclusiones
    $('#conclusiones').val('FETO ÚNICO CON BIOMETRÍA ACORDE A EDAD GESTACIONAL.\nANATOMÍA FETAL VISIBLE SIN ALTERACIONES EVIDENTES.\nDOPPLER FETOPLACENTARIO DENTRO DE LÍMITES NORMALES (BAJO RIESGO DE PREECLAMPSIA/RCIU).');
    $('#sugerencias').val('Continuar control prenatal según cronograma.');
}