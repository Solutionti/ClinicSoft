var dias = [
  "Domingo",
  "Lunes",
  "Martes",
  "Mierc.",
  "Jueves",
  "Viernes",
  "Sabado",
];

$(document).ready(function () {
	$("#table-citas").DataTable({
        "lengthMenu": [5, 50, 100, 200],
        "language":{
          "processing": "Procesando",
          "search": "Buscar:",
          "lengthMenu": "Ver _MENU_ Citas Medicas",
          "info": "Viendo _START_ a _END_ de _TOTAL_ Citas Medicas",
          "zeroRecords": "No encontraron resultados",
          "paginate": {
            "first":      "Primera",
            "last":       "Ultima",
            "next":       "Siguiente",
            "previous":   "Anterior"
          }
        }
       });
});

$("#lupa_DNI").click(function () {
	VAL_Search_DNI();
});

$("#dni").keyup(function (e) {
  e.defaultPrevented;
  if (e.which == 13) {
    VAL_Search_DNI();
  }
});

function Cont_closest(bloque) {

	$(bloque).block({
		message: '<div class="ft-refresh-cw icon-spin font-medium-2"></div>',
		overlayCSS: {
		  backgroundColor: "#fff",
		  opacity: 0.8,
		  cursor: "wait",
		},

		css: {
		  border: 0,
		  padding: 0,
		  backgroundColor: "transparent",
		},

	});

}

function VAL_Search_DNI() {

	var url1 = baseurl + "buscarpaciente",
		dni = $("#dni").val();

	if (dni.length >= 8) {

	$.ajax({
		"url": "https://api.factiliza.com/pe/v1/dni/info/" + $("#dni").val() ,
		"method": "GET",
		"timeout": 0,
		"headers": {
		  "Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIzNzk2MyIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvcm9sZSI6ImNvbnN1bHRvciJ9.XHG0JHDs8Daik_XHbb6cr90diRfL65qu0IaFJL9GrvY"
		},

      success: function (data) {

        if (data.success) {
			var datos = data.data;
			$("#nombre").val(datos.apellido_paterno +" "+datos.apellido_materno+" "+datos.nombres);
        } else {
			$("body").overhang({
                type: "error",
                message:
                  "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
              });
        }
      },
      error: function () {
        $("body").overhang({
          type: "error",
          message:
            "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
        });
      },

    });

	} else {
		warning("Minimo debe ingresar 8 digitos");
	}

}



function Get_Horarios(insert_hora) {

	$("#Cont_Horas").empty();
	var url2 = baseurl + "administracion/traerhorarios",
		fecha = $("#fecha").val(),
		medico = $("#medico").val();

	if (fecha != "" && medico != "") {
		$.ajax({
		  url: url2,
		  method: "POST",
		  data: { medico: medico, fecha: fecha },
			success: function (data) {
				data = JSON.parse(data);
				$("#hora").empty();
				$("#hora").append('<option value="">Seleccionar</option>');
				var stta = true;

				if (data.acction == 1) {
					var arrr = data.horarios_mostrar;
					if(arrr != false){
						for (let i = 0; i < arrr.length; i++) {
							if (
							  arrr[i]["hora"] > insert_hora &&
							  stta == true &&
							  insert_hora != ""
							) {
								stta = false;
								$("#Cont_Horas").append(
									'<button type="button" onclick="btn_clock(this,' +
										"'" +
										insert_hora +
										"'" +
										')" class="btn_clock btn bg-gradient-warning" ><i class="fa fa-clock"></i>  ' +
										insert_hora +
										"</button>"
								);
								$("#hora").append(
									'<option value="' +
										insert_hora +
										'">' +
										insert_hora +
										"</option>"
								);
								/*

								console.log(

									'<option value="' +

										insert_hora +

										'">' +

										insert_hora +

										"</option>"

								);

								*/
							}

							$("#Cont_Horas").append(
								'<button type="button" onclick="btn_clock(this,' +
									"'" +
									arrr[i]["hora"] +
									"'" +
									')" class="btn_clock btn bg-gradient-info" ><i class="fa fa-clock"></i>  ' +
									arrr[i]["hora"] +
									"</button>"
							);

							$("#hora").append(
								'<option value="' +
									arrr[i]["hora"] +
									'">' +
									arrr[i]["hora"] +
									"</option>"
							);
						}
					}else{
					  $("#Cont_Horas").append(
					  '<button type="button" onclick="btn_clock(this,' +
									"'" +
									insert_hora +
									"'" +
									')" class="btn_clock btn bg-gradient-warning" ><i class="fa fa-clock"></i>  ' +
									insert_hora +
									"</button>"
							);

							$("#hora").append(

								'<option value="' +

									insert_hora +

									'">' +

									insert_hora +

									"</option>"

							);

					}

					$("body").overhang({

						type: "success",

						message: "Horarios obtenidos",

					});

				} else if (data.acction == 2) {
					$("#Cont_Horas").append(
						"No se encontraron horarios libres para esta fecha, intente con otra fecha o doctor."
					);

					$("body").overhang({
						type: "info",
						message: "No se encontraron horarios libres para esta fecha, intente con otra fecha o doctor."
					});
				}
			},

			error: function () {

				$("body").overhang({
					type: "error",
					message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
				});

			},

		});

	} else {

		warning("Completar Medico y Fecha.");

	}

}

