$(document).ready(function()
{
	
	function searchPatient(dataFromTable)
	{
		$.post
		('/patient/search', // call function searchPatient() in searchcontroller via routes.yaml
			{
			dataFromTable: dataFromTable 
 //send characters to searchPatient()
			}).done
			   (
				
			   ).fail(function(sam){
				   console.log(sam);

			 
			  });
		console.log("data form rable " + dataFromTable);

	}
		$('#birthname').on
						(
						  'keyup', function()
						  		   {
							  		searchData($(this).val());
						  		   }
						);
});