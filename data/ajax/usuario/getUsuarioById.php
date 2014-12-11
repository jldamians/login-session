<?php
	header('content-type: application/json; charset=utf-8');

	require_once '../../model/ClsConexion.php';
	require_once '../../model/ClsUsuario.php';
	require_once '../../bean/BeanUsuario.php';

	try {
		// generar los objetos

		$usuario  = new BeanUsuario() ;
		$oUsuario = new ClsUsuario() ;

		// realizar la consulta

		$usuario->setId($_GET['id']) ;
		$data = $oUsuario->get_by_codigo($usuario) ;

		// realizar las validaciones

		if ( count($data) > 0 ) {
	        $res = array('msg' => 'Se encontraron registros', 'error' => false, 'data' => $data);
	        $jsn = json_encode($res);
	        print_r($jsn);
		}
		else{
		    $res = array('msg' => 'No se encontraron registros', 'error' => true, 'data' => array());
		    $jsn = json_encode($res);
		    print_r($jsn);
		}
	}
	catch (Exception $e) {
	    $res = array('msg' => $e->getMessage(), 'error' => true, 'data' => array());
	    $jsn = json_encode($res);
	    print_r($jsn);
	}