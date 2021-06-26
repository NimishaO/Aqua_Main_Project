<?php
require_once("header.php");


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class="<?php
require_once("header.php");


?>
<div class="main_bg" style="min-height: 500px;">
<div class="wrap">
<div class=" <?php
require_once("OOP/classes/DataAccess.class.php");
$dao=new DataAccess();

?>
<?php

    if($cats = $dao->getData("*","tbl_trainer","status!='R'"))
    {
        // var_dump($students);
        ?><!-- ==========instructors-section========== -->
<section class="instructors-section padding-top padding-bottom">
    <div class="container">
        <div class="row mb-30-none justify-content-center">
            <div class="col-md-6 col-lg-4 col-sm-10">
                <div class="instructor-item instructor-item-two">
                    <div class="c-thumb">
                        <a href="instructor-profile.html">
                            <img src="assets/images/instructor/instructor04.jpg" alt="instructor">
                        </a>
                    </div>
                    <div class="instructor-content">
                        <h4 class="sub-title">
                            <a href="instructor-profile.html"><?php echo $cat["t_fname"]; ?></a>
                        </h4>
                        <span class="d-block"><?php echo $cat["t_lname"]; ?></span>
                          <span class="d-block"><?php echo $cat["t_phone"]; ?></span>
                            <span class="d-block"><?php echo $cat["email"]; ?></span>
                        <ul class="social">
                            <li>
                                <a href="#0">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-10">
                <div class="instructor-item instructor-item-two">
                    <div class="c-thumb">
                        <a href="instructor-profile.html">
                            <img src="assets/images/instructor/instructor02.jpg" alt="instructor">
                        </a>
                    </div>
                    <div class="instructor-content">
                        <h4 class="sub-title">
                            <a href="instructor-profile.html">Ridoy Rajoan</a>
                        </h4>
                        <span class="d-block">Race Guide</span>
                        <ul class="social">
                            <li>
                                <a href="#0">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-10">
                <div class="instructor-item instructor-item-two">
                    <div class="c-thumb">
                        <a href="#0">
                            <img src="assets/images/instructor/instructor01.jpg" alt="instructor">
                        </a>
                    </div>
                    <div class="instructor-content">
                        <h4 class="sub-title">
                            <a href="#0">Panna Rahman</a>
                        </h4>
                        <span class="d-block">Senior Instructor</span>
                        <ul class="social">
                            <li>
                                <a href="#0">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-10">
                <div class="instructor-item instructor-item-two">
                    <div class="c-thumb">
                        <a href="instructor-profile.html">
                            <img src="assets/images/instructor/instructor03.jpg" alt="instructor">
                        </a>
                    </div>
                    <div class="instructor-content">
                        <h4 class="sub-title">
                            <a href="instructor-profile.html">Somrat Islam</a>
                        </h4>
                        <span class="d-block">Junior Instructor</span>
                        <ul class="social">
                            <li>
                                <a href="#0">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-10">
                <div class="instructor-item instructor-item-two">
                    <div class="c-thumb">
                        <a href="instructor-profile.html">
                            <img src="assets/images/instructor/instructor05.jpg" alt="instructor">
                        </a>
                    </div>
                    <div class="instructor-content">
                        <h4 class="sub-title">
                            <a href="instructor-profile.html">faisal kabir</a>
                        </h4>
                        <span class="d-block">Race Guide</span>
                        <ul class="social">
                            <li>
                                <a href="#0">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-10">
                <div class="instructor-item instructor-item-two">
                    <div class="c-thumb">
                        <a href="instructor-profile.html">
                            <img src="assets/images/instructor/instructor06.jpg" alt="instructor">
                        </a>
                    </div>
                    <div class="instructor-content">
                        <h4 class="sub-title">
                            <a href="instructor-profile.html">ripon khan</a>
                        </h4>
                        <span class="d-block">Senior Instructor</span>
                        <ul class="social">
                            <li>
                                <a href="#0">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-10">
                <div class="instructor-item instructor-item-two">
                    <div class="c-thumb">
                        <a href="instructor-profile.html">
                            <img src="assets/images/instructor/instructor09.jpg" alt="instructor">
                        </a>
                    </div>
                    <div class="instructor-content">
                        <h4 class="sub-title">
                            <a href="instructor-profile.html">mridul islam</a>
                        </h4>
                        <span class="d-block">Panna Rahman</span>
                        <ul class="social">
                            <li>
                                <a href="#0">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-10">
                <div class="instructor-item instructor-item-two">
                    <div class="c-thumb">
                        <a href="instructor-profile.html">
                            <img src="assets/images/instructor/instructor07.jpg" alt="instructor">
                        </a>
                    </div>
                    <div class="instructor-content">
                        <h4 class="sub-title">
                            <a href="instructor-profile.html">hera rahman</a>
                        </h4>
                        <span class="d-block">Race Guide</span>
                        <ul class="social">
                            <li>
                                <a href="#0">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-10">
                <div class="instructor-item instructor-item-two">
                    <div class="c-thumb">
                        <a href="instructor-profile.html">
                            <img src="assets/images/instructor/instructor08.jpg" alt="instructor">
                        </a>
                    </div>
                    <div class="instructor-content">
                        <h4 class="sub-title">
                            <a href="instructor-profile.html">bela Bose</a>
                        </h4>
                        <span class="d-block">Senior Instructor</span>
                        <ul class="social">
                            <li>
                                <a href="#0">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========instructors-section========== -->">

<?php
}
else
{
echo "<h3>No categoriid found :: </h3>";
}


?>
">
</div>
</div>
</div>
<?php require_once("footer.php"); ?>
