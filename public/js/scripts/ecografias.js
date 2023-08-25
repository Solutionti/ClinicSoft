
// CREAR ECOGRAFIA DE MAMA
function createEcografiaMama() {
  var url = baseurl + "administracion/crearecografiamama";
  var documento_paciente = $("#documento_paciente").val(),
      codigo_doctor = $("#codigo_doctor").val(),
      pezon_izq = $("#pezon_izq").val(),
      tcsc_izq = $("#tcsc_izq").val(),
      tejido_glandular_izq = $("#tejido_glandular_izq").val(),
      axila_izq = $("#axila_izq").val(),
      comentario_mama_izq = $("#comentario_mama_izq").val(),
      pezon_der = $("#pezon_der").val(),
      tcsc_der = $("#tcsc_der").val(),
      tejido_glandular_der = $("#tejido_glandular_der").val(),
      axila_der = $("#axila_der").val(),
      comentario_der = $("#comentario_der").val(),
      conclusion_mama = $("#conclusion_mama").val(),
      sugerencias_mama = $("#sugerencias_mama").val();

  $.ajax({
    url: url,
    method: "POST",
    data: {
      documento_paciente: documento_paciente,
      codigo_doctor: codigo_doctor,
      pezon_izq: pezon_izq,
      tcsc_izq: tcsc_izq,
      tejido_glandular_izq: tejido_glandular_izq,
      axila_izq: axila_izq,
      comentario_mama_izq: comentario_mama_izq,
      pezon_der: pezon_der,
      tcsc_der: tcsc_der,
      tejido_glandular_der: tejido_glandular_der,
      axila_der: axila_der,
      comentario_der: comentario_der,
      conclusion_mama: conclusion_mama,
      sugerencias_mama: sugerencias_mama
    },
    success: function() {
      $("body").overhang({
        type: "success",
        message: "Ecografia de Mama se ha registrado correctamente"
      });
      $("#btn_pdf_mama").attr("hidden", false);
    },
    error: function() {
      $("body").overhang({
        type: "error",
        message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
      }); 
    }
  });  
}

function imprimirEcografiaMama() {
  url = baseurl  + "administracion/verpdfmama";
  window.open(url, "_blank", " width=500, height=400");
}

// ECOGRAFIA TRANSVAGINAL

function createEcografiaTransvaginal() {

  var url = baseurl + "administracion/crearecografiatransvaginal";
  var documento_paciente = $("#documento_paciente").val(),
      codigo_doctor = $("#codigo_doctor").val(),
      utero = $("#utero").val(),
      regular = $("#regular").val(),
      modular = $("#modular").val(),
      endometrio = $("#endometrio").val(),
      tumoranexial_si = $("#tumoranexial_si").val(),
      tumoranexial_no = $("#tumoranexial_no").val(),
      utero_medidas = $("#utero_medidas").val(),
      utero_medidas1 = $("#utero_medidas1").val(),
      utero_medidas2 = $("#utero_medidas2").val(),
      comentario_utero = $("#comentario_utero").val(),
      ovario_der = $("#ovario_der").val(),
      ovario_der1 = $("#ovario_der1").val();
      comentario_ovarioder = $("#comentario_ovarioder").val(),
      ovario_izq = $("#ovario_izq").val(),
      ovario_izq1 = $("#ovario_izq1").val(),
      comentario_ovarioizq = $("#comentario_ovarioizq").val(),
      fondo_Saco = $("#fondo_Saco").val(),
      conclusion_transv = $("#conclusion_transv").val(),
      sugerencias_transv = $("#sugerencias_transv").val();

  $.ajax({
    url: url,
    method: "POST",
    data: {
      documento_paciente: documento_paciente,
      codigo_doctor: codigo_doctor,
      utero: utero,
      regular: regular,
      modular: modular,
      endometrio: endometrio,
      tumoranexial_si: tumoranexial_si,
      tumoranexial_no: tumoranexial_no,
      utero_medidas: utero_medidas,
      utero_medidas1: utero_medidas1,
      utero_medidas2: utero_medidas2,
      comentario_utero: comentario_utero,
      ovario_der: ovario_der,
      ovario_der1: ovario_der1,
      comentario_ovarioder: comentario_ovarioder,
      ovario_izq: ovario_izq,
      ovario_izq1: ovario_izq1,
      comentario_ovarioizq: comentario_ovarioizq,
      conclusion_transv: conclusion_transv,
      sugerencias_transv: sugerencias_transv,

    },
    success: function() {
      $("body").overhang({
        type: "success",
        message: "Ecografia de transvaginal se ha registrado correctamente"
      });
      $("#pdf_ecografia_transvaginal").attr("hidden", false);
    },
    error: function() {
      $("body").overhang({
        type: "error",
        message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
      }); 
    }
  });  
}

