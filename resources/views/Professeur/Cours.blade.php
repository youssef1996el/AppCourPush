@extends('Dashboard.templateAdmin')
@section('navsidebar')
<script src="{{asset('js/CoursDispo.js')}}"></script>

<div class="container">
    <div class="card shadow"  style=" width: 800px;margin: auto;padding: 20px 24px; background: #ffffff4a;">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
            <h4 class="card-title">Liste des cours</h4>
            <div class="List-Courses">
                <div class="input-cours">
                    <div class="input-text">
                        <div class="input-div" class="d-flex">
                            <input type="text" id="input-tag">
                            <button type="button" id="AddCours" >Ajouter</button>
                        </div>
                    </div>
                    <div class="errorCours"></div>
                </div>
                <div class="ListeCours" >
                    <div class="tags-input" >
                        <ul id="tags"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .input-text{
        margin: 30px 0px 4px 0;
        display:flex;
        gap:20px;
    }

    .input-text .input-div{
        width:100%;
        position:relative;

    }
    .input-div input:focus ~ span,.input-div input:valid ~ span  {
        top:-20px;
        left:6px;
        font-size:14px;
        font-weight:600;
    }
    #input-tag{
        width: 86%;
        height: 40px;
        border: none;
        outline: 0;
        border-radius: 5px;
        border: 1px solid #cbced4;
        gap: 20px;
        box-sizing: border-box;

    }
    #AddCours, #UpDateDisponible
    {
        background-color: #4e99e9;
        border: none;
        color: #fff;
        cursor: pointer;
        padding: 8px 20px;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        transition: .9s ease;
    }
    .tags-input
    {

        Position: relative;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 12px 10px;
        box-shadow: 2px 2px 5px #00000033;
        width: 100%;
        margin-top: 9px;
        max-height: 212px;
        overflow-y: auto;
        height: 195px;
    }
    .tags-input ul
    {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .tags-input li
    {
        display: inline-block;
        background-color: #c1dae8;
        color: #333;
        border-radius: 20px;
        padding: 5px 10px;
        margin-right: 5px;
        margin-bottom: 5px;
    }
    .tags-input input[type="text"]
    {
        border: none;
        outline: none;
        padding: 5px;
        font-size: 14px;

    }
    .tags-input .delete-button
    {
        background-color: transparent;
        border: none;
        color: #999;
        cursor: pointer;
        margin-left: 5px;
    }
   
</style>
<script src="{{asset('js/timezones.full.js')}}" ></script>
<script>
     $('.dropdownTimeZone').timezones({
            lang: 'fr'
        });
    const $tags = $('#tags');
    const $input = $('#input-tag');
    function GetCoursProfInDropDown()
    {
        $.ajax({
            type: "get",
            url: "{{url('getCoursByProf')}}",
            dataType: "json",
            success: function (response)
            {
                if(response.status == 200)
                {
                    if(response.data.length > 0)
                    {
                        $('.dropDownCoursAppEnd').empty();

                        $('.dropDownCoursAppEnd').append('<option value="0">Veuillez sélectionner le cours</option>');

                        $.each(response.data, function (index, value)
                        {
                            $('.dropDownCoursAppEnd').append('<option value="' + value.id + '">' + value.title + '</option>');
                        });
                    }
                }
            }
        });
    }
    GetCoursProfInDropDown();
    function GetCoursProfSession()
    {
        const $tags = $('#tags');
        $tags.empty();
        $.ajax({
            type: "get",
            url: "{{url('getCoursByProf')}}",
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    if(response.data.length == 0)
                    {
                        $('.tags-input').css('display','none');
                    }
                    else
                    {
                        $('.tags-input').css('display','block');
                    }
                    $.each(response.data, function (index, value)
                    {
                        const $tag = $('<li></li>');
                        $tag.text(value.title);
                        $tag.append('<button type="button" class="delete-button" value=' + value.id + '>X</button>');
                        $tags.append($tag);
                    });
                }
            }
        });
    }
    GetCoursProfSession();
    // Delete Cours By Prof
    $tags.on('click', '.delete-button', function ()
    {
        $.ajax({
            type: "post",
            url: "{{url('DestroyCoursProf')}}",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            data:
            {
                idCours : $(this).attr('value'),
            },
            dataType: "json",
            success: function (response)
            {
                if(response.status == 200)
                {
                    GetCoursProfSession();
                    GetCoursProfInDropDown();
                    $(this).parent().remove();
                }
            }
        });
    });

    // Add Cours By click Entre
    $input.on('keydown', function (event)
    {
        if (event.key === 'Enter')
        {
            $('.errorCours').empty();
            event.preventDefault();
            const $tag = $('<li></li>');
            const tagContent = $input.val().trim();
            if (tagContent !== '')
            {
                $.ajax({
                    type: "post",
                    url: "{{url('StoreCoursProf')}}",
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data:
                    {
                        nameCours : tagContent,
                    },
                    dataType: "json",
                    success: function (response)
                    {

                        if(response.status == 200)
                        {
                            $('.tags-input').css('display','block');
                            $.each(response.data, function (index, value)
                            {
                                $tag.text(value.title);
                                $tag.append('<button type="button" class="delete-button" value='+value.id+'>X</button>');
                                $tags.append($tag);

                            });
                            $input.val('');
                            GetCoursProfInDropDown();
                        }
                        if(response.status == 400)
                        {
                            $('.errorCours').text('cours déja existe');
                            $input.val('');
                        }
                    }
                });

            }
        }
    });

    $('#AddCours').on('click',function(event)
    {
        event.preventDefault();
        const $tag = $('<li></li>');
        const tagContent = $input.val().trim();
        if (tagContent !== '')
        {
            $.ajax({
                type: "post",
                url: "{{url('StoreCoursProf')}}",
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data:
                {
                    nameCours : tagContent,
                },
                dataType: "json",
                success: function (response)
                {
                    if(response.status == 200)
                    {
                        $('.tags-input').css('display','block');
                        $.each(response.data, function (index, value)
                        {
                            $tag.text(value.title);
                            $tag.append('<button type="button" class="delete-button" value='+value.id+'>X</button>');
                            $tags.append($tag);
                        });
                        $input.val('');
                        GetCoursProfInDropDown();
                    }
                    if(response.status == 400)
                    {
                        $('.errorCours').text('cours déja existe');
                        $input.val('');
                    }
                }
            });
        }
    });
    // set value time just hours without minutes
    $(document).on('input', '.heuredebut, .heurefin', function(e) {
        let hour = $(this).val().split(':')[0];
        $(this).val(`${hour}:00`);
    });

    $('.removeDisponible').on("click",function(e)
    {
        var id = $(this).attr('id');

        if (typeof id !== 'undefined') {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) =>
            {
                if (result.isConfirmed)
                {
                    $.ajax({
                        type: "post",
                        url: "{{url('DeleteDisponible')}}",
                        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                        data:
                        {
                            id : id,
                        },
                        dataType: "json",
                        success: function (response)
                        {
                            if(response.status == 200)
                            {
                                /* $('#DataDisponible').load(window.location.href + ' #DataDisponible'); */
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed || result.isDismissed) {
                                        location.reload();
                                    }
                                });

                            }
                        }
                    });

                }
            });
        }
        else
        {
            var row = $(this).closest('.row');
            row.find('select.form-select').val('0');
            row.find('input[type="checkbox"]').prop('checked', false);
            row.find('input[type="time"]').val("");
        }
    });

    $('.DaysIsRemoveDisponible').on('click',function(e)
    {

        var checked = $(this).prop('checked');
        var day = $(this).closest('.DataDisponible').find('.nameDays').text();
        var colNonDisponible = $(this).closest('.DataDisponible').find('.colNonDisponible');
        var colDataNonDisponible = $(this).closest('.DataDisponible').find('.ColDataNonDisponible');
        if (checked)
        {
            colNonDisponible.css('display', 'none');
            colDataNonDisponible.css('display', 'block');
        }
        else
        {

            //remove data in this day
            var day = $(this).next('.nameDays').text();
            $.ajax({
                type: "get",
                url: "{{url('checkDayIsExiste')}}",
                data:
                {
                    jour : day,
                },
                dataType: "json",
                success: function (response)
                {
                    if(response.status == 200)
                    {
                        colNonDisponible.css('display', 'block');
                        colDataNonDisponible.css('display', 'none');
                    }
                    else if(response.status == 220)
                    {
                        Swal.fire({
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, delete it!"
                        }).then((result) =>
                        {
                            if (result.isConfirmed)
                            {
                                $.post({
                                    url: "{{url('DeleteDisponibleByDay')}}",
                                    data: { jour: day, _token: $('meta[name="csrf-token"]').attr('content') },
                                    dataType: "json",
                                    success: function(response) {
                                        if (response.status == 200) {
                                            Swal.fire({
                                                title: "Deleted!",
                                                text: "Your file has been deleted.",
                                                icon: "success"
                                            }).then((result) => {
                                                if (result.isConfirmed || result.isDismissed) {
                                                    location.reload();
                                                }
                                            });
                                        }
                                    }
                                });
                            }
                        });
                    }
                }
            });
        }
    });

    $(document).on('change','.DataDisponible .radio-input',function()
    {
        var rowContainer = $(this).closest('.row');
        var checkboxes = rowContainer.find('.radio-input');
        checkboxes.not(this).prop('checked', false);
    });

    $('#UpDateDisponible').on('click', function (e) {
        e.preventDefault();

        var atLeastOneDayChecked = false;
        var daysData = {};
        $('#disponibilityForm input[name="Days[]"]:checked').each(function () {
            atLeastOneDayChecked = true;
            var day = $(this).siblings('.nameDays').text();
            var dayData = [];
            $(this).closest('.DataDisponible').find('select[name="Cours[]"]').each(function ()
            {
                var coursValue = $(this).val();
                if (coursValue !== '0') {
                    var typeCoursValue = $(this).closest('.row').find('input[name="typeCours[]"]:checked').val();
                    var heureDebutValue = $(this).closest('.row').find('input[name="heuredebut[]"]').val();
                    var heureFinValue = $(this).closest('.row').find('input[name="heurefin[]"]').val();

                    if (typeCoursValue !== null && heureDebutValue !== null && heureFinValue !== null &&
                        typeCoursValue !== undefined && heureDebutValue !== undefined && heureFinValue !== undefined &&
                        typeCoursValue !== '' && heureDebutValue !== '' && heureFinValue !== '') {

                        dayData.push({
                            cours: coursValue,
                            typeCours: typeCoursValue,
                            heureDebut: heureDebutValue,
                            heureFin: heureFinValue
                        });
                    }
                }
            });
            daysData[day] = dayData;
        });
        if (!atLeastOneDayChecked)
        {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Veuillez sélectionner au moins un jour.",
            });
            return;
        }
        var isEmpty = true;
        for (var day in daysData)
        {
            if (daysData[day].length > 0)
            {
                isEmpty = false;
                break;
            }
        }
        if (isEmpty)
        {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Veuillez remplir les données pour au moins un jour sélectionné.",
            });
            return;
        }


        Swal.fire({
            title: "Voulez-vous enregistrer les modifications ?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Sauvegarder",
            denyButtonText: `Ne sauvegardez pas`,
            cancelButtonText: "Annuler"
        }).then((result) =>
        {

            if (result.isConfirmed)
            {
                $.ajax({
                    type: "POST",
                    url: "{{url('UpDateDisponibleByProf')}}",
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data:
                    {
                        data : daysData,
                        timezones : $('.dropdownTimeZone').val(),
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            Swal.fire({
                                title: "Enregistrée!",
                                text: "",
                                icon: "success"
                            }).then((result) => {
                                if (result.isConfirmed || result.isDismissed) {
                                    location.reload();
                                }
                            });
                        }


                    }
                });

            }
            else if (result.isDenied)
            {
                Swal.fire("Les modifications ne sont pas enregistrées", "", "info");
            }
        });


    });




</script>
@endsection