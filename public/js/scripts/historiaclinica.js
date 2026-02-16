
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
    $('#saveBtn').addClass('visible');
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

        if(elementos_laboratorio.length === 0 ) {
          $('#saveBtn').addClass('visible');
        }
    }
}

// Manejar doble clic en la fila de la tabla de seleccionados
$('#table-laboratorio-items').on('dblclick', 'tr', function() {
    eliminarAnalisis(this);
});

// Función para guardar la orden de laboratorio
function crearOrdenLaboratorioHistoria() {
    
    var url = baseurl + "administracion/crearOrdenLaboratorio";
    var documento = $("#documento_historia").val(),
        nombre = $("#nombre_paciente").val(),
        edad = $("#edad_paciente").val(),
        medico = $("#medico_solicitante").val(),
        triage = $("#consecutivo_historia").val(),
        ordenlab = [];
    
    // Recorrer los elementos del laboratorio seleccionados
    for (let i = 0; i < elementos_laboratorio.length; i++) {
       ordenlab.push(elementos_laboratorio[i].id);
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
            // $("body").overhang({
            //     type: "success",
            //     message: "Orden de laboratorio guardada correctamente"
            // });
            // setTimeout(reloadPage, 3000);
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

var elementos_general = new Array();
$('#table-diagnosticos2').on('dblclick', 'tr', function(e) {
    elem_lab = new Array();
    elem_lab = table_general.row(this).data();
    table_general.row(this).remove();
    // table_lab_mini2.row.add(elem_lab).draw(false);
    
    $("#diagnostico_id").val(elem_lab[0]);
    $("#diagnostico_codigo").val(elem_lab[1]);
    $("#diagnostico_nombre").val(elem_lab[2]);
    
    total_ = 0;
    for (let i = 0; i < elementos_general.length; i++) {
        total_ += elementos_general[i][2] * 1;
    }
    $("#total").val((total_).toFixed(2));
    table_general.draw(false);
});

$("#agregar_diagnostico").on("click", function() {
    elem_lab = [$("#diagnostico_id").val(), $("#diagnostico_codigo").val(), $("#diagnostico_nombre").val(), $("#diagnostico_tipo").val()];  
    elementos_general.push(elem_lab);
    table_general.row(this).remove();
    table_lab_mini2.row.add(elem_lab).draw(false);

    total_ = 0;
    for (let i = 0; i < elementos_general.length; i++) {
        total_ += elementos_general[i][2] * 1;
    }
    $("#total").val((total_).toFixed(2));
    table_general.draw(false);
    
    $("#diagnostico_id").val("");
    $("#diagnostico_codigo").val("");
    $("#diagnostico_nombre").val("");
    $("#diagnostico_tipo").val("");
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

$("#btn-limpiar-diagnosticos").on("click", function() {
    elementos_general = [];
    table_lab_mini2.clear().draw();
    $("#total").val("0.00");
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
var selected_procedimiento_row = null;

$('#table-procedimientos2').on('dblclick', 'tr', function(e) {
    elem_lab = new Array();
    elem_lab = table_procedi2.row(this).data();
    $("#procedimiento_codigo").val(elem_lab[0]);
    $("#procedimiento_nombre").val(elem_lab[1]);
    $("#procedimiento_plantilla").val(elem_lab[2]);
    selected_procedimiento_row = table_procedi2.row(this);
});

$("#agregar_procedimiento").on("click", function() {
    var codigo = $("#procedimiento_codigo").val();
    var nombre = $("#procedimiento_nombre").val();
    var plantilla = $("#procedimiento_plantilla").val();

    if(codigo == "") {
         return; 
    }

    var elem_lab = [codigo, nombre, plantilla];
    elementos_procedimientos2.push(elem_lab);
    
    table_lab_mini4.row.add(elem_lab).draw(false);
    
    if(selected_procedimiento_row) {
        selected_procedimiento_row.remove().draw(false);
        selected_procedimiento_row = null;
    }
    
    $("#procedimiento_codigo").val("");
    $("#procedimiento_nombre").val("");
    $("#procedimiento_plantilla").val("");

    $('#saveBtn').addClass('visible');
});

$('#items-procedimientos2-table').on('dblclick', 'tr', function(e) {
    elem_lab = new Array();
    elem_lab = table_lab_mini4.row(this).data();
    table_lab_mini4.row(this).remove().draw(false);
    table_procedi2.row.add(elem_lab).draw(false);

    for (let i = 0; i < elementos_procedimientos2.length; i++) {
        if (elementos_procedimientos2[i][0] == elem_lab[0]) {
            elementos_procedimientos2.splice(i, 1);
            break;
        }
    }
    if(elementos_procedimientos2.length === 0) {
        $('#saveBtn').addClass('visible');
    }
});

$("#btn-limpiar-procedimientos").on("click", function() {
    elementos_procedimientos2 = [];
    table_lab_mini4.clear().draw();
});

$("#saveBtn").on("click", function (){
    var tipo_historia = $("#tphistoria").val();

    if(tipo_historia == 1) {
      var url2 = baseurl + "administracion/crearhistoriageneral",
      dni = $("#documento_historia").val(),
      doctorid = $("#doctorid1").val(),
      triaje = $("#consecutivo_historia").val(),
      // 
      anamnesis = $("#anamnesis_directa").val(),
      empresa = $("#anamnesis_empresa").val(),
      compania = $("#anamnesis_compania").val(),
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
      piel = $("#fisico_piel").val();

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
          examendx: examendx,
          interconsultas: interconsultas,
          tratamiento: tratamiento,
          referencia: referencia,
          firma: firma,
          procedimientoss: procedimientos,
          piel: piel
        },
        success: function () {
            //Diagnosticos
            if(elementos_general.length > 0) {
              crearDiagnosticos('1');
            }
            //examenes auxiliares
              //LABORATORIO
              if (elementos_laboratorio.length > 0) {
                crearOrdenLaboratorioHistoria();
              }
              //ordenpatologica
              if($('input[name="muestra"]:checked').length > 0) {
                crearOrdenPatologica();
              }
              //orden ecografia
              if(elementos_eco.length > 0) {
                crearOrdenEcografiaHistoria('1');
              }
              //orden de tomografia
              if(elementos_tomo.length > 0) {
                crearOrdenTomografia('1');
              }
              //orden de resonancia
              if(elementos_reso.length > 0) {
                crearOrdenResonancia('1');
              }

            //procedimientos
            if(elementos_procedimientos2.length > 0) {
              crearProcedimientos('1');
            }
            //cierre de atencion
            if(fecha_cita = $("#fecha_cita").val() != "") {
              crearCita();
            }
            $("body").overhang({
                type: "success",
                message: "Historia se ha registrado correctamente"
            });
            $('#saveBtn').removeClass('visible');
        },
        error: function () {
            $("body").overhang({
              type: "error",
              message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
            }); 
          }
    });
    }
    else if(tipo_historia == 2) {
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
                plan_trabajo: plan_trabajo,
                proxima_cita: proxima_cita,
                firma_medico: firma_medico,
                tratamientos_gine: tratamientos_gine
             },
             success: function () {
                //Diagnosticos
            if(elementos_general.length > 0) {
              crearDiagnosticos('2');
            }
            //examenes auxiliares
              //LABORATORIO
              if (elementos_laboratorio.length > 0) {
                crearOrdenLaboratorioHistoria();
              }
              //ordenpatologica
              if($('input[name="muestra"]:checked').length > 0) {
                crearOrdenPatologica();
              }
              //orden ecografia
              if(elementos_eco.length > 0) {
                crearOrdenEcografiaHistoria('2');
              }
              //orden de tomografia
              if(elementos_tomo.length > 0) {
                crearOrdenTomografia('2');
              }
              //orden de resonancia
              if(elementos_reso.length > 0) {
                crearOrdenResonancia('2');
              }

            //procedimientos
            if(elementos_procedimientos2.length > 0) {
              crearProcedimientos('2');
            }
            //cierre de atencion
            if(fecha_cita = $("#fecha_cita").val() != "") {
              crearCita();
            }
            $("body").overhang({
                type: "success",
                message: "Historia se ha registrado correctamente"
            });
            $('#saveBtn').removeClass('visible');
             },
             error: function () {
                $("body").overhang({
                  type: "error",
                  message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
                }); 
              }
        });
    }
    
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
        document.getElementById('estatura').innerHTML = '<span class="small">' + data.talla + ' cm</span>';
        document.getElementById('cardiaca').innerHTML = '<span class="small">' + data.frecuencia_cardiaca + ' lpm</span>';
        document.getElementById('peso').innerHTML = '<span class="small">' + data.peso + ' kg</span>';
        document.getElementById('imc').innerHTML = '<span class="small">' + data.imc + ' IMC</span>';
        document.getElementById('respiratoria').innerHTML = '<span class="small">' + data.frecuencia_respiratoria + ' r/m</span>';
        document.getElementById('temperatura').innerHTML = '<span class="small">' + data.temperatura + ' °C</span>';
        document.getElementById('saturacion').innerHTML = '<span class="small">' + data.saturacion + ' %</span>';
        document.getElementById('arterial').innerHTML = '<span class="small">' + data.presion_arterial + ' mmHg</span>';

        // Signos vitales en la modal
        $("#temperatura_historia").text(data.temperatura + ' °C');
        $("#peso_historia").text(data.peso + ' kg');
        $("#estatura_historia").text(data.talla + ' cm');
        $("#pa_historia").text(data.presion_arterial + ' mmHg');
        $("#fc_historia").text(data.frecuencia_cardiaca + ' lpm');

        // Datos del paciente para la modal de Historia Clínica
        $("#documento_historia").val(data.documento);
        $("#nombre_historia").val(data.apellido + ' ' + data.paciente);
        $("#edad_historia").val(data.edad);
        $("#sexo_historia").val(data.sexo);
        $("#consecutivo_historia").val(data.codigo_triaje);

        // DATOS PARA LA CITAS
        $("#medico_cita").val(data.codigo_doctor);
        $("#dni_cita").val(data.documento);
        $("#nombre_cita").val(data.apellido + ' ' + data.paciente);
        $("#telefono_cita").val(data.telefono);

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

function crearDiagnosticos(tipo) {
  var url = baseurl + "administracion/creardiagnosticos";
  let triage = $("#consecutivo_historia").val(),
      paciente = $("#documento_historia").val();

  let diagnosticos = [];
  for (let i = 0; i < elementos_general.length; i++) {
    diagnosticos[i] = elementos_general[i][1] + '-' + elementos_general[i][3];
  }

    $.ajax({
        url: url,
        method: "POST",
        data: {
          triage: triage,
          paciente: paciente,
          diagnosticos: diagnosticos,
          tipo: tipo,
        },
        success: function() {
        
        }
    });
}

function crearProcedimientos(tipo) {

  let procedimientos = [];

  for (let i = 0; i < elementos_procedimientos2.length; i++) {
    procedimientos[i] = elementos_procedimientos2[i][0] + '-' + elementos_procedimientos2[i][2];
  }

  $.ajax({
    url: baseurl + "administracion/crearprocedimientos",
    method: "POST",
    data: {
      triage: $("#consecutivo_historia").val(),
      paciente: $("#documento_historia").val(),
      procedimientos: procedimientos,
      tipo: tipo
    },
    success: function() {

    }
  });

}

function crearExamenesAuxiliares() {

}
let medicamentosarray = [];
function crearMedicamento() {
    var url = baseurl + "administracion/crearmedicamento",
    triaje = $("#consecutivo_historia").val(),
    doctor = $("#documento_historia").val(),
    paciente = $("#documento_historia").val(),
    medicamento = $("#medicamento_medicamento").val(),
    cantidad = $("#cantidad_medicamento").val(),
    dosis = $("#dosis_medicamento").val(),
    via_aplicacion = $("#via_aplicacion_medicamento").val(),
    frecuencia = $("#frecuencia_medicamento").val(),
    duracion = $("#duracion_medicamento").val();

    if(medicamento == "" || cantidad == "" || dosis == "" || via_aplicacion == "" || frecuencia == "" || duracion == "") {
        $("body").overhang({
           type: "error",
           message: "Debe completar todos los campos con * para registrar el medicamento"
        });
    }
    else {
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
             
             
       
             medicamentosarray.push({
               triaje: triaje,
               paciente: paciente,
               medicamento: medicamento,
               cantidad: cantidad,
               dosis: dosis,
               via_aplicacion: via_aplicacion,
               frecuencia: frecuencia,
               duracion: duracion
             });
       
             document.getElementById('listarecetamedica').innerHTML = '';
             medicamentosarray.forEach(function(med) {
               document.getElementById('listarecetamedica').innerHTML += `
                 <tr>
                   <td class="text-xs">
                     <button type="button" class="btn btn-danger btn-sm" onclick="eliminarMedicamento('${med.medicamento}')">
                       <i class="fa fa-trash"></i>
                     </button>
                   </td>
                   <td class="text-xs text-uppercase">${med.medicamento}</td>
                   <td class="text-xs text-uppercase">${med.cantidad}</td>
                   <td class="text-xs text-uppercase">${med.dosis}</td>
                   <td class="text-xs text-uppercase">${med.via_aplicacion}</td>
                   <td class="text-xs text-uppercase">${med.frecuencia}</td>
                   <td class="text-xs text-uppercase">${med.duracion}</td>
                 </tr>
               `;
             });
          },
          error: function() {
            $("body").overhang({
               type: "error",
               message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
            }); 
          }
        });
    }
}

