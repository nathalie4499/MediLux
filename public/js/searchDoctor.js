$(document).ready(function()
{
	
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
					$('.searchResults ul li').remove();
					
					if (responseData)
					{
						for (i = 0; i < responseData.length; i++)
						{
							$('.searchResults ul').append
							(
							  '<li class="list-group-item"><a class="card-link" data-toggle="modal" data-target="#' + responseData[i].id + '">' + responseData[i].specialization +'<a><li>'
							);
						}
					}
						
				}
			   );
	}
	$('#specialization').bind
						(
						  'input', function()
						  {
							  var notEmpty = $('#specialization').val().length;
							  if (notEmpty > 0 )
					  		   { 
							  		searchData($(this).val())  
					           }
						  }
						);
});

