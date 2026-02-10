function createEcografiaProstatica() {
    var url = baseurl + "administracion/ecografiaprostatica";

    // Datos Generales
    var documento_paciente = $("#dni").val();
    var codigo_doctor = $("#codigo_doctor").val();
    var motivo = $("#motivo").val();

    // Vejiga
    var paredes = $("#paredes").val();
    var contenido = $("#contenido").val();
    var imagenes_expansivas = $("#imagenes_expansivas").val();
    var calculos = $("#calculos").val();
    var descripcion_vejiga = $("#descripcion_vejiga").val();

    // Volúmenes (Residuo)
    var vol_pre = $("#vol_pre").val();
    var vol_post = $("#vol_post").val();
    var retencion = $("#retencion").val(); // Este ya lleva el % calculado

    // Próstata (Medidas y Peso)
    var transverso = $("#transverso").val();
    var antero_posterior = $("#antero_posterior").val();
    var longitudinal = $("#longitudinal").val();
    var volumen = $("#volumen").val(); // Este ya lleva el "cc" y el Grado

    // Características
    var bordes = $("#bordes").val();
    var observacion = $("#observacion_textarea").val(); // Ojo con el ID del HTML
    var conclusiones = $("#conclusiones").val();

    $.ajax({
        url: url,
        method: "POST",
        data: {
            documento_paciente: documento_paciente,
            codigo_doctor: codigo_doctor,
            motivo: motivo,
            
            paredes: paredes,
            contenido: contenido,
            imagenes_expansivas: imagenes_expansivas,
            calculos: calculos,
            descripcion_vejiga: descripcion_vejiga,
            
            vol_pre: vol_pre,
            vol_post: vol_post,
            retencion: retencion,
            
            transverso: transverso,
            antero_posterior: antero_posterior,
            longitudinal: longitudinal,
            volumen: volumen,
            
            bordes: bordes,
            observacion: observacion,
            conclusiones: conclusiones
        },
        success: function() {
            $("body").overhang({
                type: "success",
                message: "Ecografía Prostática registrada correctamente"
            });
            
            // Limpiar formulario
            $("#formProstata")[0].reset(); // Truco para limpiar todo el form de una vez
            
            // Generar PDF y Recargar
            generarpdfProstatica(); 
            setTimeout(function() {
                location.reload();
            }, 2000);
        },
        error: function() {
            $("body").overhang({
                type: "error",
                message: "Error al conectar con la base de datos."
            });
        }
    });
}

function cargarProstataNormal() {
    // Motivo
    $('#motivo').val('Chequeo Urológico / Dificultad miccional');
    
    // Vejiga
    $('#paredes').val('Delgadas');
    $('#contenido').val('Anecoico');
    $('#imagenes_expansivas').val('No');
    $('#calculos').val('No');
    $('#descripcion_vejiga').val('Vejiga de paredes delgadas y contenido anecoico. No litiasis.');
    
    // Volúmenes (Ejemplo de buena micción)
    $('#vol_pre').val('350');
    $('#vol_post').val('20');
    
    // Próstata (Ejemplo Normal)
    $('#transverso').val('38');
    $('#antero_posterior').val('25');
    $('#longitudinal').val('30');
    $('#bordes').val('Regulares');
    $('#observacion_textarea').val('Parénquima homogéneo. Cápsula íntegra.');
    
    // Disparar cálculos
    calcularProstata();
    calcularResiduo();
    
    // Conclusión
    $('#conclusiones').val('PRÓSTATA DE VOLUMEN Y ECOESTRUCTURA CONSERVADA.\nRESIDUO POST-MICCIONAL NO SIGNIFICATIVO.');
}

// ==========================================
// 2. CALCULADORA DE VOLUMEN PROSTÁTICO
// ==========================================
function calcularProstata() {
    let t = parseFloat($('#transverso').val()) || 0;
    let ap = parseFloat($('#antero_posterior').val()) || 0;
    let l = parseFloat($('#longitudinal').val()) || 0;
    
    if (t > 0 && ap > 0 && l > 0) {
        // Fórmula del Elipsoide: V = L x AP x T x 0.52
        let vol = (t * ap * l * 0.52) / 1000; 
        let volRedondeado = vol.toFixed(1); // 1 decimal
        
        let textoGrado = "";
        if(vol <= 20) textoGrado = " (Normal)";
        else if(vol <= 30) textoGrado = " (G I)";
        else if(vol <= 50) textoGrado = " (G II)";
        else if(vol <= 80) textoGrado = " (G III)";
        else textoGrado = " (G IV)";
        
        $('#volumen').val(volRedondeado + " cc" + textoGrado);
    } else {
        $('#volumen').val('');
    }
}

// ==========================================
// 3. CALCULADORA DE RESIDUO (%)
// ==========================================
function calcularResiduo() {
    let pre = parseFloat($('#vol_pre').val()) || 0;
    let post = parseFloat($('#vol_post').val()) || 0;
    
    if (pre > 0) {
        let pct = (post / pre) * 100;
        $('#retencion').val(pct.toFixed(1) + " %");
    } else {
        $('#retencion').val('');
    }
}

// ==========================================
// 4. LISTENERS (Cálculo en tiempo real)
// ==========================================
$(document).ready(function() {
    $('#transverso, #antero_posterior, #longitudinal').on('input', calcularProstata);
    $('#vol_pre, #vol_post').on('input', calcularResiduo);
});


function generarpdfProstatica() {
  let dni = $("#dni").val();
  let url = baseurl + "administracion/pdfecografiaprostatica/" + dni;
  window.open(url, "_blank", " width=950, height=1000");
} 