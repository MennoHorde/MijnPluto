angular.module('MijnPluto')
    .controller('LoginIndexController', function($http, $scope, $state) {

        $scope.loginInfo = {
            email: undefined,
            wachtwoord: undefined
        };

        $scope.loginUser = function() {
            var data = {
                email: $scope.loginInfo.email,
                password: $scope.loginInfo.wachtwoord
            };

            $http.post('api/auth/login', data).success(function(response) {


                // Set token
                localStorage.setItem('token', response.data);

                // Change state to authorized
                $state.go('diensten');


            }).error(function(error) {

                // show error
                console.log(error);
            });
        };
    });
