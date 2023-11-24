
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/StyleEleve.css')}}">



<div class="container ">

    <div class="WelcomeEleve">
        <h1>Bienvenue , Nom !</h1>
    </div>

    <div class="card text-left" id="bookCard">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <i class="fa-solid fa-calendar-days fa-2xl"></i>
                </div>
                <div class="col-10">  <h4 class="card-title">Réservez votre premier cours</h4>
                    <p class="card-text" style="color:gray">Consultez la liste des professeurs et sélectionnez une classe qui correspond à vos besoins pour commencer.
                        Vous avez également la possibilité de rechercher parmi les enseignants disponibles aux horaires qui vous conviennent.
                    </p>
                </div>
            </div>
        </div>

    </div>
    <div id="bookClass" style="display: none">
    <div class="searchSpace mt-5"  >
        <form action="/submit" method="post" class="form-inline">
           {{--  <div class="DivContentTimes" style="padding:10px 0px;margin: 0px auto;width: 50%;display: none" id="DivTime">

                <div style="width: 50%;border:1px solid rgb(218, 218, 218);box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);index:-1">
                    <div class="container">

                        <h4>Sélectionner l'heure</h4>
                        <div class="line">
                            <span class="text">Matin</span>
                        </div>


                        <div class="container-hours">
                            @php
                            $firstNumber = '0';
                            $Secound =':00';
                            @endphp
                            @for ($i = 0; $i <= 11; $i++)
                                <button type="button" class="btn w-25 border border-primary py-2 mt-2 btnTime" style="margin: 5px 5px 5px 5px;" value="{{$i >= 10 ? $i.$Secound : $firstNumber.$i.$Secound}}">{{$i >= 10 ? $i.$Secound : $firstNumber.$i.$Secound}}</button>
                            @endfor
                        </div>

                        <div class="line">
                            <span class="text">Après-midi/soirée</span>
                        </div>

                        <div class="container-hours">
                            @php
                            $firstNumber = '0';
                            $Secound =':00';
                            @endphp
                            @for ($i = 12; $i <= 23; $i++)
                                <button type="button" class="btn w-25 border border-primary py-2 mt-2 btnTime" style="margin: 5px 5px 5px 5px;" value="{{$i >= 10 ? $i.$Secound : $firstNumber.$i.$Secound}}">{{$i >= 10 ? $i.$Secound : $firstNumber.$i.$Secound}}</button>
                            @endfor
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>

            <div class="form-group">
                <label for="time">l'heure:</label>

                <input type="text" class="form-control" value="08:00"  name="time" id="inputtime">


            </div>


            <div class="form-group">

                <label for="btnGroup" style="display:block">Groupe ou Privé</label>

                <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="btnGroup">
                    <input type="radio" class="btn-check" name="btnradio" id="group" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="group"><i class="fas fa-users "></i></label>

                    <input type="radio" class="btn-check" name="btnradio" id="private" autocomplete="off">
                    <label class="btn btn-outline-primary " for="private" style="width:45px ; "><i class="fas fa-user "></i></label>
                </div>
            </div>



            <div class="form-group">
                <button type="submit" class="btn btn-primary" >Reinitialiser</button>
            </div>
        </form>
    </div>
    <div class="DivProfActive CardProfesseur"></div>
    <div class="pagination mt-3"></div>



</div>
</div>
<style>

               .line
               {
                width: 100%;
                text-align: center;
                border-bottom: 0px solid #000;
                line-height: 0.01em;
                margin: 20px 0 20px;
                }

                .line img {
                    vertical-align: middle;
                    margin-right: 5px;
                }

                .text {
                    background:#fff;
                    padding:10 10px;
                    font-size: 18px;
                }
                h4
                {
                    padding: 20px 0px;
                }
                .container-hours
                {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: space-evenly;

                }
                .DivContentTimes
                {
                    width: 50%;
                }




</style>

<script>
/*  document.getElementById('inputtime').addEventListener('click', function() {
    document.getElementById('DivTime').style.display = 'block';
  });

  document.addEventListener('click', function(e) {
    if (!document.getElementById('inputtime').contains(e.target) && !document.getElementById('DivTime').contains(e.target)) {
      document.getElementById('DivTime').style.display = 'none';
    }
  }); */
    $(document).ready(function () {

        $('#bookCard').on('click',function()
        {
            $('#bookClass').css('display', 'block');
        });
    var currentPage = 1; // Initialize the current page

    function fetchProfesseurs(page) {
        $.ajax({
            type: "get",
            url: "{{ url('GetpProfesseur') }}",
            data: { page: page },
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    $('.CardProfesseur').empty();
                    var url = '';
                    var Path = '';
                    var image = '';

                    $.each(response.Data.data, function (index, value) {
                        url = '{{ asset("") }}';
                        if (value.image !== null && value.image !== undefined) {
                            Path = encodeURIComponent(value.image.slice(1));
                            image = url + decodeURIComponent(Path);
                        } else {
                            image = ''; // You can set a default image or leave it empty
                        }

                        var cardHTML = '<div class="card">\
                                            <div class="card-body">\
                                                <div class="row">\
                                                    <div class="col-4">\
                                                        <img class="card-img-top" style="max-width: 40%;max-height:100vh; border-radius: 50%; border: 3px solid aliceblue; margin-left: 84px;" src="' + image + '" alt="">\
                                                    </div>\
                                                    <div class="col-4">\
                                                        <h4 class="card-title">' + value.name + '</h4>\
                                                        <p class="card-text" style="color: gray">' + value.experience + ' Ans</p>\
                                                        <p class="card-text" style="color: gray">' + value.description + '</p>\
                                                    </div>\
                                                    <div class="col-4" style="float:right">\
                                                        <button type="submit" class="btn btn-primary">Reserver</button>\
                                                        <button type="submit" class="btn btn-secondary">Details</button>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>';

                        $('.CardProfesseur').append(cardHTML);
                    });

                    if (response.Data && response.Data.links) {
                        var paginationHTML = '<ul class="pagination">';
                        $.each(response.Data.links, function (index, link) {
                            paginationHTML += '<li class="page-item ' + (link.active ? 'active' : '') + '">';
                            if (link.url) {
                                paginationHTML += '<a class="page-link" href="' + link.url + '">' + link.label + '</a>';
                            } else {
                                paginationHTML += '<span class="page-link">' + link.label + '</span>';
                            }
                            paginationHTML += '</li>';
                        });
                        paginationHTML += '</ul>';

                        $('.pagination').html(paginationHTML);
                    } else {
                        console.error('Pagination links not found in the response.');
                        $('.pagination').html('');
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Initial load
    fetchProfesseurs(currentPage);

    // Pagination click event
    $('.pagination').on('click', 'a', function(e) {
        e.preventDefault();
        currentPage = $(this).attr('href').split('page=')[1];
        fetchProfesseurs(currentPage);
    });
});

</script>


@endsection
