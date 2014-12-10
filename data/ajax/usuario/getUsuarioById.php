<?php
	header('content-type: application/json; charset=utf-8');

	require_once '../../model/ClsConexion.php';
	require_once '../../model/ClsUsuario.php';
	require_once '../../bean/BeanUsuario.php';

	$usuario  = new BeanUsuario() ;
	$oUsuario = new ClsUsuario() ;

	$usuario->setId($_GET['id']) ;
	$array = $oUsuario->get_by_codigo($usuario) ;

	$jsonp = json_encode($array);

	echo $jsonp;