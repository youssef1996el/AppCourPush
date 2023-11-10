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
            setError(emailProfesseur, 'Email is required');
        } else if (!isValidEmailProfesseur(emailProfesseurValue)) {
            setError(emailProfesseur, 'Provide a valid email address');
        } else {
            setSuccess(emailProfesseur);
        }

        if(nomProfesseurValue === '') {

            setError(nomProfesseur, 'nom is required');
        } else {
            setSuccess(nomProfesseur);
        }

        if(prenomProfesseurValue === '') {

            setError(prenomProfesseur, 'prenom is required');
        } else {
            setSuccess(prenomProfesseur);
        }

        if(passwordProfesseurValue === '') {
            setError(passwordProfesseur, 'Password is required');
        } else if (passwordProfesseurValue.length < 8 ) {
            setError(passwordProfesseur, 'Password must be at least 8 character.')
        } else {
            setSuccess(passwordProfesseur);
        }

        if(confirmpasswordProfesseurValue === '') {
            setError(confirmpasswordProfesseur, 'confirm Password is required');
        } else if (confirmpasswordProfesseurValue.length < 8 ) {
            setError(confirmpasswordProfesseur, ' confirm Password must be at least 8 character.')
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
            setError(emailEleve, 'Email is required');
        } else if (!isValidEmail(emailEleveValue)) {
            setError(emailEleve, 'Provide a valid email address');
        } else {
            setSuccess(emailEleve);
        }

        if(passwordEleveValue === '') {
            setError(passwordEleve, 'Password is required');
        } else if (passwordEleveValue.length < 8 ) {
            setError(passwordEleve, 'Password must be at least 8 character.')
        } else {
            setSuccess(passwordEleve);
        }

        if(ConfirmpasswordEleveValue === '') {
            setError(confirmPasswordEleve, 'Password is required');
        } else if (ConfirmpasswordEleveValue.length < 8 ) {
            setError(confirmPasswordEleve, 'Password must be at least 8 character.')
        } else {
            setSuccess(confirmPasswordEleve);
        }

        if(nomEleveValue === '') {

            setError(nomEleve, 'nom is required');
        } else {
            setSuccess(nomEleve);
        }

        if(paysValue === '') {

            setError(pays, 'pays is required');
        } else {
            setSuccess(pays);
        }

        if(prenomEleveValue === '') {

            setError(prenomEleve, 'prenom is required');
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
        if($(this).val() !== passwordEleveCheck)
        {
            console.log('password is not coorect');
            $('.checkPassword').css({
                'display': 'block',
                'color'  : 'red'
            });
            $('.checkPassword').text('password is not coorect')
        }
        else
        {
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
        if($(this).val() !== passwordProfCheck)
        {

            $('.checkPassword').css({
                'display': 'block',
                'color'  : 'red'
            });
            $('.checkPassword').text('password is not coorect')
        }
        else
        {
            $('.checkPassword').css('display', 'none');
        }
   });


   /******************************************************************** Password ******************************/
    const passwordInput = document.querySelector("#passwordEleve");
    const requirementList = document.querySelectorAll(".requirement-list li");


    const requirements = [
        { regex: /.{8,}/, index: 0 },
        { regex: /[0-9]/, index: 1 },
        { regex: /[a-z]/, index: 2 },
        { regex: /[^A-Za-z0-9]/, index: 3 },
        { regex: /[A-Z]/, index: 4 },
    ]

    passwordInput.addEventListener("keyup", (e) => {
        requirements.forEach(item => {

            const isValid = item.regex.test(e.target.value);
            const requirementItem = requirementList[item.index];


            if (isValid) {
                requirementItem.classList.add("valid");
                requirementItem.firstElementChild.className = "fa-solid fa-check";
            } else {
                requirementItem.classList.remove("valid");
                requirementItem.firstElementChild.className = "fa-solid fa-circle";
            }
        });
    });


});
