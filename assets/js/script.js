$(function(){
	// alteração de senha
  $("#modAlpw").on('click', function(){
      $("#pw").modal('show');
      $("#novaSenha").focus();
    });


   $("#alterPassword").on('click', function(){
    
    var id_funcionario = $("#id_funcionario").val();
    var senhaAtual = $("#senhaAtual").val();
    var novaSenha = $("#novaSenha").val();
   // alert(id_funcionario+"Senha atual: "+senhaAtual+" Nova senha: "+novaSenha);
    
    $.ajax({
      url: BASE_URL + 'login/alterarSenha',
      type:'POST',
      data:{id_funcionario:id_funcionario,senhaAtual:senhaAtual,novaSenha:novaSenha},
      success:function(r){
       if(r == 1){
         toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        toastr["success"]("Senha alterada com Sucesso!", "Aviso!")
        $("#senhaAtual").val("");
        $("#novaSenha").val("");
        $("#pw").modal('hide');
       }else{
        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        toastr["error"]("Senha atual inválida!", "Aviso!")
       }
       
      }
    });
  });
// fim alteração de senha

  // $("#Tipo").on('change', function(){

  //   var tipo = this.value;

  //   $.ajax({
  //     url: BASE_URL + 'contratos/consultatipoAjax',
  //       type:'POST',
  //       dataType:'json',
  //       data:{tipo:tipo},
  //       success:function(r){
  //         // console.log(r);
  //         $("#Contrato").val(r);
  //       } 
  //   })
  // });


  $('.contPac').click(function(){
        var id = $(this).data('id');
        $("#idPacCon").val(id);

      //alert(id);
      $.ajax({
          url: BASE_URL + 'pacientes/contato',
          type: 'post',
          dataType:'json',
          data: {id:id},
           beforeSend:function(){
            $(".loader").show();
           },
          success: function(r){ 
            $(".loader").hide();
             $("#NomeRes").val('');
             $("#FoneRes").val('');
             $("#CelularRes").val('');
             $("#RgRes").val('');
             $("#CpfRes").val('');
             $("#EndRes").val('');
             $("#NumEndRes").val('');
             $("#BaiRes").val('');
             $("#CepRes").val('');
             $("#CodCidRes").val('');
             ocultAllPac();
            $('.tableCont tbody').html('');
              for (var i = 0; i < r.length; i++){
                 $('.tableCont tbody').prepend('<tr id="'+r[i]['cmpCodPac']+'">'+
                  '<td style="display:none">'  +r[i]['cmpCodRes']+'</td>'
                  +'<td data-nome="NomeRes">'  +r[i]['cmpNomeRes']+'</td>'
                  +'<td data-nome="FoneRes">' +r[i]['cmpFoneRes']+'</td>'
                  +'<td data-nome="CelularRes">'  +r[i]['cmpCelularRes']+'</td>'
                  +'<td data-nome="CpfRes">'+r[i]['cmpCpfRes']+'</td>'
                  +'<td data-nome="RgRes">'+r[i]['cmpRgRes']+'</td>'
                  +'<td style="display:none" data-nome="EndRes">'+r[i]['cmpEndRes']+'</td>'
                  +'<td style="display:none" data-nome="NumEndRes">'+r[i]['cmpNumEndRes']+'</td>'
                  +'<td style="display:none" data-nome="BaiRes">'+r[i]['cmpBaiRes']+'</td>'
                  +'<td style="display:none" data-nome="CepRes">'+r[i]['cmpCepRes']+'</td>'
                  +'<td style="display:none" data-nome="CodCidRes">'+r[i]['cmpCodCidRes']+'</td>'
                  +'<td>'
                    // +'<a data-toggle="Editar" title="Editar" href="#" onClick="editContPac('+r[i]['cmpNomeRes']+','+r[i]['cmpFoneRes']+','+r[i]['cmpCelularRes']+','+r[i]['cmpCpfRes']+','+r[i]['cmpRgRes']+','+r[i]['cmpCodCli']+')" class="btnEditCont btn  btn-sistem btn-sistem"><i class="fa fa-edit"></i></a>'
                    +'<a data-toggle="Editar" title="Editar" href="#" onClick="editContPac(this)" class="btnEditCont btn btn-sistem btn-sistem-green"><i class="fa fa-edit"></i></a>'
                  +'</td>'
                  +'<td>'
                    +'<a data-toggle="Excluir" title="Excluir" href="#" onClick="excContPac('+r[i]['cmpCodRes']+')" class="btn btn-sistem btn-sistem-red"><i class="fa fa-trash"></i></a>'
                // +'<a class="btn btn-sistem btn-sistem-red" title="Excluir"><i class="fa fa-trash"></i></a>'
                  +'</td>'
                +'</tr>');

              }

              $('#edit').modal('show');
          }
      });
  });

});
/*Adicionar Contato*/

