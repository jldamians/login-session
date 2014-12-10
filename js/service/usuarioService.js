'use strinct';

app.service('usuarioService', function($http){

    this.get_by_id = function(id){
        var url_    = 'data/ajax/usuario/getUsuarioById.php' ;
        var params_ = {'id': id} ;

        return $http.get(url_, {'params': params_}) ;
    };

});