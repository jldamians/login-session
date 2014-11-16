<?php
	// capturamos el formulario enviado
	$user = json_decode(file_get_contents('php://input'));

	// validamos los datos enviados
	if($user->usuario == 'jlds161089' && $user->clave == '123456'){
		session_start();
		$_SESSION['id'] = uniqid('ang_');
		print $_SESSION['id'];
	}