function pontuar(value){
  document.getElementById("pontuacao").value = value.value;
}

// function editPontuacao(){
//   var pontuacao = document.getElementById("pontuacao").value;
//   console.log(pontuacao);
//   if(document.getElementById("cm_star-1").value == pontuacao){
//     document.getElementById("cm_star-1").checked = true;
//   }
//   if(document.getElementById("cm_star-2").value == pontuacao){
//     document.getElementById("cm_star-2").checked = true;
//   }
//   if(document.getElementById("cm_star-3").value == pontuacao){
//     document.getElementById("cm_star-3").checked = true;
//   }
//   if(document.getElementById("cm_star-4").value == pontuacao){
//     document.getElementById("cm_star-4").checked = true;
//   }
//   if(document.getElementById("cm_star-5").value == pontuacao){
//     document.getElementById("cm_star-5").checked = true;
//   }
// }

// function listAvaliacao() {
  
//   var estrelas = document.getElementsByClassName("estrelas");
//   var qtd = estrelas.length;
//   console.log(qtd)
  
  
//   for(i=0;i<qtd;i++){
    
//     estrela=document.querySelectorAll(".estrelas")[i];
                                                  
//       var pontuacao = estrela.querySelector('input[name="valPon"]').value;
//       var id = estrela.querySelector('input[name="valPon"]').id;
//     console.log(pontuacao);
//     if(pontuacao == estrela.querySelector('input[id="cm_star-11"]').value){
//       estrela.querySelector('input[id="cm_star-11"]').checked = true;
//       console.log("passou no 1");
//     }
//     if(pontuacao == estrela.querySelector('input[id="cm_star-22"]').value){
//       estrela.querySelector('input[id="cm_star-22"]').checked = true;
//       console.log("passou no 2");
//     }
//     if(pontuacao == estrela.querySelector('input[id="cm_star-33"]').value){
//       estrela.querySelector('input[id="cm_star-33"]').checked = true;
//       console.log("passou no 3");
//     }
//     if(pontuacao == estrela.querySelector('input[id="cm_star-44"]').value){
//       estrela.querySelector('input[id="cm_star-44"]').checked = true;
//       console.log("passou no 4");
//     }
//     if(pontuacao == estrela.querySelector('input[id="cm_star-55"]').value){
//       estrela.querySelector('input[id="cm_star-55"]').checked = true;
//       console.log("passou no 5");
//     }
//   }
// }

$(document).ready(function(){

   $("#ck").attr('checked', false); 

});