function calcConv() {
  if (document.getElementById('VrRepasseConv').value.trim() == "") {
    document.getElementById('VrRepasseConv').value = '0';
    var VrRepasseConv = '0';
  } else {
    var VrRepasseConvX = document.getElementById('VrRepasseConv').value.replace('.','');
    var VrRepasseConv = VrRepasseConvX.replace(',','.');
  }

  if (document.getElementById('VrCpConv').value.trim() == "") {
    document.getElementById('VrCpConv').value = '0';
    var VrCpConv = '0';
  } else {
    var VrCpConvX = document.getElementById('VrCpConv').value.replace('.','');
    var VrCpConv = VrCpConvX.replace(',','.');
  }

  if (document.getElementById('VrRepasseAConv').value.trim() == "") {
    document.getElementById('VrRepasseAConv').value = '0';
    var VrRepasseAConv = '0';
  } else {
    var VrRepasseAConvX = document.getElementById('VrRepasseAConv').value.replace('.','');
    var VrRepasseAConv = VrRepasseAConvX.replace(',','.');
  }

  if (document.getElementById('VrCpAConv').value.trim() == "") {
    document.getElementById('VrCpAConv').value = '0';
    var VrCpAConv = '0';
  } else {
    var VrCpAConvX = document.getElementById('VrCpAConv').value.replace('.','');
    var VrCpAConv = VrCpAConvX.replace(',','.');
  }

  document.getElementById('VrTotalConvX').value = (parseFloat(VrRepasseConv) + parseFloat(VrCpConv) + parseFloat(VrRepasseAConv) + parseFloat(VrCpAConv)).toLocaleString('pt-br', {minimumFractionDigits: 2});
  document.getElementById('VrTotalConv').value = (parseFloat(VrRepasseConv) + parseFloat(VrCpConv) + parseFloat(VrRepasseAConv) + parseFloat(VrCpAConv)).toFixed(2);
};


function calcPag() {
  if (document.getElementById('VrRepassePag').value.trim() == "") {
    document.getElementById('VrRepassePag').value = '0';
    var VrRepassePag = '0';
  } else {
    var VrRepassePagX = document.getElementById('VrRepassePag').value.replace('.','');
    var VrRepassePag = VrRepassePagX.replace(',','.');
  }

  if (document.getElementById('VrCpPag').value.trim() == "") {
    document.getElementById('VrCpPag').value = '0';
    var VrCpPag = '0';
  } else {
    var VrCpPagX = document.getElementById('VrCpPag').value.replace('.','');
    var VrCpPag = VrCpPagX.replace(',','.');
  }

  document.getElementById('VrTotalPagX').value = (parseFloat(VrRepassePag) + parseFloat(VrCpPag)).toLocaleString('pt-br', {minimumFractionDigits: 2});
  document.getElementById('VrTotalPag').value = (parseFloat(VrRepassePag) + parseFloat(VrCpPag)).toFixed(2);
};


function calcDes() {
  if (document.getElementById('VrRepasseDes').value.trim() == "") {
    document.getElementById('VrRepasseDes').value = '0';
    var VrRepasseDes = '0';
  } else {
    var VrRepasseDesX = document.getElementById('VrRepasseDes').value.replace('.','');
    var VrRepasseDes = VrRepasseDesX.replace(',','.');
  }

  if (document.getElementById('VrCpDes').value.trim() == "") {
    document.getElementById('VrCpDes').value = '0';
    var VrCpDes = '0';
  } else {
    var VrCpDesX = document.getElementById('VrCpDes').value.replace('.','');
    var VrCpDes = VrCpDesX.replace(',','.');
  }

  document.getElementById('VrTotalDesX').value = (parseFloat(VrRepasseDes) + parseFloat(VrCpDes)).toLocaleString('pt-br', {minimumFractionDigits: 2});
  document.getElementById('VrTotalDes').value = (parseFloat(VrRepasseDes) + parseFloat(VrCpDes)).toFixed(2);
};