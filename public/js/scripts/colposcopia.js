
// Función para previsualizar imágenes
function previewImage(input, imgId, textId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(imgId).attr('src', e.target.result);
            $(imgId).show();
            $(textId).hide();
            // Update label with filename
            var fileName = input.files[0].name;
            $(input).next('.custom-file-label').html(fileName);
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        $(imgId).hide();
        $(textId).show();
        $(input).next('.custom-file-label').html('Seleccionar Archivo');
    }
}

// Bind events for image inputs
$("#inputImg1").change(function() {
    previewImage(this, "#preview1", "#text-preview1");
});
$("#inputImg2").change(function() {
    previewImage(this, "#preview2", "#text-preview2");
});
$("#inputImg3").change(function() {
    previewImage(this, "#preview3", "#text-preview3");
});

$("#table-colposcopia").DataTable({
    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
    "pageLength": 5,
    "order": [[ 3, "desc" ]], // Ordenar por Fecha (columna index 3) descendente
    "language":{
      "processing": "Procesando",
      "search": "Buscar:",
      "lengthMenu": "Ver _MENU_ colposcopias",
      "info": "Mirando _START_ a _END_ de _TOTAL_ colposcopias",
      "zeroRecords": "No encontraron resultados",
      "paginate": {
        "first":      "Primera",
        "last":       "Ultima",
        "next":       "Siguiente",
        "previous":   "Anterior"
      }
    }
   });
