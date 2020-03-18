<?php
$data['titre'] = 'Modification mot de passe';
$this->load->view("v_header",$data);
?>

<div id="formAjout" style="width:50%;margin:auto;">
	<h2 style="text-align:center;">Connexion</h2>
	
	<?php
	
	echo form_open('/c_gestion_utilisateurs/modifierMdp');
	?>
	    <div  class="form-group" style="margin-top:5%;">
			<?php
			
			echo form_error ( 'ancienMdp' );
			echo form_label ( "Mot passe actuel" );
			$data = array(
				'name'		=> 'ancienMdp',
				'id' 		=> 'ancienMdp',
				'type' 		=> 'password',
				'class'		=> 'form-control',
				'required' 	=> TRUE
			);
			echo form_input ( $data );

			echo '<br/>';

			echo form_error ( 'nouvMdp' );
			echo form_label ( "Nouveau mot de passe" );
			$data = array(
				'name' 			=> 'nouvMdp',
				'id' 			=> 'nouvMdp',
				'type' 			=> 'password',
				'class'			=> 'form-control',
				'minlength '	=> '8',
				'required' 		=> TRUE
			);
			echo form_input ( $data );

			echo '<br/>';

			echo form_error ( 'repNouvMdp' );
			echo form_label ( "Ressaisissez votre nouveau mot de passe" );
			$data = array(
				'name' 			=> 'repNouvMdp',
				'id' 			=> 'repNouvMdp',
				'type' 			=> 'password',
				'class'			=> 'form-control',
				'minlength '	=> '8',
				'required' 		=> TRUE
			);
			echo form_input ( $data );
			?>
		</div>
		
		<br/>

		<div class="form-group">
			<?php
				$data = array(
					'name' => 'btn_connexion',
					'value' => 'Modifier mon mot de passe',
					'class' => 'btn btn-primary'
				);
				echo form_submit($data); ?>
		</div>
	<?php echo form_close(); ?>
</div>