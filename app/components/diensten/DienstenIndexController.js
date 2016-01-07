angular.module('MijnPluto')
    .controller('DienstenIndexController', function($scope, $state, $http, AuthService, DienstenService){

        // Check if user is authorized
        AuthService.checkToken();


        $scope.logout = function() {
            var data = {
                token: localStorage.token
            };

            $http.post('api/auth/logout', data)

                .success(function(response) {
                    console.log(response);
                    localStorage.clear();
                    $state.go('login');
                })

                .error(function(error) {
                    console.error(error);
                });
        };

        $scope.diensten = DienstenService.query({ id: 1, year: 2015, week: 53 });

        $scope.toevoegenDienst = function() {

        };

        $scope.verifyDienst = function(dienst) {
            updateStatus('correct', dienst);
        };

        $scope.removeDienst = function(dienst) {
            updateStatus('verwijderd', dienst);
        };

        $scope.heropenDienst = function(dienst) {
            updateStatus('open', dienst);
        };

        $scope.statusClass = function(dienst) {
            return {
                'success' : dienst.status === 'correct',
                'info' : dienst.status === 'toegevoegd',
                'warning' : dienst.status === 'gewijzigd',
                'danger' : dienst.status === 'verwijderd'
            };
        };

        var updateStatus = function(status, dienst) {
            var post = DienstenService.save({id: dienst.id}, {status: status});

            post.$promise.then(
                function(response) {
                    dienst.status = response.data.status;
                },
                function(error) {
                    console.log(error);
                }
            );
        };
    });