function addContaPac(){
  var id         = $("#idPacCon").val();
  var NomeRes    = $("#NomeRes").val();
  var FoneRes    = $("#FoneRes").val();
  var CelularRes = $("#CelularRes").val();
  var RgRes      = $("#RgRes").val();
  var CpfRes     = $("#CpfRes").val();
  var EndRes     = $("#EndRes").val();
  var NumEndRes  = $("#NumEndRes").val();
  var BaiRes     = $("#BaiRes").val();
  var CepRes     = $("#CepRes").val();
  var CodCidRes  = $("#CodCidRes").val();
  var user       = $("#user").val();

    // alert(id);
    $.ajax({
        url: BASE_URL + 'pacientes/addContato',
        type: 'post',
        data: {id:id,NomeRes:NomeRes,FoneRes:FoneRes,CelularRes:CelularRes,RgRes:RgRes,CpfRes:CpfRes,EndRes:EndRes,NumEndRes:NumEndRes,BaiRes:BaiRes,CepRes:CepRes,CodCidRes:CodCidRes,user:user},
        dataType:'json',
        beforeSend:function(){
          $(".loader").show();
        },
        success: function(r){ 
          $(".loader").hide();
          $('.tableCont tbody').html('');
          for (var i = 0; i < r.length; i++){
             $('.tableCont tbody').prepend('<tr id="'+r[i]['cmpCodPac']+'">'+
              '<td style="display:none">'  +r[i]['cmpCodRes']+'</td>'
              +'<td data-nome="NomeRes">'  +r[i]['cmpNomeRes']+'</td>'
              +'<td data-nome="FoneRes">' +r[i]['cmpFoneRes']+'</td>'
              +'<td data-nome="CelularRes">'  +r[i]['cmpCelularRes']+'</td>'
              +'<td data-nome="CpfRes">'+r[i]['cmpCpfRes']+'</td>'
              +'<td data-nome="RgRes">'+r[i]['cmpRgRes']+'</td>'
              +'<td style="display:none" data-nome="EndRes">'+r[i]['cmpEndRes']+'</td>'
              +'<td style="display:none" data-nome="NumEndRes">'+r[i]['cmpNumEndRes']+'</td>'
              +'<td style="display:none" data-nome="BaiRes">'+r[i]['cmpBaiRes']+'</td>'
              +'<td style="display:none" data-nome="CepRes">'+r[i]['cmpCepRes']+'</td>'
              +'<td style="display:none" data-nome="CodCidRes">'+r[i]['cmpCodCidRes']+'</td>'
              +'<td>'
                // +'<a data-toggle="Editar" title="Editar" href="#" onClick="editContPac('+r[i]['cmpNomeRes']+','+r[i]['cmpFoneRes']+','+r[i]['cmpCelularRes']+','+r[i]['cmpCpfRes']+','+r[i]['cmpRgRes']+','+r[i]['cmpCodCli']+')" class="btnEditCont btn  btn-sistem btn-sistem"><i class="fa fa-edit"></i></a>'
                +'<a data-toggle="Editar" title="Editar" href="#" onClick="editContPac(this)" class="btnEditCont btn  btn-sistem btn-sistem-green"><i class="fa fa-edit"></i></a>'
              +'</td>'
              +'<td>'
                +'<a data-toggle="Excluir" title="Excluir" href="#" onClick="excContPac(excContPac('+r[i]['cmpCodRes']+'))" class="btn btn-sistem btn-sistem-red"><i class="fa fa-trash"></i></a>'
                // +'<a class="btn btn-sistem btn-sistem-red" title="Excluir"><i class="fa fa-trash"></i></a>'
              +'</td>'
            +'</tr>');

          }

          limpraContPac();

          toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        toastr["success"]("Responsável cadastrado com Sucesso!", "Aviso!")

           
        }
    });
}




