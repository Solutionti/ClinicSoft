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
});

// Función para crear orden de resonancia
function crearOrdenResonanciaHistoria() {
    var url = baseurl + "administracion/crearOrdenResonancia";
    
    let documento = $("#documento_historia").val(),
        nombre = $("#nombre_paciente").val(),
        edad = $("#edad_paciente").val(),
        medico = $("#medico_solicitante").val();
        triage = $("#consecutivo_historia").val();
    
    let ordenreso = [];
    for (let i = 0; i < elementos_reso.length; i++) {
        ordenreso[i] = elementos_reso[i][0];
    }
    
    if(ordenreso.length > 0) {
        $.ajax({
            url: url,
            method: "POST",
            data: {
                documento: documento,
                nombre: nombre,
                edad: edad,
                medico: medico,
                ordenreso: ordenreso,
                triage: triage
            },
            success: function(data) {
                $("body").overhang({
                    type: "success",
                    message: "La orden de resonancia se ha creado correctamente"
                });
                setTimeout(reloadPageResonancia, 3000);
            },
            error: function() {
                $("body").overhang({
                    type: "error",
                    message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red."
                });
            }
        });
    } else {
        $("body").overhang({
            type: "warning",
            message: "Agregar al menos una resonancia."
        });
    }
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

const reloadPageResonancia = () => {
    location.reload();
}
