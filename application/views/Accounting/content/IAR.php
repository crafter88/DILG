<input type='hidden' id="base_url" value="<?php  echo base_url(); ?>" /> 
<div ng-app='myApp' ng-controller='myCtrl'>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
              	<div class="box box-default">
	                <div class="box-header with-border">
	                  	<h3 class="box-title">Inspection and Acceptance Report</h3>
	                  	<div class="box-tools pull-right">
	                   		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                 	</div>
	                </div>
	                <div class="box-body">
	                	<div class="nav-tabs-custom">
			                <ul class="nav nav-tabs" style="margin-bottom: 20px;">
			                  	<li class="active"><a href="#completed" data-toggle="tab">Completed</a></li>
			                </ul>

			                <div class="tab-content">
			                  	<div class="tab-pane active" id="completed">
				                  	<table id='completed-table' class='table table-bordered table-hover table-striped' width="100%">
				                  		<thead>
					                  		<th>IAR NO</th>
					                  		<th>Status</th>
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

	<div id='view-iar-modal' class="modal" role='dialog' tabindex='-1'>
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
					<h4 style="margin: 0;"><label id='view-iar-iar_no'></label></h4>
				</div>
				<div class="modal-body" style="max-height: 480px; overflow-y: auto;">
					<div class='row'>
						<div class="col-md-12">
				            <div class="box box-default">
				                <div class="box-body">
				                	<table class='table'>
				                		<tr>
				                			<td style="width: 12%;"><label style="color: #D00D0D;">Date Created:</label></td>
				                			<td><p id='view-iar-date_created' style="text-decoration: underline;"></p></td>
				                			<td style="width: 7%;"><label style="color: #D00D0D">Status:</label></td>
				                			<td><p id='view-iar-status' style="text-decoration: underline;"></p></td>
				                		</tr>
				                	</table>
						            <table class='table table-hover table-bordered table-striped'>
						            	<thead>
						            		<th>Item</th>
						            		<th>Description</th>
						            		<th style="width: 80px;">Qty</th>
						            		<th style="width: 80px;">Unit Cost</th>
						            		<th style="width: 150px;">Total Cost</th>
						            	</thead>
						            	<tbody id='view-iar-items'>
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
</div>
