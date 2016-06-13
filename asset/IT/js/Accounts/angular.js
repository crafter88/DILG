angular.module('myApp', [])
		.controller('myCtrl', ['$scope', '$compile', '$http', function($scope, $compile, $http){
			$scope.all_departments = [];
			$http.get(window.location.origin+'/it/accounts/all_departments').success(function(response){
				$.each(response, function(index, value){
					$scope.all_departments.push(value);
				});
			});
		    initTables($scope, $compile);
		    
		}]);
	