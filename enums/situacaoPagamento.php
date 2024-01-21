<?php

	class situacaoPagamento {
	    const Cancelada = 'Cancelada';
	    const Efetivada = 'Efetivada';
	    const EfetivadaRes = 'Efetivada e Restituida';
	    const NaoAut = 'Não Autorizada';
	    const NaoEfe = 'Não Efetivada';
	    const PendenteAut = 'Pendente de Autorização';
	    const PendenteDoc = 'Pendente de Documentoção de Liquidação';
	    const Transmitida = 'Transmitida';

	    // Método estático para obter todos os dias como um array
	    public static function getSituacaoPagamentoArray() {
	        return [
	            self::Cancelada,
	            self::Efetivada,
	            self::EfetivadaRes,
	            self::NaoAut,
	            self::NaoEfe,
	            self::PendenteAut,
	            self::PendenteDoc,
	            self::Transmitida,
	        ];
	    }
	}

?>
