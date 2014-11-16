'use strict';

app.controller('homeCtrl', ['$scope','loginFactory', function($scope, loginFactory){
    $scope.nombre = 'José Luis Damián Saavedra' ;
    $scope.profesion = 'Ingeniero de Sistemas' ;
    $scope.correo = 'jlds161089@gmail.com' ;
    $scope.logout = function(){
        loginFactory.logout();
    }
}]);