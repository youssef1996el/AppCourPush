$(document).ready(function ()
{

    var dataTableInitialized = false;
    GetTableCour();
    function GetTableCour()
    {
        var url = ListCours;
        $.ajax({
            type: "get",
            url: url,
            dataType: "json",
            success: function (response)
            {
                if(response.status == 200)
                {
                    if (!dataTableInitialized)
                    {

                        dataTableInitialized = true;
                        var dataTable = $('#TableListCour').DataTable({
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
                    }
                    else
                    {
                        var dataTable = $('#TableListCour').DataTable(); // Get the existing DataTable instance
                        dataTable.clear().draw();
                    }
                    dataTable.clear();
                    $.each(response.data, function (index, value)
                    {

                        var buttonEdit =    `<button type="button" class="btn btn-link buttonEditCours" data-mdb-ripple-color="dark" data-value=`+value.id+`>
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>`;
                        var buttonTrash=    `<button type="button" class="btn btn-link " data-mdb-ripple-color="dark" data-value=`+value.id+`>
                                                <i class="fa-solid fa-trash"></i>
                                            </button>`;

                        dataTable.row.add([
                            value.title,
                            buttonEdit + ' ' + buttonTrash,
                        ]);
                        dataTable.draw();
                    });

                }
            },

        });
    }





    $('#BtnAddRowCours').on('click',function()
    {

        $('#ModalAddCour').modal("show");
        var lenghtTableCour =$('#TableCours tbody tr').length;
        if(lenghtTableCour == 0)
        {
            $('#TableCours').find('tbody').append('<tr>\
                                                    <td>\
                                                        <input type="text" class="form-control" placeholder="Veuillez entrer le nom du cours">\
                                                    </td>\
                                                    <td >\
                                                        <button class="buttonTrashCours">\
                                                            <svg viewBox="0 0 448 512" class="svgIcon">\
                                                                <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>\
                                                            </svg>\
                                                        </button>\
                                                    </td>\
                                            <tr>');
        }


    });
    $('#BtnAddCourTwo').on('click',function()
    {

        $('.sectiontablecours .form-group:last').after('<div class="form-group appendCour" >\
                                            <div class="row">\
                                                <div class="col-10">\
                                                    <input name="cours" type="text" class="form-control cour" style="width: 95% !important" placeholder="Ajouter un cours" >\
                                                </div>\
                                                <div class="col-2">\
                                                    <button class="buttonTrashCours " >\
                                                        <svg viewBox="0 0 448 512" class="svgIcon">\
                                                            <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>\
                                                        </svg>\
                                                    </button>\
                                                </div>\
                                            </div>\
                                        </div>');

    });


    $('.Send').on('click', function () {
        var cours = $('.cour').map(function () {
            return $(this).val();
        }).get();

        if (cours.length === 0) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: 'Vous n\'avez saisi aucune cours',
            });
            return;
        }

        var url = storeCoursUrl;
        $.ajax({
            type: "post",
            url: url,
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
            data: { cours: cours },
            dataType: "json",
            success: function (response) {
                if (response.status === 200) {
                    var problematicTitles = response.problematic_titles;
                    if (problematicTitles.length > 0) {
                        $.each(problematicTitles, function (index, value) {
                            var alertDiv = $('<div class="success">\
                                                <div class="success__icon">\
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none">\
                                                        <path fill-rule="evenodd" fill="#393a37" d="your_svg_path_here"></path>\
                                                    </svg>\
                                                </div>\
                                                <div class="success__title">' + value + '</div>\
                                                <div class="success__close">\
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20">\
                                                        <path fill="#393a37" d="your_svg_path_here"></path>\
                                                    </svg>\
                                                </div>\
                                            </div>');

                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: '=> cour ' + value + ' déja existe',
                            });
                            setTimeout(function () {
                                alertDiv.fadeOut('slow');
                            }, 6000);
                        });
                    }
                    else {

                        var widthContainer = $('.widthContainer').width();
                        var msgElement = $('.msg');
                        if (msgElement.length > 0) {
                            msgElement.css('width', widthContainer + 'px')
                                .addClass('alert alert-success')
                                .text('Ajouter avec succès')
                                .delay(6000)
                                .fadeOut('slow', function () {
                                    msgElement.css('width', '').removeClass('alert alert-success').text('').show();
                                });
                        }
                    }


                    $('#ModalAddCour').modal("hide");
                    GetTableCour();
                    $('.sectiontablecours .appendCour').remove();
                    $('.cour').val("");
                }
            }
        });
    });

    $(document).on('click','.buttonTrashCours',function()
    {
        $(this).closest('.form-group').remove();
    });

    $(document).on('click','.success__close path',function(){

        $(this).closest('.success').remove();
    });
    var idCour = 0;
    $(document).on('click','.buttonEditCours',function()
    {
        idCour = $(this).attr('data-value');
        $('#TitleCourShow').text($(this).closest('tr').find('td:eq(0)').text());
        $('.TitleEdit').val("").attr("placeholder",$(this).closest('tr').find('td:eq(0)').text());
        $('#ModalEditCours').modal('show');
    });

    $('.BtnUpDateCours').on('click',function()
    {
        var TitleEdit = $('.TitleEdit').val();
        if(TitleEdit == '')
        {
            $('.error').css({
                'font-size':'18px',
                'color'    :'red'
            }).text('Ce champ est obligatoire');
        }
        else
        {
            var url = EditCour;
            $.ajax({
                type: "post",
                url: EditCour,
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data:
                {
                    title : TitleEdit,
                    id    : idCour,
                },
                dataType: "json",
                success: function (response)
                {
                    if(response.status == 200)
                    {
                        GetTableCour();
                        $('#ModalEditCours').modal('hide');
                        Swal.fire({
                            icon: "success",
                            title: "Modification réussie",
                            showConfirmButton: false,
                            timer: 1500
                          });
                    }
                }
            });
        }
    });
    $('.TitleEdit').on('focus',function(){
        var MsgError = $('.error').text();
        if(MsgError !=='')
        {
            $('.error').text("");
        }
    });



});
