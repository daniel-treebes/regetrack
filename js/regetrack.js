var myApp = angular.module('regetrack',[]);

myApp.controller('MontacargasController', ['$scope', '$http',function($scope,$http) {
     $scope.recomiendaBaterias = function() 
     { 
         
        volts = parseInt($scope.montacargas_c) * 2;
        amperaje = ((parseInt($scope.montacargas_p) - 1)/2) * parseInt($scope.montacargas_k);
        $scope.montacargas_volts = volts;
        $scope.montacargas_amperaje = amperaje;
         
         $('input[type=checkbox]').attr('checked',false); 
        $http.get("json/recomiendaBaterias.php",{params:{volts:volts,amperaje:amperaje,tipo: $scope.montacargas_t,enchufe: $scope.montacargas_e}})
            .then(function(response) {
                angular.forEach(response.data, function(value, key) {
                   $('input[value='+value+']').attr('checked',true);
                });
        });

     };
}]);

myApp.controller('CargadoresController', ['$scope', '$http',function($scope,$http) {
     $scope.recomiendaBaterias = function() 
     { 
         
        volts = parseInt($scope.cargadores_c) * 2;
        amperaje = ((parseInt($scope.cargadores_p) - 1)/2) * parseInt($scope.cargadores_k);
        $scope.cargadores_volts = volts;
        $scope.cargadores_amperaje = amperaje;
         
         $('input[type=checkbox]').attr('checked',false); 
        $http.get("json/recomiendaBaterias.php",{params:{volts:volts,amperaje:amperaje,tipo: $scope.cargadores_t,enchufe: $scope.cargadores_e,amperaje_range:10}})
            .then(function(response) {
                angular.forEach(response.data, function(value, key) {
                   $('input[value='+value+']').attr('checked',true);
                });
        });

     };
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