( function ($) {
    	var activenav, matches = document.body.className.match(/(^|\s)page-(\w+)(\s|$)/);
		  if (matches) { activenav = matches[2]; }
		  $(".navbar-nav .nav-item").each( function () {
			  if( $(this).hasClass(activenav) ) {
				  $(this).addClass('active').find(".nav-link").append(" <span class='sr-only'>(current)></span>");
			  }
		  });
		  $(".navbar-nav .dropdown-item").each( function () {
			  if( $(this).hasClass(activenav) ) {
				  $(this).addClass('active').append(" <span class='sr-only'>(current)></span>");
			  }
		  });


})(jQuery)