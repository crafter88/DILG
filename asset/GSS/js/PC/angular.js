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
						$http.get(base_url+"/gss/head/are/inventory").success(function(response){
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

		$scope.pc_list = [];
		$scope.selected_pc_items = [];

		    var today = new Date();
		    $scope.date_today = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		    $scope.pc_date_today = today.getDate()+''+(today.getMonth()+1)+''+today.getFullYear();
		    $scope.last_pc_id = 1;
		    $scope.last_pc = {id: "1", date_created: "null", date_modified: "null", pc_no: "null", status: "null"};
		    $http.get(base_url+"/gss/head/pc/last_pc").success(function(response){
		    	if(response.length > 0){
		    		$scope.last_pc = response[0];
		    		$scope.last_pc_id = parseFloat(response[0].id) + 1;
		    	}
		    });	

		    initTables($scope);
	}])
