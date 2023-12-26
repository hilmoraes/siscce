// Conjuge - Início 

  function validarCNPJ_CPF_CONJUGE(campo) {
   
    cnpj = campo.replace(/[^\d]+/g,'');
    let _valor = cnpj;
    if (_valor.length >= 12) {
        const _digitos = cnpj.replace(/\D/g, '');
        let _contador = 0;
        let _digitosIguais = true;
      
        if (_digitos.length === 0) {
          console.log("CNPJ vazio");
          alert("CNPJ vazio");
          document.getElementById('CpfEsposaMot').value='';
          return false;
        }
      
        if (_digitos.length < 14) {
          console.log("CNPJ incompleto");
          alert("CNPJ incompleto");
          document.getElementById('CpfEsposaMot').value='';
          return false;
        }
      
        while (_contador < _digitos.length - 1 && _digitosIguais) {
          _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
          _contador++;
        }
      
        if (_digitosIguais) {
          console.log("CNPJ não pode ser composto apenas por números iguais");
          alert("CNPJ não pode ser composto apenas por números iguais");
          document.getElementById('CpfEsposaMot').value='';
          return false;
        }
      
        if (!verificacaoParteCNPJconjuge(_digitos, 1)) {
          console.log("CNPJ inválido");
          alert("CNPJ inválido");
          document.getElementById('CpfEsposaMot').value='';
          return false;
        }
      
        if (!verificacaoParteCNPJconjuge(_digitos, 2)) {
          console.log("CNPJ inválido");
          alert("CNPJ inválido");
          document.getElementById('CpfEsposaMot').value='';
          return false;
        }
      
        console.log("CNPJ Válido");
        return true;
    } else {
      const _digitos = _valor.replace(/\D/g, '');
        let _contador = 0;
        let _digitosIguais = true;
      
        if (_digitos.length === 0) {
          console.log("CPF vazio");
          alert("CPF vazio");
          document.getElementById('CpfEsposaMot').value='';
          return false;
        }
      
        if (_digitos.length < 11) {
          console.log("CPF incompleto");
          alert("CPF incompleto");
          document.getElementById('CpfEsposaMot').value='';
          document.getElementById('CpfEsposaMot').value='';
          return false;
        }
      
        while (_contador < _digitos.length - 1 && _digitosIguais) {
          _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
          _contador++;
        }
      
        if (_digitosIguais) {
          console.log("CPF não pode ser composto apenas por números iguais");
          alert("CPF não pode ser composto apenas por números iguais");
          document.getElementById('CpfEsposaMot').value='';
          return false;
        }
      
        if (verificacaoParteCPF_conjuge(_digitos, 1) != _digitos[_digitos.length - 2]) {
          console.log("CPF inválido");
          alert("CPF inválido");
          document.getElementById('CpfEsposaMot').value='';
          return false;
        }
      
        if (verificacaoParteCPF_conjuge(_digitos, 2) != _digitos[_digitos.length - 1]) {
          console.log("CPF inválido");
          alert("CPF inválido");
          document.getElementById('CpfEsposaMot').value='';
          return false;
        }
      
        return true;
    }
      
  }



  const verificacaoParteCPF_conjuge = (digitos, numEtapa) => {
  numEtapa = numEtapa ? numEtapa : 1;
  let _totalNumeros = 8 + numEtapa
  const _valorInicialMultiplicador = _totalNumeros + 1;
  let _somaValidacao = 0;
  let digitoVerificador;

  for (let i = 0; i < _totalNumeros; i++) {
    const _numero = parseInt(digitos[i]);
    const _multiplicador = _valorInicialMultiplicador - i;

    _somaValidacao += _numero * _multiplicador;
  }

  digitoVerificador = (_somaValidacao * 10) % 11;

  if (digitoVerificador === 10) {
    digitoVerificador = 0;
  }

  return digitoVerificador;
}

const validaCPFconjuge = (campo) => {
  const _digitos = campo.value.replace(/\D/g, '');
  let _contador = 0;
  let _digitosIguais = true;

  if (_digitos.length === 0) {
    console.log("CPF vazio");
    alert("CPF vazio");
    document.getElementById('CpfEsposaMot').value='';
    return false;
  }

  if (_digitos.length < 11) {
    console.log("CPF incompleto");
    alert("CPF incompleto");
    document.getElementById('CpfEsposaMot').value='';
    return false;
  }

  while (_contador < _digitos.length - 1 && _digitosIguais) {
    _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
    _contador++;
  }

  if (_digitosIguais) {
    console.log("CPF não pode ser composto apenas por números iguais");
    alert("CPF não pode ser composto apenas por números iguais");
    document.getElementById('CpfEsposaMot').value='';
    return false;
  }

  if (verificacaoParteCPF_conjuge(_digitos, 1) != _digitos[_digitos.length - 2]) {
    console.log("CPF inválido");
    alert("CPF inválido");
    document.getElementById('CpfEsposaMot').value='';
    return false;
  }

  if (verificacaoParteCPF_conjuge(_digitos, 2) != _digitos[_digitos.length - 1]) {
    console.log("CPF inválido");
    alert("CPF inválido");
    document.getElementById('CpfEsposaMot').value='';
    return false;
  }

  return true;
}

