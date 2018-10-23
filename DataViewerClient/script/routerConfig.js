app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "html/home.php"
    })
    .when("/databases", {
        templateUrl : "html/databases.php",
        controller : "databasesCtrl"
    })
});