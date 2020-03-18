<div id="haut" style="margin-top:5%">
	<?php
	

	echo '<h3 style="text-align:center;">Information sur le médicament '.$leMedicament['MED_NOMCOMMERCIAL'].'</h3><br>';
	
	echo '<div class="form-group">';
	echo form_open('');



		echo form_label ( "Dépot légal du médicament :" );	
		$data = array(
			'name' 		=> 'MED_DEPOTLEGAL',
		 	'id' 		=> 'MED_DEPOTLEGAL',
		 	'class' 	=> 'form-control',
          	//'disabled'=> 'disabled',
			'readonly'	=> 'readonly',
		 	'value'		=> $leMedicament['MED_DEPOTLEGAL']
		 );
		echo form_input ( $data );


		echo '<br/></$br/>';


		echo form_label ( "Famille du médicament :" );	
		$data = array(
			'name' 		=> 'FAM_LIBELLE',
		 	'id' 		=> 'FAM_LIBELLE',
		 	'class' 	=> 'form-control',
          	//'disabled'=> 'disabled',
			'readonly'	=> 'readonly',
		 	'value'		=> $leMedicament['FAM_LIBELLE']
		 );
		echo form_input ( $data );


		echo '<br/></$br/>';
		

		echo form_label ( "Prix d'un echantillon : " );	
		$data = array(
			'name' 			=> 'MED_PRIXECHANTILLON',
		 	'id' 			=> 'MED_PRIXECHANTILLON',
		 	'class' 		=> 'form-control',
          	//'disabled'	=> 'disabled',
			'readonly'		=> 'readonly',
		 	'placeholder' 	=> 'Le prix n\'est pas spécifié...',
		 	'value'			=> $leMedicament['MED_PRIXECHANTILLON']
		 );
		echo form_input ( $data );


		echo '<br/></$br/>';
		

		echo form_label ( "Composition du médicament :" );	
		$data = array(
			'name' 		=> 'MED_COMPOSITION',
		 	'id' 		=> 'MED_COMPOSITION',
		 	'class' 	=> 'form-control',
          	//'disabled'=> 'disabled',
			'readonly'	=> 'readonly',
		 	'value'		=> $leMedicament['MED_COMPOSITION']
		 );
		echo form_input ( $data );


		echo '<br/></$br/>';
		

		echo form_label ( "Les effets de ce médicament :" );
		$data = array(
			'name'	 	=> 'MED_EFFETS',
		 	'id'	 	=> 'MED_EFFETS',
		 	'value'		=> $leMedicament['MED_EFFETS'],
		 	'class'		=> 'form-control',
          	//'disabled'=> 'disabled',
			'readonly'	=> 'readonly',
		);
		echo form_textarea( $data );


		echo '<br/></$br/>';
		

		echo form_label ( "Les contreindications pour ce médicament :" );
		$data = array(
			'name'	 	=> 'MED_CONTREINDIC',
		 	'id'	 	=> 'MED_CONTREINDIC',
		 	'value'		=> $leMedicament['MED_CONTREINDIC'],
		 	'class'		=> 'form-control',
          	//'disabled'=> 'disabled',
			'readonly'	=> 'readonly',
		);
		echo form_textarea( $data );

	echo '</div>';
	echo form_close();

	?>
	
</div>