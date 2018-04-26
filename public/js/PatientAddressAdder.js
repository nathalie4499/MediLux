$( document ).ready(function()
{   
	function addAddressInput()
	{
		var prototype = $('#form_patientaddresslist').data('prototype');
		var count = $('#form_patientaddresslist > .form-group').length;
		var newForm = prototype.replace(/__name__/g, count);
		var group = $('.form-group', newForm);
		
		$('#form_patientaddresslist').append(group);
	}
	
	addAddressInput();
});