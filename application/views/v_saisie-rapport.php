<?php $this->load->view('v_header'); 


$lienForm = '/c_rapport_visites/saisieRapport';

//Titre de la page adaptatif au cas d'utilisation sollicité
if(isset($modification)){
	$lienForm .= '/modification';
	
	if(isset($etat) && strcmp($etat,'finalisé') == 0 ){
		$titre = 'Consulter mon rapport de visite du '.utf8_encode(strftime('%e %B %Y ',strtotime($dateVis)));
	} else {
		$titre = 'Modifier mon rapport de visite du '.utf8_encode(strftime('%e %B %Y ',strtotime($dateVis)));
	}

} else if (isset($nouveauRapport)){
	$titre = 'Saisie d\'un nouveau rapport de visite';
} else {
	
	$titre = 'Consulter le rapport de visite du '.utf8_encode(strftime('%e %B %Y ',strtotime($dateVis)));
	if(isset($nomCol) && isset($prenomCol)){
		$titre .=  ' de '.strtoupper($nomCol).' '.$prenomCol;
	}
} 	


echo '<h3 style="text-align:center;">'.$titre.'</h3><br>';

echo '<div>';
/* form_open() génère la balise <form> avec attribut action renseigné par le paramètre */
echo form_open($lienForm);
?>

