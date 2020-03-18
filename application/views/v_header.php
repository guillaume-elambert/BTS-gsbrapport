<?php setlocale (LC_TIME, 'fr_FR'); ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>GSB: Compte-rendu<?php if(isset($titre)){ echo ' | '.$titre; } ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="<?php echo base_url('css/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet"/>
		<link href="<?php echo base_url('css/bootstrap-glyphicons/css/bootstrap-glyphicons.min.css'); ?>" rel="stylesheet"/>
		<link href="<?php echo base_url('css/style.css');?>" rel="stylesheet"/>

	</head>


	<body style="background-color: white; color: #5599EE;">

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="laBarreDeNavig">

			<a class="nav-link navbar-brand" href="<?php echo base_url(''); ?>">
		    	<img src="<?php echo base_url('img/logo.png'); ?>" style="width:5em; height:auto;" class="d-inline-block align-top" alt="">
		    </a>

		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#barreNavig" aria-controls="barreNavig" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="barreNavig">
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="menuInfos" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				        	Voir les informations de...
				        </a>

						<div class="dropdown-menu" aria-labelledby="menuInfos">
					        <a class="dropdown-item" title="Voir les informations d'un praticien" href="<?php echo site_url('/c_voir_infos/voirInfos/PRATICIEN')?>">Praticien</a>
					        <a class="dropdown-item" title="Voir les informations d'un médicament" href="<?php echo site_url('/c_voir_infos/voirInfos/MEDICAMENT')?>">Medicament</a>
				        </div>
				    </li>

					<!--li class="nav-item">
						<a class="nav-link" href="" title="VoirPraticien">Voir les informations d'un praticien</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('/c_voir_infos/voirInfos/MEDICAMENT')?>" title="VoirMedicament">Voir les informations d'un medicament</a>
					</li-->

					<?php
						if(isset($this->session->matricule)){ ?>
							<?php if(isset($this->session->codeReg) && strcmp($this->session->libTypCol,'Délégué')==0){ ?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo site_url('/c_rapport_visites/rapportsMaRegion/')?>" title="Voir l'ensemble des rapports de ma région">Les nouveaux rapports de ma région</a>
								</li>
							<?php } ?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('/c_rapport_visites/mesRapports/')?>" title="Voir l'ensemble de mes rapports de visite">Mes rapports</a>
							</li>


							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('/c_rapport_visites/saisieRapport/')?>" title="Saisir un nouveau rapport de visite">Saisie d'un rapport</a>
							</li>
							
					<?php } ?>
				</ul>

				<ul class="navbar-nav ml-auto">

						<?php
						if(isset($this->session->matricule)){ 
							?>
							
							<li class="nav-item dropdown">

								<a class="nav-link dropdown-toggle" id="menuUser" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php echo strtoupper($this->session->nom).' '.$this->session->prenom.' ('.$this->session->libTypCol;
									
									if(isset($this->session->libReg) && strcmp($this->session->libReg,'')!=0){
										echo ' - '.$this->session->libReg;
									}
									echo ')';
									?>
						        </a>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuUser">
									<a class="dropdown-item" href="<?php echo site_url('/c_gestion_utilisateurs/modifierMdp/');?>">Modifier mon mot de passe</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo site_url('/c_gestion_utilisateurs/deconnexion/');?>" onclick='return confirm("Voulez-vous vraiment vous deconnecter ?");'>Se déconnecter</a>
								</div>
							</li>
						<?php } else {?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('/c_gestion_utilisateurs/pageConnexion/');?>" title="Connexion"> Se connecter</a>
							</li>
						<?php } ?>
				</ul>
			</div>
		</nav>

	<?php
		
		if(!is_null($this->session->tempdata('etat')) && !is_null($this->session->tempdata('message'))){
			switch ($this->session->tempdata('etat')) {
				case 'succes' :
					$etat = 'success';
				break;

				case 'erreur' :
					$etat = 'danger';
				break;

				default :
					$etat = 'warning';
				break;
			}


			?>
			<div style="width:95%; margin:auto; margin-top:2%;" class="alert alert-<?php echo $etat ?>" role="alert">
			  <?php echo $this->session->tempdata('message'); ?>
			</div>

			<?php

			$this->session->unset_tempdata('etat');
			$this->session->unset_tempdata('message');
		}


		echo '<div id="conteneur" style="width:85%;margin:auto; margin-top:2%;">';