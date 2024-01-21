  function validarCNPJ_CPF(campo) {
   
    cnpj = campo.replace(/[^\d]+/g,'');
    let _valor = cnpj;
    if (_valor.length >= 12) {
        const _digitos = cnpj.replace(/\D/g, '');
        let _contador = 0;
        let _digitosIguais = true;
      
        if (_digitos.length === 0) {
          console.log("CNPJ vazio");
          alert("CNPJ vazio");
          document.getElementById('inscricao').value='';
          return false;
        }
      
        if (_digitos.length < 14) {
          console.log("CNPJ incompleto");
          alert("CNPJ incompleto");
          document.getElementById('inscricao').value='';
          return false;
        }
      
        while (_contador < _digitos.length - 1 && _digitosIguais) {
          _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
          _contador++;
        }
      
        if (_digitosIguais) {
          console.log("CNPJ não pode ser composto apenas por números iguais");
          alert("CNPJ não pode ser composto apenas por números iguais");
          document.getElementById('inscricao').value='';
          return false;
        }
      
        if (!verificacaoParteCNPJ(_digitos, 1)) {
          console.log("CNPJ inválido");
          alert("CNPJ inválido");
          document.getElementById('inscricao').value='';
          return false;
        }
      
        if (!verificacaoParteCNPJ(_digitos, 2)) {
          console.log("CNPJ inválido");
          alert("CNPJ inválido");
          document.getElementById('inscricao').value='';
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
          document.getElementById('inscricao').value='';
          return false;
        }
      
        if (_digitos.length < 11) {
          console.log("CPF incompleto");
          alert("CPF incompleto");
          document.getElementById('inscricao').value='';
          document.getElementById('inscricao').value='';
          return false;
        }
      
        while (_contador < _digitos.length - 1 && _digitosIguais) {
          _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
          _contador++;
        }
      
        if (_digitosIguais) {
          console.log("CPF não pode ser composto apenas por números iguais");
          alert("CPF não pode ser composto apenas por números iguais");
          document.getElementById('inscricao').value='';
          return false;
        }
      
        if (verificacaoParteCPF(_digitos, 1) != _digitos[_digitos.length - 2]) {
          console.log("CPF inválido");
          alert("CPF inválido");
          document.getElementById('inscricao').value='';
          return false;
        }
      
        if (verificacaoParteCPF(_digitos, 2) != _digitos[_digitos.length - 1]) {
          console.log("CPF inválido");
          alert("CPF inválido");
          document.getElementById('inscricao').value='';
          return false;
        }
      
        return true;
    }
      
  }



  const verificacaoParteCPF = (digitos, numEtapa) => {
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

const validaCPF = (campo) => {
  const _digitos = campo.value.replace(/\D/g, '');
  let _contador = 0;
  let _digitosIguais = true;

  if (_digitos.length === 0) {
    console.log("CPF vazio");
    alert("CPF vazio");
    document.getElementById('inscricao').value='';
    return false;
  }

  if (_digitos.length < 11) {
    console.log("CPF incompleto");
    alert("CPF incompleto");
    document.getElementById('inscricao').value='';
    return false;
  }

  while (_contador < _digitos.length - 1 && _digitosIguais) {
    _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
    _contador++;
  }

  if (_digitosIguais) {
    console.log("CPF não pode ser composto apenas por números iguais");
    alert("CPF não pode ser composto apenas por números iguais");
    document.getElementById('inscricao').value='';
    return false;
  }

  if (verificacaoParteCPF(_digitos, 1) != _digitos[_digitos.length - 2]) {
    console.log("CPF inválido");
    alert("CPF inválido");
    document.getElementById('inscricao').value='';
    return false;
  }

  if (verificacaoParteCPF(_digitos, 2) != _digitos[_digitos.length - 1]) {
    console.log("CPF inválido");
    alert("CPF inválido");
    document.getElementById('inscricao').value='';
    return false;
  }

  return true;
}

const verificacaoParteCNPJ = (digitos, numEtapa) => {
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

const validaCNPJ = campo => {
  const _digitos = campo.value.replace(/\D/g, '');
  let _contador = 0;
  let _digitosIguais = true;

  if (_digitos.length === 0) {
    console.log("CNPJ vazio");
    alert("CNPJ vazio");
    document.getElementById('inscricao').value='';
    return false;
  }

  if (_digitos.length < 14) {
    console.log("CNPJ incompleto");
    alert("CNPJ incompleto");
    document.getElementById('inscricao').value='';
    return false;
  }

  while (_contador < _digitos.length - 1 && _digitosIguais) {
    _digitosIguais = _digitos[_contador] === _digitos[_contador + 1];
    _contador++;
  }

  if (_digitosIguais) {
    console.log("CNPJ não pode ser composto apenas por números iguais");
    alert("CNPJ não pode ser composto apenas por números iguais");
    document.getElementById('inscricao').value='';
    return false;
  }

  if (!verificacaoParteCNPJ(_digitos, 1)) {
    console.log("CNPJ inválido");
    alert("CNPJ inválido");
    document.getElementById('inscricao').value='';
    return false;
  }

  if (!verificacaoParteCNPJ(_digitos, 2)) {
    console.log("CNPJ inválido");
    alert("CNPJ inválido");
    document.getElementById('inscricao').value='';
    return false;
  }

  console.log("CNPJ Válido");
  return true;
}