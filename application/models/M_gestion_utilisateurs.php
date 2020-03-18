<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_gestion_utilisateurs extends CI_Model {
	//private $table='collaborateur';
	 
	public function getInfosCollaborateur($matricule){
	   	return $this->db->select('*')
	   					->from('COLLABORATEUR')
	   					->join('TYPE_COLLABORATEUR','COLLABORATEUR.ID_TYPE = TYPE_COLLABORATEUR.ID_TYPE')
	   					->where('COL_MATRICULE',$matricule)
	   					->get()
	   					->result_array();
	}

	public function updateUserMdp($matricule, $nouvMdp){
		
	   	return $this->db->set('MDP',$nouvMdp)
	   					->where('COL_MATRICULE',$matricule)
	   					->update('COLLABORATEUR');
	}

	public function getInfosRegion($codeRegion){
		return $this->db->select('*')
						->from('REGION')
						->where('REG_CODE',$codeRegion)
						->get()
	   					->result_array();
	}
}

?>