const verificacaoParteCNPJconjuge = (digitos, numEtapa) => {
  const _algarismos = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
  numEtapa = typeof numEtapa !== "undefined" ? parseInt(numEtapa) : 1;
  const _indiceInicial = 2 - numEtapa;
  let _soma = 0;
  let _digitoVerificador = 0;
  let _indiceDigito = 0;

  for (let i = _indiceInicial; i < _algarismos.length; i++) {
    _soma += parseInt(digitos[_indiceDigito]) * _algarismos[i];

    _indiceDigito++;
  }

  _digitoVerificador = _soma % 11;

  _digitoVerificador = _digitoVerificador < 2 ? 0 : 11 - _digitoVerificador;

  // console.log(digitos, digitos[digitos.length - (3-numEtapa)], _digitoVerificador);

  return parseInt(digitos[digitos.length - (3 - numEtapa)]) === _digitoVerificador;
}

const validaCNPJconjuge = campo => {
  const _digitos = campo.value.replace(/\D/g, '');
  let _contador = 0;
  let _digitosIguais = true;

  if (_digitos.length === 0) {
    console.log("CNPJ vazio");
    alert("CNPJ vazio");
    document.getElementById('CpfEsposaMot').value='';
    return false;
  }

  if (_digitos.length < 14) {
    console.log("CNPJ incompleto");
    alert("CNPJ incompleto");
    document.getElementById('CpfEsposaMot').value='';
    return false;
  }

  while (_contador < _digitos.length - 1 && _digitosIguais) {
    _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
    _contador++;
  }

  if (_digitosIguais) {
    console.log("CNPJ não pode ser composto apenas por números iguais");
    alert("CNPJ não pode ser composto apenas por números iguais");
    document.getElementById('CpfEsposaMot').value='';
    return false;
  }

  if (!verificacaoParteCNPJconjuge(_digitos, 1)) {
    console.log("CNPJ inválido");
    alert("CNPJ inválido");
    document.getElementById('CpfEsposaMot').value='';
    return false;
  }

  if (!verificacaoParteCNPJconjuge(_digitos, 2)) {
    console.log("CNPJ inválido");
    alert("CNPJ inválido");
    document.getElementById('CpfEsposaMot').value='';
    return false;
  }

  console.log("CNPJ Válido");
  return true;
}

//Conjuge - Fim


