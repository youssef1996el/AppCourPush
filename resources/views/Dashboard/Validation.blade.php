
@extends('Dashboard.templateAdmin')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleValidationCours.css')}}">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
 <div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Validation des cours</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="table-responsive ">
                            <table class="table-primary table-bordered  align-middle mb-0 bg-white " id="tableListValidationCours" style="margin-top: 20px;width: 100%;">
                                <thead class="">
                                <tr>
                                    <th>Eleve</th>
                                    <th>Professeur</th>
                                    <th>Cours</th>
                                    <th>Jour</th>
                                    <th>Type cours</th>
                                    <th>Debut</th>
                                    <th>Fin</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Data as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <p class="fw-bold mb-1">{{$item->nom_eleve}}</p>
                                                        <p class="text-muted mb-0">{{$item->email}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-0 text-center title">{{$item->nom_professeur}}</p>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-0 text-center typecours">{{$item->title}}</p>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-0 text-center days">{{$item->days}}</p>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-1 text-center times">{{$item->typecours}}</p>
                                            </td>
                                            <td>
                                                <span class="text-muted mb-1 text-center fin" style="text-align: center">{{$item->times}}</span>
                                            </td>
                                            <td>
                                                <span class="text-muted mb-1 text-center timezone" style="text-align: center">{{$item->fin}}</span>
                                            </td>
                                            <td>
                                                <span class="text-muted mb-1 text-center timezone" style="text-align: center">{{$item->status == 0 ? "En Cours" : ($item->status == 2 ? "Professor has completed the course" : "Valide")}}</span>
                                            </td>
                                            <td>
                                                <input type="checkbox" value="" data-value="" class="SelectedEleve" >
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


</div>
<script>
    $(document).ready(function ()
    {

        $('#tableListValidationCours').DataTable({
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
        $('#tableListValidationCours_wrapper .col-sm-12.col-md-6:first-child').append('<button type="button" class="btn btn-info  btnSendMeeting " style="margin-top:3rem">Valide Cours</button>');
    });
</script>
@endsection
