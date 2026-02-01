// Global variables
var elementos_lab = [];
var table_lab;
var table_lab_mini;

// Predefined profiles with test names that should match with the database
var perfilesLaboratorio = {
    'preoperatorio': [
        'HEMOGRAMA', 
        'GRUPO SANGUINEO', 
        'COAGULACION', 
        'SANGRIA', 
        'FACTOR RH',
        'HEMOGLOBINA',
        'HEMATOCRITO',
        'LEUCOCITOS',
        'PLAQUETAS',
        'GLUCOSA',
        'CREATININA',
        'NITROGENO UREICO',
        'TP',
        'TPT',
        'INR'
    ],
    'perfil_lipidico': [
        'COLESTEROL',
        'HDL',
        'LDL',
        'TRIGLICERIDOS',
        'VLDL',
        'PERFIL LIPIDICO'
    ],
    'perfil_hepatico': [
        'BILIRRUBINA',
        'TGO',
        'AST',
        'TGP',
        'ALT',
        'FOSFATASA ALCALINA',
        'ALBUMINA',
        'PROTEINAS TOTALES',
        'PERFIL HEPATICO'
    ]
};

// La función seleccionarPerfil ahora está definida como una propiedad de window al inicio del archivo

// Initialize DataTables when document is ready
$(document).ready(function() {
    if ($.fn.DataTable.isDataTable('#table-laboratorio')) {
        table_lab = $('#table-laboratorio').DataTable();
    }
    if ($.fn.DataTable.isDataTable('#table-laboratorio-items')) {
        table_lab_mini = $('#table-laboratorio-items').DataTable();
    }
    
    // La función seleccionarPerfil ha sido movida a historiaclinica.js
});

// La función ya está disponible globalmente a través de la asignación al inicio

$('#table-laboratorio').on('dblclick', 'tr', function(e) {
    var $row = $(this);
    var rowData = table_lab.row(this).data();
    
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
    elementos_lab.push(rowData);
    
    // Remover la fila de la tabla original
    table_lab.row(this).remove();
    
    // Agregar a la tabla de destino
    var newRow = table_lab_mini.row.add(rowData).draw(false).node();
    
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
    
    // Actualizar total
    var total_ = 0;
    for (let i = 0; i < elementos_lab.length; i++) {
        total_ += elementos_lab[i][2] * 1;
    }
    $("#total").val((total_).toFixed(2));
    
    table_lab.draw(false);
});

// Evento para deseleccionar un ítem de la tabla de laboratorio
$('#table-laboratorio-items').on('dblclick', 'tr', function(e) {
    var $row = $(this);
    var rowData = table_lab_mini.row(this).data();
    
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
    table_lab_mini.row(this).remove().draw(false);
    
    // Agregar a la tabla original
    var newRow = table_lab.row.add(rowData).draw(false).node();
    
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
    for (let i = 0; i < elementos_lab.length; i++) {
        if (elementos_lab[i][0] == rowData[0]) {
            elementos_lab.splice(i, 1);
            break;
        }
    }
    
    // Actualizar total
    var total_ = 0;
    for (let i = 0; i < elementos_lab.length; i++) {
        total_ += elementos_lab[i][2] * 1;
    }
    $("#total").val((total_).toFixed(2));
    
    table_lab_mini.draw(false);
});

$('#Form_Lab').keypress(function(e) {

    e.defaultPrevented;

    if (e.which == 13) {

        return false;

    }

});

$("#Form_Lab").submit(function(event) {

    event.preventDefault();

    Suubtmit();

});

function Suubtmit(){

    var url = baseurl + "administracion/serviciolaboratorio",

    forma_pago = $("input[name=tipopago]:checked").val(),

    dni = $("#dni").val(),

    doctor = $("#doctor").val(),

    observacion = $("#observacion").val(),

    fecha = $("#fecha").val(),

    total = $("#total").val();

    let laboratorio = [];



    for (let i = 0; i < elementos_lab.length; i++) {

        laboratorio [i] = elementos_lab[i][0];

    }

    if(laboratorio.length>0){

        $.ajax({

            url: url,

            method: "POST",

            data: {

               forma_pago: forma_pago,
               
               laboratorio: laboratorio,

               dni: dni,

               doctor: doctor,

               observacion: observacion,

               fecha: fecha,

               total: total

            },

            success: function (data) {

                id_ultimo_laboratorio = JSON.parse(data);

                //$("#id").val(id_ultimo_laboratorio)

                $("body").overhang({

                    type: "success",

                    message: "Registrado Correctamente"

                });

                setTimeout(function() {

                    url = baseurl  + "administracion/recibolaboratorio/" + id_ultimo_laboratorio;

                    window.open(url, "_blank", " width=500, height=400");

                    location.reload();

                }, 700);

                //$("#ticket-laboratorio").attr("hidden", false);

            },

            error: function () {

               $("body").overhang({

                 type: "error",

                message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",

              }); 

            }

        })

    }else{

        $("body").overhang({

            type: "warning",

            message: "Agregar almenos un analisis."

        });

    }

}

function crearOrdenLaboratorioHistoria() {

  var url = baseurl + "administracion/crearOrdenLaboratorio";

  let documento = $("#documento_historia").val(),
      nombre = $("#nombre_lab").val(),
      edad = $("#edad_lab").val(),
      medico = $("#medico_lab").val();
      triage = $("#consecutivo_historia").val();

  let ordenlab = [];
  for (let i = 0; i < elementos_lab.length; i++) {
    ordenlab [i] = elementos_lab[i][0];
  }
//   console.log(ordenlab);

  $.ajax({
    url: url,
    method: "POST",
    data: {
      documento: documento,
      nombre: nombre,
      edad: edad,
      medico: medico,
      ordenlab: ordenlab,
      triage:triage
    },
    success: function(data) {
        $("body").overhang({
            type: "success",
            message: "La orden de laboratorio se ha creado correctamente"
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