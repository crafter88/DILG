var initTables = function(scope, compile){
	var base_url = $('#base_url').val();

	var first_table = $('#first-table').DataTable({
		ajax: base_url+'head/ppmp/first_quarter',
		columns: [
					{'data': 'name'},
					{'data': 'description'},
					{'data': 'qty'},
					{'data': 'unit_cost'},
					{'data': 'total_cost'},
				],
		initComplete: function(settings, json) {
			if(first_table.data().count() > 0){
				$('#upload_ppmp_1').css('display', 'none');
				$('.form_id_1').val(first_table.rows().data()[0].form_id);
				$('#delete_ppmp_1').css('display', 'block');
			}else{
				$('#upload_ppmp_1').css('display', 'block');
				$('#delete_ppmp_1').css('display', 'none');
			}
	  	}

	});
	
	var second_table = $('#second-table').DataTable({
		ajax: base_url+'head/ppmp/second_quarter',
		columns: [
					{'data': 'name'},
					{'data': 'description'},
					{'data': 'qty'},
					{'data': 'unit_cost'},
					{'data': 'total_cost'},
				],
		initComplete: function(settings, json) {
			if(second_table.data().count() > 0){
				$('#upload_ppmp_2').css('display', 'none');
				$('.form_id_2').val(second_table.rows().data()[0].form_id);
				$('#delete_ppmp_2').css('display', 'block');
			}else{
				$('#upload_ppmp_2').css('display', 'block');
				$('#delete_ppmp_2').css('display', 'none');
			}
	  	}

	});
	var third_table = $('#third-table').DataTable({
		ajax: base_url+'head/ppmp/third_quarter',
		columns: [
					{'data': 'name'},
					{'data': 'description'},
					{'data': 'qty'},
					{'data': 'unit_cost'},
					{'data': 'total_cost'},
				],
		initComplete: function(settings, json) {
			if(third_table.data().count() > 0){
				$('#upload_ppmp_3').css('display', 'none');
				$('.form_id_3').val(third_table.rows().data()[0].form_id);
				$('#delete_ppmp_3').css('display', 'block');
			}else{
				$('#upload_ppmp_3').css('display', 'block');
				$('#delete_ppmp_3').css('display', 'none');
			}
	  	}

	});

	var fourth_table = $('#fourth-table').DataTable({
		ajax: base_url+'head/ppmp/fourth_quarter',
		columns: [
					{'data': 'name'},
					{'data': 'description'},
					{'data': 'qty'},
					{'data': 'unit_cost'},
					{'data': 'total_cost'},
				],
		initComplete: function(settings, json) {
			if(fourth_table.data().count() > 0){
				$('#upload_ppmp_4').css('display', 'none');
				$('.form_id_4').val(fourth_table.rows().data()[0].form_id);
				$('#delete_ppmp_4').css('display', 'block');
			}else{
				$('#upload_ppmp_4').css('display', 'block');
				$('#delete_ppmp_4').css('display', 'none');
			}
	  	}

	});

	$.get(base_url + '/gss/head/ppmp/first_quarter_filename', function(response){
		if(JSON.parse(response).length !== 0){
			console.log(JSON.parse(response));
			$('#first_quarter_filename_label').html(JSON.parse(response)[0].filename);
			$.each(JSON.parse(response), function(index, value){
				if(JSON.parse(response)[index].flag === '0'){
					$('#first_active').css('display', 'block');
					$('#first_inactive').css('display', 'none');
				}else{
					$('#first_active').css('display', 'none');
					$('#first_inactive').css('display', 'block');
					return false;
				}
			});
			
		}else{
			$('#first_active').css('display', 'none');
			$('#first_inactive').css('display', 'none');
		}
	});

	$.get(base_url + '/gss/head/ppmp/second_quarter_filename', function(response){
		if(JSON.parse(response).length !== 0){
			console.log(JSON.parse(response));
			$('#second_quarter_filename_label').html(JSON.parse(response)[0].filename);
			$.each(JSON.parse(response), function(index, value){
				if(JSON.parse(response)[index].flag === '0'){
					$('#second_active').css('display', 'block');
					$('#second_inactive').css('display', 'none');
				}else{
					$('#second_active').css('display', 'none');
					$('#second_inactive').css('display', 'block');
					return false;
				}
			});
		}else{
			$('#second_active').css('display', 'none');
			$('#second_inactive').css('display', 'none');
		}
	});

	$.get(base_url + '/gss/head/ppmp/third_quarter_filename', function(response){
		if(JSON.parse(response).length !== 0){
			console.log(JSON.parse(response));
			$('#third_quarter_filename_label').html(JSON.parse(response)[0].filename);
			$.each(JSON.parse(response), function(index, value){
				if(JSON.parse(response)[index].flag === '0'){
					$('#third_active').css('display', 'block');
					$('#third_inactive').css('display', 'none');
					alert(JSON.parse(response)[0].flag);
				}else{
					$('#third_active').css('display', 'none');
					$('#third_inactive').css('display', 'block');
					return false;
				}
			});
		}else{
			$('#third_active').css('display', 'none');
			$('#third_inactive').css('display', 'none');
		}
	});

	$.get(base_url + '/gss/head/ppmp/fourth_quarter_filename', function(response){
		if(JSON.parse(response).length !== 0){
			console.log(JSON.parse(response));
			$('#fourth_quarter_filename_label').html(JSON.parse(response)[0].filename);
			$.each(JSON.parse(response), function(index, value){
				if(JSON.parse(response)[index].flag === '0'){
					$('#fourth_active').css('display', 'block');
					$('#fourth_inactive').css('display', 'none');
				}else{
					$('#fourth_active').css('display', 'none');
					$('#fourth_inactive').css('display', 'block');
					return false;
				}
			});
		}else{
			$('#fourth_active').css('display', 'none');
			$('#fourth_inactive').css('display', 'none');
		}
	});
}