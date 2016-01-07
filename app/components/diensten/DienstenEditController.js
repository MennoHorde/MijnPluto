angular.module('MijnPluto').controller('DienstenEditController', function($scope, $routeParams, $location, DienstService){
    $scope.dienst = DienstService.get({id: $routeParams.id});
    console.log($scope.dienst);

    $scope.saveDienst = function(dienst) {
        var post = DienstService.save({id: dienst.id}, {
            'client_id': dienst.client_id,
            'datum': dienst.datum,
            'van': dienst.van,
            'tot': dienst.van,
            'status': 'gewijzigd'
        });

        post.$promise.then(function(response) {
            $location.path('/diensten');
        });
    };
});
