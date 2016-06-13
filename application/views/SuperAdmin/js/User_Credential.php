<script type="text/javascript">
	$(document).ready(function(){
		var all_table = $('#all-table').DataTable({
			ajax: '<?php echo base_url(); ?>super_admin/get_users_all',
			columns: [
						{'data': 'username'},
						{'data': 'password'},
						{'data': 'firstname'},
						{'data': 'middlename'},
						{'data': 'lastname'},
						{'data': 'department'},
						{'data': 'access_level'},
						{
							mData: null,
							bSortable: false,
							mRender: function(rowData, settings, sourceDate){
								return "<button class='btn btn-primary'>View</button>";
							}
						}
			],
		});
		var all_table = $('#pending-table').DataTable({
			ajax: '<?php echo base_url(); ?>super_admin/get_users_pending',
			columns: [
						{'data': 'username'},
						{'data': 'password'},
						{'data': 'firstname'},
						{'data': 'middlename'},
						{'data': 'lastname'},
						{'data': 'department'},
						{'data': 'access_level'},
						{
							mData: null,
							bSortable: false,
							mRender: function(rowData, settings, sourceDate){
								return "<button class='btn btn-primary'>View</button>";
							}
						}
			],
		});
	});
	
</script>