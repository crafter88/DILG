var base_url = $('#base_url').val(); 
	angular.module('myApp', [])
			.controller('myCtrl', ['$scope', '$compile', '$http', function($scope, $compile, $http){
				initTables();
			}])