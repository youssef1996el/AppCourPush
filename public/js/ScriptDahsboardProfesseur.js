$(document).ready(function () {
    var listProfofesseur = $('#tableListProfesseur').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'print'
        ],
        "ordering": false,
        "lengthMenu": [3],

        "select": {
            "style": "single"
        },
        "info": false,
        "language":
        {
            "search": "_INPUT_",
            "searchPlaceholder": "Recherche...",
            "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
            "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "Afficher _MENU_ éléments",
            "sLoadingRecords": "Chargement...",
            "sProcessing": "Traitement...",
            "sSearch": "Rechercher :",
            "sZeroRecords": "Aucun élément correspondant trouvé",
            "oPaginate": {
                "sFirst": "Premier",
                "sLast": "Dernier",
                "sNext": "Suivant",
                "sPrevious": "Précédent"
            },
            "oAria": {
                "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
            },
            "select": {
                "rows": {
                "_": "%d lignes sélectionnées",
                "0": "Aucune ligne sélectionnée",
                "1": "1 ligne sélectionnée"
                }
            }
        },
    });

    $(document).on('click', '.BtnView', function()
    {

        $.ajax({
            type  : "get",
            url   : urlViewProfesseur,
            data  :
            {
                id : $(this).attr('data-value'),
            },
            dataType: "json",
            beforeSend: function () {
                // Show overlay with loading animation
                $('#overlay').fadeIn();
            },
            success: function (response)
            {
                if(response.status == 200)
                {
                    $('#overlay').css('display','flex');
                    $('#overlay').fadeOut();
                    var Path = '';
                    var image = '';
                    var PathCertification = '';
                    var fileCertification = '';
                    Path = encodeURIComponent(response.image.slice(1));
                    image = scrimage + decodeURIComponent(Path);
                    ///////// Certificate
                    PathCertification = encodeURIComponent(response.CertificationProf.slice(1));
                    fileCertification = scrCertification + decodeURIComponent(PathCertification);
                    $('.BtnVerification').attr('data-value',response.idProf)
                    $('#FileCertification').attr('href',fileCertification);
                    $('#imageProfesseur').attr('src',image);
                    $('#ModalView').modal("show");
                    $('.titleProfesseur').text(response.data.title);
                    $('.nameProfesseur').text(response.data.name);
                    $('.numberExperince').text(response.NumberExperince+' '+'ans d\'experience');
                    $('.methodeProfesseur').text(response.data.description);
                    $('.emailProfesseur').val(response.data.email);
                    $('.datenaissanceProfesseur').val(response.data.datenaissance);
                    $('.telephoneProfesseur').val(response.data.telephone);
                    $('.CardFormation').empty();
                    $('.Cardexperience .InforCardexperience').empty();
                    $('.CardCoursAndDispo .InfoCours').empty();
                    $('.CardCoursAndDispo .ClassDisponible').empty();
                    if(response.formation.length > 0)
                    {
                        $.each(response.formation, function (index, value) {
                            $('.CardFormation').append(` <div style="">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="" class="text-uppercase">diplôme</label>
                                                                        <input type="text" class="form-control" value="${value.diplome}" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="" class="text-uppercase">spécialité</label>
                                                                        <input type="text" class="form-control" value="${value.specialise}"  disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="" class="text-uppercase">Année</label>
                                                                        <input type="text" class="form-control" value="${value.annee}"  disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="" class="text-uppercase">Lycée</label>
                                                                        <input type="text" class="form-control" value="${value.ecole}"  disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="" class="text-uppercase">Pays</label>
                                                                        <input type="text" class="form-control" value="${value.pays}"  disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr style="width:80%;margin:15px auto">`);
                        });
                        $('#formationTab').removeClass('hidden');
                    }
                    else
                    {
                        $('#formationTab').addClass('hidden');
                    }

                    $.each(response.Experince, function (index, valueEx) {

                        $('.Cardexperience .InforCardexperience').append(`
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <div class="form-group">
                                                                                    <label for="" class="text-uppercase">Filière</label>
                                                                                    <input type="text" class="form-control" value="${valueEx.poste}" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <div class="form-group">
                                                                                    <label for="" class="text-uppercase">Lycée / Université</label>
                                                                                    <input type="text" class="form-control" value="${valueEx.entreprise}" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <div class="form-group">
                                                                                    <label for="" class="text-uppercase">Pays</label>
                                                                                    <input type="text" class="form-control" value="${valueEx.pays}" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <label for="" class="text-uppercase">Du</label>
                                                                                    <input type="text" class="form-control" value="${valueEx.du}" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <label for="" class="text-uppercase">Au</label>
                                                                                    <input type="text" class="form-control" value="${valueEx.au}" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr style="width: 80%; margin: 15px auto">
                                                                    `);
                    });
                    $.each(response.CourProf, function (index, value) {
                        $('.CardCoursAndDispo .InfoCours').append(`<button class="buttonCours" value=`+value.title+` disabled>
                                                                        `+value.title+`
                                                                    </button>`);
                    });
                    $.each(response.Disponible, function (key, data) {
                        $('.CardCoursAndDispo .ClassDisponible').append(`
                            <div class="ContentDisponible">
                                <div class="Days">${key}</div>
                                <div class="ClassCalculHeight">
                                    <div class="ClassTimeDisponible" style="${data ? 'color:#0c3c74;background:#00f8ff3b;' : ''}">
                                        <p>
                                            ${data ? '<i class="fa-solid fa-clock" style="color: #0078ff"></i>' : ''}
                                            ${data ? data.debut : 'Vide'}
                                        </p>
                                        <p>
                                            ${data ? '<i class="fa-solid fa-clock" style="color: #0078ff"></i>' : ''}
                                            ${data ? data.fin : 'Vide'}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        `);
                    });



                }
            },
            error: function ()
            {
                $('#overlay').css('display', 'flex');
                $('#overlay').fadeIn();


                setTimeout(function () {

                    $('#overlay').fadeOut();


                    setTimeout(function () {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Quelque chose s'est mal passé!",
                        });
                    }, 500);
                }, 1500);
            }
        });

    });
    $(".navbar-nav .nav-link").on("click", function(e){
        e.preventDefault();
        $(".navbar-nav .nav-link").removeClass("active");
        $(this).addClass("active");

        var targetCard = $(this).data('target');
        var arrayCard =['.Cardcertification','.CardCoursAndDispo','.Cardexperience','.CardFormation','.CardProfile'];
        arrayCard.forEach(function (card) {
            $(card).hide();
        });
        $('.divLoading').css('display', 'block');

        setTimeout(function () {
            $('.divLoading').fadeOut('fast', function () {

                $('.' + targetCard).fadeIn('slow');
                $('.' + targetCard).css('height','18rem');
            });
        }, 1000);
    });

    $('.BtnVerification').on('click',function()
    {
        if ($('input[name=verification]:checked').length > 0) {

            var selectedValue = $('input[name=verification]:checked').val();

            $.ajax({
                type: "post",
                url: verificationCertification,
                headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                data:
                {
                    verification : selectedValue,
                    idprof       : $(this).attr('data-value'),
                },
                dataType: "json",
                success: function (response)
                {
                    if(response.status == 200)
                    {
                        Swal.fire({
                            icon: "success",
                            title: "Verification avec succès",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            location.reload();
                        });
                    }
                }
            });
        }
        else
        {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Veuillez sélectionner une vérification!",
            });
        }
    });
});
