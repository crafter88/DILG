angular.module('myApp', [])
	.controller('myCtrl', ['$scope', '$compile', function($scope, $compile){
		initTables($scope, $compile);
	}])