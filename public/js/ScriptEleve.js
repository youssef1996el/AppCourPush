$(document).ready(function () {
    function disableBack()
    {
            window.history.forward()
    }
    window.onload = disableBack();
    window.onpageshow = function(e)
    {
        if (e.persisted)
            disableBack();
    }
    var currentUrl = window.location.href;
    var pathname = window.location.pathname;
    var pathArray = pathname.split('/');
    var nameRoute = pathArray[1];
    if( nameRoute === 'Reserver' )
    {
        $('#bookCard').css('display', 'none');
        $('.WelcomeEleve').css('display', 'none');
        $('#bookClass').css('display', 'block');
        $('#CardShowDataProfesseur').css('display', 'block');
    }
    var today = new Date().toISOString().split('T')[0];
    $('.DateSearch').attr('min', today);

    $('#multiple-select-field' ).select2({
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        closeOnSelect: false,

    });


    $('#bookCard').on('click',function()
    {
        $('#bookClass').css('display', 'block');
        $('#CardShowDataProfesseur').css('display', 'block');

    });
    var currentPage = 1;
    var ValueCours = '';
    var ValueDay   = '';
    var valueHour  = '';
    var ValueType  = '';
    var isLoadPage = 1;

    $('.BtnIntialiser').on('click', function()
    {

        isLoadPage = 1;
        var ValueCours = '';
        var ValueDay   = '';
        var valueHour  = '';
        var ValueType  = '';
        $('.typeCours').prop('checked',false);
        $('#dropdownMenuButton1').text('__:__');
        $('#multiple-select-field').val([]).trigger('change');
        var today = new Date().toISOString().split('T')[0];
        $('.DateSearch').val(today);
        fetchProfesseurs(currentPage,false,false,false,false,isLoadPage,dateInput);
    });
    // when load page this variable  = 1

    $('.typeCours').on('click',function()
    {
        // search with Groupe or Prive
        isLoadPage = 0;
        ValueType = $(this).val();
        fetchProfesseurs(currentPage,ValueCours == '' ? false : ValueCours,ValueDay == '' ? false : ValueDay,valueHour == '' ? false : valueHour,ValueType,isLoadPage,dateInput);
    });

    $('.DateSearch').on('change',function()
    {
        // Search with name day
        isLoadPage = 0;
        ValueDay = $(this).val();
        fetchProfesseurs(currentPage,ValueCours == '' ? false : ValueCours,ValueDay ,valueHour == '' ? false : valueHour,ValueType == '' ? false :ValueType,isLoadPage,$(this).val());
    });
    $('.btnTime').on('click',function()
    {
        // search with time
        var value = $(this).val();
        $('#dropdownMenuButton1').text(value);
        isLoadPage = 0;
        valueHour = $(this).val();
        fetchProfesseurs(currentPage,ValueCours == '' ? false : ValueCours,ValueDay == '' ? false : ValueDay,valueHour,ValueType == '' ? false :ValueType,isLoadPage,dateInput);
    });

    $('#multiple-select-field').on('change',function()
    {
        // search With Cours
        isLoadPage = 0;
        if($(this).val().length == 0)
        {
            ValueCours = false;
        }
        else
        {
            ValueCours = $(this).val();
        }

        fetchProfesseurs(currentPage,ValueCours,ValueDay == '' ? false : ValueDay,valueHour == '' ? false : valueHour ,ValueType == '' ? false :ValueType,isLoadPage,dateInput);
    });
    var dataTableInitialized = false;
    var dateInput = $('.DateSearch').val();
    function fetchProfesseurs(page, cours, day, hour, type,isLoadPage,dateInput)
    {
        var urlGetDataProfesseurDisponible = url;
        $.ajax({
            type: "get",
            url: urlGetDataProfesseurDisponible,
            data: {
                page: page,
                cours: cours,
                day: day,
                hour: hour,
                type: type,
                isLoadPage : isLoadPage,
                dateInput  : dateInput
            },
            dataType: "json",
            success: function (response)
            {

                if(response.status == 200)
                {



                    var dataArray = Array.isArray(response.Data) ? response.Data : [response.Data];
                    if (dataArray.length > 0)
                    {
                        $('.NoCoursToday').css('display', 'none');
                        $('.DataProfesseur').css('display', 'block');
                        $('.DateSelected').css('display', 'block');
                        $('.DateSelected').text(response.DateSelected);
                        $('.TitleHasCours').css('display', 'block');
                        if(!dataTableInitialized)
                        {
                            dataTableInitialized = true;
                            var dataTable = $('#TableProfesseurIsActive').DataTable({
                                searching: true,
                                ordering: true,
                                pageLength: 2,
                                lengthChange: false,
                                info: false,
                                responsive:true,
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
                        }
                        else
                        {
                            var dataTable = $('#TableProfesseurIsActive').DataTable(); // Get the existing DataTable instance
                            dataTable.clear().draw();
                        }
                        dataTable.clear();
                        $.each(response.Data, function (index, value)
                        {
                            var FirstTd     =  `<a href="#" class="debutCours">${value.debut}</a><br><a href="#">${value.timezone}</a>`;
                            var SecoundTd   =  `<div class="d-flex align-items-center">
                                                    <img src="${value.image}" class="rounded-circle" style="width: 45px; height: 45px; " alt="">
                                                        <div class="ms-3">
                                                        <p class="fw-bold mb-1 NameProfesseur" style="display:inline;white-space: nowrap;">${value.name}</p>
                                                            <div style="display:inline;" class="x9f619 xjbqb8w x78zum5 x168nmei x13lgxp2 x5pf9jr xo71vjh x1gslohp x1i64zmx x1n2onr6 x1plvlek xryxfnj x1c4vz4f x2lah0s xdt5ytf xqjyukv x1qjc9v5 x1oa3qoh x1nhvcw1">
                                                                <svg aria-label="Vérifié" class="x1lliihq x1n2onr6" fill="rgb(0, 149, 246)" height="18" role="img" viewBox="0 0 40 40" width="18">
                                                                <title>Vérifié</title>
                                                                <path d="M19.998 3.094 14.638 0l-2.972 5.15H5.432v6.354L0 14.64 3.094 20 0 25.359l5.432 3.137v5.905h5.975L14.638 40l5.36-3.094L25.358 40l3.232-5.6h6.162v-6.01L40 25.359 36.905 20 40 14.641l-5.248-3.03v-6.46h-6.419L25.358 0l-5.36 3.094Zm7.415 11.225 2.254 2.287-11.43 11.5-6.835-6.93 2.244-2.258 4.587 4.581 9.18-9.18Z" fill-rule="evenodd"></path>
                                                                </svg>
                                                            </div>
                                                            <p class="text-muted mb-0">${value.experience}ans expérience</p>
                                                            <p class="text-muted mb-0">${value.title}</p>
                                                        </div>
                                                </div>`;
                            var FourTd     =   `${value.typecours === 'prive' ? `
                                                    <p class="text-muted mb-0 ClassTypeCours" style="white-space: nowrap;">Cours particulier</p>
                                                    <p class="text-muted mb-0">Un enseignant sera attribué</p>
                                                    ` : `
                                                    <p class="text-muted mb-0 ClassTypeCours" style="white-space: nowrap;">Cours en groupe</p>
                                                `}`;
                            var FiveTd = `<td class="buttonsRD " >
                                                    <button type="button" class="btn btn-primary reserver mr-1" data-value=${value.id}>Reserver</button>
                                                    <button type="button" class="btn details">Details</button>
                                                </td>`;
                            dataTable.row.add([
                                FirstTd,
                                SecoundTd,
                                value.cours,
                                FourTd,
                                FiveTd,
                            ]);
                            dataTable.draw();
                            dataTable.cell(':last', -1).node().classList.add('button-container', 'mt-4');
                        });
                    }
                    else
                    {
                        $('.NoCoursToday').empty();
                        $('.NoCoursToday').css('display', 'block');
                        $('.DataProfesseur').css('display', 'none');
                        $('.DateSelected').css('display', 'none');
                        $('.TitleHasCours').css('display', 'none');
                        $('.NoCoursToday').append(`<h3 class="text-uppercase mt-2"</h3>
                                                        <h5 class="text-secondary mt-4 dateNoDisponible">${response.DateSelected}</h5>
                                                        <div class="card bg-light p-3">
                                                            <div class="d-flex">
                                                                <svg style="margin: auto 0px" class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium css-1y2jtx7" focusable="false" aria-hidden="true" viewBox="0 0 56 56" width="56" height="56" fill="none">
                                                                    <g clip-path="url(#clip0_1649_12757)">
                                                                        <path d="M3.71566 15.7936L3.7156 45.3574C3.71559 51.2353 8.48054 56.0002 14.3584 56.0002L41.6415 56.0002C47.5194 56.0002 52.2843 51.2353 52.2844 45.3574L52.2844 15.7936H3.71566Z" fill="url(#paint0_linear_1649_12757)"></path>
                                                                        <path d="M3.71558 15.4532C3.71558 10.9415 7.37304 7.28406 11.8848 7.28406H44.1036C48.6153 7.28406 52.2728 10.9415 52.2728 15.4532V20.9588H3.71558V15.4532Z" fill="url(#paint1_linear_1649_12757)"></path>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M38.1532 0.230225C39.7562 0.230225 41.0558 1.52976 41.0558 3.13281V10.873C41.0558 12.4761 39.7562 13.7756 38.1532 13.7756C36.5501 13.7756 35.2506 12.4761 35.2506 10.873V3.13281C35.2506 1.52976 36.5501 0.230225 38.1532 0.230225Z" fill="#1A2B7B"></path>
                                                                        <path d="M17.8352 0.230225C19.4383 0.230225 20.7378 1.52976 20.7378 3.13281V10.873C20.7378 12.4761 19.4383 13.7756 17.8352 13.7756C16.2321 13.7756 14.9326 12.4761 14.9326 10.873V3.13281C14.9326 1.52976 16.2321 0.230225 17.8352 0.230225Z" fill="#1A2B7B"></path>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.2127 28.6037C21.2127 27.0446 19.9487 25.7806 18.3896 25.7806H13.1649C11.6057 25.7806 10.3418 27.0446 10.3418 28.6037V33.8284C10.3418 35.3876 11.6057 36.6515 13.1649 36.6515H18.3896C19.9487 36.6515 21.2127 35.3876 21.2127 33.8284V28.6037ZM33.8202 28.6038C33.8202 27.0446 32.5562 25.7807 30.9971 25.7807H25.7724C24.2133 25.7807 22.9493 27.0446 22.9493 28.6038V33.8284C22.9493 35.3876 24.2133 36.6515 25.7724 36.6515H30.9971C32.5562 36.6515 33.8202 35.3876 33.8202 33.8284V28.6038ZM10.3418 41.2113C10.3418 39.6522 11.6058 38.3882 13.1649 38.3882H18.3896C19.9487 38.3882 21.2127 39.6522 21.2127 41.2113V46.436C21.2127 47.9952 19.9487 49.2591 18.3896 49.2591H13.1649C11.6058 49.2591 10.3418 47.9952 10.3418 46.436V41.2113ZM33.8202 41.2113C33.8202 39.6522 32.5562 38.3882 30.9971 38.3882H25.7724C24.2133 38.3882 22.9493 39.6522 22.9493 41.2113V46.436C22.9493 47.9952 24.2133 49.2591 25.7724 49.2591H30.9971C32.5562 49.2591 33.8202 47.9952 33.8202 46.436V41.2113ZM46.454 41.2113C46.454 39.6522 45.1901 38.3882 43.6309 38.3882H38.4063C36.8471 38.3882 35.5832 39.6522 35.5832 41.2113V46.436C35.5832 47.9952 36.8471 49.2591 38.4063 49.2591H43.6309C45.1901 49.2591 46.454 47.9952 46.454 46.436V41.2113ZM35.5832 28.6038C35.5832 27.0446 36.8471 25.7807 38.4063 25.7807H43.6309C45.1901 25.7807 46.454 27.0446 46.454 28.6038V33.8284C46.454 35.3876 45.1901 36.6515 43.6309 36.6515H38.4063C36.8471 36.6515 35.5832 35.3876 35.5832 33.8284V28.6038Z" fill="white"></path>
                                                                    </g>
                                                                    <defs>
                                                                        <linearGradient id="paint0_linear_1649_12757" x1="3.71558" y1="56.0002" x2="41.2335" y2="7.2831" gradientUnits="userSpaceOnUse">
                                                                            <stop offset="0.0401478" stop-color="#D0D8FF"></stop>
                                                                            <stop offset="0.941805" stop-color="#FFD6F5"></stop>
                                                                        </linearGradient>
                                                                        <linearGradient id="paint1_linear_1649_12757" x1="26.5" y1="7" x2="23" y2="21" gradientUnits="userSpaceOnUse">
                                                                            <stop stop-color="#7B79E7"></stop>
                                                                            <stop offset="1" stop-color="#BD61E1"></stop>
                                                                        </linearGradient>
                                                                        <clipPath id="clip0_1649_12757">
                                                                            <rect width="56" height="56" fill="white"></rect>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                <div class="card-body">
                                                                    <p class="card-text text-secondary fs-4">Aucun cours n'est disponible à la (aux) date(s) sélectionnée(s)</p>
                                                                    <p class="card-text text-secondary" style="font-size: 14px">Essayez de changer vos filtres </p>
                                                                </div>
                                                            </div>
                                                        </div>`);
                    }


                }
            }
        });
    }
    fetchProfesseurs(currentPage,false,false,false,false,isLoadPage,dateInput);

    $(document).on('click','.reserver',function()
    {
        var id  = $(this).attr('data-value'); 
        
        var Time = $(this).closest('tr').find('.debutCours').text().trim();
        var NameProfesseur  = $(this).closest('tr').find('.NameProfesseur').text().trim();
        var cours           = $(this).closest('tr').find('td:eq(2)').text().trim();
        var typeCours       = $(this).closest('tr').find('.ClassTypeCours').text().trim();
        $.ajax({
            type : "get",
            url  : VerificationCoursIsDispo,
            data :
            {
                Time           : Time,
                NameProfesseur : NameProfesseur,
                cours          : cours,
                typeCours      : typeCours,
                id : id,
            },
            dataType: "json",
            success: function (response)
            {
                if(response.status == 200)
                {
                    if(typeCours === 'Cours particulier')
                    {
                        typeCours = 'prive';
                    }
                    else
                    {
                        typeCours = 'groupe';
                    }
                    var reservationUrl = "/Reservation/" + encodeURIComponent(Time) + "/" + encodeURIComponent(NameProfesseur) + "/" + encodeURIComponent(cours) + "/" + encodeURIComponent(typeCours) + "/" + encodeURIComponent(id);


                    window.location.href = reservationUrl;
                }
                else if(response.status == 404)
                {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response.message,

                    });
                }
            }
        });


    });
    $(document).on('click','.details',function()
    {
        var Time            = $(this).closest('tr').find('.debutCours').text().trim();
        var NameProfesseur  = $(this).closest('tr').find('.NameProfesseur').text().trim();
        var cours           = $(this).closest('tr').find('td:eq(2)').text().trim();
        var typeCours       = $(this).closest('tr').find('.ClassTypeCours').text().trim();
        var DateSelected    = $('.DateSearch').val();
        if(typeCours === 'Cours particulier')
        {
            typeCours = 'prive';
        }
        else
        {
            typeCours = 'groupe';
        }
        var reservationUrl = "/Details/" + encodeURIComponent(Time) + "/" + encodeURIComponent(NameProfesseur) + "/" + encodeURIComponent(cours) + "/" + encodeURIComponent(typeCours) + "/" + encodeURIComponent(DateSelected);
        window.location.href = reservationUrl;
    });
});