//Cavalo - Início
  
  function validarCNPJ_CPF_CAVALO(campo) {
   
    cnpj = campo.replace(/[^\d]+/g,'');
    let _valor = cnpj;
    if (_valor.length >= 12) {
        const _digitos = cnpj.replace(/\D/g, '');
        let _contador = 0;
        let _digitosIguais = true;
      
        if (_digitos.length === 0) {
          console.log("CNPJ vazio");
          alert("CNPJ vazio");
          document.getElementById('CpfPropCav').value='';
          return false;
        }
      
        if (_digitos.length < 14) {
          console.log("CNPJ incompleto");
          alert("CNPJ incompleto");
          document.getElementById('CpfPropCav').value='';
          return false;
        }
      
        while (_contador < _digitos.length - 1 && _digitosIguais) {
          _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
          _contador++;
        }
      
        if (_digitosIguais) {
          console.log("CNPJ não pode ser composto apenas por números iguais");
          alert("CNPJ não pode ser composto apenas por números iguais");
          document.getElementById('CpfPropCav').value='';
          return false;
        }
      
        if (!verificacaoParteCNPJcavalo(_digitos, 1)) {
          console.log("CNPJ inválido");
          alert("CNPJ inválido");
          document.getElementById('CpfPropCav').value='';
          return false;
        }
      
        if (!verificacaoParteCNPJcavalo(_digitos, 2)) {
          console.log("CNPJ inválido");
          alert("CNPJ inválido");
          document.getElementById('CpfPropCav').value='';
          return false;
        }
      
        console.log("CNPJ Válido");
        return true;
    } else {
      const _digitos = _valor.replace(/\D/g, '');
        let _contador = 0;
        let _digitosIguais = true;
      
        if (_digitos.length === 0) {
          console.log("CPF vazio");
          alert("CPF vazio");
          document.getElementById('CpfPropCav').value='';
          return false;
        }
      
        if (_digitos.length < 11) {
          console.log("CPF incompleto");
          alert("CPF incompleto");
          document.getElementById('CpfPropCav').value='';
          document.getElementById('CpfPropCav').value='';
          return false;
        }
      
        while (_contador < _digitos.length - 1 && _digitosIguais) {
          _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
          _contador++;
        }
      
        if (_digitosIguais) {
          console.log("CPF não pode ser composto apenas por números iguais");
          alert("CPF não pode ser composto apenas por números iguais");
          document.getElementById('CpfPropCav').value='';
          return false;
        }
      
        if (verificacaoParteCPF_cavalo(_digitos, 1) != _digitos[_digitos.length - 2]) {
          console.log("CPF inválido");
          alert("CPF inválido");
          document.getElementById('CpfPropCav').value='';
          return false;
        }
      
        if (verificacaoParteCPF_cavalo(_digitos, 2) != _digitos[_digitos.length - 1]) {
          console.log("CPF inválido");
          alert("CPF inválido");
          document.getElementById('CpfPropCav').value='';
          return false;
        }
      
        return true;
    }
      
  }



  const verificacaoParteCPF_cavalo = (digitos, numEtapa) => {
  numEtapa = numEtapa ? numEtapa : 1;
  let _totalNumeros = 8 + numEtapa
  const _valorInicialMultiplicador = _totalNumeros + 1;
  let _somaValidacao = 0;
  let digitoVerificador;

  for (let i = 0; i < _totalNumeros; i++) {
    const _numero = parseInt(digitos[i]);
    const _multiplicador = _valorInicialMultiplicador - i;

    _somaValidacao += _numero * _multiplicador;
  }

  digitoVerificador = (_somaValidacao * 10) % 11;

  if (digitoVerificador === 10) {
    digitoVerificador = 0;
  }

  return digitoVerificador;
}

const validaCPFcavalo = (campo) => {
  const _digitos = campo.value.replace(/\D/g, '');
  let _contador = 0;
  let _digitosIguais = true;

  if (_digitos.length === 0) {
    console.log("CPF vazio");
    alert("CPF vazio");
    document.getElementById('CpfPropCav').value='';
    return false;
  }

  if (_digitos.length < 11) {
    console.log("CPF incompleto");
    alert("CPF incompleto");
    document.getElementById('CpfPropCav').value='';
    return false;
  }

  while (_contador < _digitos.length - 1 && _digitosIguais) {
    _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
    _contador++;
  }

  if (_digitosIguais) {
    console.log("CPF não pode ser composto apenas por números iguais");
    alert("CPF não pode ser composto apenas por números iguais");
    document.getElementById('CpfPropCav').value='';
    return false;
  }

  if (verificacaoParteCPF_cavalo(_digitos, 1) != _digitos[_digitos.length - 2]) {
    console.log("CPF inválido");
    alert("CPF inválido");
    document.getElementById('CpfPropCav').value='';
    return false;
  }

  if (verificacaoParteCPF_cavalo(_digitos, 2) != _digitos[_digitos.length - 1]) {
    console.log("CPF inválido");
    alert("CPF inválido");
    document.getElementById('CpfPropCav').value='';
    return false;
  }

  return true;
}

const verificacaoParteCNPJcavalo = (digitos, numEtapa) => {
  const _algarismos = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
  numEtapa = typeof numEtapa !== "undefined" ? parseInt(numEtapa) : 1;
  const _indiceInicial = 2 - numEtapa;
  let _soma = 0;
  let _digitoVerificador = 0;
  let _indiceDigito = 0;

  for (let i = _indiceInicial; i < _algarismos.length; i++) {
    _soma += parseInt(digitos[_indiceDigito]) * _algarismos[i];

    _indiceDigito++;
  }

  _digitoVerificador = _soma % 11;

  _digitoVerificador = _digitoVerificador < 2 ? 0 : 11 - _digitoVerificador;

  // console.log(digitos, digitos[digitos.length - (3-numEtapa)], _digitoVerificador);

  return parseInt(digitos[digitos.length - (3 - numEtapa)]) === _digitoVerificador;
}

