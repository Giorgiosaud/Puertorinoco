//ReservacionesApp.controller('loginController',['$scope','$http','$log',function($scope,$http,$log){
//    $scope.formData = {};
//    $log.info('mainController');
//    $scope.reload=function(){
//        $log.log($state);
//        console.log('reloading');
//        $state.go($state.current, {}, {reload: true});
//    };
//    $scope.submit=function(){
//        $http.post('/PanelAdministrativo', $scope.formData)
//            .then(function(response){
//                $log.info(response);
//                $log.warn($state.current);
//                $state.go($state.current, {}, {reload: true});
//        }, function(response){
//            $log.warn(response);
//        });
//        console.log('reload');
//
//    }
//}]);
//ReservacionesApp.controller('inicioController',function(){});