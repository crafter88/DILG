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
				                  	<li><a href="#rejected" data-toggle="tab">Rejected</a></li>
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
											<td style="width: 14%;"><label style="color: #D00D0D">Status By:</label></td>
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