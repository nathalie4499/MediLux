$(document).ready(function()
{
	$('#specialization').bind
	(
	  'input', function()
	  {
		  searchData($(this).val())  
	  }
	);
	
	function searchData(dataFromForm)
	{
		$.post
		('/addressbook/search', // call function searchDoctor() in addresbookcontroller via routes.yaml
			{
				dataFromForm:  dataFromForm //send characters to searchDoctor()
			}
		).done
		   (
				function(responseData) //receive json from searchDoctor()
				{	
					$('.searchResults tr').remove();
					
					var empty = responseData.length;
					if (empty > 0)
					{
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
					//location.reload();
					
				}
		   );
	}
});

