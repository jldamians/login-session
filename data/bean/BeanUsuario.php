<?php
	class BeanUsuario{
		//Constructor
		public function __construct(){}
		//Atributos
		private $id ;
		private $nombres ;
		private $usuario ;
		private $clave ;
		//Propiedades
		public function setId($id){
			$this->id=$id;
		}
		public function getId(){
			return $this->id;
		}

		public function setNombres($nombres){
			$this->nombres = $nombres;
		}
		public function getNombres(){
			return $this->nombres;
		}

		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		public function getUsuario(){
			return $this->usuario;
		}

		public function setClave($clave){
			$this->clave = $clave;
		}
		public function getClave(){
			return $this->clave;
		}

		public function toString(){
			$str = "" ;

			$str.= isset($this->id) 		? $this->id . "/" : "" ;
			$str.= isset($this->nombres) 	? $this->nombres . "/" : "" ;
			$str.= isset($this->usuario) 	? $this->usuario . "/" : "" ;
			$str.= isset($this->clave) 		? $this->clave . "/" : "" ;

			$str = trim($str, "/") ;

			return $str ;
		}

		public function toJson(){
			$json = "" ;

			$json.= isset($this->id) 		? "{id:".$this->id."}," : "" ;
			$json.= isset($this->nombres) 	? "{nombres:".$this->nombres."}," : "" ;
			$json.= isset($this->usuario) 	? "{usuario:".$this->usuario."}," : "" ;
			$json.= isset($this->clave) 	? "{clave:".$this->clave."}," : "" ;

			$json = trim($json, ",") ;

			if ($json != "") {
				$json = "[".$json."]" ;
			}

			return $json ;
		}
	}
