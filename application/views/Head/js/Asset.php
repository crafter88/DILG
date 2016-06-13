<script>
	var data = [
				{'asset': 'Table', 'desc': '10 meters', 'status': 'serviceable'},
				{'asset': 'Chair', 'desc': 'short', 'status': 'serviceable'},

				];
	var table = $('#asset-table').DataTable({
		data: data,
		columns: [
					{'data': 'asset'},
					{'data': 'desc'},
					{'data': 'status'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-default transfer-btn'>Transfer</button>"+
									"<button type='button' class='btn btn-default repair-btn'>Repair</button>";
						}
					}
				],
		columnDefs: [{targets: 3, width: '200px'}],
	});

	var data1 = [
				{'asset': 'Laptop', 'desc': 'Lenovo', 'status': 'transferring'},
				{'asset': 'Laptop', 'desc': 'Dell', 'status': 'pending (repair)'},

				];
	var table = $('#action-table').DataTable({
		data: data1,
		columns: [
					{'data': 'asset'},
					{'data': 'desc'},
					{'data': 'status'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-danger'>Cancel</button>";
						}
					}
				],
		columnDefs: [{targets: 3, width: '200px'}],
	});

$('.transfer-btn').click(function(){
		$('#transfer-modal').modal('show');
	});

$('.repair-btn').click(function(){
		$('#repair-modal').modal('show');
	});

</script>