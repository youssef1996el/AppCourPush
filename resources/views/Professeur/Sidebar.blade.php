<!doctype html>

<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon"  href="{{asset('image/leaf.svg')}}">
    <title>Kottab</title>
    <link rel="icon" href="{{asset('image/faviconnobg.png')}}" type="image/x-icon">
	<link href="{{asset('css/Sidebar.css')}}" rel="stylesheet">
	<link href="{{asset('css/Navbar.css')}}" rel="stylesheet">

    <link href="{{asset('css/bootstrap_sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('css/main_sidebar.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body class="d-flex flex-column h-100">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<div id="page">

		<div class="wrapper g-0">

			<nav id="sidebar" class="active">

				<div class="sidebar-header text-center">

					<h4 class="sidebar-title theme-item">LOGO</h4>
				</div>

				<ul class="list-unstyled components text-secondary">
					<li><a href="index.html"><i
							class="data-feather theme-item"  data-feather="home"></i> <span
							class="theme-item"> Dashboard</span></a></li>

					<li><a href="{{ url('ShowProfileProf') }}"><i class="fa-solid fa-user-tie"></i>
					   <span class="theme-item">Profile</span></a></li>
					<li><a href="{{url('MesEleves')}}"><i class="fa-solid fa-users"></i>
					   <span class="theme-item"> Eleves</span></a></li>
					<li><a href="{{ url('Cours&Disponibilite') }}"><i class="data-feather theme-item"
							data-feather="file-text"></i> <span
							class="theme-item"> Les cours / Disponibilite</span></a></li>
					<li><a href="{{route('InfoProfesseur')}}"><i class="fa-solid fa-user-pen"></i> <span
							class="theme-item" style="font-size:15px"> Informations personnelles</span></a></li>

					<li>
                        <a href="{{route('ExpEduInfos')}}">
                            <i class="fa-solid fa-user-pen"></i>
                            <span class="theme-item"> Education et Experience</span>
                        </a>
                    </li>
                    @if ($HasMeeting)
                        <li>
                            <a href="{{url('ElevesReserve')}}">
                                <i class="fa-regular fa-handshake"></i>
                                <span class="theme-item"> Réunion zoom</span>
                            </a>
                        </li>
                    @endif

				</ul>
			</nav>

			<div id="bodywrapper" class="container-fluid showhidetoggle" style="background-image:url('{{asset('image/25099.jpg')}}');background-repeat: no-repeat;background-position:center;background-size:cover">

				<nav class="navbar navbar-expand-md  bg-white py-0" aria-label="navbarexample" id="navbar" >
					<div class="container-fluid">
						<button type="button" id="sidebarCollapse"
							class="btn btn-light py-0">
							<i data-feather="menu"></i> <span></span>
						</button>
						<div
							class="app-logo theme-item mx-2 navbrandarea1"></div>
						<h4 style="margin-left: -26px;" class="sidebar-title theme-item mt-2 navbrandarea2">LOGO</h4>
						<button class="navbar-toggler py-0" type="button"
							data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
							aria-controls="navbarsExample04" aria-expanded="false"
							aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"><i data-feather="menu"></i></span>
						</button>
						<div class="collapse navbar-collapse mx-1" id="navbarsExample04" >
							<div class="row  w-100">
								<div class="col-6">
									<ul class="navbar-nav me-auto mb-2 mb-lg-0">
										<div class="notif" >
										    <li class="nav-item dropdown nav-dropdown">
                                                <a class="nav-item nav-link dropdown-toggle text-secondary notification" href="#" id="navbarDropdownmailAlert" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                     <i class="data-feather theme-item" data-feather="bell"></i>
                                                     <div id="NotificationCount">
                                                        <badge class="badge bg-danger">{{auth()->user()->unreadNotifications->count()}}</badge>
                                                     </div>
                                                </a>
											    <ul class="dropdown-menu notification-menu" aria-labelledby="navbarDropdownmailAlert">
                                                    <li class="text-center">
                                                        <i class="data-feather me-2" data-feather="message-square"></i>
                                                        Notifications
                                                    </li>
                                                    @php
                                                        $url ='';
                                                    @endphp
                                                    <div id="unReadNotification">
                                                        @foreach (auth()->user()->unreadNotifications as $notification)
                                                        <li>
                                                            @php
                                                                $url = $notification->data['id'];
                                                                $hashids = new Hashids\Hashids();

                                                                $url = $hashids->encode($url);
                                                            @endphp
                                                            <a href="{{url('ShowUsers/'.$url)}}" class="dropdown-item custom-dropmenu mt-2 text-white bg-info">
                                                                <i class="data-feather me-2" data-feather="user"></i>
                                                                {{ $notification->data['title'] }}
                                                            </a>
                                                        </li>
                                                        {{--   <div class="dropdown-divider"></div> --}}
                                                        @endforeach
                                                    </div>
												    <div class="dropdown-divider"></div>
												    <li class="text-center">
                                                        <a href="#" class="dropdown-item mt-2">
                                                            <i class="data-feather me-2" data-feather="list"></i>
                                                            See All Notifications
                                                        </a>
                                                    </li>
											    </ul>
                                            </li>
										</div>
									</ul>
								</div>
								<div class="col-6 ">
									<div class="usermenu ">
										<div class="nav-dropdown py-0 ">
											<a href="#"class="nav-item nav-link dropdown-toggle text-secondary py-0 float-end ImgProfile"  id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="theme-item user-avatar " src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('image/default-avatar.png') }}" alt="User image">

											</a>
											<ul class="dropdown-menu dropdown-menu-end menuUsers " aria-labelledby="navbarDropdown3">
                                                <div>
                                                    <h5 class="text-uppercase text-center text-secondary">{{ Auth::user()->name }}</h5>
                                                </div>
                                                <hr>
												<li>
                                                    <a href="profile.html" class="dropdown-item mt-2">
                                                        <i class="data-feather" data-feather="user"></i>
                                                        Profile
                                                    </a>
                                                </li>
												<li>
                                                    <a href="#" class="dropdown-item mt-2">
                                                        <i class="data-feather" data-feather="mail"></i>
                                                        Messages
                                                    </a>
                                                </li>
												<li>
                                                    <a href="#" class="dropdown-item mt-2" data-bs-toggle="modal" data-bs-target="#settingsModal">
                                                        <i class="data-feather" data-feather="settings"></i>
                                                        Settings
                                                    </a>
                                                </li>
												<li>
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item mt-2">
                                                        <i class="data-feather" data-feather="log-out"></i>
                                                        Logout
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
											</ul>
                                            <style>

                                            </style>
										</div>
									</div>
								</div>
							</div>






						</div>
					</div>
				</nav>


				<div class="settings">
					<div class="modal fade" id="settingsModal"
						aria-labelledby="settingsModalTitle" aria-hidden="true"
						tabindex="-1">
						<!-- 				 data-bs-backdrop="static" data-bs-keyboard="false" -->
						<div class="modal-dialog modal-dialog-settings">
							<div class="modal-content">
								<div class="modal-header text-center">
									<h5 class="modal-title" id="exampleModalLabel">Settings</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">

									<section id="logincontent" class="shiftdown">

										<div class="row g-3 mb-3 mt-3">

											<div class="col-md-6">
												<h6 class="text-muted">Select Color</h6>
												<span onclick="changeColor('0')"
													class="btn btn-sm btn-primary rounded-circle"><span
													class="me-2"></span></span> <span onclick="changeColor('1')"
													class="btn btn-sm btn-success rounded-circle"><span
													class="me-2"></span></span> <span onclick="changeColor('2')"
													class="btn btn-sm btn-danger rounded-circle"><span
													class="me-2"></span></span> <span onclick="changeColor('3')"
													class="btn btn-sm btn-warning rounded-circle"><span
													class="me-2"></span></span> <span onclick="changeColor('4')"
													class="btn btn-sm btn-secondary rounded-circle"><span
													class="me-2"></span></span>
												<div class="d-flex justify-content-between">
													<button onclick="removeColorCookie()">Reset to
														Default</button>
												</div>
											</div>
											<div class="col-md-6">
												<h6 class="text-muted">Preferences</h6>
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox"
														id="flexSwitchCheckDefault"> <label
														class="form-check-label" for="flexSwitchCheckDefault">Switch
														option 1</label>
												</div>
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox"
														id="flexSwitchCheckChecked" checked> <label
														class="form-check-label" for="flexSwitchCheckChecked">Switch
														option 2</label>
												</div>
											</div>
										</div>
										<div class="row g-3 mb-3 mt-3">
											<div class="col-md-6">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value=""
														id="defaultCheck1" checked> <label
														class="form-check-label" for="defaultCheck1">
														Checkbox 1 </label>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value=""
														id="defaultCheck2"> <label
														class="form-check-label" for="defaultCheck2">
														Checkbox 2</label>
												</div>
											</div>
											<div class="col-md-6">
												<h6 class="text-muted">View Size</h6>
												<div class="form-check">
													<input class="form-check-input" type="radio"
														name="flexRadioDefault" id="radioCompactView"> <label
														class="form-check-label" for="radioCompactView">
														Compact</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="radio"
														name="flexRadioDefault" id="radioFullView"> <label
														class="form-check-label" for="radioFullView">
														Full-screen </label>
												</div>
												<div class="d-flex justify-content-between">
													<button onclick="removeViewSizeCookie()">Reset to
														Default</button>
												</div>

											</div>
										</div>
										<hr />
										<button class="btn btn-sm btn-danger" data-bs-dismiss="modal"
											type="button">
											<i data-feather="check-circle" class="mr-1"></i> Ok
										</button>
									</section>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="sidebarOverlayNav" class="screen-overlay float-end">
					<a href="javascript:void(0)" class="closebtn"
						onclick="closeOverlayNav()">&times;</a>
					<div class="screen-overlay-content text-secondary">
						<a href="#" class="active">About</a> <a href="#">Services</a> <a
							href="#">Clients</a> <a href="#">Contact</a>
					</div>
				</div>
				<div id="loading" class="spinner-border text-primary align-middle"
		role="status"></div>

	<button class="btn btn-sm btn-primary rounded-circle"
		onclick="scrollToTopFunction()" id="scrollToTop" title="Scroll to top">
		<i data-feather="arrow-up-circle"></i>
	</button>

	<script src="{{asset('js/feather.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('js/Chart.min.js')}}"></script>
	<script src="{{asset('js/script_sidebar.js')}}"></script>




        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function(event) {
                feather.replace();
            });
        </script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to set the active item
        function setActiveItem(index) {
            var lis = document.querySelectorAll('#sidebar li');
            lis.forEach(function(li, i) {
                if (i === index) {
                    li.classList.add('active');
                } else {
                    li.classList.remove('active');
                }
            });
        }

        // Get the current URL to determine the active item dynamically
        var currentURL = window.location.href;

        // Define your URL patterns and corresponding index
        var urlPatterns = [
            { pattern: 'index.html', index: 0 },
            { pattern: 'ShowProfileProf', index: 1 },
            { pattern: 'MesEleves', index: 2 },
			{ pattern: 'Cours&Disponibilite', index: 3 },
			{ pattern: 'InfoProfesseur', index: 4 },
            { pattern: 'ExpEduInfos', index: 5 },
            { pattern: 'ElevesReserve', index: 6 },
        ];

        // Determine the active index based on the current URL
        var activeIndex = 0; // Default to the first item
        urlPatterns.forEach(function(pattern) {
            if (currentURL.includes(pattern.pattern)) {
                activeIndex = pattern.index;
            }
        });

        // Set the active item
        setActiveItem(activeIndex);

        // Add Feather icons to the dynamically added icons
        feather.replace();
    });
</script>



<main class="py-4" >
            @yield('navsidebarProf')
        </main>




			</div>

		</div>
	</div>




</body>

</html>
