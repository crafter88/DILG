 var initTables = function(scope, compile){
	var base_url = $('#base_url').val(); 
	var all_table = $('#all-table').DataTable({
		ajax: base_url+"/gss/head/par/all_par",
		columns: [
					{'data': 'par_no'},
					{'data': 'asset_no'},
					{'data': 'status'},
					{'data': 'emp_id'},
					{'data': 'date_created'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-default view-par'>View</button>";
						}
					}
				],

	});
	var completed_table = $('#completed-table').DataTable({
		ajax: base_url+"/gss/head/par/completed_par",
		columns: [
					{'data': 'par_no'},
					{'data': 'asset_no'},
					{'data': 'emp_id'},
					{'data': 'date_created'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-success'>Download</button><button type='button' class='btn btn-default view-par'>View</button><button type='button' class='btn btn-default generate-pc'>Generate Property Card</button>";
						}
					}
				],

	});
	var draft_table = $('#draft-table').DataTable({
		ajax: base_url+"/gss/head/par/draft_par",
		columns: [
					{'data': 'par_no'},
					{'data': 'asset_no'},
					{'data': 'emp_id'},
					{'data': 'date_created'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-warning edit-par'>Edit</button>";
						}
					}
				],
	});

	$('#generate-par-btn').click(function(){
		$('input[type=file]').val('');
		$('#generate-par-modal').modal({backdrop: 'static', keyboard: false});
		$('#generate-par-modal').modal('show');
	});
	$('#add-item-btn').click(function(){
		$('#inventory-item-modal').modal('show');
	});

	$('#add-asset-btn').click(function() {
    $('#current-par-asset-name').toggle();
});

	$('.show-draft-modal').click(function () {
	  	if (confirm('PAR will be saved as DRAFT')) {
	  		 $('#save_par_status').val('draft');
	  		 $.post(base_url+"/gss/head/par/save_par", $('form#save_par').serialize(), function(data) {
	  		 	location.reload();
	  		 });
		}else{
			location.reload();
			$('#generate-par-modal').modal('hide');
		}
	});

	$('#draft-table').on('click', '.edit-par', function(){
		var data = draft_table.row(this.closest('tr')).data();
		$('#edit-par-modal-par_no').val(data.par_no);
		$('#edit-par-modal-par_id').val(data.id);

		$('#current-par-asset-name').val(data.asset_no);
		$('#current-par-office').val(data.office);
		$('#current-par-employee').val(data.employee);

		$('#edit-par-modal').modal('show');
		console.log(data);
	});

	$('#change-asset-btn').click(function(){
		$('#inventory-item-modal').modal('show');
	});

	$('#show-draft-edit-modal').click(function(){
		if (confirm('Changes will not be saved')) {
	  		location.reload();
			$('#edit-po-modal').modal('hide');
		}
	});

	$('#completed-table, #all-table').on('click', '.view-par', function(){

		var data = completed_table.row(this.closest('tr')).data();
		$('#view-par-par_no').html(data.par_no);
		$('#view-par-date_created').html(data.date_created);
		$('#view-par-status').html(data.status);
		$('#view-par-asset-name').html(data.asset_no);
		$('#view-par-office').html(data.office);
		$('#view-par-employee').html(data.employee);
		$('#user').html(data.emp_id);
		console.log(data);
		$('#view-par-modal').modal('show');

	});

	$('#completed-table').on('click', '.generate-pc', function(){

		var data = completed_table.row(this.closest('tr')).data();
		var today = new Date();
		var office = ((data.office).toUpperCase()).substring(0, 3);
		$('#ppe_no').val(office+"-"+today.getFullYear()+"-"+data.id);
		$('#pc-asset-name').val(data.asset);
		$('#pc-date-created').val(data.date_created);
		$('#pc-employee').val(data.employee);
		$('#pc-status').val("Serviceable");
		
		console.log(data);
		$('#generate-pc-modal').modal('show');
	});

}