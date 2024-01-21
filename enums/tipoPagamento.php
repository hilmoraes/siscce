<?php

	class tipoPagamento {
	    const DEVSAL = 'Devolução de Saldo Remanecente';
	    const INVOICE = 'INVOICE Documento Fiscal de Importação';
	    const OBT = 'OBT para convenente';
	    const PAGFOR = 'Pagamento a Fornecedor';

	    // Método estático para obter todos os dias como um array
	    public static function getTipoPagamentoArray() {
	        return [
	            self::DEVSAL,
	            self::INVOICE,
	            self::OBT,
	            self::PAGFOR,
	        ];
	    }
	}

?>
