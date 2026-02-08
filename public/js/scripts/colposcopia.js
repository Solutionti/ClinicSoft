$("#table-colposcopia").DataTable({
    "lengthMenu": [10, 50, 100, 200],
    "language":{
      "processing": "Procesando",
      "search": "Buscar:",
      "lengthMenu": "Ver _MENU_ colposcopias",
      "info": "Mirando _START_ a _END_ de _TOTAL_colposcopias",
      "zeroRecords": "No encontraron resultados",
      "paginate": {
        "first":      "Primera",
        "last":       "Ultima",
        "next":       "Siguiente",
        "previous":   "Anterior"
      }
    }
   });

$("#dni").on("blur", function () {
    var url1 = baseurl + "buscarpaciente",
               dni = $("#dni").val();

       $.ajax({
        url: url1,
        method: "POST",
        data: { dni: dni },
        success: function(data) {
            if(data === "error"){
                $(".messageError").html('<div class="alert alert-danger" role="alert">El paciente no se encuentra registrado en la base de datos</div>');
            }
            else {
               data = JSON.parse(data);
               console.log(data);
               $("#nombre").val(data.apellido +" "+data.nombre);
               $(".messageError").prop("hidden", true);
            }
        },
        error: function () {
            $("body").overhang({
              type: "error",
              message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
            }); 
          }
       })
});

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
