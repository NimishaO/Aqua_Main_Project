<?php
    session_start();
    $t_name=$_SESSION["fname"];
    date_default_timezone_set("asia/calcutta");
?><!DOCTYPE html>
<html lang="zxx">


<!-- index.html  22 Nov 2019 04:12:25 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/lightcase.css">
    <link rel="stylesheet" href="assets/css/odometer.css">
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

    <title>AQUA</title>


</head>
<style>

html,body,h1,h2,h3,h4,h5,p {font-family: "Raleway", sans-serif}
</style>
<body>
    <!-- ==========Preloader========== -->
    <div class="preloader">
        <div class="preloader-wrapper">
            <img src="assets/css/ajax-loader.gif" alt="ajax-loader">
        </div>
    </div>
    <!-- ==========Preloader========== -->

    <!-- ==========scrolltotop========== -->
    <a href="#0" class="scrollToTop" title="ScrollToTop">
        <img src="assets/images/rocket.png" alt="rocket">
    </a>
    <!-- ==========scrolltotop========== -->

    <!-- ==========header-section========== -->
    <header class="header-section">
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-9">
<h4>Welcome  <?php echo strtoupper($t_name)?>  </h4>





                    </div>
                    <div class="col-md-3">
                        <ul class="d-flex justify-content-end account">
                            <li>
                                <a href="logout.php">Logout</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="#0">
                            <img src="assets/images/logo/logo.png" alt="logo">
                        </a>
                    </div>
                    <ul class="menu ml-auto">
                        <li>
                            <a href="userhome.php">Home</a>

                        </li>

                        <li>
                            <a href="#0">Shop</a>
                            <ul class="submenu">
                                <li>
                                    <a href="viewequipment.php">Equipments</a>
                                </li>
                                <li>
                                    <a href="listsb.php">Snack Bar</a>

                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="#0">Trainers</a>
                            <ul class="submenu">
                                <li>
                                    <a href="listtrainers.php">Trainers</a>

                                </li>
                                <li>
                                    <a href="listSchedule.php">List Schedule</a>
                                </li>

                            </ul>
                        </li>



                        <li>
                            <a href="listpkgs.php">Package</a>

                        </li>



                        <ul>


                            <li>
                                <a href="#0">Feedbacks</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="feedback.php">New</a>
                                    </li>
                                    <li>
                                        <a href="listfeedbacks.php">My Feedbacks</a>
                                    </li>

                                </ul>
                        <li>
                            <a href="">Account</a>
                            <ul class="submenu">
                                <li>
                                    <a href="profile.php">Profile</a>
                                </li>
                                <li>
                                    <a href="logout.php">sign out</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <ul class="search-area">
												<li>
														<a class="search-bar" href="">
																<i class="flaticon-magnifying-glass"></i>
														</a>
												</li>

										</ul>
								</div>
						</div>
				</div>
		</header>
		<div class="search-form-area">
				<span class="hide-form">
						<i class="fas fa-times"></i>
				</span>
				<form class="search-form">
						<input type="text" placeholder="Search Here">
						<button type="submit"><i class="flaticon-search"></i></button>
				</form>
		</div>
