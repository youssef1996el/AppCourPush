@extends('Dashboard.templateAdmin')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleMeet.css')}}">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<div id="overlay">
    <div class="three-body">
        <div class="three-body__dot"></div>
        <div class="three-body__dot"></div>
        <div class="three-body__dot"></div>
    </div>
</div>
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Liste des Réunions</h4>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xl-12">
                    <div class="table-responsive ">
                        <table class="table-primary table-bordered  align-middle mb-0 bg-white " id="tableListEleveMeeting" style="margin-top: 20px;width: 100%;">

                            <thead class="">
                            <tr>
                                <th >Nom complet</th>
                                <th>Cours</th>
                                <th >Type cours</th>
                                <th>Jours</th>
                                <th>Debut</th>
                                <th>Fin</th>
                                <th>Fuseau horaire</th>
                                <th>Meeting</th>
                                {{-- <th>Actions</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($ElevesMeeting as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{-- <img src="{{$item->image}}" class="rounded-circle" id="imgEleve" alt="" /> --}}
                                                <div class="ms-3">
                                                <p class="text-muted fw-bold mb-1 nom_eleve">{{$item->nom_eleve}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0 text-center title">{{$item->title}}</p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0 text-center typecours">
                                                @if($item->typecours === "groupe")
                                                    Cours en groupe
                                                @else
                                                    Cours particulier <br> Un enseignant sera attribué
                                                @endif
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0 text-center days">{{$item->days}}</p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-1 text-center times">{{$item->times}}</p>
                                        </td>
                                        <td>
                                            <span class="text-muted mb-1 text-center fin" style="text-align: center">{{$item->fin}}</span>
                                        </td>
                                        <td>
                                            <span class="text-muted mb-1 text-center timezone" style="text-align: center">{{$item->timezone}}</span>
                                        </td>
                                        <td>

                                            <input type="checkbox" value="{{$item->email}}" data-value="{{$item->nom_professeur}}" class="SelectedEleve" {{$item->hasCours == false ? 'disabled' : ''}}>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalEnvoyeLink" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('SendLinkMeet')}}" method="post" id="FormLink">
                    @csrf
                    <div class="modal-body">
                        <input type="text" placeholder="Entre your link meet" class="form-control LinkMeet" name="link" >
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success BtnSendLink" type="button">Envoyé</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

</div>
<!-- <style>
    @media (min-width: 768px)
    {
        .col-md-6
        {
            flex: 0 0 auto;
            width: 100% !important
        }
    }
    @media (min-width: 768px)
    {
        .col-md-7 {
            flex: 0 0 auto;
            width: 100% !important;
        }
    }

    #tableListEleveMeeting thead th:first-child {
        /* Set the desired width */
        width: 130px; /* You can change this value to whatever you need */
    }

    #tableListEleveMeeting thead th:nth-child(3) {
        /* Set the desired width */
        width: 200px; /* You can change this value to whatever you need */
    }

    #tableListEleveMeeting tbody td:nth-child
    {
        padding: 0px;
    }

    #overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.09);
   /*  display: flex; */
    justify-content: center;
    align-items: center;
    z-index: 9999; /* Set a high z-index to ensure it appears on top */
}
  .three-body {
    --uib-size: 35px;
    --uib-speed: 0.8s;
    --uib-color: #5D3FD3;
    position: relative;
    display: inline-block;
    height: var(--uib-size);
    width: var(--uib-size);
    animation: spin78236 calc(var(--uib-speed) * 2.5) infinite linear;
   }

   .three-body__dot {
    position: absolute;
    height: 100%;
    width: 30%;
   }

   .three-body__dot:after {
    content: '';
    position: absolute;
    height: 0%;
    width: 100%;
    padding-bottom: 100%;
    background-color: var(--uib-color);
    border-radius: 50%;
   }

   .three-body__dot:nth-child(1) {
    bottom: 5%;
    left: 0;
    transform: rotate(60deg);
    transform-origin: 50% 85%;
   }

   .three-body__dot:nth-child(1)::after {
    bottom: 0;
    left: 0;
    animation: wobble1 var(--uib-speed) infinite ease-in-out;
    animation-delay: calc(var(--uib-speed) * -0.3);
   }

   .three-body__dot:nth-child(2) {
    bottom: 5%;
    right: 0;
    transform: rotate(-60deg);
    transform-origin: 50% 85%;
   }

   .three-body__dot:nth-child(2)::after {
    bottom: 0;
    left: 0;
    animation: wobble1 var(--uib-speed) infinite
       calc(var(--uib-speed) * -0.15) ease-in-out;
   }

   .three-body__dot:nth-child(3) {
    bottom: -5%;
    left: 0;
    transform: translateX(116.666%);
   }

   .three-body__dot:nth-child(3)::after {
    top: 0;
    left: 0;
    animation: wobble2 var(--uib-speed) infinite ease-in-out;
   }

   @keyframes spin78236 {
    0% {
     transform: rotate(0deg);
    }

    100% {
     transform: rotate(360deg);
    }
   }

   @keyframes wobble1 {
    0%,
     100% {
     transform: translateY(0%) scale(1);
     opacity: 1;
    }

    50% {
     transform: translateY(-66%) scale(0.65);
     opacity: 0.8;
    }
   }

   @keyframes wobble2 {
    0%,
     100% {
     transform: translateY(0%) scale(1);
     opacity: 1;
    }

    50% {
     transform: translateY(66%) scale(0.65);
     opacity: 0.8;
    }
   }



