var ReservacionesApp = angular.module('ReservacionesApp', ['ngAnimate','ui.router']);
ReservacionesApp.config(function ($stateProvider, $urlRouterProvider) {
    // $urlRouterProvider.otherwise('/');
    $stateProvider
    .state('home',{
        url:'/',
        views:{
            'main':{

                templateUrl: '/PanelAdministrativo/inicio',
                controller: 'mainController'
            }
        }
    })
    .state('Embarcaciones',{
        url:'/Embarcaciones',
        views:{
            'main':{
                templateUrl: '/PanelAdministrativo/embarcaciones',
                controller: 'embarcacionesController'
            }
        }
    })
    .state('editarEmbarcacion',{
        url:'/Embarcaciones/:idembarcacion/edit',
        views:{
            'main':{
                templateUrl: function(stateParams){
                    console.log(stateParams);
                    return '/PanelAdministrativo/embarcaciones/'+stateParams.idembarcacion+'/edit';
                },
                controller: 'editarEmbarcacionesController'
            }
        }
    })
});