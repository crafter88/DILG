<script>
	var data = [
				{'no': '123', 'status': 'Pending', 'date': 'January 1, 2016'},
				];
	var table = $('#i-pending-table').DataTable({
		data: data,
		columns: [
					{'data': 'no'},
					{'data': 'status'},
					{'data': 'date'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							if(sourceData.status === 'Pending'){
								return "<button type='button' class='btn btn-danger'>Cancel</button><button type='button' class='btn btn-default'>View</button>";
							}else{
								return "<button type='button' class='btn btn-success'>Download</button>";
							}
							
						}
					}
				],
		columnDefs: [{targets: 3, width: '120px'}],
	});
</script>