function imprimirEcografiaTransvaginal() {
  url = baseurl  + "administracion/verpdftransvaginal";
  window.open(url, "_blank", " width=500, height=400");
}

// ECOGRAFIA PELVICA
function createEcografiaPelvica() {

  var url = baseurl + "administracion/crearecografiapelvica";
  var documento_paciente = $("#documento_paciente").val(),
      codigo_doctor = $("#codigo_doctor").val(),
      utero_tipo = $("#utero_tipo").val(),
      regular_pelvica = $("#regular_pelvica").val(),
      modular_pelvica = $("#modular_pelvica").val(),
      endometrio_pelvica = $("#endometrio_pelvica").val(),
      tumoranexial_si_pelvica = $("#tumoranexial_si_pelvica").val(),
      tumoranexial_no_pelvica = $("#tumoranexial_no_pelvica").val(),
      tumorAnexial_com= $("#tumorAnexial_com").val(),
      utero_medidas_pelv = $("#utero_medidas_pelv").val(),
      medidaUtero1 = $("#medidaUtero1").val(),
      medidaUtero2 = $("#medidaUtero2").val(),
      comentarioUtero = $("#comentarioUtero").val(),
      ovario_der1 = $("#ovario_der1").val(),
      ovario_der2 = $("#ovario_der2").val();
      comentarioOvario_der = $("#comentarioOvario_der").val(),
      ovario_izq1 = $("#ovario_izq1").val(),
      ovario_izq2 = $("#ovario_izq2").val(),
      comentarioOvario_izq = $("#comentarioOvario_izq").val(),
      fondosaco_pelv = $("#fondosaco_pelv").val(),
      miometrio_pelv = $("#miometrio_pelv").val(),
      conclusion_pelv = $("#conclusion_pelv").val(),
      sugerencias_pelv = $("#sugerencias_pelv").val();


  $.ajax({
    url: url,
    method: "POST",
    data: {
      documento_paciente: documento_paciente,
      codigo_doctor: codigo_doctor,
      utero_tipo: utero_tipo,
      regular_pelvica: regular_pelvica,
      modular_pelvica: modular_pelvica,
      endometrio_pelvica: endometrio_pelvica,
      tumoranexial_si_pelvica: tumoranexial_si_pelvica,
      tumoranexial_no_pelvica: tumoranexial_no_pelvica,
      tumorAnexial_com: tumorAnexial_com,
      utero_medidas_pelv: utero_medidas_pelv,
      medidaUtero1: medidaUtero1,
      medidaUtero2: medidaUtero2,
      comentarioUtero: comentarioUtero,
      ovario_der1: ovario_der1,
      ovario_der2: ovario_der1,
      comentarioOvario_der: comentarioOvario_der,
      ovario_izq1: ovario_izq1,
      ovario_izq2: ovario_izq2,
      comentarioOvario_izq: comentarioOvario_izq,
      fondosaco_pelv: fondosaco_pelv,
      miometrio_pelv: miometrio_pelv,
      conclusion_pelv: conclusion_pelv,
      sugerencias_pelv: sugerencias_pelv,

    },
    success: function() {
      $("body").overhang({
        type: "success",
        message: "Ecografia Pelvica se ha registrado correctamente"
      });
      $("#pdf_ecografia_pelvica").attr("hidden", false);
    },
    error: function() {
      $("body").overhang({
        type: "error",
        message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
      }); 
    }
  });  
}

function imprimirEcografiaPelvica() {
  url = baseurl  + "administracion/verpdfpelvica";
  window.open(url, "_blank", " width=500, height=400");
}