const validaCNPJcavalo = campo => {
  const _digitos = campo.value.replace(/\D/g, '');
  let _contador = 0;
  let _digitosIguais = true;

  if (_digitos.length === 0) {
    console.log("CNPJ vazio");
    alert("CNPJ vazio");
    document.getElementById('CpfPropCav').value='';
    return false;
  }

  if (_digitos.length < 14) {
    console.log("CNPJ incompleto");
    alert("CNPJ incompleto");
    document.getElementById('CpfPropCav').value='';
    return false;
  }

  while (_contador < _digitos.length - 1 && _digitosIguais) {
    _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
    _contador++;
  }

  if (_digitosIguais) {
    console.log("CNPJ não pode ser composto apenas por números iguais");
    alert("CNPJ não pode ser composto apenas por números iguais");
    document.getElementById('CpfPropCav').value='';
    return false;
  }

  if (!verificacaoParteCNPJcavalo(_digitos, 1)) {
    console.log("CNPJ inválido");
    alert("CNPJ inválido");
    document.getElementById('CpfPropCav').value='';
    return false;
  }

  if (!verificacaoParteCNPJcavalo(_digitos, 2)) {
    console.log("CNPJ inválido");
    alert("CNPJ inválido");
    document.getElementById('CpfPropCav').value='';
    return false;
  }

  console.log("CNPJ Válido");
  return true;
}

//Cavalo - Fim


  //carreta1 - Início
  
  function validarCNPJ_CPF_CARRETA1(campo) {
   
    cnpj = campo.replace(/[^\d]+/g,'');
    let _valor = cnpj;
    if (_valor.length >= 12) {
        const _digitos = cnpj.replace(/\D/g, '');
        let _contador = 0;
        let _digitosIguais = true;
      
        if (_digitos.length === 0) {
          console.log("CNPJ vazio");
          alert("CNPJ vazio");
          document.getElementById('CpfPropCarr').value='';
          return false;
        }
      
        if (_digitos.length < 14) {
          console.log("CNPJ incompleto");
          alert("CNPJ incompleto");
          document.getElementById('CpfPropCarr').value='';
          return false;
        }
      
        while (_contador < _digitos.length - 1 && _digitosIguais) {
          _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
          _contador++;
        }
      
        if (_digitosIguais) {
          console.log("CNPJ não pode ser composto apenas por números iguais");
          alert("CNPJ não pode ser composto apenas por números iguais");
          document.getElementById('CpfPropCarr').value='';
          return false;
        }
      
        if (!verificacaoParteCNPJcarreta1(_digitos, 1)) {
          console.log("CNPJ inválido");
          alert("CNPJ inválido");
          document.getElementById('CpfPropCarr').value='';
          return false;
        }
      
        if (!verificacaoParteCNPJcarreta1(_digitos, 2)) {
          console.log("CNPJ inválido");
          alert("CNPJ inválido");
          document.getElementById('CpfPropCarr').value='';
          return false;
        }
      
        console.log("CNPJ Válido");
        return true;
    } else {
      const _digitos = _valor.replace(/\D/g, '');
        let _contador = 0;
        let _digitosIguais = true;
      
        if (_digitos.length === 0) {
          console.log("CPF vazio");
          alert("CPF vazio");
          document.getElementById('CpfPropCarr').value='';
          return false;
        }
      
        if (_digitos.length < 11) {
          console.log("CPF incompleto");
          alert("CPF incompleto");
          document.getElementById('CpfPropCarr').value='';
          document.getElementById('CpfPropCarr').value='';
          return false;
        }
      
        while (_contador < _digitos.length - 1 && _digitosIguais) {
          _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
          _contador++;
        }
      
        if (_digitosIguais) {
          console.log("CPF não pode ser composto apenas por números iguais");
          alert("CPF não pode ser composto apenas por números iguais");
          document.getElementById('CpfPropCarr').value='';
          return false;
        }
      
        if (verificacaoParteCPF_carreta1(_digitos, 1) != _digitos[_digitos.length - 2]) {
          console.log("CPF inválido");
          alert("CPF inválido");
          document.getElementById('CpfPropCarr').value='';
          return false;
        }
      
        if (verificacaoParteCPF_carreta1(_digitos, 2) != _digitos[_digitos.length - 1]) {
          console.log("CPF inválido");
          alert("CPF inválido");
          document.getElementById('CpfPropCarr').value='';
          return false;
        }
      
        return true;
    }
      
  }



  const verificacaoParteCPF_carreta1 = (digitos, numEtapa) => {
  numEtapa = numEtapa ? numEtapa : 1;
  let _totalNumeros = 8 + numEtapa
  const _valorInicialMultiplicador = _totalNumeros + 1;
  let _somaValidacao = 0;
  let digitoVerificador;

  for (let i = 0; i < _totalNumeros; i++) {
    const _numero = parseInt(digitos[i]);
    const _multiplicador = _valorInicialMultiplicador - i;

    _somaValidacao += _numero * _multiplicador;
  }

  digitoVerificador = (_somaValidacao * 10) % 11;

  if (digitoVerificador === 10) {
    digitoVerificador = 0;
  }

  return digitoVerificador;
}

