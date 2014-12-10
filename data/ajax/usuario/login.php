<?php
	$input = json_decode(file_get_contents('php://input'));

	require_once '../../model/ClsConexion.php';
	require_once '../../model/ClsUsuario.php';
	require_once '../../bean/BeanUsuario.php';

	$usuario  = new BeanUsuario() ;
	$oUsuario = new ClsUsuario() ;

	$usuario->setUsuario($input->usuario);
	$usuario->setClave(md5($input->clave));

	$data = $oUsuario->login_by_usuario_clave($usuario) ;

	if ( count($data) > 0 ) {
		$usuario->setId($data[0]["id"]) ;
		$usuario->setDni($data[0]["dni"]) ;
		$usuario->setCorreo($data[0]["correo"]) ;
		$usuario->setNombres($data[0]["nombres"]) ;
		$usuario->setProfesion($data[0]["profesion"]) ;

		session_start() ;

		$_SESSION['usuario'] = $usuario ;

		print $_SESSION['usuario'] ;
	}