function editContaPac(){
  var id       = $("#idCon").val();
  var idPac    = $("#idPacCon").val();
  var NomeRes     = $("#NomeRes").val();
  var FoneRes     = $("#FoneRes").val();
  var CelularRes = $("#CelularRes").val();
  var RgRes    = $("#RgRes").val();
  var CpfRes    = $("#CpfRes").val();
  var EndRes     = $("#EndRes").val();
  var NumEndRes  = $("#NumEndRes").val();
  var BaiRes     = $("#BaiRes").val();
  var CepRes     = $("#CepRes").val();
  var CodCidRes  = $("#CodCidRes").val();
  var user = $("#user").val();

    $.ajax({
        url: BASE_URL + 'pacientes/editContatoPac',
        type: 'post',
        dataType:'json',
        data: {id:id,idPac:idPac,NomeRes:NomeRes,FoneRes:FoneRes,CelularRes:CelularRes,RgRes:RgRes,CpfRes:CpfRes,EndRes:EndRes,NumEndRes:NumEndRes,BaiRes:BaiRes,CepRes:CepRes,CodCidRes:CodCidRes,user:user},
        beforeSend:function(){
          $(".loader").show();
        },
        
        success: function(r){ 
          $(".loader").hide();
          $('.tableCont tbody').html('');
          for (var i = 0; i < r.length; i++){
            if (r=='erro') {

              toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
              }
              toastr["danger"]("Erro ao realizar alteração!", "Aviso!")

            } else{

             $('.tableCont tbody').prepend('<tr id="'+r[i]['cmpCodPac']+'">'+
              '<td style="display:none">'  +r[i]['cmpCodRes']+'</td>'
              +'<td data-nome="NomeRes">'  +r[i]['cmpNomeRes']+'</td>'
              +'<td data-nome="FoneRes">' +r[i]['cmpFoneRes']+'</td>'
              +'<td data-nome="CelularRes">'  +r[i]['cmpCelularRes']+'</td>'
              +'<td data-nome="CpfRes">'+r[i]['cmpCpfRes']+'</td>'
              +'<td data-nome="RgRes">'+r[i]['cmpRgRes']+'</td>'
              +'<td style="display:none" data-nome="EndRes">'+r[i]['cmpEndRes']+'</td>'
              +'<td style="display:none" data-nome="NumEndRes">'+r[i]['cmpNumEndRes']+'</td>'
              +'<td style="display:none" data-nome="BaiRes">'+r[i]['cmpBaiRes']+'</td>'
              +'<td style="display:none" data-nome="CepRes">'+r[i]['cmpCepRes']+'</td>'
              +'<td style="display:none" data-nome="CodCidRes">'+r[i]['cmpCodCidRes']+'</td>'
              +'<td>'
                // +'<a data-toggle="Editar" title="Editar" href="#" onClick="editContPac('+r[i]['cmpNomeRes']+','+r[i]['cmpFoneRes']+','+r[i]['cmpCelularRes']+','+r[i]['cmpCpfRes']+','+r[i]['cmpRgRes']+','+r[i]['cmpCodCli']+')" class="btnEditCont btn  btn-sistem btn-sistem"><i class="fa fa-edit"></i></a>'
                +'<a data-toggle="Editar" title="Editar" href="#" onClick="editContPac(this)" class="btnEditCont btn  btn-sistem btn-sistem-green"><i class="fa fa-edit"></i></a>'
              +'</td>'
              +'<td>'  
                +'<a data-toggle="Excluir" title="Excluir" href="#" onClick="excContPac(excContPac('+r[i]['cmpCodRes']+'))" class="btn btn-sistem btn-sistem-red"><i class="fa fa-trash"></i></a>'
                // +'<a class="btn btn-sistem btn-sistem-red" title="Excluir"><i class="fa fa-trash"></i></a>'
              +'</td>'
            +'</tr>');
           }
          }

          limpraContPac();

          toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        toastr["success"]("Responsável alterado com Sucesso!", "Aviso!")

           
        }
    });
  console.log(id+NomeRes+FoneRes+CelularRes+RgRes+CpfRes+EndRes+NumEndRes+BaiRes+CepRes+CodCidRes+user);
}





