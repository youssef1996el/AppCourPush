$(document).ready(function () {
    var listProfofesseur = $('#tableListEleve').DataTable({
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

    $('.showEleve').on('click',function()
    {
        var image  = $(this).closest('tr').find('img').attr('src');
        var name   = $(this).closest('tr').find('td:eq(0)').text();
        var email  = $(this).closest('tr').find('td:eq(1)').text();
        var pays   = $(this).closest('tr').find('td:eq(2)').text();

        $('.nomCompletEleve').val(name.replace(/\s+/g, ' '));
        $('.emailEleve').val(email);
        $('.paysEleve').val(pays);
        $('#imageEleve').attr('src',image);
        $('#ModalView').modal('show');
    });
});
