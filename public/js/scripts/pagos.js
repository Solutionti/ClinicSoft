$(document).ready(function (){
    $("#table-pagos").DataTable({
        "lengthMenu": [10, 50, 100, 200],
        "language":{
          "processing": "Procesando",
          "search": "Buscar:",
          "lengthMenu": "Ver _MENU_  Pagos",
          "info": "Mirando _START_ a _END_ de _TOTAL_ Pagos",
          "zeroRecords": "No encontraron resultados",
          "paginate": {
            "first":      "Primera",
            "last":       "Ultima",
            "next":       "Siguiente",
            "previous":   "Anterior"
          }
        }
       });

    $("#guardar-gastos").on("click", function () {
        var url1 = baseurl + "administracion/creargasto",
            nombre = $("#nombre").val(),
            cantidad = $("#cantidad").val(),
            descripcion = $("#descripcion").val();

            $.ajax({
              url: url1,
              method: "POST",
              data:  { nombre: nombre, cantidad: cantidad, descripcion: descripcion  },
              success: function() {
                $("body").overhang({
                  type: "success",
                  message: "Paciente actualizado correctamente"
              });
              setTimeout(reloadPage, 3000);
              },
              error: function () {
                $("body").overhang({
                  type: "error",
                  message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
                }); 
              }
            });
    })
    
  $("#editarPago").on("click", function() {
    $("#modal-pagos").modal("show");
    var dni = $("#").val(""),
        nombre = $("#").val(""),
        fecha = $("#").val(""),
        hc = $("#").val(""),
        costo = $("#").val(""),
        descuento = $("#").val(""),
        comision = $("#").val(""),
        cantidad_recibida = $("#").val(""),
        especialidad = $("#").val(""),
        doctor = $("#").val(""),
        Estado = $("#").val("");
  });

});


const reloadPage = () => {
  location.reload();
}