function btn_clock(aaa, insert_hora) {

	$("#hora").val(insert_hora);

	$(".btn_clock").each(function () {

		if ($(this).hasClass("bg-gradient-warning")) {

			$(this).removeClass("bg-gradient-warning");

			$(this).addClass("bg-gradient-info");

		}

	});

	$(aaa).removeClass("bg-gradient-info");

	$(aaa).addClass("bg-gradient-warning");

}

$("#medico").change(function () {

	Get_Horarios("");

});

$("#fecha").change(function () {

	Get_Horarios("");

});

$("#lupa_Horario").click(function () {

	Get_Horarios("");

});



$("#AddCITA").keypress(function (e) {

	e.defaultPrevented;

	if (e.which == 13) {

		return false;

	}

});

$("#AddCITA").submit(function (event) {

	event.preventDefault();

	Suubtmit();

});



function Suubtmit() {

	var rruta = "";

	if ($("#statee").val() == "Registrar") {

		rruta = "crearcita";

	} else {

		rruta = "editarcita";

	}

	var url1 = baseurl + "administracion/" + rruta,

		dni = $("#dni").val(),

		idee = $("#idee").val(),

		nombre = $("#nombre").val(),

		telefono = $("#telefono").val(),

		medico = $("#medico").val(),

		fecha = $("#fecha").val(),

		hora = $("#hora").val(),

		estado = $("#estado").val(),

		observaciones = $("#observaciones").val();

	$.ajax({

		url: url1,

		method: "POST",

		data: {

			idee: idee,

			dni: dni,

			nombre: nombre,

			telefono: telefono,

			medico: medico,

			fecha: fecha,

			hora: hora,

			estado: estado,

			observaciones: observaciones,

		},

		success: function () {

			$("body").overhang({

				type: "success",

				message: "Listo",

			});

			setTimeout(reloadPage, 3000);

		},

		error: function () {

			$("body").overhang({

				type: "warning",

				message:

					"No se realizo la operacion.",

			});

		},

	});

}



function editarCita(id) {

	var url3 = baseurl + "administracion/getcitasid";

	$.ajax({

		url: url3,

		method: "POST",

		data: {

			id: id,

		},

		success: function (data) {

			$("#AgregarPaciente").modal("show");

			data = JSON.parse(data);

			$("#statee").val("Actualizar");

			$("#idee").val(data.codigo_cita);

			$("#dni").val(data.documento);

			$("#nombre").val(data.nombre);

			$("#telefono").val(data.telefono);

			$("#medico").val(data.doctor).prop("selected", true);

			$("#fecha").val(data.fecha);

			//$("#Cont_Horas").append('<button type="button" onclick="$('+"'#hora'"+').val('+"'"+arrr[i]['hora']+"'"+')" class="btn bg-gradient-warning" ><i class="fa fa-clock"></i>  '+arrr[i]['hora']+'</button>');

			//<button type="button" style="padding: 5px 15px;margin: 5px;" onclick="$('#hora').val('18:15')" class="btn bg-gradient-warning" ><i class="fa fa-clock"></i>&nbsp;&nbsp;18:15</button>

			Get_Horarios(data.hora);

			setTimeout(function () {

				$("#hora").val(data.hora).prop("selected", true);

				$("#estado").val(data.estado).prop("selected", true);

			}, 500);

			$("#observaciones").val(data.comentarios);

		},

		error: function () {

			$("body").overhang({

				type: "error",

				message:

					"Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",

			});

		},

	});

}

