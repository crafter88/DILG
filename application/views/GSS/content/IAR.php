<input type='hidden' id="base_url" value="<?php  echo base_url(); ?>" /> 
<div ng-app='myApp' ng-controller='myCtrl'>
	<section class="content">
	<?php
		if($this->session->flashdata('error')){
			echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
		}
	?>
			<div class="row">
				<div class="col-md-12">
	              	<div class="box box-default">
		                <div class="box-header with-border">
		                  	<h3 class="box-title">Purchase Order</h3>
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
				                  	<li><a href="#draft" data-toggle="tab">Draft</a></li>
				                 	<li style="float: right;"><button id='create-iar-btn' type='button' class='btn btn-default'>Create IAR <i class='fa fa-file'></i></button></li>
				                </ul>

				                <div class="tab-content">
				                	<div class="tab-pane active" id="all">
					                  	<table id='all-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>IAR No.</th>
												<th>Status</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
												<th>Date Modified</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                	<div class="tab-pane" id="completed">
					                  	<table id='completed-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>IAR No.</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
												<th>Date Modified</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                  	<div class="tab-pane" id="incomplete">
				                    	<table id='incomplete-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>IAR No.</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
												<th>Date Modified</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                 	</div>
				                  	<div class="tab-pane" id="draft">
				                    	<table id='draft-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>IAR No.</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
						                  		<th>Date Modified</th>
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
	<form id='save_iar' action="<?php echo base_url(); ?>gss/head/iar/save_iar" method='post'>
		<div id='create-iar' class="modal" role='dialog' tabindex='-1'>
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type='button' class='close show-draft-modal'><span aria-hidden='true'>&times; </span></button>
						<h4 style="margin: 0;"><h4 class="inline"><strong>IAR No.</strong></h4> &nbsp; <input class='form-control inline' type='text' name='iar_no' value="{{ iar_date_today }}-{{ last_iar_id }}" style='background-color: transparent; width: 50%; font-size: 18px; font-weight: bold;left:10px;'></h4>
						<input id='save_iar_status' type='hidden' name='iar_status' value="completed">
						<input type='hidden' name='iar_date_created' value="{{ date_today }}">
					</div>
					<div class="modal-body" style="max-height: 480px; overflow-y: auto;">
						<div class='row'>
							<div class="col-md-12">
								<div class="row" style="margin-bottom: 10px;">
									<div class='col-md-1' style="padding-right: 0;">
										<label style="text-align: right; margin-top: 10px;">PO no:</label>
									</div>
									<div class='col-md-4' style="padding-left: 0;">
										<select name='po_id' class='form-control' ng-model="po_select" ng-init="po_select = null" ng-change="po_select_change()" required >
											<option value="{{ po.id }}" ng-repeat="po in po_list track by $index">{{ po.po_no }}</option>
										</select>
									</div>
								</div>
								<div class="box box-primary">
					                <div class="box-body">
							            <table class='table table-hover table-bordered table-striped'>
							            	<thead>
							            		<th style="width: 140px;">Item</th>
							            		<th>Desc</th>
												<th style="width: 60px;"></th>
												<th style="width: 60px;">Qty</th>
							            		<th style="width: 110px;text-align:right;">Unit Cost</th>
							            		<th style="width: 120px;text-align:right;">Total Cost</th>
							            		<th style="width: 120px;">Type</th>
												<th style="width: 40px;">Action <input type="checkbox" id="select-all" /></th>
							            	</thead>
							            	<tbody>
								           		<tr ng-repeat="item in selected_po_items track by $index">
								           			<td><input class='form-control' type='text' name='item_name[]' value='{{ item.name }}' style="border: none; background: transparent;" readonly ></td>
								           			<td><input class='form-control' type='text' name='item_description[]' value='{{ item.description }}' style="border: none; background: transparent;" readonly ></td>
								           			<td><input class='form-control' type='text' name='item_dqty[]' value='0' disabled></td>
													<td><span class="inline">/</span><input class='form-control inline' type='text' name='item_qty[]' value='{{ item.qty }}' style="border: none; background: transparent;" readonly ></td>
								           			<td><div class="input-group"><span class="input-group-addon" style="border: none; background: transparent;font-size:18px;">&#8369;</span>
														<input class='form-control text-right' type='text' name='item_unit_cost[]' value='{{ item.unit_cost }}' style="padding:0;border: none; background: transparent;" readonly ></div></td>
								           			<td><div class="input-group"><span class="input-group-addon" style="border: none; background: transparent;font-size:18px;">&#8369;</span>
														<input class='form-control text-right' type='text' name='item_total[]' value='{{ item.total_cost }}' style="padding:0;border: none; background: transparent;" readonly ></div></td>
								           			<td><input class='form-control' type='text' name='item_type[]' value='{{ item.item_type }}' style="border: none; background: transparent;" readonly ></td>
													<td><input class='item-delivered' type="checkbox" name='item_delivered[]' /> </td>
												</tr>
								           	</tbody>
							            </table>
					                </div>
					            </div>


					            <div class="box box-success">
					                <div class="box-body">
					                	<h4><b>Additional Items</b></h4>
							            <table class='table table-hover table-bordered table-striped'>
							            	<thead>
							            		<th style="width: 140px;">Item</th>
							            		<th>Desc</th>
							            		<th style="width: 60px;">Qty</th>
							            		<th style="width: 130px;text-align:right;">Unit Cost</th>
							            		<th style="width: 140px;text-align:right;">Total Cost</th>
							            		<th style="width: 120px;">Type</th>
												<th style="width: 60px;">Action</th>
							            	</thead>
							            	<tbody>
												<input type="hidden" name="count" value="1" />
												<tr id="field1">
													<input class='form-control' type='hidden' name='inventory_id[]' value='0'>
													<td>
														<input autocomplete="off" class="input form-control" id="item1" name="inventory_item[]" type="text" data-items="8"/>
													</td>
													<td>
														<input autocomplete="off" class="input form-control" id="desc1" name='inventory_desc[]' type="text" data-items="8"/>
													</td>
													<td>
														<input autocomplete="off" class="input form-control" id="qty1" name='inventory_qty[]' type="text" data-items="8" value=0 />
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon" style="font-size:18px;">&#8369;</span>
														<input data-type="number" autocomplete="off" class="input form-control text-right" id="ucost1" name='inventory_unit_cost[]' type="text" value=0 data-items="8"/></div>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon" style="font-size:18px;border:0;background:transparent;">&#8369;</span>
														<input data-type="number" autocomplete="off" class="input form-control text-right" id="tcost1" name='inventory_total_cost[]' type="text" data-items="8" style="border:0;background:transparent;" value=0 readonly /></div>
													</td>
													<td>
														<select class='form-control' name='inventory_type[]'>
								           					<option value='supply'>Supply</option>
								           					<option value='asset'>Asset</option>
								           				</select>
													</td>
													<td>
														<button id="add-more" class="btn add-more pull-right" type="button">+</button>
													</td>
												</tr>
												
								           	</tbody>
							            </table>
					                </div>
					            </div>
								
								<div class="box box-danger">
					                <div class="box-body">
					                	<h4>Additional Information</h4>
										Date Created:
										<div class="form-group">
											<div class='input-group date' id='datetimepicker1'>
												<input type='text' class="form-control" name="iar_date_created2" value="{{ date_today }}"/>
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
					                </div>
					            </div>
							</div>
						</div>
					</div>

					

					<div class='modal-footer'>
					<h4><b class='pull-left'>Total Amount: &#8369; <u>{{ gen_total }}</u></b></h4></b><button type='submit' class='btn btn-default'>Generate IAR</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	
	
	<div id='view-po-modal' class="modal" role='dialog' tabindex='-1'>
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
					<h4 style="margin: 0;"><strong>IAR No.</strong> &nbsp; <label id='view-po-po_no'></label></h4>
				</div>
				<div class="modal-body" style="max-height: 480px; overflow-y: auto;">
					<div class='row'>
						<div class="col-md-12">
				            <div class="box box-success">
				                <div class="box-body">
				                	<table class='table'>
				                		<tr>
											<td style="width: 14%;"><label style="color: #D00D0D">Status:</label></td>
				                			<td><p id='view-po-status' style="text-decoration: underline;"></p></td>
											<td style="width: 14%;"><label style="color: #D00D0D">Created By:</label></td>
											<td><p id='view-po-created_by' style="text-decoration: underline;"></p></td>
				                		</tr>
				                	</table>
									<table class='table'>
				                		<tr>
											<td style="width: 14%;"><label style="color: #D00D0D;">Date Created:</label></td>
				                			<td><p id='view-po-date_created' style="text-decoration: underline;"></p></td>
											<td style="width: 14%;"><label style="color: #D00D0D">Status By:</label></td>
				                			<td><p id='view-po-statusby' style="text-decoration: underline;"></p></td>
				                		</tr>
				                	</table>
									<table class='table'>
				                		<tr>
											<td style="width: 14%;"><label style="color: #D00D0D;">Date Modified:</label></td>
				                			<td><p id='view-po-date_modified' style="text-decoration: underline;"></p></td>
				                		</tr>
				                	</table>
				                </div>
				            </div>
							<div class="box box-default">
				                <div class="box-body">
						            <table class='table table-hover table-bordered table-striped'>
						            	<thead>
											<th style="width: 140px;">Item</th>
							            	<th>Desc</th>
											<th style="width: 120px;">Type</th>
											<th style="width: 60px;"></th>
							            	<th style="width: 60px;">Qty</th>
							            	<th style="width: 110px;text-align:right;">Unit Cost</th>
							            	<th style="width: 120px;text-align:right;">Total Cost</th>
						            	</thead>
						            	<tbody id='view-po-items'>
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

	<form id='edit-iar' action="<?php echo base_url(); ?>gss/head/iar/save_iar" method='post'>
		<div id='edit-iar-modal' class="modal" role='dialog' tabindex='-1'>
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type='button' class='close show-draft-modal'><span aria-hidden='true'>&times; </span></button>
						<h4 style="margin: 0;"><h4 class="inline"><strong>IAR No.</strong></h4> &nbsp; <input class='form-control inline' type='text' name='iar_no' value="{{ iar_date_today }}-{{ last_iar_id }}" style='background-color: transparent; width: 50%; font-size: 18px; font-weight: bold;left:10px;'></h4>
						<input id='save_iar_status' type='hidden' name='iar_status' value="completed">
						<input type='hidden' name='iar_date_created' value="{{ date_today }}">
					</div>
					<div class="modal-body" style="max-height: 480px; overflow-y: auto;">
						<div class='row'>
							<div class="col-md-12">
								<div class="row" style="margin-bottom: 10px;">
									<div class='col-md-1' style="padding-right: 0;">
										<label style="text-align: right; margin-top: 10px;">PO no:</label>
									</div>
									<div class='col-md-4' style="padding-left: 0;">
										<input type="text" name='edit_po_id' class='form-control' readonly />
									</div>
								</div>
								<div class="box box-primary">
					                <div class="box-body">
							            <table class='table table-hover table-bordered table-striped'>
							            	<thead>
							            		<th style="width: 140px;">Item</th>
							            		<th>Desc</th>
												<th style="width: 60px;"></th>
												<th style="width: 60px;">Qty</th>
							            		<th style="width: 110px;text-align:right;">Unit Cost</th>
							            		<th style="width: 120px;text-align:right;">Total Cost</th>
							            		<th style="width: 120px;">Type</th>
												<th style="width: 40px;">Action <input type="checkbox" id="select-all" /></th>
							            	</thead>
							            	<tbody id="edit-iar-items">
								           	</tbody>
							            </table>
					                </div>
					            </div>


					            <div class="box box-success">
					                <div class="box-body">
					                	<h4><b>Additional Items</b></h4>
							            <table class='table table-hover table-bordered table-striped'>
							            	<thead>
							            		<th style="width: 140px;">Item</th>
							            		<th>Desc</th>
							            		<th style="width: 60px;">Qty</th>
							            		<th style="width: 130px;text-align:right;">Unit Cost</th>
							            		<th style="width: 140px;text-align:right;">Total Cost</th>
							            		<th style="width: 120px;">Type</th>
												<th style="width: 60px;">Action</th>
							            	</thead>
							            	<tbody>
												<input type="hidden" name="count" value="1" />
												<tr id="field1">
													<input class='form-control' type='hidden' name='inventory_id[]' value='0'>
													<td>
														<input autocomplete="off" class="input form-control" id="item1" name="inventory_item[]" type="text" data-items="8"/>
													</td>
													<td>
														<input autocomplete="off" class="input form-control" id="desc1" name='inventory_desc[]' type="text" data-items="8"/>
													</td>
													<td>
														<input autocomplete="off" class="input form-control" id="qty1" name='inventory_qty[]' type="text" data-items="8" value=0 />
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon" style="font-size:18px;">&#8369;</span>
														<input data-type="number" autocomplete="off" class="input form-control text-right" id="ucost1" name='inventory_unit_cost[]' type="text" value=0 data-items="8"/></div>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon" style="font-size:18px;border:0;background:transparent;">&#8369;</span>
														<input data-type="number" autocomplete="off" class="input form-control text-right" id="tcost1" name='inventory_total_cost[]' type="text" data-items="8" style="border:0;background:transparent;" value=0 readonly /></div>
													</td>
													<td>
														<select class='form-control' name='inventory_type[]'>
								           					<option value='supply'>Supply</option>
								           					<option value='asset'>Asset</option>
								           				</select>
													</td>
													<td>
														<button id="add-more" class="btn add-more pull-right" type="button">+</button>
													</td>
												</tr>
												
								           	</tbody>
							            </table>
					                </div>
					            </div>
								
								<div class="box box-danger">
					                <div class="box-body">
					                	<h4>Additional Information</h4>
										Date Created:
										<div class="form-group">
											<div class='input-group date' id='datetimepicker1'>
												<input type='text' class="form-control" name="iar_date_created2" value="{{ date_today }}"/>
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
					                </div>
					            </div>
							</div>
						</div>
					</div>

					

					<div class='modal-footer'>
					<h4><b class='pull-left'>Total Amount: &#8369; <u>{{ gen_total }}</u></b></h4></b><button type='submit' class='btn btn-default'>Generate IAR</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	
	<div id='draft-modal' class='modal fade' role='dialog' tabindex='-1'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class="modal-header">
					<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
					<h4 style="margin: 0;"><i class='fa fa-warning'></i> Alert</h4>
				</div>
				<div class='modal-body'>
					<h3 style='text-align: center;'>Save Inspection and Acceptance Report as Draft</h3>
				</div>
				<div class='modal-footer'>
					<button class='btn btn-primary save-draft'>Yes</button>
					<button onclick='location.reload()' class='btn btn-default'>No</button>
				</div>
			</div>
		</div>
	</div>
	
	<div id='error-po-modal' class='modal fade' role='dialog' tabindex='-1'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class="modal-header">
					<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
					<h4 style="margin: 0;"><i class='fa fa-warning'></i> Alert</h4>
				</div>
				<div class='modal-body'>
					
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-primary' data-dismiss='modal'>Ok</button>
				</div>
			</div>
		</div>
	</div>
</div>