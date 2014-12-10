'use strict';

var app = angular.module('myApp', ['ngRoute']);

app.config(['$routeProvider', function($ruta) {
	$ruta.when('/login', {
		templateUrl: 'partials/login.html',
		controller: 'LoginController'
	});
	$ruta.when('/home', {
		templateUrl: 'partials/home.html',
		controller: 'HomeController'
	});
	$ruta.otherwise({
		redirectTo: '/login'
	});
}]);

// $rootScope a diferencia de $scope, puede ser accedido desde cualquier controllador.
// Al poner funciones o datos en el app.run función, vamos a garantizar
// que se ejecutaran antes de que el resto de la aplicación
app.run(['$rootScope', '$location', 'loginFactory', function($rootScope, $location, loginFactory){
	// rutas a las cuales no podra acceder si no se ha logeado
	var rutasPermitidas = ['/home'] ;
	// $on es un desencadenador de eventos
	// $routeChangeStart es un evento que se dispara cuando se canbia la ruta (url)
	$rootScope.$on('$routeChangeStart', function(event, oldUrl, newUrl){
		//console.log(event) ;
		//console.log(oldUrl) ;
		//console.log(newUrl) ;
		if ( rutasPermitidas.indexOf($location.path()) != -1  ) {
			loginFactory.islogged();
		};
	});
}]);