$("#editarcitas").on("click", function () {

	var url4 = baseurl + "administracion/editarcita",

		id = $("#id2").val(),

		medico = $("#medico2").val(),

		fecha = $("#fecha2").val(),

		hora = $("#hora2").val(),

		estado = $("#estado2").val(),

		observaciones = $("#observaciones2").val();

	$.ajax({

		url: url4,

		method: "POST",

		data: {

			id: id,

			medico: medico,

			fecha: fecha,

			hora: hora,

			estado: estado,

			observaciones: observaciones,

		},

		success: function () {

			$("body").overhang({

				type: "success",

				message: "Cita actualizada correctamente",

			});

			setTimeout(reloadPage, 3000);

		},

		error: function () {

			$("body").overhang({

				type: "error",

				message:

					"Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",

			});

		},

	});

});



const reloadPage = () => {

	location.reload();

};



var dias = [

	"Domingo",

	"Lunes",

	"Martes",

	"Miercoles",

	"Jueves",

	"Viernes",

	"Sabado",

];



var __colores = [

	"#5bd5f5",

	"#f77a92",

	"#7de78a",

	"#8187dc",

	"#959595",

	"#ffaaf5",

	"#e1c62f",

	"#ff674e",

];





function Reset_Horarios() {

	day_count = 0;

	fecha_hoy = new Date();

	var _ordenado = new Array();

	var __today = fecha_hoy.getDay();

	var a = 0;

	for (var i = __today; i < dias.length; i++) {

		_ordenado.push(dias[i]);

	}

	for (var i = 0; i < __today; i++) {

		_ordenado.push(dias[i]);

	}



	var _ordenado_html = new Array();

	var a = 0;

	

	for (var i = __today; i < dias.length; i++) {

		arr__ = horarios_diarios[i];

		arr__ = ord_arr(arr__);

		

		var _html_dias = "";

		console.log(arr_diass[a]);

		for (var iqq = 0; iqq < arr__.length; iqq++) {

			var namee__ = arr__[iqq]["namedoc"].split(" ");

			_html_dias = _html_dias + 

				"<p onclick='call_reg_cita(" +

					'"' +

					arr_diass[a] +

					'"' +

					"," +

					arr__[iqq]["doc_ide"] +

					")' class='doc_p' title='" +

					arr__[iqq]["namedoc"] +

					" " +

					//arr__[iqq]["Horas_" + (_ordenado[a]).toLowerCase()] +

					"' style='background-color: #"+arr__[iqq]["color"]+";'><i class='fa fa-user-md'></i>  Dr." +

					namee__[0].substr(0, 10).toUpperCase() +"<br><span style='font-size:9px;font-weight:bold;color:#8f8f8f;'>"+arr__[iqq]["horario"]+"<br></p>";

		}

		a++;

		_ordenado_html.push(_html_dias);

	}

	for (var i = 0; i < __today; i++) {

		arr__ = horarios_diarios[i];

		arr__ = ord_arr(arr__);

		var _html_dias = "";

		for (var iqq = 0; iqq < arr__.length; iqq++) {

			var namee__ = arr__[iqq]["namedoc"].split(" ");

			_html_dias = _html_dias + 

				"<p onclick='call_reg_cita(" +

					'"' +

					arr_diass[a] +

					'"' +

					"," +

					arr__[iqq]["doc_ide"] +

					")' class='doc_p' title='" +

					arr__[iqq]["namedoc"] +

					" " +

					//arr__[iqq]["Horas_" + (_ordenado[a]).toLowerCase()] +

					"' style='background-color: #"+arr__[iqq]["color"]+";'><i class='fa fa-user-md'></i>  Dr." +

					namee__[0].substr(0, 10).toUpperCase() +"<br><span style='font-size:9px;font-weight:bold;color:#3e3e3e;'>"+arr__[iqq]["horario"]+"<br></p>";

		}

		a++;

		_ordenado_html.push(_html_dias);

	}



	var a = 0;

	__fecha_hoy = new Date();

	$(".card > .bg-gradient-info").each(function () {

		var __today = __fecha_hoy.getDate();

		$(this).html((_ordenado[a]).slice(0, 6) + " / " + __today);

		a++;

		//$(this).html((_ordenado[a]));a++;

		__fecha_hoy = __fecha_hoy.setDate(__fecha_hoy.getDate() + 1);

		__fecha_hoy = new Date(__fecha_hoy);

	});



	var a = 0;

	$(".cont_day").each(function () {

		$(this).append(_ordenado_html[a]);

		a++;

	});

}



