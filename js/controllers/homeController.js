'use strict';

app.controller('HomeController', function($scope, loginService, usuarioService, $location){
	$scope.msgtxt = '';
    function getUsuario(){
		loginService.getSession().then(
            function(response) {
				var id = response.data ;
				if (id === '') {
					$location.path('/login') ;
				}
				else{
					usuarioService.get_by_id(id).then(
						function(response){
							if (response.data.error == true) {
								$scope.msgtxt = response.data.msg;
							}
							else{
								$scope.usuario = response.data.data[0] ;
							}
						}
					);
				}
            }
		);
    };

    getUsuario() ;

    $scope.logout = function(){
        loginService.logout();
    }
});