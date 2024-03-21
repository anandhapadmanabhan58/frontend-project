$(document).ready(function () {
  $("#dialog").hide();
  $("#field").hide();
  $("#mail").hide();
  $("#submit").click(function (e) {
    e.preventDefault();
    const name = $("#name").val();
    const email = $("#email").val();
    const message = $("#message").val();

    if (name == "" || email == "" || message == "") {
      $("#field").dialog({
        title: "Solace",
      });
      return false;
    } else if (IsEmail(email) == false) {
      $("#mail").dialog({
        title: "Solace",
      });
      return false;
    } else {
      $("#dialog").dialog({
        title: "Solace",
      });
      return true;
    }
    return false;
  });
});

function IsEmail(email) {
  const mail =
    /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if (!mail.test(email)) {
    return false;
  } else {
    return true;
  }
}