function eliminarMedicamento(medicamentos) {
 var paciente = $("#documento_historia").val(),
     triaje = $("#consecutivo_historia").val(),
     url = baseurl + "administracion/eliminarmedicamento";

     $("body").overhang({
       type: "confirm",
       primary: "#5e72e4",
       accent: "#ffffff",
       yesColor: "#3498DB",
       message: "Desea eliminar el medicamento del paciente ?",
       overlay: true,
       callback: function (value) {
         if(value == false){
                        
         }
         else {
           $.ajax({
            url: url,
            method: "POST",
            data: { 
              medicamento: medicamentos,
              paciente: paciente,
              triaje: triaje
            },
            success: function() {

               document.getElementById('listarecetamedica').innerHTML = '';
               const medact = medicamentosarray.filter(med => med.medicamento !== medicamentos);
               medact.forEach(function(med) {
                document.getElementById('listarecetamedica').innerHTML += `
                 <tr>
                   <td class="text-xs">
                     <button type="button" class="btn btn-danger btn-sm" onclick="eliminarMedicamento('${med.medicamento}')">
                       <i class="fa fa-trash"></i>
                     </button>
                   </td>
                   <td class="text-xs text-uppercase">${med.medicamento}</td>
                   <td class="text-xs text-uppercase">${med.cantidad}</td>
                   <td class="text-xs text-uppercase">${med.dosis}</td>
                   <td class="text-xs text-uppercase">${med.via_aplicacion}</td>
                   <td class="text-xs text-uppercase">${med.frecuencia}</td>
                   <td class="text-xs text-uppercase">${med.duracion}</td>
                 </tr>
               `;
               });

              $("body").overhang({
                type: "success",
                message: "El medicamento se ha eliminado correctamente"
              });
              
            }
          });             
         } 
       }
     });
}