<?php

	/*********************** LE COLLABORATEUR - AUTEUR ***********************/

	if(isset($nomCol) && isset($prenomCol)){
		echo form_error ( 'Praticien', '<div class="alert alert-danger">', '</div>' );
		echo form_label ( "Auteur du rapport de visite :" );
		echo '<div class="form-group" style="display:flex; justify-content:space-between">';
		$data = array(
			'id' 		=> 'nomCol',
			'class'		=> 'form-control',
			'style'		=> 'width:47%; text-align:center;',
			'value'		=> $nomCol,
			'disabled'	=> TRUE
		);
		echo form_input($data);

		$data = array(
			'id' 		=> 'prenomCol',
			'class'		=> 'form-control',
			'style'		=> 'width:47%; text-align:center;',
			'value'		=> $prenomCol,
			'disabled'	=> TRUE
		);
		echo form_input($data);
		echo '</div><br/>';
	}

	/*********************** LE COLLABORATEUR - AUTEUR ***********************/




	
	/*********************** LE PRATICIEN ***********************/

	echo form_error ( 'Praticien', '<div class="alert alert-danger">', '</div>' );
	echo form_label ( "Praticien visité :" );
	echo '<div class="form-group" style="display:flex; justify-content:space-between">';
	
	$data = array();
	
	//Affichage de l'ensemble des praticiens
	foreach($lesPraticiens as $unPraticien){
		$data[$unPraticien->PRA_NUM] = strtoupper($unPraticien->PRA_NOM)." ".$unPraticien->PRA_PRENOM;
	}

	//Bloque la saisie si le rapport est finalisé
	if(isset($etat) && strcmp($etat,'finalisé') == 0 ){
		$option = ' disabled';
	} else {
		$option = '';
	}

	echo form_dropdown('praticien', $data, $praticien, 'id="praticien" class="form-control" required style="width : 85%;"'.$option);


	$data = array(
		'id' 		=> 'btnPra',
		'class' 	=> 'btn btn-secondary',
		'value'		=> 'Infos. praticien',
		'type'		=> 'button',
		'title'		=> 'Voir les informations du praticien',
		'onclick'	=> 'window.open(\''.base_url('index.php/c_voir_infos/redirectVoirInfos/PRATICIEN/').'\'+document.getElementById(\'praticien\').options[document.getElementById(\'praticien\').selectedIndex].value+\'/POP-UP/\', \'Infos. praticien\', \'height=\'+550+\', width=\'+500+\', top=\'+( (window.innerHeight - 550 ) /2 )+\', left=\'+( (window.innerWidth - 500 ) /2 )+\',  toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=yes, status=no\');'
	);
	echo form_submit($data);

	

	echo '</div>';

	/*********************** LE PRATICIEN ***********************/


	echo '<br/>';
	

	/*********************** LE REMPLACANT ***********************/

	echo '<div class="form-group">';
	echo form_error ( 'checkboxes', '<div class="alert alert-danger">', '</div>' );
	echo form_label("Le praticien était-il là ?",'checkboxes');
	echo '<div id="checkboxes" style="display:flex; justify-content:space-between; max-width:28%;">';

		echo '<div class="form-check">';
			$data = array(
			 	'class' 	=> 'form-check-input',
			 	'type' 		=> 'radio',
				'name' 		=> 'preRemplacant',
			 	'id' 		=> 'preRemplacant-oui',
			 	'value' 	=> 'oui'
			);

			//Bloque la saisie si le rapport est finalisé
			if(isset($etat) && strcmp($etat,'finalisé') == 0 ){
				$data['disabled'] = true;
			}
			
			if(strcmp($preRemplacant,'oui')==0){
				$data['checked'] = true;
			}

			echo form_input($data);

			$data = array(
				'class' => 'form-check-label'
			);
			echo form_label ( "Oui",'preRemplacant-oui',$data);

		echo '</div>';


		echo '<div class="form-check">';
			$data = array(
				'class' => 'form-check-input',
			 	'type' 	=> 'radio',
				'name' 	=> 'preRemplacant',
			 	'id' 	=> 'preRemplacant-non',
			 	'value' => 'non',
			);


			//Bloque la saisie si le rapport est finalisé
			if(isset($etat) && strcmp($etat,'finalisé') == 0 ){
				$data['disabled'] = true;
			}

			if(strcmp($preRemplacant,'non')==0){
				$data['checked'] = true;
			}
			
			echo form_input($data);

			$data = array(
				'class' => 'form-check-label'
			);
			echo form_label("Non",'preRemplacant-non', $data);

		echo '</div>';
	echo '</div>';
	

	
	echo '<div id="divRemplacant" class="form-group"';
	if(strcmp($preRemplacant,'non')!=0){
		echo ' style="display:none"';
	}
	echo '><br/>';
		echo form_error ( 'remplacant', '<div class="alert alert-danger">', '</div>' );
		echo form_label ( "Qui était le remplaçant ? :" );
		echo '<div style="display:flex; justify-content:space-between">';
		$data = array();
		
		//Affichage de l'ensemble des praticiens
		foreach($lesPraticiens as $unPraticien){
			$data[$unPraticien->PRA_NUM] = strtoupper($unPraticien->PRA_NOM)." ".$unPraticien->PRA_PRENOM;
		}


		//Bloque la saisie si le rapport est finalisé
		if(isset($etat) && strcmp($etat,'finalisé') == 0 ){
			$option = ' disabled';
		} else {
			$option = '';
		}

		echo form_dropdown('remplacant', $data, $remplacant, 'class="form-control" id="remplacant" style="width:85%;"'.$option);

		$data = array(
			'id' 		=> 'btnPra',
			'class' 	=> 'btn btn-secondary',
			'value'		=> 'Infos. remplaçant',
			'type'		=> 'button',
			'title'		=> 'Voir les informations du praticien',
			'onclick'	=> 'window.open(\''.base_url('index.php/c_voir_infos/redirectVoirInfos/PRATICIEN/').'\'+document.getElementById(\'remplacant\').options[document.getElementById(\'remplacant\').selectedIndex].value+\'/POP-UP/\', \'Infos. remplacant\', \'height=\'+550+\', width=\'+500+\', top=\'+( (window.innerHeight - 550 ) /2 )+\', left=\'+( (window.innerWidth - 500 ) /2 )+\',  toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=yes, status=no\');'
		);

		echo form_submit($data);
	echo '</div></div>';
	echo '</div>';

	/*********************** LE REMPLACANT ***********************/



	echo '<br/>';



	/*********************** LES MOTIFS ***********************/

	echo '<div class="form-group">';
	echo form_error ( 'motif', '<div class="alert alert-danger">', '</div>' );
	echo form_label ( "Motif de votre visite :" );
	$data = array();
	
	//Affichage de l'ensemble des motifs + le motif 'autre'
	foreach($lesMotifs as $unMotif){
		$data[$unMotif->ID_MOTIF] = $unMotif->LIB_MOTIF;
	}
	$data['autreMotif']='Autre motif';
	
	
	//Bloque la saisie si le rapport est finalisé
	if(isset($etat) && strcmp($etat,'finalisé') == 0 ){
		$option = ' disabled';
	} else {
		$option = '';
	}

	echo form_dropdown('motif', $data, $motif, 'class="form-control" id="motif"'.$option );



	
	echo '<div id="divSaisiMotif"';
	if(strcmp($motif,'autreMotif')!=0){
		echo ' style="display:none"';
	}
	echo '>';
	echo '<br/>';
		echo form_error ( 'saisieMotif', '<div class="alert alert-danger">', '</div>' );
		echo form_label ( "Sasissez votre motif :" );
		
		$data = array(
			'name' 		=> 'saisieMotif',
		 	'id' 		=> 'saisieMotif',
			'class' 	=> 'form-control',
			'max'		=> '255',
			'onkeyup'	=> 'etatBtn();',
		 	'value'		=> $saisieMotif
		);

		//Bloque la saisie si le rapport est finalisé
		if(isset($etat) && strcmp($etat,'finalisé') == 0 ){
			$data['readonly'] = TRUE;
		}

		echo form_input ( $data );
	echo '</div>';
	echo '</div>';

	/*********************** LES MOTIFS ***********************/


	echo '<br/>';


	/*********************** LES MEDICAMENTS ***********************/

	echo '<div class="form-group">';
	echo form_label("Nombre de médicaments présentés :",'preMedicament');
	echo form_error('preMedicament', '<div class="alert alert-danger">', '</div>' );
	echo '<div id="preMedicament" style="display:flex; justify-content:space-between; max-width:50%;">';

		$i=0;
		while($i<=2){
			echo '<div class="form-check">';
				$data = array(
					'class' 	=> 'form-check-input',
				 	'type' 		=> 'radio',
					'name' 		=> 'preMedicament',
				 	'id' 		=> 'preMedicament-'.$i,
				 	'value' 	=> $i,
				 	'onclick' 	=> 'afficherMedicament('.$i.');'
				);

				if($preMedicament == $i){
					$data['checked'] = true;
				}

				//Bloque la saisie si le rapport est finalisé
				if(isset($etat) && strcmp($etat,'finalisé') == 0 ){
					$data['disabled'] = true;
				}

				echo form_input($data);

				$data = array(
					'class' => 'form-check-label'
				);
				echo form_label($i,'preMedicament-'.$i, $data);

			echo '</div>';
			$i++;
		}


	echo '</div>';


	echo '<div id="medicaments" style="display:flex; justify-content:space-between; margin-top:2em;';
	if($preMedicament==0){
		echo 'display:none';
	}
	echo '">';

	$i=1;


	while($i<=2){	
		
		echo '<div id="leMedicament'.$i.'" style="width:45%;';
		if($preMedicament<$i){
			echo ' display:none';
		}
		echo '">';
		echo form_error ( 'medicament-'.$i, '<div class="alert alert-danger">', '</div>' );
		echo form_label('Médicament '.$i.': <a title="Voir les informations du médicament" style="margin-left: 10%; color: rgba(0,0,0,.5);" href="#" onclick="window.open(\''.base_url('index.php/c_voir_infos/redirectVoirInfos/MEDICAMENT/').'\'+document.getElementById(\'medicament-'.$i.'\').options[document.getElementById(\'medicament-'.$i.'\').selectedIndex].value+\'/POP-UP/\', \'Infos. médicament\', \'height=\'+550+\', width=\'+500+\', top=\'+( (window.innerHeight - 550 ) /2 )+\', left=\'+( (window.innerWidth - 500 ) /2 )+\',  toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=yes, status=no\'); return false;">(Voir infos. médicament)</a>','leMedicament'.$i);
		
		$data = array();
		foreach($lesMedicaments as $unMedicament){
			$data[$unMedicament->MED_DEPOTLEGAL] = $unMedicament->MED_NOMCOMMERCIAL;
		}

		//Bloque la saisie si le rapport est finalisé
		if(isset($etat) && strcmp($etat,'finalisé') == 0 ){
			$option = ' disabled';
		} else {
			$option = '';
		}

		echo form_dropdown('medicament-'.$i, $data, $lesMedicamentsPresentes['medicament-'.$i], 'class="form-control" id="medicament-'.$i.'"'.$option );
		$i++;
		echo '</div>';
	}
	echo '</div>';
	echo '</div>';

	/*********************** LES MEDICAMENTS ***********************/


	echo '<br/>';
	
	
	
	/*********************** LES ECHANTILLONS ***********************/
	
	if( (isset($etat) && strcmp($etat,'finalisé') != 0) || !isset($etat) /*&& isset($lesMedicamentsDonnes) && strcmp($lesMedicamentsDonnes['medicamentDonne-1'],'') != 0*/){
		echo form_label("Echantillons offerts :",'echantillons');
		echo '<div id="messageEchantillon" style="display:none;" class="alert alert-danger"></div>';
		echo '<div id="echantillons" class="form-group" style="max-width:100%; display:flex; justify-content:space-between;">';
			echo '<div id="echantillonsGauche" style="width:47%;">';
				$i = 1;
				$qte = 0;
				while($i<=10){
					
					echo '<div id="echantillon-'.$i.'" class="form-group"';
					if (strcmp($lesMedicamentsDonnes['medicamentDonne-'.$i],'')==0){
											
						if( $i>1 && (strcmp($lesMedicamentsDonnes['medicamentDonne-'.($i-1)],'')==0 || $qte >= 10)){
							echo ' style=" display:none;"';
						}
					} else {
						$qte += intval($lesMedicamentsDonnes['quantiteDonnee-'.$i]);
					}
					

					echo '>';

						echo form_label('Echantillon '.$i.' :<a title="Voir les informations du médicament" style="margin-left: 10%; color: rgba(0,0,0,.5);" href="#" onclick="window.open(\''.base_url('index.php/c_voir_infos/redirectVoirInfos/MEDICAMENT/').'\'+document.getElementById(\'medicament-'.$i.'\').options[document.getElementById(\'medicament-'.$i.'\').selectedIndex].value+\'/POP-UP/\', \'Infos. médicament\', \'height=\'+550+\', width=\'+500+\', top=\'+( (window.innerHeight - 550 ) /2 )+\', left=\'+( (window.innerWidth - 500 ) /2 )+\',  toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=yes, status=no\'); return false;">(Voir infos. médicament)</a>','echantillon-'.$i);
						
						echo form_error ( 'quantiteEchantillon-'.$i, '<div class="alert alert-danger">', '</div>' );
						echo form_error ( 'medicamentDonne-'.$i.'<div class="alert alert-danger">', '</div>' );
						
						echo '<div style="display:flex; justify-content:space-between;">';
						
							
							$data = array();
							foreach($lesMedicaments as $unMedicament){
								$data[$unMedicament->MED_DEPOTLEGAL] = $unMedicament->MED_NOMCOMMERCIAL;
							}

							//Bloque la saisie si le rapport est finalisé
							if(isset($etat) && strcmp($etat,'finalisé') == 0 ){
								$option = ' disabled';
							} else {
								$option = '';
							}

							echo form_dropdown('medicamentDonne-'.$i, $data, $lesMedicamentsDonnes['medicamentDonne-'.$i], 'style="width:47%;" class="form-control" id="medicamentDonne-1"'.$option);



							$data = array(
								'name' 		=> 'quantiteDonnee-'.$i,
								'id' 		=> 'quantiteDonnee-'.$i,
								'class' 	=> 'form-control qteEchantillons',
								'style'		=> 'width:47%;',
								'min'		=> 0,
								'max'		=> 10,
								'value'		=> $lesMedicamentsDonnes['quantiteDonnee-'.$i]					
							);

							//Bloque la saisie si le rapport est finalisé
							if(isset($etat) && strcmp($etat,'finalisé') == 0 ){
								$data['disabled'] = 'disabled';
							} else {
								$data['type'] = 'number';
								$data['onchange'] = 'verifQte('.$i.')';
							}

							echo form_input ( $data );

						echo '</div>';
					echo'</div>';
					
					if($i==5){
						echo '</div><div id="separation" style="border-left: 1px solid #343a40; width:0;';
						if( strcmp($lesMedicamentsDonnes['medicamentDonne-'.$i],'')==0 && strcmp($lesMedicamentsDonnes['medicamentDonne-'.($i+1)],'')==0){
							echo ' display:none;';
						}
						echo '"></div><div id="echantillonsDroite" style="width:47%;">';
					}

					$i++;
				}
			echo '</div>';
		echo'</div>';
		
		echo '<br/>';
	}

	/*********************** LES ECHANTILLONS ***********************/



	/*********************** LE BILAN ***********************/
	
	echo '<div class="form-group">';
	echo form_error ( 'bilan', '<div class="alert alert-danger">', '</div>' );
	echo form_label ( "Bilan de votre visite :" );
	$data = array(
		'name'	 	=> 'bilan',
		'id'	 	=> 'bilan',
		'style'		=> 'text-align:justify; resize: none;',
		'max'		=> 1000,
		'value'		=> $bilan,
		'onkeyup'	=> 'etatBtn(); messageBtnForm(); incrementCompteurTxtarea();',
	 	'class'		=> 'form-control',
	 	'required'	=> TRUE
	);

	//Bloque la saisie si le rapport est finalisé
	if(isset($etat) && strcmp($etat,'finalisé') == 0 ){
		$data['readonly'] = TRUE;
	}
	

	echo form_textarea( $data );
	echo '<p id="compteur">0 caractère / 1000</p>';
	echo '</div>';

	/*********************** LE BILAN ***********************/



	echo '<br/>';



	/*********************** LA DATE ***********************/

	echo '<div class="form-group">';
	echo form_error ( 'dateVis', '<div class="alert alert-danger">', '</div>' );
	echo form_label ( "Date visite" );
	$data = array(
		'name' 		=> 'dateVis',
	 	'id' 		=> 'dateVis',
	 	'type' 		=> 'date',
	 	'class' 	=> 'form-control',
	 	'value'		=> $dateVis,
	 	'required'	=> TRUE
	);

	//Bloque la saisie si le rapport est finalisé
	if(isset($etat) && strcmp($etat,'finalisé') == 0 ){
		$data['disabled'] = 'true';
	}
	echo form_input ( $data );
	echo '</div>';

	/*********************** LA DATE ***********************/


	echo '<br/>';


	/*********************** L'ID DU RAPPORT ***********************/

	
	$data = array(
		'name' 		=> 'idRapport',
	 	'id' 		=> 'idRapport',
	 	'class' 	=> 'form-control',
	 	'value'		=> $idRapport,
	 	'style'		=> 'display:none',
		'required'	=> TRUE,
		'readonly'	=> TRUE
	);
	echo form_input ( $data );

	/*********************** L'ID DU RAPPORT ***********************/

	


