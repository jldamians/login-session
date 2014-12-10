<?php
	class ClsUsuario extends ClsConexion {
		# CONSTRUCT
		public function __construct($cnx  = null)
		{
			$this->conn = $cnx;
		}
		# Método Insertar
		public function login_by_usuario_clave($beanUsario)
		{
			$usuario = $beanUsario->getUsuario();
			$clave   = $beanUsario->getClave();

			$this->query = "CALL usp_login_usuario_by_usuario_clave('".$usuario."','".$clave."')";

			$this->execute_query();

			$data = $this->rows ;

			return $data;
		}

	}