app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "html/home.html"
    })
    .when("/databases", {
        templateUrl : "html/databases.html",
        controller : "databasesCtrl"
    })
});