
    var table_lab =  $("#table-diagnosticos").DataTable({
        "lengthMenu": [5,10, 50, 100, 200],
        "language":{
          "processing": "Procesando",
          "search": "Buscar:",
          "lengthMenu": "Ver _MENU_  Diagnosticos",
          "info": "Mirando _START_ a _END_ de _TOTAL_ Diagnosticos",
          "zeroRecords": "No encontraron resultados",
          "paginate": {
            "first":      "Primera",
            "last":       "Ultima",
            "next":       "Siguiente",
            "previous":   "Anterior"
          }
        }
       });

       var table_procedi =  $("#table-procedimientos").DataTable({
        "lengthMenu": [5,10, 50, 100, 200],
        "language":{
          "processing": "Procesando",
          "search": "Buscar:",
          "lengthMenu": "Ver _MENU_  Procedimientos",
          "info": "Mirando _START_ a _END_ de _TOTAL_ Procedimientos",
          "zeroRecords": "No encontraron resultados",
          "paginate": {
            "first":      "Primera",
            "last":       "Ultima",
            "next":       "Siguiente",
            "previous":   "Anterior"
          }
        }
       });

       var table_procedi2 =  $("#table-procedimientos2").DataTable({
        "lengthMenu": [5,10, 50, 100, 200],
        "language":{
          "processing": "Procesando",
          "search": "Buscar:",
          "lengthMenu": "Ver _MENU_  Procedimientos",
          "info": "Mirando _START_ a _END_ de _TOTAL_ Procedimientos",
          "zeroRecords": "No encontraron resultados",
          "paginate": {
            "first":      "Primera",
            "last":       "Ultima",
            "next":       "Siguiente",
            "previous":   "Anterior"
          }
        }
       });
       
       
      
     var table_general =   $("#table-diagnosticos2").DataTable({
        "lengthMenu": [5,10, 50, 100, 200],
        "language":{
          "processing": "Procesando",
          "search": "Buscar:",
          "lengthMenu": "Ver _MENU_  Diagnosticos",
          "info": "Mirando _START_ a _END_ de _TOTAL_ Diagnosticos",
          "zeroRecords": "No encontraron resultados",
          "paginate": {
            "first":      "Primera",
            "last":       "Ultima",
            "next":       "Siguiente",
            "previous":   "Anterior"
          }
        }
       });

