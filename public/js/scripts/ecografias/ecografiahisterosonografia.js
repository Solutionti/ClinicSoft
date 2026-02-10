function createEcografiaHisterosonografia() {
    // Asegúrate de que esta URL coincida con el nombre de tu función en el Controlador
    var url = baseurl + "administracion/ecografiahisterosonografia";

    // --- 1. CAPTURA DE VARIABLES ---
    var documento_paciente = $("#dni").val();
    var codigo_doctor = $("#codigo_doctor").val();
    
    // IDs de tu formulario HTML
    var motivo = $("#motivo").val();
    var descripcion_procedimiento = $("#descripcion_procedimiento").val(); // Ojo: ID camelCase -> BD snake_case
    var conclusiones = $("#conclusiones").val();
    var sugerencias = $("#sugerencias").val();

    // Validaciones básicas (opcional)
    if (motivo == "") {
        $("body").overhang({ type: "error", message: "El motivo es obligatorio." });
        return;
    }

    // --- 2. PETICIÓN AJAX ---
    $.ajax({
        url: url,
        method: "POST",
        data: {
            // Lado Izquierdo: Nombre en Controlador/BD  <-- vs --> Lado Derecho: Valor del Input
            documento_paciente: documento_paciente,
            codigo_doctor: codigo_doctor,
            motivo: motivo,
            descripcion_procedimiento: descripcion_procedimiento, 
            conclusiones: conclusiones,
            sugerencias: sugerencias
        },
        success: function(data) {
            // Mensaje de Éxito
            $("body").overhang({
                type: "success",
                message: "Histerosonografía registrada correctamente."
            });

            // Limpiar campos
            $("#motivo").val("");
            $("#descripcionProcedimiento").val("");
            $("#conclusiones").val("");
            $("#sugerencias").val("");

            // Generar PDF y Recargar
            // Asegúrate de tener esta función definida o llamar a window.open
            generarpdfHisterosonografia(); 
            
            setTimeout(function() {
                location.reload();
            }, 2000);
        },
        error: function() {
            $("body").overhang({
                type: "error",
                message: "Alerta! Error al conectar con la base de datos."
            });
        }
    });
}

function generarpdfHisterosonografia() {
  let dni = $("#dni").val();
  let url = baseurl + "administracion/pdfecografiahisterosonografia/" + dni;
  window.open(url, "_blank", " width=950, height=1000");
} 

function cargarHisteroNormal() {
    // 1. Motivo por defecto (opcional)
    $('#motivo').val('Evaluación de cavidad endometrial');
    
    // 2. TEXTO EXACTO DE TU IMAGEN
    var textoBase = "Previa colocación de sondas foley N° 8 se instila 15 cc de NaCl 0.9%, se observa imágenes en cavidad endometrial una de 6 x 4 mm en pared psoterior a 17 mm del fondo de cavidad endometrial (tipo 0 ) y otro de 4 x 5 mm en cara anterior a 8 mm del fondo de la cavidad endometrial. LA PACIENTE TOLERA EL PROCEDIMIENTO.";

    // 3. Insertar en el textarea
    $('#descripcion_procedimiento').val(textoBase);
    
    // 4. Conclusiones y Sugerencias vacías o por defecto
    $('#conclusiones').val('IMÁGENES SUGESTIVAS DE PÓLIPOS ENDOMETRIALES.');
    $('#sugerencias').val('Correlato histopatológico.');
}