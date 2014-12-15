'use strict';

app.controller('LoginController', ['$scope','loginService','$location', function ($scope, loginService, $location) {
	$scope.user = {'usuario':'saavedrajl','clave':'123456'}
    $scope.msgtxt = '';

    $scope.login = function(data){
    	// enviamos el "$scope" como parametro ... O.O si tambien se puede, ya que es un objeto ;)
        loginService.login(data).then(
            function(response){
                if ( response.data.error ) {
                	$scope.msgtxt = response.data.msg ;
                }
                else{
                	$location.path('/home') ;
                }
            }
        );
    };

}]);