angular.module('MijnPluto')
    .filter('dateToISO', function() {
        return function(input) {

            input = new Date(input).toISOString();

            return input;
        };
});
