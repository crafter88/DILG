var base_url = $('#base_url').val();
angular.module('myApp', [])
		.directive('format', ['$filter', function ($filter) {
		    return {
		        require: '?ngModel',
		        link: function (scope, elem, attrs, ctrl) {
		            if (!ctrl) return;

		            ctrl.$formatters.unshift(function (a) {
		                return $filter(attrs.format)(ctrl.$modelValue)
		            });


		            ctrl.$parsers.unshift(function (viewValue) {
		                var plainNumber = viewValue.replace(/[^\d|\-+|\.+]/g, '');
		                elem.val($filter(attrs.format)(plainNumber));
		                return plainNumber;
		            });
		        }
		    };
		}])
		.directive('fileModel', ['$parse', function ($parse) {
		    return {
		        restrict: 'A',
		        link: function(scope, element, attrs) {
		            var model = $parse(attrs.fileModel);
		            var modelSetter = model.assign;
		            
		            element.bind('change', function(){
		                scope.$apply(function(){
		                    modelSetter(scope, element[0].files[0]);
		                    scope.uploadFile();
		                });
		            });
		        }
		    };
		}])
		.controller('myCtrl', ['$scope', '$compile', '$http', function($scope, $compile, $http){
			$scope.csv_data = [];
			$scope.edit_modal_current_items = [];
		    $scope.files = [];
			$scope.filenames = [];
		    $scope.uploadFile = function(){
		        var file = $scope.myFile;
		        var uploadUrl = base_url+"/gss/head/po/read_csv";
		        uploadFileToUrl(file, uploadUrl);				
		    };
			$scope.removeFile = function(i){
				$scope.files.splice(i,1);
				$scope.filenames.splice(i,1);
				calcTotal();
				$("#total_files").val(totalFiles());
				$('.error-upload').css('display', 'none');
				$('.error-upload').html("");
		    };
			$scope.changeFileName = function(oldName,newName,textfield){
				var changed = false;
				if(newName != ""){
					var index = jQuery.inArray(oldName,$scope.filenames);
					if (index != -1) {
						if(jQuery.inArray(newName,$scope.filenames) == -1){
							$scope.filenames[index] = newName;
							console.log($scope.filenames);
							changed=true;
							$('.error-upload').css('display', 'none');
							$('.error-upload').html("");
						}
					}
				}
				if(!changed){
					textfield.value = oldName;
				}
				return changed;
		    };
			var totalFiles = function(){
				return $scope.files.length;
			}
			var calcTotal = function(){
				var total = 0;
				$.each($scope.files,function(index,value){
					$.each(value,function(index_1,value_1){
						total = parseFloat(total) + parseFloat(value_1.total_cost.split(",").join(""));
					});
				});
				$scope.gen_po_total = total.toString().replace(/.(?=(?:[0-9]{3})+\b)/g, '$&,');
		    };
		    var uploadFileToUrl = function(file, uploadUrl){
		        var fd = new FormData();
		        fd.append('file', file);
		        $http.post(uploadUrl, fd, {
		            transformRequest: angular.identity,
		            headers: {'Content-Type': undefined}
		        })
		        .success(function(response){
		        	$scope.csv_data = [];
					try{
						if(jQuery.inArray(file.name,$scope.filenames) > -1){
							$('.error-upload').html("<i class='fa fa-warning'></i> File Name Exists");
							$('.error-upload').css('display', 'block');
						}else{
							$.each(response, function(index, value){
								value.total_cost = parseFloat(value.total_cost).toFixed(2).toString().replace(/.(?=(?:[0-9]{3})+\b)/g, '$&,');
								value.unit_cost = parseFloat(value.unit_cost).toFixed(2).toString().replace(/.(?=(?:[0-9]{3})+\b)/g, '$&,');
								$scope.csv_data.push(value); 
							});
							$('.invalid-format').css('display', 'none');
							$scope.files.push($scope.csv_data);
							$scope.filenames.push(file.name);
							calcTotal();
							$("#upload").val("");
							$('.error-upload').css('display', 'none');
							$('.error-upload').html("");
						}						
					}catch(err){
						$('.error-upload').html("<i class='fa fa-warning'></i> Invalid File Format");
						$('.error-upload').css('display', 'block');
					}
					$("#total_files").val(totalFiles());
		        })
		        .error(function(){
		        });
		    }

		    var today = new Date();
		    $scope.date_today = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
			var m = "";
			if((today.getMonth()+1) < 10){
				m = "0"+(today.getMonth()+1);
			}else{
				m = (today.getMonth()+1);
			}
			var d = "";
			if(today.getDate() < 10){
				d = "0"+today.getDate();
			}else{
				d = today.getDate();
			}
		    $scope.po_date_today = today.getFullYear().toString().substr(2,2) + '-' + m;
			$scope.po_date_today2 = today.getFullYear() + '-' + m + '-' + d;
		    $scope.last_po_id = 1;
		    $scope.last_po = {id: "1", date_created: "null", date_modified: "null", po_no: "null", status: "null"};
		    $http.get(base_url+"/gss/head/po/last_po").success(function(response){
		    	if(response.length > 0){
		    		$scope.last_po = response[0];
		    		$scope.last_po_id = parseFloat(response[0].id) + 1;
		    	}
		    });	

		    initTables($scope, $compile);
		    
		}]);