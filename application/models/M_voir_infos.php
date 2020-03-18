<?php
class M_voir_infos extends CI_Model {

		function getLesInfos($table, $champOrderBy){
			$orderBy = '';

			if(is_array($champOrderBy)){
				foreach ($champOrderBy as $unChamp) {
					$orderBy .= $unChamp.' ASC,';
				}
				$orderBy = substr($orderBy, 0, -1);
			} else {
				$orderBy = $champOrderBy.' ASC';
			}

			return $this->db->select('*')
   			->from(strtoupper($table))
   			->order_by($orderBy)
   			->get()
   			->result_array();
		}

		function getUneInfoMedicament($id){
			return $this->db->select('*')
	   		->from('MEDICAMENT')
	   		->where('MED_DEPOTLEGAL',$id)
	   		->join('FAMILLE','MEDICAMENT.FAM_CODE = FAMILLE.FAM_CODE')
	   		->get()
	   		->result_array();
		}

		function getUneInfoPraticien($id){
			return $this->db->select('*')
	   		->from('PRATICIEN')
	   		->join('TYPE_PRATICIEN','PRATICIEN.TYP_CODE = TYPE_PRATICIEN.TYP_CODE')
	   		->where('PRA_NUM',$id)
	   		->get()
	   		->result_array();
		}

		function getPrimaryKey($table){
			$t1 = 'table_constraints';
			$t2 = 'key_column_usage';

			return $this->db->select('COLUMN_NAME')
			->from('information_schema.table_constraints')
			->join('information_schema.key_column_usage', 
				$t1.'.constraint_schema     = '.$t2.'.constraint_schema AND '.
				$t1.'.table_name            = '.$t2.'.table_name AND '.
				$t1.'.constraint_name       = '.$t2.'.constraint_name')
			->where(array(
				$t1.'.constraint_type' 	=> 'PRIMARY KEY',
				$t1.'.table_schema'		=> $this->db->database,
			  	$t1.'.table_name'		=> strtoupper($table)
			 ))
			->get()
			->result();

			/*SELECT *
			FROM information_schema.table_constraints t
			WHERE t.table_name='PRATICIEN';

			SELECT *
			FROM information_schema.key_column_usage;*/
		}
}
/* End of file M_voir_infos.php */
/* Location: ./application/controllers/M_voir_infos.php */
?>