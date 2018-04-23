function searchSpecialization(specializationFromForm)
{
	$.post
	(
		'/addressbook/search',
		{
			specialization: specializationFromForm
		},
		function(responseData)
		{
			//$('.username-validation').remove();
			
			if(responseData.available)
			{
				$('label[for="specialization"]').append
												(
												  '<span class="username-available username-validation"> available</span>'
												);
				return;
			}
			$('label[for="specialization"]').append
											(
											  '<span class="username-unavailable username-validation"> unavailable</span>'
											);
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
