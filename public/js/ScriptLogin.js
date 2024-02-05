$(document).ready(function ()
{

    const form = $('#form');
    const email = $('#email');
    const password = $('#password');

    form.on('submit', function (e) {

        e.preventDefault();
        if(email.val() == "")
        {
            validateInputs();
        }
        else if(password.val() == "")
        {
            validateInputs();
        }
        else
        {
            this.submit();
        }


        if (validateInputs()) {
        }



    });
   /*  setTimeout(function() {
        document.getElementById('error-alert').style.display = 'none';
    }, 5000); */
    function isErrorDisplayed(element) {
        const inputControl = element.parent();
        return inputControl.hasClass('error');
    }
    email.on('input', function () {
        validateEmail();
    });

    password.on('input', function () {
        validatePassword();
    });

    const setError = (element, message) => {
        const inputControl = element.parent();
        const errorDisplay = inputControl.find('.error');

        errorDisplay.text(message);
        inputControl.addClass('error').removeClass('success');
    }

    const setSuccess = element => {
        const inputControl = element.parent();
        const errorDisplay = inputControl.find('.error');

        errorDisplay.text('');
        inputControl.addClass('success').removeClass('error');
    };

    const isValidEmail = email => {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    const validateEmail = () => {
        const emailValue = email.val().trim();
        if (emailValue === '') {
            setError(email, 'L\'adresse email est requise');
        } else if (!isValidEmail(emailValue)) {
            setError(email, 'Veuillez fournir une adresse email valide');
        } else {
            setSuccess(email);
        }
    }


    const validatePassword = () => {
        const passwordValue = password.val().trim();
        if (passwordValue === '') {
            setError(password, 'Le mot de passe est requis');
        } else if (passwordValue.length < 8) {
            setError(password, 'Le mot de passe doit comporter au moins 8 caractères.');
        } else {
            setSuccess(password);
        }
    }

    const validateInputs = () => {
        validateEmail();
        validatePassword();

        return form.find('.error').length === 0;
    };

    const passwordInput = document.getElementById("password");
    const togglePasswordButton = document.getElementById("eye");

    togglePasswordButton.addEventListener("click", function () {
        const type = passwordInput.getAttribute("type");
        if (type === "password") {
            passwordInput.setAttribute("type", "text");
            togglePasswordButton.classList.remove("fa-eye");
            togglePasswordButton.classList.add("fa-eye-slash");
        } else {
            passwordInput.setAttribute("type", "password");
            togglePasswordButton.classList.remove("fa-eye-slash");
            togglePasswordButton.classList.add("fa-eye");
        }
    });

    window.onload = function() {
        window.scrollTo(0, 0);
    };
    var navbar = $('.navbar');
    navbar.addClass('shadow-none');


    function handleScroll()
    {
        var scrollPosition = $(window).scrollTop();

        if (scrollPosition > 10) {
            navbar.addClass('shadow');
            navbar.removeClass('shadow-none');
        } else {
            navbar.removeClass('shadow');
            navbar.addClass('shadow-none');
        }
    }
    handleScroll();
    $(window).scroll(handleScroll);

    $('input#email, input#password').on('focus', function() {
        $('#error-alert').hide();
    });


});





   /* togglePasswordButton.addEventListener("click", function () {
    console.log(passwordInput);
    passwordInput.type = passwordInput.type === "password" ? "text" : "password";
});*/
