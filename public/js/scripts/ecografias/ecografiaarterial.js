// ===============================================
// 1. CARGA RÁPIDA: LLENADO DE VALORES NORMALES
// ===============================================
function cargarArterialNormal() {
    // Datos generales
    $('#motivo').val('Dolor en miembros inferiores / Descarte de insuficiencia arterial');
    
    // --- MIEMBRO INFERIOR DERECHO (MID) ---
    $('#mid_descripcion').val('Ejes arteriales permeables, de calibre y trayecto conservado. No se observan placas ateromatosas significativas ni estenosis hemodinámicamente relevantes.');
    
    // Velocidades y Ondas (Valores fisiológicos aprox.)
    $('#mid_fc_vps').val('90');    $('#mid_fc_onda').val('Trifásica'); // F. Común
    $('#mid_fs_vps').val('70');    $('#mid_fs_onda').val('Trifásica'); // F. Superficial
    $('#mid_pop_vps').val('55');   $('#mid_pop_onda').val('Trifásica'); // Poplítea
    $('#mid_tp_vps').val('45');    $('#mid_tp_onda').val('Trifásica'); // Tibial Post
    $('#mid_ta_vps').val('45');    $('#mid_ta_onda').val('Trifásica'); // Tibial Ant
    $('#mid_media_vps').val('40'); $('#mid_media_onda').val('Trifásica'); // Media

    // --- MIEMBRO INFERIOR IZQUIERDO (MII) ---
    $('#mii_descripcion').val('Ejes arteriales permeables, de calibre y trayecto conservado. No se observan placas ateromatosas significativas ni estenosis hemodinámicamente relevantes.');

    $('#mii_fc_vps').val('88');    $('#mii_fc_onda').val('Trifásica');
    $('#mii_fs_vps').val('72');    $('#mii_fs_onda').val('Trifásica');
    $('#mii_pop_vps').val('54');   $('#mii_pop_onda').val('Trifásica');
    $('#mii_tp_vps').val('44');    $('#mii_tp_onda').val('Trifásica');
    $('#mii_ta_vps').val('46');    $('#mii_ta_onda').val('Trifásica');
    $('#mii_media_vps').val('42'); $('#mii_media_onda').val('Trifásica');

    // Conclusiones
    $('#conclusiones').val('SISTEMA ARTERIAL DE AMBOS MIEMBROS INFERIORES DENTRO DE LÍMITES NORMALES.\nFLUJO TRIFÁSICO CONSERVADO EN TODOS LOS SEGMENTOS EVALUADOS.');
    $('#sugerencias').val('-');
}

// ===============================================
// 2. GUARDAR DATOS (AJAX)
// ===============================================
function createEcografiaArterial() {
    // Esta URL debe coincidir con tu routes.php: "administracion/ecografiaarterial"
    var url = baseurl + "administracion/ecografiaarterial";

    // Validar DNI
    if ($("#dni").val() == "") {
        $("body").overhang({ type: "error", message: "El DNI del paciente es obligatorio." });
        return;
    }

    // Validar motivo
    if ($("#motivo").val() == "") {
        $("body").overhang({ type: "error", message: "El motivo del examen es obligatorio." });
        return;
    }

    $.ajax({
        url: url,
        method: "POST",
        data: {
            // --- DATOS GENERALES ---
            documento_paciente: $("#dni").val(),
            codigo_doctor: $("#codigo_doctor").val(),
            motivo: $("#motivo").val(),
            
            // --- DERECHO (MID) ---
            mid_descripcion: $("#mid_descripcion").val(),
            // Arterias individuales
            mid_fc_vps: $("#mid_fc_vps").val(),       mid_fc_onda: $("#mid_fc_onda").val(),
            mid_fs_vps: $("#mid_fs_vps").val(),       mid_fs_onda: $("#mid_fs_onda").val(),
            mid_pop_vps: $("#mid_pop_vps").val(),     mid_pop_onda: $("#mid_pop_onda").val(),
            mid_tp_vps: $("#mid_tp_vps").val(),       mid_tp_onda: $("#mid_tp_onda").val(),
            mid_ta_vps: $("#mid_ta_vps").val(),       mid_ta_onda: $("#mid_ta_onda").val(),
            mid_media_vps: $("#mid_media_vps").val(), mid_media_onda: $("#mid_media_onda").val(),

            // --- IZQUIERDO (MII) ---
            mii_descripcion: $("#mii_descripcion").val(),
            // Arterias individuales
            mii_fc_vps: $("#mii_fc_vps").val(),       mii_fc_onda: $("#mii_fc_onda").val(),
            mii_fs_vps: $("#mii_fs_vps").val(),       mii_fs_onda: $("#mii_fs_onda").val(),
            mii_pop_vps: $("#mii_pop_vps").val(),     mii_pop_onda: $("#mii_pop_onda").val(),
            mii_tp_vps: $("#mii_tp_vps").val(),       mii_tp_onda: $("#mii_tp_onda").val(),
            mii_ta_vps: $("#mii_ta_vps").val(),       mii_ta_onda: $("#mii_ta_onda").val(),
            mii_media_vps: $("#mii_media_vps").val(), mii_media_onda: $("#mii_media_onda").val(),

            // --- CIERRE ---
            conclusiones: $("#conclusiones").val(),
            sugerencias: $("#sugerencias").val()
        },
        success: function() {
            $("body").overhang({
                type: "success",
                message: "Ecografía Arterial registrada correctamente."
            });
            
            // Generar PDF
            generarPdfArterial(); 
            
            // Recargar página
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

// ===============================================
// 3. GENERAR PDF
// ===============================================
 function generarPdfArterial() {
        let dni = $("#dni").val();
        let url = baseurl + "administracion/pdfecografiaarterial/" + dni;
        window.open(url, "_blank", " width=950, height=1000");
      }   