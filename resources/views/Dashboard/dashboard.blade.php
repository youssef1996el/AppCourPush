<!doctype html>

<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon"  href="{{asset('image/leaf.svg')}}">
    <title>Admin</title>
    <link href="{{asset('css/bootstrap_sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('css/main_sidebar.css')}}" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
	<div id="page">

		<div class="wrapper">

			<nav id="sidebar" class="active">

				<div class="sidebar-header text-center">

					<img src="{{asset('image/leaf.svg')}}" alt="logo" class="app-logo">
					<h4 class="sidebar-title theme-item">AVNI</h4>
				</div>

				<ul class="list-unstyled components text-secondary">
					<li><a href="index.html"><i
							class="data-feather theme-item" data-feather="home"></i> <span
							class="theme-item"> Dashboard</span></a></li>
					<li><a href="{{ url('Dashboard/cours') }}"><i class="data-feather theme-item"
							data-feather="file-text"></i> <span class="theme-item">Cours</span></a></li>
					<li><a href="{{ url('professeurs') }}"><i
							class="data-feather theme-item" data-feather="pie-chart"></i> <span
							class="theme-item"> Professeurs</span></a></li>
					<li><a href="components.html"><i
							class="data-feather theme-item" data-feather="grid"></i> <span
							class="theme-item"> Eleves</span></a></li>
					<li><a href="extras.html"><i
							class="data-feather theme-item" data-feather="globe"></i> <span
							class="theme-item"> Extras</span></a></li>
					<li><a href="loginregister.html"><i
							class="data-feather theme-item" data-feather="users"></i> <span
							class="data-feather theme-item"> Login</span></a></li>
				
					</li>
				</ul>

			

			</nav>

			<div id="bodywrapper" class="container-fluid showhidetoggle">

				<nav class="navbar navbar-expand-md navbar-white bg-white py-0"
					aria-label="navbarexample" id="navbar">
					<div class="container-fluid">
						<button type="button" id="sidebarCollapse"
							class="btn btn-light py-0">
							<i data-feather="menu"></i> <span></span>
						</button>
						<img src="{{asset('image/leaf.svg')}}" alt="logo"
							class="app-logo theme-item mx-2 navbrandarea1">
						<h4 class="sidebar-title theme-item mt-2 navbrandarea2">AVNI</h4>
						<button class="navbar-toggler py-0" type="button"
							data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
							aria-controls="navbarsExample04" aria-expanded="false"
							aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"><i data-feather="menu"></i></span>
						</button>

						<div class="collapse navbar-collapse mx-1" id="navbarsExample04">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">

								<li class="nav-item"><div class="nav-dropdown">
										<a class="nav-item nav-link active text-secondary py-0"
											aria-current="page" href="index.html"><i
											class="data-feather theme-item" data-feather="home"></i> <span
											class="theme-item">Home </span></a>
									</div></li>
							


							

								<li class="nav-item dropdown nav-dropdown"><a
									class="nav-item nav-link dropdown-toggle text-secondary notification"
									href="#" id="navbarDropdownmailAlert" role="button"
									data-bs-toggle="dropdown" aria-expanded="false"> <i
										class="data-feather theme-item" data-feather="bell"></i> <badge
											class="badge bg-danger">12</badge></a>
									<ul class="dropdown-menu notification-menu"
										aria-labelledby="navbarDropdownmailAlert">
										<li class="text-center"><i class="data-feather me-2"
											data-feather="message-square"></i>Notifications</li>
										<li><a href="#"
											class="dropdown-item custom-dropmenu mt-2 text-white bg-info"><i
												class="data-feather me-2" data-feather="user"></i> Lorem
												ipsum dolor sit amet</a></li>
										<div class="dropdown-divider"></div>
										<li><a href="#"
											class="dropdown-item custom-dropmenu mt-2 text-white bg-info"><i
												class="data-feather me-2" data-feather="user"></i> Duis aute
												irure dolor in reprehenderit</a></li>
										<div class="dropdown-divider"></div>
										<li><a href="#"
											class="dropdown-item custom-dropmenu mt-2 text-white bg-info"><i
												class="data-feather me-2" data-feather="user"></i> Excepteur
												sint occaecat cupidatat</a></li>
										<div class="dropdown-divider"></div>
										<li><a href="#"
											class="dropdown-item custom-dropmenu mt-2 text-white bg-info"><i
												class="data-feather me-2" data-feather="user"></i> Aute
												irure dolor in reprehenderit in</a></li>
										<div class="dropdown-divider"></div>
										<li class="text-center"><a href="#"
											class="dropdown-item mt-2"><i class="data-feather me-2"
												data-feather="list"></i> See All Notifications</a></li>
									</ul></li>

								<li class="nav-item dropdown nav-dropdown"><a
									class="nav-item nav-link dropdown-toggle text-secondary notification"
									href="#" id="navbarDropdownmail" role="button"
									data-bs-toggle="dropdown" aria-expanded="false"> <i
										class="data-feather theme-item" data-feather="mail"></i> <badge
											class="badge bg-primary">23</badge></a>
									<ul class="dropdown-menu notification-menu"
										aria-labelledby="navbarDropdownmail">
										<li class="text-center"><i class="data-feather me-2"
											data-feather="mail"></i>Mails</li>
										<li><a href="#"
											class="dropdown-item custom-dropmenu mt-2 text-danger"><i
												class="data-feather me-2" data-feather="mail"></i> Lorem
												ipsum dolor sit amet</a></li>
										<div class="dropdown-divider"></div>
										<li><a href="#"
											class="dropdown-item custom-dropmenu mt-2 text-danger"><i
												class="data-feather me-2" data-feather="mail"></i> Duis aute
												irure dolor in reprehenderit</a></li>
										<div class="dropdown-divider"></div>
										<li><a href="#"
											class="dropdown-item custom-dropmenu mt-2 text-primary"><i
												class="data-feather me-2" data-feather="mail"></i> Excepteur
												sint occaecat cupidatat</a></li>
										<div class="dropdown-divider"></div>
										<li><a href="#"
											class="dropdown-item custom-dropmenu mt-2 text-warning"><i
												class="data-feather me-2" data-feather="mail"></i> Aute
												irure dolor in reprehenderit in</a></li>
										<div class="dropdown-divider"></div>
										<li class="text-center"><a href="#"
											class="dropdown-item mt-2"><i class="data-feather me-2"
												data-feather="list"></i> See All Mails</a></li>
									</ul></li>

							</ul>
							<div id="navSearchForm" class="mx-1">
								<form action="#" class="search-form py-0">
									<input type="text" placeholder="Search">
									<button type="submit">
										<i class="data-feather navbar-search-icon"
											data-feather="search"></i>
									</button>
								</form>
							</div>


							<div class="usermenu">
								<div class="nav-dropdown py-0">
									<a href="#"
										class="nav-item nav-link dropdown-toggle text-secondary py-0"
										id="navbarDropdown3" role="button" data-bs-toggle="dropdown"
										aria-expanded="false"> <img class="theme-item user-avatar"
										src="{{asset('image/earth.svg')}}" alt="User image"> <!--<i class="theme-item" -->
										<!--data-feather="user"></i> --> <span class="theme-item">My
											Name</span><i class="theme-item" data-feather="chevron-down"></i></a>
									<ul class="dropdown-menu dropdown-menu-end"
										aria-labelledby="navbarDropdown3">
										<li><a href="profile.html" class="dropdown-item mt-2"><i
												class="data-feather" data-feather="user"></i> Profile</a></li>
										<li><a href="#" class="dropdown-item mt-2"><i
												class="data-feather" data-feather="mail"></i> Messages</a></li>
										<li><a href="#" class="dropdown-item mt-2"
											data-bs-toggle="modal" data-bs-target="#settingsModal"><i
												class="data-feather" data-feather="settings"></i> Settings</a></li>
										<li><a href="#" class="dropdown-item mt-2"><i
												class="data-feather" data-feather="log-out"></i> Logout</a></li>
									</ul>
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


				<div class="content">
					<div class="container-fluid">
						<div class="row mt-2">
							<div class="col-md-6 float-start">
								<h4 class="m-0 text-dark text-muted">Dashboard</h4>
							</div>
							<div class="col-md-6">
								<ol class="breadcrumb float-end">
									<li class="breadcrumb-item"><a href="#"> Home</a></li>
									<li class="breadcrumb-item active">Dashboard</li>
								</ol>
							</div>
						</div>


						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-3">
								<div class="card card-rounded">
									<div class="content">
										<div class="row">
											<div class="col-sm-4">
												<div class="icon-big text-center">
													<i class="teal data-feather-big" stroke-width="3"
														data-feather="shopping-cart"></i>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="detail">
													<p class="detail-subtitle">New Orders</p>
													<span class="number">7,265</span>
												</div>
											</div>
										</div>
										<div class="footer">
											<hr />
											<div class="d-flex justify-content-between box-font-small">
												<div class="col-md-6 stats">
													<i data-feather="calendar"></i> This Week
												</div>
												<div class="col-md-6">
													<a class="text-primary float-end" href="#"><i
														class="blue" data-feather="chevrons-right"></i>See Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-lg-3">
								<div class="card card-rounded">
									<div class="content">
										<div class="row">
											<div class="col-sm-4">
												<div class="icon-big text-center">
													<i class="olive data-feather-big" stroke-width="3"
														data-feather="dollar-sign"></i>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="detail">
													<p class="detail-subtitle">Revenue</p>
													<span class="number">$880,900</span>
												</div>
											</div>
										</div>
										<div class="footer">
											<hr />
											<div class="d-flex justify-content-between box-font-small">
												<div class="col-md-6 stats">
													<i data-feather="calendar"></i> This Week
												</div>
												<div class="col-md-6">
													<a class="text-primary float-end" href="#"><i
														class="blue" data-feather="chevrons-right"></i>See Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-6 col-lg-3">
								<div class="card card-rounded text-center">
									<div class="content">
										<img src="assets/img/earth.svg" alt="Avni - The Earth"
											class="img-fluid rounded-circle mb-2" width="135"
											height="135" />
									</div>
								</div>
							</div>


							<div class="col-sm-6 col-md-6 col-lg-3">
								<div class="card card-rounded">
									<div class="content">
										<div class="row">
											<div class="col-sm-4">
												<div class="icon-big text-center">
													<i class="orange data-feather-big" stroke-width="3"
														data-feather="mail"></i>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="detail">
													<p class="detail-subtitle">Notifications</p>
													<span class="number">1275</span>
												</div>
											</div>
										</div>
										<div class="footer">
											<hr />
											<div class="d-flex justify-content-between box-font-small">
												<div class="col-md-6 stats">
													<i data-feather="mail"></i> This month
												</div>
												<div class="col-md-6">
													<a class="text-primary float-end" href="#"><i
														class="blue" data-feather="chevrons-right"></i>See Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<div class="card">
											<div class="content">
												<div class="head">
													<h5 class="mb-0">Web Traffic</h5>
													<p class="text-muted">Visitor data</p>
												</div>
												<div class="canvas-wrapper">
													<canvas class="chart" id="trafficflow"></canvas>
												</div>
												<div class="ui hidden divider"></div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="card">
											<div class="content">
												<div class="head">
													<h5 class="mb-0">Number of Users</h5>
													<p class="text-muted">Users per month</p>
												</div>
												<div class="canvas-wrapper">
													<canvas class="chart" id="sales"></canvas>
												</div>
												<div class="ui hidden divider"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card">
									<div class="content">
										<div class="head">
											<h5 class="mb-0">Top Visitors by Country</h5>
											<p class="text-muted">Fiscal user data</p>
										</div>
										<div class="canvas-wrapper">
											<table class="table no-margin">
												<thead class="success">
													<tr>
														<th>Country</th>
														<th class="text-right">Unique Visitors</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><i class="text-primary" data-feather="flag"></i>
															United States</td>
														<td class="text-right">27,340</td>
													</tr>
													<tr>
														<td><i class="text-danger" data-feather="flag"></i>
															India</td>
														<td class="text-right">21,280</td>
													</tr>
													<tr>
														<td><i class="text-primary" data-feather="flag"></i>
															Japan</td>
														<td class="text-right">18,210</td>
													</tr>
													<tr>
														<td><i class="text-success" data-feather="flag"></i>
															United Kingdom</td>
														<td class="text-right">15,176</td>
													</tr>
													<tr>
														<td><i class="text-warning" data-feather="flag"></i>
															India</td>
														<td class="text-right">14,276</td>
													</tr>
													<tr>
														<td><i class="text-warning" data-feather="flag"></i>
															Germany</td>
														<td class="text-right">13,176</td>
													</tr>
													<tr>
														<td><i class="text-success" data-feather="flag"></i>
															India</td>
														<td class="text-right">12,176</td>
													</tr>
													<tr>
														<td><i class="text-primary" data-feather="flag"></i>
															United States</td>
														<td class="text-right">11,886</td>
													</tr>
													<tr>
														<td><i class="text-success" data-feather="flag"></i>
															India</td>
														<td class="text-right">11,509</td>
													</tr>
													<tr>
														<td><i class="text-info" data-feather="flag"></i>
															India</td>
														<td class="text-right">1,700</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card">
									<div class="content">
										<div class="head">
											<h5 class="mb-0">Most Visited Pages</h5>
											<p class="text-muted">Fiscal visitor data</p>
										</div>
										<div class="canvas-wrapper">
											<table class="table no-margin table-striped">
												<thead class="success">
													<tr>
														<th>Page Name</th>
														<th class="text-right">Visitors</th>
														<th>Target</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><a href="index.html" class="text-info"><i
																data-feather="link" class="data-feather blue"></i>index.html
														</a></td>
														<td class="text-right">8,340</td>
														<td><div class="progress" style="height: 20px;">
																<div class="progress-bar" role="progressbar"
																	style="width: 25%;" aria-valuenow="25"
																	aria-valuemin="0" aria-valuemax="100">25%</div>
															</div></td>
													</tr>
													<tr>
														<td><a href="index.html" class="text-info"><i
																data-feather="link" class="data-feather blue"></i>index.html
														</a></td>
														<td class="text-right">7,280</td>
														<td><div class="progress" style="height: 10px;">
																<div class="progress-bar bg-success" role="progressbar"
																	style="width: 100%;" aria-valuenow="50"
																	aria-valuemin="0" aria-valuemax="100"></div>
															</div></td>
													</tr>
													<tr>
														<td><a href="index.html" class="text-info"><i
																data-feather="link" class="data-feather blue"></i>index.html
														</a></td>
														<td class="text-right">6,210</td>
														<td>
															<div class="progress" style="height: 20px;">
																<div class="progress-bar bg-danger" role="progressbar"
																	style="width: 25%;" aria-valuenow="25"
																	aria-valuemin="0" aria-valuemax="100">25%</div>
															</div>
														</td>
													</tr>
													<tr>
														<td><a href="index.html" class="text-info"><i
																data-feather="link" class="data-feather blue"></i>index.html
														</a></td>
														<td class="text-right">5,176</td>
														<td><div class="progress" style="height: 10px;">
																<div class="progress-bar bg-info" role="progressbar"
																	style="width: 80%" aria-valuenow="50" aria-valuemin="0"
																	aria-valuemax="100"></div>
															</div></td>
													</tr>
													<tr>
														<td><a href="index.html" class="text-info"><i
																data-feather="link" class="data-feather blue"></i>index.html
														</a></td>
														<td class="text-right">4,276</td>
														<td><div class="progress" style="height: 10px;">
																<div class="progress-bar bg-warning" role="progressbar"
																	style="width: 90%" aria-valuenow="50" aria-valuemin="0"
																	aria-valuemax="100"></div>
															</div></td>
													</tr>
													<tr>
														<td><a href="index.html" class="text-info"><i
																data-feather="link" class="data-feather blue"></i>index.html
														</a></td>
														<td class="text-right">3,176</td>
														<td><div class="progress" style="height: 10px;">
																<div class="progress-bar bg-danger" role="progressbar"
																	style="width: 100%" aria-valuenow="50"
																	aria-valuemin="0" aria-valuemax="100"></div>
															</div></td>
													</tr>
													<tr>
														<td><a href="index.html" class="text-info"><i
																data-feather="link" class="data-feather blue"></i>index.html
														</a></td>
														<td class="text-right">2,176</td>
														<td><div class="progress" style="height: 10px;">
																<div class="progress-bar bg-success" role="progressbar"
																	style="width: 100%" aria-valuenow="50"
																	aria-valuemin="0" aria-valuemax="100"></div>
													</tr>
													<tr>
														<td><a href="index.html" class="text-info"><i
																data-feather="link" class="data-feather blue"></i>index.html
														</a></td>
														<td class="text-right">1,886</td>
														<td><div class="progress" style="height: 10px;">
																<div class="progress-bar bg-success" role="progressbar"
																	style="width: 100%" aria-valuenow="50"
																	aria-valuemin="0" aria-valuemax="100"></div>
															</div></td>
													</tr>
													<tr>
														<td><a href="index.html" class="text-info"><i
																data-feather="link" class="data-feather blue"></i>index.html
														</a></td>
														<td class="text-right">1,509</td>
														<td><div class="progress" style="height: 10px;">
																<div class="progress-bar bg-warning" role="progressbar"
																	style="width: 50%" aria-valuenow="50" aria-valuemin="0"
																	aria-valuemax="100"></div>
															</div></td>
													</tr>
													<tr>
														<td><a href="index.html" class="text-info"><i
																data-feather="link" class="data-feather blue"></i>index.html
														</a></td>
														<td class="text-right">1,100</td>
														<td><div class="progress" style="height: 10px;">
																<div class="progress-bar bg-success" role="progressbar"
																	style="width: 100%" aria-valuenow="50"
																	aria-valuemin="0" aria-valuemax="100"></div>
															</div></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>


					

								

					
						
						</div>
					</div>

				</div>

			</div>

		</div>
	</div>
	<footer class="footer container mt-auto py-1">
		<div
			class="d-sm-flex justify-content-center justify-content-sm-between">
			<span
				class="text-muted d-block text-center text-sm-left d-sm-inline-block">No
				Copyright Â© Open Source <script>
					document.write(new Date().getFullYear())
				</script>
			</span> <span
				class="float-none text-muted float-sm-right d-block mt-1 mt-sm-0 text-center">
				AVNI - <a href="https://github.com/ajkr195/Avni" target="_blank">Open
					Source Bootstrap 5 dashboard</a>
			</span>
		</div>
	</footer>
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
	<script type="text/javascript">
		var trafficchart = document.getElementById("trafficflow");
		var saleschart = document.getElementById("sales");

		var myChart1 = new Chart(trafficchart, {
			type : 'line',
			data : {
				labels : [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul',
						'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ],
				datasets : [ {
					backgroundColor : "rgba(48, 164, 255, 0.5)",
					borderColor : "rgba(48, 164, 255, 0.8)",
					data : [ '1135', '1135', '1140', '1168', '1150', '1145',
							'1155', '1155', '1150', '1160', '1185', '1190' ],
					label : '',
					fill : true
				} ]
			},
			options : {
				responsive : true,
				title : {
					display : false,
					text : 'Chart'
				},
				legend : {
					position : 'top',
					display : false,
				},
				tooltips : {
					mode : 'index',
					intersect : false,
				},
				hover : {
					mode : 'nearest',
					intersect : true
				},
				scales : {
					xAxes : [ {
						display : true,
						scaleLabel : {
							display : true,
							labelString : 'Months'
						}
					} ],
					yAxes : [ {
						display : true,
						scaleLabel : {
							display : true,
							labelString : 'Number of Visitors'
						}
					} ]
				}
			}
		});

		var myChart2 = new Chart(saleschart, {
			type : 'bar',
			data : {
				labels : [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul',
						'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ],
				datasets : [ {
					label : 'Income',
					backgroundColor : "rgba(76, 175, 80, 0.5)",
					borderColor : "#6da252",
					borderWidth : 1,
					data : [ "280", "300", "400", "600", "450", "400", "500",
							"550", "450", "650", "950", "1000" ],
				} ]
			},
			options : {
				responsive : true,
				title : {
					display : false,
					text : 'Chart'
				},
				legend : {
					position : 'top',
					display : false,
				},
				tooltips : {
					mode : 'index',
					intersect : false,
				},
				hover : {
					mode : 'nearest',
					intersect : true
				},
				scales : {
					xAxes : [ {
						display : true,
						scaleLabel : {
							display : true,
							labelString : 'Months'
						}
					} ],
					yAxes : [ {
						display : true,
						scaleLabel : {
							display : true,
							labelString : 'Number of Users'
						}
					} ]
				}
			}
		});
	</script>

	<script src="{{asset('js/jspdf.min.js')}}"></script>
	<script>
		function onClick() {
			var pdfExport = new jsPDF('p', 'pt', 'a4');
			var htmlTableContent = document.getElementById("tableContent");
			pdfExport.fromHTML(htmlTableContent);
			pdfExport.save('tableData.pdf');
		};

		var element = document.getElementById("exportToPDF1");
		element.addEventListener("click", onClick);
	</script>
	<script>
		function showTableData() {
			var oTable = document.getElementById('finTable');
			var rowLength = oTable.rows.length;
			for (i = 0; i < rowLength; i++) {
				var oCells = oTable.rows.item(i).cells;
				var cellLength = oCells.length;
				for (var j = 0; j < cellLength; j++) {
					var cellVal = oCells.item(j).innerHTML;
					//alert(cellVal);
				}
			}
		}
	</script>

	<script type="text/javascript">
		document.getElementById('finTable').addEventListener('click',
				function(item) {
					var row = item.path[1];
					var row_value = "";
					for (var j = 0; j < row.cells.length; j++) {
						row_value += row.cells[j].innerHTML;
						row_value += " | ";
					}

					//alert(row_value);
					var pdfExport = new jsPDF('p', 'pt', 'a4');
					pdfExport.fromHTML(row_value);
					pdfExport.save(row_value.split('|')[0].trim() + '.pdf');

					if (row.classList.contains('highlight'))
						row.classList.remove('highlight');
					else
						row.classList.add('highlight');
				});
	</script>
</body>

</html>
