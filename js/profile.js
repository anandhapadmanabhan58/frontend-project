$(document).ready(function () {

    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    function isValidEmail(email) {
        return emailPattern.test(email);
    }

    // From Submission handler

    $("#myform").submit(function (event) {
        event.preventDefault();

        // Get the entered email address
        let email = $("#emailInput").val();
        console.log(email)

        // check if the email is valid
        if (isValidEmail(email)) {
            alert('Email Valid');
        } else {
            alert('Email Invalid')
        }
    })




    // $("#myform").validate({
    //     rules: {
    //         field: {
    //             required: true
    //         },
    //         email: {
    //             required: true,
    //             email: true
    //         },
    //         number: {
    //             required: true,
    //             number: true
    //         },
    //         password: {
    //             required: true,
    //             minlength: 5
    //         },
    //         url: {
    //             required: true,
    //             url: true
    //         }
    //     }
    // });
});