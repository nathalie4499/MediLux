$( document ).ready(function()
{   
	function addAddressInput()
	{
		var prototype = $('#doctor_address').data('prototype');
		var count = $('#doctor_address > .form-group').length;
		var newForm = prototype.replace(/__name__/g, count);
		var group = $('.form-group', newForm);
		
		$('#doctor_address').append(group);
	}
	
	addAddressInput();
});