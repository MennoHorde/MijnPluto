angular.module('MijnPluto')
    .config(function($stateProvider, $urlRouterProvider) {

        // For any unmatched url, redirect to /state1
        $urlRouterProvider.otherwise("/login");

        $stateProvider
            .state('login', {
                url: '/login',
                controller: 'LoginIndexController',
                templateUrl: 'app/components/login/index.html'
            })

            .state('diensten', {
                url: '/diensten',
                controller: 'DienstenIndexController',
                templateUrl: 'app/components/diensten/index.html'
            });
    });
