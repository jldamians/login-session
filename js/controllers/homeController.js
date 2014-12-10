'use strict';

app.controller('HomeController', function($scope,$rootScope, loginFactory, sessionFactory, usuarioService, $location){
    function getUsuario(){

		/*usuarioService.get_by_id($rootScope.id).then(
			function(response){
				console.log(response.data[0]);
				$scope.usuario = response.data[0] ;
			},
            function(response) {
                console.log(response) ;
            }
		);*/

		sessionFactory.get().then(
            function(response) {
				var id = response.data ;
				if (!id) {
					$location.path('/login') ;
				}
				else{
					usuarioService.get_by_id(id).then(
						function(response){
							console.log(response.data[0]);
							$scope.usuario = response.data[0] ;
						},
			            function(response) {
			                console.log(response) ;
			            }
					)
				}
            },
            function(response) {
                console.log(response) ;
            }
		);
    };

    getUsuario() ;

    $scope.logout = function(){
        loginFactory.logout();
    }
});