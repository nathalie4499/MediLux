function searchSpecialization(specializationFromForm)
{
	
	$.post
	('/addressbook/search',
		{
			specialization: specializationFromForm
		},
		function(responseData)
		{
			//$(".dropdown").remove();
			if(responseData.available)
			{
				alert(responseData);
				$( ".foundlist" ).append( "<p>Okkkkkkkkkkkkk</p>" );
				//$(".dropdown-toggle").dropdown("toggle");
				return;
			}
			$( ".foundlist" ).append( "<p>There is no response</p>" );
			 
			
		}
	);
}
$('#specialization').on
					(
					  'keyup', function()
					  		   {
						  		searchSpecialization($(this).val());
					  		   }
					);
