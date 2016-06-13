var initTables = function(scope, compile){
	var base_url = $('#base_url').val(); 
	var all_table = $('#all-table').DataTable({
		ajax: base_url+"/gss/head/iar/all_iar",
		columns: [
					{'data': 'iar_no'},
					{'data': 'status'},
					{'data': 'user_name'},
					{'data': 'date_created'},
					{'data': 'date_modified'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							if(rowData.status == "completed"){
								return  "<button type='button' class='btn btn-danger delete-iar'>Delete</button> "+
									"<button type='button' class='btn btn-default view-po'>View</button>";
							}else if(rowData.status == "incomplete"){
								return "<button type='button' class='btn btn-warning edit-iar'>Edit</button>";
							}else if(rowData.status == "draft"){
								return "<button type='button' class='btn btn-warning edit-iar'>Edit</button>";
							}
						}
					}
				],
		columnDefs: [{targets: 4, 'width': '200px'}],

	});
	var completed_table = $('#completed-table').DataTable({
		ajax: base_url+"/gss/head/iar/completed_iar",
		columns: [
					{'data': 'iar_no'},
					{'data': 'user_name'},
					{'data': 'date_created'},
					{'data': 'date_modified'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return  "<button type='button' class='btn btn-danger delete-iar'>Delete</button> "+
									"<button type='button' class='btn btn-default view-po'>View</button>";
						}
					}
				],
		columnDefs: [{targets: 4, 'width': '200px'}],

	});
	var incomplete_table = $('#incomplete-table').DataTable({
		ajax: base_url+"/gss/head/iar/incomplete_iar",
		columns: [
					{'data': 'iar_no'},
					{'data': 'user_name'},
					{'data': 'date_created'},
					{'data': 'date_modified'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-warning edit-iar'>Edit</button>";
						}
					}
				],
		columnDefs: [{targets: 4, 'width': '200px'}],

	});
	var draft_table = $('#draft-table').DataTable({
		ajax: base_url+"/gss/head/iar/draft_iar",
		columns: [
					{'data': 'iar_no'},
					{'data': 'user_name'},
					{'data': 'date_created'},
					{'data': 'date_modified'},
					{
						mData: null,
						bSortable: false,
						mRender: function(rowData, settings, sourceData){
							return "<button type='button' class='btn btn-warning edit-iar'>Edit</button>";
						}
					}
				],
		columnDefs: [{targets: 4, 'width': '200px'}],

	});
	$('#create-iar-btn').click(function(){
		$('#create-iar').modal({backdrop: 'static', keybaord: false});
		$('#create-iar').modal('show');
	});
	$('#add-item-btn').click(function(){
		$('#inventory-item-modal').modal('show');
	});
	$('.show-draft-modal').click(function () {
		$('#draft-modal').modal('show');
	});
	$('.save-draft').click(function(){
		var iar = $('input[name=iar_no]').val();
		$.post(base_url+'gss/head/iar/iar_exist',{data: iar},function(msg){
			if(msg == "Successful"){
				$('#save_iar_status').val('draft');
				$.post(base_url+"/gss/head/iar/save_iar", $('form#save_iar').serialize(), function(data) {
					location.reload();
				});
			}else{
				$('#error-po-modal .modal-body').html("<h3 style='text-align: center;'>"+msg+"</h3>");
				$('#error-po-modal').modal('show');
				$('#draft-modal').modal('hide');
			}
		});
	});
	$('#save_iar').submit(function (e) {
		e.preventDefault();
        var iar = $('input[name=iar_no]').val();
		var $form = $(e.target),
            fv    = $form.data('formValidation');
		$.post(base_url+'gss/head/iar/iar_exist',{data: iar},function(msg){
			if(msg == "Successful"){
				$.ajax({
					url: $form.attr('action'),
					type: 'POST',
					data: $form.serialize(),
					success: function(result) {
						location.reload();
					}
				});
			}else{
				$('#error-po-modal .modal-body').html("<h3 style='text-align: center;'>"+msg+"</h3>");
				$('#error-po-modal').modal('show');
			}
		});
    });
	$('#show-draft-edit-modal').click(function(){
		if (confirm('Changes will not be saved')) {
	  		location.reload();
			$('#edit-po-modal').modal('hide');
		}
	});
	function calcTotal(){
		var val = 0;
		$("input[name='inventory_total_cost[]'],input[name='upload_total_cost[]']").each(function( index ) {
			var value = parseFloat($(this).val().split(",").join(""));
			val = parseFloat(val) + value;
		});
		scope.gen_po_total = val;
	}
	function numberWithCommas(num) {
		var str = ""; 
		if (num.toString().indexOf('.') > -1){
			num = num.split(".");
			num[0] = num[0].split(",").join("");
			var number = num[0].toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
			str = number+'.'+num[1];
		}else{
			num= num.split(",").join("");
			str=num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
		}
		return str;
	}
	var next = 1;
    $(document).on('click', '.add-more',function(e){
        e.preventDefault();
		$(this).replaceWith("<button id='remove" + (next) + "' class='btn btn-danger remove-me pull-right'>-</button>");
		var addto = "#field" + next;
        next = next + 1;
		var str = "<tr id='field" + next + "'><input class='form-control' type='hidden' name='inventory_id[]' value='0'>"+
					"<td><input autocomplete='off' class='input form-control' id='item" + next + "' name='inventory_item[]' type='text' data-items='8'/></td>"+
					"<td><input autocomplete='off' class='input form-control' id='desc" + next + "' name='inventory_desc[]' type='text' data-items='8'/></td>"+
					"<td><input autocomplete='off' class='input form-control' id='qty" + next + "' name='inventory_qty[]' value=0 type='text' data-items='8'/></td>"+
					"<td><div class='input-group'><span class='input-group-addon' style='font-size:18px;'>&#8369;</span>"+
					"<input autocomplete='off' data-type='number' class='input form-control text-right' id='ucost" + next + "' value=0 name='inventory_unit_cost[]' type='text' data-items='8'/></div></td>"+
					"<td><div class='input-group'><span class='input-group-addon' style='font-size:18px;border:0;background:transparent;'>&#8369;</span>"+
					"<input autocomplete='off' data-type='number' class='input form-control text-right' id='tcost" + next + "' value=0 name='inventory_total_cost[]' type='text' data-items='8' style='border:0;background:transparent;' readonly  /></div></td>"+
					"<td><select class='form-control' name='inventory_type[]'><option value='supply'>Supply</option><option value='asset'>Asset</option></select></td>"+
					"<td><button id='b1' class='btn add-more pull-right' type='button'>+</button></td></tr>";
        $(addto).after(str);
		$("#field" + next).attr('data-source',$(addto).attr('data-source'));
		$("#count").val(next); 
		$('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.match(/\d+/);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
        });
    });
	$('#all-table').on('click', '.view-po', function(){
		$('#view-po-items').html('');
		$('#view-po-modal .modal-footer').html('');
		var data = all_table.row(this.closest('tr')).data();
		$('#view-po-po_no').html(data.iar_no);
		$('#view-po-date_created').html(data.date_created);
		$('#view-po-status').html(data.status);
		if(data.date_modified == null){
			$('#view-po-date_modified').html("N/A");
		}else{
			$('#view-po-date_modified').html(data.date_modified);
		}
		$('#view-po-created_by').html(data.user_name);
		$('#view-po-statusby').html(data.user_name);
		var total = 0;
		$.each(data.items, function(index, value){
			$('#view-po-items').append("<tr>"+
						            		"<td>"+value.name+"</td>"+
						            		"<td>"+value.description+"</td>"+
						            		"<td>"+value.item_type+"</td>"+
											"<td class='text-right'>"+value.qty+"</td>"+
						            		"<td >/"+(value.total_cost/value.unit_cost)+"</td>"+
						            		"<td class='text-right'>"+parseFloat(value.unit_cost).toFixed(2).toString().replace(/.(?=(?:[0-9]{3})+\b)/g, '$&,')+"</td>"+
						            		"<td class='text-right'>"+parseFloat(value.total_cost).toFixed(2).toString().replace(/.(?=(?:[0-9]{3})+\b)/g, '$&,')+"</td>"+
						            	"</tr>");
			total = total + parseFloat(value.total_cost);
		});
		$('#view-po-modal .modal-footer').append("<h4><b class='pull-left'>Total Amount: &#8369;<u> "+total+"</u></b></h4><button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>");
		$('#view-po-modal').modal('show');
	});
	$('#all-table').on('click', '.edit-iar', function(){
		var data = all_table.row(this.closest('tr')).data();
		$('input[name="iar_no"]').val(data.iar_no);
		$('input[name="edit_po_id"]').val(data.po_no);
		$.each(data.items,function(index,value){
			$('#edit-iar-items').append("<tr><td><input class='form-control' type='text' name='item_name[]' value='"+value.name+"' style='border: none; background: transparent;' readonly ></td>"+
										"<td><input class='form-control' type='text' name='item_description[]' value='"+value.description+"' style='border: none; background: transparent;' readonly ></td>"+
										"<td><input class='form-control' type='text' name='item_dqty[]' value='0' disabled></td>"+
										"<td><span class='inline'>/</span><input class='form-control inline' type='text' name='item_qty[]' value='"+value.qty+"' style='border: none; background: transparent;' readonly ></td>"+
										"<td><div class='input-group'><span class='input-group-addon' style='border: none; background: transparent;font-size:18px;'>&#8369;</span>"+
										"	<input class='form-control text-right' type='text' name='item_unit_cost[]' value='"+value.unit_cost+"' style='padding:0;border: none; background: transparent;' readonly ></div></td>"+
										"<td><div class='input-group'><span class='input-group-addon' style='border: none; background: transparent;font-size:18px;'>&#8369;</span>"+
										"	<input class='form-control text-right' type='text' name='item_total[]' value='"+value.total_cost+"' style='padding:0;border: none; background: transparent;' readonly ></div></td>"+
										"<td><input class='form-control' type='text' name='item_type[]' value='"+value.form_type+"' style='border: none; background: transparent;' readonly ></td>"+
										"<td><input class='item-delivered' type='checkbox' name='item_delivered[]' /> </td></tr>");
		});
		$('#edit-iar-modal').modal('show');
	});
	$('#incomplete-table').on('click', '.edit-iar', function(){
		$('#edit-iar-modal').modal('show');
	});
	$('#draft-table').on('click', '.edit-iar', function(){
		$('#edit-iar-modal').modal('show');
	});
	$('#completed-table').on('click', '.view-po', function(){
		$('#view-po-items').html('');
		$('#view-po-modal .modal-footer').html('');
		var data = completed_table.row(this.closest('tr')).data();
		$('#view-po-po_no').html(data.iar_no);
		$('#view-po-date_created').html(data.date_created);
		$('#view-po-status').html(data.status);
		if(data.date_modified == null){
			$('#view-po-date_modified').html("N/A");
		}else{
			$('#view-po-date_modified').html(data.date_modified);
		}
		$('#view-po-created_by').html(data.user_name);
		$('#view-po-statusby').html(data.user_name);
		var total = 0;
		$.each(data.items, function(index, value){
			$('#view-po-items').append("<tr>"+
						            		"<td>"+value.name+"</td>"+
						            		"<td>"+value.description+"</td>"+
						            		"<td>"+value.item_type+"</td>"+
						            		"<td class='text-right'>"+value.qty+"</td>"+
						            		"<td >/"+(value.total_cost/value.unit_cost)+"</td>"+
						            		"<td class='text-right'>"+parseFloat(value.unit_cost).toFixed(2).toString().replace(/.(?=(?:[0-9]{3})+\b)/g, '$&,')+"</td>"+
						            		"<td class='text-right'>"+parseFloat(value.total_cost).toFixed(2).toString().replace(/.(?=(?:[0-9]{3})+\b)/g, '$&,')+"</td>"+
						            	"</tr>");
			total = total + parseFloat(value.total_cost);
		});
		$('#view-po-modal .modal-footer').append("<h4><b class='pull-left'>Total Amount: &#8369;<u> "+total+"</u></b></h4><button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>");
		$('#view-po-modal').modal('show');
	});
	$('#incomplete-table').on('click', '.view-po', function(){
		$('#view-po-items').html('');
		$('#view-po-modal .modal-footer').html('');
		var data = incomplete_table.row(this.closest('tr')).data();
		$('#view-po-po_no').html(data.iar_no);
		$('#view-po-date_created').html(data.date_created);
		$('#view-po-status').html(data.status);
		if(data.date_modified == null){
			$('#view-po-date_modified').html("N/A");
		}else{
			$('#view-po-date_modified').html(data.date_modified);
		}
		$('#view-po-created_by').html(data.user_name);
		$('#view-po-statusby').html(data.user_name);
		var total = 0;
		$.each(data.items, function(index, value){
			$('#view-po-items').append("<tr>"+
						            		"<td>"+value.name+"</td>"+
						            		"<td>"+value.description+"</td>"+
						            		"<td>"+value.item_type+"</td>"+
						            		"<td class='text-right'>"+value.qty+"</td>"+
						            		"<td >/"+(value.total_cost/value.unit_cost)+"</td>"+
						            		"<td class='text-right'>"+parseFloat(value.unit_cost).toFixed(2).toString().replace(/.(?=(?:[0-9]{3})+\b)/g, '$&,')+"</td>"+
						            		"<td class='text-right'>"+parseFloat(value.total_cost).toFixed(2).toString().replace(/.(?=(?:[0-9]{3})+\b)/g, '$&,')+"</td>"+
						            	"</tr>");
			total = total + parseFloat(value.total_cost);
		});
		$('#view-po-modal .modal-footer').append("<h4><b class='pull-left'>Total Amount: &#8369;<u> "+total+"</u></b></h4><button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>");
		$('#view-po-modal').modal('show');
	});
	$('#select-all').change(function(){
		if($(this).is(":checked")){
			$('.item-delivered').prop('checked', true);
		}else{
			$('.item-delivered').prop('checked', false);
		}
		maxAll();
	});
	$(document).on('change', '.item-delivered',function(e){
		if($('.item-delivered:checked').length == $('.item-delivered').length){
			$('#select-all').prop('checked', true);
		}else{
			$('#select-all').prop('checked', false);
		}
		maxAll();
	});
	$(document).on('change', 'input[name="item_dqty[]"]',function(e){
		
	});
	function maxAll(){
		$.each($('.item-delivered:checked'),function(index,value){
			var cb = $('.item-delivered:checked').eq(index).closest('tr').find('input[name="item_dqty[]"]');
			cb.attr('disabled',false);
			if(cb.val() > 0){
			}else{
				var val = $(cb).closest('tr').find('input[name="item_qty[]"]').val();
				cb.val(val);
			}
		});
		$('.item-delivered:not(:checked)').closest('tr').find('input[name="item_dqty[]"]').attr('disabled',true).val(0);
	}
}