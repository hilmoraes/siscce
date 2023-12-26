function atualizarPorTon() {
  // Obtendo o elemento <select>
    var selectElement = document.getElementById('CodPro');
  // Obtendo o texto da opção selecionada
    var textoSelecionado = selectElement.options[selectElement.selectedIndex].text;
    // Obtendo o último caractere do texto
    var ultimoCaractere = textoSelecionado.charAt(textoSelecionado.length - 1);
  // Atualizando o valor do <input>
    document.getElementById('PorTonelada').value = ultimoCaractere;
}


function calcContrato() {
  var PorTon = document.getElementById('PorTonelada').value;

  if (document.getElementById('QtdSaca').value.trim() == "") {
    document.getElementById('QtdSaca').value = '0';
    var QtdSaca = '0';
  } else {
    var QtdSaca = document.getElementById('QtdSaca').value;
  }

  if (document.getElementById('QtdKgSaca').value.trim() == "") {
    document.getElementById('QtdKgSaca').value = '0';
    var QtdKgSaca = '0';
  } else {
    var QtdKgSaca = document.getElementById('QtdKgSaca').value;
  }

  if (document.getElementById('QtdTonX').value.trim() == "") {
    document.getElementById('QtdTonX').value = '0';
    document.getElementById('QtdTon').value = '0';
    var QtdTonX = '0';
  } else {
    var QtdTonX = document.getElementById('QtdTonX').value;
  }

  if (document.getElementById('VrKg').value.trim() == "") {
    document.getElementById('VrKg').value = '0';
    var VrKg = '0';
  } else {
    var VrKgX = document.getElementById('VrKg').value.replace('.','');
    var VrKg = VrKgX.replace(',','.');
  }

  if (PorTon=="1") {
    document.getElementById('QtdTon').value = document.getElementById('QtdTonX').value.toString().replace(",", ".");
    QtdTon = document.getElementById('QtdTon').value;

    document.getElementById('QtdKgX').value = (parseFloat(QtdTon) * 1000).toLocaleString('pt-br', {minimumFractionDigits: 3});
    document.getElementById('QtdKg').value = (parseFloat(QtdTon) * 1000).toFixed(3);
    document.getElementById('QtdSaca').value = '0';

    document.getElementById('PrecoX').value = (parseFloat(QtdTon) * parseFloat(VrKg)).toLocaleString('pt-br', {minimumFractionDigits: 2});
    document.getElementById('Preco').value = (parseFloat(QtdTon) * parseFloat(VrKg)).toFixed(2);
  }else{
    document.getElementById('QtdKgX').value = (parseFloat(QtdSaca) * parseFloat(QtdKgSaca)).toLocaleString('pt-br', {minimumFractionDigits: 3});
    document.getElementById('QtdKg').value = (parseFloat(QtdSaca) * parseFloat(QtdKgSaca)).toFixed(3);

    document.getElementById('QtdTonX').value = (document.getElementById('QtdKg').value / 1000).toLocaleString('pt-br', {minimumFractionDigits: 3});
    document.getElementById('QtdTon').value = (document.getElementById('QtdKg').value / 1000).toFixed(3);

    document.getElementById('PrecoX').value = (parseFloat(QtdSaca) * parseFloat(VrKg)).toLocaleString('pt-br', {minimumFractionDigits: 2});
    document.getElementById('Preco').value = (parseFloat(QtdSaca) * parseFloat(VrKg)).toFixed(2);
  }
};




function calcPgto() {
  if (document.getElementById('VrCon').value.trim() == "") {
    document.getElementById('VrCon').value = '0';
    var VrCon = '0';
  } else {
    var VrConX = document.getElementById('VrCon').value.replace('.','');
    var VrCon = VrConX.replace(',','.');
  }

  if (document.getElementById('VrAcresCon').value.trim() == "") {
    document.getElementById('VrAcresCon').value = '0';
    var VrAcresCon = '0';
  } else {
    var VrAcresConX = document.getElementById('VrAcresCon').value.replace('.','');
    var VrAcresCon = VrAcresConX.replace(',','.');
  }

  if (document.getElementById('VrDescCon').value.trim() == "") {
    document.getElementById('VrDescCon').value = '0';
    var VrDescCon = '0';
  } else {
    var VrDescConX = document.getElementById('VrDescCon').value.replace('.','');
    var VrDescCon = VrDescConX.replace(',','.');
  }

  var VrTotalCon1 = parseFloat(VrCon) + parseFloat(VrAcresCon);
  var VrTotalCon = parseFloat(VrTotalCon1) - parseFloat(VrDescCon);

  document.getElementById('VrTotalConX').value =  VrTotalCon.toLocaleString('pt-br', {minimumFractionDigits: 2});
  document.getElementById('VrTotalCon').value = parseFloat(VrTotalCon).toFixed(2);
 };


