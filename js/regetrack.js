var myApp = angular.module('regetrack',[]);

myApp.controller('MontacargasController', ['$scope', '$http',function($scope,$http) {
     $scope.recomiendaBaterias = function() 
     { 
         
        volts = parseInt($scope.montacargas_c) * 2;
        amperaje = ((parseInt($scope.montacargas_p) - 1)/2) * parseInt($scope.montacargas_k);
        $scope.montacargas_volts = volts;
        $scope.montacargas_amperaje = amperaje;
         
        $('input[type=checkbox]').attr('checked',false); 
        $http.get("json/recomiendaBateriasByMontacargas.php",{params:{volts:volts,amperaje:amperaje,tipo: $scope.montacargas_t,enchufe: $scope.montacargas_e}})
            .then(function(response) {
                angular.forEach(response.data, function(value, key) {
                   $('input[value="'+value+'"]').attr('checked',true);
                });
        });

     };
     
     
     $scope.verificaNombre = function(){
         var nombre = $('input[name=montacargas_nombre]').val();
         var idsucursal = $('select[name=idsucursal]').val();
         if(nombre == ""){
            $('input[name=montacargas_nombre]').siblings('i').hide();
         }else{
            $http.get("json/validarNombre.php",{params:{nombre:nombre,idsucursal:idsucursal,tipo: "montacargas"}})
            .then(function(response) {
                $('input[name=montacargas_nombre]').siblings('i').hide();

                if(response.data.exist){
                     $('input[name=montacargas_nombre]').siblings('i.fa-check').hide();
                     $('input[name=montacargas_nombre]').siblings('i.fa-close').show();
                     $('button[type=submit]').attr('disabled',true);
                }else{
                    $('input[name=montacargas_nombre]').siblings('i.fa-close').hide();
                     $('input[name=montacargas_nombre]').siblings('i.fa-check').show();
                     $('button[type=submit]').attr('disabled',false);
                }
            });
         }
     }
}]);

myApp.controller('BateriasController', ['$scope', '$http',function($scope,$http) {

     $scope.verificaNombre = function(){
         var nombre = $('input[name=baterias_nombre]').val();
         var idsucursal = $('select[name=idsucursal]').val();
         if(nombre == ""){
            $('input[name=baterias_nombre]').siblings('i').hide();
         }else{
            $http.get("json/validarNombre.php",{params:{nombre:nombre,idsucursal:idsucursal,tipo: "baterias"}})
            .then(function(response) {
                $('input[name=baterias_nombre]').siblings('i').hide();

                if(response.data.exist){
                     $('input[name=baterias_nombre]').siblings('i.fa-check').hide();
                     $('input[name=baterias_nombre]').siblings('i.fa-close').show();
                     $('button[type=submit]').attr('disabled',true);
                }else{
                    $('input[name=baterias_nombre]').siblings('i.fa-close').hide();
                     $('input[name=baterias_nombre]').siblings('i.fa-check').show();
                     $('button[type=submit]').attr('disabled',false);
                }
            });
         }
     }
}]);

myApp.controller('CargadoresController', ['$scope', '$http',function($scope,$http) {
     $scope.recomiendaBaterias = function() 
     { 
 
         $('input[type=checkbox]').attr('checked',false); 
        $http.get("json/recomiendaBateriasByCargadores.php",{params:{volts:$scope.cargadores_volts,amperaje:$scope.cargadores_amperaje,enchufe: $scope.cargadores_e,amperaje_range:10}})
            .then(function(response) {
                console.log(response);
                angular.forEach(response.data, function(value, key) {
                   $('input[value="'+value+'"]').attr('checked',true);
                });
        });

     };
     
     $scope.verificaNombre = function(){
         var nombre = $('input[name=cargadores_nombre]').val();
         var idsucursal = $('select[name=idsucursal]').val();
         if(nombre == ""){
            $('input[name=cargadores_nombre]').siblings('i').hide();
         }else{
            $http.get("json/validarNombre.php",{params:{nombre:nombre,idsucursal:idsucursal,tipo: "cargadores"}})
            .then(function(response) {
                $('input[name=cargadores_nombre]').siblings('i').hide();

                if(response.data.exist){
                     $('input[name=cargadores_nombre]').siblings('i.fa-check').hide();
                     $('input[name=cargadores_nombre]').siblings('i.fa-close').show();
                     $('button[type=submit]').attr('disabled',true);
                }else{
                    $('input[name=cargadores_nombre]').siblings('i.fa-close').hide();
                     $('input[name=cargadores_nombre]').siblings('i.fa-check').show();
                     $('button[type=submit]').attr('disabled',false);
                }
            });
         }
     }
}]);

myApp.directive('numberMask', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            $(element).numeric();
        }
    }
});

myApp.directive('uppercase', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            $(element).numeric();
        }
    }
});