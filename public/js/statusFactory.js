function adjustStatus(status_id, order_id){

	$.ajax({

		url: 'order/edit_status',
		type: 'POST',
		data: { status_id: status_id, order_id: order_id},
		success: function(data){

	
		},
		fail: function(data){

		
		}

	});
}