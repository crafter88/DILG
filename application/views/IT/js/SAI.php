<script>
	var data = [
				{'no': '123', 'status': 'pending'},
				{'no': '234', 'status': 'pending'},
				{'no': '346', 'status': 'pending'},
				{'no': '789', 'status': 'pending'},
				{'no': '789', 'status': 'pending'},
				{'no': '523', 'status': 'pending'},
				{'no': '345', 'status': 'pending'},
				{'no': '546', 'status': 'pending'},
				{'no': '567', 'status': 'pending'},
				{'no': '879', 'status': 'pending'},
				];
	var table = $('#sai-table').DataTable({
		data: data,
		columns: [
					{'data': 'no'},
					{'data': 'status'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-danger'>Cancel</button>"+
									"<button type='button' class='btn btn-default'>Generate RIS</button>";
						}
					}
				],
		columnDefs: [{targets: 2, width: '200px'}],
	});
</script>