
	function searchData(dataFromForm)
	{
		$.post
		('/drugs/Search', // call function drugsSearch() in addresbookcontroller via routes.yaml
			{
				dataFromForm:  dataFromForm //send characters to searchDoctor()
			}).done
			   (
				function(responseData) //receive json from searchDoctor()
				{	
					if (responseData)
					{
						$('#displaytable tr').remove()
						for (i = 0; i < responseData.length; i++)
						{
//							var line = $('<tr></tr>');
//							$(line).append(
//								$('<td></td>').html(responseData[i].name)
//							);
//							$(line).append(
//								$('<td></td>').html(responseData[i].supplier)
//							);
//							$(line).append(
//								$('<td></td>').html(responseData[i].dosage)
//							);
//							$(line).append(
//								$('<td></td>').append(
//									$('<button></button>').attr('type', 'button').addClass('btn').attr('data-toggle', 'modal').attr('data-target', '#modal' + responseData[i].id)
//								).append(
//									$('<a></a>').attr('type', 'button').addClass('btn').attr('data-toggle', 'modal').data('trigger', 'click').data('content', 'drug details').append(
//										$('<i></i>').addClass('fas fa-info-circle')
//									)
//								)
//							);
//							$('#displaytable').append(line);
							 $('#displaytable').append
							(
									'<tr>' +							  
									  '<td>' + responseData[i].name +'</td>' +
									  '<td>' + responseData[i].supplier +'</td>' +
									  '<td>' + responseData[i].dosage +'</td>' +
									  '<td>' + 
									  '<button type="button" class="btn" data-toggle="modal" data-target="#modal' + responseData[i].id + '">' + 
									  '<a data-toggle="popover" data-trigger="hover" data-content="drug details"><i class="fas fa-info-circle"></i></a>' +
									  "</button>" + 
									  "<a onclick=\"return confirm('Are your sure to delete the drug ?')\" href=\"\" class=\"btn btn-danger btn-sm\"><i class=\"fas fa-user-times\"></i></a>",
									  "</td>" + 
									  "</tr>"								 
							);
							 //<a onclick="return confirm('Are your sure to delete the drug {{ drug.name }}?')" href="{{ path('drugdelete', { 'drugid': drug.id }) }}" class="btn btn-danger btn-sm"><i class="fas fa-user-times"></i></a>
						//'<a onclick="return confirm('Are your sure to delete the drug ' + responseData[i].name + '?')" href="/drugs/Delete' + responseData[i].id + '" class="btn btn-danger btn-sm"><i class="fas fa-user-times"></i></a></td>
						}
					}
						
				}
			   );
	}
	$('#search').bind
						(
						  'input', function()
						  {
							  //console.log($('#search').val());
							  var notEmpty = $('#search').val().length;
							  if (notEmpty > 0 )
					  		   { 
							  		searchData($(this).val())  
					           }
						  }
						);