</style> -->
<script>
    $(document).ready(function ()
    {

        $('#tableListEleveMeeting').DataTable({
            searching: true,
            ordering: false,
            pageLength: 5,
            lengthChange: false,
            info: false,
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


        var groupCount = 0;
        var privateCount = 0;
        var groupArray = [];
        var privateArray = [];

        $('.SelectedEleve').on('change', function(e)
        {
            var typecours = $(this).closest('tr').find('td:eq(2)').text().trim();
            var Extract = typecours === "Cours en groupe" ? "groupe" : "prive";

            if ($(this).is(":checked"))
            {
                if (Extract === "groupe")
                {
                    if (groupCount < 4 && privateCount === 0)
                    {
                        groupArray.push("groupe");
                        groupCount++;

                    }
                    else
                    {
                        $(this).prop('checked', false);
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Impossible d'ajouter plus de 4 'Cours en groupe' ou de mélanger 'Cours en groupe' avec 'Cours particulier'.",
                        });
                    }
                }
                else if (Extract === "prive")
                {
                    if (privateCount < 1 && groupCount === 0)
                    {
                        privateArray.push("prive");
                        privateCount++;
                    }
                    else
                    {
                        $(this).prop('checked', false);
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Impossible d'ajouter plus de 1 'Cours particulier' ou de mélanger 'Cours en groupe' avec 'Cours particulier'.",
                        });
                    }
                }
            }
            else
            {
                if (Extract === "groupe")
                {
                    groupArray.pop();
                    groupCount--;
                }
                else if (Extract === "prive")
                {
                    privateArray.pop();
                    privateCount--;
                }
            }
        });
        $('#tableListEleveMeeting_filter').append('<button type="button" class="btn btn-info float-end btnSendMeeting ">Créer meet</button>');

        $(document).on('click','.btnSendMeeting',function()
        {
            var selectedRows = [];
            var atLeastOneChecked = false;
            $('.SelectedEleve').each(function() {
                if (!$(this).prop('disabled') && $(this).prop('checked'))
                {
                    atLeastOneChecked = true;
                    var $row = $(this).closest('tr');
                    var startTime = parseTime($row.find('.times').text().trim());
                    var endTime = parseTime($row.find('.fin').text().trim());
                    var timeDiffInMinutes = calculateTimeDifference(startTime, endTime);
                    var rowData = {
                        nom_eleve: $row.find('.nom_eleve').text().trim(),
                        title: $row.find('.title').text().trim(),
                        typecours: $row.find('.typecours').text().trim(),
                        days: $row.find('.days').text().trim(),
                        times: startTime,
                        debut : $row.find('.times').text().trim(),
                        fin: $row.find('.fin').text().trim(),
                        differenceInMinutes: timeDiffInMinutes,
                        timezone: $row.find('.timezone').text().trim(),

                    };
                    selectedRows.push(rowData);
                }
            });
            if (!atLeastOneChecked)
            {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Veuillez sélectionner au moins un étudiant.",
                });

                return;
            }
            $.ajax({
                type: "post",
                url: "{{route('online_Classes.store')}}",
                headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                data:
                {
                    Data : selectedRows
                },
                dataType: "json",
                success: function (response)
                {
                    if(response.status == 200)
                    {
                        window.open(response.link, '_blank');
                        $('#ModalEnvoyeLink').modal('show');
                    }
                }
            });
        });

        function parseTime(timeStr)
        {
            var parts = timeStr.split(':');
            return new Date(0, 0, 0, parseInt(parts[0]), parseInt(parts[1]));
        }

        function calculateTimeDifference(startTime, endTime)
        {
            var diffInMilliseconds = endTime - startTime;
            return diffInMilliseconds / (1000 * 60); // Convert milliseconds to minutes
        }

        $('.BtnSendLink').on('click',function()
        {
            var selectedRows = [];
            $('.SelectedEleve').each(function() {
                if (!$(this).prop('disabled') && $(this).prop('checked')) {
                    var $row = $(this).closest('tr');
                    var startTime = parseTime($row.find('.times').text().trim());
                    var endTime = parseTime($row.find('.fin').text().trim());
                    var timeDiffInMinutes = calculateTimeDifference(startTime, endTime);
                    var rowData = {
                        nom_eleve           : $row.find('.nom_eleve').text().trim(),
                        title               : $row.find('.title').text().trim(),
                        typecours           : $row.find('.typecours').text().trim(),
                        days                : $row.find('.days').text().trim(),
                        times               : startTime,
                        debut               : $row.find('.times').text().trim(),
                        fin                 : $row.find('.fin').text().trim(),
                        differenceInMinutes : timeDiffInMinutes,
                        timezone            : $row.find('.timezone').text().trim(),
                        Email               : $(this).attr('value'),
                        nom_professeur      : $(this).attr('data-value'),
                    };
                    selectedRows.push(rowData);
                }
            });
            var linkMeetValue = $('.LinkMeet').val();
            if(linkMeetValue == '')
            {
                // diri hna hadak belan border yawli b hamar deyal input
                return;
            }
            $.ajax({
                type: "post",
                url: "{{url('SendLinkMeet')}}",
                headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                data:
                {
                    Data: selectedRows,
                    link: linkMeetValue
                },
                dataType: "json",
                beforeSend: function () {
                    // Show overlay with loading animation
                   /*  $('#overlay').fadeIn();
                    $('#overlay').css('display','flex'); */
                },
                success: function (response)
                {
                    if(response.status == 200)
                    {
                        $('.SelectedEleve').prop('checked', false);
                        $('#ModalEnvoyeLink').modal('hide');

                        $('#overlay').fadeOut();
                        Swal.fire({

                            icon: "success",
                            title: response.message,
                            showConfirmButton: true,
                            timer: 3500
                        });
                    }
                }
            });
        });


    });
</script>
@endsection