function crearCita() {
  var url1 = baseurl + "administracion/crearcita",
      dni = $("#dni_cita").val(),
      nombre = $("#nombre_cita").val(),
      telefono = $("#telefono_cita").val(),
      medico = $("#medico_cita").val(),
      fecha = $("#fecha_cita").val(),
      hora = "00:00",
      estado = $("#estado_cita").val(),
      triage = $("#consecutivo_historia").val(),
      observaciones = $("#observaciones_cita").val();

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
          triage: triage
		},

		success: function () {
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

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("otra").addEventListener("change", function() {
        let textareaContainer = document.getElementById("observacion_container");
        textareaContainer.style.display = this.checked ? "block" : "none";
    });
});

function borrarDocumento(codigo,tipoarchivo,archivo) {
$("body").overhang({
  type: "confirm",
  primary: "#5e72e4",
  accent: "#ffffff",
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

function abrirHistoriaClinica(tipo) {
          $("body").overhang({
            type: "confirm",
            primary: "#5e72e4",
            accent: "#ffffff",
            yesColor: "#3498DB",
            message: "Esta seguro de crear un consecutivo para la historia clinica?",
            overlay: true,
            yesMessage: "Si",
            noMessage: "No",
            callback: function (value) {
            const pathname = window.location.pathname;  // Obtiene la ruta de la URL actual
            const parts = pathname.split('/');  // Divide la ruta
            const id = parts[parts.length - 1];  // Extrae el último valor, que es el ID
    
            var url1 = baseurl + "administracion/triajehistorias",
            documento = id;

            $.ajax({
              url: url1,
              method: "POST",
              data: { documento: documento  },
              success: function (response) {
                response = JSON.parse(response);
                $("#consecutivo_historia").val(response.codigo_triaje);
              }
            });
            if(value === false){

              if(tipo == 1) {
                document.getElementById('tphistoria').value = tipo;
                $('#tphistoria').trigger('change');
                var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
                modal.show();
                  $("#nav-antecedentesgine").removeClass("show active");
                  $("#nav-home").addClass("show active");
                  $("#terminarginecologia").prop("hidden", true);
                  $("#terminargeneral").prop("hidden", false);
               
            }
            else if(tipo == 2) {
              document.getElementById('tphistoria').value = tipo;
              $('#tphistoria').trigger('change');
              var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
              modal.show();
                $("#nav-home").removeClass("show active");
                $("#nav-antecedentesgine").addClass("show active");
                $("#terminargeneral").prop("hidden", true);
                $("#terminarginecologia").prop("hidden", false);   
             }         
            }
            else {

            if(tipo == 1) {
             $.ajax({
               url: baseurl + "administracion/consecutivohistoria",
                method: "POST",
                data: {
                  triaje: $("#consecutivo_historia").val(),
                  paciente: $("#documento_historia").val(), 
                  tipo: tipo 
                },
                success: function(response) {
                  if(response === "error") {
                    $("body").overhang({
                      type: "error",
                      message: "ya existe una historia clinica con el triage .",
                    });
                  }
                  else {
                    document.getElementById('tphistoria').value = tipo;
                    $('#tphistoria').trigger('change');
                    var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
                    modal.show();
                    $("#nav-antecedentesgine").removeClass("show active");
                    $("#nav-home").addClass("show active");
                    $("#terminarginecologia").prop("hidden", true);
                    $("#terminargeneral").prop("hidden", false);
                  }
                }
              });
            }
            else if(tipo == 2) {
             $.ajax({
               url: baseurl + "administracion/consecutivohistoria",
                method: "POST",
                data: {
                  triaje: $("#consecutivo_historia").val(),
                  paciente: $("#documento_historia").val(), 
                  tipo: tipo 
                },
                success: function(response) {
                  if(response === "error") {
                    $("body").overhang({
                      type: "error",
                      message: "ya existe una historia clinica con el triage .",
                    });
                  }
                  else {
                    document.getElementById('tphistoria').value = tipo;
                    $('#tphistoria').trigger('change');
                    var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
                    modal.show();
                    $("#nav-home").removeClass("show active");
                    $("#nav-antecedentesgine").addClass("show active");
                    $("#terminargeneral").prop("hidden", true);
                    $("#terminarginecologia").prop("hidden", false); 
                  }
                }
              });
            }
              return false;
             };                
            }
          });
        }


//ecografias ordenes
// Variables globales para ecografía
var elementos_eco = [];
var table_eco;
var table_eco_mini;
// Initialize DataTables when document is ready
$(document).ready(function() {
    // Función para inicializar DataTables de ecografía
    function initializeEcografiaDataTables() {
        try {
            // Destruir DataTables existentes si ya fueron inicializados
            if ($.fn.DataTable.isDataTable('#table-ecografia')) {
                $('#table-ecografia').DataTable().destroy();
            }
            if ($.fn.DataTable.isDataTable('#table-ecografia-items')) {
                $('#table-ecografia-items').DataTable().destroy();
            }
            
            // Verificar que las tablas existan
            if ($('#table-ecografia').length === 0) {
                console.error("No se encontró la tabla #table-ecografia");
                return;
            }
            if ($('#table-ecografia-items').length === 0) {
                console.error("No se encontró la tabla #table-ecografia-items");
                return;
            }
            // Inicializar DataTable para la tabla principal de ecografías
            table_eco = $('#table-ecografia').DataTable({
                "lengthMenu": [5, 10, 25, 50, 100],
                "pageLength": 5,
                "language": {
                    "processing": "Procesando",
                    "search": "Buscar:",
                    "lengthMenu": "Ver _MENU_ registros",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ ecografías",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "ordering": true,
                "searching": true,
                "initComplete": function() {
                }
            });
            
            // Inicializar DataTable para la tabla de ecografías seleccionadas
            table_eco_mini = $('#table-ecografia-items').DataTable({
                "lengthMenu": [5, 10, 25, 50, 100],
                "pageLength": 5,
                "language": {
                    "processing": "Procesando",
                    "search": "Buscar:",
                    "lengthMenu": "Ver _MENU_ registros",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ ecografías",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "No hay ecografías seleccionadas",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "ordering": true,
                "searching": true,
                "initComplete": function() {
                }
            });
            
        } catch (error) {
            console.error("Error al inicializar DataTables de ecografía:", error);
        }
    }
    
    // Esperar a que el DOM esté completamente cargado
    if (document.readyState === 'complete') {
        initializeEcografiaDataTables();
    } else {
        $(window).on('load', function() {
            setTimeout(initializeEcografiaDataTables, 1000);
        });
    }
});

// Evento doble clic para agregar ecografía a la tabla de selección
$('#table-ecografia').on('dblclick', 'tr', function(e) {
    var $row = $(this);
    var rowData = table_eco.row(this).data();
    // Guardar las clases de la fila original
    var rowClasses = $row.attr('class') || '';
    // Guardar las celdas con sus clases
    var cellsWithClasses = [];
    $row.find('td').each(function() {
        cellsWithClasses.push({
            data: $(this).text().trim(),
            className: $(this).attr('class') || ''
        });
    });
    // Agregar a la matriz de elementos
    elementos_eco.push(rowData);
    // Remover la fila de la tabla original
    table_eco.row(this).remove();
    // Agregar a la tabla de destino
    var newRow = table_eco_mini.row.add(rowData).draw(false).node();
    // Aplicar las clases a la nueva fila
    if (rowClasses) {
        $(newRow).attr('class', rowClasses);
    }
    // Aplicar clases a las celdas
    $(newRow).find('td').each(function(index) {
        if (cellsWithClasses[index]) {
            $(this).attr('class', cellsWithClasses[index].className);
        }
    });
    
    table_eco.draw(false);
    $('#saveBtn').addClass('visible');
});

// Evento doble clic para remover ecografía de la tabla de selección
$('#table-ecografia-items').on('dblclick', 'tr', function(e) {
    var $row = $(this);
    var rowData = table_eco_mini.row(this).data();
    
    // Guardar las clases de la fila original
    var rowClasses = $row.attr('class') || '';
    
    // Guardar las celdas con sus clases
    var cellsWithClasses = [];
    $row.find('td').each(function() {
        cellsWithClasses.push({
            data: $(this).text().trim(),
            className: $(this).attr('class') || ''
        });
    });
    
    // Remover la fila de la tabla de ítems
    table_eco_mini.row(this).remove().draw(false);
    
    // Agregar a la tabla original
    var newRow = table_eco.row.add(rowData).draw(false).node();
    
    // Aplicar las clases a la nueva fila
    if (rowClasses) {
        $(newRow).attr('class', rowClasses);
    }
    
    // Aplicar clases a las celdas
    $(newRow).find('td').each(function(index) {
        if (cellsWithClasses[index]) {
            $(this).attr('class', cellsWithClasses[index].className);
        }
    });
    
    // Eliminar de la matriz de elementos
    for (let i = 0; i < elementos_eco.length; i++) {
        if (elementos_eco[i][0] == rowData[0]) {
            elementos_eco.splice(i, 1);
            break;
        }
    }
    
    table_eco_mini.draw(false);
    if(elementos_eco.length === 0) {
      $('#saveBtn').addClass('visible');
    }
});

// Función para crear orden de ecografía
function crearOrdenEcografiaHistoria(tipo) {
    var url = baseurl + "administracion/ordenecografia";
    
    let paciente = $("#documento_historia").val(),
        triage = $("#consecutivo_historia").val();
    
    let ordeneco = [];
    for (let i = 0; i < elementos_eco.length; i++) {
        ordeneco[i] = elementos_eco[i][0];
    }
    
        $.ajax({
            url: url,
            method: "POST",
            data: {
                paciente: paciente,
                triage: triage,
                ecografia: ordeneco,
                examen: 'Ecografias',
                tipo: tipo
            },
            success: function(data) {
                
            },
            error: function() {
            }
        });
    
}

// Función para limpiar selección de ecografías
function limpiarSeleccionEcografia() {
    // Mover todos los elementos de vuelta a la tabla original
    var datosActuales = table_eco_mini.data().toArray();
    
    for (let i = 0; i < datosActuales.length; i++) {
        table_eco.row.add(datosActuales[i]).draw(false);
    }
    
    // Limpiar tabla de selección
    table_eco_mini.clear().draw();
    
    // Limpiar array de elementos
    elementos_eco = [];
    
    table_eco.draw(false);
}


// tomografias

// Variables globales para tomografía
var elementos_tomo = [];
var table_tomo;
var table_tomo_mini;

// Initialize DataTables when document is ready
$(document).ready(function() {
    
    // Función para inicializar DataTables de tomografía
    function initializeTomografiaDataTables() {
        try {
            // Destruir DataTables existentes si ya fueron inicializados
            if ($.fn.DataTable.isDataTable('#table-tomografia')) {
                $('#table-tomografia').DataTable().destroy();
            }
            if ($.fn.DataTable.isDataTable('#table-tomografia-items')) {
                $('#table-tomografia-items').DataTable().destroy();
            }
            
            // Verificar que las tablas existan
            if ($('#table-tomografia').length === 0) {
                console.error("No se encontró la tabla #table-tomografia");
                return;
            }
            if ($('#table-tomografia-items').length === 0) {
                console.error("No se encontró la tabla #table-tomografia-items");
                return;
            }
            
            // Inicializar DataTable para la tabla principal de tomografías
            table_tomo = $('#table-tomografia').DataTable({
                "lengthMenu": [5, 10, 25, 50, 100],
                "pageLength": 5,
                "language": {
                    "processing": "Procesando",
                    "search": "Buscar:",
                    "lengthMenu": "Ver _MENU_ registros",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ tomografías",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "ordering": true,
                "searching": true,
                "initComplete": function() {
                }
            });
            
            // Inicializar DataTable para la tabla de tomografías seleccionadas
            table_tomo_mini = $('#table-tomografia-items').DataTable({
                "lengthMenu": [5, 10, 25, 50, 100],
                "pageLength": 5,
                "language": {
                    "processing": "Procesando",
                    "search": "Buscar:",
                    "lengthMenu": "Ver _MENU_ registros",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ tomografías",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "No hay tomografías seleccionadas",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "ordering": true,
                "searching": true,
                "initComplete": function() {
                }
            });
            
        } catch (error) {
            console.error("Error al inicializar DataTables de tomografía:", error);
        }
    }
    
    // Esperar a que el DOM esté completamente cargado
    if (document.readyState === 'complete') {
        initializeTomografiaDataTables();
    } else {
        $(window).on('load', function() {
            setTimeout(initializeTomografiaDataTables, 1000);
        });
    }
});

// Evento doble clic para agregar tomografía a la tabla de selección
$('#table-tomografia').on('dblclick', 'tr', function(e) {
    var $row = $(this);
    var rowData = table_tomo.row(this).data();
    
    // Guardar las clases de la fila original
    var rowClasses = $row.attr('class') || '';
    
    // Guardar las celdas con sus clases
    var cellsWithClasses = [];
    $row.find('td').each(function() {
        cellsWithClasses.push({
            data: $(this).text().trim(),
            className: $(this).attr('class') || ''
        });
    });
    
    // Agregar a la matriz de elementos
    elementos_tomo.push(rowData);
    
    // Remover la fila de la tabla original
    table_tomo.row(this).remove();
    
    // Agregar a la tabla de destino
    var newRow = table_tomo_mini.row.add(rowData).draw(false).node();
    
    // Aplicar las clases a la nueva fila
    if (rowClasses) {
        $(newRow).attr('class', rowClasses);
    }
    
    // Aplicar clases a las celdas
    $(newRow).find('td').each(function(index) {
        if (cellsWithClasses[index]) {
            $(this).attr('class', cellsWithClasses[index].className);
        }
    });
    
    table_tomo.draw(false);
    $('#saveBtn').addClass('visible');
});

// Evento doble clic para remover tomografía de la tabla de selección
$('#table-tomografia-items').on('dblclick', 'tr', function(e) {
    var $row = $(this);
    var rowData = table_tomo_mini.row(this).data();
    
    // Guardar las clases de la fila original
    var rowClasses = $row.attr('class') || '';
    
    // Guardar las celdas con sus clases
    var cellsWithClasses = [];
    $row.find('td').each(function() {
        cellsWithClasses.push({
            data: $(this).text().trim(),
            className: $(this).attr('class') || ''
        });
    });
    
    // Remover la fila de la tabla de ítems
    table_tomo_mini.row(this).remove().draw(false);
    
    // Agregar a la tabla original
    var newRow = table_tomo.row.add(rowData).draw(false).node();
    
    // Aplicar las clases a la nueva fila
    if (rowClasses) {
        $(newRow).attr('class', rowClasses);
    }
    
    // Aplicar clases a las celdas
    $(newRow).find('td').each(function(index) {
        if (cellsWithClasses[index]) {
            $(this).attr('class', cellsWithClasses[index].className);
        }
    });
    
    // Eliminar de la matriz de elementos
    for (let i = 0; i < elementos_tomo.length; i++) {
        if (elementos_tomo[i][0] == rowData[0]) {
            elementos_tomo.splice(i, 1);
            break;
        }
    }
    
    table_tomo_mini.draw(false);
    if(elementos_tomo.length === 0) {
        $('#saveBtn').addClass('visible');
    }
});

// Función para crear orden de tomografía
function crearOrdenTomografia(tipo) {
    var url = baseurl + "administracion/ordentomografia";
    let documento = $("#documento_historia").val(),
        triage = $("#consecutivo_historia").val();
    
    let ordentomo = [];
    for (let x = 0; x < elementos_tomo.length; x++) {
        ordentomo[x] = elementos_tomo[x][0];
    }
    
        $.ajax({
            url: url,
            method: "POST",
            data: {
                paciente: documento,
                tomografia: ordentomo,
                triage: triage,
                examen: 'Tomografias',
                tipo: tipo
            },
            success: function(data) {
                
            },
            error: function() {
            }
        });  
}

// Función para limpiar selección de tomografías
function limpiarSeleccionTomografia() {
    // Mover todos los elementos de vuelta a la tabla original
    var datosActuales = table_tomo_mini.data().toArray();
    
    for (let i = 0; i < datosActuales.length; i++) {
        table_tomo.row.add(datosActuales[i]).draw(false);
    }
    
    // Limpiar tabla de selección
    table_tomo_mini.clear().draw();
    
    // Limpiar array de elementos
    elementos_tomo = [];
    
    table_tomo.draw(false);
}

//resonancia

// Variables globales para resonancia
var elementos_reso = [];
var table_reso;
var table_reso_mini;

// Initialize DataTables when document is ready
$(document).ready(function() {
    
    // Función para inicializar DataTables de resonancia
    function initializeResonanciaDataTables() {
        try {
            // Destruir DataTables existentes si ya fueron inicializados
            if ($.fn.DataTable.isDataTable('#table-resonancia')) {
                $('#table-resonancia').DataTable().destroy();
            }
            if ($.fn.DataTable.isDataTable('#table-resonancia-items')) {
                $('#table-resonancia-items').DataTable().destroy();
            }
            
            // Verificar que las tablas existan
            if ($('#table-resonancia').length === 0) {
                console.error("No se encontró la tabla #table-resonancia");
                return;
            }
            if ($('#table-resonancia-items').length === 0) {
                console.error("No se encontró la tabla #table-resonancia-items");
                return;
            }
            
            // Inicializar DataTable para la tabla principal de resonancias
            table_reso = $('#table-resonancia').DataTable({
                "lengthMenu": [5, 10, 25, 50, 100],
                "pageLength": 5,
                "language": {
                    "processing": "Procesando",
                    "search": "Buscar:",
                    "lengthMenu": "Ver _MENU_ registros",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ resonancias",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "ordering": true,
                "searching": true,
                "initComplete": function() {
                }
            });
            
            // Inicializar DataTable para la tabla de resonancias seleccionadas
            table_reso_mini = $('#table-resonancia-items').DataTable({
                "lengthMenu": [5, 10, 25, 50, 100],
                "pageLength": 5,
                "language": {
                    "processing": "Procesando",
                    "search": "Buscar:",
                    "lengthMenu": "Ver _MENU_ registros",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ resonancias",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "No hay resonancias seleccionadas",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "ordering": true,
                "searching": true,
                "initComplete": function() {
                }
            });
            
        } catch (error) {
            console.error("Error al inicializar DataTables de resonancia:", error);
        }
    }
    
    // Esperar a que el DOM esté completamente cargado
    if (document.readyState === 'complete') {
        initializeResonanciaDataTables();
    } else {
        $(window).on('load', function() {
            setTimeout(initializeResonanciaDataTables, 1000);
        });
    }
});

// Evento doble clic para agregar resonancia a la tabla de selección
$('#table-resonancia').on('dblclick', 'tr', function(e) {
    var $row = $(this);
    var rowData = table_reso.row(this).data();
    
    // Guardar las clases de la fila original
    var rowClasses = $row.attr('class') || '';
    
    // Guardar las celdas con sus clases
    var cellsWithClasses = [];
    $row.find('td').each(function() {
        cellsWithClasses.push({
            data: $(this).text().trim(),
            className: $(this).attr('class') || ''
        });
    });
    
    // Agregar a la matriz de elementos
    elementos_reso.push(rowData);
    
    // Remover la fila de la tabla original
    table_reso.row(this).remove();
    
    // Agregar a la tabla de destino
    var newRow = table_reso_mini.row.add(rowData).draw(false).node();
    
    // Aplicar las clases a la nueva fila
    if (rowClasses) {
        $(newRow).attr('class', rowClasses);
    }
    
    // Aplicar clases a las celdas
    $(newRow).find('td').each(function(index) {
        if (cellsWithClasses[index]) {
            $(this).attr('class', cellsWithClasses[index].className);
        }
    });
    
    table_reso.draw(false);
    $('#saveBtn').addClass('visible');
});

// Evento doble clic para remover resonancia de la tabla de selección
$('#table-resonancia-items').on('dblclick', 'tr', function(e) {
    var $row = $(this);
    var rowData = table_reso_mini.row(this).data();
    
    // Guardar las clases de la fila original
    var rowClasses = $row.attr('class') || '';
    
    // Guardar las celdas con sus clases
    var cellsWithClasses = [];
    $row.find('td').each(function() {
        cellsWithClasses.push({
            data: $(this).text().trim(),
            className: $(this).attr('class') || ''
        });
    });
    
    // Remover la fila de la tabla de ítems
    table_reso_mini.row(this).remove().draw(false);
    
    // Agregar a la tabla original
    var newRow = table_reso.row.add(rowData).draw(false).node();
    
    // Aplicar las clases a la nueva fila
    if (rowClasses) {
        $(newRow).attr('class', rowClasses);
    }
    
    // Aplicar clases a las celdas
    $(newRow).find('td').each(function(index) {
        if (cellsWithClasses[index]) {
            $(this).attr('class', cellsWithClasses[index].className);
        }
    });
    
    // Eliminar de la matriz de elementos
    for (let i = 0; i < elementos_reso.length; i++) {
        if (elementos_reso[i][0] == rowData[0]) {
            elementos_reso.splice(i, 1);
            break;
        }
    }
    
    table_reso_mini.draw(false);
    if(elementos_reso.length === 0) {
        $('#saveBtn').addClass('visible');
    }
});

// Función para crear orden de resonancia
function crearOrdenResonancia(tipo) {
    var url = baseurl + "administracion/ordenresonancia";
    
    let documento = $("#documento_historia").val(),
       
        triage = $("#consecutivo_historia").val();
    
    let ordenreso = [];
    for (let z = 0; z < elementos_reso.length; z++) {
        ordenreso[z] = elementos_reso[z][0];
    }
        $.ajax({
            url: url,
            method: "POST",
            data: {
                paciente: documento,
                triage: triage,
                resonancia: ordenreso,
                examen: 'Resonancias',
                tipo: tipo
            },
            success: function(data) {
                
            },
            error: function() {
                
            }
        });
    
}

// Función para limpiar selección de resonancias
function limpiarSeleccionResonancia() {
    // Mover todos los elementos de vuelta a la tabla original
    var datosActuales = table_reso_mini.data().toArray();
    for (let i = 0; i < datosActuales.length; i++) {
        table_reso.row.add(datosActuales[i]).draw(false);
    }
    // Limpiar tabla de selección
    table_reso_mini.clear().draw();
    // Limpiar array de elementos
    elementos_reso = [];
    table_reso.draw(false);
}

function abrirEditarModalHistoriaClinicaGeneral(codigo) {
   
  //datos de consulta general
  let triage = String(codigo).split('2026')[0];
  let paciente = String(codigo).split('2026')[1];
   
  let url = baseurl + "administracion/getconsultasgeneralcodigo/" + triage + '/' +  paciente;

  $("body").overhang({
       type: "confirm",
       primary: "#5e72e4",
       accent: "#ffffff",
       yesColor: "#3498DB",
       message: "¿Desea editar la historia Clínica General?",
       overlay: true,
       callback: function (value) {
         if(value == false){
         }
         else {
           $("#consecutivo_historia").val(triage);
           $.ajax({
             url: url,
             method: "GET",
             success: function(data) {
               data = JSON.parse(data);
               
               //
               document.getElementById('tphistoria').value = 1;
                 $('#tphistoria').trigger('change');
                 var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
                 modal.show();
                   $("#nav-antecedentesgine").removeClass("show active");
                   $("#nav-home").addClass("show active");
                   $("#terminarginecologia").prop("hidden", true);
                   $("#terminargeneral").prop("hidden", false);

               //DATOS DE ANAMNESIS
               $("#anamnesis_directa").val(data.anamnesis);
               $("#anamnesis_empresa").val(data.empresa);
               $("#anamnesis_compania").val(data.compania);
               $("#anamnesis_iafa").val(data.iafa);
               $("#anamnesis_acompanante").val(data.nombre_acompanante);
               $("#anamnesis_dni").val(data.dni);
               $("#anamnesis_celular").val(data.celular);
               $("#anamnesis_consulta").val(data.motivo_consulta);
               $("#anamnesis_tratamiento").val(data.tratamiento_anterior);
               $("#anamnesis_enfermedad").val(data.enfermedad_actual);
               $("#anamnesis_tiempo").val(data.tiempo);
               $("#anamnesis_inicio").val(data.inicio);
               $("#anamnesis_curso").val(data.curso);
               $("#anamnesis_sintomas").val(data.sintomas);

               //EXAMEN FISICO
               $("#fisico_piel").val(data.piel);
               $("#fisico_cuello").val(data.cuello);
               $("#fisico_abdomen").val(data.abdomen);
               $("#fisico_respiratorio").val(data.ap_respiratoria);
               $("#fisico_cardio").val(data.ap_cardio);
               $("#fisico_sistema").val(data.sistema_nervioso);
               $("#fisico_cabeza").val(data.cabeza);
               $("#fisico_locomotor").val(data.loco_motor);
               $("#fisico_apetito").val(data.apetito);
               $("#fisico_sed").val(data.sed);
               $("#fisico_orina").val(data.orina);
               $("#ap_genito2").val(data.ap_genitourinario);

               //PLAN DE TRABAJO
               $("#plan_examen").val(data.examen_dx);
               $("#plan_procedimiento").val(data.procedimientos);
               $("#plan_interconsulta").val(data.interconsultas);
               $("#plan_tratamiento").val(data.tratamiento);
               $("#plan_referencia").val(data.referencia);
               $("#plan_firma").val(data.firma_medico);

               //DIAGNOSTICOS
               var url2 = baseurl + "administracion/getdiagnosticoscodigo/" + triage + '/' +  paciente + '/' + 1;

                $.ajax({
                    url: url2,
                    method: "GET",
                    success: function(data) {
                      data = JSON.parse(data);
                      data.forEach(function(diagnostico, index) {
                        elem_lab = [
                          diagnostico.iddiagnostico,
                          diagnostico.codigo_diagnosti, 
                          diagnostico.nombrediagnostico,
                          diagnostico.tipo, 
                        ];  
                        elementos_general.push(elem_lab);
                        table_general.row(this).remove();
                        table_lab_mini2.row.add(elem_lab).draw(false);
                        total_ = 0;
                        for (let i = 0; i < elementos_general.length; i++) {
                          total_ += elementos_general[i][2] * 1;
                        }
                        $("#total").val((total_).toFixed(2));
                        table_general.draw(false);
                      });
                    }
                });

                //PROCEDIMIENTOS
                var url5 = baseurl + "administracion/getprocedimientoscodigo/" + triage + '/' +  paciente + '/' + 1;
                $.ajax({
                    url: url5,
                    method: "GET",
                    success: function(response) {
                      response = JSON.parse(response);
                      response.forEach(function(proce, index) {
                        elemDiagnosti = [
                          proce.codigo_procedimiento,
                          proce.nombreprocedimiento, 
                          proce.texto_plantilla 
                        ];
                        elementos_procedimientos2.push(elemDiagnosti);
                        table_procedi.row(this).remove();
                        table_lab_mini4.row.add(elemDiagnosti).draw(false);
                        total_ = 0;
                        for (let x = 0; x < elementos_procedimientos2.length; x++) {
                          total_ += elementos_procedimientos2[x][2] * 1;
                        }
                        $("#total").val((total_).toFixed(2));
                        table_procedi.draw(false);
                      });
                    }
                });

                //EXAMENES AUXILIARES
                  //ECOGRAFIAS 
                  let url6 = baseurl + "administracion/auxiliarecografias/" + triage + '/' +  paciente;
                    $.ajax({
                        url: url6,
                        method: "GET",
                        success: function(data) {
                            data = JSON.parse(data);
                            data.forEach(function(ecografia) {
                                elemEco = [
                                    ecografia.codigoauxiliar,
                                    ecografia.nombreauxiliar
                                ];
                                elementos_eco.push(elemEco);
                                table_eco.row(this).remove();
                                table_eco_mini.row.add(elemEco).draw(false);
                                total_ = 0;
                                for (let i = 0; i < elementos_eco.length; i++) {
                                  total_ += elementos_eco[i][2] * 1;
                                }
                                $("#total").val((total_).toFixed(2));
                                table_eco.draw(false);
                            });
                        }
                    });

                  //TOMOGRAFIAS
                  let url7 = baseurl + "administracion/auxiliaretomografias/" + triage + '/' +  paciente;
                    $.ajax({
                        url: url7,
                        method: "GET",
                        success: function(data) {
                          data = JSON.parse(data);
                          data.forEach(function(tomografia) {
                            elemTomo = [
                                tomografia.codigoauxiliar,
                                tomografia.nombreauxiliar
                            ];
                            elementos_tomo.push(elemTomo);
                            table_tomo.row(this).remove();
                            table_tomo_mini.row.add(elemTomo).draw(false);
                            total_ = 0;
                            for (let i = 0; i < elementos_tomo.length; i++) {
                              total_ += elementos_tomo[i][2] * 1;
                            }
                            $("#total").val((total_).toFixed(2));
                            table_tomo.draw(false);
                          });
                        }
                    });

                  //RESONANCIAS
                  let url8 = baseurl + "administracion/auxiliareresonancias/" + triage + '/' +  paciente;
                    $.ajax({
                        url: url8,
                        method: "GET",
                        success: function(data) {
                            data = JSON.parse(data);
                            data.forEach(function(resonancia) {
                              elemReso = [
                                resonancia.codigoauxiliar,
                                resonancia.nombreauxiliar
                              ];
                              elementos_reso.push(elemReso);
                              table_reso.row(this).remove();
                              table_reso_mini.row.add(elemReso).draw(false);
                                total_ = 0;
                                for (let i = 0; i < elementos_reso.length; i++) {
                                  total_ += elementos_reso[i][2] * 1;
                                }
                                $("#total").val((total_).toFixed(2));
                                table_reso.draw(false);
                            });
                        }
                    });

                //REECETA MEDICA
                var url3 = baseurl + "administracion/getmedicamentoscodigo/" + triage + '/' +  paciente;
                $.ajax({
                    url: url3,
                    method: "GET",
                    success: function(data) {
                      data = JSON.parse(data);
                      document.getElementById('listarecetamedica').innerHTML = '';
                      data.forEach(function(med) {
                        document.getElementById('listarecetamedica').innerHTML += `
                        <tr>
                          <td class="text-xs">
                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminarMedicamento('${med.medicamento}')">
                              <i class="fa fa-trash"></i>
                            </button>
                          </td>
                          <td class="text-xs text-uppercase">${med.medicamento}</td>
                          <td class="text-xs text-uppercase">${med.cantidad}</td>
                          <td class="text-xs text-uppercase">${med.dosis}</td>
                          <td class="text-xs text-uppercase">${med.via_aplicacion}</td>
                          <td class="text-xs text-uppercase">${med.frecuencia}</td>
                          <td class="text-xs text-uppercase">${med.duracion}</td>
                        </tr>
                       `;
                    });
                  }
                });
             }
           });
           //CITAS MEDICAS 
           let url4 = baseurl + "administracion/getcitascodigo/" + triage + '/' +  paciente;
              $.ajax({
                url: url4,
                method: "GET",
                success: function(data) {
                  data = JSON.parse(data);
                  $("#medico_cita").val(data.doctor);
                  $("#fecha_cita").val(data.fecha);
                  $("#estado_cita").val(data.estado);
                  $("#comentarios_cita").val(data.comentarios);
                }
              });
                        
           
         }
       }
  });
}

function abrirEditarModalHistoriaClinicaGinecologica(codigo) {
    //datos de consulta ginecologica
    let triage = String(codigo).split('2026')[0];
    let paciente = String(codigo).split('2026')[1];
    let url = baseurl + "administracion/getconsultasginecologiacodigo/" + triage + '/' +  paciente;

    $("body").overhang({
       type: "confirm",
       primary: "#5e72e4",
       accent: "#ffffff",
       yesColor: "#3498DB",
       message: "¿Desea editar la historia Clínica Gineologica?",
       overlay: true,
       callback: function (value) {
         if(value == false){

         }
         else {
           $("#consecutivo_historia").val(triage);
           $.ajax({
             url: url,
             method: "GET",
             success: function(data) {
               data = JSON.parse(data);
               //    
               document.getElementById('tphistoria').value = 2;
               $('#tphistoria').trigger('change');
                 var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
                 modal.show();
                  $("#nav-home").removeClass("show active");
                  $("#nav-antecedentesgine").addClass("show active");
                  $("#terminargeneral").prop("hidden", true);
                  $("#terminarginecologia").prop(false);
               // ANTECEDENTES
               $("#antecedentes_familiares").val(data.familiares);
               $("#antecedentes_patologicos").val(data.patologicos);
               $("#antecedentes_gineco").val(data.gineco_obstetrico);
               $("#antecedentes_fum").val(data.fum);
               $("#antecedentes_rm").val(data.rm);
               $("#antecedentes_flujo").val(data.flujo_genital);
               $("#antecedentes_parejas").val(data.no_de_parejas);
               $("#antecedentes_gestas").val(data.gestas);
               $("#antecedentes_partos").val(data.partos);
               $("#antecedentes_abortos").val(data.abortos);
               $("#antecedentes_anticonceptivos").val(data.anticonceptivos);
               $("#antecedentes_tipos").val(data.tipo);
               $("#antecedentes_tiempo").val(data.tiempo);
               $("#antecedentes_otros").val(data.otros);
               $("#antecedentes_fecha").val(data.fecha_pap);
               $("#antecedentes_hijos").val(data.no_hijos);
               // CONSULTA
               $("#consulta_motivo").val(data.motivo_consulta);
               $("#consulta_sintomas").val(data.signossintomas);
               // EXAMEN FISICO
               $("#examen_piel").val(data.piel_tscs);
               $("#examen_tiroides").val(data.tiroides);
               $("#examen_mamas").val(data.mamas);
               $("#examen_respiratorio").val(data.arespiratorio);
               $("#examen_cardiovascular").val(data.acardiovascular);
               $("#examen_abdomen").val(data.abdomen);
               $("#examen_genito").val(data.genito_urinario);
               $("#examen_tacto").val(data.tacto_rectal);
               $("#examen_locomotor").val(data.locomotor);
               $("#examen_sistema").val(data.sistema_nervioso);
               // 
               $("#exa_auxiliares1").val(data.examenes_auxiiliares);
               $("#tratamientos_gine").val(data.tratamiento);
               $("#plan_trabajo1").val(data.plan_trabajo);
               $("#proxima_cita1").val(data.proxima_cita);
               $("#firma_medico1").val(data.firma_medico);

               //DIAGNOSTICOS
               var url2 = baseurl + "administracion/getdiagnosticoscodigo/" + triage + '/' +  paciente + '/' + 2;

                $.ajax({
                    url: url2,
                    method: "GET",
                    success: function(data) {
                      data = JSON.parse(data);
                      data.forEach(function(diagnostico, index) {
                        elem_lab = [
                          diagnostico.iddiagnostico,
                          diagnostico.codigo_diagnosti, 
                          diagnostico.nombrediagnostico,
                          diagnostico.tipo, 
                        ];  
                        elementos_general.push(elem_lab);
                        table_general.row(this).remove();
                        table_lab_mini2.row.add(elem_lab).draw(false);
                        total_ = 0;
                        for (let i = 0; i < elementos_general.length; i++) {
                          total_ += elementos_general[i][2] * 1;
                        }
                        $("#total").val((total_).toFixed(2));
                        table_general.draw(false);
                      });
                    }
                });

                //PROCEDIMIENTOS
                var url5 = baseurl + "administracion/getprocedimientoscodigo/" + triage + '/' +  paciente + '/' + 2;
                $.ajax({
                    url: url5,
                    method: "GET",
                    success: function(response) {
                      response = JSON.parse(response);
                      response.forEach(function(proce, index) {
                        elemDiagnosti = [
                          proce.codigo_procedimiento,
                          proce.nombreprocedimiento, 
                          proce.texto_plantilla 
                        ];
                        elementos_procedimientos2.push(elemDiagnosti);
                        table_procedi.row(this).remove();
                        table_lab_mini4.row.add(elemDiagnosti).draw(false);
                        total_ = 0;
                        for (let x = 0; x < elementos_procedimientos2.length; x++) {
                          total_ += elementos_procedimientos2[x][2] * 1;
                        }
                        $("#total").val((total_).toFixed(2));
                        table_procedi.draw(false);
                      });
                    }
                });

                //EXAMENES AUXILIARES
                  //ECOGRAFIAS 
                  let url6 = baseurl + "administracion/auxiliarecografias/" + triage + '/' +  paciente;
                    $.ajax({
                        url: url6,
                        method: "GET",
                        success: function(data) {
                            data = JSON.parse(data);
                            data.forEach(function(ecografia) {
                                elemEco = [
                                    ecografia.codigoauxiliar,
                                    ecografia.nombreauxiliar
                                ];
                                elementos_eco.push(elemEco);
                                table_eco.row(this).remove();
                                table_eco_mini.row.add(elemEco).draw(false);
                                total_ = 0;
                                for (let i = 0; i < elementos_eco.length; i++) {
                                  total_ += elementos_eco[i][2] * 1;
                                }
                                $("#total").val((total_).toFixed(2));
                                table_eco.draw(false);
                            });
                        }
                    });

                  //TOMOGRAFIAS
                  let url7 = baseurl + "administracion/auxiliaretomografias/" + triage + '/' +  paciente;
                    $.ajax({
                        url: url7,
                        method: "GET",
                        success: function(data) {
                          data = JSON.parse(data);
                          data.forEach(function(tomografia) {
                            elemTomo = [
                                tomografia.codigoauxiliar,
                                tomografia.nombreauxiliar
                            ];
                            elementos_tomo.push(elemTomo);
                            table_tomo.row(this).remove();
                            table_tomo_mini.row.add(elemTomo).draw(false);
                            total_ = 0;
                            for (let i = 0; i < elementos_tomo.length; i++) {
                              total_ += elementos_tomo[i][2] * 1;
                            }
                            $("#total").val((total_).toFixed(2));
                            table_tomo.draw(false);
                          });
                        }
                    });

                  //RESONANCIAS
                  let url8 = baseurl + "administracion/auxiliareresonancias/" + triage + '/' +  paciente;
                    $.ajax({
                        url: url8,
                        method: "GET",
                        success: function(data) {
                            data = JSON.parse(data);
                            data.forEach(function(resonancia) {
                              elemReso = [
                                resonancia.codigoauxiliar,
                                resonancia.nombreauxiliar
                              ];
                              elementos_reso.push(elemReso);
                              table_reso.row(this).remove();
                              table_reso_mini.row.add(elemReso).draw(false);
                                total_ = 0;
                                for (let i = 0; i < elementos_reso.length; i++) {
                                  total_ += elementos_reso[i][2] * 1;
                                }
                                $("#total").val((total_).toFixed(2));
                                table_reso.draw(false);
                            });
                        }
                    });

                //REECETA MEDICA
                var url3 = baseurl + "administracion/getmedicamentoscodigo/" + triage + '/' +  paciente;
                $.ajax({
                    url: url3,
                    method: "GET",
                    success: function(data) {
                      data = JSON.parse(data);
                      document.getElementById('listarecetamedica').innerHTML = '';
                      data.forEach(function(med) {
                        document.getElementById('listarecetamedica').innerHTML += `
                        <tr>
                          <td class="text-xs">
                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminarMedicamento('${med.medicamento}')">
                              <i class="fa fa-trash"></i>
                            </button>
                          </td>
                          <td class="text-xs text-uppercase">${med.medicamento}</td>
                          <td class="text-xs text-uppercase">${med.cantidad}</td>
                          <td class="text-xs text-uppercase">${med.dosis}</td>
                          <td class="text-xs text-uppercase">${med.via_aplicacion}</td>
                          <td class="text-xs text-uppercase">${med.frecuencia}</td>
                          <td class="text-xs text-uppercase">${med.duracion}</td>
                        </tr>
                       `;
                    });
                  }
                });
             }
           });
           //CITAS MEDICAS 
           let url4 = baseurl + "administracion/getcitascodigo/" + triage + '/' +  paciente;
              $.ajax({
                url: url4,
                method: "GET",
                success: function(data) {
                  data = JSON.parse(data);
                  $("#medico_cita").val(data.doctor);
                  $("#fecha_cita").val(data.fecha);
                  $("#estado_cita").val(data.estado);
                  $("#comentarios_cita").val(data.comentarios);
                }
              });
       }
    }
  });   
}

terminarAtenciongeneral = () => {
  triage = $("#consecutivo_historia").val();
  id = $("#documento_historia").val();
  let url = baseurl + "administracion/pdfhistoriaclinica/" + triage + "/" + id;
  window.open(url, "_blank", " width=1100, height=1000");

  setTimeout(() => {
    reloadPage();
  }, 3000);
}

terminarAtencionginecologia = () => {
  triage = $("#consecutivo_historia").val();
  id = $("#documento_historia").val();
  let url = baseurl + "administracion/pdfhistoriaclinicaginecologica/" + triage + "/" + id;
  window.open(url, "_blank", " width=1100, height=1000");

  setTimeout(() => {
    reloadPage();
  }, 3000);
}

reloadPage = () => {
    location.reload();
}



