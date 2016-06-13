<input type='hidden' id="base_url" value="<?php  echo base_url(); ?>" /> 
<div ng-app='myApp' ng-controller='myCtrl'>
<section class="content">
		<div class="row">
			<div class="col-md-12">
              	<div class="box box-default">
	                <div class="box-header with-border">
	                  	<h3 class="box-title">Property Acknowledgement Receipt</h3>
	                  	<div class="box-tools pull-right">
	                   		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                 	</div>
	                </div>
		                <div class="box-body">
				            <div class="nav-tabs-custom">
				                <ul class="nav nav-tabs" style="margin-bottom: 20px;">
				                	<li class="active"><a href="#all" data-toggle="tab">All</a></li>
				                  	<li><a href="#completed" data-toggle="tab">Completed</a></li>
				                  	<li><a href="#draft" data-toggle="tab">Draft</a></li>
				                 	<li style="float: right;"><button id='generate-par-btn' type='button' class='btn btn-default'>Generate PAR <i class='fa fa-file'></i></button></li>
				                </ul>
				                <div class="tab-content">
				                	<div class="tab-pane active" id="all">
					                  	<table id='all-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>PAR No</th>
						                  		<th>Asset</th>
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
						                  		<th>PAR No</th>
						                  		<th>Asset</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                 	<div class="tab-pane" id="draft">
				                    	<table id='draft-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>PAR No</th>
						                  		<th>Asset</th>
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

<form id='save_par' action="<?php echo base_url(); ?>gss/head/par/save_par" method='post'>
		<div id='generate-par-modal' class="modal" role='dialog' tabindex='-1'>
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<!-- <button type='button' class='close show-draft-modal'><span aria-hidden='true'>&times; </span></button> -->
						<button type='button' class='close show-draft-modal' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
						<h4 style="margin: 0;"><input class='form-control' type='text' name='par_no' value="PAR-{{ last_par_id }}-{{ par_date_today }}" style='background-color: transparent; border: none; width: 50%; font-size: 18px; font-weight: bold;' readonly></h4>
						<input id='save_par_status' type='hidden' name='par_status' value="completed">
						<input type='hidden' name='par_date_created' value="{{ date_today }}">
						<input type='hidden' name='user' value="<?php echo $this->session->userdata('user_full_name'); ?>">
					</div>
					<div class="modal-body" style="max-height: 480px; overflow-y: auto;">
						<div class='row'>
							<div class="col-md-12">
					            <div class="box box-success">
					                <div class="box-body">
							            <table class='table table-hover table-bordered table-striped'>
							            	<thead>
							            		<th>Asset</th>
							            		<th>Description</th>
							            		<!-- <th>Parts</th> -->
							            		<th>Office</th>
							            		<th>Employee</th>						            		
							            	</thead>
							            	<tbody>
								           		 <tr>
								           			<td>
								           				<input ng-repeat="item in selected_inventory_item track by $index" class='form-control' type='text' name='asset_name' value='{{ item.name }}' style="border: none; background: transparent;" readonly >
								           				
								           				<button id='add-item-btn' type="button" class='btn btn-default btn-sm' style="margin-bottom: 8px;">Add <i class='fa fa-plus'></i></button>
								           			</td>
								           			<!-- <td id='parts'> 
								           				<button id='add-part-btn' type="button" class='btn btn-default btn-sm' style="margin-bottom: 8px;">Add <i class='fa fa-plus'></i></button>
								           			</td> -->
								           			<td>
								           				<input ng-repeat="item in selected_inventory_item track by $index" class='form-control' type='text' name='asset_desc' value='{{ item.description }}' style="border: none; background: transparent;" readonly >
								           			</td>
								           			 <td>
									           			 <select name='office' class='form-control'>
															<option value="{{ dept.name }}" ng-repeat="dept in dept_list track by $index">{{ dept.name }}</option>
														</select>
								           			</td>
								           			<td>
									           			<select name='employee' class='form-control'>
															<option value="{{ emp.firstname }} {{ emp.lastname }}" ng-repeat="emp in emp_list track by $index">{{ emp.firstname }} {{ emp.lastname }}</option>
														</select>						    
								           			</td>
								           			
								           		</tr> 
								           	</tbody>
							            </table>
					                </div>
					            </div>
							</div>
						</div>
					</div>
					<div class='modal-footer'>
						<button type='submit' class='btn btn-default'>Generate PAR</button>
					</div>
				</div>
			</div>
		</div>
	</form>

