$(document).ready(function()
{
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
					var empty = $.isEmptyObject({responseData});
					console.log(empty);
					
					if (!empty)
					{
						for (i = 0; i < responseData.length; i++)
						{
							$('.searchResults').append
							(
							  '<tr>' +
							  '<th scope="row">'+ responseData[i].id +'</th>' +
							  '<td>' + responseData[i].specialization +'</td>' +
							  '<td>' + responseData[i].lastname +'</td>' +
							  '<td>' + responseData[i].firstname +'</td>' +
							  '<td>' + responseData[i].telwork +'</td>' +
							  '<td>' + 
							  '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#'+ responseData[i].id +'">' +
					          '{{ \'ADDRESSBOOK.DETAIL\'|trans }}' +
					          '</button>' +
							  '</td>' +
							  '</tr>'
							);
						}
					}
					
				}
			   );
	}
});

