'use strict';

app.service('loginService', function($http, $location){

	this.login = function(data){
        return $http.post('data/ajax/usuario/login.php', data);
	};

	this.isLogin = function(){
        $http.get('data/ajax/usuario/isLogin.php').then(
            function(response){
                if (response.data === '') {
                    $location.path('/login') ;
                }
            }
        );
	};

    this.getSession = function(){
        return $http.get('data/ajax/usuario/isLogin.php');
    };

	this.logout = function(){
        $http.get('data/ajax/usuario/logout.php').then(
            function(response){
                $location.path('/login');
            }
        );
	};

});