/** $(document).ready(function(){
	$("#search").keyup(function(){
		
	var search = $(this).val();
	var data = 'patient' + search;
	
	if (search.length>2){
		
	}
	else
	{
		$("#result").html('');
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{search:txt},
			dataType:"text",
			success: function(data)
			{
				$('result').html(data);
			}
		});
	}
		
			

		
		});

		
	});
	**/
