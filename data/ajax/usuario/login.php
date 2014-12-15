<?php
	// capturar los datos enviados por "POST"

	$input = json_decode(file_get_contents('php://input'));

	// requerir los archivos del "BEAN" y "MODEL"

	require_once '../../model/ClsConexion.php';
	require_once '../../model/ClsUsuario.php';
	require_once '../../bean/BeanUsuario.php';

	try {
		// generar los objetos

		$usuario  = new BeanUsuario() ;
		$oUsuario = new ClsUsuario() ;

		// realizar la consulta

		$usuario->setUsuario($input->usuario);
		$usuario->setClave(md5($input->clave));
		$data = $oUsuario->login_by_usuario_clave($usuario) ;

		// realizar las validaciones

		if ( count($data) > 0 ) {
			session_start() ;

			$_SESSION['id_usuario'] = $data[0]["id"] ;

	        $res = array('msg' => 'Credenciales correctas', 'error' => false, 'data' => $data);
	        $jsn = json_encode($res);
	        print_r($jsn);
		}
		else{
		    $res = array('msg' => 'Credenciales incorrectas', 'error' => true, 'data' => array());
		    $jsn = json_encode($res);
		    print_r($jsn);
		}
	}
	catch (Exception $e) {
	    $res = array('msg' => $e->getMessage(), 'error' => true, 'data' => array());
	    $jsn = json_encode($res);
	    print_r($jsn);
	}

