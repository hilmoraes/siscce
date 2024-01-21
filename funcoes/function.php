<?php
	session_start();
	require_once "config.php";
	include("funcoes.php");

	/**
	 * função que retorna o select
	 */
	function montaSelect()
	{
		$sql = "SELECT cmpCodCli, cmpNomCli FROM clientes ";
		$query = mysql_query( $sql );

		if( mysql_num_rows( $query ) > 0 )
		{
			while( $dados = mysql_fetch_assoc( $query ) )
			{
				$opt .= '<option value="'.$dados['cmpCodCli'].'">'.$dados['cmpNomCli'].'</option>';
			}
		}
		else
			$opt = '<option value="0">Nenhum cliente cadastrado</option>';

		return $opt;
	}

	/**
	 * função que devolve em formato JSON os dados do cliente
	 */
	function retorna( $id )
	{
		$id = (int)$id;

		$sql = "SELECT cmpCodCli, cmpNomCli, cmpFon1Cli, cmpNumCartaoCli, cmpValCartaoCli
			FROM clientes WHERE cmpCodCli = {$id} ";
		$query = mysql_query( $sql );


		$arr = Array();
		if( mysql_num_rows( $query ) )
		{
			while( $dados = mysql_fetch_object( $query ) )
			{
				$arr['cmpFon1Cli'] = $dados->telefone;
				$arr['cmpNumCartaoCli'] = $dados->cartao;
				$arr['cmpValCartaoCli'] = $dados->validade;
			}
		}
		else
			$arr[] = 'endereco: não encontrado';

		return json_encode( $arr );
	}

/* só se for enviado o parâmetro, que devolve o combo */
if( isset($_GET['cmpCodCli']) )
{
	echo retorna( $_GET['cmpCodCli'] );
}