// ECOGRAFIA MORFOLOGICA

function createEcografiaMorfologica() {

  var url = baseurl + "administracion/crearecografiamorfologica";
  var documento_paciente = $("#documento_paciente").val(),
      codigo_doctor = $("#codigo_doctor").val(),
      sexo_m = $("#sexo_m").val(),
      sexo_f = $("#sexo_f").val(),
      sexo_novisible = $("#sexo_novisible").val(),
      cefalico = $("#cefalico").val(),
      podatico = $("#podatico").val(),
      indiferente = $("#indiferente").val(),
      formacabeza= $("#formacabeza").val(),
      cerebelo = $("#cerebelo").val(),
      cisternaMagna = $("#cisternaMagna").val(),
      atrioVentricular = $("#atrioVentricular").val(),
      perfilCara = $("#perfilCara").val(),
      cuello = $("#cuello").val(),
      perfiltorax = $("#perfiltorax").val();
      corazon = $("#corazon").val(),
      columnaVertebral = $("#columnaVertebral").val(),
      abdomen = $("#abdomen").val(),
      dbp = $("#dbp").val(),
      cc = $("#cc").val(),
      ca = $("#ca").val(),
      lf = $("#lf").val(),
      comentario_morfo = $("#comentario_morfo").val();
      ip_der = $("#ip_der").val(),
      ip_izq = $("#ip_izq").val(),
      ponderadoFetal = $("#ponderadoFetal").val(),
      lcf_fetal = $("#lcf_fetal").val();
      conclusiones_morfo = $("#conclusiones_morfo").val();
  $.ajax({
    url: url,
    method: "POST",
    data: {
      documento_paciente: documento_paciente,
      codigo_doctor: codigo_doctor,
      sexo_m: sexo_m,
      sexo_f: sexo_f,
      sexo_novisible: sexo_novisible,
      cefalico: cefalico,
      podatico: podatico,
      indiferente: indiferente,
      formacabeza: formacabeza,
      cerebelo: cerebelo,
      cisternaMagna: cisternaMagna,
      atrioVentricular: atrioVentricular,
      perfilCara: perfilCara,
      cuello: cuello,
      perfiltorax: perfiltorax,
      corazon: corazon,
      columnaVertebral: columnaVertebral,
      abdomen: abdomen,
      dbp: dbp,
      cc: cc,
      ca: ca,
      lf: lf,
      comentario_morfo : comentario_morfo,
      ip_der: ip_der,
      ip_izq: ip_izq,
      ponderadoFetal: ponderadoFetal,
      lcf_fetal: lcf_fetal,
      conclusiones_morfo: conclusiones_morfo,
      

    },
    success: function() {
      $("body").overhang({
        type: "success",
        message: "Ecografia de Mama se ha registrado correctamente"
      });
      $("#pdfecografiamorfologica").attr("hidden", false);
    },
    error: function() {
      $("body").overhang({
        type: "error",
        message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
      }); 
    }
  });  
}

function imprimirEcografiaMorfologica() {
  url = baseurl  + "administracion/verpdfmorfologica";
  window.open(url, "_blank", " width=500, height=400");
}

// ECOGRAFIA GENETICA

