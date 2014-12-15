<?php
	class ClsUsuario extends ClsConexion {
		# CONSTRUCT
		public function __construct($cnx  = null)
		{
			$this->conn = $cnx;
		}
		# Método Logearse
		public function login_by_usuario_clave($beanUsario)
		{
			$usuario = $beanUsario->getUsuario();
			$clave   = $beanUsario->getClave();

			$this->query = "CALL usp_login_usuario_by_usuario_clave('".$usuario."','".$clave."')";

			$this->execute_query();

			$data = $this->rows ;

			return $data;
		}
		# Método Buscar por Codigo
		public function get_by_codigo($beanUsario)
		{
			$id = $beanUsario->getId();

			$this->query = "CALL usp_get_usuario_by_id(".$id.")";

			$this->execute_query();

			$data = $this->rows ;

			return $data;
		}
	}