$( document ).ready(function()
{   
	function addPatientAddress()
	{
		var prototype = $('#patient_patientaddress').data('prototype');
		var count = $('#patient_patientaddress > .form-group').length;
		var newForm = prototype.replace(/__name__/g, count);
		var group = $('.form-group', newForm);
		
		$('#patient_patientaddress').append(group);
	}
	
	addAddressInput();
	
	function addActiveProblems()
	{
		var prototype = $('#patient_activeproblems').data('prototype');
		var count = $('#patient_activeproblems > .form-group').length;
		var newForm = prototype.replace(/__name__/g, count);
		var group = $('.form-group', newForm);
		
		$('#patient_activeproblems').append(group);
	}
	
	addActiveProblems();
});