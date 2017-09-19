<?php 

	unset($_SESSION['user']);

	echo "<script>
		history.go(-1);
	</script>";
 ?>