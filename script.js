$(function() {


  $("#contactForm").submit(function(event) {
    event.preventDefault();
    submitForm();
  });


  let submitForm = () => {
    let name = $("#name").val();
    let email = $("#email").val();
    let subject = $("#subject").val();
    let message = $("#message").val();

    $.ajax({
      type: "POST",
      url: "./contact.php",
      data: {
        name: name,
        email: email,
        subject: subject,
        message: message,
        captcha: grecaptcha.getResponse()
      },
      success: function(text){
        if (text == "Recaptcha Success, Mail Sent Successfully") {
          console.log("Mail Sent :" + text);
          formSuccess();
        } else {
          console.log("Mail Send Failure :" + text);
        }
      }
    });

  };

  let formSuccess = () => {
    $("#msgSubmit").removeClass("hidden");
  };

});
