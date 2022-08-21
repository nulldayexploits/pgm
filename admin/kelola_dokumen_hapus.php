<?php


  include('config/connect-db.php');
  include('config/base-url.php');  

	 
	  $id = $_GET['id'];

    $delete = mysqli_query($mysqli, "DELETE FROM tdokumen WHERE id = '$id' ");

	if($delete){		 
     echo '<script language="javascript"> alert("Berhasil Hapus Data!"); window.location.href = "'.$base_url_back.'/kelola_dokumen.php" </script>';
    }else{
    	echo mysqli_error($mysqli);
    }

	

?>
