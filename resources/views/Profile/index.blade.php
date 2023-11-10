@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5 p-5">
        <div class="col-auto col-xl-3 space-bottom-2">
            <div class="profile-picture">
                <button class="btn-2 text-small fa fa-pencil-alt" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></button>
                <img src="https://res.cloudinary.com/meet-in-class/image/upload/c_thumb,g_face,h_200,w_200/v1698427188/uzlaemldmmyperfxbosc" alt="yy">
            </div>
        </div>
        <div class="col-12 col-md-auto col-xl-6 space-bottom-2 teacher-infos">
            <div>
                <span class="text-bold" id="teacher-firstname" style="font-size: 3rem">@php echo Auth::user()->name @endphp</span>
            </div>
            <div class="space">
                <a id="teacher-reviews-count"><i class="fas fa-star fixed-width-fa" style="color: #fdbd0d"></i> 0 avis client</a>
            </div>
            <div class="space"><i class="fa fa-archive fixed-width-fa"></i> @php echo Auth::user()->nomber_experince @endphp ans d'expérience</div>
            @php
                $originalDate = Auth::user()->created_at;
                $timestamp = strtotime($originalDate);
                $formattedDate = date("F Y", $timestamp);
            @endphp
            <div class="space"><i class="fas fa-history fixed-width-fa"></i> Inscrit(e) depuis @php echo $formattedDate  @endphp</div>
            <div class="space" id="address">
                <a href="http://www.google.com/maps/place/d" target="_blank">
                    <i class="fa fa-map-pin fixed-width-fa" title="Lieu"></i>
                    <span>Address</span>
                </a>
                <a class="btn-2 text-small fa fa-pencil-alt edit-teacher-field-btn" href="/edit-teacher-field/41af833ec62e47d5bf6abd91e6031e15/ADDRESS"></a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="nav-list">
                        <li class="listActive">
                            <i class="fa-solid fa-tv iconImage"></i>
                            <a href="#" class="active">My Files</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-camera iconImage"></i>
                            <a href="#">Camera</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-earth-americas iconImage"></i>
                            <a href="#">Web Address</a>
                        </li>
                    </ul>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ModalEditImage">
                    <div class="sectionOne">
                        <div class="dashed-border">
                            <div class="contentModalEditImage">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <span class="textBrowse">Drag and Drop an asset here</span>
                                <h3>Or</h3>
                                <input type="file" name="" id="fileInput" >
                                <label for="" class="textBrowseUpload" onclick="openFileInput()">Browse</label>
                            </div>
                        </div>
                    </div>
                    <div class="sectionTwo" style="display: none">
                        <video id="cameraFeed" autoplay class="Stream"></video>
                    </div>
                    <div class="sectionThree" style="display: none">
                        <div class="contentModalSectionThree">
                            <label for="" class="textSectionThree">Public URL of file to upload :</label>
                            <div class="input-group mb-3 w-75">
                                <input type="text" class="form-control" placeholder="http://remote.site.example/images/remote-image.jpg" aria-label="Username">
                                <span class="input-group-text" style="background:#0078ff;"><i class="fa-solid fa-arrow-right" style="color:#fff "></i></span>
                              </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<script>
    function openFileInput() {
        document.getElementById("fileInput").click();
    }
    $(document).ready(function () {
        let cameraStream;
        $('.nav-list li').click(function ()
        {
            $('.nav-list li.listActive').removeClass('listActive');
            $('.nav-list a.active').removeClass('active');
            $(this).find('a').addClass('active');
            $(this).addClass('listActive');
        });
        $(".nav-list li:eq(1)").click(function(){
            $('.sectionOne').hide();
            $('.sectionTwo').show();
            $('.sectionThree').hide();


            navigator.mediaDevices.getUserMedia({ video: true })
            .then(function(stream) {
                cameraStream = stream;
                $('#cameraFeed')[0].srcObject = stream;
            })
            .catch(function(error) {
                console.error('Error accessing the camera: ', error);
            });
        });
        $(".nav-list li:eq(2)").click(function(){
            $('.sectionOne').hide();
            $('.sectionTwo').hide();
            $('.sectionThree').show();
            if (cameraStream) {
                cameraStream.getTracks().forEach(track => track.stop());
                $('#cameraFeed')[0].srcObject = null;
            }
        });
        $(".nav-list li:eq(0)").click(function(){
            $('.sectionOne').show();
            $('.sectionTwo').hide();
            $('.sectionThree').hide();

            if (cameraStream) {
                cameraStream.getTracks().forEach(track => track.stop());
                $('#cameraFeed')[0].srcObject = null;
            }
        });
    });
