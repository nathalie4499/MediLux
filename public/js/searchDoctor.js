$(document).ready(function()
{
	$('#specialization').bind
	(
	  'input', function()
	  {
		  var isEmpty = $('#specialization').val().length;
		  if (isEmpty > 0 )
  		   { 
		  		searchData($(this).val())  
           }
	  }
	);
	
	function searchData(dataFromForm)
	{
		$.post
		('/addressbook/search', // call function searchDoctor() in addresbookcontroller via routes.yaml
			{
				dataFromForm:  dataFromForm //send characters to searchDoctor()
			}).done
			   (
				function(responseData) //receive json from searchDoctor()
				{	
					$('.searchResults tr').remove();
					
					var empty = responseData.length;
					console.log(empty);
					console.log(responseData);
					
					if (empty > 0)
					{
						console.log('inside if');
						for (i = 0; i < responseData.length; i++)
						{
							$('.searchResults').append
							(
							  '<tr>' +							  
							  '<td>' + responseData[i].specialization +'</td>' +
							  '<td>' + responseData[i].lastname +'</td>' +
							  '<td>' + responseData[i].firstname +'</td>' +
							  '<td>' + responseData[i].telwork +'</td>' +
							  '<td>' + 
							  '<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#'+ responseData[i].id +'">' +
					          '<i class="fas fa-info-circle"></i>' +
					          '</a>' +
							  '</td>' +
							  '</tr>'
							);
						}
					return;	
					}
					location.reload();
					
				}
			   );
	}
});

