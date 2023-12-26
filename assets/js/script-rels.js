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
function relCon(){
  var rel = $("#relat").val();
  var CodFor = $("#CodFor").val();
  var CodCli = $("#CodCli").val();
  var CodPro = $("#CodPro").val();
  var tipoc = $("#tipoc").val();
  var data1 = $("#data1").val();
  var data2 = $("#data2").val();
  if (rel=='relConP') {
    window.open("relfuncconP/"+data1+'/'+data2);
  }
  if (rel=='relConPCli') {
    window.open("relfuncconPCli/"+data1+'/'+data2+'/'+CodCli);
  }
  if (rel=='relConPFor') {
    window.open("relfuncconPFor/"+data1+'/'+data2+'/'+CodFor);
  }
  if (rel=='relConPTipo') {
    window.open("relfuncconPTipo/"+data1+'/'+data2+'/'+tipoc);
  }
  if (rel=='relConPTipoPro') {
    window.open("relfuncconPTipoPro/"+data1+'/'+data2+'/'+tipoc+'/'+CodPro);
  }
  if (rel=='relConPEstoqueDet') {
    window.open("relfuncconPEstoqueDet/"+data1+'/'+data2);
  }
  if (rel=='relConPEstoquePro') {
    window.open("relfuncconPEstoquePro/"+data1+'/'+data2+'/'+CodPro);
  }
  if (rel=='relConPEstoqueTipoPro') {
    window.open("relfuncconPEstoqueTipoPro/"+data1+'/'+data2+'/'+tipoc+'/'+CodPro);
  }
  if (rel=='relConPCancel') {
    window.open("relfuncconPCancel/"+data1+'/'+data2);
  }
}

function ocultaCon(val) {
  if (val.value == 'relConP' || val.value == 'relConPEstoqueDet' || val.value == 'relConPCancel') {
    document.getElementById('data12X').style.display = 'block';
    document.getElementById('CodForX').style.display = 'none';
    document.getElementById('CodCliX').style.display = 'none';
    document.getElementById('CodProX').style.display = 'none';
    document.getElementById('tipocX').style.display = 'none';
  } else if (val.value == 'relConPCli') {
    document.getElementById('data12X').style.display = 'block';
    document.getElementById('CodForX').style.display = 'none';
    document.getElementById('CodCliX').style.display = 'block';
    document.getElementById('CodProX').style.display = 'none';
    document.getElementById('tipocX').style.display = 'none';
  } else if (val.value == 'relConPFor') {
    document.getElementById('data12X').style.display = 'block';
    document.getElementById('CodForX').style.display = 'block';
    document.getElementById('CodCliX').style.display = 'none';
    document.getElementById('CodProX').style.display = 'none';
    document.getElementById('tipocX').style.display = 'none';
  } else if (val.value == 'relConPTipo') {
    document.getElementById('data12X').style.display = 'block';
    document.getElementById('CodForX').style.display = 'none';
    document.getElementById('CodCliX').style.display = 'none';
    document.getElementById('CodProX').style.display = 'none';
    document.getElementById('tipocX').style.display = 'block';
  } else if (val.value == 'relConPTipoPro' || val.value == 'relConPEstoqueTipoPro') {
    document.getElementById('data12X').style.display = 'block';
    document.getElementById('CodForX').style.display = 'none';
    document.getElementById('CodCliX').style.display = 'none';
    document.getElementById('CodProX').style.display = 'block';
    document.getElementById('tipocX').style.display = 'block';
  } else if (val.value == 'relConPEstoquePro') {
    document.getElementById('data12X').style.display = 'block';
    document.getElementById('CodForX').style.display = 'none';
    document.getElementById('CodCliX').style.display = 'none';
    document.getElementById('CodProX').style.display = 'block';
    document.getElementById('tipocX').style.display = 'none';
  } else {
    document.getElementById('data12X').style.display = 'none';
    document.getElementById('CodForX').style.display = 'none';
    document.getElementById('CodCliX').style.display = 'none';
    document.getElementById('CodProX').style.display = 'none';
    document.getElementById('tipocX').style.display = 'none';
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
