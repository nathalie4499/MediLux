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
				$( ".dropdown" ).append( "<p>Okkkkkkkkkkkkk</p>" );
				//$(".dropdown-toggle").dropdown("toggle");
				return;
			}
			$( ".dropdown" ).append( "<p>There is no response</p>" );
			 
			
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
