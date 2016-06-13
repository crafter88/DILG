<!-- <section class="content">
		<div class="row">
			<div class="col-md-12">
              	<div class="box box-default">
	                <div class="box-header with-border">
	                  	<h3 class="box-title">Office Equipment Job or Work Order (Admin)</h3>
	                  	<div class="box-tools pull-right">
	                   		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                 	</div>
	                </div>
	                <div class="box-body">
	                  	<div class="nav-tabs-custom">
				                <ul class="nav nav-tabs" style="margin-bottom: 20px;">
				                  	<li class="active"><a href="#pending" data-toggle="tab">Pending</a></li>
				                </ul>
	                	
	                  	<div class="tab-content">
				                  	<div class="tab-pane active" id="pending">
					                  	<table id='pending-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>	
												<th>OEJWO No</th>
		                  						<th>Asset</th>
		                  						<th>Description</th>
		                  						<th>Status</th>
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
	</section> -->


	<section class="content">
		<div class="row">
			<div class="col-md-12">
              	<div class="box box-default">
	                <div class="box-header with-border">
	                  	<h3 class="box-title">Office Equipment Job or Work Order</h3>
	                  	<div class="box-tools pull-right">
	                   		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                 	</div>
	                </div>

 				<div class="box-body">
				            <div class="nav-tabs-custom">
				                <ul class="nav nav-tabs" style="margin-bottom: 20px;">
				                	<li class="active"><a href="#i-all" data-toggle="tab">All</a></li>
				                	<li><a href="#i-completed" data-toggle="tab">Completed</a></li>
				                	<li><a href="#i-confirmed" data-toggle="tab">Confirmed</a></li>
				                  	<li><a href="#i-pending" data-toggle="tab">Pending</a></li>
				                  	<li><a href="#i-draft" data-toggle="tab">Draft</a></li>
				                  	<li><a href="#i-cancelled" data-toggle="tab">Cancelled</a></li>
				                  	<li><a href="#i-rejected" data-toggle="tab">Rejected</a></li>
				                </ul>
	                	
	                  	<div class="tab-content">
	                  				<div class="tab-pane active" id="i-all">
					                  	<table id='i-all-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>OEJWO No</th>
						                  		<th>Status</th>
		                  						<th>Asset</th>
		                  						<th>Description</th>
		                  						<th>Action</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                  	<div class="tab-pane" id="i-completed">
					                  	<table id='i-completed-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>OEJWO No</th>
		                  						<th>Asset</th>
		                  						<th>Description</th>
		                  						<th>Action</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                  	<div class="tab-pane" id="i-confirmed">
				                    	<table id='i-confirmed-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>OEJWO No</th>
		                  						<th>Asset</th>
		                  						<th>Description</th>
		                  						<th>Action</th>
						                  	</thead>
					                  	</table>
				                 	</div>
				                  	<div class="tab-pane" id="i-pending">
					                  	<table id='i-pending-table' class='table table-bordered table-hover table-striped' width="100%">
					                  		<thead>
						                  		<th>OEJWO No</th>
		                  						<th>Asset</th>
		                  						<th>Description</th>
		                  						<th>Action</th>
						                  	</thead>
					                  	</table>
				                  	</div>
				                  	<div class="tab-pane" id="i-draft">
				                    	<table id='i-draft-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>OEJWO No</th>
		                  						<th>Asset</th>
		                  						<th>Description</th>
		                  						<th>Action</th>
						                  	</thead>
					                  	</table>
				                 	</div>
				                 	<div class="tab-pane" id="i-cancelled">
				                    	<table id='i-cancelled-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>OEJWO No</th>
		                  						<th>Asset</th>
		                  						<th>Description</th>
		                  						<th>Action</th>
						                  	</thead>
					                  	</table>
				                 	</div>
				                  	<div class="tab-pane" id="i-rejected">
				                    	<table id='i-rejected-table' class='table table-bordered table-hover table-striped' width="100%">
				                    		<thead>
						                  		<th>OEJWO No</th>
		                  						<th>Asset</th>
		                  						<th>Description</th>
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

<!-- <div id='wmr-modal' class="modal fade" role='dialog' tabindex='-1'>
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times; </span></button>
				<h4 style="margin: 0;">Waste Material Report</h4>
			</div>
			<div class="modal-body">
				<form>
					WMR No:
					<br><br>
					PPE No:
					<br><br>
					Asset:
					<br><br>
					Description:
					<br><br>
					Date:
					<br><br>				
				</form>
			</div>
			<div class='modal-footer'>
				<button class='btn btn-danger'>Cancel</button>
				<button class='btn btn-success'>Save</button>
			</div>
		</div>
	</div>
</div>
 -->