function editContPac(data) {
   document.getElementById("contato").style.display = 'none';
   document.getElementById("cadContatoPac").style.display = 'block';
   document.getElementById("addContPac").style.display = 'none';
   document.getElementById("editContatoPac").style.display = 'block';
   document.getElementById("editCancelPac").style.display = 'block';
   var tableData = $(data).closest("tr").find("td:not(:last-child)").map(function(){
      return $(this).text().trim();
   }).get();

   let id = $(data).closest("tr");
   console.log(tableData);
   $("#idCon").val(tableData[0]);
   $("#NomeRes").val(tableData[1]);
   $("#FoneRes").val(tableData[2]);
   $("#CelularRes").val(tableData[3]);
   $("#CpfRes").val(tableData[4]);
   $("#RgRes").val(tableData[5]);
   $("#EndRes").val(tableData[6]);
   $("#NumEndRes").val(tableData[7]);
   $("#BaiRes").val(tableData[8]);
   $("#CepRes").val(tableData[9]);
   $("#CodCidRes").val(tableData[10]);
}
 
function cadCont(dados){
  alert(dados);
}


function contEditPac(letra) {
  let l = letra;
  if(l == 'Adicionar'){
     $("#contato").val('Voltar');
     $("#NomeRes").val('');
     $("#FoneRes").val('');
     $("#CelularRes").val('');
     $("#RgRes").val('');
     $("#CpfRes").val('');
     $("#EndRes").val('');
     $("#NumEndRes").val('');
     $("#BaiRes").val('');
     $("#CepRes").val('');
     $("#CodCidRes").val('');
    document.getElementById("cadContatoPac").style.display = 'block';
    document.getElementById("addContPac").style.display = 'block';
    document.getElementById("editContatoPac").style.display = 'none';
    document.getElementById("editCancelPac").style.display = 'none';
    
    // $("#frmCont").css('"style="display:block"');
  }
  if(l == 'Voltar'){
    $("#contato").val('Adicionar');
    document.getElementById("cadContatoPac").style.display = 'none';
    // document.getElementById("frmCont").style.display = 'none';
    // document.getElementById("addContPac").style.display = 'block';
    // document.getElementById("editContatoPac").style.display = 'none';
    // document.getElementById("editCancelPac").style.display = 'none';
  }
}

function cancelarPac(){
   // $("#nome").val('');
   // $("#fone").val('');
   // $("#telefone").val('');
   // $("#RgRes").val('');
   // $("#CpfRes").val('');
   $("#contato").val('Adicionar');
   document.getElementById("cadContatoPac").style.display = 'none';
   document.getElementById("editContatoPac").style.display = 'none';
   document.getElementById("editCancelPac").style.display = 'none';
   document.getElementById("contato").style.display = 'block';
   
}