echo '<br/>';



/*********************** LES BOUTONS DE VALIDATION - COLLABORATEUR ***********************/


//Entrée : l'état n'est pas finalisé
//		OU l'état n'est pas spécifié (nouveau rapport)
if( (isset($etat) && strcmp($etat,'finalisé') != 0) || !isset($etat) ){
	
	$message = '';

	if(strcmp($preMedicament,'0')==0){
		$message = 'Vous n\\\'avez pas saisi de médicaments présentés. \n';
	}
	
	if(strcmp($lesMedicamentsDonnes['medicamentDonne-1'],'')==0){
		$message .= 'Vous n\\\'avez pas saisi d\\\'échantillons. \n';
	}

	if(strcmp($message,'')!=0){
		$message = 'return confirm(\''.$message.'\nÊtes-vous sûr(e) de votre saisie ?\');';
	}

	?>

	<div class="form-group">
	<?php 
	$data = array(
		'name' 		=> 'btn_ajoutRapp',
		'value' 	=> 'Finaliser',
		'class' 	=> 'btn btn-primary btn_ajoutRapp',
		'disabled'	=> '!cansubmit',
		'title'		=> 'Veuillez renseigner tous les champs',
		'onclick'	=> $message
	);

	echo form_submit($data);  /* génère une balise input de type submit */ 


	$data = array(
		'name' 		=> 'btn_ajoutRapp',
		'value' 	=> 'Sauvegarder comme brouillon',
		'class' 	=> 'btn btn-secondary btn_ajoutRapp',
		'disabled'	=> '!cansubmit',
		'title'		=> 'Veuillez renseigner tous les champs',
		'onclick'	=> $message
	);

	echo form_submit($data);  /* génère une balise input de type submit */ ?>

	</div>

<?php
/*********************** LES BOUTONS DE VALIDATION - COLLABORATEUR ***********************/

}



