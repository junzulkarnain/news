<?php 
	$id 		= $_GET['id'];
	$sql_fetch 	= mysqli_query($db,"SELECT foto FROM tbl_artikel WHERE id_artikel='$id'");
	$fetch 		= mysqli_fetch_assoc($sql_fetch);
	$foto		= $fetch['foto'];
	unlink("img/".$foto);

	$sql 		= mysqli_query($db,"DELETE FROM tbl_artikel WHERE id_artikel = '$id'");	

	?>
	<script type="text/javascript">
	alert('Hapus Data Berhasil');
	window.location.href="index.php?page=artikel";
	</script>