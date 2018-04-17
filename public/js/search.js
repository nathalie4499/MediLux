$(function(){
	$("#search").keyup(function(){
		
	var search = $(this).val();
	var data = 'patient' + search;
	
	if (search.length>2){
		
		$.ajax({
			type:"GET",
			url: "patient.php",
			data: patient,
			success: function(server_response){
				$("#result").html(server_response).fade();
			
		}
		});
	
	}
		
	});
	
	
	
	
});