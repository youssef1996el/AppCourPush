$(document).ready(function ()
{
    var newPassword = '';

    var newPassword = '';

    $('#Cnfnouveaumotdepasse').on('click', function () {
        newPassword = $('#nouveaumotdepasse').val();

    });
    $('#Cnfnouveaumotdepasse').on('input', function () {
        newPassword = $('#nouveaumotdepasse').val();

    });

    $('#Cnfnouveaumotdepasse').on('input', function () {
        var confirmationPassword = $(this).val();
        var errorContainer = $('.ErrorConfirme');

        if (confirmationPassword == '')
        {

            errorContainer.text('').removeClass('alert alert-danger');
        }

        if (newPassword !== confirmationPassword)
        {
            errorContainer.text('Les mots de passe ne correspondent pas').removeClass('alert alert-success').addClass('alert alert-danger');
        }
        if(newPassword === confirmationPassword)
        {
            if(newPassword == '')
            {
                errorContainer.text('');
            }
            else
            {
                errorContainer.text('Les mots de passe correspondent').removeClass('alert alert-danger').addClass('alert alert-success');
            }

        }
    });

    $('.BtnUpdateDataAdmin').on('click', function ()
    {
        var nom = $('input[name="nom"]').val();
        var Prenom = $('input[name="Prenom"]').val();
        var motdepasse = $('input[name="motdepasse"]').val();

        var hasError = false;
        if(nom == "")
        {
            $('.errorNom').text('le champ obligatoire').css('color', 'red');
            hasError = true;
        }
        else
        {
             hasError = false;
            $('.errorNom').text('');
        }

        if(Prenom == "")
        {
            hasError = true;
            $('.errorPrenom').text('le champ obligatoire').css('color', 'red');
        }
        else
        {
             hasError = false;
            $('.errorPrenom').text('');
        }

        if(motdepasse == "")
        {
            hasError = true;
            $('.errorPassword').text('le champ obligatoire').css('color', 'red');
        }
        else
        {
             hasError = false;
            $('.errorPassword').text('');
        }

        if(!hasError)
        {
            Swal.fire({
                title: "Voulez-vous enregistrer les modifications?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Modifier",
                denyButtonText: `Ne sauvegardez pas`
              }).then((result) => {

                if (result.isConfirmed)
                {

                   /*  Swal.fire("Saved!", "", "success"); */
                    $('#FormUpdateAdmin').submit();
                }
                else if (result.isDenied)
                {
                  Swal.fire("Les modifications ne sont pas enregistrées", "", "info");
                }
            });

        }


    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#wizard-picture").change(function(){
        readURL(this);
    });
});
