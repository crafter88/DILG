<script>
	var data = [
				{'no': '123', 'date_issued': 'January 24, 2016', 'status': 'Transfered'},
				{'no': '234', 'date_issued': 'January 5, 2016', 'status': 'Transfered'},
				{'no': '346', 'date_issued': 'January 17, 2016', 'status': 'Transfered'},
				{'no': '789', 'date_issued': 'January 15, 2016', 'status': 'Transfered'},
				{'no': '789', 'date_issued': 'January 12, 2016', 'status': 'Transfered'},
				{'no': '523', 'date_issued': 'January 21, 2016', 'status': 'Transfered'},
				{'no': '345', 'date_issued': 'January 28, 2016', 'status': 'Transfered'},
				{'no': '546', 'date_issued': 'January 12, 2016', 'status': 'Transfered'},
				{'no': '567', 'date_issued': 'January 18, 2016', 'status': 'Transfered'},
				{'no': '879', 'date_issued': 'January 19, 2016', 'status': 'Transfered'},
				];
	var table = $('#invoice-table').DataTable({
		data: data,
		columns: [
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-default'>"+sourceData.no+"</button>";
						}
					},
					{'data': 'date_issued'},
					{'data': 'status'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-success'>Print</button><button type='button' class='btn btn-default'>Download</button>";
						}
					},
				],
				columnDefs: [{targets: 3, width: '250px'}],
	});
</script>