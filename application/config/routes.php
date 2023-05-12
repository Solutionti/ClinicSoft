<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
**********************************************************
******* SOFTWARE MEDICAL CLINIC version 1.0.0.0 **********
***********************************************************
*/

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//ADMINISTRADOR
$route["administracion/inicio"] = "administrador/inicio";
$route["administracion/pacientes"] = "administrador/pacientes";
$route["administracion/historia/(:num)"] = "administrador/historiaclinica/historiasclinicas";
$route["administracion/atencion"] = "administrador/atencion";
$route["administracion/laboratorio"] = "administrador/laboratorio";
$route["administracion/triaje"] = "administrador/triaje";
$route["administracion/doctores"] = "administrador/doctores";
$route["administracion/citas"] = "administrador/citas";
$route["administracion/recursoshumanos"] = "administrador/Recursoshumanos";
$route["administracion/financiero"] = "administrador/financiero";
$route["administracion/gastos"] = "administrador/gastos";
$route["administracion/precios"] = "administrador/precios";
$route["administracion/reportes"] = "administrador/reportes";
$route["administracion/colposcopia"] = "administrador/colposcopia";
$route["administracion/perfil"] = "administrador/perfil";

//LOGIN
$route["iniciarsesion"] = "login/iniciarsesion";
$route["cerrarsesion"] = "login/cerrarsesion";
$route["cerrarsesionclientes"] = "login/cerrarsesionclientes";

//USUARIOS
$route["administacion/crearusuario"] = "administrador/recursoshumanos/crearusuarios";
$route["administracion/verusuarios"] = "administrador/recursoshumanos/getusuariosid";
$route["administracion/actualizarusuario"] = "administrador/recursoshumanos/actualizarusuario";
$route["administracion/eliminarusuario/(:num)"] = "administrador/recursoshumanos/eliminarusuario";

//PACIENTES
$route["contarconsecutivo"] = "administrador/pacientes/countpacientes";
$route["crearpacientes"] = "administrador/pacientes/crearpaciente";
$route["administracion/pacienteid"] = "administrador/pacientes/getpacienteid";
$route["administracion/actualizarpacientes"] = "administrador/pacientes/actualizarpaciente";
$route["administracion/eliminarpaciente/(:num)"] = "administrador/pacientes/eliminarpaciente";
$route["administracion/editarpaciente/(:num)"] = "administrador/pacientes/editarpaciente"; 

//ATENCION
$route["buscarpaciente"] = "administrador/atencion/searchatencion";
$route["buscarespecialidad"] = "administrador/atencion/searchespecialidad";
$route["registraratencion"] = "administrador/atencion/registraratencion";
$route["contarconsecutivoturnos"] = "administrador/atencion/countturnos";
$route["administracion/cambiarestado/(:num)"] = "administrador/atencion/mandartriaje";
$route["administracion/cargarfactura/(:num)"] = "administrador/atencion/cargarfacturaatencion";
$route["administracion/atencionmedicos"] = "administrador/atencion/atencionmedicos";
$route["administracion/cambiarestadomedico/(:num)"] = "administrador/atencion/mandaratendido";

//TRIAJE
$route["administracion/consultartriaje/(:num)"] = "administrador/triaje/gettriajeid/$1";
$route["administracion/creartriaje"] = "administrador/triaje/creartriaje";
$route["administracion/pasarconsulta/(:num)"] = "administrador/triaje/mandaraconsulta";

//DOCTORES
$route["administracion/creardoctor"] = "administrador/doctores/creardoctor";
$route["administracion/buscardoctorid"] = "administrador/doctores/getdoctoresid";
$route["administracion/eliminardoctor/(:num)"] = "administrador/doctores/eliminardoctores";
$route["administracion/actualizardoctor"] = "administrador/doctores/actualizardoctor";
$route["administracion/pacientes/cargar_pacientes"] = "administrador/pacientes/cargarpacientes";

//CITAS
$route["administracion/crearcita"] = "administrador/citas/crearcita";
$route["administracion/calendario"] = "administrador/citas/calendario";
$route["administracion/calendariodoctor"] = "administrador/citas/calendariodoctor";
$route["administracion/traerhorarios"] = "administrador/citas/gethorariosdoc";
$route["administracion/citasmedico"] = "administrador/citas/getdatacalendario";
$route["administracion/allcitas"] = "administrador/citas/getalldatacalendario";
$route["administracion/getcitasid"] = "administrador/citas/getcitasid";
$route["administracion/editarcita"] = "administrador/citas/editarcitas";

//precios 
$route["administracion/crearprecio"] = "administrador/precios/crearprecioservicio";
$route["administracion/verprecioid"] = "administrador/precios/getpreciosid";
$route["administracion/actualizarprecios"] = "administrador/precios/actualizarprecios";

