$("#login").validate({
    // onfocusout: function(element) {
    //        this.element(element);
    //     },
        rules: {
            userid:"required",
            password:"required"

        },
        messages: {
            userid:"Please Enter A Valid User-Id or Email-Id",
            password:"Password Should Be Not Left Blank"

        }
       
    })
  $('#login_button').click(function() {
        $("#login").valid();
      });