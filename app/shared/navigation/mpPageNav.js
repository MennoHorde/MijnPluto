angular.module("MijnPluto").directive('mpPageNav', function(){
    return {
        replace: true,
        restrict: "E",
        templateUrl: "app/shared/navigation/mpPageNav.html",
        controller: function($scope, $location){
            $scope.isPage = function(name){
                return new RegExp("/" + name + "($|/)").test($location.path());
            };
        }
    };
});
