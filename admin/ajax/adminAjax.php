<?php 
//Login
if (isset($_POST['login_admin'])) {
//	$_POST['pass'] = isset($_POST['pass'])? $_POST['pass'] : 'admin123';
//    $_POST['pass'] = sha1($_POST['pass']);
	$result = user::login($_POST['mail'], $_POST['pass']);
	if (!empty($result)) {
		$_SESSION['user'] = $result[0]['username'];
		$_SESSION['rol'] = $result[0]['role'];
		$_SESSION['iduser'] = $result[0]['iduser'];

		echo json_encode($result);
	}else{
		echo 0;
	}
}
?>