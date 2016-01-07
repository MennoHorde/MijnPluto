angular.module('MijnPluto')

    .factory('DienstenService', function($resource) {
        return $resource('/api/diensten/:method/:id/:year/:week', {}, {
            query: {method:'GET', params: {method:'index'} },
            save: {method:'POST', params: {method:'save'} },
            get: {method:'GET', params: {method:'edit'} },
            remove: {method:'DELETE', params: {method:'remove'} }
        });
    });
