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

	.directive('inventoryItem', function($compile){
			return{
				restrict: 'A',
				controller: function($scope, $http){
					$scope.initInventory = function(){
						$scope.inventory_copy = [];
						$scope.inventory = [];
						$http.get(base_url+"/gss/head/par/inventory").success(function(response){
							$.each(response, function(index, value){
								$scope.inventory.push(value);
								$scope.inventory_copy.push(value);
							});
						});
					}

					$scope.draft_inventory = [];

					if($scope.draft_inventory.length > 0){
						$.each($scope.draft_inventory, function(index, value){
							$scope.inventory.splice($scope.inventory.indexOf(value), 1);
						});
					}
						
					$scope.selected_inventory_item = [];
					$scope.select_inventory_item = function(index, item){
						if($scope.selected_inventory_item.indexOf(item) > -1){
							$.each($('input[id*=item_qty_]'), function(index_1, value){
								if(index_1 >= index){
									$('#item_qty_'+(index_1)).val($('#item_qty_'+(index_1+1)).val());
								}
							});
							$.each($('input[id*=item_qty_edit_]'), function(index_1, value){
								if(index_1 >= index){
									$('#item_qty_edit_'+(index_1)).val($('#item_qty_edit_'+(index_1+1)).val());
								}
							});

							$scope.selected_inventory_item.splice($scope.selected_inventory_item.indexOf(item), 1);
						}else{
							$scope.selected_inventory_item.push(item);
						}
					}
				},
				link: function(scope, element, attrs){
					scope.initInventory();
					element.append($compile(
						"<tr ng-repeat='item in draft_inventory track by $index'>"+
							"<td>{{ item.name }}</td>"+
							"<td>{{ item.description }}</td>"+
							"<td>{{ item.qty }}</td>"+
							"<td>{{ item.unit_cost }}</td>"+
							"<td>{{ item.type }}</td>"+
							"<td><input type='checkbox' id='item_inventory_draft_{{item.id}}' ng-model='item_inventory_draft_item.id' ng-init='item_inventory_draft_item.id = true' ng-true-value='true' ng-false-value='false' ng-change='select_inventory_item($index, item)'></td>"+
						"</tr>"+
						"<tr ng-repeat='item in inventory track by $index'>"+
							"<td>{{ item.name }}</td>"+
							"<td>{{ item.description }}</td>"+
							"<td>{{ item.qty }}</td>"+
							"<td>{{ item.unit_cost }}</td>"+
							"<td>{{ item.type }}</td>"+
							"<td><input type='checkbox' id='item_inventory_{{item.id}}' ng-model='item_inventory_item.id' ng-true-value='true' ng-false-value='false' ng-change='select_inventory_item((draft_inventory.length + $index), item)'></td>"+
						"</tr>"
					)(scope));
				}
			}
		})

	.controller('myCtrl', ['$scope', '$compile', '$http', function($scope, $compile, $http){
		$scope.edit_modal_current_items = [];

		$scope.dept_list = [];
		$scope.emp_list = [];
		$scope.selected_par_items = [];
		$http.get(base_url+"/gss/head/par/all_dept").success(function(response){
			$.each(response, function(index, value){
				$scope.dept_list.push(value);
				//console.log(value)
			});
		});

		$http.get(base_url+"/gss/head/par/all_emp").success(function(response){
			$.each(response, function(index, value){
				$scope.emp_list.push(value);
				//console.log(value)
			});
		});


		
		$scope.po_select_change = function(){
		// 	$scope.inventory = [];
		// 	$.each($scope.inventory_copy, function(index, value){
		// 		$scope.inventory.push(value);
		// 	});
			
		$('input[type=checkbox]').prop('checked', false);
		// 	$scope.selected_are_items = [];
		// 	var selected_are = [];
		// 	$scope.dept_list.some(function(value, index, _dept_list){
		// 		if(value.id === $scope.are_select){
		// 			selected_are = value;
		// 			return true;
		// 		}
		// 	});
		// 	console.log(selected_are);
		// 	selected_are.items.forEach(function(value, index, _selected_are){
		// 		$scope.selected_are_items.push(value);
		// 	});

		// 	$.each($scope.selected_are_items, function(index, value){
  //       		$scope.inventory.some(function(value_1, index){
		// 			if(value_1.name === value.name && value_1.description === value.description){
		// 				$scope.inventory.splice(index, 1);
		// 			}
		// 		});
  //       	});			
		}

		    var today = new Date();
		    $scope.date_today = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		    $scope.par_date_today = today.getDate()+''+(today.getMonth()+1)+''+today.getFullYear();
		    $scope.last_par_id = 1;
		    $scope.last_par = {id: "1", date_created: "null", date_modified: "null", par_no: "null", status: "null"};
		    $http.get(base_url+"/gss/head/par/last_par").success(function(response){
		    	if(response.length > 0){
		    		$scope.last_par = response[0];
		    		$scope.last_par_id = parseFloat(response[0].id) + 1;
		    	}
		    });	

		    initTables($scope, $compile);
	}])
