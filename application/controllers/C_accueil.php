<?php
class C_accueil extends CI_Controller {

	
	function index(){
	    $this->accueil();
	}

	function accueil(){
		$this->load->view('v_accueil');
	}


	/*function setMdp($user){
		$this->load->model("M_gestion_utilisateurs");
		$infoUser = $this->M_gestion_utilisateurs->getInfosCollaborateur('a131')[0];

		foreach ($infoUser as $uneInfo) {
		
			}

		$data = array(
			'MDP'	=> 
		);

	   	var_dump($this->db->replace('VISITE',$data));
	}*/
}
/* End of file C_accueil.php */
/* Location: ./application/controllers/C_accueil.php */
?>
