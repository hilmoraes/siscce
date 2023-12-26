$(function(){

  $('.contFor').click(function(){
        var id = $(this).data('id');
        $("#idForCon").val(id);

      //alert(id);
      $.ajax({
          url: BASE_URL + 'fornecedores/contato',
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
             ocultAllFor();
            $('.tableCont tbody').html('');
              for (var i = 0; i < r.length; i++){
                 $('.tableCont tbody').prepend('<tr id="'+r[i]['cmpCodFor']+'">'+
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
                    +'<a data-toggle="Editar" title="Editar" href="#" onClick="editContFor(this)" class="btnEditCont btn btn-sistem btn-sistem-green"><i class="fa fa-edit"></i></a>'
                  +'</td>'
                  +'<td>'
                    +'<a data-toggle="Excluir" title="Excluir" href="#" onClick="excContFor('+r[i]['cmpCodRes']+')" class="btn btn-sistem btn-sistem-red"><i class="fa fa-trash"></i></a>'
                  +'</td>'
                +'</tr>');
              }

              $('#edit').modal('show');
          }
      });
  });

});
/*Adicionar Contato*/

function addContaFor(){
  var id         = $("#idForCon").val();
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
        url: BASE_URL + 'fornecedores/addContato',
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
             $('.tableCont tbody').prepend('<tr id="'+r[i]['cmpCodFor']+'">'+
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
                +'<a data-toggle="Editar" title="Editar" href="#" onClick="editContFor(this)" class="btnEditCont btn  btn-sistem btn-sistem-green"><i class="fa fa-edit"></i></a>'
              +'</td>'
              +'<td>'
                +'<a data-toggle="Excluir" title="Excluir" href="#" onClick="excContFor(excContFor('+r[i]['cmpCodRes']+'))" class="btn btn-sistem btn-sistem-red"><i class="fa fa-trash"></i></a>'
              +'</td>'
            +'</tr>');
          }

          limpraContFor();

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




function editContaFor(){
  var id       = $("#idCon").val();
  var idFor    = $("#idForCon").val();
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
        url: BASE_URL + 'fornecedores/editContatoFor',
        type: 'post',
        dataType:'json',
        data: {id:id,idFor:idFor,NomeRes:NomeRes,FoneRes:FoneRes,CelularRes:CelularRes,RgRes:RgRes,CpfRes:CpfRes,EndRes:EndRes,NumEndRes:NumEndRes,BaiRes:BaiRes,CepRes:CepRes,CodCidRes:CodCidRes,user:user},
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

             $('.tableCont tbody').prepend('<tr id="'+r[i]['cmpCodFor']+'">'+
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
                +'<a data-toggle="Editar" title="Editar" href="#" onClick="editContFor(this)" class="btnEditCont btn  btn-sistem btn-sistem-green"><i class="fa fa-edit"></i></a>'
              +'</td>'
              +'<td>'  
                +'<a data-toggle="Excluir" title="Excluir" href="#" onClick="excContFor(excContFor('+r[i]['cmpCodRes']+'))" class="btn btn-sistem btn-sistem-red"><i class="fa fa-trash"></i></a>'
              +'</td>'
            +'</tr>');
           }
          }

          limpraContFor();

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





function editContFor(data) {
   document.getElementById("contato").style.display = 'none';
   document.getElementById("cadContatoFor").style.display = 'block';
   document.getElementById("addContFor").style.display = 'none';
   document.getElementById("editContatoFor").style.display = 'block';
   document.getElementById("editCancelFor").style.display = 'block';
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
 
function cadContFor(dados){
  alert(dados);
}


function contEditFor(letra) {
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
    document.getElementById("cadContatoFor").style.display = 'block';
    document.getElementById("addContFor").style.display = 'block';
    document.getElementById("editContatoFor").style.display = 'none';
    document.getElementById("editCancelFor").style.display = 'none';
    
    // $("#frmCont").css('"style="display:block"');
  }
  if(l == 'Voltar'){
    $("#contato").val('Adicionar');
    document.getElementById("cadContatoFor").style.display = 'none';
    // document.getElementById("frmCont").style.display = 'none';
    // document.getElementById("addContFor").style.display = 'block';
    // document.getElementById("editContatoFor").style.display = 'none';
    // document.getElementById("editCancelFor").style.display = 'none';
  }
}

function cancelarFor(){
   // $("#nome").val('');
   // $("#fone").val('');
   // $("#telefone").val('');
   // $("#RgRes").val('');
   // $("#CpfRes").val('');
   $("#contato").val('Adicionar');
   document.getElementById("cadContatoFor").style.display = 'none';
   document.getElementById("editContatoFor").style.display = 'none';
   document.getElementById("editCancelFor").style.display = 'none';
   document.getElementById("contato").style.display = 'block';
   
}

function ocultAllFor(){
  $("#contato").val('Adicionar');
   document.getElementById("cadContatoFor").style.display = 'none';
   document.getElementById("editContatoFor").style.display = 'none';
   document.getElementById("editCancelFor").style.display = 'none';
   document.getElementById("contato").style.display = 'block';
}

function limpraContFor(){
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



function excContFor(data) {

  var id    = data;
  var idFor = $("#idForCon").val();

 $.ajax({
        url: BASE_URL + 'fornecedores/excContato',
        type: 'post',
        dataType:'json',
        data: {id:id,idFor:idFor},
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

             $('.tableCont tbody').prepend('<tr id="'+r[i]['cmpCodFor']+'">'+
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
                +'<a data-toggle="Editar" title="Editar" href="#" onClick="editContFor(this)" class="btnEditCont btn  btn-sistem btn-sistem-green"><i class="fa fa-edit"></i></a>'
              +'</td>'
              +'<td>'  
                +'<a data-toggle="Excluir" title="Excluir" href="#" onClick="excContFor()" class="btn btn-sistem btn-sistem-red"><i class="fa fa-trash"></i></a>'
              +'</td>'
            +'</tr>');
           }
          }

          limpraContFor();

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
