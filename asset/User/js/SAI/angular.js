var base_url = $('#base_url').val();
angular.module('myApp', [])
		.controller('myCtrl', ['$scope', '$compile', '$http', function($scope, $compile, $http){
			$scope.ppmp_items = [];

			var today = new Date();
		    $scope.date_today = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		    $scope.sai_date = today.getDate()+''+(today.getMonth()+1)+''+today.getFullYear();
			$scope.last_sai_no = 0;

			$http.get(base_url+'user/sai/ppmp_items').success(function(response){
				$.each(response, function(index, value){
					$scope.ppmp_items.push(value);
				});
			});

			$http.get(base_url+'user/sai/last_sai').success(function(response){
				console.log(response);
				if(response !== 'null'){
					$scope.last_sai_no = response;
				}
			});

			initTables($scope, $compile);
		}]);
