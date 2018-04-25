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
					console.log("response data: " + responseData);
				}
			   ).fail(function(sam){
				   console.log(sam);
			   });
		console.log("from form data " + dataFromForm);
	}
	$('#specialization').on
						(
						  'keyup', function()
						  		   {
							  		searchData($(this).val());
						  		   }
						);
});