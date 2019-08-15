<?php
	$id 	= $_GET['id'];
	mysqli_query($db, "DELETE FROM tbl_user WHERE id_user='$id'");

?>
	<script type="text/javascript">
        alert('Hapus Data Berhasil');
        window.location.href="index.php?page=user";
    </script>