echo form_close();  /* form_close() génère une balise </form> */ 


/*********************** BOUTON DE MISE A L'ETAT 'CONSULTE' - DELEGUE ***********************/
	
	if(isset($matriculeCol)){ ?>
		<div class="form-group">
			<button id="btn_mettreEtatConsulter" title="Mettre à l'état 'Consulté par un délégué' et retourner à la liste des rapports" class= "btn btn-primary" onclick="window.location.replace('<?php echo base_url('/index.php/c_rapport_visites/setRapportConsulte/'.$idRapport.'/'.$matriculeCol); ?>');">Mettre à l'état 'Consulté par un délégué' et retourner à la liste des rapports</button>
		</div>
	
	<?php }
/*********************** BOUTON DE MISE A L'ETAT 'CONSULTE' - DELEGUE ***********************/




echo '</div>';
?>

<script type="text/javascript">
	
	dateVis.max = new Date().toISOString().split("T")[0];
	var lesEchantillons = document.getElementsByClassName('qteEchantillons');


	document.getElementById('preRemplacant-oui').onclick = function() {
	    document.getElementById('divRemplacant').style.display = "none";
	    document.getElementById('remplacant').removeAttribute('required');
	}



	document.getElementById('preRemplacant-non').onclick = function() {
	    document.getElementById('divRemplacant').style.display = "block";
	    document.getElementById('remplacant').setAttribute('required','true');
	}



	document.getElementById('motif').onchange = function() {
	    var ddl = document.getElementById("motif");
		var selectedValue = ddl.options[ddl.selectedIndex].value;
		var i = 0;
		var lesBtn = document.getElementsByClassName('btn_ajoutRapp');

		if (selectedValue == "autreMotif"){
			document.getElementById('divSaisiMotif').style.display = "block";
			document.getElementById('saisieMotif').setAttribute('required','true');
			messageBtnForm();
			etatBtn();

		} else {
			document.getElementById('divSaisiMotif').style.display = "none";
			document.getElementById('saisieMotif').removeAttribute('required');
			while(i<lesBtn.length){
				lesBtn[i].removeAttribute('disabled');
				lesBtn[i].removeAttribute('title');
				i++;
			}
		}
	}


	function etatBtn(){
		var title = '';
		var ddl = document.getElementById("motif");
		var selectedValue = ddl.options[ddl.selectedIndex].value;
		var nombreCaractereMotif = document.getElementById('saisieMotif').value.length;
		var nombreCaractereBilan = document.getElementById('bilan').value.length;
		var lesBtn = document.getElementsByClassName('btn_ajoutRapp');
		var i = 0;
		
		if (selectedValue == "autreMotif" && nombreCaractereMotif == 0){
			title = "Veuillez saisir le motif 'autre' !";
		}

		if(nombreCaractereBilan == 0){
			if(title != ""){
				title += "  ";
			}
			title += "Veuillez saisir le bilan de votre visite !"
		}

		if(title == ""){
			while(i<lesBtn.length){
				lesBtn[i].removeAttribute('disabled');
				lesBtn[i].removeAttribute('title');
				i++;
			}			
		} else {
			while(i<lesBtn.length){
				lesBtn[i].title = title;
				lesBtn[i].disabled = "!cansubmit";
				i++;
			}
		}
	}

	function messageBtnForm(){
		
		var message = '';
		var ddl = document.getElementById("motif");
		var selectedValue = ddl.options[ddl.selectedIndex].value;
		var nombreCaractereMotif = document.getElementById('saisieMotif').value.length;	
		var nombreCaractereBilan = document.getElementById('bilan').value.length;	
		var i = 0;
		var lesBtn = document.getElementsByClassName('btn_ajoutRapp');

		if (selectedValue == "autreMotif" && nombreCaractereMotif == 0){
			message = "Veuillez saisir le motif \\\'autre\\\' !\\n";
		}
		
		if(nombreCaractereBilan == 0){
			message += "Veuillez saisir le bilan de votre visite !\\n";
		} 
		
		if( document.getElementById('preMedicament-0').checked ){
			message += "Vous n\\\'avez pas saisi de médicaments présentés.\\n";
		}
		
		if(getQteEchantillons()==0){
			message += "Vous n\\\'avez pas saisi d\\\'échantillons.\\n";
		}

		if(message == ""){
			while(i<lesBtn.length){
				lesBtn[i].removeAttribute('onclick');
				i++;
			}			
		} else {
			while(i<lesBtn.length){
				lesBtn[i].setAttribute('onclick', 'return confirm(\''+message+'\\nÊtes-vous sûr(e) de votre saisie ?\');');
				i++;
			}
		}
	}

	

	function afficherMedicament(nbIteration){
		if(nbIteration==0){

			document.getElementById('medicaments').style.display = "none";
			
			var i = 0;

			i=1;
			while(i<=2){
				document.getElementById('leMedicament'+i).style.display = "none";
				document.getElementById('medicament-'+i).removeAttribute('required');
				i++;
			}

		} else {

			document.getElementById('medicaments').style.display = "flex";
			var i = 1;
			while(i<=nbIteration){
				
				document.getElementById('leMedicament'+i).style.display = "block";
				document.getElementById('medicament-'+i).setAttribute('required','true');
				if (document.getElementById('leMedicament'+(i+1) ) !== null) {
					document.getElementById('leMedicament'+(i+1)).style.display = "none";
					document.getElementById('medicament-'+(i+1)).removeAttribute('required');
				}
				i++;
			}
		}

		messageBtnForm();
	}

	function getQteEchantillons(){
		var i = 0;
		var compteur = 0;
		while ( i < lesEchantillons.length ){
			compteur += parseInt(lesEchantillons[i].value);
			i++;
		}
		return compteur;
	}

	function verifQte(numEchantillon) {
		
		var i = 0;
		var compteur = 0;
		while ( i < lesEchantillons.length ){
			
			compteur += parseInt(lesEchantillons[i].value);
			
			//Si plus de 10 echantillons
			//	=> Afficher un message d'erreur
			//	=> Masquer les champs après
			if(compteur > 10 && i< 9){
				masquerDepuis(numEchantillon+1);
			}
			i++;
		}

		i=0;
		//Ajuste la quantité maximum des champs en fonction du nbr total d'échantillons
		while ( i < lesEchantillons.length){
			lesEchantillons[i].setAttribute("max", parseInt(lesEchantillons[i].value)+(10-compteur));
			i++
		}


		if(compteur > 10){
			document.getElementById('messageEchantillon').innerHTML = "La quantité totale des échantillons ne peut pas excéder 10. Veuillez retirer "+(compteur-10)+" de quantité.";
			document.getElementById('messageEchantillon').style.display = "block";
		} else {
			document.getElementById('messageEchantillon').style.display = "none";
		}


		if(compteur < 10 && numEchantillon < 10 && parseInt(lesEchantillons[numEchantillon-1].value) > 0){
			afficher(numEchantillon+1);
		}

		messageBtnForm();

	}

	function afficher(numEchantillon){
		document.getElementById('echantillon-'+numEchantillon).style.display = "block";
		if(numEchantillon>5){
			document.getElementById('separation').style.display = "block";
		}
	}

	function masquerDepuis(numEchantillon){
		if(numEchantillon<=5){
			document.getElementById('separation').style.display = "none";
		}

		while ( numEchantillon <= lesEchantillons.length ){
			document.getElementById('echantillon-'+numEchantillon).style.display = "none";
			document.getElementById('echantillon-'+numEchantillon).setAttribute('value', '0');
			numEchantillon++;
		}
	}


	function incrementCompteurTxtarea(){
		var compteur = document.getElementById('compteur');

		<?php
		//Masque le compteur de caractère du bilan lorsque le rapport est finalisé
		if(isset($etat) && strcmp($etat,'finalisé') == 0 ){
			echo 'compteur.style.display = "none";';
		} else {
		?>
			var textarea = document.getElementById('bilan');
			var nombreCaractere = textarea.value.length;

			var msg = nombreCaractere + ' caractère'
			if(nombreCaractere>1){
				msg += 's';
			}
			msg += ' / 1000';

			compteur.innerHTML = msg;

			if(nombreCaractere > parseInt(textarea.getAttribute("max"))) {
				compteur.style.color = "red"; 
			} else {
				compteur.style.color = "";
			}
			<?php 
		}
		?>
	}

	incrementCompteurTxtarea();
	etatBtn();
	messageBtnForm();


</script>
<?php $this->load->view('v_footer'); ?>