function ocultAllPac(){
  $("#contato").val('Adicionar');
   document.getElementById("cadContatoPac").style.display = 'none';
   document.getElementById("editContatoPac").style.display = 'none';
   document.getElementById("editCancelPac").style.display = 'none';
   document.getElementById("contato").style.display = 'block';
}

function limpraContPac(){
   $("#NomeRes").val('');
   $("#FoneRes").val('');
   $("#CelularRes").val('');
   $("#RgRes").val('');
   $("#CpfRes").val('');
   $("#EndRes").val('');
   $("#NumEndRes").val('');
   $("#BaiRes").val('');
   $("#CepRes").val('');
   // $("#CodCidRes").html('<option value="">Selecione</option>')
   $("#CodCidRes").val('');
   
}



function excContPac(data) {

  var id    = data;
  var idPac = $("#idPacCon").val();

 $.ajax({
        url: BASE_URL + 'pacientes/excContato',
        type: 'post',
        dataType:'json',
        data: {id:id,idPac:idPac},
        beforeSend:function(){
          $(".loader").show();
        },
        
        success: function(r){ 
          $(".loader").hide();
          $('.tableCont tbody').html('');
          for (var i = 0; i < r.length; i++){
            if (r=='erro') {

              toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
              }
              toastr["danger"]("Erro ao realizar alteração!", "Aviso!")

            } else{

             $('.tableCont tbody').prepend('<tr id="'+r[i]['cmpCodPac']+'">'+
              '<td style="display:none">'  +r[i]['cmpCodRes']+'</td>'
              +'<td data-nome="NomeRes">'  +r[i]['cmpNomeRes']+'</td>'
              +'<td data-nome="FoneRes">' +r[i]['cmpFoneRes']+'</td>'
              +'<td data-nome="CelularRes">'  +r[i]['cmpCelularRes']+'</td>'
              +'<td data-nome="CpfRes">'+r[i]['cmpCpfRes']+'</td>'
              +'<td data-nome="RgRes">'+r[i]['cmpRgRes']+'</td>'
              +'<td style="display:none" data-nome="EndRes">'+r[i]['cmpEndRes']+'</td>'
              +'<td style="display:none" data-nome="NumEndRes">'+r[i]['cmpNumEndRes']+'</td>'
              +'<td style="display:none" data-nome="BaiRes">'+r[i]['cmpBaiRes']+'</td>'
              +'<td style="display:none" data-nome="CepRes">'+r[i]['cmpCepRes']+'</td>'
              +'<td style="display:none" data-nome="CodCidRes">'+r[i]['cmpCodCidRes']+'</td>'
              +'<td>'
                // +'<a data-toggle="Editar" title="Editar" href="#" onClick="editContPac('+r[i]['cmpNomeRes']+','+r[i]['cmpFoneRes']+','+r[i]['cmpCelularRes']+','+r[i]['cmpCpfRes']+','+r[i]['cmpRgRes']+','+r[i]['cmpCodCli']+')" class="btnEditCont btn  btn-sistem btn-sistem"><i class="fa fa-edit"></i></a>'
                +'<a data-toggle="Editar" title="Editar" href="#" onClick="editContPac(this)" class="btnEditCont btn  btn-sistem btn-sistem-green"><i class="fa fa-edit"></i></a>'
              +'</td>'
              +'<td>'  
                +'<a data-toggle="Excluir" title="Excluir" href="#" onClick="excContPac()" class="btn btn-sistem btn-sistem-red"><i class="fa fa-trash"></i></a>'
                // +'<a class="btn btn-sistem btn-sistem-red" title="Excluir"><i class="fa fa-trash"></i></a>'
              +'</td>'
            +'</tr>');
           }
          }

          limpraContPac();

          toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        toastr["success"]("Responsável alterado com Sucesso!", "Aviso!")

           
        }
    });
   console.log(data);

    $('input[VrSaca=price]').mask('000.000.000.000.000,00', {reverse:true,placeholder:"0,00"});
}
