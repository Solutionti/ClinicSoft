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
});

function editarPagos(codigo) {
  $("#modal-pagos").modal("show");
  var url = baseurl  + "administracion/getpagos/" + codigo;
      $.ajax({
        url: url,
        method: "GET",
        success: function(data) {
          data = JSON.parse(data);
          console.log(data);
          $("#atencionpa").val(data.codigo_atencion);
          $("#codigo_pago").val(data.codigo_pago);
          $("#dni").val(data.dni_paciente);
          $("#fecha").val(data.fecha);
          $("#costo").val(data.total)
          $("#descuento").val(data.descuento);
          $("#comision").val(data.comision);
          $("#cantidad_recibida").val(data.cantidad_recibida);
          $("#doctor").val(data.medico);
          $("#especialidad").val(data.especialidad);
          $("#nombre").val(data.apellido + "" + data.nombre);
          $("#hc").val(data.hc);
          $("#estado").val(data.estado);
        },
        error: function() {

        }
      })
}

$("#guardarDatosPagos").on("click", function(){
  var url = baseurl + "administracion/actualizarpagos";

  var atencion = $("#atencionpa").val(),
      codigo_pago = $("#codigo_pago").val(), 
      dni = $("#dni").val(),
      nombre = $("#nombre").val(),
      fecha = $("#fecha").val(),
      hc = $("#hc").val(),
      costo = $("#costo").val(),
      descuento = $("#descuento").val(),
      comision = $("#comision").val(),
      cantidad_recibida = $("#cantidad_recibida").val(),
      especialidad = $("#especialidad").val(),
      doctor = $("#doctor").val(),
      estado = $("#estado").val();

    $.ajax({
      url: url,
      method: "POST",
      data: {
        atencion: atencion,
        codigo_pago: codigo_pago,
        costo: costo,
        descuento: descuento,
        comision: comision,
        cantidad_recibida: cantidad_recibida,
        especialidad: especialidad,
        doctor: doctor,
        estado: estado
      },
      success: function() {
        $("body").overhang({
          type: "success",
          message: "El pago se ha  actualizado correctamente"
        });
        setTimeout(reloadPage, 3000);
      },
      error: function() {
        $("body").overhang({
          type: "error",
          message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
        }); 
      }
    })
}) 


const reloadPage = () => {
  location.reload();
}