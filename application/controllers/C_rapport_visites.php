<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_rapport_visites extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_rapport_visites');
	}
	




	public function mesRapports(){
		if(!is_null($this->session->matricule)){
			$data['lesPraticiensCol'] = $this->M_rapport_visites->getLesPraticiensCol($this->session->matricule);

			if(!empty($this->input->post())){

				//Entrée : le délégué à choisi de faire une recherche sur le visiteur
				if($this->input->post('praticien') != 'aucun'){			
				
					//Entrée : recherche par date
					if($this->input->post('dateDebut') != '' && $this->input->post('dateFin') != ''){
						$data['liste'] = $this->M_rapport_visites->lesRapportsCollab($this->session->matricule,$this->input->post('praticien'),$this->input->post('dateDebut'),$this->input->post('dateFin'));
					} else {
						$data['liste'] = $this->M_rapport_visites->lesRapportsCollab($this->session->matricule,$this->input->post('praticien'));
					}

					if(isset($data['liste']) && empty($data['liste'])){
						$this->load->model('M_voir_infos');
						$infosPraticien = $this->M_voir_infos->getUneInfoPraticien($this->input->post('praticien'))[0];
						$this->session->set_tempdata('praticien', strtoupper($infosPraticien['PRA_NOM']).' '.$infosPraticien['PRA_PRENOM']);
					}

				} else if($this->input->post('dateDebut') != '' && $this->input->post('dateFin') != ''){
					$data['liste'] = $this->M_rapport_visites->lesRapportsCollab($this->session->matricule,NULL,$this->input->post('dateDebut'),$this->input->post('dateFin'));
				}
			} else {
				$data['liste']=$this->M_rapport_visites->lesRapportsCollab($this->session->matricule);
			}
			
			$this->load->view('v_rapport', $data);

			if(isset($this->session->praticien)){
				$this->session->unset_tempdata('praticien');
			}
			
		} else {
			$this->session->set_tempdata(array('etat'=>'','message'=> 'Connectez-vous pour avoir accès à ces informations.'));
			redirect(base_url('index.php/c_gestion_utilisateurs/pageConnexion/'));
		}
	}




	public function rapportsMaRegion(){
		if(!is_null($this->session->matricule)){
			if(strcmp($this->session->libTypCol,'Délégué')==0) {
				if(isset($this->session->libReg) && strcmp($this->session->libReg,'')!=0){
					$data['affichageDelegue'] = TRUE;
					$data['lesPraticiens'] = $this->M_rapport_visites->getLesPraticiens();
					$data['lesVisiteurs'] = $this->M_rapport_visites->getLesCollaborateursMaRegion($this->session->codeReg);
			
					//Entrée : le délégué à choisi de faire une recherche dans les rapports
					if(!empty($this->input->post())){

						//Entrée : le délégué à choisi de faire une recherche sur le visiteur
						if($this->input->post('visiteur') != 'aucun'){
							
							//Entrée : recherche par date
							if($this->input->post('dateDebut') != '' && $this->input->post('dateFin') != ''){
								$data['liste'] = $this->M_rapport_visites->tousLesRapportsRégion($this->session->codeReg,$this->input->post('visiteur'),$this->input->post('dateDebut'),$this->input->post('dateFin'));
							} else {
								$data['liste'] = $this->M_rapport_visites->tousLesRapportsRégion($this->session->codeReg,$this->input->post('visiteur'));
							}

							if(isset($data['liste']) && empty($data['liste'])){
								$this->load->model('M_gestion_utilisateurs');
								$infosCollab = $this->M_gestion_utilisateurs->getInfosCollaborateur($this->input->post('visiteur'))[0];
								$this->session->set_tempdata('visiteur', strtoupper($infosCollab['COL_NOM']).' '.$infosCollab['COL_PRENOM']);
							}
						} else if($this->input->post('dateDebut') != '' && $this->input->post('dateFin') != ''){
							$data['liste'] = $this->M_rapport_visites->tousLesRapportsRégion($this->session->codeReg,NULL,$this->input->post('dateDebut'),$this->input->post('dateFin'));
						}
					} else {
						$data['liste']=$this->M_rapport_visites->tousLesRapportsRégion($this->session->codeReg);
					}
					
					$this->load->view('v_rapport', $data);

					if(isset($this->session->visiteur)){
						$this->session->unset_tempdata('visiteur');
					}

				} else {
					$this->session->set_tempdata(array('etat'=>'','message'=> 'Vous n\'êtes pas attribué(e) à une région.'));
					redirect('');
				}
			} else {
				$this->session->set_tempdata(array('etat'=>'','message'=> 'Vous n\'avez pas l\'autorisation d\'accèder à cette partie du site.'));
				redirect('');
			}
		} else {
			$this->session->set_tempdata(array('etat'=>'','message'=> 'Connectez-vous pour avoir accès à ces informations.'));
			redirect(base_url('index.php/c_gestion_utilisateurs/pageConnexion/'));
		}
	}





	public function setRapportConsulte($idRapport, $matricule){
		if(!is_null($this->session->matricule)){
			if(strcmp($this->session->libTypCol,'Délégué')==0) {
				if(isset($this->session->libReg) && strcmp($this->session->libReg,'')!=0){
					$this->M_rapport_visites->setRapportConsulte($idRapport, $matricule);
					$this->session->set_tempdata(array('etat'=>'succes','message'=> 'La rapport à été mit sous l\'état \'Consulté par un délégué\' avec succès.'));
					redirect(base_url('/index.php/c_rapport_visites/rapportsMaRegion/'));
				} else {
					$this->session->set_tempdata(array('etat'=>'','message'=> 'Vous n\'êtes pas attribué(e) à une région.'));
					redirect(base_url());
				}
			} else {
				$this->session->set_tempdata(array('etat'=>'','message'=> 'Vous n\'avez pas l\'autorisation d\'accèder à cette partie du site.'));
				redirect(base_url());
			}
		} else {
			$this->session->set_tempdata(array('etat'=>'','message'=> 'Connectez-vous pour avoir accès à ces informations.'));
			redirect(base_url('/index.php/c_gestion_utilisateurs/pageConnexion/'));
		}
		
	}
	




	public function voirRapport($idRapport, $matricule = NULL){
		
		if(!is_null($this->session->matricule)){
			
			$entree = FALSE;

			//Conditions pour qu'un délégué puisse consulter des rapports de visite
			if(!is_null($matricule) && strcmp($this->session->libTypCol,'Délégué')==0){
				$this->load->model('M_gestion_utilisateurs');
				$infosUser = $this->M_gestion_utilisateurs->getInfosCollaborateur($matricule);
				if($infosUser){
					$infosUser=$infosUser[0];
					if(strcmp($this->session->codeReg,$infosUser['REG_CODE'])==0){
						$entree = TRUE;
					} else {
						$message = "Cet utilisateur ne fait pas parti de votre région, vous ne pouvez pas visualiser ses rapports de visite.";
					}
				} else {
					$message = "Aucun utilisateur ne correspond à celui choisi...";
				}					
			} else {
				$message = 'Vous n\'avez pas l\'autorisation d\'accèder à cette partie du site.';
			}

			
			//Entre si la personne a saisi un matricule, est délégué et dans la même région que l'utilisateur correspondant au matricule
			//		OU si la personne n'a pas renseigner de matricule (voir ses propres rapports)
			if( $entree || is_null($matricule) ){
				
				
				$infosRapport = $this->M_rapport_visites->getLesInfosRapport($this->session->matricule,$idRapport);
				
				//Le rapport de visite souhaité existe
				if(sizeof($infosRapport) != 0){
					$infosRapport = $infosRapport[0];
					
					if( ($entree && strcmp($infosRapport->CONSULTE,'0')==0) || is_null($matricule)){

						//Récupère les données de la base de données
						$data = array(
							'lesPraticiens'		=> $this->M_rapport_visites->getLesPraticiens(),
							'lesMotifs' 		=> $this->M_rapport_visites->getLesMotifsRapport(),
							'lesMedicaments'	=> $this->M_rapport_visites->getLesMedicaments()
						);

						if($entree 	&& strcmp($infosRapport->CONSULTE,'0')==0){
							$data['nomCol'] = strtoupper($infosUser['COL_NOM']);
							$data['prenomCol'] = $infosUser['COL_PRENOM'];
							$data['matriculeCol'] = $infosUser['COL_MATRICULE'];
						} else {
							$data['modification'] = TRUE;
						}
						
						$i=1;
						foreach( $this->M_rapport_visites->getLesEchantillons($this->session->matricule,$idRapport) as $unEchantillon){
							
							$data['lesMedicamentsDonnes']['medicamentDonne-'.$i] = $unEchantillon->MED_DEPOTLEGAL;
							$data['lesMedicamentsDonnes']['quantiteDonnee-'.$i] = $unEchantillon->OFF_QTE;
							$i++;
						}

						while($i<=10){
							$data['lesMedicamentsDonnes']['medicamentDonne-'.$i] = '';
							$data['lesMedicamentsDonnes']['quantiteDonnee-'.$i] = 0;
							$i++;
						}

						$infosRapport = $this->M_rapport_visites->getLesInfosRapport($this->session->matricule,$idRapport)[0];

						$data = array_merge($data, array (
								'praticien'		=> $infosRapport->PRA_NUM,
								'bilan' 		=> $infosRapport->VIS_BILAN,
								'dateVis'		=> date('Y-m-d',strtotime($infosRapport->VIS_DATE)),
								'idRapport'		=> $idRapport,
								'etat'			=> $infosRapport->ETAT_RAPPORT
							)
						);

						
						if(is_null($infosRapport->AUTRE_MOTIF)){
							$data['motif'] = $infosRapport->ID_MOTIF;
							$data['saisieMotif'] = '';
						} else {
							$data['motif'] = 'autreMotif';
							$data['saisieMotif'] = $infosRapport->AUTRE_MOTIF;
						}

						
						if(is_null($infosRapport->REMPLACANTS)){
							$data['preRemplacant'] = 'oui';
							$data['remplacant'] = '';
						} else {
							$data['preRemplacant'] = 'non';
							$data['remplacant'] = $infosRapport->REMPLACANTS;
						}

						if(is_null($infosRapport->MED_PRESENTE1)){
							$data['preMedicament'] = 0;
							$data['lesMedicamentsPresentes'] = array(
								'medicament-1' => '',
								'medicament-2' => ''
							);

						} else if(is_null($infosRapport->MED_PRESENTE2)){
							$data['preMedicament'] = 1;
							$data['lesMedicamentsPresentes'] = array(
								'medicament-1' => $infosRapport->MED_PRESENTE1,
								'medicament-2' => ''
							);

						} else {
							$data['preMedicament'] = 2;
							$data['lesMedicamentsPresentes'] = array(
								'medicament-1' => $infosRapport->MED_PRESENTE1,
								'medicament-2' => $infosRapport->MED_PRESENTE2
							);
						}
						
						$this->load->view('v_saisie-rapport', $data);
					
					} else {
						$this->session->set_tempdata(array('etat'=>'','message'=> 'Ce rapport a déjà été consulté par un délégué'));
						redirect(base_url('index.php/c_rapport_visites/rapportsMaRegion/'));
					}


				} else {
					$this->session->set_tempdata(array('etat'=>'','message'=> 'Ce rapport de visite n\'existe pas.'));
					redirect(base_url('index.php/c_rapport_visites/rapportsMaRegion/'));
				}

			} else {
				$this->session->set_tempdata(array('etat'=>'','message'=> $message));
				if(is_null($matricule) && strcmp($this->session->libTypCol,'Délégué')!=0){
					redirect(base_url('index.php/c_rapport_visites/rapportsMaRegion/'));
				} else {
					redirect(base_url());
				}
			}
				
		} else {
			$this->session->set_tempdata(array('etat'=>'','message'=> 'Connectez-vous pour avoir accès à ces informations.'));
			redirect(base_url('index.php/c_gestion_utilisateurs/pageConnexion/'));
		}

	}





	public function saisieRapport($modification = NULL){

		if(!is_null($this->session->matricule)){

			//Si pas de données envoyées par le formulaire
			if(empty($this->input->post())){

				//Récupère les données de la base de données
				$data = array(
					'lesPraticiens'		=> $this->M_rapport_visites->getLesPraticiens(),
					'lesMotifs' 		=> $this->M_rapport_visites->getLesMotifsRapport(),
					'lesMedicaments'	=> $this->M_rapport_visites->getLesMedicaments()
					//'lesEchantillons'	=> $this->M_rapport_visites->getLesEchantillons($this->session->matricule)
				);



				/*************** GESTION PREREMPLISSAGE FORMULAIRE ***************/
				$data['nouveauRapport'] = TRUE;

				if( !isset($bilan) ){
					$data['bilan'] = '';
				} else {
					$data['bilan'] = $bilan;
				}

				
				if( !isset($data['dateVis']) )
				{
					$data['dateVis'] = date('Y-m-d');
				} else {
					$data['dateVis'] = $dateVis;
				}


				if( !isset($data['motif']) ){
					$data['motif'] = '';
					$data['saisieMotif'] = '';
				} else {
					$data['motif'] = $motif;
					
					if(!isset($data['saisieMotif'])){
						$data['saisieMotif'] = '';
					} else {
						$data['saisieMotif'] = $saisieMotif;
					}
				}

				if( !isset($data['praticien']) )
				{
					$data['praticien'] = '';
				} else {
					$data['praticien'] = $praticien;
				}


				if( !isset($data['preRemplacant']) )
				{
					$data['preRemplacant'] = 'oui';
				} else {
					$data['preRemplacant'] = $preRemplacant;
				}


				if( !isset($data['remplacant']) )
				{
					$data['remplacant'] = '';
				} else {
					$data['remplacant'] = $remplacant;
				}

				if( !isset($data['preMedicament']) ){
					$data['preMedicament'] = 0;
				} else {
					$data['preMedicament'] = $preMedicament;
				}

				$i=1;
				while($i<=2)
				{
					if( !isset($data['lesMedicamentsPresentes']['medicament'.$i]) ){
						$data['lesMedicamentsPresentes']['medicament-'.$i] = '';
					} else {
						$data['lesMedicamentsPresentes']['medicament-'.$i] = $lesMedicamentsPresentes['medicament-'.$i];
					}
					$i++;				
				}

				$i=1;
				while($i<=10)
				{
					if( !isset($data['lesMedicamentsDonnes']['medicamentDonne-'.$i]) ){
						$data['lesMedicamentsDonnes']['medicamentDonne-'.$i] = '';
					} else {
						$data['lesMedicamentsDonnes']['medicamentDonne-'.$i] = $lesMedicamentsDonnes['medicamentDonne-'.$i];
					}


					if( !isset($data['lesMedicamentsDonnes']['quantiteDonnee-'.$i]) ){
						$data['lesMedicamentsDonnes']['quantiteDonnee-'.$i] = 0;
					} else {
						$data['lesMedicamentsDonnes']['quantiteDonnee-'.$i] = $lesMedicamentsDonnes['quantiteDonnee-'.$i];
					}

					$i++;				
				}


				if( !isset($data['idRapport']) ){
					//Récupère dernier rapport de l'utilisateur
					$idRapport = $this->M_rapport_visites->dernierRapport($this->session->matricule);
					
					//Si pas de dernier rapport, initialiser à 1
					//Sinon on indente
					if(!empty($idRapport[0]))
					{
						$data['idRapport'] = ((int) $idRapport[0]->VIS_NUM)+1;
					} else {
						$data['idRapport'] = 1;
					}
				} else {
					$data['idRapport'] = $idRapport;
				}

				/*************** GESTION PREREMPLISSAGE FORMULAIRE ***************/


				//Charge la vue du formulaire avec les données saisies ou vides sinon
				$this->load->view('v_saisie-rapport', $data);

			} else {

				$matricule					= $this->session->matricule;
				$praticien 					= $this->input->post('praticien');
				$preRemplacant 				= $this->input->post('preRemplacant');
				$remplacant 				= $this->input->post('remplacant');
				$bilan 						= $this->input->post('bilan');
				$dateVis 					= $this->input->post('dateVis');
				$motif 						= $this->input->post('motif');
				$saisieMotif			 	= $this->input->post('saisieMotif');
				$idRapport					= $this->input->post('idRapport');
				$bouton						= $this->input->post('btn_ajoutRapp');
				$preMedicament 				= $this->input->post('preMedicament');
				$lesMedicamentsPresentes 	= array (
					'medicament-1' => $this->input->post('medicament-1'),
					'medicament-2' => $this->input->post('medicament-2')
				);

				$lesEchantillons	= array ();
				$i = 1;
				while ($i <= 10){
					
					//Indexation intelligente : qte à 0 => pas d'indexation
					if(strcmp($this->input->post('quantiteDonnee-'.$i),'0') != 0 && strcmp($this->input->post('quantiteDonnee-'.$i),'') != 0){
						if(isset($lesEchantillons[$this->input->post('medicamentDonne-'.$i)])){
							$lesEchantillons[$this->input->post('medicamentDonne-'.$i)] += intval($this->input->post('quantiteDonnee-'.$i));
						} else {
							$lesEchantillons[$this->input->post('medicamentDonne-'.$i)] = intval($this->input->post('quantiteDonnee-'.$i));
						}
					}
					$i++;
				}

				if(strcmp($bouton, 'Finaliser')==0){
					$etatRapport = 'finalisé';
				} else {
					$etatRapport = 'brouillon';
				}
				
				//Si ajout réussi redirection page accueil
				//Sinon retour au formulaire avec données saisies
				if ($this->M_rapport_visites->ajouterRapport(
					$matricule,
					$praticien,
					$preRemplacant,
					$remplacant,
					$bilan,
					$dateVis,
					$motif,
					$saisieMotif,
					$idRapport,
					$etatRapport,
					$preMedicament,
					$lesMedicamentsPresentes,
					$modification
				   ) && $this->M_rapport_visites->ajouterEchantillons($matricule,$idRapport,$lesEchantillons)){

					if(strcmp($bouton, 'Finaliser')==0){
						$message = 'Votre rapport à été finalisé avec succès !';
					} else {
						$message = 'Votre rapport à été enregistré comme brouillon avec succès !';
					}

					$this->session->set_tempdata(array('etat'=>'succes','message'=> $message));
					if($modification){
						redirect(base_url('/index.php/c_rapport_visites/mesRapports/'));
					} else {
						redirect(base_url());
					}
				} else {

					$data = array (
						'bilan'						=> $bilan,
						'dateVis'					=> $dateVis,
						'motif'						=> $motif,
						'saisieMotif'				=> $saisieMotif,
						'idRapport'					=> $idRapport,
						'praticien'					=> $praticien,
						'remplacant'				=> $remplacant,
						'preRemplacant'				=> $preRemplacant,
						'lesMedicamentsPresentes' 	=> $lesMedicamentsPresentes,
						'preMedicament'				=> $preMedicament,
						'lesMedicamentsDonnes'		=> $lesEchantillons,
						'lesPraticiens'				=> $this->M_rapport_visites->getLesPraticiens(),
						'lesMotifs' 				=> $this->M_rapport_visites->getLesMotifsRapport(),
						'lesMedicaments'			=> $this->M_rapport_visites->getLesMedicaments()
					);

					if(strcmp($bouton, 'Finaliser')==0){
						$message = 'Votre rapport n\'a pas pu être finalisé.';
					} else {
						$message = 'Votre rapport n\'a pas pu être enregistré comme brouillon.';
					}

					$this->session->set_tempdata(array('etat'=>'erreur','message'=>$message.' Veuillez vérifier vos saisies.'));
					$this->load->view('v_saisie-rapport', $data);
				}
			}
		} else {
			$this->session->set_tempdata(array('etat'=>'','message'=> 'Connectez-vous pour avoir accès à ces informations.'));
			redirect(base_url('index.php/c_gestion_utilisateurs/pageConnexion/'));
		}
	}




}
/* End of file c_rapport_visites.php */
/* Location: ./application/controllers/c_rapport_visites.php */
?>
