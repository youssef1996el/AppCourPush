
$(document).ready(function ()
{
    print_country("countryDropdown");
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#wizard-picture").change(function()
    {
        readURL(this);
    });
    document.getElementById('showInputsLink').addEventListener('click', function()
    {
        var inputsContainer = document.getElementById('inputsContainer');
        inputsContainer.style.display = (inputsContainer.style.display === 'none' || inputsContainer.style.display === '') ? 'block' : 'none';
    });
    const passwordInputIds =
    [
        { inputId: "mdpActuelle", eyeId: "actualEye" },
        { inputId: "nouveaumdp", eyeId: "newEye" },
        { inputId: "Confirmermdp", eyeId: "cfrmEye" },

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
    /* var currentPassword = '';

    $('input[name="currentPassword"]').on('blur', function () {
        currentPassword = $(this).val();
    });

    $('input[name="newPassword"]').on('keyup', function () {
        var newPassword = $(this).val();

        if (newPassword === currentPassword) {
            $('#errorNewPassword').text('Erreur : Le nouveau mot de passe est identique à l\'ancien.').css('color', 'red');
        } else {
            $('#errorNewPassword').text('');
        }
    });

    $('input[name="confirmPassword"]').on('blur', function () {
        var confirmedPassword = $(this).val();

        if (confirmedPassword !== $('input[name="newPassword"]').val()) {
            $('#errorConfirmPassword').text('Erreur : Les mots de passe ne correspondent pas.').css('color', 'red');
        } else {
            $('#errorConfirmPassword').text('');
        }
    }); */







    var currentPassword = '';

    $('#mdpActuelle').on('blur', function () {
        currentPassword = $(this).val();
    });

    $('#nouveaumdp').on('input', function () {
        var newPassword = $(this).val();

        if (newPassword === currentPassword)
        {

            $('#errorNewPassword').text('Erreur : Le nouveau mot de passe est identique à l\'ancien.').css('color', 'red');
        }
        else
        {
            $('#errorNewPassword').text('');
        }
    });

    /* $('#Confirmermdp').on('blur', function () {
        var confirmedPassword = $(this).val();

        if (confirmedPassword !== $('input[name="newPassword"]').val()) {
            $('#errorConfirmPassword').text('Erreur : Les mots de passe ne correspondent pas.').css('color', 'red');
        }
        else
        {
            $('#errorConfirmPassword').text('');
        }
    }); */

    $('#Confirmermdp').on('input',function()
    {
        var ConfirmPassword = $(this).val();
        if(ConfirmPassword !== $('#nouveaumdp').val())
        {
            $('#errorConfirmPassword').text('Erreur : Les mots de passe ne correspondent pas.').css('color', 'red');
        }
        else
        {
            $('#errorConfirmPassword').text('');
        }
    });
});
