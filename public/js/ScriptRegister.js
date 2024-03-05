$(document).ready(function () {
    /******************************** eleve ***********************************/
    const formEleve             = $('#formEleve');
    const nomEleve              = $('#nomEleve');
    const prenomEleve           = $('#prenomEleve');
    const emailEleve            = $('#emailEleve');
    const passwordEleve         = $('#passwordEleve');
    const confirmPasswordEleve  = $('#confirmPasswordEleve');
    const pays                  = $('#pays');
    /******************************** end eleve ********************************/

     /********************************* professeur *******************************/
     const formProfesseur                = $('#formProfesseur');
     const nomProfesseur                 = $('#nomProfesseur');
     const prenomProfesseur              = $('#prenomProfesseur');
     const emailProfesseur               = $('#emailProfesseur');
     const passwordProfesseur            = $('#passwordProfesseur');
     const confirmpasswordProfesseur     = $('.confirmpasswordProfesseur');



     formProfesseur.on('submit', function (e) {
        e.preventDefault();
        var inputIds = ['nomProfesseur', 'prenomProfesseur', 'emailProfesseur','passwordProfesseur',
                        'confirmpasswordProfesseur'];
        var allInputsValid = true;

        for (var i = 0; i < inputIds.length; i++) {
            var inputId = inputIds[i];
            var inputValue = $('#' + inputId).val();

            if (inputValue === '')
            {

                $('.ErrorValidation').css('display', 'block');
                allInputsValid = false;
            }
        }
        // Check password length
        var password = $('#passwordProfesseur').val();
        if (password.length < 8) {
            $('.ErrorValidation').text('Password must be at least 8 characters long.').css('display', 'block');
            allInputsValid = false;
        }

        // Check password confirmation
        var confirmPassword = $('#confirmpasswordProfesseur').val();
        if (password !== confirmPassword) {
            $('.ErrorValidation').text('Passwords do not match.').css('display', 'block');
            allInputsValid = false;
        }

        if (allInputsValid) {
            this.submit();
        }


        if (validateInputsProfesseur())
        {
        }

     });

     /********************************** end professeur **************************/

    formEleve.on('submit', function (e) {
        e.preventDefault();
        var inputIds = ['nomEleve', 'prenomEleve', 'emailEleve','passwordEleve','confirmPasswordEleve','pays'];
        var allInputsValid = true;

        for (var i = 0; i < inputIds.length; i++) {
            var inputId = inputIds[i];
            var inputValue = $('#' + inputId).val();

            if (inputValue === '')
            {
                $('.ErrorValidation').css('display', 'block');
                allInputsValid = false;
            }
        }

       // Check password length
        var password = $('#passwordEleve').val();
        if (password.length < 8) {
            $('.ErrorValidation').text('Password must be at least 8 characters long.').css('display', 'block');
            allInputsValid = false;
        }

        // Check password confirmation
        var confirmPassword = $('#confirmPasswordEleve').val();
        if (password !== confirmPassword) {
            $('.ErrorValidation').text('Passwords do not match.').css('display', 'block');
            allInputsValid = false;
        }

        if (allInputsValid) {
            this.submit();
        }


        if (validateInputs())
        {

        }

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

    const isValidEmail = emailEleve => {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;
        return re.test(String(emailEleve).toLowerCase());
    }

    const isValidEmailProfesseur = emailProfesseur => {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;
        return re.test(String(emailProfesseur).toLowerCase());
    }
    /**************************************************************************** Professeur **************************************/
    const validateInputsProfesseur = () => {
        const emailProfesseurValue           = emailProfesseur.val().trim();
        const nomProfesseurValue             = nomProfesseur.val().trim();
        const prenomProfesseurValue          = prenomProfesseur.val().trim();
        const passwordProfesseurValue        = passwordProfesseur.val().trim();
        const confirmpasswordProfesseurValue = confirmpasswordProfesseur.val().trim();




        if (emailProfesseurValue === '') {
            setError(emailProfesseur, 'L\'adresse email est requise');
        } else if (!isValidEmailProfesseur(emailProfesseurValue)) {
            setError(emailProfesseur, 'Veuillez fournir une adresse email valide');
        } else {
            setSuccess(emailProfesseur);
        }

        if(nomProfesseurValue === '') {

            setError(nomProfesseur, 'Nom est requis');
        } else {
            setSuccess(nomProfesseur);
        }

        if(prenomProfesseurValue === '') {

            setError(prenomProfesseur, 'Prenom est requis');
        } else {
            setSuccess(prenomProfesseur);
        }

        if(passwordProfesseurValue === '') {
            setError(passwordProfesseur, 'Mot de passe est requis');
        } else if (passwordProfesseurValue.length < 8 ) {
            setError(passwordProfesseur, 'Mot de passe doit contenir au moins 8 caractères')
        } else {
            setSuccess(passwordProfesseur);
        }

        if(confirmpasswordProfesseurValue === '') {
            setError(confirmpasswordProfesseur, 'Confirmation de mot de passe est requis');
        } else if (confirmpasswordProfesseurValue.length < 8 ) {
            setError(confirmpasswordProfesseur, 'Mot de passe doit contenir au moins 8 caractères')
        } else {
            setSuccess(confirmpasswordProfesseur);
        }






    };


    /**************************************************************************** End Professeur **************************************/
    const validateInputs = () => {
        /*********************************************************************** Eleve ********************************************/
        const emailEleveValue           = emailEleve.val().trim();
        const nomEleveValue             = nomEleve.val().trim();
        const prenomEleveValue          = prenomEleve.val().trim();
        const passwordEleveValue        = passwordEleve.val().trim();
        const ConfirmpasswordEleveValue = confirmPasswordEleve.val().trim();
        const paysValue                 = pays.val().trim();

        if (emailEleveValue === '') {
            setError(emailEleve, 'L\'adresse email est requise');
        } else if (!isValidEmail(emailEleveValue)) {
            setError(emailEleve, 'Veuillez fournir une adresse email valide');
        } else {
            setSuccess(emailEleve);
        }

        if(passwordEleveValue === '') {
            setError(passwordEleve, 'Mot de pass est requis');
        } else if (passwordEleveValue.length < 8 ) {
            setError(passwordEleve, 'Mot de passe doit contenir au moins 8 caractères')
        } else {
            setSuccess(passwordEleve);
        }

        if(ConfirmpasswordEleveValue === '') {
            setError(confirmPasswordEleve, 'Confirmation de mot de passe est requis');
        } else if (ConfirmpasswordEleveValue.length < 8 ) {
            setError(confirmPasswordEleve, 'Mot de passe doit contenir au moins 8 caractères')
        } else {
            setSuccess(confirmPasswordEleve);
        }

        if(nomEleveValue === '') {

            setError(nomEleve, 'Nom est requis');
        } else {
            setSuccess(nomEleve);
        }

        if(paysValue === '') {

            setError(pays, 'Pays est requis');
        } else {
            setSuccess(pays);
        }

        if(prenomEleveValue === '') {

            setError(prenomEleve, 'Prenom est requis');
        } else {
            setSuccess(prenomEleve);
        }


        /*********************************************************************** End Eleve ********************************************/

    };

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

    $('input#nomEleve, input#prenomEleve, input#emailEleve, input#passwordEleve, input#confirmPasswordEleve, input#nomProfesseur, input#prenomProfesseur, input#emailProfesseur, input#passwordProfesseur, input#confirmpasswordProfesseur').on('focus', function() {
        $('.ErrorValidation').css('display', 'none');
        $('.form-group input').css('border-bottom','1px solid #999');
    });

    var passwordEleveCheck ='';
    var passwordProfCheck  ='';
    $('#confirmPasswordEleve').on("focus",function()
    {

        passwordEleveCheck = $('#passwordEleve').val();

    });
   $('#confirmPasswordEleve').on('input',function()
   {
    if ($(this).val() !== passwordProfCheck) {
        if ($(this).val().length <= 8) { // Check if the password length is less than or equal to 8
            $('.checkPassword').css({
                'display': 'block',
                'color'  : 'red',
                'font-size': '14px'
            });
            $('.checkPassword').text('Le mot de passe doit contenir plus de 8 caractères.');
        } else {
            $('.checkPassword').css({
                'display': 'block',
                'color'  : 'red',
                'font-size': '14px'
            });
            $('.checkPassword').text('Les mots de passe ne correspondent pas.');
        }
    } else {
        $('.checkPassword').css('display', 'none');
    }
   });
   /***************** Prof *******/
   $('#confirmpasswordProfesseur').on("focus",function()
   {
        passwordProfCheck = $('#passwordProfesseur').val();
   });
   $('#confirmpasswordProfesseur').on('input',function()
   {
    if ($(this).val() !== passwordProfCheck) {
        if ($(this).val().length <= 8) { // Check if the password length is less than or equal to 8
            $('.checkPassword').css({
                'display': 'block',
                'color'  : 'red',
                'font-size': '14px'
            });
            $('.checkPassword').text('Le mot de passe doit contenir plus de 8 caractères.');
        } else {
            $('.checkPassword').css({
                'display': 'block',
                'color'  : 'red',
                'font-size': '14px'
            });
            $('.checkPassword').text('Les mots de passe ne correspondent pas.');
        }
    } else {
        $('.checkPassword').css('display', 'none');
    }
   });



   const passwordInputIds = [
    { inputId: "passwordEleve", eyeId: "eyeE" },
    { inputId: "confirmPasswordEleve", eyeId: "eyeCE" },
    { inputId: "passwordProfesseur", eyeId: "eyeP" },
    { inputId: "confirmpasswordProfesseur", eyeId: "eyeCP" },



];

passwordInputIds.forEach(function(pair) {
    const passwordInput = document.getElementById(pair.inputId);
    const togglePasswordButton = document.getElementById(pair.eyeId);

    if (passwordInput && togglePasswordButton) {
        togglePasswordButton.addEventListener("click", function () {
            const type = passwordInput.getAttribute("type");
            passwordInput.setAttribute("type", type === "password" ? "text" : "password");

            // Toggle the eye icon
            togglePasswordButton.classList.toggle("fa-eye");
            togglePasswordButton.classList.toggle("fa-eye-slash");
        });
    }
});
});
