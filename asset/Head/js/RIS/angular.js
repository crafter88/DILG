var base_url = $('#base_url').val();
angular.module('saiApp', []).directive('inventoryItem', function($compile){
	return{
		restrict: 'A',
		controller: function($scope, $http){
			$scope.initInventory = function(){
				$scope.inventory_copy = [];
				$scope.inventory = [];
				$http.get(base_url+"/head/sai/inventory").success(function(response){
					$.each(response, function(index, value){
						$scope.inventory.push(value);
						$scope.inventory_copy.push(value);
					});
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
}).controller('saiCtrl', ['$scope', '$compile', '$http', function($scope, $compile, $http){
	var today = new Date();
	$scope.date_today = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
	$scope.sai_date_today = today.getDate()+''+(today.getMonth()+1)+''+today.getFullYear();
	$scope.last_sai_id = 1;
	//$scope.last_sai = {id: "0", date_created: "null", date_modified: "null", sai_no: "null", status: "null"};
	$http.get(base_url+"/head/ris/last_sai").success(function(response){
		if(response.sai_no){
			$scope.last_sai_id = parseFloat(response.sai_no) + 1;
		}
	});	
	initTables($scope, $compile);
	
}]);