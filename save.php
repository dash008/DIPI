<?php 
	session_start();
  	include('acceso_db.php');
	$name = ($_POST['filename']);
	$data =($_POST['data']);
	$username =$_SESSION['username'];
    $id = $_SESSION['id'];
	file_put_contents($name, base64_decode($_POST['data']));
	//echo($name);

	$save_img = "INSERT INTO creations (imagen, id_creador_original) 
                        VALUES ('".$data."', '".$id."')";
    $queryReg = $conn->query($save_img);

?>