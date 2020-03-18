		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>

		
		<script type="text/javascript">
			<?php
			if(!is_null($this->session->tempdata('popUp'))){ ?>
				document.getElementById('laBarreDeNavig').style.display = 'none';
				function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
				$(document).on("keydown", disableF5);
			<?php }	?>

			autosize($('textarea'));
			
		</script>

	</body>
</html>