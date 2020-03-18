<?php
class C_voir_infos extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_voir_infos');
	}


	function redirectVoirInfos($table, $leChoix = 1, $popUp = null){
		$this->session->set_tempdata('leChoix', $leChoix);
		
		if(!is_null($popUp)){
			$this->session->set_tempdata('popUp', true);
		}
		
		redirect(base_url('index.php/c_voir_infos/voirInfos/'.$table));
	}


	function voirInfos($table){
		$table = strtoupper($table);

		switch ($table) {
			case 'PRATICIEN' :
				$data['libelle'] = array('PRA_NOM','PRA_PRENOM');
			break;

			case 'MEDICAMENT' :
				$data['libelle'] = 'MED_NOMCOMMERCIAL';
			break;

			default :
				$data['libelle'] = array('PRA_NOM','PRA_PRENOM');
				$table = 'PRATICIEN';
			break;

		}

		$data['table'] = $table;
		$data['pk'] = $this->M_voir_infos->getPrimaryKey($table)[0]->COLUMN_NAME;


		$this->load->view('v_header');

		if(is_null($this->session->tempdata('popUp'))){
			$data['lesInfos'] = $this->M_voir_infos->getLesInfos($table,$data['libelle']);
			$this->load->view('v_infos',$data);
		}
		

		$leChoix = null;
		
		if(!is_null($this->input->post('lesChoix'))){
			$leChoix = $this->input->post('lesChoix');
		} else if (!is_null($this->session->tempdata('leChoix'))){
			$leChoix = $this->session->tempdata('leChoix');
		}


		if(!is_null($leChoix)){
			switch ($table) {
				case 'PRATICIEN' :
					$vue  = 'v_voir_praticien';
					$data = array('lePraticien' => $this->M_voir_infos->getUneInfoPraticien($leChoix)[0]);
				break;

				case 'MEDICAMENT' :
					$vue  = 'v_voir_medicament';
					$data = array('leMedicament' => $this->M_voir_infos->getUneInfoMedicament($leChoix)[0]);
				break;
			}
			$this->load->view($vue,$data);

		}

		$this->load->view('v_footer');
		
		if (!is_null($this->session->tempdata('leChoix'))){
			$this->session->unset_tempdata('leChoix');
		}

		if (!is_null($this->session->tempdata('popUp'))){
			$this->session->unset_tempdata('popUp');
		}
	}
}
/* End of file C_voir_infos.php */
/* Location: ./application/controllers/C_voir_infos.php */
?>
