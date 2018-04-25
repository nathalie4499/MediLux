 $(document).ready(function(){
       $("#search").on('keyup', function(e) { // everytime keyup event
           var input = $(this).val();// We take the input value
           var $search = $('#search');

           $.ajax({
               type: "GET",
               url: "{{ path('drugget') }}",
               dataType: "json",
               data: {search: input},
               cache: false,
               success: function (response) {
                       console.log("response");
                        },
               error: function (response) {
                      console.log(response);
                          }
             });    
       });
   });