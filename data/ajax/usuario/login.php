<?php
	$user = json_decode(file_get_contents('php://input'));

	require_once '../../model/ClsConexion.php';
	require_once '../../model/ClsUsuario.php';
	require_once '../../bean/BeanUsuario.php';

	$usuario  = new BeanUsuario() ;
	$oUsuario = new ClsUsuario() ;

	$usuario->setUsuario($user->usuario);
	$usuario->setClave($user->clave);

	$data = $oUsuario->login_by_usuario_clave($usuario) ;

	if ( count($data) > 0 && isset($data[0]["id"]) && isset($data[0]["nombres"]) ) {
		$usuario->setId($data[0]["id"]) ;
		$usuario->setNombres($data[0]["nombres"]) ;

		session_start() ;

		$_SESSION['usuario'] = $usuario ;

		print $_SESSION['usuario'] ;
	}