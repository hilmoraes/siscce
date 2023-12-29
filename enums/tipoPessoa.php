<?php

	class tipoPessoa {
	    const FISICA = 'FISICA';
	    const JURIDICA = 'JURIDICA';

	    // Método estático para obter todos os dias como um array
	    public static function getTipoPessoaArray() {
	        return [
	            self::FISICA,
	            self::JURIDICA,
	        ];
	    }
	}

?>