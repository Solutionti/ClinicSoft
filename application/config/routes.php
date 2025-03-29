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
$route["administracion/getpacientetabla"] = "administrador/pacientes/getpacientetabla"; 

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
$route["administracion/pdfgeneral/(:num)"] = "administrador/historiaclinica/generarpdfmedicinageneral";
$route["administracion/triajehistorias"] = "administrador/historiaclinica/getTriajeid";

// VERSION 3.0 DE LA APLICACION
$route["administracion/crearalergias"] = "administrador/historiaclinica/crearAlergias";
$route["administracion/crearmedicamento"] = "administrador/historiaclinica/crearMedicamento";
$route["administracion/pdfhistoriaclinica/(:num)/(:num)"] = "administrador/historiaclinica/crearPdfHistoriaClinica/$1/$2";
$route["administracion/pdfhistoriaclinicaginecologica/(:num)/(:num)"] = "administrador/historiaclinica/crearPdfHistoriaClinicaGinecologica/$1/$2";

$route["administracion/pdflaboratoriorden"] = "administrador/historiaclinica/formatoLaboratorioOrdenes";
$route["administracion/pdfpatologiaorden"] = "administrador/historiaclinica/formatoPatologiaOrdenamiento";


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
$route["administracion/reportediario/(:any)/(:any)"] = "administrador/reportes/reportecomisiondiario/$1/$2";
$route["administracion/reportegastos/(:any)/(:any)"] = "administrador/reportes/reportegastos/$1/$2";
$route["administracion/reportelaboratorio/(:any)"] = "administrador/reportes/reportelaboratorio/$1";
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

//
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

//vistas de las ecografias
$route["administracion/ecografiaMamaview"] = "administrador/ecografias/ecografiaMamaview";
$route["administracion/ecografiaGeneticaview"] = "administrador/ecografias/ecografiaGeneticaview";
$route["administracion/ecografiaMorfologicaview"] = "administrador/ecografias/ecografiaMorfologicaview";
$route["administracion/ecografiaTrasvaginalview"] = "administrador/ecografias/ecografiaTrasvaginalview";
$route["administracion/ecografiaPelvicaview"] = "administrador/ecografias/ecografiaPelvicaview";
$route["administracion/ecografiaObstetricaview"] = "administrador/ecografias/ecografiaObstetricaview";
$route["administracion/ecografiaAbdominalview"] = "administrador/ecografias/ecografiaAbdominalview";
$route["administracion/ecografiaProstaticaview"] = "administrador/ecografias/ecografiaProstaticaview";
$route["administracion/ecografiaRenalview"] = "administrador/ecografias/ecografiaRenalview";
$route["administracion/ecografiaTiroidesview"] = "administrador/ecografias/ecografiaTiroidesview";
$route["administracion/ecografiaHisteronosografiaview"] = "administrador/ecografias/ecografiaHisteronosografiaview";
$route["administracion/ecografiaArterialview"] = "administrador/ecografias/ecografiaArterialview";
$route["administracion/ecografiaVenosaview"] = "administrador/ecografias/ecografiaVenosaview";

//ECOGRAFIAS CREAR
$route["administracion/ecografiamama"] = "administrador/ecografias/createEcografiaMama";
$route["administracion/ecografiaobstetrica"] = "administrador/ecografias/createEcografiaObstetrica";
$route["administracion/ecografiagenetica"] = "administrador/ecografias/createEcografiaGenetica";
$route["administracion/ecografiamorfologica"] = "administrador/ecografias/createEcografiaMorfologica";
$route["administracion/ecografiatrasvaginal"] = "administrador/ecografias/createEcografiaTrasvaginal";
$route["administracion/ecografiapelvica"] = "administrador/ecografias/createEcografiaPelvica";
$route["administracion/ecografiaabdominal"] = "administrador/ecografias/createEcografiaAbdominal";
$route["administracion/ecografiaprostatica"] = "administrador/ecografias/createEcografiaProstatica";
$route["administracion/ecografiarenal"] = "administrador/ecografias/createEcografiaRenal";
$route["administracion/ecografiatiroides"] = "administrador/ecografias/createEcografiaTiroides";
$route["administracion/ecografiahisterosonografia"] = "administrador/ecografias/createEcografiaHisterosonografia";
$route["administracion/ecografiaarterial"] = "administrador/ecografias/createEcografiaArterial";
$route["administracion/ecografiavenosa"] = "administrador/ecografias/createEcografiaVenosa";

// PDF DE LAS ECOGRAFIAS
$route["administracion/pdfecografiamama/(:num)"] = "administrador/PdfController/getEcografiaMamaPdf/$1";
$route["administracion/pdfecografiagenetica/(:num)"] = "administrador/PdfController/getEcografiaGeneticaPdf/$1";
$route["administracion/pdfecografiamorfologica/(:num)"] = "administrador/PdfController/getEcografiaMorfologicaPdf/$1";
$route["administracion/pdfecografiatrasvaginal/(:num)"] = "administrador/PdfController/getEcografiaTrasvaginalPdf/$1";
$route["administracion/pdfecografiapelvica/(:num)"] = "administrador/PdfController/getEcografiaPelvicaPdf/$1";
$route["administracion/pdfecografiaobstetrica/(:num)"] = "administrador/PdfController/getEcografiaObstetricaPdf/$1";
$route["administracion/pdfecografiaabdominal/(:num)"] = "administrador/PdfController/getEcografiaAbdominalPdf/$1";
$route["administracion/pdfecografiaprostatica/(:num)"] = "administrador/PdfController/getEcografiaProstaticaPdf/$1";
$route["administracion/pdfecografiarenal/(:num)"] = "administrador/PdfController/getEcografiaRenalPdf/$1";
$route["administracion/pdfecografiatiroides/(:num)"] = "administrador/PdfController/getEcografiaTiroidesPdf/$1";
$route["administracion/pdfecografiahisterosonografia/(:num)"] = "administrador/PdfController/getEcografiaHisterosonografiaPdf/$1";
$route["administracion/pdfecografiaarterial/(:num)"] = "administrador/PdfController/getEcografiaArterialPdf/$1";
$route["administracion/pdfecografiavenosa/(:num)"] = "administrador/PdfController/getEcografiaVenosaPdf/$1";
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




