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

        $('.sectiontablecours .form-group:last').after('<div class="form-group" >\
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

    $('.Send').on('click', function()
    {
        var cours = [];


        $('.cour').each(function () {
            cours.push($(this).val());
        });

        if(cours.length == 1)
        {
            if(cours == "")
            {
                Swal.fire({
                    icon    : "error",
                    title   : "Oops...",
                    text    : 'Vous n\'avez saisi aucune cour',
                  });
                return 0;
            }


        }
        else
        {
                var url = storeCoursUrl;
                $.ajax({
                    type: "post",
                    url: url,
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data:
                    {
                        cours : cours
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            if (response.problematic_titles.length > 0)
                            {
                                $.each(response.problematic_titles, function (index, value) {
                                    (function (item)
                                    {
                                        var alertDiv = $('<div class="success">\
                                                            <div class="success__icon">\
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none">\
                                                                    <path fill-rule="evenodd" fill="#393a37" d="m12 1c-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11-4.925-11-11-11zm4.768 9.14c.0878-.1004.1546-.21726.1966-.34383.0419-.12657.0581-.26026.0477-.39319-.0105-.13293-.0475-.26242-.1087-.38085-.0613-.11844-.1456-.22342-.2481-.30879-.1024-.08536-.2209-.14938-.3484-.18828s-.2616-.0519-.3942-.03823c-.1327.01366-.2612.05372-.3782.1178-.1169.06409-.2198.15091-.3027.25537l-4.3 5.159-2.225-2.226c-.1886-.1822-.4412-.283-.7034-.2807s-.51301.1075-.69842.2929-.29058.4362-.29285.6984c-.00228.2622.09851.5148.28067.7034l3 3c.0983.0982.2159.1748.3454.2251.1295.0502.2681.0729.4069.0665.1387-.0063.2747-.0414.3991-.1032.1244-.0617.2347-.1487.3236-.2554z" clip-rule="evenodd"></path>\
                                                                </svg>\
                                                            </div>\
                                                            <div class="success__title">'+item+'</div>\
                                                            <div class="success__close">\
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20">\
                                                                    <path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path>\
                                                                </svg>\
                                                            </div>\
                                                        </div>');

                                        Swal.fire({
                                            icon    : "error",
                                            title   : "Oops...",
                                            text    : '=> cour '+item +' déja existe',
                                          });
                                        setTimeout(function () {
                                            alertDiv.fadeOut('slow');
                                        }, 6000);
                                    })(value);
                                    $('#ModalAddCour').modal("hide");
                                    GetTableCour();
                                    $('.sectiontablecours .form-group:get(0)').remove();
                                });
                            }
                            else
                            {
                                var widthContainer = $('.widthContainer').width();
                                $('.msg').css('width',widthContainer+'px');
                                $('.msg').addClass('alert alert-success').text('Ajouter avec succès').delay(4000).fadeOut('slow');
                                $('#ModalAddCour').modal("hide");
                                $('.sectiontablecours .form-group:get(0)').remove();
                            }

                        }
                    }
                });
        }



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
