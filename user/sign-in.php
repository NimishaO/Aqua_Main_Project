<?php
require_once("OOP/classes/FormAssist.class.php");
require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
require_once("OOP/classes/Authentication.class.php");
$fields=array("email"=>"","password"=>"");
$rules= array("email"=>array("required"=>""),"password"=>array("required"=>""));
$labels=array();
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
$auth =new Authentication();
if(isset($_POST["reg"]))
{
	if($validator->validate($_POST))
	{
		//process form
    if($auth->authenticate($_POST["email"],$_POST["password"]))
      {
        session_start();
        $type = $auth->utype;
        if($type=="admin")
          {
             $_SESSION["admin"]=$_POST["email"];

             header("location:admin/admin.html");
             $msg=$type;
          }
        //elseif($type=="user")
				else
          {
              $_SESSION["user"]=$_POST["email"];
              $data=$dao->getData("*","tbl_registration","email='".$_POST["email"]."'");
              $_SESSION["reg_id"]=$data[0]["reg_id"];
              $_SESSION["fname"]=$data[0]["fname"];
              header("location:userhome.php");
              $msg=$auth->error;
							var_dump($dao->getErrors());
          }
					}

      else
      {
        //$msg=$auth->error;
				$msg="failed";
				//var_dump($dao->getErrors());
      }


  }
  else
  {
        //$msg="Failed ,please try again";
        //var_dump($dao->getQuery());

$error=true;
  }
	  }

?>

<!DOCTYPE html>
<html lang="en">


<!-- sign-in.html  22 Nov 2019 04:18:18 GMT -->
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

        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="index.html">
                            <img src="assets/images/logo/logo.png" alt="logo">
                        </a>
                    </div>
                    <ul class="menu ml-auto">
                        <li>
                            <a href="#0">Home</a>

                        </li>
                        <li>
                            <a href="about.html">About</a>
                        </li>
                        <li>
                            <a href="#0">Courses</a>
                            <ul class="submenu">
                                <li>
                                    <a href="course.html">Course</a>
                                </li>
                                <li>
                                    <a href="course-details.html">Course Details</a>
                                </li>
                                <li>
                                    <a href="classes-schedule.html">Class Schedule</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#0">Shop</a>
                            <ul class="submenu">
                                <li>
                                    <a href="shop.html">Shop</a>
                                </li>
                                <li>
                                    <a href="offer.html">Offer</a>
                                </li>
                                <li>
                                    <a href="cart.html">Cart</a>
                                </li>
                                <li>
                                    <a href="checkout.html">Checkout</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#0">Pages</a>
                            <ul class="submenu">
                                <li>
                                    <a href="#0">Instructors</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="instructors.html">Instructors</a>
                                        </li>
                                        <li>
                                            <a href="instructor-profile.html">Instructors Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="gallery.html">Gallery</a>
                                </li>
                                <li>
                                    <a href="#0">Event</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="event.html">Event</a>
                                        </li>
                                        <li>
                                            <a href="event-details.html">Event Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="admission.html">admission</a>
                                </li>
                                <li>
                                    <a href="wish-list.html">our wish list</a>
                                </li>
                                <li>
                                    <a href="privacy.html">privacy</a>
                                </li>
                                <li>
                                    <a href="faq.html">faq</a>
                                </li>
                                <li>
                                    <a href="404.html">404</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#0">Blog</a>
                            <ul class="submenu">
                                <li>
                                    <a href="blog-grid.html">blog grid</a>
                                </li>
                                <li>
                                    <a href="blog-classic.html">blog classic</a>
                                </li>
                                <li>
                                    <a href="blog-details.html">blog details</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#0">Account</a>
                            <ul class="submenu">
                                <li>
                                    <a href="sign-in.php">sign in</a>
                                </li>
                                <li>
                                    <a href="sign-up.php">sign up</a>
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

                </div>
            </div>
        </div>
    </header>


    <!-- ==========header-section========== -->



    <!-- ==========privacy-section========== -->
    <section class="account-section padding-top padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="sign-in-form-area">
                        <h3 class="title">Welcome to AQUA ! Please login</h3>
                        <form action="#" class="signin-form" method="post" name="reg">
                            <div class="form-group">

                                <?php echo $form->textBox("email",array("placeholder"=>"Enter your Email","type"=>"email","name"=>"email"));?>
                                <?php echo $validator->error("email"); ?>
                            </div>
                            <div class="form-group">

                                <div class="pass-item">
                                  <?php echo $form->passwordBox("password",array("placeholder"=>"Enter your Password","name"=>"password"));?>
                                  <?php echo $validator->error("password"); ?>
                                    <span class="view-pass" id="view-pass-01">
                                        <i class="flaticon-eye"></i>
                                    </span>
                                </div>
                                <p class="mt-2 d-flex flex-wrap justify-content-between"><a href="sign-up.html">New Member? Register Here</a><a href="#0">Forgot Password?</a></p>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="sign in" name="reg">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="different-sign-in">
                        <h3 class="title">Or Sign In with </h3>
                        <ul>
                            <li>
                                <a class="facebook" href="#0"><i class="fab fa-facebook-f"></i> facebook</a>
                            </li>
                            <li>
                                <a class="twitter" href="#0"><i class="fab fa-twitter"></i> twitter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========privacy-section========== -->



    <!-- ==========footer-section========== -->
    <footer>
        <div class="footer-top padding-top padding-bottom theme-overlay bg_img"
            data-background="assets/images/footer.jpg">
            <div class="container">
                <div class="row mb-40-none">
                    <div class="col-md-4 col-sm-8">
                        <div class="footer-widget footer-about">
                            <div class="footer-logo">
                                <a href="index.html">
                                    <img src="assets/images/logo/footer-logo.png" alt="logo">
                                </a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, porta feugiat odio nam ut magnis tempor. Vitae quis nisl
                                viverra adipiscing in, integer penatibus elit luctus </p>
                            <ul>
                                <li>
                                    <a href="tel:80930458459">
                                        <!-- <i class="fas fa-phone"></i> -->
                                        <i class="flaticon-telephone-handle-silhouette"></i>
                                        9999 3333 8888
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="flaticon-maps-and-flags"></i>
                                        <!-- <i class="fas fa-map-marker-alt"></i>  -->
                                        Minnie Downs QLD 4478
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="footer-widget footer-schedule">
                            <h4 class="title">Opening Hours</h4>
                            <ul>
                                <li>
                                    <a href="#0">
                                        <span>Sat-Tues</span>
                                        <span>08:00am-01:00pm</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <span>Wed-Thurs</span>
                                        <span>12:00am-03:00pm</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <span>Friday</span>
                                        <span>07:00am-09:00pm</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <span>Sunday</span>
                                        <span>08:00am-01:00pm</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- ==========footer-section========== -->


    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/jquery.ripples-min.js"></script>
    <script src="assets/js/lightcase.js"></script>
    <script src="assets/js/swiper.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/countdown.min.js"></script>
    <script src="assets/js/odometer.min.js"></script>
    <script src="assets/js/viewport.jquery.js"></script>
    <script src="assets/js/nice-select.js"></script>
    <script src="assets/js/main.js"></script>
</body>


<!-- sign-in.html  22 Nov 2019 04:18:19 GMT -->
</html>