const validaCPFcarreta1 = (campo) => {
  const _digitos = campo.value.replace(/\D/g, '');
  let _contador = 0;
  let _digitosIguais = true;

  if (_digitos.length === 0) {
    console.log("CPF vazio");
    alert("CPF vazio");
    document.getElementById('CpfPropCarr').value='';
    return false;
  }

  if (_digitos.length < 11) {
    console.log("CPF incompleto");
    alert("CPF incompleto");
    document.getElementById('CpfPropCarr').value='';
    return false;
  }

  while (_contador < _digitos.length - 1 && _digitosIguais) {
    _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
    _contador++;
  }

  if (_digitosIguais) {
    console.log("CPF não pode ser composto apenas por números iguais");
    alert("CPF não pode ser composto apenas por números iguais");
    document.getElementById('CpfPropCarr').value='';
    return false;
  }

  if (verificacaoParteCPF_carreta1(_digitos, 1) != _digitos[_digitos.length - 2]) {
    console.log("CPF inválido");
    alert("CPF inválido");
    document.getElementById('CpfPropCarr').value='';
    return false;
  }

  if (verificacaoParteCPF_carreta1(_digitos, 2) != _digitos[_digitos.length - 1]) {
    console.log("CPF inválido");
    alert("CPF inválido");
    document.getElementById('CpfPropCarr').value='';
    return false;
  }

  return true;
}

const verificacaoParteCNPJcarreta1 = (digitos, numEtapa) => {
  const _algarismos = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
  numEtapa = typeof numEtapa !== "undefined" ? parseInt(numEtapa) : 1;
  const _indiceInicial = 2 - numEtapa;
  let _soma = 0;
  let _digitoVerificador = 0;
  let _indiceDigito = 0;

  for (let i = _indiceInicial; i < _algarismos.length; i++) {
    _soma += parseInt(digitos[_indiceDigito]) * _algarismos[i];

    _indiceDigito++;
  }

  _digitoVerificador = _soma % 11;

  _digitoVerificador = _digitoVerificador < 2 ? 0 : 11 - _digitoVerificador;

  // console.log(digitos, digitos[digitos.length - (3-numEtapa)], _digitoVerificador);

  return parseInt(digitos[digitos.length - (3 - numEtapa)]) === _digitoVerificador;
}

const validaCNPJcarreta1 = campo => {
  const _digitos = campo.value.replace(/\D/g, '');
  let _contador = 0;
  let _digitosIguais = true;

  if (_digitos.length === 0) {
    console.log("CNPJ vazio");
    alert("CNPJ vazio");
    document.getElementById('CpfPropCarr').value='';
    return false;
  }

  if (_digitos.length < 14) {
    console.log("CNPJ incompleto");
    alert("CNPJ incompleto");
    document.getElementById('CpfPropCarr').value='';
    return false;
  }

  while (_contador < _digitos.length - 1 && _digitosIguais) {
    _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
    _contador++;
  }

  if (_digitosIguais) {
    console.log("CNPJ não pode ser composto apenas por números iguais");
    alert("CNPJ não pode ser composto apenas por números iguais");
    document.getElementById('CpfPropCarr').value='';
    return false;
  }

  if (!verificacaoParteCNPJcarreta1(_digitos, 1)) {
    console.log("CNPJ inválido");
    alert("CNPJ inválido");
    document.getElementById('CpfPropCarr').value='';
    return false;
  }

  if (!verificacaoParteCNPJcarreta1(_digitos, 2)) {
    console.log("CNPJ inválido");
    alert("CNPJ inválido");
    document.getElementById('CpfPropCarr').value='';
    return false;
  }

  console.log("CNPJ Válido");
  return true;
}

//carreta1 - Fim


