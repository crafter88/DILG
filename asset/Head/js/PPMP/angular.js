var base_url = $('#base_url').val();
	angular.module('myApp', [])
		.controller('myCtrl', ['$scope', '$compile', '$http', function($scope, $compile, $http){

			initTables($scope, $compile);

		}])
		.directive('fileModel1', ['$parse', function ($parse) {
		    return {
		        restrict: 'A',
		        link: function(scope, element, attrs) {
		            var model = $parse(attrs.fileModel);

		            element.bind('change', function(){
		                scope.$apply(function(){
		                	scope.file_name_1 = element.val();
		                	if(element.val().length > 0){
		                		$('#save_abstract_ppmp_1').css('display', 'block');
		                	}else{
		                		$('#save_abstract_ppmp_1').css('display', 'none');
		                	}
		                });
		            });
		        }
		    };
		}])
		.directive('fileModel2', ['$parse', function ($parse) {
		    return {
		        restrict: 'A',
		        link: function(scope, element, attrs) {
		            var model = $parse(attrs.fileModel);

		            element.bind('change', function(){
		                scope.$apply(function(){
		                	scope.file_name_2 = element.val();
		                	if(element.val().length > 0){
		                		$('#save_abstract_ppmp_2').css('display', 'block');
		                	}else{
		                		$('#save_abstract_ppmp_2').css('display', 'none');
		                	}
		                });
		            });
		        }
		    };
		}])
		.directive('fileModel3', ['$parse', function ($parse) {
		    return {
		        restrict: 'A',
		        link: function(scope, element, attrs) {
		            var model = $parse(attrs.fileModel);

		            element.bind('change', function(){
		                scope.$apply(function(){
		                	scope.file_name_3 = element.val();
		                	if(element.val().length > 0){
		                		$('#save_abstract_ppmp_3').css('display', 'block');
		                	}else{
		                		$('#save_abstract_ppmp_3').css('display', 'none');
		                	}
		                });
		            });
		        }
		    };
		}])
		.directive('fileModel4', ['$parse', function ($parse) {
		    return {
		        restrict: 'A',
		        link: function(scope, element, attrs) {
		            var model = $parse(attrs.fileModel);

		            element.bind('change', function(){
		                scope.$apply(function(){
		                	scope.file_name_4 = element.val();
		                	if(element.val().length > 0){
		                		$('#save_abstract_ppmp_4').css('display', 'block');
		                	}else{
		                		$('#save_abstract_ppmp_4').css('display', 'none');
		                	}
		                });
		            });
		        }
		    };
		}])