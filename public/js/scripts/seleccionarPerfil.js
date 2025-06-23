// Variables globales para las tablas de laboratorio
var table_lab;
var table_lab_mini;
var elementos_laboratorio = [];

// Función para limpiar la selección de análisis
function limpiarSeleccion() {
    // Limpiar la tabla de seleccionados si existe
    if (table_lab_mini && $.fn.DataTable.isDataTable('#table-laboratorio-items')) {
        table_lab_mini.clear().draw();
    }
    
    // Limpiar selección actual
    elementos_laboratorio = [];
    if (table_lab_mini && $.fn.DataTable.isDataTable('#table-laboratorio-items')) {
        table_lab_mini.clear().draw();
    }
    
    // Mostrar todas las filas en la tabla de origen
    if (table_lab && $.fn.DataTable.isDataTable('#table-laboratorio')) {
        table_lab.rows().every(function() {
            $(this.node()).show();
        });
    }
    
    // Limpiar el array de elementos
    elementos_laboratorio = [];
    
    // Resetear el selector de perfiles
    $('#selectPerfil').val('');
    
    console.log('Se han deseleccionado todos los análisis');
}

// Función para seleccionar perfiles de laboratorio
function seleccionarPerfil() {
    // Obtener el perfil seleccionado
    var perfilSeleccionado = $('#selectPerfil').val();
    
    // Validar perfil seleccionado
    if (!perfilSeleccionado) {
        console.warn('No se seleccionó ningún perfil');
        return;
    }
    
    // Limpiar solo la selección actual (no la tabla de origen)
    elementos_laboratorio = [];
    if (table_lab_mini && $.fn.DataTable.isDataTable('#table-laboratorio-items')) {
        table_lab_mini.clear().draw();
    }
    
    // Mostrar todas las filas en la tabla de origen
    if (table_lab && $.fn.DataTable.isDataTable('#table-laboratorio')) {
        table_lab.rows().every(function() {
            $(this.node()).show();
        });
    }
    
    // Definir perfiles de laboratorio con códigos de análisis
    var perfilesLaboratorio = {
        'preoperatorio': [
            '238', //hemograma 
            '224',  //grupo sanguineo y factor Rh
            '402',  //coagulacion
            '404',  //sangria
            '221', //glucosa
            '430', //urea
            '150', //creatinina
            '259',  //hiv
            '247',  //hbsag
            '448'  //examen orina
        ],
        'perfil_prenatal': [
            '238',  
            '224',    
            '221', 
            '430', 
            '150', 
            '259',  
            '247',  
            '448'   
        ],
        'perfil_recien_nacido': [
            '238',
            '224',
            '221',
            '96',
            '64'
        ],
        'perfil_coagulacion': [
            '402',
            '404',
            '403',
            '406',
            '405',
            '374',
            '209',
            '178',
            '47',
            '363'

        ],
        'perfil_cardiaco': [
            '134',
            '96',
            '230',
            '356',
            '362',
            '426',

        ],
        'perfil_torch': [
            '413',
            '117',
            '379',
            '252',
            
        ],
        'perfil_hepatico': [
            '416',
            '417',
            '210',
            '64',   
            '216',
            '403',
            '365',
            
        ],
        'perfil_lipidico': [
            '134',
            '230',
            '290',
            '442',  
            
        ],
        'perfil_prostatico': [
            '371',
            '370', 
            
        ],
        'perfil_reumatico': [
            '207',
            '437', 
            '9',
            '361',
            '45',
            '202',
            '44',

            
        ],
        'perfil_diabetes': [
            '221',
            '222', 
            '287',
            '288',
            '237',
            '236',
            '307',
            '397',

            
        ],
        'perfil_renal': [
            '150',
            '170', 
            '368',
            '307',
            '430',
            '308',
            '366',
            '9',
            

            
        ],
        'perfil_fertilidad': [
            '267',
            '268', 
            '196',
            '358',
            '354',
            '228',
            '229',
            '450',
            '400',
            '27',
            '173',
            '193',
            '401',
            '265',
            '359',
            
        ]
    };
    
    // Validar perfil seleccionado
    if (!perfilesLaboratorio[perfilSeleccionado]) {
        console.warn('No se encontró el perfil seleccionado');
        return;
    }
    
    console.group('Selección de perfil: ' + perfilSeleccionado);
    
    try {
        // Inicializar tablas si no están inicializadas
        if (!$.fn.DataTable.isDataTable('#table-laboratorio')) {
            table_lab = $('#table-laboratorio').DataTable({
                "lengthMenu": [5, 50, 100, 200],
                "language": {
                    "processing": "Procesando",
                    "search": "Buscar:",
                    "lengthMenu": "Ver _MENU_ Laboratorio",
                    "info": "Mirando _START_ a _END_ de _TOTAL_ Laboratorio",
                    "zeroRecords": "No se encontraron resultados",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "columnDefs": [
                    { 
                        "targets": "_all",
                        "className": "small"
                    }
                ],
                "drawCallback": function(settings) {
                    $(this).closest('.dataTables_wrapper').addClass('small');
                },
                "initComplete": function() {
                    var table = this.api().table().container();
                    $(table).addClass('table-sm small');
                    $(table).find('th, td').addClass('small');
                }
            });
        } else if (!table_lab) {
            table_lab = $('#table-laboratorio').DataTable();
            
            var table = table_lab.table().container();
            $(table).addClass('table-sm');
            $(table).closest('.dataTables_wrapper')
                .find('.dataTables_length select, .dataTables_filter input')
                .addClass('form-control form-control-sm')
                .css({
                    'font-size': '12px',
                    'height': '30px',
                    'padding': '0.25rem 0.5rem'
                });
        }
        
        if (!$.fn.DataTable.isDataTable('#table-laboratorio-items')) {
            table_lab_mini = $('#table-laboratorio-items').DataTable({
                "lengthMenu": [5, 50, 100, 200],
                "language": {
                    "processing": "Procesando",
                    "search": "Buscar:",
                    "lengthMenu": "Ver _MENU_ Laboratorio",
                    "info": "Mirando _START_ a _END_ de _TOTAL_ Laboratorio",
                    "zeroRecords": "No se encontraron resultados",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "columnDefs": [
                    { 
                        "targets": "_all",
                        "className": "small"
                    }
                ],
                "drawCallback": function(settings) {
                    $(this).closest('.dataTables_wrapper').addClass('small');
                },
                "initComplete": function() {
                    var table = this.api().table().container();
                    $(table).addClass('table-sm small');
                    $(table).find('th, td').addClass('small');
                }
            });
        } else if (!table_lab_mini) {
            table_lab_mini = $('#table-laboratorio-items').DataTable();
            
            var table = table_lab_mini.table().container();
            $(table).addClass('table-sm');
            $(table).find('th, td').addClass('text-xs');
            $(table).closest('.dataTables_wrapper')
                .find('.dataTables_length select, .dataTables_filter input')
                .addClass('form-control form-control-sm')
                .css({
                    'font-size': '12px',
                    'height': '30px',
                    'padding': '0.25rem 0.5rem'
                });
        }
        
        // Obtener pruebas para el perfil seleccionado
        var pruebasPerfil = perfilesLaboratorio[perfilSeleccionado];
        console.log('Pruebas en el perfil:', pruebasPerfil);
        
        // Búsqueda por códigos de análisis
        console.group('Búsqueda por códigos');
        var totalAgregados = 0;
        var idsProcesados = new Set();
        
        // Buscar cada código en la tabla
        pruebasPerfil.forEach(function(codigoBuscado) {
            table_lab.rows().every(function() {
                var rowData = this.data();
                var rowNode = this.node();
                var codigoPrueba = String(rowData[0] || '').trim();
                
                // Si coincide el código y no ha sido procesado
                if (codigoBuscado === codigoPrueba && !idsProcesados.has(codigoPrueba)) {
                    console.log('Análisis encontrado por código:', {
                        codigo: codigoPrueba,
                        nombre: rowData[1]
                    });
                    
                    // Agregar a la tabla de seleccionados
                    var newRow = table_lab_mini.row.add([
                        rowData[0], // Código
                        rowData[1]  // Nombre
                    ]).draw(false).node();
                    
                    // Aplicar estilos
                    $(newRow).find('td').addClass('text-xs');
                    
                    // Verificar si ya existe en el array de elementos
                    var existe = elementos_laboratorio.some(function(item) {
                        return item.id === rowData[0];
                    });
                    
                    // Solo agregar si no existe ya
                    if (!existe) {
                        var nuevoElemento = {
                            id: rowData[0],
                            nombre: rowData[1],
                            precio: rowData[2] || 0
                        };
                        elementos_laboratorio.push(nuevoElemento);
                        console.log('Elemento agregado:', nuevoElemento);
                    }
                    
                    // Ocultar en la tabla de origen
                    $(rowNode).hide();
                    
                    // Marcar como procesado
                    idsProcesados.add(codigoPrueba);
                    totalAgregados++;
                }
                
                return true; // Continuar con la siguiente fila
            });
        });
        
        console.groupEnd();
        console.log(`Total de pruebas agregadas: ${totalAgregados}`);
        
        // Asegurar que las tablas tengan el mismo estilo
        $('.dataTables_wrapper .dataTables_length select, .dataTables_wrapper .dataTables_filter input')
            .addClass('form-control form-control-sm')
            .css('width', 'auto');
            
        // Actualizar totales si existe la función
        if (typeof actualizarTotal === 'function') {
            actualizarTotal();
        }
        
        // Mostrar notificación de éxito
        if (totalAgregados > 0) {
            $("body").overhang({
                type: 'success',
                message: `Se agregaron ${totalAgregados} pruebas al perfil`,
                duration: 2
            });
        } else {
            $("body").overhang({
                type: 'warn',
                message: 'No se encontraron pruebas para este perfil',
                duration: 2
            });
        }
        
    } catch (error) {
        console.error('Error en seleccionarPerfil:', error);
        $("body").overhang({
            type: 'error',
            message: 'Error al procesar el perfil: ' + error.message,
            duration: 4
        });
    } finally {
        console.groupEnd();
    }
}

// Función para actualizar el total de la orden
function actualizarTotal() {
    var total = 0;
    
    // Sumar los precios de todos los elementos seleccionados
    elementos_laboratorio.forEach(function(item) {
        total += parseFloat(item.precio) || 0;
    });
    
    // Actualizar el elemento que muestra el total
    $('#totalOrden').text('S/ ' + total.toFixed(2));
    
    console.log('Total actualizado:', total);
}

// Inicializar las tablas cuando el documento esté listo
$(document).ready(function() {
    // Configurar manejador de eventos para el botón de limpieza
    $(document).on('click', '#btnLimpiarSeleccion', function() {
        limpiarSeleccion();
    });
    
    // Inicializar las tablas si no lo están
    if ($.fn.DataTable.isDataTable('#table-laboratorio')) {
        table_lab = $('#table-laboratorio').DataTable();
    }
    
    if ($.fn.DataTable.isDataTable('#table-laboratorio-items')) {
        table_lab_mini = $('#table-laboratorio-items').DataTable();
    }
    
    // Inicializar el evento de doble clic para la tabla de laboratorio
    $(document).on('dblclick', '#table-laboratorio tbody tr', function() {
        var rowData = table_lab.row(this).data();
        
        // Verificar si ya existe en la lista de seleccionados
        if (!elementos_laboratorio.some(function(item) { 
            return item[0] === rowData[0]; 
        })) {
            elementos_laboratorio.push(rowData);
            
            // Agregar a la tabla de elementos seleccionados
            var rowNode = table_lab_mini.row.add([
                rowData[0], // Código
                rowData[1]  // Nombre del análisis
            ]).draw(false).node();
            
            // Aplicamos text-xs para que coincida con la tabla de origen
            $(rowNode).find('td').addClass('text-xs');
            
            // Ocultar de la tabla de origen
            $(this).hide();
            
            // Actualizar totales si existe la función
            if (typeof actualizarTotal === 'function') {
                actualizarTotal();
            }
        }
    });
});
