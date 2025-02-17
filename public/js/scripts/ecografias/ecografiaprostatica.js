function ecografiaVejigaProstatica() {
    var url = baseurl + "administracion/ecografiaprostatica"; // Ajusta la URL según tu necesidad
    var documento_paciente = $("#documento_paciente").val(),
        codigo_doctor = $("#codigo_doctor").val(),
        motivo = $("#motivo").val(),
        replicacion = $("#replicacion").val(),
        paredes = $("#paredes").val(),
        contenido = $("#contenido").val(),
        detalle_contenido = $("#detalle_contenido").val(),
        imagenes_expansivas = $("#imagenes_expansivas").val(),
        detalle_imagenes = $("#detalle_imagenes").val(),
        calculos = $("#calculos").val(),
        detalle_calculos = $("#detalle_calculos").val(),
        vol_pre = $("#vol_pre").val(),
        vol_post = $("#vol_post").val(),
        retencion = $("#retencion").val(),
        descripcion = $("#descripcion").val(),
        bordes = $("#bordes").val(),
        transverso = $("#transverso").val(),
        antero_posterior = $("#antero_posterior").val(),
        longitudinal = $("#longitudinal").val(),
        volumen = $("#volumen").val(),
        otra = $("#otra").is(":checked") ? "Sí" : "No",
        observacion_textarea = $("#observacion_textarea").val(),
        conclusiones = $("#conclusiones").val();
  
    $.ajax({
      url: url,
      method: "POST",
      data: {
        documento_paciente: documento_paciente,
        codigo_doctor: codigo_doctor,
        motivo: motivo,
        replicacion: replicacion,
        paredes: paredes,
        contenido: contenido,
        detalle_contenido: detalle_contenido,
        imagenes_expansivas: imagenes_expansivas,
        detalle_imagenes: detalle_imagenes,
        calculos: calculos,
        detalle_calculos: detalle_calculos,
        vol_pre: vol_pre,
        vol_post: vol_post,
        retencion: retencion,
        descripcion: descripcion,
        bordes: bordes,
        transverso: transverso,
        antero_posterior: antero_posterior,
        longitudinal: longitudinal,
        volumen: volumen,
        otra: otra,
        observacion_textarea: observacion_textarea,
        conclusiones: conclusiones
      },
      success: function() {
        $("body").overhang({
          type: "success",
          message: "Ecografía de Vejiga y Próstata registrada correctamente"
        });
  
        // Limpiar los campos después de un insert exitoso
        $("#documento_paciente").val('');
        $("#codigo_doctor").val('');
        $("#motivo").val('');
        $("#replicacion").val('normal');
        $("#paredes").val('normal');
        $("#contenido").val('');
        $("#detalle_contenido").val('');
        $("#imagenes_expansivas").val('No');
        $("#detalle_imagenes").val('');
        $("#calculos").val('No');
        $("#detalle_calculos").val('');
        $("#vol_pre").val('');
        $("#vol_post").val('');
        $("#retencion").val('');
        $("#descripcion").val('');
        $("#bordes").val('regulares');
        $("#transverso").val('');
        $("#antero_posterior").val('');
        $("#longitudinal").val('');
        $("#volumen").val('');
        $("#otra").prop("checked", false);
        $("#observacion_textarea").val('');
        $("#conclusiones").val('');
      },
      error: function() {
        $("body").overhang({
          type: "error",
          message: "Alerta! Tenemos un problema al conectar con la base de datos. Verifica tu red.",
        }); 
      }
    });  
  }

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("otra").addEventListener("change", function() {
        let textareaContainer = document.getElementById("observacion_container");
        textareaContainer.style.display = this.checked ? "block" : "none";
    });
});

document.getElementById("contenido").addEventListener("change", function() {
    let detalleContenedor = document.getElementById("detalle_contenedor");
    if (this.value === "Sí") {
        detalleContenedor.style.display = "block";  // Muestra el input
    } else {
        detalleContenedor.style.display = "none";   // Oculta el input
    }
});

document.getElementById("imagenes_expansivas").addEventListener("change", function() {
    let detalleImagenesContenedor = document.getElementById("detalle_imagenes_contenedor");
    detalleImagenesContenedor.style.display = this.value === "Sí" ? "block" : "none";
});

function toggleInput(selectId, inputContainerId) {
    let selectElement = document.getElementById(selectId);
    let inputContainer = document.getElementById(inputContainerId);

    selectElement.addEventListener("change", function() {
        inputContainer.style.display = this.value === "Sí" ? "block" : "none";
    });
}

// Aplicar la función a este nuevo campo
toggleInput("calculos", "detalle_calculos_contenedor");