function createEcografiaGenetica() {

  var url = baseurl + "administracion/crearecografiagenetica";
  var documento_paciente = $("#documento_paciente").val(),
      codigo_doctor = $("#codigo_doctor").val(),
      feto_unico = $("#feto_unico").val(),
      feto_multiple = $("#feto_multiple").val(),
      situacion_cefalico = $("#situacion_cefalico").val(),
      situacion_podatico = $("#situacion_podatico").val(),
      situacion_indiferente = $("#situacion_indiferente").val(),
      liquidoAmniotico = $("#liquidoAmniotico").val(),
      placenta= $("#placenta").val(),
      lcr= $("#lcr").val(),
      lcf = $("#lcf").val(),
      xd= $("#xd").val();
      art_Uteder= $("#art_Uteder").val();
      art_Uteizq= $("#art_Uteizq").val();
      ippromedio = $("#ippromedio").val(),
      huesoNasal= $("#huesoNasal").val();
      translucenciaNucal= $("#translucenciaNucal").val();
      ductudVenosa= $("#ductudVenosa").val();
      conclusion_genetica= $("#conclusion_genetica").val();
      sugerencia_genetica= $("#sugerencia_genetica").val();
  
    $.ajax({
    url: url,
    method: "POST",
    data: {
      documento_paciente: documento_paciente,
      codigo_doctor: codigo_doctor,
      feto_unico: feto_unico,
      feto_multiple: feto_multiple,
      situacion_cefalico: situacion_cefalico,
      situacion_podatico: situacion_podatico,
      situacion_indiferente: situacion_indiferente,
      liquidoAmniotico: liquidoAmniotico,
      placenta: placenta,
      lcr: lcr,
      lcf: lcf,
      xd: xd,
      art_Uteder: art_Uteder,
      art_Uteizq: art_Uteizq,
      ippromedio: ippromedio,
      huesoNasal: huesoNasal,
      translucenciaNucal: translucenciaNucal,
      ductudVenosa: ductudVenosa,
      conclusion_genetica: conclusion_genetica,
      sugerencia_genetica: sugerencia_genetica,
    },
    success: function() {
      $("body").overhang({
        type: "success",
        message: "Ecografia de Mama se ha registrado correctamente"
      });
      $("#pdfecografiagenetica").attr("hidden", false);
    },
    error: function() {
      $("body").overhang({
        type: "error",
        message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
      }); 
    }
  });  
}

function imprimirEcografiaGenetica() {
  url = baseurl  + "administracion/verpdfgenetica";
  window.open(url, "_blank", " width=500, height=400");
}

// ECOGRAFIA OBSTETRICA

function createEcografiaObstetrica() {

  var url = baseurl + "administracion/verpdfobstetrica";
  var documento_paciente = $("#documento_paciente").val(),
      codigo_doctor = $("#codigo_doctor").val(),
      feto_unico_obs = $("#feto_unico_obs").val(),
      feto_multiple_obs = $("#eto_multiple_obs").val(),
      situacion_cefalico_obs = $("#situacion_cefalico_obs").val(),
      situacion_podatico_obs = $("#situacion_podatico_obs").val(),
      situacion_indiferente_obs = $("#situacion_indiferente_obs").val(),
      estadoFeto = $("#estadoFeto").val(),
      placenta_obs= $("#placenta_obs").val(),
      dpb= $("#dpb").val(),
      lcf_obs = $("#lcf_obs").val(),
      min= $("#min").val();
      cc= $("#cc").val();
      ca= $("#ca").val();
      lf = $("#lf").val(),
      ila= $("#ila").val();
      percentil= $("#percentil").val();
      tipoParto= $("#tipoParto").val();
      conclusion_obs= $("#conclusion_obs").val();
      sugerencia_obs= $("#sugerencia_obs").val();
  
    $.ajax({
    url: url,
    method: "POST",
    data: {
      documento_paciente: documento_paciente,
      codigo_doctor: codigo_doctor,
      feto_unico_obs: feto_unico_obs,
      feto_multiple_obs: feto_multiple_obs,
      situacion_cefalico_obs: situacion_cefalico_obs,
      situacion_podatico_obs: situacion_podatico_obs,
      situacion_indiferente_obs: situacion_indiferente_obs,
      estadoFeto: estadoFeto,
      placenta_obs: placenta_obs,
      dpb: dpb,
      lcf_obs: lcf_obs,
      min: min,
      cc: cc,
      ca: ca,
      lf: lf,
      ila: ila,
      percentil: percentil,
      tipoParto: tipoParto,
      conclusion_obs: conclusion_obs,
      sugerencia_obs: sugerencia_obs,
    },
    success: function() {
      $("body").overhang({
        type: "success",
        message: "Ecografia de Mama se ha registrado correctamente"
      });
      $("#pdfecografiaobstetrica").attr("hidden", false);
    },
    error: function() {
      $("body").overhang({
        type: "error",
        message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
      }); 
    }
  });  
}

function imprimirEcografiaObstetrica() {
  url = baseurl  + "administracion/verpdfobstetrica";
  window.open(url, "_blank", " width=500, height=400");
}
