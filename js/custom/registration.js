$().ready(function () {
    // validate the comment form when it is submitted
    // validate signup form on keyup and submit
    $("#registration").validate({
        rules: {
            school_name: "required",
            user_name: "required",
            password: {
                required: true,
                atLeastOneLowercaseLetter: true,
                atLeastOneUppercaseLetter: true,
                atLeastOneNumber: true,
                atLeastOneSymbol: true,
                minlength: 8,
                maxlength: 15
            },
            c_password: {
                required: true,
                minlength: 8,
                maxlength: 15,
                equalTo: "#password"
            },
            school_email: {
                required: true,
                email: true,
            },
        },
        messages: {
            school_name: "Please enter School Name",
            user_name: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
            },
            c_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long",
                equalTo: "Please enter the same password as above"
            },
            school_email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address."
            },
        }
    });

    /**
 * Custom validator for contains at least one lower-case letter
 */
    $.validator.addMethod("atLeastOneLowercaseLetter", function (value, element) {
        return this.optional(element) || /[a-z]+/.test(value);
    }, "Must have at least one lowercase letter");

    /**
     * Custom validator for contains at least one upper-case letter.
     */
    $.validator.addMethod("atLeastOneUppercaseLetter", function (value, element) {
        return this.optional(element) || /[A-Z]+/.test(value);
    }, "Must have at least one uppercase letter");

    /**
     * Custom validator for contains at least one number.
     */
    $.validator.addMethod("atLeastOneNumber", function (value, element) {
        return this.optional(element) || /[0-9]+/.test(value);
    }, "Must have at least one number");

    /**
     * Custom validator for contains at least one symbol.
     */
    $.validator.addMethod("atLeastOneSymbol", function (value, element) {
        return this.optional(element) || /[!@#$%^&*()]+/.test(value);
    }, "Must have at least one symbol");

});