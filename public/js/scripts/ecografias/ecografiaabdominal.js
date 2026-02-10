function createEcografiaAbdominal() {
    var url = baseurl + "administracion/ecografiaabdominal";
    
    // Datos Paciente
    var documento_paciente = $("#dni").val();
    var codigo_doctor = $("#codigo_doctor").val();
    var motivo = $("#motivo").val();

    // Hígado y Vías Biliares
    var higado_tamano = $("#higado_tamano").val();
    var higado_eco = $("#higado_eco").val();
    var coledoco_diametro = $("#coledoco_diametro").val();
    var vesicula_paredes = $("#vesicula_paredes").val();
    var vesicula_detalles = $("#vesicula_detalles").val();

    // Páncreas y Bazo
    var pancreas = $("#pancreas").val();
    var bazo_tamano = $("#bazo_tamano").val();
    var bazo_aspecto = $("#bazo_aspecto").val();

    // Riñones (Medidas y Aspecto)
    var rd_long = $("#rd_long").val();
    var rd_par = $("#rd_par").val();
    var rinon_derecho = $("#rinon_derecho").val(); // Aspecto (Conservado, Litiasis...)

    var ri_long = $("#ri_long").val();
    var ri_par = $("#ri_par").val();
    var rinon_izquierdo = $("#rinon_izquierdo").val(); // Aspecto

    // Otros
    var estomago = $("#estomago").val();
    var otros_hallazgos = $("#otros_hallazgos").val();
    var conclusiones = $("#conclusiones").val(); // Ojo: ID es conclusiones (plural) en tu HTML
    var sugerencias = $("#sugerencias").val();

    $.ajax({
        url: url,
        method: "POST",
        data: {
            documento_paciente: documento_paciente,
            codigo_doctor: codigo_doctor,
            motivo: motivo,
            
            higado_tamano: higado_tamano,
            higado_eco: higado_eco,
            coledoco_diametro: coledoco_diametro,
            vesicula_paredes: vesicula_paredes,
            vesicula_detalles: vesicula_detalles,
            
            pancreas: pancreas,
            bazo_tamano: bazo_tamano,
            bazo_aspecto: bazo_aspecto,
            
            rd_long: rd_long,
            rd_par: rd_par,
            rinon_derecho: rinon_derecho,
            
            ri_long: ri_long,
            ri_par: ri_par,
            rinon_izquierdo: rinon_izquierdo,
            
            estomago: estomago,
            otros_hallazgos: otros_hallazgos,
            conclusiones: conclusiones,
            sugerencias: sugerencias
        },
        success: function() {
            $("body").overhang({
                type: "success",
                message: "Ecografía Abdominal registrada correctamente"
            });

            // Limpiar campos
            $("#documento_paciente").val('');
            $("#motivo").val('');
            $("#higado_tamano").val('');
            $("#higado_eco").val('');
            $("#coledoco_diametro").val('');
            $("#vesicula_paredes").val('');
            $("#vesicula_detalles").val('');
            $("#pancreas").val('');
            $("#bazo_tamano").val('');
            $("#bazo_aspecto").val('');
            $("#rd_long").val('');
            $("#rd_par").val('');
            $("#rinon_derecho").val('');
            $("#ri_long").val('');
            $("#ri_par").val('');
            $("#rinon_izquierdo").val('');
            $("#estomago").val('');
            $("#otros_hallazgos").val('');
            $("#conclusiones").val('');
            $("#sugerencias").val('');

            // PDF y Recarga
            generarpdfAbdominal(); // Asegúrate de tener esta función JS definida o cámbiala por la tuya
            setTimeout(function() {
                location.reload();
            }, 2000);
        },
        error: function() {
            $("body").overhang({
                type: "error",
                message: "Alerta! Tenemos un problema al conectar con la base de datos."
            });
        }
    });
}

  function generarpdfAbdominal() {
    let dni = $("#dni").val();
    let url = baseurl + "administracion/pdfecografiaabdominal/" + dni;
    window.open(url, "_blank", " width=950, height=1000");
  }    

  function cargarAbdominalNormal() {
    // Motivo
    document.getElementById('motivo').value = "Chequeo General";

    // Hígado y Vías
    document.getElementById('higado_tamano').value = "140";
    document.getElementById('higado_eco').value = "Conservada";
    document.getElementById('coledoco_diametro').value = "4";
    document.getElementById('vesicula_paredes').value = "Paredes Delgadas";
    document.getElementById('vesicula_detalles').value = "Anecoica, alitiásica.";

    // Páncreas y Bazo
    document.getElementById('pancreas').value = "Páncreas de tamaño y ecoestructura conservada. Wirsung no dilatado.";
    document.getElementById('bazo_tamano').value = "90";
    document.getElementById('bazo_aspecto').value = "Homogéneo";

    // Riñones
    document.getElementById('rd_long').value = "105";
    document.getElementById('rd_par').value = "15";
    document.getElementById('rinon_derecho').value = "Conservado";

    document.getElementById('ri_long').value = "108";
    document.getElementById('ri_par').value = "16";
    document.getElementById('rinon_izquierdo').value = "Conservado";

    // Final
    document.getElementById('estomago').value = "Cámaras gástricas con contenido habitual.";
    document.getElementById('otros_hallazgos').value = "No se evidencia líquido libre. Grandes vasos de calibre conservado.";
    document.getElementById('conclusiones').value = "ECOGRAFÍA ABDOMINAL DENTRO DE LÍMITES NORMALES.";
    document.getElementById('sugerencias').value = "-";
}