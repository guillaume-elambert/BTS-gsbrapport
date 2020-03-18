<div id="haut">
	<?php

	echo form_open( '/C_voir_infos/voirInfos/'.$table);
	
	echo '<div class="form-group">';
		echo form_error ( 'lesChoix', '<div class="alert alert-danger">', '</div>' );
		echo form_label ( "Veillez faire votre choix dans la liste ci-dessous" );
		$data = array();
		foreach($lesInfos as $uneInfo){
			if(strcmp(strtoupper($pk),'PRA_NUM')==0){
				$data[$uneInfo[$pk]] = strtoupper($uneInfo[$libelle[0]]).' '.$uneInfo[$libelle[1]];
			} else {
				$data[$uneInfo[$pk]] = $uneInfo[$libelle];
			}
		}
		echo form_dropdown('lesChoix', $data, '', 'class="form-control" id="lesChoix"' );
	echo '</div>';


	echo '<div class="form-group">';
		$data = array(
			'name' => 'btn_ajoutRapp',
			'value' => 'Séléctionner',
			'class' => 'btn btn-primary'
		);
		echo form_submit($data);  /* génère une balise input de type submit */
	echo '</div>';
	
	echo form_close();

	?>
</div>