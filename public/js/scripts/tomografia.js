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
});

// Función para crear orden de tomografía
function crearOrdenTomografiaHistoria() {
    var url = baseurl + "administracion/crearOrdenTomografia";
    
    let documento = $("#documento_historia").val(),
        nombre = $("#nombre_paciente").val(),
        edad = $("#edad_paciente").val(),
        medico = $("#medico_solicitante").val();
        triage = $("#consecutivo_historia").val();
    
    let ordentomo = [];
    for (let i = 0; i < elementos_tomo.length; i++) {
        ordentomo[i] = elementos_tomo[i][0];
    }
    
    if(ordentomo.length > 0) {
        $.ajax({
            url: url,
            method: "POST",
            data: {
                documento: documento,
                nombre: nombre,
                edad: edad,
                medico: medico,
                ordentomo: ordentomo,
                triage: triage
            },
            success: function(data) {
                $("body").overhang({
                    type: "success",
                    message: "La orden de tomografía se ha creado correctamente"
                });
                setTimeout(reloadPageTomografia, 3000);
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
            message: "Agregar al menos una tomografía."
        });
    }
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

const reloadPageTomografia = () => {
    location.reload();
}
