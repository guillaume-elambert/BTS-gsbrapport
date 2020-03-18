	<?php $this->load->view('v_header');
	
	if (isset($liste) && !empty($liste)){ 
		
		echo '<h3 style="text-align:center;">';
		
		//DEFINITION CONTENU TITRE PAGE
		//Entrée : la personne est un délégué
		if (isset($affichageDelegue) && strcmp($this->session->libTypCol,'Délégué')==0){
			
			//Le délégué n'a pas de région
			if(strcmp($this->session->libReg,'')==0){
				$titre = 'Voir les rapports de ma région';
			} else if(!empty($this->input->post())){
				
				//Entrée : le délégué a fait une recherche sur le visiteur
				if($this->input->post('visiteur') != 'aucun'){
					$titre = 'Voir les rapports de '.strtoupper($liste[0]->COL_NOM).' '.$liste[0]->COL_PRENOM;			
				} else {
					$titre = 'Voir les rapports de la région '.$this->session->libReg;
				}

			} else {
				$titre = 'Voir les rapports de la région '.$this->session->libReg;
			}			
		} else {
			
			if($this->input->post('praticien') != 'aucun' && isset($this->session->praticien)){
				$titre = 'Voir mes visites concernant le praticien '.$this->session->praticien;			
			} else {
				$titre = 'Voir mes rapports de visite';
			}
			
		}
		
		
		if(!empty($this->input->post())){
			if($this->input->post('dateDebut') != '' && $this->input->post('dateFin') != ''){
				$titre .= ' du '.utf8_encode(strftime('%e %b %Y ',strtotime($this->input->post('dateDebut')))).' au '.utf8_encode(strftime('%e %b %Y ',strtotime($this->input->post('dateFin'))));
			}
		}

		echo $titre;
		?>
		</h3>
		<br/>
		
		
		<?php
		if(isset($lesVisiteurs) && !empty($lesVisiteurs)){
			$data['lesVisiteurs'] = $lesVisiteurs;
			// $data['affichageDelegue'] = TRUE;
			$this->load->view('v_formRechercheRapport',$lesVisiteurs);
		} else {
			$this->load->view('v_formRechercheRapport');
		}
		?>
		
		
		<div class="table-responsive">
			<table class="table table-hover" style="text-align:center; border: 2px solid #343a40;">

				<thead class="thead-dark">
					<tr>
						<th scope="col">Action</th>
						<?php
							if (isset($affichageDelegue) && strcmp($this->session->libTypCol,'Délégué')==0){
								echo '<th scope="col">Auteur</th>';
								echo '<th scope="col">N° rapport collab.</th>';
							}
						?>

						<th scope="col">Date de la visite</th>
						<th scope="col">Praticien</th>
						<th scope="col">Remplaçant</th>
						<th scope="col">Motif de la visite</th>
						<th scope="col" colspan="2">Médicamments présentés</th>
						<th scope="col">Bilan de la visite</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($liste as $item) : ?>
					<tr>
						<td>
							<?php 
							$lien = base_url('index.php/c_rapport_visites/voirRapport/'.$item->VIS_NUM);
							if(strcmp($item->ETAT_RAPPORT,'finalisé') == 0){
								if (isset($affichageDelegue) && strcmp($this->session->libTypCol,'Délégué')==0){
									$lien .= '/'.$item->COL_MATRICULE;
								}
							?>

								<a title="Voir le rapport de visite" href="<?php echo $lien; ?>" class="glyphicon glyphicon-eye-open" aria-hidden="true" ></a>
							<?php }
							else { ?>
								<a title="Modifier le rapport de visite" href="<?php echo $lien; ?>" class=" glyphicon glyphicon-pencil" aria-hidden="true" ></a>
							<?php } ?>
						</td>
								
						<?php
							if (isset($affichageDelegue) && strcmp($this->session->libTypCol,'Délégué')==0){ ?>
								<td><?php echo strtoupper($item->COL_NOM).' '.$item->COL_PRENOM; ?></td>
								<td><?php echo $item->VIS_NUM; ?></td>
							<?php }
						?>
						<td><?php echo utf8_encode(strftime('%e %b %Y ',strtotime($item->VIS_DATE))); ?></td>
						<td><a title="Voir les informations du praticien" href="#" onclick="voirInfos('praticien',<?php echo $item->PRA_NUM?>); return false;"><?php echo strtoupper($item->PRA_NOM).' '.$item->PRA_PRENOM; ?></a></td><?php

						if(isset($item->REMPLACANTS)){
							$leRemp = $this->M_rapport_visites->getRemplacant($this->session->matricule,$item->VIS_NUM)[0]; ?>
							<td><a title="Voir les informations du praticien" href="#" role="button" onclick="voirInfos('praticien',<?php echo $leRemp->rempNumero;?>);"><?php echo strtoupper($leRemp->rempNom).' '.$leRemp->rempPrenom; ?></a></td><?php
						} else {
							echo '<td></td>';
						}
						?>

						<?php 
						echo '<td>';
							if(isset($item->ID_MOTIF)){
								echo $this->M_rapport_visites->getMotif($item->ID_MOTIF)[0]->LIB_MOTIF;
							} else if(isset($item->AUTRE_MOTIF)){
								echo $item->AUTRE_MOTIF;
							}
						echo '</td>';

						
						echo '<td>';
							if(!is_null($item->MED_PRESENTE1) && !is_null($this->M_rapport_visites->getUnMedicament($item->MED_PRESENTE1))){
								echo '<a title="Voir les informations du médicament" href="#" onclick="voirInfos(\'medicament\',\''.$item->MED_PRESENTE1.'\'); return false;">'.$this->M_rapport_visites->getUnMedicament($item->MED_PRESENTE1)[0]->MED_NOMCOMMERCIAL.'<br/>('.$item->MED_PRESENTE1.')</a>';
							}
						echo '</td><td>';
							if(!is_null($item->MED_PRESENTE2) && !is_null($this->M_rapport_visites->getUnMedicament($item->MED_PRESENTE2))){
								echo '<a title="Voir les informations du médicament" href="#" onclick="voirInfos(\'medicament\',\''.$item->MED_PRESENTE2.'\'); return false;">'.$this->M_rapport_visites->getUnMedicament($item->MED_PRESENTE2)[0]->MED_NOMCOMMERCIAL.'<br/>('.$item->MED_PRESENTE2.')</a>';
							}
						echo '</td>';
						
						?>

						<td style="text-align:justify; max-width: 50em;"><?php echo nl2br($item->VIS_BILAN); ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>

			</table>
		</div>

	<?php
	} else {
		if (isset($affichageDelegue) && strcmp($this->session->libTypCol,'Délégué')==0){
			if(!empty($this->input->post())){
				
				//Entrée : le délégué a fait une recherche sur le visiteur
				if($this->input->post('visiteur') != 'aucun' && isset($this->session->visiteur)){
					$message = 'Aucun nouveau rapport de visite de '.$this->session->visiteur;
					
					//Entrée : le délégué à fait une recherche sur la date
					if($this->input->post('dateDebut') != '' && $this->input->post('dateFin') != ''){
						$message .= ' du '.utf8_encode(strftime('%e %b %Y ',strtotime($this->input->post('dateDebut')))).' au '.utf8_encode(strftime('%e %b %Y ',strtotime($this->input->post('dateFin'))));
					}

				} else if($this->input->post('dateDebut') != '' && $this->input->post('dateFin') != ''){
					$message .= ' du '.utf8_encode(strftime('%e %b %Y ',strtotime($this->input->post('dateDebut')))).' au '.utf8_encode(strftime('%e %b %Y ',strtotime($this->input->post('dateFin'))));
				
				} else {
					$message = 'Veuillez saisir correctement les informations du formulaire de recherche';
				}

				//Entrée : le délégué à fait une recherche sur la date
				if($this->input->post('dateDebut') != '' && $this->input->post('dateFin') != ''){
					$message .= ' du '.utf8_encode(strftime('%e %b %Y ',strtotime($this->input->post('dateDebut')))).' au '.utf8_encode(strftime('%e %b %Y ',strtotime($this->input->post('dateFin'))));
				}

				$this->session->set_tempdata(array('etat'=>'erreur','message'=> $message));
				redirect(base_url('index.php/c_rapport_visites/rapportsMaRegion/'));
			} else {
				$message = 'Aucun nouveau rapport de visite dans la région '.$this->session->libReg;
			}

		} else {
			
			if(!empty($this->input->post())){
				$message = 'Vous n\'avez effectué aucune visite';

				//Entrée : le délégué a fait une recherche sur le praticien
				if($this->input->post('praticien') != 'aucun' && isset($this->session->praticien)){
					$message .= ' concernant le praticien '.$this->session->praticien;
					
					//Entrée : le délégué à fait une recherche sur la date
					if($this->input->post('dateDebut') != '' && $this->input->post('dateFin') != ''){
						$message .= ' du '.utf8_encode(strftime('%e %b %Y ',strtotime($this->input->post('dateDebut')))).' au '.utf8_encode(strftime('%e %b %Y ',strtotime($this->input->post('dateFin'))));
					}
					
				} else if($this->input->post('dateDebut') != '' && $this->input->post('dateFin') != ''){
					$message .= ' du '.utf8_encode(strftime('%e %b %Y ',strtotime($this->input->post('dateDebut')))).' au '.utf8_encode(strftime('%e %b %Y ',strtotime($this->input->post('dateFin'))));
				} else {
					$message = 'Veuillez saisir correctement les informations du formulaire de recherche';
				}

				

				$this->session->set_tempdata(array('etat'=>'erreur','message'=> $message));
				redirect(base_url('index.php/c_rapport_visites/mesRapports/'));
			
			} else {
				$message = 'Vous n\'avez effectué aucune visite.';
			}
			
		}

		$this->session->set_tempdata(array('etat'=>'erreur','message'=> $message));
		redirect(base_url());
	} ?>

	<script type="text/javascript">
    	var width  = 500;
        var height = 550;
		
		function voirInfos(table, id){
			<?php 
			echo 'window.open(\''.base_url('index.php/c_voir_infos/redirectVoirInfos/').'\'+table+\'/\'+id+\'/POP-UP/\', \'Infos. \'+table+\'\', \'height=\'+height+\', width=\'+width+\', top=\'+( (window.innerHeight - height ) /2 )+\', left=\'+( (window.innerWidth - width ) /2 )+\', toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=yes, status=no\');';
			?>
		}
	</script>

	<?php
	$this->load->view('v_footer');
	?>