function searchData(dataFromForm)
{
	$.post
	('/addressbook/search', // call function searchDoctor() in addresbookcontroller via routes.yaml
		{
			dataFromForm: $('#specialization').val() //send characters to searchDoctor()
		}).done
		   (
			function(responseData) //receive json from searchDoctor()
			{
				console.log(responseData);
			}
		   ).fail(function(sam){
			   console.log(sam);
		   });
	console.log(dataFromForm);
}
$('#specialization').on
					(
					  'keyup', function()
					  		   {
						  		searchData($(this).val());
					  		   }
					);
