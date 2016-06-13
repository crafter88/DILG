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
				                  	<li><a href="#confirmed" data-toggle="tab">Confirmed</a></li>
				                  	<li><a href="#pending" data-toggle="tab">Pending</a></li>
				                  	<li><a href="#draft" data-toggle="tab">Draft</a></li>
				                  	<li><a href="#cancelled" data-toggle="tab">Cancelled</a></li>
				                  	<li><a href="#rejected" data-toggle="tab">Rejected</a></li>
				                 	<li style="float: right;"><button id='generate-po-btn' type='button' class='btn btn-default'>Generate PO <i class='fa fa-file'></i></button></li>
				                </ul>

				                <div class="tab-content">
				                	<div class="tab-pane active" id="all">
					                  	<table id='all-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>Purchase Order</th>
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
						                  		<th>Purchase Order</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
												<th>Date Modified</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                  	<div class="tab-pane" id="confirmed">
				                    	<table id='confirmed-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>Purchase Order</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
												<th>Date Modified</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                 	</div>
				                  	<div class="tab-pane" id="pending">
					                  	<table id='pending-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>Purchase Order</th>
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
						                  		<th>Purchase Order</th>
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
						                  		<th>Purchase Order</th>
						                  		<th>Created By</th>
						                  		<th>Date Created</th>
												<th>Date Modified</th>
						                  		<th>Action</th>
						                  	</thead>
					                  	</table>
				                 	</div>
				                  	<div class="tab-pane" id="rejected">
				                    	<table id='rejected-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>Purchase Order</th>
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

	<form id='save_po' action="<?php echo base_url(); ?>gss/head/po/save_po" method='post'>
		<div id='generate-po-modal' class="modal" role='dialog' tabindex='-1'>
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type='button' class='close show-draft-modal'><span aria-hidden='true'>&times; </span></button>
						<h4 style="margin: 0;"><h4 class="inline"><strong>PO No.</strong></h4> &nbsp; <input class='form-control inline' type='text' name='po_no' value="{{ po_date_today }}-{{ last_po_id }}" style='background-color: transparent; width: 50%; font-size: 18px; font-weight: bold;left:10px;'></h4>
						<input id='save_po_status' type='hidden' name='po_status' value="pending">
						<input id="total_files" name="total_files" value="{{total_files}}" type="hidden"/>
						<label class='alert alert-danger error-upload' style='margin-top:20px;padding: 6px 12px; background-color: red !important; width: 100%; display: none;'></label>
					</div>
					<div class="modal-body" style="max-height: 480px; overflow-y: auto;">
						<div class='row'>
							<div class="col-md-12">
								<label class="custom-file-upload">
									<input id="upload" type="file" file-model='myFile'/>
									<i class="fa fa-cloud-upload"></i> Upload Abstract
								</label>
								<div class="box box-primary" ng-repeat="item in files track by $index">
					                <div class="box-body">
										<div class="form-group">
											<h4><label>File Name: </label> </h4>
											<div class='input-group'>
												<input id="filename" value="{{filenames[$index]}}" onfocus="this.oldvalue = this.value;" name="file_name_{{$index}}[]" type="text" class='form-control file-name' />
												<span style='border:none;' class='input-group-addon'><button type='button' ng-click="removeFile($index)" class='btn btn-danger remove-abstract btn-xs'>-</button></span>
											</div>
										</div>
							            <table class='table table-hover table-bordered table-striped'>
							            	<thead>
							            		<th style="width: 140px;">Item</th>
							            		<th>Desc</th>
							            		<th style="width: 60px;">Qty</th>
							            		<th style="width: 110px;text-align:right;">Unit Cost</th>
							            		<th style="width: 120px;text-align:right;">Total Cost</th>
							            		<th style="width: 120px;">Type</th>
							            	</thead>
							            	<tbody>
								           		<tr ng-repeat="items in item track by $index">
								           			<td><input class='form-control' type='text' name='upload_item_{{$parent.$index}}[]' value='{{ items.name }}' style="border: none; background: transparent;" readonly ></td>
								           			<td><input class='form-control' type='text' name='upload_desc_{{$parent.$index}}[]' value='{{ items.description }}' style="border: none; background: transparent;" readonly ></td>
								           			<td><input class='form-control' type='text' name='upload_qty_{{$parent.$index}}[]' value='{{ items.qty }}' style="border: none; background: transparent;" readonly ></td>
								           			<td><div class="input-group"><span class="input-group-addon" style="border: none; background: transparent;font-size:18px;">&#8369;</span>
														<input class='form-control text-right' type='text' name='upload_unit_cost_{{$parent.$index}}[]' value='{{ items.unit_cost }}' style="padding:0;border: none; background: transparent;" readonly ></div></td>
								           			<td><div class="input-group"><span class="input-group-addon" style="border: none; background: transparent;font-size:18px;">&#8369;</span>
														<input class='form-control text-right' type='text' name='upload_total_cost_{{$parent.$index}}[]' value='{{ items.total_cost }}' style="padding:0;border: none; background: transparent;" readonly ></div></td>
								           			<td>
								           				<select class='form-control' name='upload_type_{{$parent.$index}}[]'>
								           					<option value='supply'>Supply</option>
								           					<option value='asset'>Asset</option>
								           				</select>
								           			</td>
								           		</tr>
								           	</tbody>
							            </table>
					                </div>
					            </div>
								
								<div class="box box-danger">
					                <div class="box-body">
					                	<h4>Additional Information</h4>
							            Supplier: <input type="textfield" class='form-control' name="po_supplier">
										Source of funds: <input type="textfield" class='form-control' name="po_source">
										Purpose: <input type="textfield" class='form-control' name="po_purpose">
										Date Created:
										<div class="form-group">
											<div class='input-group date' id='datetimepicker1'>
												<input type='text' class="form-control" name="po_date_created2" value="{{ po_date_today2 }}"/>
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
					<h4><b class='pull-left'>Total Amount: &#8369; <u>{{ gen_po_total }}</u></b></h4></b><button type='submit' class='btn btn-default'>Generate PO</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<form id='edit_po' action="<?php echo base_url(); ?>gss/head/po/edit_po" method='post'>
		<div id='edit-po-modal' class="modal" role='dialog' tabindex='-1'>
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type='button' id='show-draft-edit-modal' class='close'><span aria-hidden='true'>&times; </span></button>
						<h4 style="margin: 0;"><input id='edit-po-modal-po_no' class='form-control' type='text' name='po_no' style='background-color: transparent; border: none; width: 50%; font-size: 18px; font-weight: bold;' readonly></h4>
						<input id='edit-po-modal-po_id' type="hidden" name='po_id'>
						<input id='save_po_status' type='hidden' name='po_status' value="pending">
						<input type='hidden' name='po_date_created' value="{{ date_today }}">
					</div>
					<div class="modal-body" style="max-height: 480px; overflow-y: auto;">
						<div class='row'>
							<div class="col-md-12">
							<label class='alert alert-danger invalid-format' style='padding: 6px 12px; background-color: red !important; width: 100%; display: none;'><i class='fa fa-warning'></i> Invalid File Format</label>
								<div class="box box-primary">
									<label class="custom-file-upload">
									    <input type="file" file-model='myFile'/>
									    <i class="fa fa-cloud-upload"></i> Upload Abstract
									</label> 
					                <div class="box-body">
							            <table class='table table-hover table-bordered table-striped'>
							            	<thead>
							            		<th style="width: 140px;">Item</th>
							            		<th>Desc</th>
							            		<th style="width: 60px;">Qty</th>
							            		<th style="width: 110px;text-align:right;">Unit Cost</th>
							            		<th style="width: 120px;text-align:right;">Total Cost</th>
							            		<th style="width: 120px;">Type</th>
							            	</thead>
							            	<tbody>
								           		<tr ng-repeat="item in csv_data track by $index">
								           			<td><input class='form-control' type='text' name='upload_item[]' value='{{ item.name }}' style="border: none; background: transparent;" readonly ></td>
								           			<td><input class='form-control' type='text' name='upload_desc[]' value='{{ item.description }}' style="border: none; background: transparent;" readonly ></td>
								           			<td><input class='form-control' type='text' name='upload_qty[]' value='{{ item.qty }}' style="border: none; background: transparent;" readonly ></td>
								           			<td><div class="input-group"><span class="input-group-addon" style="border: none; background: transparent;font-size:18px;">&#8369;</span>
														<input class='form-control text-right' type='text' name='upload_unit_cost[]' value='{{ item.unit_cost }}' style="padding:0;border: none; background: transparent;" readonly ></div></td>
								           			<td><div class="input-group"><span class="input-group-addon" style="border: none; background: transparent;font-size:18px;">&#8369;</span>
														<input class='form-control text-right' type='text' name='upload_total_cost[]' value='{{ item.total_cost }}' style="padding:0;border: none; background: transparent;" readonly ></div></td>
								           			<td>
								           				<select class='form-control' name='upload_type[]'>
								           					<option value='supply'>Supply</option>
								           					<option value='asset'>Asset</option>
								           				</select>
								           			</td>
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
														<input autocomplete="off" class="input form-control" id="qty1" name='inventory_qty[]' type="text" value=0 data-items="8"/>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon" style="font-size:18px;">&#8369;</span>
														<input data-type="number" autocomplete="off" class="input form-control text-right" id="ucost1" name='inventory_unit_cost[]' type="text" value=0 data-items="8"/></div>
													</td>
													<td>
														<div class="input-group"><span class="input-group-addon" style="font-size:18px;border:0;background:transparent;">&#8369;</span>
														<input data-type="number" autocomplete="off" class="input form-control text-right" id="tcost1" name='inventory_total_cost[]' type="text" data-items="8" value=0 style="border:0;background:transparent;" readonly  /></div>
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

	<div id='view-po-modal' class="modal" role='dialog' tabindex='-1'>
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
					<h4 style="margin: 0;"><strong>PO No.</strong> &nbsp; <label id='view-po-po_no'></label></h4>
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
											<td style="width: 14%;"><label style="color: #D00D0D">Supplier:</label></td>
				                			<td><p id='view-po-supplier' style="text-decoration: underline;"></p></td>
											<td style="width: 14%;"><label style="color: #D00D0D">Created By:</label></td>
											<td><p id='view-po-created_by' style="text-decoration: underline;"></p></td>
				                		</tr>
				                	</table>
									<table class='table'>
				                		<tr>
											<td style="width: 14%;"><label style="color: #D00D0D;">Date Created:</label></td>
				                			<td><p id='view-po-date_created' style="text-decoration: underline;"></p></td>
											<td style="width: 14%;"><label style="color: #D00D0D;">Source of funds:</label></td>
				                			<td><p id='view-po-source' style="text-decoration: underline;"></p></td>
											<td id='view-po-status-by' style="width: 14%;"></td>
				                			<td><p id='view-po-statusby' style="text-decoration: underline;"></p></td>
				                		</tr>
				                	</table>
									<table class='table'>
				                		<tr>
											<td style="width: 14%;"><label style="color: #D00D0D;">Date Modified:</label></td>
				                			<td><p id='view-po-date_modified' style="text-decoration: underline;"></p></td>
											<td style="width: 14%;"><label style="color: #D00D0D;">Purpose:</label></td>
				                			<td><p id='view-po-purpose' style="text-decoration: underline;"></p></td>
											<td style="width: 14%;"><label style="color: #D00D0D;">IAR Status:</label></td>
				                			<td><p id='view-po-iar_status' style="text-decoration: underline;"></p></td>
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

	
	<div id='draft-modal' class='modal fade' role='dialog' tabindex='-1'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class="modal-header">
					<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
					<h4 style="margin: 0;"><i class='fa fa-warning'></i> Alert</h4>
				</div>
				<div class='modal-body'>
					<h3 style='text-align: center;'>Save Purchase Order as Draft</h3>
				</div>
				<div class='modal-footer'>
					<button class='btn btn-primary save-draft'>Yes</button>
					<button onclick='location.reload()' class='btn btn-default'>No</button>
				</div>
			</div>
		</div>
	</div>
	
	<div id='draft-modal-edit' class='modal fade' role='dialog' tabindex='-1'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class="modal-header">
					<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
					<h4 style="margin: 0;"><i class='fa fa-warning'></i> Alert</h4>
				</div>
				<div class='modal-body'>
					<h3 style='text-align: center;'>Changes will not be saved... Continue ?</h3>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-primary' onclick='location.reload()'>Ok</button>
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