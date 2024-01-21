// Gestor
function relGes(){
  var inat = $("#inativo").val();
    window.open("relfuncgesR/"+inat);
}
// Fim Gestor


// Fiscal
function relFis(){
  var inat = $("#inativo").val();
    window.open("relfuncfisR/"+inat);
}
// Fim Fiscal


// Prefeituras
function relPref(){
  var rel = $("#relat").val();
  var inat = $("#inativo").val();
  if (rel=='relPreD') {
    window.open("relfuncpreD/"+inat);
  }
  if (rel=='relPreR') {
    window.open("relfuncpreR/"+inat);
  }
}
// Fim Prefeituras


// Parceiros
function relPar(){
  var rel = $("#relat").val();
  var inat = $("#inativo").val();
  var uf = $("#uf").val();
  if (rel=='relParD') {
    window.open("relfuncparD/"+inat);
  }
  if (rel=='relParR') {
    window.open("relfuncparR/"+inat);
  }
}

function ocultaPar(val) {
    document.getElementById('inativoX').style.display = 'block';
};
// Fim Parceiros


// Contrato
function relConv(){
  var rel = $("#relat").val();
  var CodPre = $("#CodPre").val();
  var CodGes = $("#CodGes").val();
  var tipoc = $("#CodFis").val();
  var data1 = $("#data1").val();
  var data2 = $("#data2").val();
  if (rel=='relConP') {
    window.open("relfuncconvP/"+data1+'/'+data2);
  }
  if (rel=='relConPGes') {
    window.open("relfuncconvPGes/"+data1+'/'+data2+'/'+CodGes);
  }
  if (rel=='relConvPPre') {
    window.open("relfuncconvPPre/"+data1+'/'+data2+'/'+CodPre);
  }
  if (rel=='relConPTipo') {
    window.open("relfuncconvPDis/"+data1+'/'+data2+'/'+CodFis);
  }
}

function ocultaConv(val) {
  if (val.value == 'relConvP') {
    document.getElementById('data12X').style.display = 'block';
    document.getElementById('CodPreX').style.display = 'none';
    document.getElementById('CodGesX').style.display = 'none';
    document.getElementById('CodFisX').style.display = 'none';
  } else if (val.value == 'relConvPGes') {
    document.getElementById('data12X').style.display = 'block';
    document.getElementById('CodGesX').style.display = 'block';
    document.getElementById('CodPreX').style.display = 'none';
    document.getElementById('CodFisX').style.display = 'none';
  } else if (val.value == 'relConvPPre') {
    document.getElementById('data12X').style.display = 'block';
    document.getElementById('CodGesX').style.display = 'none';
    document.getElementById('CodPreX').style.display = 'block';
    document.getElementById('CodFisX').style.display = 'none';
  } else if (val.value == 'relConvPFis') {
    document.getElementById('data12X').style.display = 'block';
    document.getElementById('CodGesX').style.display = 'none';
    document.getElementById('CodPreX').style.display = 'none';
    document.getElementById('CodFisX').style.display = 'block';
  } else {
    document.getElementById('data12X').style.display = 'none';
    document.getElementById('CodGesX').style.display = 'none';
    document.getElementById('CodPreX').style.display = 'none';
    document.getElementById('CodFisX').style.display = 'none';
  } 
};


function csvCon(){
  var rel = $("#relat").val();
  var CodFor = $("#CodFor").val();
  var data1 = $("#data1").val();
  var data2 = $("#data2").val();
  if (rel=='relConF') {
    window.open("gerarCsvContratosPorFornecedor/"+CodFor);
  }
  if (rel=='relConP') {
    window.open("gerarCsvContratosPorPeriodo/"+data1+'/'+data2);
  }
}


function relContratoC(CodLanc){
  var CodC  = CodLanc;
    window.open("relcontratoc/"+CodC);
}
