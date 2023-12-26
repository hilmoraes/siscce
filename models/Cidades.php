<?php
class Cidades extends Model{

	public function getCidades(){

		$array = array();
		$sql = $this->db->query("SELECT a.id_cidade, a.nm_cidade, b.nm_sigla FROM cidades a left join estados b on a.id_estado = b.id_estado ORDER BY nm_cidade");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;

	}

}