//carreta2 - Início
  
  function validarCNPJ_CPF_CARRETA2(campo) {
   
    cnpj = campo.replace(/[^\d]+/g,'');
    let _valor = cnpj;
    if (_valor.length >= 12) {
        const _digitos = cnpj.replace(/\D/g, '');
        let _contador = 0;
        let _digitosIguais = true;
      
        if (_digitos.length === 0) {
          console.log("CNPJ vazio");
          alert("CNPJ vazio");
          document.getElementById('CpfProp2Carr').value='';
          return false;
        }
      
        if (_digitos.length < 14) {
          console.log("CNPJ incompleto");
          alert("CNPJ incompleto");
          document.getElementById('CpfProp2Carr').value='';
          return false;
        }
      
        while (_contador < _digitos.length - 1 && _digitosIguais) {
          _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
          _contador++;
        }
      
        if (_digitosIguais) {
          console.log("CNPJ não pode ser composto apenas por números iguais");
          alert("CNPJ não pode ser composto apenas por números iguais");
          document.getElementById('CpfProp2Carr').value='';
          return false;
        }
      
        if (!verificacaoParteCNPJcarreta2(_digitos, 1)) {
          console.log("CNPJ inválido");
          alert("CNPJ inválido");
          document.getElementById('CpfProp2Carr').value='';
          return false;
        }
      
        if (!verificacaoParteCNPJcarreta2(_digitos, 2)) {
          console.log("CNPJ inválido");
          alert("CNPJ inválido");
          document.getElementById('CpfProp2Carr').value='';
          return false;
        }
      
        console.log("CNPJ Válido");
        return true;
    } else {
      const _digitos = _valor.replace(/\D/g, '');
        let _contador = 0;
        let _digitosIguais = true;
      
        if (_digitos.length === 0) {
          console.log("CPF vazio");
          alert("CPF vazio");
          document.getElementById('CpfProp2Carr').value='';
          return false;
        }
      
        if (_digitos.length < 11) {
          console.log("CPF incompleto");
          alert("CPF incompleto");
          document.getElementById('CpfProp2Carr').value='';
          document.getElementById('CpfProp2Carr').value='';
          return false;
        }
      
        while (_contador < _digitos.length - 1 && _digitosIguais) {
          _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
          _contador++;
        }
      
        if (_digitosIguais) {
          console.log("CPF não pode ser composto apenas por números iguais");
          alert("CPF não pode ser composto apenas por números iguais");
          document.getElementById('CpfProp2Carr').value='';
          return false;
        }
      
        if (verificacaoParteCPF_carreta2(_digitos, 1) != _digitos[_digitos.length - 2]) {
          console.log("CPF inválido");
          alert("CPF inválido");
          document.getElementById('CpfProp2Carr').value='';
          return false;
        }
      
        if (verificacaoParteCPF_carreta2(_digitos, 2) != _digitos[_digitos.length - 1]) {
          console.log("CPF inválido");
          alert("CPF inválido");
          document.getElementById('CpfProp2Carr').value='';
          return false;
        }
      
        return true;
    }
      
  }



  const verificacaoParteCPF_carreta2 = (digitos, numEtapa) => {
  numEtapa = numEtapa ? numEtapa : 1;
  let _totalNumeros = 8 + numEtapa
  const _valorInicialMultiplicador = _totalNumeros + 1;
  let _somaValidacao = 0;
  let digitoVerificador;

  for (let i = 0; i < _totalNumeros; i++) {
    const _numero = parseInt(digitos[i]);
    const _multiplicador = _valorInicialMultiplicador - i;

    _somaValidacao += _numero * _multiplicador;
  }

  digitoVerificador = (_somaValidacao * 10) % 11;

  if (digitoVerificador === 10) {
    digitoVerificador = 0;
  }

  return digitoVerificador;
}

const validaCPFcarreta2 = (campo) => {
  const _digitos = campo.value.replace(/\D/g, '');
  let _contador = 0;
  let _digitosIguais = true;

  if (_digitos.length === 0) {
    console.log("CPF vazio");
    alert("CPF vazio");
    document.getElementById('CpfProp2Carr').value='';
    return false;
  }

  if (_digitos.length < 11) {
    console.log("CPF incompleto");
    alert("CPF incompleto");
    document.getElementById('CpfProp2Carr').value='';
    return false;
  }

  while (_contador < _digitos.length - 1 && _digitosIguais) {
    _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
    _contador++;
  }

  if (_digitosIguais) {
    console.log("CPF não pode ser composto apenas por números iguais");
    alert("CPF não pode ser composto apenas por números iguais");
    document.getElementById('CpfProp2Carr').value='';
    return false;
  }

  if (verificacaoParteCPF_carreta2(_digitos, 1) != _digitos[_digitos.length - 2]) {
    console.log("CPF inválido");
    alert("CPF inválido");
    document.getElementById('CpfProp2Carr').value='';
    return false;
  }

  if (verificacaoParteCPF_carreta2(_digitos, 2) != _digitos[_digitos.length - 1]) {
    console.log("CPF inválido");
    alert("CPF inválido");
    document.getElementById('CpfProp2Carr').value='';
    return false;
  }

  return true;
}

