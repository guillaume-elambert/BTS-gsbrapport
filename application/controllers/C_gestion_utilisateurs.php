<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_gestion_utilisateurs extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_gestion_utilisateurs');
	}

	public function index(){
		$this->pageConnexion();
	}
	
	public function pageConnexion(){
		if(is_null($this->session->matricule)){
			$data['matricule'] = '';
			$this->load->view("v_connexion", $data);
			$this->load->view("v_footer");
		} else {
			$this->session->set_tempdata( array( 'etat'=>'', 'message'=>'Vous êtes déjà connectez.') );
			redirect(base_url());
		}
	}

	public function deconnexion(){
		if(!is_null($this->session->matricule)){
			$user_data = $this->session->all_userdata();
			foreach ($user_data as $key => $value) {
				$this->session->unset_userdata($key);
			}
			
			$this->session->set_tempdata( array( 'etat'=>'succes', 'message'=>'Déconnexion réussie !') );
			redirect(base_url());
		} else {
			$this->session->set_tempdata( array( 'etat'=>'', 'message'=>'Vous n\'êtes pas connectez.') );
			redirect(base_url('index.php/c_gestion_utilisateurs/pageConnexion'));
		}
	}


	public function connexion(){
		
		$infosUser = $this->M_gestion_utilisateurs->getInfosCollaborateur($this->input->post('matricule'));
		$data['matricule'] = $this->input->post('matricule');
		
		if($infosUser){
			$infosUser = $infosUser[0];
			
			if(password_verify($this->input->post('mdp'),$infosUser['MDP'])){
				$this->session->set_userdata( array(
					'matricule' => $this->input->post('matricule'),
					'libTypCol' => $infosUser['LIB_TYPE'],
					'nom'		=> $infosUser['COL_NOM'],
					'prenom'	=> $infosUser['COL_PRENOM']
				));

				if(isset($infosUser['REG_CODE'])){
					$infosRegion = $this->M_gestion_utilisateurs->getInfosRegion($infosUser['REG_CODE'])[0];
					$this->session->set_userdata( array(
						'codeReg'	=> $infosRegion['REG_CODE'],
						'libReg'	=> $infosRegion['REG_NOM']
					));
				}

				$this->session->set_tempdata(array('etat'=>'succes','message'=>'Connexion réussie. Bienvenue, '.strtoupper($infosUser['COL_NOM']).' '.$infosUser['COL_PRENOM'].' !'));
				redirect(base_url());
			} else {
				$this->session->set_tempdata(array('etat'=>'erreur','message'=>'Erreur de mot de passe !'));
				$this->load->view("v_connexion", $data);
			}
		} else {
			$this->session->set_tempdata(array('etat'=>'erreur','message'=>'Erreur d\'identifiant !'));
			$this->load->view("v_connexion", $data);
		}
	}



	public function modifierMdp(){

		/* Entrée : L'utilisateur n'a pas saisi d'information dans la formulaire */
		if(empty($this->input->post())){

			$this->load->view('v_modifMdp');
			$this->load->view('v_footer');

		} else {
			
			$infosUser = $this->M_gestion_utilisateurs->getInfosCollaborateur($this->session->matricule)[0];
			/* Entrée : la saisi de l'ancien mot de passe correspond à celui dans la base de données */
			if(password_verify($this->input->post('ancienMdp'),$infosUser['MDP'])){
				
				/* Entrée : Les champs du nouveau mot de passe correspondent */
				if(strcmp($this->input->post('nouvMdp'), $this->input->post('repNouvMdp'))==0){
					
					/* Entrée : La modification du mot de passe à été éffectuée avec succès */
					if ($this->M_gestion_utilisateurs->updateUserMdp($this->session->matricule, password_hash($this->input->post('nouvMdp'), PASSWORD_DEFAULT))){
						
						$this->session->set_tempdata(array(
							'etat'		=> 'succes',
							'message' 	=> 'Mot de passe modifié avec succès !')
						);
						redirect(base_url());

					} else {

						$this->session->set_tempdata(array(
							'etat'		=> 'erreur',
							'message'	=> 'Erreur, mot de passe non modifié.'
						));
						redirect(base_url('index.php/c_gestion_utilisateurs/modifierMdp'));

					}

				} else {

					$this->session->set_tempdata(array(
						'etat'		=> 'erreur',
						'message'	=> 'Les champs concernant votre nouveau mot de passe ne sont pas identiques.'
					));
					redirect(base_url('index.php/c_gestion_utilisateurs/modifierMdp'));

				}

			} else {

				$this->session->set_tempdata(array(
					'etat'		=> 'erreur',
					'message'	=> 'Votre ancien mot de passe est incorrect.'
				));
				redirect(base_url('index.php/c_gestion_utilisateurs/modifierMdp'));

			}
		}
	}
}
/* End of file c_gestion_utilisateurs.php */
/* Location: ./application/controllers/c_gestion_utilisateurs.php */
?>
