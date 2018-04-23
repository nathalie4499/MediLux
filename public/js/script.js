
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