var table_lab_mini = $("#items-ginecologia-table").DataTable({
    "lengthMenu": [5, 50, 100, 200],
    "language": {
        "processing": "Procesando",
        "search": "Buscar:",
        "lengthMenu": "Ver _MENU_ Diagnosticos",
        "info": "Mirando _START_ a _END_ de _TOTAL_ Diagnosticos",
        "zeroRecords": "No encontraron resultados",
        "paginate": {
            "first": "Primera",
            "last": "Ultima",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
});

var table_lab_mini2 = $("#items-general-table").DataTable({
    "lengthMenu": [5, 50, 100, 200],
    "language": {
        "processing": "Procesando",
        "search": "Buscar:",
        "lengthMenu": "Ver _MENU_ Diagnosticos",
        "info": "Mirando _START_ a _END_ de _TOTAL_ Diagnosticos",
        "zeroRecords": "No encontraron resultados",
        "paginate": {
            "first": "Primera",
            "last": "Ultima",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
});

var table_lab_mini3 = $("#items-procedimientos-table").DataTable({
    "lengthMenu": [5, 50, 100, 200],
    "language": {
        "processing": "Procesando",
        "search": "Buscar:",
        "lengthMenu": "Ver _MENU_ Procedimientos",
        "info": "Mirando _START_ a _END_ de _TOTAL_ Procedimientos",
        "zeroRecords": "No encontraron resultados",
        "paginate": {
            "first": "Primera",
            "last": "Ultima",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
});

var table_lab_mini4 = $("#items-procedimientos2-table").DataTable({
    "lengthMenu": [5, 50, 100, 200],
    "language": {
        "processing": "Procesando",
        "search": "Buscar:",
        "lengthMenu": "Ver _MENU_ Procedimientos",
        "info": "Mirando _START_ a _END_ de _TOTAL_ Procedimientos",
        "zeroRecords": "No encontraron resultados",
        "paginate": {
            "first": "Primera",
            "last": "Ultima",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
});


    $("#table-medicamentos-farmacia").DataTable({
        "lengthMenu": [5,10, 50, 100, 200],
        "language":{
          "processing": "Procesando",
          "search": "Buscar:",
          "lengthMenu": "Ver _MENU_  Medicamentos",
          "info": "Mirando _START_ a _END_ de _TOTAL_ Medicamentos",
          "zeroRecords": "No encontraron resultados",
          "paginate": {
            "first":      "Primera",
            "last":       "Ultima",
            "next":       "Siguiente",
            "previous":   "Anterior"
          }
        }
    });

// Variables para almacenar los análisis seleccionados y filas ocultas
var elementos_laboratorio = [];
var filasOcultas = {}; // Almacenar referencias a filas ocultas

// Función para manejar la selección de análisis de laboratorio
$('#table-laboratorio').on('dblclick', 'tr:visible', function() {
    var row = $(this);
    var data = [];
    
    // Obtener los datos de la fila
    row.find('td').each(function(i) {
        data[i] = $(this).text().trim();
    });
    
    // Verificar si el análisis ya está seleccionado
    var existe = elementos_laboratorio.some(function(item) {
        return item[0] === data[0]; // Comparar por ID o código
    });
    
    if (!existe) {
        // Agregar a la lista de seleccionados
        elementos_laboratorio.push(data);
        
        // Agregar a la tabla de seleccionados
        var table = $('#table-laboratorio-items').DataTable();
        var rowNode = table.row.add([
            data[0], // Código
            data[1]  // Nombre del análisis
        ]).draw(false).node();
        
        // Aplicar estilos consistentes a la fila (se heredan de la tabla padre)
        $(rowNode).find('td').addClass('text-xs');
        
        // Ocultar la fila en la tabla de origen y guardar referencia
        row.hide();
        filasOcultas[data[0]] = row;
    }
});

// Función para eliminar un análisis seleccionado
function eliminarAnalisis(elemento) {
    var row = $(elemento).closest('tr');
    var table = $('#table-laboratorio-items').DataTable();
    var rowData = table.row(row).data();
    
    if (rowData) {
        // Mostrar la fila en la tabla de origen
        var codigo = rowData[0];
        if (filasOcultas[codigo]) {
            filasOcultas[codigo].show();
            delete filasOcultas[codigo];
        }
        
        // Eliminar de la lista de seleccionados
        elementos_laboratorio = elementos_laboratorio.filter(function(item) {
            return item[0] !== codigo;
        });
        
        // Eliminar de la tabla de seleccionados
        table.row(row).remove().draw(false);
    }
}

// Manejar doble clic en la fila de la tabla de seleccionados
$('#table-laboratorio-items').on('dblclick', 'tr', function() {
    eliminarAnalisis(this);
});

// Función para guardar la orden de laboratorio
function crearOrdenLaboratorioHistoria() {
    if (elementos_laboratorio.length === 0) {
        $("body").overhang({
            type: "warn",
            message: "Debe seleccionar al menos un análisis"
        });
        return;
    }
    
    var url = baseurl + "administracion/crearOrdenLaboratorio";
    var documento = $("#documento_historia").val(),
    nombre = $("#nombre_paciente").val(),
    edad = $("#edad_paciente").val(),
    medico = $("#medico_solicitante").val(),
    triage = $("#consecutivo_historia").val(),
    ordenlab = [];
    for (let i = 0; i < elementos_laboratorio.length; i++) {
      ordenlab [i] = elementos_laboratorio[i][0];
    }
    $.ajax({
        url: url,
        method: "POST",
        data: {
          documento: documento,
          nombre: nombre,
          edad: edad,
          medico: medico,
          triage: triage,
          ordenlab: ordenlab
        },
        success: function(response) {
            $("body").overhang({
                type: "success",
                message: "Orden de laboratorio guardada correctamente"
            });
            setTimeout(reloadPage, 3000);
        },
        error: function() {
            $("body").overhang({
                type: "error",
                message: "Error al guardar la orden de laboratorio"
            });
        }
    });
}

$("#crear_receta").on("click", function () {
    var url3 = baseurl + "administracion/crearreceta",
        paciente = $("#paciente").val(),
        fecha = $("#fecha").val(),
        medicina = $("#medicina").val(),
        receta = $("#receta").val();

        $.ajax({
            url: url3,
            method: "POST",
            data: { paciente: paciente, fecha: fecha, medicina: medicina, receta: receta },
            success: function () {
              $("body").overhang({
                type: "success",
                message: "Historia se ha registrado correctamente"
            });
            setTimeout(reloadPage, 3000);
            },
            error: function () {
                $("body").overhang({
                  type: "error",
                  message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
                }); 
              }
        })

});
var elemntos_ginecologia = new Array();
$('#table-diagnosticos').on('dblclick', 'tr', function(e) {
    elem_lab = new Array();
    elem_lab = table_lab.row(this).data();
    elemntos_ginecologia.push(elem_lab);
    table_lab.row(this).remove()
    table_lab_mini.row.add(elem_lab).draw(false);

    total_ = 0;
    for (let i = 0; i < elemntos_ginecologia.length; i++) {
        total_ += elemntos_ginecologia[i][2] * 1;
    }
    $("#total").val((total_).toFixed(2));
    table_lab.draw(false);
});

$('#items-ginecologia-table').on('dblclick', 'tr', function(e) {
    elem_lab = new Array();
    elem_lab = table_lab_mini.row(this).data();
    table_lab_mini.row(this).remove()
    table_lab.row.add(elem_lab).draw(false);

    for (let i = 0; i < elemntos_ginecologia.length; i++) {
        if (elemntos_ginecologia[i][0] == elem_lab[0]) {
            elemntos_ginecologia.splice(i, 1);
            i = elemntos_ginecologia.length;
        }
    }
    total_ = 0;
    for (let i = 0; i < elemntos_ginecologia.length; i++) {
        total_ += elemntos_ginecologia[i][2] * 1;
    }
    $("#total").val((total_).toFixed(2));
    table_lab_mini.draw(false);
});

$("#btn-gineco").on("click", function(){
    
    var url1 = baseurl + "administracion/crearhistoriaginecologia",
        dni = $("#documento_historia").val(),
        doctorid = $("#doctorid1").val(),
        triaje = $("#consecutivo_historia").val(),
        // 
        familiares = $("#antecedentes_familiares").val(),
        patologicos = $("#antecedentes_patologicos").val(),
        gine_obste = $("#antecedentes_gineco").val(),
        fum = $("#antecedentes_fum").val(),
        rm = $("#antecedentes_rm").val(),
        flujo_genital = $("#antecedentes_flujo").val(),
        parejas = $("#antecedentes_parejas").val(),
        gestas = $("#antecedentes_gestas").val(),
        partos = $("#antecedentes_partos").val(),
        abortos = $("#antecedentes_abortos").val(),
        anticonceptivos = $("#antecedentes_anticonceptivos").val(),
        tipo = $("#antecedentes_tipos").val(),
        tiempo = $("#antecedentes_tiempo").val(),
        cirugia_ginecologica = $("#antecedentes_cirugia").val(),
        otros = $("#antecedentes_otros").val(),
        pap = $("#antecedentes_fecha").val(),
        hijos = $("#antecedentes_hijos").val(),
        // 
        motivo_consulta = $("#consulta_motivo").val(),
        signos_sintomas = $("#consulta_sintomas").val(),
        // 
        piel_tscs = $("#examen_piel").val(),
        tiroides = $("#examen_tiroides").val(),
        mamas = $("#examen_mamas").val(),
        a_respiratorio = $("#examen_respiratorio").val(),
        a_cardiovascular = $("#examen_cardiovascular").val(),
        abdomen = $("#examen_abdomen").val(),
        genito = $("#examen_genito").val(),
        tacto = $("#examen_tacto").val(),
        locomotor = $("#examen_locomotor").val(),
        sistema_nervioso = $("#examen_sistema").val(),
        // 
        exa_auxiliares = $("#exa_auxiliares1").val(),
        tratamientos_gine = $("#tratamientos_gine").val(),
        plan_trabajo = $("#plan_trabajo1").val(),
        proxima_cita = $("#proxima_cita1").val(),
        firma_medico = $("#firma_medico1").val();

        let diagnosticosginecologia = [];

        for (let i = 0; i < elementos_general.length; i++) {
            diagnosticosginecologia [i] = elementos_general[i][0];
        }
        
        $.ajax({
            url : url1,
            method: "POST",
            data: {
                dni: dni,
                doctorid: doctorid,
                triaje: triaje,
                familiares: familiares,
                patologicos: patologicos,
                gine_obste: gine_obste,
                fum: fum,
                rm: rm,
                flujo_genital: flujo_genital,
                parejas: parejas,
                gestas: gestas,
                partos: partos,
                abortos: abortos,
                anticonceptivos: anticonceptivos,
                tipo: tipo,
                tiempo: tiempo,
                cirugia_ginecologica: cirugia_ginecologica,
                otros: otros,
                pap: pap,
                hijos: hijos,
                motivo_consulta: motivo_consulta,
                signos_sintomas: signos_sintomas,
                piel_tscs: piel_tscs,
                tiroides: tiroides,
                mamas: mamas,
                a_respiratorio: a_respiratorio,
                a_cardiovascular: a_cardiovascular,
                abdomen: abdomen,
                genito: genito,
                tacto: tacto,
                locomotor: locomotor,
                sistema_nervioso: sistema_nervioso,
                exa_auxiliares: exa_auxiliares,
                diagnosticosginecologia: diagnosticosginecologia,
                plan_trabajo: plan_trabajo,
                proxima_cita: proxima_cita,
                firma_medico: firma_medico,
                tratamientos_gine: tratamientos_gine
             },
             success: function () {
                $("body").overhang({
                    type: "success",
                    message: "Historia se ha registrado correctamente"
                });
                setTimeout(reloadPage, 3000);
             },
             error: function () {
                $("body").overhang({
                  type: "error",
                  message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
                }); 
              }
        });
})

var elementos_general = new Array();
$('#table-diagnosticos2').on('dblclick', 'tr', function(e) {
    elem_lab = new Array();
    elem_lab = table_general.row(this).data();
    elementos_general.push(elem_lab);
    table_general.row(this).remove()
    table_lab_mini2.row.add(elem_lab).draw(false);

    total_ = 0;
    for (let i = 0; i < elementos_general.length; i++) {
        total_ += elementos_general[i][2] * 1;
    }
    $("#total").val((total_).toFixed(2));
    table_general.draw(false);
});

$('#items-general-table').on('dblclick', 'tr', function(e) {
    elem_lab = new Array();
    elem_lab = table_lab_mini2.row(this).data();
    table_lab_mini2.row(this).remove()
    table_general.row.add(elem_lab).draw(false);

    for (let i = 0; i < elementos_general.length; i++) {
        if (elementos_general[i][0] == elem_lab[0]) {
            elementos_general.splice(i, 1);
            i = elementos_general.length;
        }
    }
    total_ = 0;
    for (let i = 0; i < elementos_general.length; i++) {
        total_ += elementos_general[i][2] * 1;
    }
    $("#total").val((total_).toFixed(2));
    table_lab_mini2.draw(false);
});

var elementos_procedimientos = new Array();
$('#table-procedimientos').on('dblclick', 'tr', function(e) {
    elem_lab = new Array();
    elem_lab = table_procedi.row(this).data();
    elementos_procedimientos.push(elem_lab);
    table_procedi.row(this).remove()
    table_lab_mini3.row.add(elem_lab).draw(false);

    total_ = 0;
    for (let i = 0; i < elementos_procedimientos.length; i++) {
        total_ += elementos_procedimientos[i][2] * 1;
    }
    $("#total").val((total_).toFixed(2));
    table_procedi.draw(false);
});

$('#items-procedimientos-table').on('dblclick', 'tr', function(e) {
    elem_lab = new Array();
    elem_lab = table_lab_mini3.row(this).data();
    table_lab_mini3.row(this).remove()
    table_procedi.row.add(elem_lab).draw(false);

    for (let i = 0; i < elementos_procedimientos.length; i++) {
        if (elementos_procedimientos[i][0] == elem_lab[0]) {
            elementos_procedimientos.splice(i, 1);
            i = elementos_procedimientos.length;
        }
    }
    total_ = 0;
    for (let i = 0; i < elementos_procedimientos.length; i++) {
        total_ += elementos_procedimientos[i][2] * 1;
    }
    $("#total").val((total_).toFixed(2));
    table_lab_mini3.draw(false);
});
var elementos_procedimientos2 = new Array();
$('#table-procedimientos2').on('dblclick', 'tr', function(e) {
    elem_lab = new Array();
    elem_lab = table_procedi2.row(this).data();
    elementos_procedimientos2.push(elem_lab);
    table_procedi2.row(this).remove()
    table_lab_mini4.row.add(elem_lab).draw(false);

    total_ = 0;
    for (let i = 0; i < elementos_procedimientos2.length; i++) {
        total_ += elementos_procedimientos2[i][2] * 1;
    }
    $("#total").val((total_).toFixed(2));
    table_procedi2.draw(false);
});

$('#items-procedimientos2-table').on('dblclick', 'tr', function(e) {
    elem_lab = new Array();
    elem_lab = table_lab_mini4.row(this).data();
    table_lab_mini4.row(this).remove()
    table_procedi2.row.add(elem_lab).draw(false);

    for (let i = 0; i < elementos_procedimientos2.length; i++) {
        if (elementos_procedimientos2[i][0] == elem_lab[0]) {
            elementos_procedimientos2.splice(i, 1);
            i = elementos_procedimientos2.length;
        }
    }
    total_ = 0;
    for (let i = 0; i < elementos_procedimientos2.length; i++) {
        total_ += elementos_procedimientos2[i][2] * 1;
    }
    $("#total").val((total_).toFixed(2));
    table_lab_mini4.draw(false);
});

$("#btn-general").on("click", function (){
    var url2 = baseurl + "administracion/crearhistoriageneral",
    dni = $("#documento_historia").val(),
    doctorid = $("#doctorid1").val(),
    triaje = $("#consecutivo_historia").val(),
    // 
    anamnesis = $("#anamnesis_directa").val(),
    empresa = $("#anamnesis_empresa").val(),
    compania = $("#anamnesis_compañia").val(),
    iafa = $("#anamnesis_iafa").val(),
    acompanante = $("#anamnesis_acompanante").val(),
    dni3 = $("#anamnesis_dni").val(),
    celular = $("#anamnesis_celular").val(),
    motivo_consulta = $("#anamnesis_consulta").val(),
    tratamiento_anterior = $("#anamnesis_tratamiento").val(),
    enfermedad_actual = $("#anamnesis_enfermedad").val(),
    tp_enfermedad = $("#anamnesis_tiempo").val(),
    inicio = $("#anamnesis_inicio").val(),
    curso = $("#anamnesis_curso").val(),
    sintomas = $("#anamnesis_sintomas").val(),
    // 
    cuello = $("#fisico_cuello").val(),
    abdomen = $("#fisico_abdomen").val(),
    ap_respiratorio = $("#fisico_respiratorio").val(),
    ap_cardio = $("#fisico_cardio").val(),
    sistema_nervioso = $("#fisico_sistema").val(),
    cabeza = $("#fisico_cabeza").val(),
    locomotor = $("#fisico_locomotor").val(),
    apetito = $("#fisico_apetito").val(),
    sed = $("#fisico_sed").val(),
    orina = $("#fisico_orina").val(),
    
    ap_genito = $("#ap_genito2").val(),
    // 
    examendx = $("#plan_examen").val(),
    procedimientos = $("#plan_procedimiento").val(),
    interconsultas = $("#plan_interconsulta").val(),
    tratamiento = $("#plan_tratamiento").val(),
    referencia = $("#plan_referencia").val(),
    firma = $("#plan_firma").val();

    let diagnosticosgeneral = [];
    for (let i = 0; i < elementos_general.length; i++) {
        diagnosticosgeneral [i] = elementos_general[i][0];
    }

    $.ajax({
        url: url2,
        method: "POST",
        data: {
            dni: dni,
            doctorid: doctorid,
            triaje: triaje,
            anamnesis: anamnesis,
            empresa: empresa,
            compania: compania,
            iafa: iafa,
            acompanante: acompanante,
            dni3: dni3,
            celular: celular,
            motivo_consulta: motivo_consulta,
            tratamiento_anterior: tratamiento_anterior,
            enfermedad_actual: enfermedad_actual,
            tp_enfermedad: tp_enfermedad,
            inicio: inicio,
            curso: curso,
            sintomas: sintomas,
            cabeza: cabeza,
            cuello: cuello,
            ap_respiratorio: ap_respiratorio,
            ap_cardio: ap_cardio,
            abdomen: abdomen,
            ap_genito: ap_genito,
            locomotor: locomotor,
            sistema_nervioso: sistema_nervioso,
            apetito: apetito,
            sed: sed,
            orina: orina,
            diagnosticosgeneral: diagnosticosgeneral,
            examendx: examendx,
            procedimientos: procedimientos,
            interconsultas: interconsultas,
            tratamiento: tratamiento,
            referencia: referencia,
            firma: firma
        },
        success: function () {
            $("body").overhang({
                type: "success",
                message: "Historia se ha registrado correctamente"
            });
            setTimeout(reloadPage, 3000);
        },
        error: function () {
            $("body").overhang({
              type: "error",
              message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
            }); 
          }
    })
});

$("#ecografias").on("change", function() {
    if($("#ecografias").val() == "mama") {
        $("#ecografiamama").modal("show");
    }
    else if ($("#ecografias").val() == "transvaginal") {
        $("#ecografiatransvaginal").modal("show");
    }
    else if ($("#ecografias").val() == "pelvica") {
        $("#ecografiapelvica").modal("show");
    }
    else if ($("#ecografias").val() == "morfologica") {
        $("#ecografiamorfologica").modal("show");
    }
    else if ($("#ecografias").val() == "genetica") {
        $("#ecografiagenetica").modal("show");
    }
    else if ($("#ecografias").val() == "obstetrica") {
        $("#ecografiaobstetrica").modal("show");
    } 
});

$(document).ready(function (){
    const pathname = window.location.pathname;  // Obtiene la ruta de la URL actual
    const parts = pathname.split('/');  // Divide la ruta
    const id = parts[parts.length - 1];  // Extrae el último valor, que es el ID
    
    var url1 = baseurl + "administracion/triajehistorias",
       documento = id;

   $.ajax( {
      url: url1,
      method: "POST",
      data: { documento: documento  },
      success: function (data) {
        data = JSON.parse(data);
        console.log(data);
        document.getElementById('estatura').innerHTML = '<span class="small">' + data.talla + ' Cm</span>';
        document.getElementById('cardiaca').innerHTML = '<span class="small">' + data.presion_arterial + ' mmHg</span>';
        document.getElementById('peso').innerHTML = '<span class="small">' + data.peso + ' Kg</span>';
        document.getElementById('imc').innerHTML = '<span class="small">' + data.imc + ' IMC</span>';
        document.getElementById('respiratoria').innerHTML = '<span class="small">' + data.frecuencia_respiratoria + ' r/m</span>';
        document.getElementById('temperatura').innerHTML = '<span class="small">' + data.temperatura + ' °C</span>';
        
        // Calcular porcentaje de grasa (fórmula de Deurenberg)
        if(data.edad && data.sexo) {
            const edad = parseInt(data.edad);
            const genero = data.sexo.toLowerCase();
            // Fórmula: (1.20 × IMC) + (0.23 × edad) - (10.8 × sexo) - 5.4
            // Donde sexo es 1 para masculino y 0 para femenino
            const factorGenero = (genero === 'masculino' || genero === 'm') ? 1 : 0;
            const porcentajeGrasa = ((1.20 * parseFloat(data.imc)) + (0.23 * edad) - (10.8 * factorGenero) - 5.4).toFixed(1);
            document.getElementById('grasa').innerHTML = '<span class="small">' + porcentajeGrasa + ' %</span>';
        }
        
        $("#documento_historia").val(data.documento);
        $("#consecutivo_historia").val(data.codigo_triaje);

        // DATOS PARA LA CITAS
        $("#medico").val(data.codigo_doctor);
        $("#dni").val(data.documento);
        $("#nombre").val(data.apellido + ' ' + data.paciente);
        $("#telefono").val(data.telefono);
      }
   });
})

$("#tphistoria").on("change", function() {
  let tphistoria = $("#tphistoria").val();

  if(tphistoria == 1) {

    $("#nav-antecedentesgine-tab").prop("hidden", true);
    $("#nav-fisicogine-tab").prop("hidden", true);
    $("#nav-consultagine-tab").prop("hidden", true);

    $("#nav-home-tab").prop("hidden", false);
    $("#nav-profile-tab").prop("hidden", false);
    $("#nav-contact-tab").prop("hidden", false);

    $("#btn-gineco").prop("hidden", true);
    $("#btn-general").prop("hidden", false);
    
  }
  else if(tphistoria == 2) {

    $("#nav-home-tab").prop("hidden", true);
    $("#nav-profile-tab").prop("hidden", true);
    $("#nav-contact-tab").prop("hidden", true);

    $("#nav-antecedentesgine-tab").prop("hidden", false);
    $("#nav-fisicogine-tab").prop("hidden", false);
    $("#nav-consultagine-tab").prop("hidden", false);

    $("#btn-general").prop("hidden", true);
    $("#btn-gineco").prop("hidden", false);

  }
  else {
    $("#nav-home-tab").prop("hidden", true);
    $("#nav-profile-tab").prop("hidden", true);
    $("#nav-contact-tab").prop("hidden", true);

    $("#nav-antecedentesgine-tab").prop("hidden", true);
    $("#nav-fisicogine-tab").prop("hidden", true);
    $("#nav-consultagine-tab").prop("hidden", true);

    $("#btn-general").prop("hidden", true);
    $("#btn-gineco").prop("hidden", true);
    
  }
});

function crearAlergias() {
  var url = baseurl + "administracion/crearalergias",
      dni_paciente = $("#documento_historia").val(),
      tpalergia = $("#tpalergia").val(),
      descripcion_alergia = $("#descripcion_alergia").val();
      
   $.ajax({
     url: url,
     method: "POST",
     data: {
       dni_paciente: dni_paciente,
       tipo_alergia: tpalergia,
       descripcion: descripcion_alergia
     },
     success: function() {
       $("body").overhang({
          type: "success",
          message: "La alergia se ha registrado correctamente"
       });
       setTimeout(reloadPage, 3000);
     },
     error: function() {
       $("body").overhang({
          type: "error",
          message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
       }); 
     }
   });
}

function crearMedicamento() {
    var url = baseurl + "administracion/crearmedicamento",
    triaje = $("#consecutivo_historia").val();
    doctor = $("#documento_historia").val(),
    paciente = $("#documento_historia").val(),
    medicamento = $("#medicamento_medicamento").val(),
    cantidad = $("#cantidad_medicamento").val(),
    dosis = $("#dosis_medicamento").val(),
    via_aplicacion = $("#via_aplicacion_medicamento").val(),
    frecuencia = $("#frecuencia_medicamento").val(),
    duracion = $("#duracion_medicamento").val();
    
 $.ajax({
   url: url,
   method: "POST",
   data: {
     triaje: triaje,
     doctor: doctor,
     paciente: paciente,
     medicamento: medicamento,
     cantidad: cantidad,
     dosis: dosis,
     via_aplicacion: via_aplicacion,
     frecuencia: frecuencia,
     duracion: duracion
   },
   success: function() {
     $("body").overhang({
        type: "success",
        message: "El medicamento se ha registrado correctamente"
     });
      $("#medicamento_medicamento").val(''),
      $("#cantidad_medicamento").val(''),
      $("#dosis_medicamento").val(''),
      $("#via_aplicacion_medicamento").val(''),
      $("#frecuencia_medicamento").val(''),
      $("#duracion_medicamento").val('');
    //  setTimeout(reloadPage, 3000);
   },
   error: function() {
     $("body").overhang({
        type: "error",
        message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
     }); 
   }
 });
}

function crearCita() {
  var url1 = baseurl + "administracion/crearcita",
      dni = $("#dni").val(),
      nombre = $("#nombre").val(),
      telefono = $("#telefono").val(),
      medico = $("#medico").val(),
      fecha = $("#fecha").val(),
      hora = "00:00",
      estado = $("#estado").val(),
      observaciones = $("#observaciones").val();

      $.ajax({

		url: url1,
		method: "POST",
		data: {
		  dni: dni,
		  nombre: nombre,
		  telefono: telefono,
		  medico: medico,
		  fecha: fecha,
		  hora: hora,
		  estado: estado,
		  observaciones: observaciones,
		},

		success: function () {

			$("body").overhang({
				type: "success",
				message: "Listo",
			});
			setTimeout(reloadPage, 3000);
		},
		error: function () {

			$("body").overhang({
				type: "warning",
				message: "No se realizo la operacion.",
			});
		},

	});
}

function descargarHistoriaGeneral(triage) {
  const pathname = window.location.pathname;  // Obtiene la ruta de la URL actual
  const parts = pathname.split('/');  // Divide la ruta
  const id = parts[parts.length - 1];  // Extrae el último valor, que es el ID

  let url = baseurl + "administracion/pdfhistoriaclinica/" + triage + "/" + id;
  window.open(url, "_blank", " width=1100, height=1000");   
}

function descargarHistoriaGineco(triage) {

  const pathname = window.location.pathname;  // Obtiene la ruta de la URL actual
  const parts = pathname.split('/');  // Divide la ruta
  const id = parts[parts.length - 1];  // Extrae el último valor, que es el ID

  let url = baseurl + "administracion/pdfhistoriaclinicaginecologica/" + triage + "/" + id;
  window.open(url, "_blank", " width=1100, height=1000");  
}

//ACA CREAR LAS DOS FUNCIONES QUE VAN HACER LOS INSERT

function crearOrdenPatologica() {
var url = baseurl + "administracion/crearpatologia",
nombre = $("#nombre_paciente").val(),
        edad = $("#edad_paciente").val(),
        documento = $("#documento_historia").val(),
        triage = $("#consecutivo_historia").val(),
        sexo = $("input[name='sexo']:checked").val(),
        medico = $("#medico_solicitante").val(),
        muestra = $("input[name='muestra']:checked").val(),
        paridad = $("#paridad_paciente").val(),
        fur = $("#fur_paciente").val(),
        fup = $("#fup_paciente").val(),
        lactancia = $("input[name='lact']:checked").val(),
        antecedentes = $("#antecedentes_paciente").val(),
        resultados = $("#resultados_anteriores").val(),
        hallazgos = $("#otros_hallazgos").val(),
        datos = $("#datos_clinicos").val(),
        diagnostico = $("#diagnostico_patologia").val(),
        fecha = $("#fechaActual").val();

    $.ajax({
        url: url,
        method: "POST",
        data: {
            nombre: nombre,
            documento: documento,
            triage: triage,
            edad: edad,
            sexo: sexo,
            medico: medico,
            muestra: muestra,
            paridad: paridad,
            fur: fur,
            fup: fup,
            lactancia: lactancia,
            antecedentes: antecedentes,
            resultados: resultados,
            hallazgos: hallazgos,
            datos: datos,
            diagnostico: diagnostico,
            fecha: fecha
        },
        success: function() {
            $("body").overhang({
                type: "success",
                message: "La orden patológica se ha registrado correctamente"
            });
            setTimeout(reloadPage, 3000);
        },
        error: function() {
            $("body").overhang({
                type: "error",
                message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
            }); 
        }
    });
}

const reloadPage = () => {
    location.reload();
}

// Manejador para el formulario de subida de documentos
$('#form-subir-documento').on('submit', function(e) {
    e.preventDefault(); // Prevenir el envío normal del formulario
    
    // Mostrar un indicador de carga
    const submitBtn = $(this).find('input[type="submit"]');
    const originalBtnText = submitBtn.val();
    submitBtn.prop('disabled', true).val('Subiendo...');
    
    // Crear un FormData para el envío del formulario
    const formData = new FormData(this);
    
    // Enviar el formulario vía AJAX
    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Mostrar notificación de éxito con overhang
            $("body").overhang({
                type: "success",
                message: response.alerta || "Archivo subido correctamente"
            });
            
            // Recargar la página después de 2 segundos
            setTimeout(function() {
                location.reload();
            }, 2000);
        },
        error: function(xhr, status, error) {
            // Mostrar notificación de error con overhang
            var errorMessage = 'Error al subir el documento: ' + 
                             (xhr.responseJSON?.message || error || 'Error desconocido');
            
            $("body").overhang({
                type: "error",
                message: errorMessage
            });
            
            // Habilitar el botón de nuevo
            submitBtn.prop('disabled', false).val(originalBtnText);
        }
    });
});

function asociarmedicamentoFarmacia(nombre) {
  $("#medicamento_medicamento").val(nombre);
}

function CancelarMedicamento() {
  $("#medicamento_medicamento").val('');
}

function borrarDocumento(codigo,tipoarchivo,archivo) {
$("body").overhang({
  type: "confirm",
  primary: "#40D47E",
  accent: "#27AE60",
  yesColor: "#3498DB",
  message: "Desea eliminar el archivo por completo?",
  overlay: true,
  callback: function (value) {
    if (value) {
      let url =  baseurl + "administracion/eliminararchivo";
      $.ajax({
        url: url,
        method: "POST",
        data: {
         codigo: codigo,
         tipoarchivo: tipoarchivo,
         archivo: archivo,
        },
        success: function(response) {
          $("body").overhang({
            type: "success",
            message: "Archivo eliminado correctamente"
          });
          setTimeout(reloadPage, 3000);
        },
      });

    } else {
    }
  }
});
}

