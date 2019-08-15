<?php
	session_start();
	if(session_destroy()){
		
		?>
			<script>
				alert('Logout Success');
				window.location.href="login.php";
			</script>
		<?php
	}
?>