$(document).ready(function(){
	

		
	var inpuVal = $(this).val();
	var resultDropdown = $(this).siblings("result");
	
	if (inputVal.length>=2){
		$.get("fetch.php", {term:
			inputVal}).done(function(data){
				resultDropdown.html(data);
			});
			
		
	}
	else
	{
		resultDropdown.empty();
	}
});
	$(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
