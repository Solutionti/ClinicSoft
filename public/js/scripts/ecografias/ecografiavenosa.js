// CARGA RÁPIDA (Valores de tu imagen)
function cargarVenosaNormal() {
    $('#motivo').val('Insuficiencia Venosa');
    
    // Descripciones
    var desc = "PAREDES LISAS, FLUJO FASICO CON LA RESPIRACIÓN, REFLUJOS SEGÚN DESCRIPCIÓN.";
    $('#mid_descripcion').val(desc);
    $('#mii_descripcion').val(desc);

    // DERECHA (Valores imagen)
    $('#mid_fc_med').val('8 mm');   $('#mid_fc_ref').val('Bifásica');
    $('#mid_smm_med').val('60');    $('#mid_smm_ref').val('Bifásica');
    $('#mid_smp_med').val('45');    $('#mid_smp_ref').val('Bifásica');
    $('#mid_pop_med').val('40');    $('#mid_pop_ref').val('Bifásica');
    $('#mid_sm_med').val('40-42');  $('#mid_sm_ref').val('Bifásica');
    $('#mid_perf_med').val('38');   $('#mid_perf_ref').val('Bifásica');

    // IZQUIERDA (Valores imagen)
    $('#mii_fc_med').val('60');     $('#mii_fc_ref').val('Bifásica');
    $('#mii_smm_med').val('50');    $('#mii_smm_ref').val('Bifásica');
    $('#mii_smp_med').val('35');    $('#mii_smp_ref').val('Bifásica');
    $('#mii_pop_med').val('35');    $('#mii_pop_ref').val('Bifásica');
    $('#mii_sm_med').val('38');     $('#mii_sm_ref').val('Bifásica');
    $('#mii_perf_med').val('35');   $('#mii_perf_ref').val('Bifásica');
    
    $('#conclusiones').val('SISTEMA VENOSO PERMEABLE.');
    $('#sugerencias').val('-');
}

// GUARDAR
function createEcografiaVenosa() {
    var url = baseurl + "administracion/ecografiavenosa";

    // Validar DNI
    if ($("#dni").val() == "") {
        $("body").overhang({ type: "error", message: "El DNI del paciente es obligatorio." });
        return;
    }

    $.ajax({
        url: url,
        method: "POST",
        data: {
            documento_paciente: $("#dni").val(),
            codigo_doctor: $("#codigo_doctor").val(),
            motivo: $("#motivo").val(),
            
            // DERECHA
            mid_descripcion: $("#mid_descripcion").val(),
            mid_fc_med: $("#mid_fc_med").val(),   mid_fc_ref: $("#mid_fc_ref").val(),
            mid_smm_med: $("#mid_smm_med").val(), mid_smm_ref: $("#mid_smm_ref").val(),
            mid_smp_med: $("#mid_smp_med").val(), mid_smp_ref: $("#mid_smp_ref").val(),
            mid_pop_med: $("#mid_pop_med").val(), mid_pop_ref: $("#mid_pop_ref").val(),
            mid_sm_med: $("#mid_sm_med").val(),   mid_sm_ref: $("#mid_sm_ref").val(),
            mid_perf_med: $("#mid_perf_med").val(), mid_perf_ref: $("#mid_perf_ref").val(),

            // IZQUIERDA
            mii_descripcion: $("#mii_descripcion").val(),
            mii_fc_med: $("#mii_fc_med").val(),   mii_fc_ref: $("#mii_fc_ref").val(),
            mii_smm_med: $("#mii_smm_med").val(), mii_smm_ref: $("#mii_smm_ref").val(),
            mii_smp_med: $("#mii_smp_med").val(), mii_smp_ref: $("#mii_smp_ref").val(),
            mii_pop_med: $("#mii_pop_med").val(), mii_pop_ref: $("#mii_pop_ref").val(),
            mii_sm_med: $("#mii_sm_med").val(),   mii_sm_ref: $("#mii_sm_ref").val(),
            mii_perf_med: $("#mii_perf_med").val(), mii_perf_ref: $("#mii_perf_ref").val(),

            conclusiones: $("#conclusiones").val(),
            sugerencias: $("#sugerencias").val()
        },
        success: function() {
            $("body").overhang({ type: "success", message: "Ecografía Venosa guardada." });
            generarPdfVenosa();
            setTimeout(function() { location.reload(); }, 2000);
        },
        error: function() {
            $("body").overhang({ type: "error", message: "Error al guardar." });
        }
    });
}

function generarPdfVenosa(dni) {
    if(!dni) dni = $("#dni").val();
    window.open(baseurl + "administracion/pdfecografiavenosa/" + dni, "_blank");
}