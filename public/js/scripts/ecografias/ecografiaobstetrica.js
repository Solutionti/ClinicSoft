function createEcografiaObstetrica() {
    var url = baseurl + "administracion/ecografiaobstetrica"; 
    
    // 1. DATOS DEL PACIENTE
    var documento_paciente = $("#dni").val();
    var codigo_doctor = $("#codigo_doctor").val();

    // 2. DATOS PRECOCES (< 13 SEMANAS)
    var saco_gestacional = $("#saco_gestacional").val();
    var saco_vitelino = $("#saco_vitelino").val();
    var lcc = $("#lcc").val();
    var embrion_visualizado = $("#embrion_visualizado").val();

    // 3. ESTÁTICA Y VITALIDAD
    var situacion = $("#situacion").val();      // Antes era radio, ahora select
    var presentacion = $("#presentacion").val(); // Nuevo
    var dorso = $("#dorso").val();              // Nuevo
    var lcf = $("#lcf").val();
    var movimientos = $("#movimientos").val();  // Reemplaza a 'estadoFeto'
    var sexo = $("#sexo").val();                // Nuevo
    var fpp_eco = $("#fpp_eco").val();          // Nuevo

    // 4. BIOMETRÍA AVANZADA (> 13 SEMANAS)
    var dpb = $("#dpb").val();
    var cc = $("#cc").val();
    var ca = $("#ca").val();
    var lf = $("#lf").val();
    var ponderado = $("#ponderado").val();         // Peso en gramos (Nuevo)
    var edad_gestacional = $("#edad_gestacional").val(); // Nuevo
    var percentil = $("#percentil").val();

    // 5. PLACENTA Y LÍQUIDO
    var placenta_ub = $("#placenta_ub").val();       // Reemplaza a 'placenta'
    var placenta_grado = $("#placenta_grado").val(); // Nuevo
    var ila = $("#ila").val();

    // 6. CONCLUSIONES
    var conclusion = $("#conclusion").val();
    var sugerencia = $("#sugerencia").val();

    $.ajax({
        url: url,
        method: "POST",
        data: {
            documento_paciente: documento_paciente,
            codigo_doctor: codigo_doctor,
            
            // Campos Nuevos Precoz
            saco_gestacional: saco_gestacional,
            saco_vitelino: saco_vitelino,
            lcc: lcc,
            embrion_visualizado: embrion_visualizado,

            // Campos Vitalidad
            situacion: situacion,
            presentacion: presentacion,
            dorso: dorso,
            lcf: lcf,
            movimientos: movimientos,
            sexo: sexo,
            fpp_eco: fpp_eco,

            // Campos Biometría
            dpb: dpb,
            cc: cc,
            ca: ca,
            lf: lf,
            ponderado: ponderado,
            edad_gestacional: edad_gestacional,
            percentil: percentil,

            // Campos Placenta
            placenta_ub: placenta_ub,
            placenta_grado: placenta_grado,
            ila: ila,

            // Final
            conclusion: conclusion,
            sugerencia: sugerencia
        },
        success: function() {
            $("body").overhang({
                type: "success",
                message: "Ecografía Obstétrica registrada correctamente"
            });

            // Limpiar TODOS los campos
            $("#documento_paciente").val('');
            $("#codigo_doctor").val('');
            
            // Limpiar selects y inputs nuevos
            $("#saco_gestacional").val('');
            $("#saco_vitelino").val('');
            $("#lcc").val('');
            $("#embrion_visualizado").val('');
            
            $("#situacion").val('Longitudinal'); // Valor por defecto
            $("#presentacion").val('Cefalico');
            $("#dorso").val('Derecho');
            $("#lcf").val('');
            $("#movimientos").val('');
            $("#sexo").val('');
            $("#fpp_eco").val('');

            $("#dpb").val('');
            $("#cc").val('');
            $("#ca").val('');
            $("#lf").val('');
            $("#ponderado").val('');
            $("#edad_gestacional").val('');
            $("#percentil").val('');

            $("#placenta_ub").val('');
            $("#placenta_grado").val('');
            $("#ila").val('');

            $("#conclusion").val('');
            $("#sugerencia").val('');

            // Generar PDF y Recargar
            generarpdfObstetrica();
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

  function generarpdfObstetrica() {
    let dni = $("#dni").val();
    let url = baseurl + "administracion/pdfecografiaobstetrica/" + dni;
    window.open(url, "_blank", " width=950, height=1000");
  }  

  function activarModo(modo) {
    if (modo === 'precoz') {
        // Muestra Precoz, Oculta Avanzado
        $('#bloque_precoz').show();
        $('#bloque_avanzado').hide();
        
        // Cambia estilo de botones
        $('#btn_precoz').removeClass('btn-outline-warning').addClass('btn-warning');
        $('#btn_avanzado').removeClass('btn-primary').addClass('btn-outline-primary');
        
        // Limpia campos avanzados para evitar errores
        $('#dpb, #lf, #ponderado').val(''); 
        
    } else {
        // Muestra Avanzado, Oculta Precoz
        $('#bloque_precoz').hide();
        $('#bloque_avanzado').show();
        
        // Cambia estilo de botones
        $('#btn_precoz').removeClass('btn-warning').addClass('btn-outline-warning');
        $('#btn_avanzado').removeClass('btn-outline-primary').addClass('btn-primary');
        
        // Limpia campos precoces
        $('#lcc').val('');
    }
}

// CARGA DE DATOS AUTOMÁTICA (PRECOZ)
function cargarPrecozNormal() {
    $('#saco_gestacional').val('Normoinserto');
    $('#saco_vitelino').val('Presente');
    $('#embrion_visualizado').val('Visualizado');
    $('#lcf').val('160');
    $('#movimientos').val('Presentes (Actividad Cardiaca +)');
    $('#ila').val('Normal');
    $('#conclusion').val('GESTACIÓN INTRAUTERINA EVOLUTIVA ACORDE A LCC.');
    $('#sugerencia').val('Control ecográfico en 4 semanas.');
}

// CARGA DE DATOS AUTOMÁTICA (AVANZADA)
function cargarAvanzadoNormal() {
    $('#situacion').val('Longitudinal');
    $('#presentacion').val('Cefalico');
    $('#dorso').val('Derecho');
    $('#lcf').val('145');
    $('#movimientos').val('Activos');
    $('#placenta_ub').val('Corporal Posterior');
    $('#placenta_grado').val('I');
    $('#ila').val('Volumen Normal (ILA Conservado)');
    $('#sexo').val('No Visible');
    $('#conclusion').val('GESTACIÓN ÚNICA ACTIVA.\nBIOMETRÍA Y BIENESTAR FETAL CONSERVADO.');
    $('#sugerencia').val('Control obstétrico habitual.');
}

// INICIALIZAR EN MODO AVANZADO POR DEFECTO
$(document).ready(function() {
    activarModo('avanzado');
});

// Función para calcular Peso Fetal (Hadlock 4)
function calcularPesoHadlock() {
    // 1. Obtenemos los valores en mm y los convertimos a cm (dividiendo entre 10)
    let dbp = parseFloat(document.getElementById('dpb').value) / 10 || 0;
    let cc = parseFloat(document.getElementById('cc').value) / 10 || 0;
    let ca = parseFloat(document.getElementById('ca').value) / 10 || 0;
    let lf = parseFloat(document.getElementById('lf').value) / 10 || 0;

    // 2. Validamos que tengamos las 4 medidas (Hadlock 4 requiere todas)
    if (dbp > 0 && cc > 0 && ca > 0 && lf > 0) {
        
        // 3. Aplicamos la fórmula logarítmica de Hadlock
        // Log10(Peso) = 1.3596 + (0.00061*DBP*CA) + (0.0424*CA) + (0.174*LF) + (0.0064*CC) - (0.00386*CA*LF)
        let logPeso = 1.3596 + 
                      (0.00061 * dbp * ca) + 
                      (0.0424 * ca) + 
                      (0.174 * lf) + 
                      (0.0064 * cc) - 
                      (0.00386 * ca * lf);

        // 4. Convertimos el logaritmo a peso real (10 elevado a logPeso)
        let peso = Math.pow(10, logPeso);

        // 5. Mostramos el resultado redondeado en el campo 'ponderado'
        document.getElementById('ponderado').value = Math.round(peso);
    } else {
        // Si faltan datos, limpiamos el campo
        document.getElementById('ponderado').value = ''; 
    }
}

// 6. Agregamos los "escuchadores" para que calcule solo al escribir
const inputsBiometria = ['dpb', 'cc', 'ca', 'lf'];
inputsBiometria.forEach(id => {
    let elemento = document.getElementById(id);
    if(elemento) {
        elemento.addEventListener('input', calcularPesoHadlock);
        elemento.addEventListener('change', calcularPesoHadlock);
    }
});