
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
})
