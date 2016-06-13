<script>
var data = [
				{'no': 'GSS1', 'name': 'Paul Pierce', 'office': 'General Services Section', 'status': 'active'},
				];
	var table = $('#account-table').DataTable({
		data: data,
		columns: [
					{'data': 'no'},
					{'data': 'name'},
					{'data': 'office'},
					{'data': 'status'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-default'>Edit</button>"+
									"<button type='button' class='btn btn-default'>View</button>";
							
						}
					}
				],
		columnDefs: [{targets: 3, width: '120px'}],
	});

$('#account-btn').click(function(){
		$('#account-modal').modal('show');
	});


</script>