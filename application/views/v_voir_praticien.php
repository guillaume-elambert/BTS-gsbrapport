<div id="haut" style="margin-top:5%">
	<?php
	
	echo '<h3 style="text-align:center;">Information sur le praticien '.strtoupper($lePraticien['PRA_NOM']).' '.$lePraticien['PRA_PRENOM'].'</h3><br>';
	
	echo '<div class="form-group">';
	echo form_open('');


		echo '<div style="display:flex; justify-content:space-between">';
			
			echo '<div style="width:47.5%;">';
				echo form_label ( "Prénom :" );	
				$data = array(
					'name' 		=> 'PRA_PRENOM',
				 	'id' 		=> 'PRA_PRENOM',
				 	'class' 	=> 'form-control',
				 	//'disabled'=> 'disabled',
				 	'readonly'	=> 'readonly',
				 	'value'		=> $lePraticien['PRA_PRENOM']
				 );
				echo form_input ( $data );
			echo '</div>';

			echo '<div style="width:47.5%;">';
				echo form_label ( "Nom :" );	
				$data = array(
					'name' 		=> 'PRA_NOM',
				 	'id' 		=> 'PRA_NOM',
				 	'class' 	=> 'form-control',
				 	//'disabled'=> 'disabled',
				 	'readonly'	=> 'readonly',
				 	'value'		=> $lePraticien['PRA_NOM']
				 );
				echo form_input ( $data );
			echo '</div>';

		echo '</div>';


		echo '<br/></$br/>';


		echo form_label ( "Rôle : " );
		$data = array(
			'name' 			=> 'TYP_LIBELLE',
		 	'id' 			=> 'TYP_LIBELLE',
		 	'class' 		=> 'form-control',
			//'disabled'	=> 'disabled',
			'readonly'		=> 'readonly',
		 	'placeholder' 	=> 'Le prix n\'est pas spécifié...',
		 	'value'			=> $lePraticien['TYP_LIBELLE']
		);
		echo form_input ( $data );


		echo '<br/></$br/>';
		

		echo '<div style="display:flex; justify-content:space-between">';
			echo '<div style="width:30%;">';
				echo form_label ( "Adresse : " );	
				$data = array(
					'name' 			=> 'PRA_RUE',
				 	'id' 			=> 'PRA_RUE',
				 	'class' 		=> 'form-control',
				 	//'disabled'	=> 'disabled',
				 	'readonly'		=> 'readonly',
				 	'placeholder' 	=> 'Le prix n\'est pas spécifié...',
				 	'value'			=> $lePraticien['PRA_RUE']
				);
				echo form_input ( $data );
			echo '</div>';


			echo '<div style="width:30%;">';
				echo form_label ( "Ville :" );	
				$data = array(
					'name' 		=> 'PRA_VILLE',
				 	'id' 		=> 'PRA_VILLE',
				 	'class' 	=> 'form-control',
				 	//'disabled'=> 'disabled',
				 	'readonly'	=> 'readonly',
				 	'value'		=> $lePraticien['PRA_VILLE']
				 );
				echo form_input ( $data );
			echo '</div>';


			echo '<div style="width:30%;">';
				echo form_label ( "Code postal:" );	
				$data = array(
					'name' 		=> 'PRA_CP',
				 	'id' 		=> 'PRA_CP',
				 	'class' 	=> 'form-control',
				 	//'disabled'=> 'disabled',
				 	'readonly'	=> 'readonly',
				 	'value'		=> $lePraticien['PRA_CP']
				 );
				echo form_input ( $data );
			echo '</div>';

		echo '</div>';

		


		echo '<br/></$br/>';
		

		echo form_label ( "Coefficient de confiance :" );	
		$data = array(
			'name' 			=> 'COEFFCONFIANCE',
		 	'id' 			=> 'COEFFCONFIANCE',
		 	'class' 		=> 'form-control',
		 	'placeholder'	=> 'Le coefficient de confiance n\'a pas été renseigné...',
			//'disabled'	=> 'disabled',
			'readonly'		=> 'readonly',
		 	'value'			=> $lePraticien['COEFFCONFIANCE']
		 );
		echo form_input ( $data );

	echo '</div>';
	echo form_close();


	?>

</div>