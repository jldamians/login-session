'use strict'

app.factory('loginFactory', function($http, $location, sessionFactory){
	return {
		login: function(p_data, p_scope){
			sessionFactory.generar(p_data).then(
				function(respuesta){
					var id = respuesta.data ;
					if (id) {
						$location.path('/home') ;
					}
					else{
						p_scope.msgtxt = 'Datos incorrectos: -Usuario- ó -Clave-' ;
						$location.path('/login') ;
					}
				}
			);
		},
		logout: function(){
			sessionFactory.destroy().then(
				function(respuesta){
					$location.path('/login');
				}
			);
		},
		islogged: function(){
			sessionFactory.get().then(
				function(respuesta){
					var id = respuesta.data ;
					if (!id) {
						$location.path('/login') ;
					}
				}
			);
		}
	};
});