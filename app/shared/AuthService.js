angular.module('MijnPluto')
    .service('AuthService', function($state, $http) {

        var self = this;

        self.checkToken = function() {

            var data = {token: localStorage.token};

            $http.post('api/auth/check_token', data).success(function(response) {

                if(response.status !== 'success') {
                    $state.go('login');
                }
                else {
                    return response.data;
                }

            }).error(function(error) {

                $state.go('login');

            });

        };
    });
