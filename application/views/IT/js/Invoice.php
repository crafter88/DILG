<script>
	var data = [
				{'no': '123', 'date': 'January 1, 2016', 'status': 'Transferring to User 2'},
				];
	var table = $('#i-pending-table').DataTable({
		data: data,
		columns: [
					{'data': 'no'},
					{'data': 'date'},
					{'data': 'status'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-danger'>Cancel</button><button type='button' class='btn btn-default'>View</button>";
						}
					}
				],
		columnDefs: [{targets: 3, width: '150px'}],
	});
</script>