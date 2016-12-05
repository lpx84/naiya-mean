'use strict';

var app = angular.module("mean-demo", ['ngResource', 'ngRoute']);

app.config(['$routeProvider', function($routeProvider){
  $routeProvider
    .when('/', {
      templateUrl: 'tpl/index.html',
      controller: 'HomeCtrl'
    })
    .when('/user-add', {
        templateUrl: 'tpl/user-add.html',
        controller: 'AddUserCtrl'
    })
    .otherwise({
      redirectTo: '/'
    });
  
}]);

app.controller('HomeCtrl', ['$scope', '$resource', function($scope, $resource){
//  var Users = $resource('/users/getlist');
//  Users.query(function(users){
//    $scope.users = users;
//  });
  handleSlides();
}]);

app.controller('AddUserCtrl', ['$scope', '$resource', '$location', function($scope, $resource, $location){
  $scope.save = function() {
    var Users = $resource('/users/add');
    console.log($scope);
    //debugger
    Users.save($scope.user, function(res){
      console.log(res);
      $location.path('/');
    });
  }
}]);