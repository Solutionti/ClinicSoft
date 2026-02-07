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
});

// Función para crear orden de ecografía
function crearOrdenEcografiaHistoria() {
    var url = baseurl + "administracion/crearOrdenEcografia";
    
    let documento = $("#documento_historia").val(),
        nombre = $("#nombre_paciente").val(),
        edad = $("#edad_paciente").val(),
        medico = $("#medico_solicitante").val();
        triage = $("#consecutivo_historia").val();
    
    let ordeneco = [];
    for (let i = 0; i < elementos_eco.length; i++) {
        ordeneco[i] = elementos_eco[i][0];
    }
    
    if(ordeneco.length > 0) {
        $.ajax({
            url: url,
            method: "POST",
            data: {
                documento: documento,
                nombre: nombre,
                edad: edad,
                medico: medico,
                ordeneco: ordeneco,
                triage: triage
            },
            success: function(data) {
                $("body").overhang({
                    type: "success",
                    message: "La orden de ecografía se ha creado correctamente"
                });
                setTimeout(reloadPageEcografia, 3000);
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
            message: "Agregar al menos una ecografía."
        });
    }
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

const reloadPageEcografia = () => {
    location.reload();
}
