function createEcografiaTiroides() {
    var url = baseurl + "administracion/ecografiatiroides";

    // --- 1. DATOS GENERALES ---
    var documento_paciente = $("#dni").val();
    var codigo_doctor = $("#codigo_doctor").val();
    var motivo = $("#motivo").val();
    var descripcion_tiroides = $("#descripcionTiroides").val();

    // --- 2. LÓBULO DERECHO ---
    var ld_long = $("#ld_long").val();
    var ld_ap = $("#ld_ap").val();
    var ld_trans = $("#ld_trans").val();
    var ld_volumen = $("#ld_volumen").val(); // Calculado automáticamente

    // --- 3. LÓBULO IZQUIERDO ---
    var li_long = $("#li_long").val();
    var li_ap = $("#li_ap").val();
    var li_trans = $("#li_trans").val();
    var li_volumen = $("#li_volumen").val(); // Calculado automáticamente

    // --- 4. VOLUMEN TOTAL ---
    var volumen_total = $("#volumen_total").val(); // Calculado automáticamente

    // --- 5. OTRAS ESTRUCTURAS ---
    var istmo = $("#istmo").val();
    var estructuras_vasculares = $("#estructurasVasculares").val();
    var glandulas_submaxilares = $("#glandulasSubmaxilares").val();
    var adenopatia_cervicales = $("#adenopatiaCervicales").val();
    var piel = $("#piel").val();
    var tcsc = $("#tcsc").val();

    // --- 6. CONCLUSIONES Y SUGERENCIAS ---
    var conclusiones = $("#conclusiones").val();
    var sugerencias = $("#sugerencias").val();

    $.ajax({
        url: url,
        method: "POST",
        data: {
            // General
            documento_paciente: documento_paciente,
            codigo_doctor: codigo_doctor,
            motivo: motivo,
            descripcion_tiroides: descripcion_tiroides,

            // Derecho
            ld_long: ld_long,
            ld_ap: ld_ap,
            ld_trans: ld_trans,
            ld_volumen: ld_volumen,

            // Izquierdo
            li_long: li_long,
            li_ap: li_ap,
            li_trans: li_trans,
            li_volumen: li_volumen,

            // Total
            volumen_total: volumen_total,

            // Estructuras
            istmo: istmo,
            estructuras_vasculares: estructuras_vasculares,
            glandulas_submaxilares: glandulas_submaxilares,
            adenopatia_cervicales: adenopatia_cervicales,
            piel: piel,
            tcsc: tcsc,

            // Final
            conclusiones: conclusiones,
            sugerencias: sugerencias
        },
        success: function() {
            $("body").overhang({
                type: "success",
                message: "Ecografía de Tiroides registrada correctamente"
            });
            
            // Limpiar formulario
            $("#formTiroides")[0].reset();
            
            // Generar PDF y recargar
            generarpdfTiroides(); 
            setTimeout(function() {
                location.reload();
            }, 2000);
        },
        error: function() {
            $("body").overhang({
                type: "error",
                message: "Alerta! Tenemos un problema al conectar con la base de datos."
            });
        }
    });
}

  function generarpdfTiroides() {
    let dni = $("#dni").val();
    let url = baseurl + "administracion/pdfecografiatiroides/" + dni;
    window.open(url, "_blank", " width=950, height=1000");
  } 
  function cargarTiroidesNormal() {
    $('#motivo').val('Chequeo');
    $('#descripcionTiroides').val('Ubicación central, Parénquima homogéneo, Volumen normal, No se observan lesiones focales');
    
    // Medidas Normales
    $('#ld_long').val('45'); $('#ld_ap').val('15'); $('#ld_trans').val('16');
    $('#li_long').val('42'); $('#li_ap').val('14'); $('#li_trans').val('15');
    
    $('#istmo').val('Espesor de 2.5 mm');
    $('#estructurasVasculares').val('Calibre y trayecto conservado');
    $('#glandulasSubmaxilares').val('De aspecto y tamaño normal');
    $('#adenopatiaCervicales').val('No se evidencian adenopatías patológicas');
    $('#piel').val('Fina, ecogenicidad conservada');
    $('#tcsc').val('Sin alteraciones ecográficas.');
    
    // Calcular
    calcVolumenTiroides();

    $('#conclusiones').val('GLÁNDULA TIROIDES DE CARACTERÍSTICAS ECOGRÁFICAS DENTRO DE LÍMITES NORMALES.');
    $('#sugerencias').val('-');
}

// 2. CALCULADORA (Fórmula Elipsoide)
function calcVolumenTiroides() {
    const factor = 0.52;
    
    // Derecho
    let dL = parseFloat($('#ld_long').val()) || 0;
    let dAP = parseFloat($('#ld_ap').val()) || 0;
    let dT = parseFloat($('#ld_trans').val()) || 0;
    let volD = (dL * dAP * dT * factor) / 1000;
    
    // Izquierdo
    let iL = parseFloat($('#li_long').val()) || 0;
    let iAP = parseFloat($('#li_ap').val()) || 0;
    let iT = parseFloat($('#li_trans').val()) || 0;
    let volI = (iL * iAP * iT * factor) / 1000;
    
    // Mostrar
    $('#ld_volumen').val(volD > 0 ? volD.toFixed(1) + ' cc' : '');
    $('#li_volumen').val(volI > 0 ? volI.toFixed(1) + ' cc' : '');
    
    // Total
    if (volD > 0 && volI > 0) {
        let total = volD + volI;
        $('#volumen_total').val(total.toFixed(1) + ' cc');
    } else {
        $('#volumen_total').val('');
    }
}

// Listener para cálculo en tiempo real
$(document).ready(function() {
    $('#ld_long, #ld_ap, #ld_trans, #li_long, #li_ap, #li_trans').on('input', calcVolumenTiroides);
});