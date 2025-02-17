
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
$("#guardarhistoriaginecologia").on("click", function(){
    
    var url1 = baseurl + "administracion/crearhistoriaginecologia",
        dni = $("#dni1").val(),
        doctorid = $("#doctorid1").val(),
        triaje = $("#triajeid1").val(),
        familiares = $("#familiares1").val(),
        patologicos = $("#patologicos1").val(),
        gine_obste = $("#gine_obste1").val(),
        fum = $("#fum1").val(),
        rm = $("#rm1").val(),
        flujo_genital = $("#flujo_genital1").val(),
        parejas = $("#parejas1").val(),
        gestas = $("#gestas1").val(),
        partos = $("#partos1").val(),
        abortos = $("#abortos1").val(),
        anticonceptivos = $("#anticonceptivos1").val(),
        tipo = $("#tipo1").val(),
        tiempo = $("#tiempo1").val(),
        cirugia_ginecologica = $("#cirugia_ginecologica1").val(),
        otros = $("#otros1").val(),
        pap = $("#pap1").val(),
        hijos = $("#hijos1").val(),
        motivo_consulta = $("#motivo_consulta1").val(),
        signos_sintomas = $("#signos_sintomas1").val(),
        piel_tscs = $("#piel_tscs1").val(),
        tiroides = $("#tiroides1").val(),
        mamas = $("#mamas1").val(),
        a_respiratorio = $("#a_respiratorio1").val(),
        a_cardiovascular = $("#a_cardiovascular1").val(),
        abdomen = $("#abdomen1").val(),
        genito = $("#genito1").val(),
        tacto = $("#tacto1").val(),
        locomotor = $("#locomotor1").val(),
        sistema_nervioso = $("#sistema_nervioso1").val(),
        exa_auxiliares = $("#exa_auxiliares1").val(),
        tratamientos_gine = $("#tratamientos_gine").val(),
        plan_trabajo = $("#plan_trabajo1").val(),
        proxima_cita = $("#proxima_cita1").val(),
        firma_medico = $("#firma_medico1").val();
        let diagnosticosginecologia = [];

        for (let i = 0; i < elemntos_ginecologia.length; i++) {
            diagnosticosginecologia [i] = elemntos_ginecologia[i][0];
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

$("#guardarhistoriageneral").on("click", function (){
    var url2 = baseurl + "administracion/crearhistoriageneral",
    dni = $("#documento_historia").val(),
    doctorid = $("#doctorid1").val(),
    triaje = $("#triajeid1").val(),
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
   var url1 = baseurl + "administracion/triajehistorias",
       documento = '1110542802';

   $.ajax( {
      url: url1,
      method: "POST",
      data: { documento: documento  },
      success: function (data) {
        data = JSON.parse(data);
        document.getElementById('estatura').innerHTML = data.talla + ' Mts';
        document.getElementById('cardiaca').innerHTML = data.presion_arterial + ' mmHg';
        document.getElementById('peso').innerHTML = data.peso + ' Kg';
        document.getElementById('imc').innerHTML = data.imc + ' IMC';
        document.getElementById('respiratoria').innerHTML = data.frecuencia_respiratoria + ' r/m';
        document.getElementById('temperatura').innerHTML = data.temperatura + ' C';
        $("#documento_historia").val(data.documento);
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
  }
  else if(tphistoria == 2) {

    $("#nav-home-tab").prop("hidden", true);
    $("#nav-profile-tab").prop("hidden", true);
    $("#nav-contact-tab").prop("hidden", true);

    $("#nav-antecedentesgine-tab").prop("hidden", false);
    $("#nav-fisicogine-tab").prop("hidden", false);
    $("#nav-consultagine-tab").prop("hidden", false);
  }
  else {
    $("#nav-home-tab").prop("hidden", true);
    $("#nav-profile-tab").prop("hidden", true);
    $("#nav-contact-tab").prop("hidden", true);

    $("#nav-antecedentesgine-tab").prop("hidden", true);
    $("#nav-fisicogine-tab").prop("hidden", true);
    $("#nav-consultagine-tab").prop("hidden", true);
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
          message: "la alergia se ha registrado correctamente"
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

function crearMedicamento() {
    var url = baseurl + "administracion/crearmedicamento",
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
