<?php
$data['titre'] = 'Connexion';
$this->load->view("v_header",$data);
?>

<div id="formAjout" style="width:50%;margin:auto;">
	<h2 style="text-align:center;">Connexion</h2>
	
	<?php
	/* form_open() génère la balise <form> avec attribut action renseigné par le paramètre */
	echo form_open('/c_gestion_utilisateurs/connexion');
	?>
	    <div  class="form-group" style="margin-top:8%;">
			<?php
			/* form_error() permet d'afficher l'erreur de validation du champ passé en paramètre, ici juste avant la zone de saisie */
			echo form_error ( 'matricule' );
			echo form_label ( "Matricule" ); /* form_label() génère une balise label */
			$data = array(                    /* $data contient les paramètres nécessaires */
				'name'		=> 'matricule',           /* pour la balise input  */
				'id' 		=> 'matricule',
				'maxlength' => '10',
				'class'		=> 'form-control',
				'value'		=> $matricule,
				'required' 	=> TRUE
			);
			echo form_input ( $data ); /* génère une balise input de type text à l'aide du contenu de $data */

			echo '<br/>';

			echo form_error ( 'mdp' );
			echo form_label ( "Mot de passe" ); /* form_label() génère une balise label */
			$data = array(                    /* $data contient les paramètres nécessaires */
				'name' 		=> 'mdp',           /* pour la balise input  */
				'id' 		=> 'mdp',
				'type' 		=> 'password',
				'class'		=> 'form-control',
				'required' 	=> TRUE
			);
			echo form_input ( $data ); /* génère une balise input de type text à l'aide du contenu de $data */
			?>
		</div>
		
		<br/>

		<div class="form-group">
			<?php
				$data = array(
					'name' => 'btn_connexion',
					'value' => 'Connexion',
					'class' => 'btn btn-primary'
				);
				echo form_submit($data);  /* génère une balise input de type submit */ ?>
		</div>
	<?php echo form_close();  /* form_close() génère une balise </form> */ ?>
</div>