

    $("#table-doctores").DataTable({
        "lengthMenu": [10, 50, 100, 200],
        "language":{
          "processing": "Procesando",
          "search": "Buscar:",
          "lengthMenu": "Ver _MENU_  Atenciones",
          "info": "Mirando _START_ a _END_ de _TOTAL_ Atenciones",
          "zeroRecords": "No encontraron resultados",
          "paginate": {
            "first":      "Primera",
            "last":       "Ultima",
            "next":       "Siguiente",
            "previous":   "Anterior"
          }
        }
       });

    $("#crear-doctor").on("click", function () {
        var url1 = baseurl + "administracion/creardoctor",
            cpe = $("#cpe").val(),
            nombre = $("#nombre").val(),
            perfil = $("#perfil").val(),
            telefono  = $("#telefono").val(),
            direccion = $("#direccion").val(),
            correo = $("#correo").val(),
            password = $("#password").val();
          //VALIDACION 
            if (cpe === "") {
              $("#cpe").addClass("is-invalid");
            }
            else if (nombre === "") {
              $("#nombre").addClass("is-invalid");
            }
            else if (perfil === "") {
              $("#perfil").addClass("is-invalid");
            }
            else if (telefono === "") {
              $("#telefono").addClass("is-invalid");
            }
            else if (direccion === "") {
              $("#direccion").addClass("is-invalid");

            } else {
            $.ajax({
                url: url1,
                method: "POST",
                data: { 
                    cpe: cpe,
                    nombre: nombre,
                    perfil: perfil,
                    telefono: telefono,
                    direccion: direccion,
                    correo: correo,
                    password: password
                 },
                success: function () {
                  $("body").overhang({
                    type: "success",
                    message: "Doctor registrado correctamente"
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
          }
    });

    function getModalDataDoctor(id) {
        url = baseurl + "administracion/buscardoctorid";
        $.ajax({
          url: url,
          method: "POST",
          data: { id: id },
          success: function (data) {
            data = JSON.parse(data);
            console.log(data);
            $("#Doctorparametrizar").modal("show");
             $("#id_doctor1").val(data.codigo_doctor );
             $("#cpe1").val(data.cpe);
             $("#nombre1").val(data.nombre + ' ' + data.apellido);
             $("#perfil1").val(data.perfil);
             $("#telefono1").val(data.telefono);
             $("#direccion1").val(data.direccion);
             $("#correo1").val(data.email);
             $("#password1").val(data.password);
             if(data.lunes == 1){
               $("#lunes").prop("checked", true);
               $("#Horas_lunes").attr("readonly", false);
               $("#Horas_lunes").val((data.Horas_lunes).replace(" ", ""));
             }
             else {
               $("#lunes").prop("checked", false);
               $("#Horas_lunes").attr("readonly", true);
             }
             if(data.martes == 1){
               $("#martes").prop("checked", true);
               $("#Horas_martes").attr("readonly", false);
               $("#Horas_martes").val((data.Horas_martes).replace(" ", ""));
             }
             else {
               $("#martes").prop("checked", false);
               $("#Horas_martes").attr("readonly", true);
             }
             if(data.miercoles == 1){
               $("#miercoles").prop("checked", true);
               $("#Horas_miercoles").attr("readonly", false);
               $("#Horas_miercoles").val((data.Horas_miercoles).replace(" ", ""));
             }
             else {
               $("#miercoles").prop("checked", false);
               $("#Horas_miercoles").attr("readonly", true);
             }
             if(data.jueves == 1){
               $("#jueves").prop("checked", true);
               $("#Horas_jueves").attr("readonly", false);
               $("#Horas_jueves").val((data.Horas_jueves).replace(" ", ""));
             }
             else {
               $("#jueves").prop("checked", false);
               $("#Horas_jueves").attr("readonly", true);
             }
             if(data.viernes == 1){
               $("#viernes").prop("checked", true);
               $("#Horas_viernes").attr("readonly", false);
               $("#Horas_viernes").val((data.Horas_viernes).replace(" ", ""));
             }
             else {
               $("#viernes").prop("checked", false);
               $("#Horas_viernes").attr("readonly", true);
             }
             if(data.sabado == 1){
               $("#sabado").prop("checked", true);
               $("#Horas_sabado").attr("readonly", false);
               $("#Horas_sabado").val((data.Horas_sabado).replace(" ", ""));
             }
             else {
               $("#sabado").prop("checked", false);
               $("#Horas_sabado").attr("readonly", true);
             }
             if(data.domingo == 1){
               $("#domingo").prop("checked", true);
               $("#Horas_domingo").attr("readonly", false);
               $("#Horas_domingo").val((data.Horas_domingo).replace(" ", ""));
             }
             else {
               $("#domingo").prop("checked", false);
               $("#Horas_domingo").attr("readonly", true);
             }
        },
        error: function () {
          $("body").overhang({
            type: "error",
            message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
          }); 
        }
      }); 
    }
$("#todas").on("change", function (){
    if($(this).is(":checked")){
      $("input:checkbox[name=dias]").prop("checked", true);
      $(".Horas_data").each(function (){
        $(this).attr("readonly", false);//$(this).val("");
      });
    } else {
      $("input:checkbox[name=dias]").prop("checked", false);
      $(".Horas_data").each(function (){
        $(this).attr("readonly", true);$(this).val("");
      });
    }
});
function Checks_Change(inp_change){
  console.log("inp_change");
  $("#todas").prop("checked", false);
  if($("#"+inp_change).is(":checked")){
    $("#Horas_todas").attr("readonly", false);
    $("#Horas_"+inp_change).attr("readonly", false);
    $("#Horas_"+inp_change).val("");
  } else {
    //$("#todas").prop("checked", true);
    $("#Horas_todas").attr("readonly", true);
    $("#Horas_"+inp_change).attr("readonly", true);
    $("#Horas_"+inp_change).val("");
  }
}
function _warning(sms){
  $("body").overhang({
    type: "warning",
    message: sms
  });
}
function Val_Horas(__valluee,nameee){
  sttate = true;
  var __hora__2_prev = 0;
  __valluee = __valluee.replace(" ", "");
  if(__valluee!=""){
    valluee = __valluee.split(";");
    if(valluee.length>1){
      if(Number.isInteger((valluee[0])*1)){
        if(((valluee[0]*1)>0) && (valluee[0]*1)<=60){
          for(var i=1; i < valluee.length; i++){
            //console.log(i);
            //console.log(valluee[i]);
            //console.log(valluee[i]!="");
            if(valluee[i]!=""){
              if((valluee[i]).indexOf("-")>0){
                horas__ = (valluee[i]).split("-");
                if(horas__.length==2){
                  if( horas__[0]!="" && horas__[1]!=""){
                    __hora__1 = horas__[0];
                    __hora__2 = horas__[1];
                      if((__hora__1).indexOf(":")>0){
                          mins__ = (__hora__1).split(":");
                          if(mins__.length==2){
                            if( mins__[0]!="" && mins__[1]!=""    &&
                              (Number.isInteger((mins__[0])*1))   &&
                              (Number.isInteger((mins__[1])*1))
                            ){
                              if(!((mins__[0]*1)>=0 && (mins__[0]*1)<=24)){
                                sttate = false;_warning(" 9.0- Los horarios de la cita no tienen un formato correcto. El día "+nameee+" : "+__valluee); return sttate;
                              }
                              if(!((mins__[1]*1)>=0 && (mins__[1]*1)<=59)){
                                sttate = false;_warning(" 9.1- Los horarios de la cita no tienen un formato correcto. El día "+nameee+" : "+__valluee); return sttate;
                              }
                              __hora__1 = mins__[0]*1;
                            }else{
                              sttate = false;_warning(" 9- Los horarios de la cita no tienen un formato correcto. El día "+nameee+" : "+__valluee); return sttate;
                            }
                          }else{
                            sttate = false;_warning(" 8- Los horarios de la cita no tienen un formato correcto. El día "+nameee+" : "+__valluee); return sttate;
                          }
                      }else{
                        if(!(Number.isInteger(__hora__1*1))){
                          if((__hora__1*1)>0 && __hora__1*1 <= 24){
                            sttate = false;_warning(" 8.0- Los horarios de la cita no tienen un formato correcto. El día "+nameee+" : "+__valluee); return sttate;
                          }
                        }
                        __hora__1 = (__hora__1*1);
                      }
                      //console.log(__hora__1*1+"  >   "+__hora__2_prev + " = " +(__hora__1*1 > __hora__2_prev));
                      if(!(__hora__1*1 > __hora__2_prev)){
                        sttate = false;_warning(" 9.2- Los horarios deben de ser progresivos. El día "+nameee+" : "+(__hora__1*1+"  >   "+__hora__2_prev + " = " +(__hora__1*1 > __hora__2_prev))); return sttate;
                      }
                      if((__hora__2).indexOf(":")>0){
                          mins__ = (__hora__2).split(":");
                          if(mins__.length==2){
                            if( mins__[0]!="" && mins__[1]!=""    &&
                              (Number.isInteger((mins__[0])*1))   &&
                              (Number.isInteger((mins__[1])*1))
                            ){
                              if(!((mins__[0]*1)>=0 && (mins__[0]*1)<=24)){
                                sttate = false;_warning(" 9.0- Los horarios de la cita no tienen un formato correcto. El día "+nameee+" : "+__valluee); return sttate;
                              }
                              if(!((mins__[1]*1)>=0 && (mins__[1]*1)<=59)){
                                sttate = false;_warning(" 9.1- Los horarios de la cita no tienen un formato correcto. El día "+nameee+" : "+__valluee); return sttate;
                              }
                              __hora__2 = mins__[0]*1;
                              __hora__2_prev = (__hora__2*1);
                              console.log(__hora__2_prev);

                            }else{
                              sttate = false;_warning(" 7- Los horarios de la cita no tienen un formato correcto. El día "+nameee+" : "+__valluee); return sttate;
                            }
                          }else{
                            sttate = false;_warning(" 6- Los horarios de la cita no tienen un formato correcto. El día "+nameee+" : "+__valluee); return sttate;
                          }
                      }else{
                        if(!(Number.isInteger(__hora__2*1))){
                          if((__hora__2*1)>0 && __hora__2*1 <= 24){
                            sttate = false;_warning(" 6.0- Los horarios de la cita no tienen un formato correcto. El día "+nameee+" : "+__valluee); return sttate;
                          }
                        }
                        __hora__2_prev = (__hora__2*1);
                        //console.log(__hora__2_prev);
                      }
                      if(!((__hora__2*1) >=(__hora__1*1))){
                        sttate = false;_warning(" 6.1- Los horarios de la cita no tienen un formato correcto. El día "+nameee+" - "+horas__[0]+" - "+horas__[1]); return sttate;
                      }
                  }else{
                    sttate = false;_warning(" 5- Los horarios de la cita no tienen un formato correcto. El día "+nameee+" - "+__valluee); return sttate;
                  }
                }else{
                  sttate = false;_warning(" 4- Los horarios de la cita no tienen un formato correcto. El día "+nameee+" - "+__valluee); return sttate;
                }
              }else{
                sttate = false;_warning(" 3- Los horarios de la cita no tienen un formato correcto. El día "+nameee+" - "+__valluee); return sttate;
              }
            }else{
              sttate = false;_warning(" 2- Los horarios de la cita no tienen un formato correcto. El día "+nameee+" - "+__valluee); return sttate;
            }
          }
        }else{
          sttate = false;_warning(" 1.0- La duracion de la cita no tiene un formato correcto. El día "+nameee+" - "+__valluee); return sttate;
        }
      }else{
        sttate = false;_warning(" 1- La duracion de la cita no tiene un formato correcto. El día "+nameee+" - "+__valluee); return sttate;
      }
    }else{
      sttate = false;_warning(" 0- La configuracion de la cita no tiene un formato correcto. El día "+nameee+" - "+__valluee); return sttate;
    }
  }else{
    sttate = false;_warning(" .- Completar el horario del día "+nameee); return sttate;
  }
  return sttate;
}

$("#actualizardoctor").on("click", function () {
    var url3 = baseurl + "administracion/actualizardoctor",
        documento = $("#cpe1").val();
        nombre = $("#nombre1").val();
        perfil = $("#perfil1").val();
        telefono = $("#telefono1").val();
        direccion = $("#direccion1").val();
        correo = $("#correo1").val();
        id = $("#id_doctor1").val();
        $("#Horas_lunes").val(($("#Horas_lunes").val()).replace(" ", ""));    Horas_lunes = $("#Horas_lunes").val()
        $("#Horas_martes").val(($("#Horas_martes").val()).replace(" ", ""));     Horas_martes = $("#Horas_martes").val()
        $("#Horas_miercoles").val(($("#Horas_miercoles").val()).replace(" ", ""));    Horas_miercoles = $("#Horas_miercoles").val()
        $("#Horas_jueves").val(($("#Horas_jueves").val()).replace(" ", ""));     Horas_jueves = $("#Horas_jueves").val()
        $("#Horas_viernes").val(($("#Horas_viernes").val()).replace(" ", ""));    Horas_viernes = $("#Horas_viernes").val()
        $("#Horas_sabado").val(($("#Horas_sabado").val()).replace(" ", ""));     Horas_sabado = $("#Horas_sabado").val()
        $("#Horas_domingo").val(($("#Horas_domingo").val()).replace(" ", ""));    Horas_domingo = $("#Horas_domingo").val()
    sttate=true;
    if($("#lunes").is(":checked")){
      sttate = Val_Horas(Horas_lunes,"lunes"); /*console.log("lunes - "+Horas_lunes+"  _________________________________");console.log(sttate);*/}
    if(sttate){
      if($("#martes").is(":checked")){
        sttate = Val_Horas(Horas_martes,"martes"); /*console.log("martes - "+Horas_martes+"  _________________________________");console.log(sttate);*/}
      if(sttate){
        if($("#miercoles").is(":checked")){
          sttate = Val_Horas(Horas_miercoles,"miercoles"); /*console.log("miercoles - "+Horas_miercoles+"  _________________________________");console.log(sttate);*/}
        if(sttate){
          if($("#jueves").is(":checked")){
            sttate = Val_Horas(Horas_jueves,"jueves"); /*console.log("jueves - "+Horas_jueves+"  _________________________________");console.log(sttate);*/}
          if(sttate){
            if($("#viernes").is(":checked")){
              sttate = Val_Horas(Horas_viernes,"viernes"); /*console.log("viernes - "+Horas_viernes+"  _________________________________");console.log(sttate);*/}
            if(sttate){
              if($("#sabado").is(":checked")){
                sttate = Val_Horas(Horas_sabado,"sabado"); /*console.log("sabado - "+Horas_sabado+"  _________________________________");console.log(sttate);*/}
              if(sttate){
                if($("#domingo").is(":checked")){
                  sttate = Val_Horas(Horas_domingo,"domingo"); /*console.log("domingo - "+Horas_domingo+"  _________________________________");console.log(sttate);*/}
              }
            }
          }
        }
      }
    }
        
    if(sttate){

      if($("#lunes").is(":checked")){
        lunes = 1;
      }
      else {
        lunes = 0
      }
      if($("#martes").is(":checked")){
        martes = 1;
      }
      else {
        martes = 0
      }
      if($("#miercoles").is(":checked")){
        miercoles = 1;
      }
      else {
        miercoles = 0
      }
      if($("#jueves").is(":checked")){
        jueves = 1;
      }
      else {
        jueves = 0
      }
      if($("#viernes").is(":checked")){
        viernes = 1;
      }
      else {
        viernes = 0
      }
      if($("#sabado").is(":checked")){
        sabado = 1;
      }
      else {
        sabado = 0
      }
      if($("#domingo").is(":checked")){
        domingo = 1;
      }
      else {
        domingo = 0
      }
        $.ajax({
          url: url3,
          method: "POST",
          data: {
            lunes: lunes,
            martes: martes,
            miercoles: miercoles,
            jueves: jueves,
            viernes: viernes,
            sabado: sabado,
            domingo: domingo,
            Horas_lunes: Horas_lunes,
            Horas_martes: Horas_martes,
            Horas_miercoles: Horas_miercoles,
            Horas_jueves: Horas_jueves,
            Horas_viernes: Horas_viernes,
            Horas_sabado: Horas_sabado,
            Horas_domingo: Horas_domingo,
            documento: documento,
            nombre: nombre,
            perfil: perfil,
            telefono: telefono,
            direccion: direccion,
            correo: correo,
            id: id
          },
        
          success: function (){
            $("body").overhang({
              type: "success",
              message: "Doctor configurado correctamente'"
            });
            setTimeout(reloadPage, 3000);
          },
          error: function () {
            $("body").overhang({
              type: "error",
              message: "Alerta ! Tenemos un problema al conectar con la base de datos verifica tu red.",
            }); 
          }
        })
    }

});

const reloadPage = () => {
  location.reload();
}


