// Variables globales para las tablas de laboratorio
var table_lab;
var table_lab_mini;
var elementos_laboratorio = [];

// Función para seleccionar perfiles de laboratorio
function seleccionarPerfil() {
    // Obtener el perfil seleccionado
    var perfilSeleccionado = $('#selectPerfil').val();
    
    // Definir perfiles de laboratorio con nombres normalizados
    var perfilesLaboratorio = {
        'preoperatorio': [
            'HEMOGRAMA COMPLETO', 
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
    
    // Validar perfil seleccionado
    if (!perfilSeleccionado || !perfilesLaboratorio[perfilSeleccionado]) {
        console.warn('No se seleccionó un perfil válido');
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
                    // Asegurar que el contenedor de la tabla tenga la clase small
                    $(this).closest('.dataTables_wrapper').addClass('small');
                },
                "initComplete": function() {
                    // Aplicar estilos directamente a la tabla
                    var table = this.api().table().container();
                    $(table).addClass('table-sm small');
                    $(table).find('th, td').addClass('small');
                }
            });
        } else if (!table_lab) {
            table_lab = $('#table-laboratorio').DataTable();
            
            // Aplicar estilos si la tabla ya estaba inicializada
            var table = table_lab.table().container();
            $(table).addClass('table-sm');
            // Aplicar estilos en línea para el tamaño de fuente
            $(table).css('font-size', '12px');
            $(table).find('th, td').css({
                'font-size': '12px',
                'padding': '4px 8px'
            });
            // Asegurar que los inputs de búsqueda y select tengan el mismo tamaño
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
                    // Asegurar que el contenedor de la tabla tenga la clase small
                    $(this).closest('.dataTables_wrapper').addClass('small');
                },
                "initComplete": function() {
                    // Aplicar estilos directamente a la tabla
                    var table = this.api().table().container();
                    $(table).addClass('table-sm small');
                    $(table).find('th, td').addClass('small');
                }
            });
        } else if (!table_lab_mini) {
            table_lab_mini = $('#table-laboratorio-items').DataTable();
            
            // Aplicar estilos si la tabla ya estaba inicializada
            var table = table_lab_mini.table().container();
            $(table).addClass('table-sm');
            // Aplicar estilos en línea para el tamaño de fuente
            $(table).css('font-size', '12px');
            $(table).find('th, td').css({
                'font-size': '12px',
                'padding': '4px 8px'
            });
            // Asegurar que los inputs de búsqueda y select tengan el mismo tamaño
            $(table).closest('.dataTables_wrapper')
                .find('.dataTables_length select, .dataTables_filter input')
                .addClass('form-control form-control-sm')
                .css({
                    'font-size': '12px',
                    'height': '30px',
                    'padding': '0.25rem 0.5rem'
                });
        }
        
        // Limpiar selección actual
        elementos_laboratorio = [];
        table_lab_mini.clear().draw();
        
        // Mostrar todas las filas en la tabla de origen
        table_lab.rows().every(function() {
            $(this.node()).show();
        });
        
        // Obtener pruebas para el perfil seleccionado
        var pruebasPerfil = perfilesLaboratorio[perfilSeleccionado];
        console.log('Pruebas en el perfil:', pruebasPerfil);
        
        // Objeto para almacenar las pruebas encontradas, usando el nombre original como clave
        var pruebasEncontradas = {};
        
        // Inicializar el objeto de pruebas encontradas
        pruebasPerfil.forEach(function(clave) {
            pruebasEncontradas[clave] = [];
        });
        
        // Primera pasada: Búsqueda exacta
        console.group('Búsqueda exacta');
        table_lab.rows().every(function() {
            var rowData = this.data();
            var rowNode = this.node();
            var nombrePrueba = (rowData[1] || '').toString().trim().toUpperCase();
            
            // Buscar coincidencia exacta
            if (pruebasPerfil.includes(nombrePrueba)) {
                console.log('Coincidencia exacta encontrada:', nombrePrueba);
                pruebasEncontradas[nombrePrueba].push({
                    row: this,
                    data: rowData,
                    node: rowNode,
                    tipo: 'exacta',
                    keyword: nombrePrueba
                });
            }
            
            return true; // Continuar con la siguiente fila
        });
        console.groupEnd();
        
        // Segunda pasada: Búsqueda de frases completas (solo si no se encontró coincidencia exacta)
        console.group('Búsqueda de frases');
        table_lab.rows().every(function() {
            var rowData = this.data();
            var rowNode = this.node();
            var nombrePrueba = (rowData[1] || '').toString().trim().toUpperCase();
            
            // Solo procesar si no está ya en pruebasEncontradas
            var yaEncontrado = Object.values(pruebasEncontradas).some(pruebas => 
                pruebas.some(p => p.data[0] === rowData[0])
            );
            
            if (!yaEncontrado) {
                pruebasPerfil.forEach(function(palabraClave) {
                    // Solo buscar frases (con espacios) que no tengan ya resultados
                    if (palabraClave.includes(' ') && pruebasEncontradas[palabraClave].length === 0) {
                        if (nombrePrueba.includes(palabraClave)) {
                            console.log('Frase encontrada:', palabraClave, 'en', nombrePrueba);
                            pruebasEncontradas[palabraClave].push({
                                row: this,
                                data: rowData,
                                node: rowNode,
                                tipo: 'frase',
                                keyword: palabraClave
                            });
                        }
                    }
                }.bind(this));
            }
            
            return true; // Continuar con la siguiente fila
        });
        console.groupEnd();
        
        // Tercera pasada: Búsqueda de palabras individuales (solo si no se encontró coincidencia)
        console.group('Búsqueda de palabras');
        table_lab.rows().every(function() {
            var rowData = this.data();
            var rowNode = this.node();
            var nombrePrueba = (rowData[1] || '').toString().trim().toUpperCase();
            
            // Solo procesar si no está ya en pruebasEncontradas
            var yaEncontrado = Object.values(pruebasEncontradas).some(pruebas => 
                pruebas.some(p => p.data[0] === rowData[0])
            );
            
            if (!yaEncontrado) {
                pruebasPerfil.forEach(function(palabraClave) {
                    // Solo buscar palabras individuales (sin espacios) que no tengan ya resultados
                    if (!palabraClave.includes(' ') && pruebasEncontradas[palabraClave].length === 0) {
                        var regex = new RegExp('\\b' + palabraClave + '\\b', 'i');
                        if (regex.test(nombrePrueba)) {
                            console.log('Palabra encontrada:', palabraClave, 'en', nombrePrueba);
                            pruebasEncontradas[palabraClave].push({
                                row: this,
                                data: rowData,
                                node: rowNode,
                                tipo: 'palabra',
                                keyword: palabraClave
                            });
                        }
                    }
                }.bind(this));
            }
            
            return true; // Continuar con la siguiente fila
        });
        console.groupEnd();
        
        // Procesar resultados en el orden del perfil
        console.group('Procesando resultados');
        var totalAgregados = 0;
        var idsProcesados = new Set();
        
        pruebasPerfil.forEach(function(palabraClave) {
            var pruebas = pruebasEncontradas[palabraClave] || [];
            console.log(`Procesando "${palabraClave}": ${pruebas.length} coincidencias`);
            
            pruebas.forEach(function(item) {
                var idPrueba = item.data[0];
                
                // Evitar duplicados
                if (!idsProcesados.has(idPrueba)) {
                    // Agregar a la tabla de seleccionados
                    var rowNode = table_lab_mini.row.add([
                        item.data[0], // Código
                        item.data[1]  // Nombre del análisis
                    ]).draw(false).node();
                    
                    // Aplicar estilo de fuente más pequeño
                    $(rowNode).css('font-size', '11px');
                    $(rowNode).find('td').css('font-size', '11px');
                    
                    // Agregar al array de elementos
                    elementos_laboratorio.push({
                        id: idPrueba,
                        nombre: item.data[1],
                        precio: item.data[2]
                    });
                    
                    // Ocultar en la tabla de origen
                    $(item.node).hide();
                    
                    // Marcar como procesado
                    idsProcesados.add(idPrueba);
                    totalAgregados++;
                    
                    console.log(`✅ Añadido: ${item.data[1]}`);
                } else {
                    console.log(`⏩ Ya procesado: ${item.data[1]}`);
                }
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

// Inicializar las tablas cuando el documento esté listo
$(document).ready(function() {
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
            
            // Aplicar estilo de fuente más pequeño
            $(rowNode).css('font-size', '11px');
            $(rowNode).find('td').css('font-size', '11px');
            
            // Ocultar de la tabla de origen
            $(this).hide();
            
            // Actualizar totales si existe la función
            if (typeof actualizarTotal === 'function') {
                actualizarTotal();
            }
        }
    });
});