const verificacaoParteCNPJcarreta2 = (digitos, numEtapa) => {
  const _algarismos = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
  numEtapa = typeof numEtapa !== "undefined" ? parseInt(numEtapa) : 1;
  const _indiceInicial = 2 - numEtapa;
  let _soma = 0;
  let _digitoVerificador = 0;
  let _indiceDigito = 0;

  for (let i = _indiceInicial; i < _algarismos.length; i++) {
    _soma += parseInt(digitos[_indiceDigito]) * _algarismos[i];

    _indiceDigito++;
  }

  _digitoVerificador = _soma % 11;

  _digitoVerificador = _digitoVerificador < 2 ? 0 : 11 - _digitoVerificador;

  // console.log(digitos, digitos[digitos.length - (3-numEtapa)], _digitoVerificador);

  return parseInt(digitos[digitos.length - (3 - numEtapa)]) === _digitoVerificador;
}

const validaCNPJcarreta2 = campo => {
  const _digitos = campo.value.replace(/\D/g, '');
  let _contador = 0;
  let _digitosIguais = true;

  if (_digitos.length === 0) {
    console.log("CNPJ vazio");
    alert("CNPJ vazio");
    document.getElementById('CpfProp2Carr').value='';
    return false;
  }

  if (_digitos.length < 14) {
    console.log("CNPJ incompleto");
    alert("CNPJ incompleto");
    document.getElementById('CpfProp2Carr').value='';
    return false;
  }

  while (_contador < _digitos.length - 1 && _digitosIguais) {
    _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
    _contador++;
  }

  if (_digitosIguais) {
    console.log("CNPJ não pode ser composto apenas por números iguais");
    alert("CNPJ não pode ser composto apenas por números iguais");
    document.getElementById('CpfProp2Carr').value='';
    return false;
  }

  if (!verificacaoParteCNPJcarreta2(_digitos, 1)) {
    console.log("CNPJ inválido");
    alert("CNPJ inválido");
    document.getElementById('CpfProp2Carr').value='';
    return false;
  }

  if (!verificacaoParteCNPJcarreta2(_digitos, 2)) {
    console.log("CNPJ inválido");
    alert("CNPJ inválido");
    document.getElementById('CpfProp2Carr').value='';
    return false;
  }

  console.log("CNPJ Válido");
  return true;
}

//carreta2 - Fim


//Dolly - Início
  
  function validarCNPJ_CPF_DOLLY(campo) {
   
    cnpj = campo.replace(/[^\d]+/g,'');
    let _valor = cnpj;
    if (_valor.length >= 12) {
        const _digitos = cnpj.replace(/\D/g, '');
        let _contador = 0;
        let _digitosIguais = true;
      
        if (_digitos.length === 0) {
          console.log("CNPJ vazio");
          alert("CNPJ vazio");
          document.getElementById('CpfProp3Carr').value='';
          return false;
        }
      
        if (_digitos.length < 14) {
          console.log("CNPJ incompleto");
          alert("CNPJ incompleto");
          document.getElementById('CpfProp3Carr').value='';
          return false;
        }
      
        while (_contador < _digitos.length - 1 && _digitosIguais) {
          _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
          _contador++;
        }
      
        if (_digitosIguais) {
          console.log("CNPJ não pode ser composto apenas por números iguais");
          alert("CNPJ não pode ser composto apenas por números iguais");
          document.getElementById('CpfProp3Carr').value='';
          return false;
        }
      
        if (!verificacaoParteCNPJdolly(_digitos, 1)) {
          console.log("CNPJ inválido");
          alert("CNPJ inválido");
          document.getElementById('CpfProp3Carr').value='';
          return false;
        }
      
        if (!verificacaoParteCNPJdolly(_digitos, 2)) {
          console.log("CNPJ inválido");
          alert("CNPJ inválido");
          document.getElementById('CpfProp3Carr').value='';
          return false;
        }
      
        console.log("CNPJ Válido");
        return true;
    } else {
      const _digitos = _valor.replace(/\D/g, '');
        let _contador = 0;
        let _digitosIguais = true;
      
        if (_digitos.length === 0) {
          console.log("CPF vazio");
          alert("CPF vazio");
          document.getElementById('CpfProp3Carr').value='';
          return false;
        }
      
        if (_digitos.length < 11) {
          console.log("CPF incompleto");
          alert("CPF incompleto");
          document.getElementById('CpfProp3Carr').value='';
          document.getElementById('CpfProp3Carr').value='';
          return false;
        }
      
        while (_contador < _digitos.length - 1 && _digitosIguais) {
          _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
          _contador++;
        }
      
        if (_digitosIguais) {
          console.log("CPF não pode ser composto apenas por números iguais");
          alert("CPF não pode ser composto apenas por números iguais");
          document.getElementById('CpfProp3Carr').value='';
          return false;
        }
      
        if (verificacaoParteCPF_dolly(_digitos, 1) != _digitos[_digitos.length - 2]) {
          console.log("CPF inválido");
          alert("CPF inválido");
          document.getElementById('CpfProp3Carr').value='';
          return false;
        }
      
        if (verificacaoParteCPF_dolly(_digitos, 2) != _digitos[_digitos.length - 1]) {
          console.log("CPF inválido");
          alert("CPF inválido");
          document.getElementById('CpfProp3Carr').value='';
          return false;
        }
      
        return true;
    }
      
  }



  const verificacaoParteCPF_dolly = (digitos, numEtapa) => {
  numEtapa = numEtapa ? numEtapa : 1;
  let _totalNumeros = 8 + numEtapa
  const _valorInicialMultiplicador = _totalNumeros + 1;
  let _somaValidacao = 0;
  let digitoVerificador;

  for (let i = 0; i < _totalNumeros; i++) {
    const _numero = parseInt(digitos[i]);
    const _multiplicador = _valorInicialMultiplicador - i;

    _somaValidacao += _numero * _multiplicador;
  }

  digitoVerificador = (_somaValidacao * 10) % 11;

  if (digitoVerificador === 10) {
    digitoVerificador = 0;
  }

  return digitoVerificador;
}