<form id='edit_par' action="<?php echo base_url(); ?>gss/head/par/edit_par" method='post'>
		<div id='edit-par-modal' class="modal" role='dialog' tabindex='-1'>
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type='button' id='show-draft-edit-modal' class='close'><span aria-hidden='true'>&times; </span></button>
						<h4 style="margin: 0;"><input id='edit-par-modal-par_no' class='form-control' type='text' name='edited_par_no' style='background-color: transparent; border: none; width: 50%; font-size: 18px; font-weight: bold;' readonly></h4>
						<input id='edit-par-modal-par_id' type="hidden" name='par_id'>
						<input id='save_par_status' type='hidden' name='par_status' value="completed">
						<input type='hidden' name='par_date_created' value="{{ date_today }}">
					</div>
					<div class="modal-body" style="max-height: 480px; overflow-y: auto;">
						<div class='row'>
							<div class="col-md-12">
					            <div class="box box-success">
					                <div class="box-body">
							            <table class='table table-hover table-bordered table-striped'>
							            	<thead>
							            		<th>Asset</th>
							            		<th>Parts</th>
							            		<th>Office</th>
							            		<th>Employee</th>						            		
							            	</thead>
							            	<tbody>
								           		 <tr>
								           			<td>
								           				<input id="current-par-asset-name" class='form-control' type='text' name='current_asset_name' style="border: 1px; background: transparent;" readonly >
								           				<input ng-repeat="item in selected_inventory_item track by $index" class='form-control' type='text' name='asset_name' style="border: 1px; background: transparent;" readonly >
								           				<button id='change-asset-btn' type="button" class='btn btn-default btn-sm' style="margin-bottom: 8px;"> Change <i class='fa fa-plus'></i></button>
								           			</td>
								           			<td id='parts'>
								           				<button id='add-part-btn' type="button" class='btn btn-default btn-sm' style="margin-bottom: 8px;">Add <i class='fa fa-plus'></i></button>
								           			</td>
								           			 <td>
								           				<select class='form-control' name='current-par-office' id="current-par-office">
															<option value="{{ dept.name }}" ng-repeat="dept in dept_list track by $index">{{ dept.name }}</option>
														</select>
								           			</td>

								           			<td>
								           				<select class='form-control' name='current-par-employee' id="current-par-employee">
															<option value="{{ emp.firstname }} {{ emp.lastname }}" ng-repeat="emp in emp_list track by $index">{{ emp.firstname }} {{ emp.lastname }}</option>
														</select>
								           			</td>	
								           		</tr> 
								           	</tbody>
							            </table>
					                </div>
					            </div>

							</div>
						</div>
					</div>

					<div class='modal-footer'>
						<button type='submit' class='btn btn-default'>Save</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<div id='view-par-modal' class="modal" role='dialog' tabindex='-1'>
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
					<h4 style="margin: 0;"><label id='view-par-par_no'></label></h4>
					
				</div>
				<div class="modal-body" style="max-height: 480px; overflow-y: auto;">
					<div class='row'>
						<div class="col-md-12">
				            <div class="box box-default">
				                <div class="box-body">
				                	<table class='table'>
				                		<tr>
				                			<td style="width: 12%;"><label style="color: #D00D0D;">Date Created:</label></td>
				                			<td><p id='view-par-date_created' style="text-decoration: underline;"></p></td>
				                			<td style="width: 7%;"><label style="color: #D00D0D">Status:</label></td>
				                			<td><p id='view-par-status' style="text-decoration: underline;"></p></td>
				                			<td style="width: 12%;"><label style="color: #D00D0D;">Created By:</label></td>
				                			<td><p id='user' style="text-decoration: underline;"></p></td>
				                		</tr>
				                	</table>
						            <table class='table table-hover table-bordered table-striped'>
						            	<thead>
							            		<th>Asset</th>
							            		<th>Office</th>
							            		<th>Employee</th>						            		
							            </thead>

						            	<tbody id='view-par-items'>

						            		<tr>
						            			<td id='view-par-asset-name'></td>
						            			<td id='view-par-office'></td>	
						            			<td id='view-par-employee'></td>	
						            		</tr>
						            		
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
						            		<th style="width: 82px;">Unit Cost</th>
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
					<button id='add-asset-btn' class='btn btn-default' data-dismiss='modal'>Add</button>
				</div>
			</div>
		</div>
	</div>

<form id='generate_pc' action="<?php echo base_url(); ?>gss/head/pc/save_pc" method='post'>
	<div id='generate-pc-modal' class="modal fade" role='dialog' tabindex='-1'>
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
					<h4 style="margin: 0;"><input id="ppe_no" name="ppe_no" class='form-control' type='text' style='background-color: transparent; border: none; width: 50%; font-size: 18px; font-weight: bold;' readonly></h4>
				</div>
				<div class="modal-body">
					<table class='table table-hover table-bordered table-striped'>
							Asset: <input id="pc-asset-name" name="pc-asset-name" class='form-control' type='text' style="border: 1px; background: transparent;" readonly>
		            	<thead>
		            		<th>Date</th>
		            		<th>Employee</th>
		            		<th>Status</th>						            		
		            	</thead>
		            	<tbody>
		            		<tr>
		            			<td><input id="pc-date-created" name="pc-date-created" class='form-control' type='text' style="border: 1px; background: transparent;" readonly></td>
		            			<td><input id="pc-employee" name="pc-employee" class='form-control' type='text' style="border: 1px; background: transparent;" readonly></td>
		            			<td><input id="pc-status" name="pc-status" class='form-control' type='text' style="border: 1px; background: transparent;" readonly></td>
		            		</tr>
			           	</tbody>
		            </table>

				</div>
				<div class='modal-footer'>
					<button type='submit' class='btn btn-default'>Generate</button>
			</div>
		</div>
	</div>
</form>

</div>