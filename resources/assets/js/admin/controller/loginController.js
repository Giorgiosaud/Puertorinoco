ReservacionesApp.controller('loginController',['$scope','$http','$log','$state',function($scope,$http,$log,$state){
    $scope.formData = {};
    $log.info('mainController');
    $scope.submit=function(){
        $http.post('/PanelAdministrativo', $scope.formData).then(function(response){
            $log.info(response);
            $log.warn($state.current);
            $state.go('home');
        }, function(response){
            $log.warn(response);
        });
    }
}]);