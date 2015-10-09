ReservacionesApp.controller('editarEmbarcacionesController',['$scope','$log','$routeParams',function($scope,$log,$routeParams){
	$scope.idembarcacion=$routeParams.idembarcacion||'na';
	console.log('editarEmbarcacionesController');
}]);