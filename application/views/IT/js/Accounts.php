<script type="text/javascript" src="<?php echo base_url(); ?>asset/IT/js/Accounts/table.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/IT/js/Accounts/angular.js"></script>

<script>
	var departments_table = $('#departments-table').DataTable({
		ajax: 'all_departments',
		columns: [
					{'data': 'name'},
					{
						mRender: function(rowData, settings, sourceData){
							return "<button class='btn btn-warning edit'>Edit</button> <button class='btn btn-default view'>View</butto>"
						}
					},
		],
		columnDefs: [{targets: 1, width: '140px'}],
		
	});
	
	$('#add-department-button').click(function(){
		$('#add-department-modal').modal('show');
	});

	$('#departments-table').on('click', '.edit', function(){
		var data = departments_table.row(this.closest('tr')).data();
		var modal = $('#edit-department-modal');

		modal.find('input[name=name]').val(data.name);
		modal.find('input[name=id]').val(data.id);
		modal.modal('show');
	});

	$('#departments-table').on('click', '.view', function(){
		var data = departments_table.row(this.closest('tr')).data();
		var modal = $('#view-department-modal');

		modal.find('input[name=name]').val(data.name);
		$('#view-department-modal').modal('show');
	});

</script>