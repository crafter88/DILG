<input type='hidden' id="base_url" value="<?php  echo base_url(); ?>" /> 
<div ng-app='saiApp' ng-controller='saiCtrl'>
<section class="content">
		<div class="row">
			<div class="col-md-12">
              	<div class="box box-default">
	                <div class="box-header with-border">
	                  	<h3 class="box-title">Requisition Issue Slip</h3>
	                  	<div class="box-tools pull-right">
	                   		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                 	</div>
	                </div>
	                <div class="box-body">
				            <div class="nav-tabs-custom">
				                <ul class="nav nav-tabs" style="margin-bottom: 20px;">
				                	<li class="active"><a href="#all" data-toggle="tab">All</a></li>
				                  	<li><a href="#completed" data-toggle="tab">Completed</a></li>
				                  	<li><a href="#incomplete" data-toggle="tab">Incomplete</a></li>
				                  	<li><a href="#confirmed" data-toggle="tab">Confirmed</a></li>
				                  	<li><a href="#pending" data-toggle="tab">Pending</a></li>
				                  	<li><a href="#draft" data-toggle="tab">Draft</a></li>
				                  	<li><a href="#cancelled" data-toggle="tab">Cancelled</a></li>
				                  	<li><a href="#rejected" data-toggle="tab">Rejected</a></li>
				                 	<li style="float: right;"><button id='create-sai-btn' type='button' class='btn btn-default'>Create RIS <i class='fa fa-file'></i></button></li>
				                </ul>
	                	
	                  	<div class="tab-content">
	                  				<div class="tab-pane active" id="all">
					                  	<table id='all-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>RIS No</th>
						                  		<th>Status</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                  	</div>
	                  				<div class="tab-pane" id="completed">
					                  	<table id='completed-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>RIS No</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                  	<div class="tab-pane" id="incomplete">
					                  	<table id='incomplete-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>RIS No</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                  	<div class="tab-pane" id="confirmed">
				                    	<table id='confirmed-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>RIS No</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                 	</div>
				                  	<div class="tab-pane" id="pending">
					                  	<table id='pending-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>RIS No</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                  	<div class="tab-pane" id="draft">
				                    	<table id='draft-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>RIS No</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
						                  		<th>Date Modified</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                 	</div>
				                 	<div class="tab-pane" id="cancelled">
				                    	<table id='cancelled-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>RIS No</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                 	</div>
				                  	<div class="tab-pane" id="rejected">
				                    	<table id='rejected-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>RIS No</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                </div>
			              	</div>
		                </div>
		            </div>
	           	</div>
			</div>
	</section>
	
	<form id='save_sai' action="<?php echo base_url(); ?>gss/head/ris/save_sai" method='post'>
	<div id='create-sai-modal' class="modal" role='dialog' tabindex='-1'>
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type='button' class='close close-create-sai-modal'><span aria-hidden='true'>&times; </span></button>
					<h4 style="margin: 0;"><input class='form-control' type='text' name='sai_no' value="RIS No. {{ last_sai_id }}" style='background-color: transparent; border: none; width: 50%; font-size: 18px; font-weight: bold;' readonly></h4>
					<input id='save_sai_status' type='hidden' name='sai_status' value="pending">
					<input type='hidden' name='sai_date_created' value="{{ date_today }}">
				</div>
				<div class="modal-body" style="max-height: 480px; overflow-y: auto;">
					<div class='row'>
						<div class="col-md-12">
							<div class="box box-success">
								<div class="box-body">
									<button id='add-item-btn' type="button" class='btn btn-default btn-sm' style="margin-bottom: 8px;">Inventory <i class='fa fa-plus'></i></button>
									<table class='table table-hover table-bordered table-striped'>
										<thead>
											<th>Item</th>
											<th>Description</th>
											<th style="width: 100px;">Type</th>
											<th style="width: 80px;">Qty</th>
											<th style="width: 80px;">Unit Cost</th>
											<th style="width: 150px;">Total Cost</th>
											
										</thead>
										<tbody>
											<tr ng-repeat="item in selected_inventory_item track by $index">
												<td style="display: none;"><input class='form-control' type='text' name='inventory_id[]' value='{{ item.id }}' style="border: none; background: transparent;" readonly ></td>
												<td><input class='form-control' type='text' name='inventory_item[]' value='{{ item.name }}' style="border: none; background: transparent;" readonly ></td>
												<td><input class='form-control' type='text' name='inventory_desc[]' value='{{ item.description }}' style="border: none; background: transparent;" readonly ></td>
												<td><input class='form-control' type='text' name='inventory_type[]' value="{{ item.type }}" style="border: none; background: transparent;" readonly></td>
												<td><input class='form-control' type='text' name='inventory_qty[]' id="item_qty_{{$index}}" ng-model="item_qty_$index" ng-init="item_qty_$index = 1" min='1' max='{{ item.qty }}' format="number"></td>
												<td><input class='form-control' type='text' name='inventory_unit_cost[]' value="{{ item.unit_cost }}" format="number" style="width: 80px; border: none; background: transparent;" readonly></td>
												<td><input class='form-control' type='text' name='inventory_total_cost[]' value="{{ item.unit_cost * item_qty_$index }}" format="number" style="border: none; background: transparent;" readonly></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='submit' class='btn btn-default'>Create RIS</button>
				</div>
			</div>
		</div>
	</div>
	</form>
	<div id='inventory-item-modal' class="modal" role='dialog' tabindex='-1'>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
					<h4 style="margin: 0;">Inventory</h4>
				</div>
				<div class="modal-body" style="max-height: 480px; overflow-y: auto;">
					<div class='row'>
						<div class="col-md-12">
							<div class="box box-default">
				                <div class="box-body">
						            <table class='table table-hover table-bordered table-striped'>
						            	<thead>
						            		<th>Item</th>
						            		<th>Desc</th>
						            		<th>Qty</th>
						            		<th style="width: 72px;">Unit cost</th>
						            		<th style="width: 20px;">Type</th>
						            		<th style="width: 20px;">Action</th>
						            	</thead>
						            	<tbody inventory-item>
							           	</tbody>
						            </table>
				                </div>
				            </div>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button class='btn btn-default' data-dismiss='modal'>Ok</button>
				</div>
			</div>
		</div>
	</div>
	<div id='view-sai-modal' class="modal" role='dialog' tabindex='-1'>
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
					<h4 style="margin: 0;"><label id='view-sai-sai_no'></label></h4>
				</div>
				<div class="modal-body" style="max-height: 480px; overflow-y: auto;">
					<div class='row'>
						<div class="col-md-12">
				            <div class="box box-default">
				                <div class="box-body">
				                	<table class='table'>
				                		<tr>
				                			<td style="width: 12%;"><label style="color: #D00D0D;">Date Created:</label></td>
				                			<td><p id='view-sai-date_created' style="text-decoration: underline;"></p></td>
				                			<td style="width: 7%;"><label style="color: #D00D0D">Status:</label></td>
				                			<td><p id='view-sai-status' style="text-decoration: underline;"></p></td>
				                		</tr>
				                	</table>
						            <table class='table table-hover table-bordered table-striped'>
						            	<thead>
						            		<th>Item</th>
						            		<th>Description</th>
						            		<th>Type</th>
						            		<th style="width: 80px;">Qty</th>
						            		<th style="width: 80px;">Unit Cost</th>
						            		<th style="width: 150px;">Total Cost</th>
						            	</thead>
						            	<tbody id='view-sai-items'>
							           	</tbody>
						            </table>
				                </div>
				            </div>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>
			</div>
		</div>
	</div>