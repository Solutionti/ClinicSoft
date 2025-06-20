var urlpacientes = baseurl + "administracion/pacientes/cargar_pacientes";

$("#table-pacientes").DataTable({
	bProcessing: true,
	serverSide: true,
	ajax: {
		url: urlpacientes,
		type: "post",
		error: function () {
		},
	},
	lengthMenu: [10, 50, 100, 200],
	language: {
		processing: "Procesando",
		search: "Buscar:",
		lengthMenu: "Ver _MENU_  Pacientes",
		info: "Mirando _START_ a _END_ de _TOTAL_ Pacientes",
		zeroRecords: "No encontraron resultados",
		paginate: {
		  first: "Primera",
		  last: "Ultima",
		  next: "Siguiente",
		  previous: "Anterior",
		},
	},
});

var responsable = $("input:radio[name=responsable]").change(function () {
	if ($(this).val() === "si") {
		$(".responsable").attr("hidden", false);
	}
});

$("#crearpaciente").on("click", function () {
	var url1 = baseurl + "crearpacientes",
		dni = $("#dni").val(),
		nombre = $("#nombre").val(),
		apellido = $("#apellido").val(),
		hc = $("#hc").val(),
		celular = $("#celular").val(),
		sexo = $("#sexo").val(),
		fecha_nacimiento = $("#fecha_nacimiento").val(),
		edad = $("#edad").val(),
		direccion = $("#direccion").val(),
		departamento = $("#departamento").val(),
		provincia = $("#provincia").val(),
		distrito = $("#distrito").val(),
		ocupacion = $("#ocupacion").val(),
		grado_academico = $("#grado_academico").val(),
		estado_civil = $("#estado_civil").val(),
		responsable = $("input:radio[name=responsable]").val(),
		documento = $("#documento").val(),
		fresponsable = $("#fresponsable").val(),
		parentesco = $("#parentesco").val();

	if (dni === "") {

		$("#dni").addClass("is-invalid");

	} else if (nombre === "") {

		$("#dni").removeClass("is-invalid");
		$("#dni").addClass("is-valid");
		$("#nombre").addClass("is-invalid");

	} else if (celular === "") {

		$("#nombre").removeClass("is-invalid");
		$("#nombre").addClass("is-valid");
		$("#celular").addClass("is-invalid");

	} else if (sexo === "") {

		$("#celular").removeClass("is-invalid");
		$("#celular").addClass("is-valid");
		$("#sexo").addClass("is-invalid");

	} else if (fecha_nacimiento === "") {

		$("#sexo").removeClass("is-invalid");
		$("#sexo").addClass("is-valid");
		$("#fecha_nacimiento").addClass("is-invalid");

	} else if (direccion === "") {

		$("#fecha_nacimiento").removeClass("is-invalid");
		$("#fecha_nacimiento").addClass("is-valid");
		$("#direccion").addClass("is-invalid");

	} else if (departamento === "") {

		$("#direccion").removeClass("is-invalid");
		$("#direccion").addClass("is-valid");
		$("#departamento").addClass("is-invalid");

	} else if (provincia === "") {

		$("#departamento").removeClass("is-invalid");
		$("#departamento").addClass("is-valid");
		$("#provincia").addClass("is-invalid");

	} else if (distrito === "") {

		$("#provincia").removeClass("is-invalid");
		$("#provincia").addClass("is-valid");
		$("#distrito").addClass("is-invalid");
	}

	else {
		$.ajax({
			url: url1,
			method: "POST",
			data: {
			  dni: dni,
				nombre: nombre,
				apellido: apellido,
				hc: hc,
				celular: celular,
				sexo: sexo,
				fecha_nacimiento: fecha_nacimiento,
				edad: edad,
				direccion: direccion,
				departamento: departamento,
				provincia: provincia,
				distrito: distrito,
				ocupacion: ocupacion,
				grado_academico: grado_academico,
				estado_civil: estado_civil,
				responsable: responsable,
				documento: documento,
				fresponsable: fresponsable,
			},

			success: function (json) {
            json =  JSON.parse(json);
            if(json.success == 1){//Paciente Actualizado Correctamente,
               $("body").overhang({
               type: "success",
               message: json.message
               });

               setTimeout(reloadPage, 3000);

            }
			else {
               $("body").overhang({
               type: "warn",
               message: json.message
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
	}
});

$("#fecha_nacimiento").on("blur", function () {
	let fechas = new Date().getTime();
	let cumpleanios = new Date($(this).val()).getTime();
	const anios = (fechas - cumpleanios) / 3.154e10;
	anos = Math.floor(anios);
	$("#edad").val(anos);
	$("#edad").attr("readonly", true);
});

/*************** API RENIEC  ***********/

$("#dni").keyup(function (e) {//keyup se Ejecuta al levantar la soltar la tecla presionada
  e.defaultPrevented;//defaultPrevented anula funciones por default
  if (e.which == 13) {//valido que la tecla soltada sea 13==Tecla Enter
	Buscar_Paciente();
  }
});

$("#dni").on("onblur", function (e) {//keyup se Ejecuta al levantar la soltar la tecla presionada
  Buscar_Paciente();
});

function Buscar_Paciente(dni) {
	url2 =
		"https://my.apidev.pro/api/dni/" +
		$("#dni").val() +
		"?api_token=" +
		"e02a95cc4b8e0d521d447c0786af76cdb424b1a2ba23aed9f7cd9e9bc4712e86";
	$.ajax({
		"url": "https://api.factiliza.com/pe/v1/dni/info/" + $("#dni").val() ,
		"method": "GET",
		"timeout": 0,
		"headers": {
		  "Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIzNzk2MyIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvcm9sZSI6ImNvbnN1bHRvciJ9.XHG0JHDs8Daik_XHbb6cr90diRfL65qu0IaFJL9GrvY"
		},

		success: function (data) {
			response = data.data;
			$("#nombre").val(response.nombres);
			$("#apellido").val(response.apellido_paterno + " " + response.apellido_materno);
			$("#direccion").val(response.direccion);
			$("#departamento").val(response.ubigeo[0]).prop("selected", true);
			$("#provincia").val(response.ubigeo[1]).prop("selected", true);
			$("#distrito").val(response.ubigeo[2]).prop("selected", true);
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



/*************** API RENIEC  ***********/

// Configurar el evento keydown para el campo documento
const inputDocumento = document.getElementById('documento');
inputDocumento.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        Buscar_Tutor();
    }
});

function Buscar_Tutor() {
    var dni = $("#documento").val().trim();
    
    // Validar que el DNI tenga 8 dígitos
    if (dni.length !== 8 || isNaN(dni)) {
        $("body").overhang({
            type: "error",
            message: "El DNI debe tener 8 dígitos numéricos",
            duration: 5 // Mostrar por 5 segundos
        });
        return;
    }
    
    // Mostrar indicador de carga
    $("#fresponsable").val("Buscando...").prop('readonly', true);
    
    // Hacer la petición directamente a la API de Factiliza
    $.ajax({
        url: "https://api.factiliza.com/pe/v1/dni/info/" + dni,
        method: "GET",
        timeout: 10000, // 10 segundos de timeout
        headers: {
            "Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIzNzk2MyIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvcm9sZSI6ImNvbnN1bHRvciJ9.XHG0JHDs8Daik_XHbb6cr90diRfL65qu0IaFJL9GrvY"
        },
        success: function(response) {
            console.log("Respuesta de la API:", response);
            
            if (response && response.data) {
                var data = response.data;
                var nombreCompleto = '';
                
                // Construir el nombre completo: apellidos + nombre
                if (data.apellido_paterno) nombreCompleto += data.apellido_paterno;
                if (data.apellido_materno) nombreCompleto += ' ' + data.apellido_materno;
                if (data.nombres) nombreCompleto += ' ' + data.nombres;
                
                // Asignar el nombre al campo de responsable
                $("#fresponsable").val(nombreCompleto.trim());
            } else {
                $("body").overhang({
                    type: "warning",
                    message: "No se encontraron datos para el DNI ingresado",
                    duration: 5 // Mostrar por 5 segundos
                });
                $("#fresponsable").val("");
            }
        },
        error: function(xhr, status, error) {
            console.error("Error en la petición:", status, error);
            
            var errorMessage = "Error al conectar con el servicio de consulta de DNI";
            
            if (xhr.status === 0) {
                errorMessage = "No se pudo conectar al servidor. Verifica tu conexión a internet.";
            } else if (xhr.status === 404) {
                errorMessage = "DNI no encontrado o formato inválido";
            } else if (xhr.status === 429) {
                errorMessage = "Límite de consultas excedido. Por favor, intente más tarde.";
            } else if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            
            $("body").overhang({
                type: "error",
                message: errorMessage,
                duration: 5 // Mostrar por 5 segundos
            });
            $("#fresponsable").val("");
        },
        complete: function() {
            // Habilitar el campo nuevamente cuando termine la búsqueda
            $("#fresponsable").prop('readonly', false);
        }
    });
}

// Evento para actualizar el campo HC cuando se escribe en el campo DNI
$("#dni").on("keyup", function() {
    let dni =  $("#dni").val();
    $("#hc").val(dni);
});

$("#dni").on("keyup", function() {
	let dni =  $("#dni").val();

	$("#hc").val(dni);
});

// url4 = baseurl + "contarconsecutivo";
// $.ajax({
// 	url: url4,
// 	method: "GET",
// 	success: function (data) {
// 		data = JSON.parse(data);
// 		suma = parseInt(data.numero.numero) + 1;
// 		$("#hc").val(suma);
// 	},
// 	error: function () {
// 		$("body").overhang({
// 			type: "error",
// 			message:"Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
// 		});
// 	},
// });

$("#btn-actualizar").on("click", function () {
	var url4 = baseurl + "administracion/actualizarpacientes",
		id = $("#id2").val(),
		celular = $("#celular2").val(),
		direccion = $("#direccion2").val(),
		departamento = $("#departamento2").val(),
		provincia = $("#provincia2").val(),
		distrito = $("#distrito2").val(),
		ocupacion = $("#ocupacion2").val(),
		grado_academico = $("#grado_academico2").val(),
		estado_civil = $("#estado_civil2").val(),
		documento = $("#documento2").val(),
		fresponsable = $("#fresponsable2").val();
	$.ajax({
		url: url4,
		method: "POST",
		data: {
			id: id,
			celular: celular,
			direccion: direccion,
			departamento: departamento,
			provincia: provincia,
			distrito: distrito,
			ocupacion: ocupacion,
			grado_academico: grado_academico,
			estado_civil: estado_civil,
			documento: documento,
			fresponsable: fresponsable,
		},
		success: function () {
			json =  JSON.parse(json);

         if(json.success == 1){//Paciente Actualizado Correctamente,

            $("body").overhang({
               type: "success",
               message: json.message
            });
			setTimeout(reloadPage, 3000);

         }
		  else{//Paciente Actualizado Correctamente,
            $("body").overhang({
               type: "warn",
               message: json.message
            });
         }
		},
		error: function () {
		  $("body").overhang({
		    type: "error",
			message:"Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
			});
		},
	});
});

function buscarPacienteBaseDatos() {
  let url = baseurl + "administracion/getpacientetabla",
      apellido = $("#apellido_buscar").val().replace(/%/g, ''),
      dni = $("#dni_buscar").val(),
	  cadena = "";
	  response = [];
  $.ajax({
    url: url,
	method: "POST",
	data: {
	  dni: dni,
	  apellido: apellido	
	},
	success: function(response) { 
	 
	  if(response == 'error'){
		$("body").overhang({
			type: "error",
			message:"El paciente no se encuentra registrado en la base de datos",
		  });
	  }
	  else {
       paciente = JSON.parse(response);
	   const tbody  = document.getElementById('table_buscar').querySelector('tbody');
	   tbody.innerHTML = '';

	   paciente.forEach(pacientes => {
		// Crea una nueva fila de tabla
       const tr = document.createElement('tr');
       tr.setAttribute('onclick', `pasarDatosPaciente("${pacientes.documento}")`);

       // Agrega la celda con el radio button
       const tdRadio = document.createElement('td');
       const divRadio = document.createElement('div');
       divRadio.classList.add('form-check');
       const inputRadio = document.createElement('input');
       inputRadio.classList.add('form-check-input');
       inputRadio.setAttribute('type', 'radio');
       inputRadio.setAttribute('name', 'flexRadioDefault');
       inputRadio.setAttribute('id', `checkpacientes_${pacientes.documento}`); // Aseguramos que el id sea único
       divRadio.appendChild(inputRadio);
       tdRadio.appendChild(divRadio);
       tr.appendChild(tdRadio);

       // Agrega la celda con la información del paciente
       const tdInfo = document.createElement('td');
       const divInfo = document.createElement('div');
       divInfo.classList.add('d-flex', 'px-2', 'py-1');
       const divImg = document.createElement('div');
       const img = document.createElement('img');
       // Usar imagen según el género del paciente
       const genero = pacientes.sexo ? pacientes.sexo.toLowerCase() : '';
       const esMujer = genero.includes('femenino') || genero === 'f';
       img.src = baseurl + 'public/img/theme/' + (esMujer ? 'avatar-mujer.jpg' : 'team-41.jpg');
       img.classList.add('avatar', 'avatar-sm', 'me-3');
       divImg.appendChild(img);
       const divText = document.createElement('div');
       divText.classList.add('d-flex', 'flex-column', 'justify-content-center');
       const pName = document.createElement('p');
       pName.classList.add('mb-0', 'text-xs', 'text-uppercase');
       pName.textContent = `${pacientes.nombre} ${pacientes.apellido}`;
       const pDoc = document.createElement('p');
       pDoc.classList.add('text-xs', 'text-secondary', 'mb-0', 'text-uppercase');
       pDoc.textContent = pacientes.documento;
       divText.appendChild(pName);
       divText.appendChild(pDoc);
       divInfo.appendChild(divImg);
       divInfo.appendChild(divText);
       tdInfo.appendChild(divInfo);
       tr.appendChild(tdInfo);

       // Agrega las demás celdas
       const tdTelefono = document.createElement('td');
       tdTelefono.textContent = pacientes.telefono;
       tr.appendChild(tdTelefono);

       const tdFechaNacimiento = document.createElement('td');
             tdFechaNacimiento.textContent = pacientes.fecha_nacimiento;
             tr.appendChild(tdFechaNacimiento);

       const tdSexo = document.createElement('td');
             tdSexo.textContent = pacientes.sexo;
             tr.appendChild(tdSexo);

       const tdEstadoCivil = document.createElement('td');
             tdEstadoCivil.textContent = pacientes.estado_civil;
             tr.appendChild(tdEstadoCivil);

       // Finalmente, agrega la fila al cuerpo de la tabla
       document.getElementById('table_buscar').querySelector('tbody').appendChild(tr);
	   });
	// cadena = "<tr onclick='pasarDatosPaciente(\"" + pacientes.documento + "\")'><td><div class='form-check'><input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1' id='checkpacientes'></div></td><td><div class='d-flex px-2 py-1'><div><img src='https://radiarte.com/application/files/6917/0923/2244/depositphotos_134255588-stock-illustration-empty-photo-of-male-profile.jpg' class='avatar avatar-sm me-3'></div><div class='d-flex flex-column justify-content-center'><p class='mb-0 text-xs text-uppercase'>"+pacientes.nombre + ' ' +pacientes.apellido+"</p><p class='text-xs text-secondary mb-0 text-uppercase'>"+pacientes.documento+"</p></div></div></td><td>"+pacientes.telefono+"</td><td>"+pacientes.fecha_nacimiento+"</td><td>"+pacientes.sexo+"</td><td>"+pacientes.estado_civil+"</td></tr>";
	// document.getElementById("table_buscar").innerHTML = cadena;
}
	},
	error: function() {
	  $("body").overhang({
		type: "error",
		message:"El paciente no se encuentra registrado en la base de datos",
      });
	}
  });
}

function pasarDatosPaciente(paciente) {
  let url = baseurl + "administracion/pacienteid",
      dni = $("#dni"),
      nombre = $("#nombre"),
      apellido = $("#apellido"),
      celular = $("#celular"),
      hc = $("#hc"),
      sexo = $("#sexo"),
      fecha_nacimiento = $("#fecha_nacimiento"),
      direccion = $("#direccion"),
      departamento = $("#departamento"),
      provincia = $("#provincia"),
	  distrito = $("#distrito"),
      ocupacion = $("#ocupacion"),
      academico = $("#grado_academico"),
      estado_civil = $("#estado_civil");

  $.ajax({
    url: url,
	method: "POST",
	data: {
	  dni: paciente
	},
	success: function(response) {

	  $("#btnhistoria").attr("hidden", false);
	  $("#btnactualizar").attr("hidden", false);
	  response =  JSON.parse(response);
	  abrirHistoriaClinica(response.documento);
	  dni.val(response.documento);
	  nombre.val(response.nombre);
      apellido.val(response.apellido);
      hc.val(response.hc);
      celular.val(response.telefono);
      sexo.val(response.sexo).prop("selected", true);
      fecha_nacimiento.val(response.fecha_nacimiento);
      direccion.val(response.direccion);
      departamento.val(response.departamento).prop("selected", true);
      provincia.val(response.provincia).prop("selected", true);
      distrito.val(response.distrito).prop("selected", true);
      ocupacion.val(response.ocupacion);
      academico.val(response.grado_academico).prop("selected", true);
      estado_civil.val(response.estado_civil).prop("selected", true);
   
	},
	error() {

	}
  })
}
const input1 = document.getElementById('apellido_buscar');
input1.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        buscarPacienteBaseDatos();
    }
});
const input2 = document.getElementById('dni_buscar');
input2.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        buscarPacienteBaseDatos();
    }
});

$("#btnactualizar").on("click", function() {

    var url = baseurl + "administracion/actualizarpacientes",
    dni = $("#dni").val(),
    celular = $("#celular").val(),
    sexo = $("#sexo").val(),
    edad = $("#edad").val(),
    direccion = $("#direccion").val(),
    fecha_nacimiento = $("#fecha_nacimiento").val(),
    departamento = $("#departamento").val(),
    provincia = $("#provincia").val(),
    distrito = $("#distrito").val(),
    ocupacion = $("#ocupacion").val(),
    grado_academico = $("#grado_academico").val(),
    estado_civil = $("#estado_civil").val();
    // documento = $("#documento2").val(),
    // fresponsable = $("#fresponsable2").val();

    $.ajax({
      url: url,
      method: "POST",
      data: { 
        dni: dni, 
        celular: celular, 
        direccion: direccion,
        fecha_nacimiento: fecha_nacimiento,
        departamento: departamento,
        edad: edad,
        sexo: sexo,
        provincia: provincia,
        distrito: distrito,
        ocupacion: ocupacion,
        grado_academico: grado_academico,
        estado_civil: estado_civil,
      },
      success: function(json) {// json parametro de respuesta para validar la respuesta
        json =  JSON.parse(json);

        if(json.success == 1){//Paciente Actualizado Correctamente,
          $("body").overhang({
            type: "success",
            message: json.message
          });
		//   setTimeout(reloadPage, 3000);
        }else{//Ya existe un paciente con este NRO DOC - WARNING
          $("body").overhang({
            type: "warn",
            message: json.message
          });
        }
      }
    });
});

function abrirHistoriaClinica(paciente) {
	let url =  baseurl + "administracion/historia/" + paciente;

	window.open(url, '_blank');
}

function actualizarPaciente(id) {
	var url5 = baseurl  + "administracion/pacienteidaaaa",
		dni = $("#dni2"),
		nombre = $("#nombre2"),
		apellido = $("#apellido2"),
		celular = $("#celular2"),
		hc = $("#hc2"),
		sexo = $("#sexo2"),
		fecha_nacimiento = $("#fecha_nacimiento2"),
		direccion = $("#direccion2"),
		departamento = $("#departamento2"),
		provincia = $("#provincia2"),
		distrito = $("#distrito2"),
		ocupacion = $("#ocupacion2"),
		academico = $("#grado_academico2"),
		estado_civil = $("#estado_civil2"),
		documento = $("#documento2"),
		fresponsable = $("#fresponsable2");

		$.ajax({
		  url: url5,
		  method: "POST",
		  data: { id: id },
		  success: function(data) {
			  data =  JSON.parse(data);
			  console.log(data);
			  $("#actualizarPaciente").modal("show");

			  $("#id2").val(data.codigo_paciente);
			  dni.val(data.documento);
			  nombre.val(data.nombre);
			  apellido.val(data.apellido);
			  hc.val(data.hc);
			  celular.val(data.telefono);
			  sexo.val(data.sexo).prop("selected", true);
			  fecha_nacimiento.val(data.fecha_nacimiento);
			  direccion.val(data.direccion);
			  departamento.val(data.departamento).prop("selected", true);
			  provincia.val(data.provincia).prop("selected", true);
			  distrito.val(data.distrito).prop("selected", true);
			  ocupacion.val(data.ocupacion);
			  academico.val(data.grado_academico).prop("selected", true);
			  estado_civil.val(data.estado_civil).prop("selected", true);
			  documento.val(data.familiar_documento);
			  fresponsable.val(data.familiar_nombre);
		  }
	  });
  }


 $("#departamento").change(function(){
   var id_departamento = ($('#departamento').find(":selected").val()).slice(0,2);
        $("#provincia").html("");
        $("#distrito").html("");
        $("#provincia").append('<option value="" >Seleccione la Provincia</option>');
        $("#distrito").append('<option value="" >Seleccione el Distrito</option>');
        for (var i = 0; i < provincia.length; i++) {
          if((provincia[i]['id']).slice(0,2) == id_departamento){
            $("#provincia").append('<option value="'+provincia[i]['id']+'" >'+provincia[i]['name']+'</option>');
          }
        }

        for (var i = 0; i < distrito.length; i++) {
          if((distrito[i]['id']).slice(0,2) == id_departamento){
            $("#distrito").append('<option value="'+distrito[i]['id']+'" >'+distrito[i]['name']+'</option>');
          }
        }
        $('#provincia  option[value=""]').attr('selected','selected');
        $('#distrito  option[value=""]').attr('selected','selected');
      });

      $("#provincia").change(function(){
        var id_provincia = ($('#provincia').find(":selected").val()).slice(0,2);
        $('#departamento  option[value="'+id_provincia+'"]').attr('selected','selected');
        $("#distrito").html("");
        $("#distrito").append('<option value="" selected>Seleccione el Distrito</option>');
        for (var i = 0; i < distrito.length; i++) {
          if((distrito[i]['id']).slice(0,2) == id_provincia){
            $("#distrito").append('<option value="'+distrito[i]['id']+'" >'+distrito[i]['name']+'</option>');
          }
        }
        $('#distrito  option[value=""]').attr('selected','selected');
      });

      $("#distrito").change(function(){
        var id_distrito = ($('#distrito').find(":selected").val()).slice(0,2);
        $('#departamento  option[value="'+id_distrito+'"]').attr('selected','selected');
        $("#provincia").html("");
        $("#provincia").append('<option value="">Seleccione la Provincia</option>');
        for (var i = 0; i < provincia.length; i++) {
          if((provincia[i]['id']).slice(0,2) == id_distrito){
            $("#provincia").append('<option value="'+provincia[i]['id']+'" >'+provincia[i]['name']+'</option>');
          }
        }
        var id_distrito = ($('#distrito').find(":selected").val()).slice(0,4);
        for (var i = 0; i < provincia.length; i++) {
          if((provincia[i]['id']).slice(0,4) == id_distrito){
            $('#provincia  option[value="'+id_distrito+'"]').attr('selected','selected');
            i = provincia.length;
          }
        }
      });

const reloadPage = () => {
  location.reload();
};