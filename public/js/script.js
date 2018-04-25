
$(document).ready(function() {
  $('li.active').removeClass('active');
  $('a[href="' + location.pathname + '"]').closest('li').addClass('active');
  $('li.LanguageSelector').removeClass('active');
});

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

$('.open-popup-link').magnificPopup({
	// Delay in milliseconds before popup is removed
		removalDelay: 300,
		
		// Class that is added to popup wrapper and background
		// make it unique to apply your CSS animations just to this exact popup
		mainClass: 'mfp-fade',
	  type:'inline',
	  midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
	});

const users = document.getElementById('users');

if (users) {
  users.addEventListener('click', e => {
    if (e.target.className === 'btn btn-danger delete-user') {
      if (confirm('Do you realy want to delete this user?')) {
        const id = e.target.getAttribute('data-id');

        fetch(`/user/delete/${id}`, {
          method: 'DELETE'
        }).then(res => window.location.reload());
      }
    }
  });
};


