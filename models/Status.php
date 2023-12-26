<?php
class Status extends Model{

	public function getStatus(){

		$array = array();
		$sql = $this->db->query('SET NAMES utf8');
		$sql = $this->db->query("SELECT id_status, nm_status FROM status ORDER BY nm_status");
		
		if($sql->rowCount() > 0){

			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;

	}

}