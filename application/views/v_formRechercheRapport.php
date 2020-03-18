<?php

echo '<br/><br/>';


echo '<div id="recherche">';

	if(isset($affichageDelegue) && $affichageDelegue == TRUE){
		$lien = base_url('/index.php/c_rapport_visites/rapportsMaRegion/');
	} else {
		$lien = base_url('/index.php/c_rapport_visites/mesRapports/');
	}

	echo form_open($lien,'id="formRecherche"');
		
	
		echo '<div id="messageRecherche" class="alert alert-danger" style="display:none;"></div>';
		
		
		

			echo '<div id="champsRecherches" style="display:flex; justify-content:space-between;">';

				echo '<div id="formRechercheGauche" style="width:47%;">';
			
					if(isset($lesVisiteurs) && !is_null($lesVisiteurs)){

						/*********************** LE VISITEUR ***********************/
						
						echo '<div class="form-group">';
							echo '<h5 style="margin-bottom:1.5rem;">Recherche par visiteur</h5>';
							echo form_error ( 'Visiteur', '<div class="alert alert-danger">', '</div>' );
							$data = array();
							$data['aucun'] = '--- Choisir un visiteur ---';
							foreach($lesVisiteurs as $unVisiteur){
								$data[$unVisiteur->COL_MATRICULE] = strtoupper($unVisiteur->COL_NOM)." ".$unVisiteur->COL_PRENOM;
							}

							if(!empty($this->input->post())){
								$leVisiteur = $this->input->post('visiteur');
							} else {
								$leVisiteur = 'aucun';
							}

							echo form_dropdown('visiteur', $data, $leVisiteur, 'onchange="verifChamps();" id="visiteur" class="form-control recherche-select"');
						
						echo '</div>';
						
						/*********************** LE VISITEUR ***********************/

					}



					if(isset($lesPraticiensCol) && !is_null($lesPraticiensCol)){

						/*********************** LE PRATICIEN ***********************/
						
						echo '<div class="form-group">';
							echo '<h5 style="margin-bottom:1.5rem;">Recherche par praticien</h5>';
							echo form_error ( 'Praticien', '<div class="alert alert-danger">', '</div>' );
							$data = array();
							$data['aucun'] = '--- Choisir un praticien ---';
							foreach($lesPraticiensCol as $unPraticien){
								$data[$unPraticien->PRA_NUM] = strtoupper($unPraticien->PRA_NOM)." ".$unPraticien->PRA_PRENOM;
							}

							if(!empty($this->input->post())){
								$unPraticien = $this->input->post('praticien');
							} else {
								$unPraticien = 'aucun';
							}

							echo form_dropdown('praticien', $data, $unPraticien, 'onchange="verifChamps();" id="praticien" class="form-control recherche-select"');
						
						echo '</div>';
						
						/*********************** LE PRATICIEN ***********************/

					}


				echo '</div>';


				echo'<div id="formRechercheDroite" style="width:47%;">';
		

				
				
				echo '<div id="lesDatesRecherche" style="margin-bottom: 1rem;">';
					
					echo '<h5 style="margin-bottom:1.5rem;">Recherche par date</h5>';
					
					echo '<div style="display:flex; justify-content:space-between;">';

						/*********************** LA DATE DEBUT ***********************/

						echo '<div id="rechercheDateDebut" style="width:47%; display:flex; justify-content:space-between;">';
							echo '<p style="margin:auto; margin-right:5%; margin-left:0;">Du </p>';	
							echo '<div class="form-group" style="margin:0; width:100%;">';
								
								echo form_error ( 'dateDebut', '<div class="alert alert-danger">', '</div>' );
								$data = array(
									'name' 		=> 'dateDebut',
									'id' 		=> 'dateDebut',
									'type' 		=> 'date',
									'onchange'	=> 'verifDates(this);',
									'onkeyup'	=> 'verifDates(this);',
									'class' 	=> 'form-control'
								);

								if(!empty($this->input->post())){
									$data['value'] = $this->input->post('dateDebut');
								} else {
									$data['value'] = '';
								}
								
								echo form_input ( $data );

							echo '</div>';
						echo'</div>';

						/*********************** LA DATE DEBUT ***********************/



						
						/*********************** LA DATE FIN ***********************/

						echo '<div id="rechercheDateFin" style="width:47%; display:flex; justify-content:space-between;">';
							echo '<p style="margin:auto; margin-right:5%; margin-left:0;">Au </p>';
							echo '<div class="form-group" style="margin:0; width:100%;">';
								
								echo form_error ( 'dateFin', '<div class="alert alert-danger">', '</div>' );
								$data = array(
									'name' 		=> 'dateFin',
									'id' 		=> 'dateFin',
									'type' 		=> 'date',
									'onchange'	=> 'verifDates(this);',
									'onkeyup'	=> 'verifDates(this);',
									'class' 	=> 'form-control'
								);

								if(!empty($this->input->post())){
									$data['value'] = $this->input->post('dateFin');
								} else {
									$data['value'] = '';
								}
								

								echo form_input ( $data );
							echo '</div>';
						echo '</div>';

						/*********************** LA DATE FIN ***********************/
					
					echo '</div>';
				
				echo '</div>';

		//if(isset($lesVisiteurs) && !is_null($lesVisiteurs)){
			echo '</div>';

		echo '</div>';
		//}


		/*********************** LE BOUTON DE VALIDATION ***********************/

		echo '<div class="form-group">';
			$data = array(
				'id'		=> 'btnRecherche',
				'name' 		=> 'btnRecherche',
				'value' 	=> 'Rechercher',
				'class' 	=> 'btn btn-primary',
				'title'		=> 'Veuillez renseigner les champs de recherche',
				'disabled'	=> '!cansubmit'
			);

			echo form_submit($data);  /* génère une balise input de type submit */
		echo '</div>';

		/*********************** LE BOUTON DE VALIDATION ***********************/



		
	echo form_close();

echo '</div>';


echo '<br/>';

?>

<script type="text/javascript">

	dateDebut.max = new Date().toISOString().split("T")[0];
	dateFin.max = new Date().toISOString().split("T")[0];

	function verifDates(){
		var dateDebut = document.getElementById('dateDebut');
		var dateFin = document.getElementById('dateFin');
		var leBouton = document.getElementById('btnRecherche');
		var msgRecherche = document.getElementById('messageRecherche');

		if(dateDebut.value > dateFin.value){
			msgRecherche.innerHTML = "La date de début doit être inférieure ou égale à la date de fin.";
			msgRecherche.style.display = 'block';
			if(verifChamps()){
				leBouton.disabled = '!cansubmit';
				leBouton.title = "La date de début doit être inférieure ou égale à la date de fin.";
			}
		} else {
			leBouton.removeAttribute('disabled');
			leBouton.removeAttribute('title');
			msgRecherche.innerHTML = "";
			msgRecherche.style.display = 'none';
		}
	}

	function verifChamps(){
		var ddl = document.getElementsByClassName("recherche-select")[0];
		var selectedValue = ddl.options[ddl.selectedIndex].value;
		var dateDebut = document.getElementById('dateDebut');
		var dateFin = document.getElementById('dateFin');
		var leBouton = document.getElementById('btnRecherche');
		var exec;
		
		if (selectedValue == 'aucun' && ( dateDebut.value == '' || dateFin.value == '' ) ){
			leBouton.disabled = '!cansubmit';
			leBouton.title = 'Veuillez renseigner les champs de recherche';
			exec = false;
		} else {
			leBouton.removeAttribute('disabled');
			leBouton.removeAttribute('title');
			exec = true;
		}

		return exec;
	}

</script>