</script>
<style>
    .textSectionThree
    {
        font-size: 28px;
        margin-bottom: 1.5rem
    }
    .sectionThree
    {
        background: #e4ebf1;
        min-height: 100% !important;
    }
    .Stream
    {
        width: 100%;
    }
    input[type="file"]
    {
        display: none;
    }

    .textBrowseUpload
    {
        display: inline-block;
        text-transform: uppercase;
        color: #fff;
        background: #0078ff;
        text-align: center;
        padding: 15px 40px;
        font-size: 18px;
        letter-spacing: 1.5px;
        user-select: none;
        cursor: pointer;
        box-shadow: 5px 15px 25px rgba(0, 0, 0, 0.35);
        border-radius: 3px;
        margin-bottom: 8rem
    }

    .textBrowseUpload:active
    {
            transform: scale(0.9);
    }
    .close
    {
        border: none ;
        font-size: 2rem;
        font-weight: bold !important;
        background: transparent;
    }
    .nav-list
    {
        list-style: none;
        padding: 0;
    }

    .nav-list li
    {
        display: inline-block;
        margin-right: 50px;
        text-align: center;
    }

    .nav-list i
    {
        font-size: 2rem;
        margin-bottom: 10px;
        display: block;
        cursor: pointer;
    }

    .nav-list a
    {
        text-decoration: none;
        color: black;
        border-bottom: 2px solid transparent;
        padding-bottom: 2px;
        transition: border-color 0.3s;
    }

    .nav-list a.active,
    .nav-list a.active i {
        border-bottom: 3px solid #7fbbff;
        color: #7fbbff;
        font-size: 18px;
    }
    .listActive i
    {
        color: #7fbbff;
    }
    .btn
    {
        color: #fff;
        background: #0078ff;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 9rem;
    }
    .btn:hover
    {
        color: #fff;
        background: #0078ff;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 9rem;
    }
    .fa-cloud-arrow-up
    {
        margin-bottom: 3rem;
        margin-top: 9rem;
    }
    .textBrowse
    {
        margin-bottom: 1rem;
    }
    .contentModalEditImage
    {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        height: 100%;
    }
    .contentModalSectionThree
    {
        margin-top: 16rem;
        margin-bottom: 16rem;
        margin-left: 5rem;
        text-align: left;
    }
    .contentModalEditImage .fa-cloud-arrow-up
    {
        font-size: 5rem !important;
        color: #90a0b3
    }
    .contentModalEditImage span
    {
        font-size: 1.9rem !important;
        color: #90a0b3
    }
    .ModalEditImage
    {
        background: #e4ebf1;
        min-height: 100% !important;
    }
    .dashed-border {
      border: 4px dashed #90a0b3;
      padding: 20px;
      min-height: 95% !important;
    }
    .profile-picture
    {
        display: inline-block;
        position: relative;
        margin-top: 25px;

    }
    .profile-picture button
    {
        position: absolute;
        right: 0;
        top: 0;
    }
    .btn-2, .btn-2-fluid
    {
        background: #fff;
        border-color: #1d75bc;
        color: #1d75bc;
    }
    .text-small, small
    {
        font-size: .75rem;
    }
    .btn-2-fluid.fa, .btn-2-fluid.fab, .btn-2-fluid.fal, .btn-2-fluid.far, .btn-2-fluid.fas, .btn-2.fa, .btn-2.fab,
     .btn-2.fal, .btn-2.far, .btn-2.fas, .btn-3.fa, .btn-3.fab, .btn-3.fal, .btn-3.far, .btn-3.fas, .btn-facebook.fa,
      .btn-facebook.fab, .btn-facebook.fal, .btn-facebook.far, .btn-facebook.fas, .btn-fluid.fa, .btn-fluid.fab, .btn-fluid.fal,
       .btn-fluid.far, .btn-fluid.fas, .btn.fa, .btn.fab, .btn.fal, .btn.far, .btn.fas {
        padding: 0.5em;
    }
    .btn, .btn-2, .btn-2-fluid, .btn-3, .btn-facebook, .btn-fluid {
        border-radius: 5px;
        border-style: solid;
        border-width: 2px;
        cursor: pointer;
        display: inline-block;
        line-height: 1.2em;
        padding: 0.875rem;
        text-decoration: none;
    }
    .profile-picture>img, img.profile-picture
    {
        background: #fff;
        border: 2px solid #1d75bc;
        border-radius: 50%;
        max-width: 100%;
        padding: 4px;
    }
    .space-bottom-2
    {
        margin-bottom: 2rem!important;
    }

    @media (min-width: 1044px)
    {
        .col-xl-3
        {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%;
        }
    }
    .col-auto
    {
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        max-width: none;
        width: auto;
    }

    #teacher-reviews-count
    {
        color: #1d75bc;
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif
    }
    .space
    {
        margin-bottom: 1rem;
        margin-top: 1rem;
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif
    }
</style>



@endsection