const validaCPFdolly = (campo) => {
  const _digitos = campo.value.replace(/\D/g, '');
  let _contador = 0;
  let _digitosIguais = true;

  if (_digitos.length === 0) {
    console.log("CPF vazio");
    alert("CPF vazio");
    document.getElementById('CpfProp3Carr').value='';
    return false;
  }

  if (_digitos.length < 11) {
    console.log("CPF incompleto");
    alert("CPF incompleto");
    document.getElementById('CpfProp3Carr').value='';
    return false;
  }

  while (_contador < _digitos.length - 1 && _digitosIguais) {
    _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
    _contador++;
  }

  if (_digitosIguais) {
    console.log("CPF não pode ser composto apenas por números iguais");
    alert("CPF não pode ser composto apenas por números iguais");
    document.getElementById('CpfProp3Carr').value='';
    return false;
  }

  if (verificacaoParteCPF_dolly(_digitos, 1) != _digitos[_digitos.length - 2]) {
    console.log("CPF inválido");
    alert("CPF inválido");
    document.getElementById('CpfProp3Carr').value='';
    return false;
  }

  if (verificacaoParteCPF_dolly(_digitos, 2) != _digitos[_digitos.length - 1]) {
    console.log("CPF inválido");
    alert("CPF inválido");
    document.getElementById('CpfProp3Carr').value='';
    return false;
  }

  return true;
}

const verificacaoParteCNPJdolly = (digitos, numEtapa) => {
  const _algarismos = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
  numEtapa = typeof numEtapa !== "undefined" ? parseInt(numEtapa) : 1;
  const _indiceInicial = 2 - numEtapa;
  let _soma = 0;
  let _digitoVerificador = 0;
  let _indiceDigito = 0;

  for (let i = _indiceInicial; i < _algarismos.length; i++) {
    _soma += parseInt(digitos[_indiceDigito]) * _algarismos[i];

    _indiceDigito++;
  }

  _digitoVerificador = _soma % 11;

  _digitoVerificador = _digitoVerificador < 2 ? 0 : 11 - _digitoVerificador;

  // console.log(digitos, digitos[digitos.length - (3-numEtapa)], _digitoVerificador);

  return parseInt(digitos[digitos.length - (3 - numEtapa)]) === _digitoVerificador;
}

const validaCNPJdolly = campo => {
  const _digitos = campo.value.replace(/\D/g, '');
  let _contador = 0;
  let _digitosIguais = true;

  if (_digitos.length === 0) {
    console.log("CNPJ vazio");
    alert("CNPJ vazio");
    document.getElementById('CpfProp3Carr').value='';
    return false;
  }

  if (_digitos.length < 14) {
    console.log("CNPJ incompleto");
    alert("CNPJ incompleto");
    document.getElementById('CpfProp3Carr').value='';
    return false;
  }

  while (_contador < _digitos.length - 1 && _digitosIguais) {
    _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
    _contador++;
  }

  if (_digitosIguais) {
    console.log("CNPJ não pode ser composto apenas por números iguais");
    alert("CNPJ não pode ser composto apenas por números iguais");
    document.getElementById('CpfProp3Carr').value='';
    return false;
  }

  if (!verificacaoParteCNPJdolly(_digitos, 1)) {
    console.log("CNPJ inválido");
    alert("CNPJ inválido");
    document.getElementById('CpfProp3Carr').value='';
    return false;
  }

  if (!verificacaoParteCNPJdolly(_digitos, 2)) {
    console.log("CNPJ inválido");
    alert("CNPJ inválido");
    document.getElementById('CpfProp3Carr').value='';
    return false;
  }

  console.log("CNPJ Válido");
  return true;
}

//Dolly - Fim