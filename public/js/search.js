
	
	function searchPatient(dataFromTable)
	{
		console.log(dataFromTable);
		$.post
		('/patient/search', // call function searchPatient() in searchcontroller via routes.yaml
			{
			dataFromTable: dataFromTable 
 //send characters to searchPatient()
			}).done
			   (
				function(responseData){
					console.log(responseData);
					
					$('.result tr').remove();
					
					var empty = responseData.length;
					if (empty > 0)
					{
						console.log("dans le if");
					for (i = 0; i < responseData.length; i++){
						console.log(responseData[i].birthname);
						console.log("dans le for");
						$('.result').append
						(
							'<tr>'	+
							'<td>'  + responseData[i].ssn + '</td>' +
							'<td>'  + responseData[i].givenname + '</td>' +
							'<td>'  + responseData[i].birthname + '</td>' +
							'<td>'  + responseData[i].maritalname + '</td>' +
							'<td>'  + responseData[i].nationality + '</td>' +
							'<td>'  + responseData[i].telephone + '</td>' +
							'<td>'  + responseData[i].age + '</td>' +
							'<td>'  +
							'<i class="fas fa-info-circle"></i>' + '</td>' +
							'</tr>'
						);

					}
					return;
				}
					//location.reload();
			}
			   ).fail(function(sam){
				   console.log(sam);


			 
			  });

	}
		$('#search').bind
						(
						  'input', function()
						  		   {
									  
									  searchPatient($(this).val());
						  		   }
						);
	