function ord_arr(items){

	items.sort(function (a, b) {

		if (a.hora_ordenable > b.hora_ordenable) {

		return 1;

		}

		if (a.hora_ordenable < b.hora_ordenable) {

		return -1;

		}

		// a must be equal to b

		return 0;

  	});

  	return items;

}



function Reset_HorariosAAAAAAAA() {

	day_count = 0;

	fecha_hoy = new Date();

	var _ordenado = new Array();

	var __today = fecha_hoy.getDay();

	for (var i = __today; i < dias.length; i++) {

		_ordenado.push(dias[i]);

	}

	for (var i = 0; i < __today; i++) {

		_ordenado.push(dias[i]);

	}

	var a = 0;

	__fecha_hoy = new Date();

	$(".card > .bg-gradient-info").each(function () {

		var __today = __fecha_hoy.getDate();

		$(this).html(_ordenado[a].slice(0, 6) + " / " + __today);

		a++;

		//$(this).html(_ordenado[a]);a++;

		__fecha_hoy = __fecha_hoy.setDate(__fecha_hoy.getDate() + 1);

		__fecha_hoy = new Date(__fecha_hoy);

	});

	

	var a = 0;

	//ffffecha_hoy = new Date();

	//ffffecha_hoy = (ffffecha_hoy).setDate(ffffecha_hoy.getDate() - 1);

	$(".cont_day").each(function () {

		$(this).html("");

		for (var i = 0; i < arr_doctors.length; i++) {

			if (arr_doctors[i][_ordenado[a].toLowerCase()] != 0) {

				var namee__ = arr_doctors[i]["nombre"].split(" ");

				//ffffecha_hoy = new Date(ffffecha_hoy);

				//var todayDate = ffffecha_hoy.toISOString().slice(0, 10);

				//console.log(arr_doctors[i]["nombre"] + " " + "Horas_" + _ordenado[a].toLowerCase());

				//console.log(arr_diass[day_count]);

				//console.log(todayDate);

				$(this).append(

					"<p onclick='call_reg_cita(" +

						'"' +

						arr_diass[day_count] +

						'"' +

						"," +

						arr_doctors[i]["codigo_doctor"] +

						")' class='doc_p' title='" +

						arr_doctors[i]["nombre"] +

						" " +

						arr_doctors[i]["Horas_" + _ordenado[a].toLowerCase()] +

						";' style='background-color: " +

						__colores[i] +

						";'><i class='fa fa-user-md'></i>  Dr." +

						namee__[0].substr(0, 10).toUpperCase() +

						"</p>"

				);

			}

		}

		//ffffecha_hoy = ffffecha_hoy.setDate(ffffecha_hoy.getDate() + 1);

		a++;

		day_count++;

	});

}



function call_reg_cita(fecha, medico) {

	$("#AgregarPaciente").modal("show");

	$("#AddCITA").trigger("reset");

	$("#hora").empty();

	$("#fecha").val(fecha);

	$("#medico").val(medico);

	Get_Horarios("");

}


