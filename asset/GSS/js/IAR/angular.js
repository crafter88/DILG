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
	.controller('myCtrl', ['$scope', '$compile', '$http', function($scope, $compile, $http){
		$scope.edit_modal_current_items = [];

		$scope.po_list = [];
		$scope.selected_po_items = [];
		$http.get(base_url+"/gss/head/iar/all_po").success(function(response){
			$.each(response, function(index, value){
				$scope.po_list.push(value);
			});
		});
		$scope.po_select_change = function(){
			$scope.selected_po_items = [];
			var selected_po = [];
			$scope.po_list.some(function(value, index, _po_list){
				if(value.id === $scope.po_select){
					selected_po = value;
					return true;
				}
			});
			console.log(selected_po);
			var total = 0;
			selected_po.items.forEach(function(value, index, _selected_po){
				total = parseFloat(total) + parseFloat(value.total_cost);
				value.unit_cost = parseFloat(value.unit_cost).toFixed(2).toString().replace(/.(?=(?:[0-9]{3})+\b)/g, '$&,');
				value.total_cost = parseFloat(value.total_cost).toFixed(2).toString().replace(/.(?=(?:[0-9]{3})+\b)/g, '$&,');
				$scope.selected_po_items.push(value);
			});		
			$('#select-all').prop('checked', false);
			$scope.gen_total = parseFloat(total).toFixed(2).toString().replace(/.(?=(?:[0-9]{3})+\b)/g, '$&,');
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
		$scope.iar_date_today = today.getFullYear() + '-' + m;
		$scope.last_iar_id = 1;
		$scope.last_iar = {id: "1", date_created: "null", date_modified: "null", po_no: "null", status: "null"};
		$http.get(base_url+"/gss/head/iar/last_iar").success(function(response){
			if(response.length > 0){
				$scope.last_iar = response[0];
				$scope.last_iar_id = parseFloat(response[0].id) + 1;
			}
		});	
	    initTables($scope);
	}])