'use strinct';

app.factory('sessionFactory', ['$http', function($http){
    return {
        generar: function(datos){
            $promesa = $http.post('data/user.php', datos) ;
            return $promesa ;
        },
        get: function(){
            $promesa = $http.get('data/check_session.php');
            return $promesa ;
        },
        destroy: function(){
            $promesa = $http.get('data/destroy_session.php');
            return $promesa ;
        },
    };
}]);
