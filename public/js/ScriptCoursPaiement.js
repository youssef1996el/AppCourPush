$(document).ready(function () {

    fetchDataTypeCours();
    function fetchDataTypeCours()
    {
        $.ajax({
            type: "get",
            url: urlFetchData,
            dataType: "json",
            success: function (response)
            {
                if(response.status == 200)
                {
                    $('.CardTypeGroupe').empty();
                    $('.CardTypePrive').empty();
                    $.each(response.data, function (index, value)
                    {

                        if(value.type === 'Cours particulier')
                        {

                            $('.CardTypeGroupe').append('<div class="card cardTypeCours" >\
                                                            <div class="content">\
                                                                <div class="title">'+value.type+'</div>\
                                                                <div class="price">'+value.prix+'</div>\
                                                                <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at posuere eros. Interdum et malesuada fames ac ante ipsum primis in faucibus.</div>\
                                                            </div>\
                                                            <button value='+value.id+' title="Modifier cette Type Cours" class="BtnEditTypeCours">\
                                                               Modifier\
                                                            </button>\
                                                        </div>');
                        }
                        else
                        {

                            $('.CardTypePrive').append('<div class="card cardTypeCours">\
                                                            <div class="content">\
                                                                <div class="title">'+value.type+'</div>\
                                                                <div class="price">'+value.prix+'</div>\
                                                                <div class="description">\
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at posuere eros. Interdum et malesuada fames ac ante ipsum primis in faucibus.\
                                                                </div>\
                                                            </div>\
                                                            <button  value='+value.id+' title="Modifier cette Type Cours" class="BtnEditTypeCours">\
                                                                Modifier\
                                                            </button>\
                                                        </div>');
                        }
                    });



                }
            }
        });
    }

    // Store
    $('.Send').on('click',function()
    {
        if($('.TypeCours').val() == 0)
        {
            $('.ErrorTypeCours').css('display', 'block');
            $('.ErrorTypeCours').text('veuillez sélectionner le type de cours').delay(4000).fadeOut('slow');
            return 0;
        }
        if($('.PrixType').val() == '')
        {
            $('.ErrorPrix').css('display', 'block');
            $('.ErrorPrix').text('veuillez entrer le prix').delay(4000).fadeOut('slow');
            return 0;
        }
        $.ajax({
            type: "post",
            url: urlStoreData,
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
            data:
            {
                type : $('.TypeCours').val(),
                prix : $('.PrixType').val(),
            },
            dataType: "json",
            success: function (response)
            {
                if(response.status == 200)
                {
                    $('#ModalAddPrix').modal('hide');
                    $('.TypeCours').val(0);
                    $('.PrixType').val("")
                    fetchDataTypeCours();
                }
                else
                {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Type Cours Déja existe",
                      });
                }
            }
        });
    });
    var id = 0;
    $(document).on('click','.BtnEditTypeCours',function()
    {
        id = $(this).attr('value');

        $.ajax({
            type: "get",
            url: urlGetTypeCours,
            data:
            {
                id : id,
            },
            dataType: "json",
            success: function (response)
            {
                if(response.status == 200)
                {
                    $('#ModalEditPrix').modal("show");
                    $('.TypeCoursEdit').val(response.data['type']).change();
                    $('.TypeCoursEdit').attr('disabled', 'disabled');
                    $('.PrixTypeEdit').val(response.data['prix']);

                }
            }
        });
    });
    $('.SendEdit').on('click',function()
    {
       /*  if($('.TypeCoursEdit').val() == 0)
        {
            $('.ErrorTypeCours').css('display', 'block');
            $('.ErrorTypeCours').text('veuillez sélectionner le type de cours').delay(4000).fadeOut('slow');
            return 0;
        }
        if($('.PrixTypeEdit').val() == '')
        {
            $('.ErrorPrix').css('display', 'block');
            $('.ErrorPrix').text('veuillez entrer le prix').delay(4000).fadeOut('slow');
            return 0;
        } */
        $.ajax({
            type: "post",
            url: urlUpdateData,
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
            data:
            {
                type : $('.TypeCoursEdit').val(),
                prix : $('.PrixTypeEdit').val(),
                id :id,
            },
            dataType: "json",
            success: function (response)
            {
                if(response.status == 200)
                {
                    $('#ModalEditPrix').modal('hide');
                    $('.TypeCoursEdit').val(0);
                    $('.PrixTypeEdit').val("")
                    fetchDataTypeCours();
                }

            }
        });
    });
});
