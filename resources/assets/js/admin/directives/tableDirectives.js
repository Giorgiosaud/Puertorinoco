ReservacionesApp.directive("tablamaterialized",function(){
        return {
            restrict: "E",
            replace: true,
            transclude: {
                'paneTitle': '?title',
            },
            scope: {
                clase:"@",
                'titulos':'='
            },
            template:   '<div><table class={{clase}} {{titulo}}><tr><ng-foreach="titulo in titulos"><td>{{titulo}}</td></ng-foreach></tr><ng-transclude></ng-transclude></table></div>',
        }
});