// HISTORIAS PACIENTES
$route["administracion/crearhistoriaginecologia"] = "administrador/historiaclinica/crearhistorialpacientesginecologicas";
$route["administracion/crearhistoriageneral"] = "administrador/historiaclinica/crearhistorialpacientesgeneral";
$route["administracion/crearreceta"] = "administrador/historiaclinica/crearrecetamedica";
$route["administracion/subirdocumentos"] = "administrador/historiaclinica/subirdocumentos";
$route["administracion/pdfginecologia/(:num)/(:any)"] = "administrador/historiaclinica/Generarpdfginecologia";
$route["administracion/pdfgeneral/(:num)/(:any)"] = "administrador/historiaclinica/generarpdfmedicinageneral";
$route["administracion/triajehistorias"] = "administrador/historiaclinica/getTriajeid";

//COLPOSCOPIA
$route["administracion/crearcolposcopia"] = "administrador/colposcopia/crearcolposcopia";
$route["administraciopn/pdfcolposcopia/(:num)"] = "administrador/colposcopia/crearpdfcolposcopia";

//GASTOS
$route["administracion/formgastocpe"] = "administrador/gastos/formgastocpe";
$route["buscarproveedor"] = "administrador/gastos/searchproveedor";
$route["administracion/loadcpegasto"] = "administrador/gastos/loadcpegasto";

//FACTURA ELECTRONICA
$route["administracion/facturaelectronica"] = "administrador/financiero/facturaElectronica";
$route["administracion/getpagos/(:num)"] = "administrador/financiero/getpagosAtencion/$1";
$route["administracion/actualizarpagos"] = "administrador/financiero/actualizarpagos";


//REPORTES
$route["administracion/reportediario"] = "administrador/reportes/reportecomisiondiario";
$route["administracion/reportegastos"] = "administrador/reportes/reportegastos";
$route["administracion/reportelaboratorio"] = "administrador/reportes/reportelaboratorio";
$route["administracion/reporteglobal"] = "administrador/reportes/reporteglobal";

//LABORATORIO
$route["countlaboratorio"] = "administrador/laboratorio/Countlaboratorioid";
$route["administracion/precioslaboratorio"] = "administrador/laboratorio/preciolaboratorio";
$route["administracion/recibolaboratorio/(:num)"] = "administrador/laboratorio/pdfrecibolaboratorio/$1";
$route["administracion/serviciolaboratorio"] = "administrador/laboratorio/crearserviciolaboratorio";
$route["administracion/cargararchivoslaboratorio"] = "administrador/laboratorio/subirdocumentolaboratorio";
$route["administracion/getdatapreciolaboratorio/(:num)"] = "administrador/laboratorio/getdatapreciolaboratorio/$1";
$route["administracion/actualizarprecio"] = "administrador/laboratorio/actualizarprecioslaboratorio";
$route["administracion/crearlaboratorio"] = "administrador/laboratorio/createpreciolaboratorio";

//PATOLOGOS
$route["administracion/cargararchivospatologos"] = "administrador/patologia/subirdocumentopatologia";

//INVENTARIOS
$route["administracion/inventarios"] = "administrador/inventarios";
$route["administracion/movimientos"] = "administrador/inventarios/movimientos";
$route["administracion/productos"] = "administrador/inventarios/productos";
$route["administracion/crearproducto"] = "administrador/inventarios/createproductos";
$route["administracion/traerstock/(:num)"] = "administrador/inventarios/getstock/$1";
$route["administracion/crearentrada"] = "administrador/inventarios/creardocumentokardexentrada";
$route["administracion/crearsalida"] = "administrador/inventarios/creardocumentokardexsalida";
$route["administracion/consultainventario/(:num)"] = "administrador/inventarios/getConsultaInventario/$1";
$route["administracion/consultarkardex"] = "administrador/inventarios/consultarkardex";
$route["administracion/pdfinventarios"] = "administrador/inventarios/generarpdfinventarios";
$route["administracion/pdfkardex"] = "administrador/inventarios/generarpdfkardex";

//ECOGRAFIAS
$route["administracion/ecografiamama"] = "administrador/ecografias/ecografiamama";
$route["administracion/cargararchivoecografias"] = "administrador/ecografias/subirdocumentoecografias";

//PQRS
$route["administracion/pqrs"] = "administrador/pqrs";

//RIPS
$route["administracion/rips"] = "administrador/rips";

//PRESCRIPCIONES
$route["administracion/mipres"] = "administrador/mipres";

//TICKETS
$route["administracion/tickets"] = "administrador/tickets";

// PAGOS
$route["administracion/crearpagoadicional"] = "administrador/financiero/crearpagoadicional";


/*
**********************************************************
***** SECCION DE CONSULTA DE LABORATORIO PAGINA WEB ******
***********************************************************
*/
$route["zonac"] = "clientes";
$route["clientes/laboratorio"] = "clientes/laboratorio";
$route["clientes/patologia"] = "clientes/patologia";
$route["clientes/ecografias"] = "clientes/ecografias";
$route["iniciarsesionclientes"] = "login/iniciarsesionclientes";
$route["cerrarsesionclientes"] = "login/cerrarsesionclientes";




