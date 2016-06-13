var base_url = $('#base_url').val(); 
var initTables = function(scope, compile){

	var asset_table = $('#asset-table').DataTable({
		ajax: base_url+"/gss/head/inventory/asset_inventory",
		//data: data,
		columns: [
					{'data': 'asset_no'},
					{'data': 'distinction_no'},
					{'data': 'asset_name'},
					{'data': 'asset_description'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-default add-parts'>Add Parts</button>";
						}
					}
				],
		columnDefs: [{targets: 4, width: '200px'}],
	});


	$('#asset-table').on('click', '.add-parts', function(){

		var data = asset_table.row(this.closest('tr')).data();
		$('#asset_no').val(data.asset_no);
		$('#asset_name').val(data.asset_name);
		$('#asset_desc').val(data.asset_description);
		$('#distinction_no').val(data.distinction_no);
		$('#'+id+'').val(data.asset_part_name);
		$('#'+id1+'').val(data.asset_part_description);
		//console.log(data);
		$('#add-modal').modal('show');
	});

	var part_no = 0;
	var id = 0;
	var id1 = 0;
	$('#add-part-btn').click(function(){
		id++;
		id1++;
		part_no++;
		$('#parts').append('<div><input type="hidden" id="'+part_no+'" name="part_no[]" value="'+part_no+'"/><input type="text" id="'+id+'" name="parts[]"/> - <input "type="text" id="'+id1+'" name="desc[]"/><button type="button" class="close">&times;</button></div>');
	
		$('#asset_no').val(data.asset_no);
	
	});
	$(parts).on("click",".close", function(e){
        e.preventDefault(); 
        $('#'+id+'').parent('div').remove(); id--;
        $('#'+id1+'').parent('div').remove(); id1--;
       
    });



 //INVENTORY

 	var inventory_table = $('#inventory-table').DataTable({
 		ajax: base_url + '/gss/head/inventory/inventory_record',
 		columns: [
 					{'data': 'name'},
 					{'data': 'description'},
 					{'data': 'qty'},
 					{
 						mRender: function(rowData, settings, sourceData){
 							return "<button class='btn btn-warning'>Edit</button>";
 						}
 					},
 				],
 	});

 	var gss_table = $('#gss-table').DataTable({
 						ajax: base_url + '/gss/head/inventory/gss_ppmp',
 						columns: [
 									{'data': 'name'},
 									{'data': 'description'},
 									{'data': 'qty'},
 								],
 					});

 	var accounting_table = $('#accounting-table').DataTable({
						ajax: base_url + '/gss/head/inventory/accounting_ppmp',
 						columns: [
 									{'data': 'name'},
 									{'data': 'description'},
 									{'data': 'qty'},
 								],
 					});

 	var it_table = $('#it-table').DataTable({
						ajax: base_url + '/gss/head/inventory/it_ppmp',
 						columns: [
 									{'data': 'name'},
 									{'data': 'description'},
 									{'data': 'qty'},
 								],
 					});


}

