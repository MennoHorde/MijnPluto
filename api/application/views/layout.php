<!DOCTYPE html>
<html lang="nl" ng-app="MijnPluto">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mijn Pluto</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/vendors/bootstrap.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <mp-page-nav></mp-page-nav>

    <div ui-view></div>

    <!-- Load Js libs -->
    <script src="assets/js/vendor/jquery-2.1.4.js"></script>
    <script src="assets/js/vendor/bootstrap.js"></script>
    <script src="assets/js/vendor/angular.js"></script>
    <script src="assets/js/vendor/angular-ui-router.js"></script>
    <script src="assets/js/vendor/angular-resource.js"></script>

    <!-- App -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/routes.js"></script>

    <!-- Controllers -->
    <script src="assets/js/controllers/DienstenIndexController.js"></script>
    <script src="assets/js/controllers/DienstenEditController.js"></script>
    <script src="assets/js/controllers/DienstenCreateController.js"></script>
    <script src="assets/js/controllers/HelpIndexController.js"></script>
    <script src="assets/js/controllers/LoginIndexController.js"></script>

    <!-- Directives -->
    <script src="assets/js/directives/mpPageNav.js"></script>

    <!-- Services & Filters -->
    <script src="assets/js/services/AuthService.js"></script>
    <script src="assets/js/services/DienstenService.js"></script>
    <script src="assets/js/filters/DatetimeFilter.js"></script>
</body>
</html>
