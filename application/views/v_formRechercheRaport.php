<?php
echo form_open(base_url('/index.php/c_rapport_visites/mesRapports/'));
    
    /*********************** LE PRATICIEN ***********************/
        
    echo form_error ( 'Praticien', '<div class="alert alert-danger">', '</div>' );
    echo form_label ( "Praticien :" );
    echo '<div class="form-group" style="display:flex; justify-content:space-between">';

    $data = array();

    foreach($lesPraticiens as $unPraticien){
        $data[$unPraticien->PRA_NUM] = strtoupper($unPraticien->PRA_NOM)." ".$unPraticien->PRA_PRENOM;
	}
        
    echo form_dropdown('praticien', $data, 'id="praticien" class="form-control" required style="width : 85%;"');

    /*********************** LE PRATICIEN ***********************/


    /*********************** LA DATE DEBUT ***********************/

	echo '<div class="form-group">';
	echo form_error ( 'dateDebut', '<div class="alert alert-danger">', '</div>' );
	echo form_label ( "Date de début" );
	$data = array(
		'name' 		=> 'dateDebut',
	 	'id' 		=> 'dateDebut',
	 	'type' 		=> 'date',
	 	'class' 	=> 'form-control'
    );
    
	echo form_input ( $data );
	echo '</div>';

    /*********************** LA DATE DEBUT ***********************/
    


    /*********************** LA DATE FIN ***********************/

	echo '<div class="form-group">';
	echo form_error ( 'dateFin', '<div class="alert alert-danger">', '</div>' );
	echo form_label ( "Date de fin" );
	$data = array(
		'name' 		=> 'dateFin',
	 	'id' 		=> 'dateFin',
	 	'type' 		=> 'date',
	 	'class' 	=> 'form-control'
	);

	echo form_input ( $data );
	echo '</div>';

	/*********************** LA DATE FIN ***********************/

echo form_close();
?>