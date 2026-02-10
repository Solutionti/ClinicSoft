function createEcografiaRenal() {
    var url = baseurl + "administracion/ecografiarenal";

    // --- 1. DATOS GENERALES ---
    var documento_paciente = $("#dni").val();
    var codigo_doctor = $("#codigo_doctor").val();
    var motivo = $("#motivo").val();

    // --- 2. RIÑÓN DERECHO (RD) ---
    var rd_morfologia = $("#rd_morfologia").val();
    var rd_ecogenicidad = $("#rd_ecogenicidad").val();
    var rd_longitud = $("#rd_longitud").val();
    var rd_parenquima = $("#rd_parenquima").val();
    var rd_solidas = $("#rd_solidas").val();
    var rd_quisticas = $("#rd_quisticas").val();
    var rd_hidronefrosis = $("#rd_hidronefrosis").val();
    var rd_hidro_medida = $("#rd_hidro_medida").val();
    var rd_microlitiasis = $("#rd_microlitiasis").val();
    var rd_micro_medida = $("#rd_micro_medida").val();
    var rd_calculos = $("#rd_calculos").val();
    var rd_calculos_medida = $("#rd_calculos_medida").val();

    // --- 3. RIÑÓN IZQUIERDO (RI) ---
    var ri_morfologia = $("#ri_morfologia").val();
    var ri_ecogenicidad = $("#ri_ecogenicidad").val();
    var ri_longitud = $("#ri_longitud").val();
    var ri_parenquima = $("#ri_parenquima").val();
    var ri_solidas = $("#ri_solidas").val();
    var ri_quisticas = $("#ri_quisticas").val();
    var ri_hidronefrosis = $("#ri_hidronefrosis").val();
    var ri_hidro_medida = $("#ri_hidro_medida").val();
    var ri_microlitiasis = $("#ri_microlitiasis").val();
    var ri_micro_medida = $("#ri_micro_medida").val();
    var ri_calculos = $("#ri_calculos").val();
    var ri_calculos_medida = $("#ri_calculos_medida").val();

    // --- 4. VEJIGA ---
    var vejiga_replecion = $("#vejiga_replecion").val();
    var vejiga_paredes = $("#vejiga_paredes").val();
    var vejiga_contenido = $("#vejiga_contenido").val();
    var vejiga_imagenes = $("#vejiga_imagenes").val();
    var vejiga_calculos = $("#vejiga_calculos").val();
    var descripcion_vejiga = $("#descripcion_vejiga").val();

    // --- 5. VOLÚMENES Y RESIDUO ---
    var vol_pre = $("#vol_pre").val();
    var vol_post = $("#vol_post").val();
    var retencion = $("#retencion").val();

    // --- 6. CIERRE ---
    var observaciones = $("#observaciones").val();
    var conclusiones = $("#conclusiones").val();

    $.ajax({
        url: url,
        method: "POST",
        data: {
            documento_paciente: documento_paciente,
            codigo_doctor: codigo_doctor,
            motivo: motivo,

            // RD
            rd_morfologia: rd_morfologia,
            rd_ecogenicidad: rd_ecogenicidad,
            rd_longitud: rd_longitud,
            rd_parenquima: rd_parenquima,
            rd_solidas: rd_solidas,
            rd_quisticas: rd_quisticas,
            rd_hidronefrosis: rd_hidronefrosis,
            rd_hidro_medida: rd_hidro_medida,
            rd_microlitiasis: rd_microlitiasis,
            rd_micro_medida: rd_micro_medida,
            rd_calculos: rd_calculos,
            rd_calculos_medida: rd_calculos_medida,

            // RI
            ri_morfologia: ri_morfologia,
            ri_ecogenicidad: ri_ecogenicidad,
            ri_longitud: ri_longitud,
            ri_parenquima: ri_parenquima,
            ri_solidas: ri_solidas,
            ri_quisticas: ri_quisticas,
            ri_hidronefrosis: ri_hidronefrosis,
            ri_hidro_medida: ri_hidro_medida,
            ri_microlitiasis: ri_microlitiasis,
            ri_micro_medida: ri_micro_medida,
            ri_calculos: ri_calculos,
            ri_calculos_medida: ri_calculos_medida,

            // Vejiga
            vejiga_replecion: vejiga_replecion,
            vejiga_paredes: vejiga_paredes,
            vejiga_contenido: vejiga_contenido,
            vejiga_imagenes: vejiga_imagenes,
            vejiga_calculos: vejiga_calculos,
            descripcion_vejiga: descripcion_vejiga,

            // Volúmenes
            vol_pre: vol_pre,
            vol_post: vol_post,
            retencion: retencion,

            // Final
            observaciones: observaciones,
            conclusiones: conclusiones
        },
        success: function() {
            $("body").overhang({
                type: "success",
                message: "Ecografía Renal registrada correctamente"
            });

            // Limpiar formulario y Generar PDF
            $("#formRenal")[0].reset();
            generarpdfRenal();
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
  function generarpdfRenal() {
    let dni = $("#dni").val();
    let url = baseurl + "administracion/pdfecografiarenal/" + dni;
    window.open(url, "_blank", " width=950, height=1000");
  } 

  function cargarRenalNormal() {
    $('#motivo').val('Control Urológico');
    
    // RIÑÓN DERECHO
    $('#rd_morfologia').val('Normal'); $('#rd_ecogenicidad').val('Normal');
    $('#rd_longitud').val('105'); $('#rd_parenquima').val('16');
    $('#rd_solidas').val('No'); $('#rd_quisticas').val('No');
    $('#rd_hidronefrosis').val('No'); $('#rd_hidro_medida').val('');
    $('#rd_microlitiasis').val('No'); $('#rd_micro_medida').val('');
    $('#rd_calculos').val('No'); $('#rd_calculos_medida').val('');
    
    // RIÑÓN IZQUIERDO
    $('#ri_morfologia').val('Normal'); $('#ri_ecogenicidad').val('Normal');
    $('#ri_longitud').val('108'); $('#ri_parenquima').val('16');
    $('#ri_solidas').val('No'); $('#ri_quisticas').val('No');
    $('#ri_hidronefrosis').val('No'); $('#ri_hidro_medida').val('');
    $('#ri_microlitiasis').val('No'); $('#ri_micro_medida').val('');
    $('#ri_calculos').val('No'); $('#ri_calculos_medida').val('');
    
    // VEJIGA
    $('#vejiga_replecion').val('Normal'); $('#vejiga_paredes').val('Normal');
    $('#vejiga_contenido').val('Sí'); $('#vejiga_imagenes').val('No');
    $('#vejiga_calculos').val('No');
    $('#descripcion_vejiga').val('Vejiga de características conservadas.');
    
    // VOLÚMENES
    $('#vol_pre').val('300'); $('#vol_post').val('10');
    calcResiduo();
    
    // CONCLUSIÓN
    $('#conclusiones').val('RIÑONES DE MORFOLOGÍA, TAMAÑO Y ECOGENICIDAD CONSERVADA.\nNO SE EVIDENCIA LITIASIS NI HIDRONEFROSIS.\nVEJIGA SIN ALTERACIONES.');
}

// 2. CÁLCULO RESIDUO
function calcResiduo() {
    let pre = parseFloat($('#vol_pre').val()) || 0;
    let post = parseFloat($('#vol_post').val()) || 0;
    if (pre > 0) {
        let pct = (post / pre) * 100;
        $('#retencion').val(pct.toFixed(1) + " %");
    } else {
        $('#retencion').val('');
    }
}
$('#vol_pre, #vol_post').on('input', calcResiduo);