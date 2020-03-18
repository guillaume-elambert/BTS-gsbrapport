<?php
class M_rapport_visites extends CI_Model {


	/**
	 * Retourne la liste de tous les rapports de visite
	 *
	 * @return object liste de touqs les rapports de visite
	 */
	public function tousLesRapports(){
		return $this->db->select('*')
		->from('VISITE')
		->join('PRATICIEN', 'PRATICIEN.PRA_NUM = VISITE.PRA_NUM')
		->order_by('COL_MATRICULE')
		->get()
		->result();
	}


	/**
	 * Retourne la liste des praticiens saisis par un collaborateur dans ses rapports de visite
	 *
	 * @param [string] $user : matricule du collaborateur
	 * @return object liste des praticiens saisis par un collaborateur dans ses rapports de visite
	 */
	public function getLesPraticiensCol($user){
		return $this->db->distinct()
		->from('PRATICIEN')
		//->join('VISITE', 'VISITE.PRA_NUM = PRATICIEN.PRA_NUM')
		->where('PRA_NUM IN (SELECT PRA_NUM FROM VISITE WHERE COL_MATRICULE = "'.$user.'") OR
				 PRA_NUM IN (SELECT REMPLACANTS FROM VISITE WHERE COL_MATRICULE = "'.$user.'")')
		->order_by('PRA_NOM ASC, PRA_PRENOM ASC')
		->get()
		->result();
	}


	/**
	 * Retourne la liste des praticiens remplaçants saisis par un collaborateur dans ses rapports de visite
	 *
	 * @param [string] $user : matricule du collaborateur
	 * @return object liste des praticiens remplaçants saisis par un collaborateur dans ses rapports de visite
	 */
	public function getLesRemplacantsCol($user){
		return $this->db->distinct()
		->from('PRATICIEN')
		->join('VISITE', 'VISITE.REMPLACANTS = PRATICIEN.PRA_NUM')
		->where('COL_MATRICULE',$user)
		->order_by('PRA_NOM ASC, PRA_PRENOM ASC')
		->get()
		->result();
	}


	/**
	 * Retourne les informations du praticien remplaçant d'un rapport de visite
	 *
	 * @param [string] $matricule : identifiant du collaborateur
	 * @param [int] $visite : identifiant de la visite
	 * @return object liste des informations du praticien remplaçant
	 */
	public function getRemplacant($matricule, $visite){
		return $this->db->select('p2.PRA_NOM AS \'rempNom\', p2.PRA_PRENOM AS \'rempPrenom\', p2.PRA_NUM AS \'rempNumero\'')
		->from('VISITE')
		->join('PRATICIEN p1', 'p1.PRA_NUM = VISITE.PRA_NUM')
		->join('PRATICIEN p2','p2.PRA_NUM = VISITE.REMPLACANTS')
		->where('VISITE.VIS_NUM', $visite)
		->get()
		->result();
	}


	/**
	 * Fonction qui retourne les informations du motif de visite dont l'identifiant est passé en paramètre
	 *
	 * @param [int] $idMotif : identifiant du motif de visite
	 * @return object liste des informations du motif
	 */
	public function getMotif($idMotif){
		return $this->db->select('*')
		->from('TYPE_MOTIF')
		->where('ID_MOTIF',$idMotif)
		->get()
		->result();
	}


	/**
	 * Fonction qui retourne les informations d'un médicament spécifié
	 *
	 * @param [string] $idMedicament : identifiant du médicament
	 * @return object liste des informations du médicament 
	 */
	public function getUnMedicament($idMedicament){
		return $this->db->select('*')
		->from('MEDICAMENT')
		->where('MED_DEPOTLEGAL',$idMedicament)
		->get()
		->result();
	}


	/**
	 * Fonction qui retourne la liste de tous les rapports d'un collaborateur
	 * Si $praticien précisé, elle retourne les rapports concernant le praticien passé en paramètre
	 * Si $dateDeb et $dateFin présicés, elle retourne les rapports dont la date de la vitie se situe entre $dateDeb et $dateFin
	 * @param [string] $user : matricule du collaborateur
	 * @param [int] $praticien : identifiant/n° du praticien consulté  (optionnel)
	 * @param [date] $dateDeb : minimum de la date de visite (optionnel)
	 * @param [date] $dateFin : maximum de la date de visite (optionnel)
	 * @return object liste des rapports d'un collaborateur
	 */
	public function lesRapportsCollab($user,$praticien=NULL, $dateDeb=NULL, $dateFin=NULL){
		$where = 'COL_MATRICULE = "'.$user.'"';
		
		if(!is_null($praticien)){
			$where .= ' AND (VISITE.PRA_NUM = "'.$praticien.'" OR VISITE.REMPLACANTS = "'.$praticien.'")';
		}

		if(!is_null($dateDeb) && !is_null($dateFin)){
			$where .= ' AND VIS_DATE BETWEEN "'.date('Y-m-d', strtotime($dateDeb)).'" AND "'.date('Y-m-d', strtotime($dateFin)).'"';
		}
		
		return $this->db->select('*')
		->from('VISITE')
		->join('PRATICIEN p1', 'p1.PRA_NUM = VISITE.PRA_NUM')
		->where($where)
		->order_by('ETAT_RAPPORT ASC, VIS_DATE DESC, VIS_DATESAISIE DESC')
		->get()
		->result();
	}


	/**
	 * Fonction qui retourne la liste des rapports d'une région
	 * Si $visiteur précisé, elle retourne les rapports d'un seul collaborateur
	 * Si $dateDeb et $dateFin présicés, elle retourne les rapports dont la date de la vitie se situe entre $dateDeb et $dateFin
	 * 
	 * @param [string] $codeReg : identifiant de la région
	 * @param [string] $visiteur : matricule du collaborateur (optionnel)
	 * @param [date] $dateDeb : minimum de la date de visite (optionnel)
	 * @param [date] $dateFin : maximum de la date de visite (optionnel)
	 * @return object liste des rapports d'une région
	 */
	public function tousLesRapportsRégion($codeReg,$visiteur=NULL,$dateDeb=NULL,$dateFin=NULL){
		$where = 'REG_CODE = "'.$codeReg.'" AND ETAT_RAPPORT = "finalisé" AND CONSULTE = 0';

		if(!is_null($visiteur)){
			$where .= ' AND VISITE.COL_MATRICULE = "'.$visiteur.'"';
		}

		if(!is_null($dateDeb) && !is_null($dateFin)){
			$where .= ' AND VISITE.VIS_DATE BETWEEN "'.date('Y-m-d', strtotime($dateDeb)).'" AND "'.date('Y-m-d', strtotime($dateFin)).'"';
		}
		
		
		return $this->db->select('*')
		->from('VISITE')
		->join('PRATICIEN p1', 'p1.PRA_NUM = VISITE.PRA_NUM')
		->join('COLLABORATEUR c', 'c.COL_MATRICULE = VISITE.COL_MATRICULE')
		->where($where)
		->order_by('COL_NOM ASC, COL_PRENOM ASC, VIS_DATE DESC, VIS_DATESAISIE DESC')
		->get()
		->result();
	}


	/**
	 * Fonction qui change l'état de consultation par un délégué d'un rapport
	 *
	 * @param [int] $idRapport : identifiant du rapport du collaborateur
	 * @param [string] $matricule : numéro de matricule du collaborateur
	 * @return boolean résultat de la modifiaction du rapport
	 */
	public function setRapportConsulte($idRapport, $matricule){
		return $this->db->set('CONSULTE','1')
		->where(array('VIS_NUM' => $idRapport, 'COL_MATRICULE' => $matricule))
		->update('VISITE');
	}


	/**
	 * Fonction qui retourne la liste de tous les praticien stockés en BDD
	 *
	 * @return object liste de tous les praticiens
	 */
	public function getLesPraticiens(){
		return $this->db->select('*')
		->from('PRATICIEN')
		->order_by('PRA_NOM ASC, PRA_PRENOM ASC')
		->get()
		->result();
	}


	/**
	 * Fonction qui retourne la liste des collaborateurs d'une région
	 *
	 * @param [string] $idRegion : identifiant de la région souhaitée
	 * @return object la liste des collaborateurs de la région
	 */
	public function getLesCollaborateursMaRegion($idRegion){
		return $this->db->select('*')
		->from('COLLABORATEUR')
		->where('REG_CODE',$idRegion)
		->order_by('COL_NOM ASC, COL_PRENOM ASC')
		->get()
		->result();
	}


	/**
	 * Fonction qui retourne les informations du dernier rapport d'un collaborateur
	 *
	 * @param [int] $user : le matricule du collaborateur
	 * @return object
	 */
	public function dernierRapport($user){
		return $this->db->select('*')
		->from('VISITE')
		->where('COL_MATRICULE', $user)
		->limit('1')
		->order_by('VIS_NUM DESC')
		->get()
		->result();
	}


	/**
	 * Fonction qui retourne la liste de tous les motifs de rapports stockés en BDD
	 *
	 * @return object liste de tous les motifs de rapports stockés en BDD
	 */
	public function getLesMotifsRapport(){
		return $this->db->select('*')
		->from('TYPE_MOTIF')
		->order_by('LIB_MOTIF ASC')
		->get()
		->result();
	}


	/**
	 * Fonction qui retourne la liste de tous les médicamment stockés en BDD
	 *
	 * @return object liste de tous les médicamment stockés en BDD
	 */
	public function getLesMedicaments(){
		return $this->db->select('*')
		->from('MEDICAMENT')
		->order_by('MED_NOMCOMMERCIAL ASC')
		->get()
		->result();
	}


	/**
	 * Fonction qui retourne la liste des échantillons donnés lors d'une visite
	 *
	 * @param [string] $matricule : le matricule du collaborateur
	 * @param [int] $idRapport : l'identifiant du rapport souhaité
	 * @return object les échantillons du rapport
	 */
	public function getLesEchantillons($matricule, $idRapport){
		return $this->db->select('*')
		->from('OFFRIR o')
		//->join('MEDICAMENT m','o.MED_DEPOTLEGAL = m.MED_DEPOTLEGAL')
		->where(array(
			'COL_MATRICULE'	=> $matricule,
			'VIS_NUM'		=> $idRapport
		))
		->get()
		->result();
	}



	/**
	 * Fonction qui récupère les informations d'un rapport d'un collaborateur
	 *
	 * @param [string] $matricule : le matricule du collaborateur
	 * @param [int] $idRapport : l'identifiant du rapport souhaité
	 * @return object les informations du rapport
	 */
	public function getLesInfosRapport($matricule, $idRapport){
		return $this->db->select('*')
		->from('VISITE')
		->where(array(
			'COL_MATRICULE'	=> $matricule,
			'VIS_NUM'		=> $idRapport
		))
		->get()
		->result();
	}



	/**
	 * Fonction qui ajoute ou modifie un rapport dans la base de données
	 *
	 * @param [string] $matricule : le matricule du collaborateur
	 * @param [int] $praticien : l'identifiant du praticien visité
	 * @param [string] $preRemplacant : chaîne de caratère qui défini si le rapport évoque un remplaçant
	 * @param [int] $remplacant : l'identifiant du praticien remplacant (optionnel)
	 * @param [string] $bilan : le bilan de la visite
	 * @param [date] $dateVis : la data de la visite
	 * @param [int/string] $motif : l'identifiant du motif de la visite
	 * @param [string] $saisieMotif : autre motif / motif saisi au clavier (optionnel)
	 * @param [int] $idRapport : l'identifiant du rapport souhaité
	 * @param [boolean] $etatRapport : etat de saisi du rapport ('brouillon' ou 'finalisé' )
	 * @param [int] $preMedicament : défini le nombre de médicaments présentés
	 * @param [array] $lesMedicaments : tableau contennant l'ensemble des médicaments présentés
	 * @param [string] $modification : chaîne de caractère qui défini s'il s'agit d'une modifiaction ou d'une insertion
	 * @return boolean résultat de l'insertion/modification des données dans la BDD
	 */
	public function ajouterRapport($matricule,$praticien,$preRemplacant,$remplacant,$bilan,$dateVis,$motif,$saisieMotif,$idRapport, $etatRapport, $preMedicament, $lesMedicaments,$modification=NULL){
		
		/*if($idRapport==''){
			//Récupère dernier rapport de l'utilisateur
			$numRapp = $this->dernierRapport($matricule);
			
			//Si pas de dernier rapport, initialiser à 1
			//Sinon on indente
			if(!empty($numRapp[0])){
				$numRapp = ((int) $numRapp[0]->VIS_NUM)+1;
			} else {
				$numRapp = 1;
			}
		}*/

		$data = array(
	        'PRA_NUM' 			=> $praticien,
	        'VIS_BILAN'	 		=> $bilan,
	        'VIS_DATE' 			=> $dateVis,
	        'VIS_DATESAISIE' 	=> date('Y-m-d H:i:s'),
	        'ETAT_RAPPORT'		=> $etatRapport,
			'COL_MATRICULE'		=> $matricule,
			'VIS_NUM'			=> $idRapport
		);
		

		if(!is_null($modification)){
			$this->db->delete('OFFRIR', array('COL_MATRICULE' => $matricule, 'VIS_NUM' => $idRapport));
		}

		//Si le praticien était absent on insert le num praticien du remplacant
		//Sinon rien
		if(strcmp($preRemplacant, 'non')==0){
			if(strcmp($remplacant, $praticien != 0)){
				$data['REMPLACANTS'] = $remplacant;
			}
		}

		//Si le praticien était absent on insert le num praticien du remplacant
		//Sinon rien
		if(strcmp($motif, 'autreMotif')==0){
			$data['AUTRE_MOTIF'] = $saisieMotif;
		} else {
			$data['ID_MOTIF'] = $motif;
		}

		if(((int) $preMedicament)!=0){
			$i = 1;
			while ($i<=$preMedicament) {
				$data['MED_PRESENTE'.$i] = $lesMedicaments['medicament-'.$i];
				$i++;
			}
		}
		
		return $this->db->replace('VISITE',$data);
	}


	/**
	 * Fonction qui ajoute une liste d'échantillons pour un rapport d'un collaborateur dans la base de données
	 *
	 * @param [string] $matricule
	 * @param [int] $idRapport
	 * @param [array] $lesEchantillons
	 * @return boolean résultat de l'insertion des données dans la BDD
	 */
	public function ajouterEchantillons($matricule,$idRapport,$lesEchantillons){
		
		$exec = true;
		foreach( $lesEchantillons AS $nomEchantillon => $quantiteEchantillon){
				
			$data = array(
				'COL_MATRICULE' 	=> $matricule,
				'VIS_NUM' 			=> $idRapport,
				'MED_DEPOTLEGAL'	=> $nomEchantillon,
				'OFF_QTE'			=> $quantiteEchantillon
			);
				
			$exec = $this->db->replace('OFFRIR',$data);
		}

		return $exec;
	}

}
?>