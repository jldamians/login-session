'use strinct';

app.factory('sessionFactory', ['$http', function($http){
    return {
        create: function(data){
            $promesa = $http.post('data/ajax/usuario/login.php', data) ;
            return $promesa ;
        },
        get: function(){
            $promesa = $http.get('data/ajax/usuario/isLogin.php');
            return $promesa ;
        },
        destroy: function(){
            $promesa = $http.get('data/ajax/usuario/logout.php');
            return $promesa ;
        }
    };
}]);
