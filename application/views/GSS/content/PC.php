<input type='hidden' id="base_url" value="<?php  echo base_url(); ?>" /> 
<div ng-app='myApp' ng-controller='myCtrl'>
<section class="content">
		<div ng-view class="row">
			<div class="col-md-12">
              	<div class="box box-default">
	                <div class="box-header with-border">
	                  	<h3 class="box-title">Property Card</h3>
	                  	<div class="box-tools pull-right">
	                   		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                 	</div>
	                </div>
	                <div class="box-body">
	                  	<table id='pc-table' class='table table-bordered table-hover table-striped' width="100%">
	                  		<thead>
		                  		<th>PC No</th>
		                  		<th>Employee</th>
		                  		<th>Date Created</th>
		                  		<th>Status</th>
		                  		<th>Action</th>
		                  	</thead>
	                  	</table>
	                </div>
	            </div>
           	</div>
		</div>
</section>

	<div id='view-pc-modal' class="modal fade" role='dialog' tabindex='-1'>
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
					<h4 style="margin: 0;"><input value="PPE No.  " id="view-pc-pc_no" name="view-pc-pc_no" class='form-control' type='text' style='background-color: transparent; border: none; width: 50%; font-size: 18px; font-weight: bold;' readonly></h4>
				</div>
				<div class="modal-body">
					<table class='table table-hover table-bordered table-striped'>
							Asset: <input id="view-pc-asset-name" name="pc-asset-name" class='form-control' type='text' style="border: 1px; background: transparent;" readonly>
		            	<thead>
		            		<th>Date</th>
		            		<th>Employee</th>
		            		<th>Status</th>						            		
		            	</thead>
		            	<tbody>
		            		<tr>
		            			<td><input id="view-pc-date-created" name="pc-date-created" class='form-control' type='text' style="border: 1px; background: transparent;" readonly></td>
		            			<td><input id="view-pc-employee" name="pc-employee" class='form-control' type='text' style="border: 1px; background: transparent;" readonly></td>
		            			<td><input id="view-pc-status" name="pc-status" class='form-control' type='text' style="border: 1px; background: transparent;" readonly></td>
		            		</tr>
			           	</tbody>
		            </table>

				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
			</div>
		</div>
	</div>

</div>