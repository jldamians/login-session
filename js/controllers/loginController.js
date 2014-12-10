'use strict';

app.controller('LoginController', ['$scope','loginFactory', function ($scope, loginFactory) {
    $scope.msgtxt = '';

    $scope.login = function(data){
    	// enviamos el "$scope" como parametro ... O.O si tambien se puede, ya que es un objeto ;)
        loginFactory.login(data, $scope);
    };
}]);