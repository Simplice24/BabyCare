<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Baby care</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- owl carousel style -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!--header section start -->
      <div class="header_section">
         <div class="container">
         <nav class="navbar navbar-dark bg-dark">
            <a class="logo" href="index.html"><img src="images/favicon.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample01">
               <ul class="navbar-nav mr-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['user/create', 'role' => 'Parent']) ?>">For parents</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['user/create', 'role' => 'Babysitter']) ?>">For babysitters</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                     </li>
                     <!-- <li class="nav-item">
                        <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['user/create'])?>">Register</a>
                     </li> -->
                     <li class="nav-item">
                        <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['site/login']) ?>">Login</a>
                     </li>
               </ul>
            </div>
         </nav>
         </div>
         <!--banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
                <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills justify-content-center nav-fill">
                    <li class="nav-item">
                        <a class="nav-link" id="book-link" href="#">Book a babysitter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="register-link" href="#">Register</a>
                    </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div id="booking-form">
                    <!-- Booking form content here -->
                    <?php if (Yii::$app->session->hasFlash('success')): ?>
                        <div class="alert alert-success">
                            <?= Yii::$app->session->getFlash('success') ?>
                        </div>
                    <?php endif; ?>
                    <?php $form = ActiveForm::begin(); ?>
                        <div class="col-12 grid-margin">
                                <div class="card-body">
                                <form class="form-sample">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Age range</label>
                                            <div class="col-sm-6">
                                                <?= $form->field($model, 'babysitter_age_range')->label(false)->textInput(['class' => 'form-control', 'aria-describedby' => 'textHelp']) ?>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Languages spoken</label>
                                            <div class="col-sm-6">
                                                <?= $form->field($model, 'languages_spoken')->label(false)->textInput(['class' => 'form-control', 'aria-describedby' => 'textHelp']) ?>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Number of babysitters</label>
                                            <div class="col-sm-6">
                                                <?= $form->field($model, 'number_of_babysitters')->label(false)->textInput(['class' => 'form-control', 'aria-describedby' => 'textHelp']) ?>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Email</label>
                                            <div class="col-sm-6">
                                                <?= $form->field($model, 'email')->label(false)->label(false)->textInput(['type' => 'email','class' => 'form-control', 'aria-describedby' => 'textHelp']) ?>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Gender</label>
                                            <div class="col-sm-6">
                                                <?= $form->field($model, 'gender')->label(false)->dropDownList(['' => '--Select gender--', 'Male' => 'Male', 'Female' => 'Female'], ['class' => 'form-control','aria-describedby' => 'textHelp']) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">Starting time</label>
                                        <div class="col-sm-6">
                                            <?= $form->field($model, 'starting_time')->label(false)->textInput(['type' => 'time', 'class' => 'form-control','aria-describedby' => 'textHelp']) ?>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">Date</label>
                                        <div class="col-sm-6">
                                            <?= $form->field($model, 'date')->label(false)->textInput(['type' => 'date', 'class' => 'form-control','aria-describedby' => 'textHelp']) ?>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">Ending time</label>
                                        <div class="col-sm-6">
                                            <?= $form->field($model, 'ending_time')->label(false)->textInput(['type' => 'time', 'class' => 'form-control','aria-describedby' => 'textHelp']) ?>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">Address</label>
                                        <div class="col-sm-6">
                                            <?= $form->field($model, 'address')->label(false)->textInput(['class' => 'form-control', 'aria-describedby' => 'textHelp']) ?>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">Phone</label>
                                        <div class="col-sm-6">
                                            <?= $form->field($model, 'phone_number')->label(false)->textInput(['class' => 'form-control', 'aria-describedby' => 'textHelp']) ?>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-10 py-8 fs-4 mb-4 rounded-2">
                                        <?= Html::encode('Place your request') ?>
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                    </div>
                    <div id="registration-form" style="display: none;">
                    <!-- Registration form content here -->
                    <h3>Registration Form</h3>
                    <form>
                        <!-- Your registration form fields go here -->
                    </form>
                    </div>
                </div>
                </div>
            </div>
         </div>
         <!--banner section end -->
      </div>
      <!--footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="address_main">
               <div class="address_text"><a href="#"><img src="images/map-icon.png"><span class="padding_left_15">Loram Ipusm hosting web</span></a></div>
               <div class="address_text"><a href="#"><img src="images/call-icon.png"><span class="padding_left_15">+7586656566</span></a></div>
               <div class="address_text"><a href="#"><img src="images/mail-icon.png"><span class="padding_left_15">demo@gmail.com</span></a></div>
            </div>
            <div class="footer_section_2">
               <div class="row">
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="link_text">Useful link</h4>
                     <div class="footer_menu">
                        <ul>
                           <li><a href="index.html">Home</a></li>
                           <li><a href="about.html">About</a></li>
                           <li><a href="services.html">Services</a></li>
                           <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="link_text">web design</h4>
                     <p class="footer_text">Lorem ipsum dolor sit amet, consectetur adipiscinaliquaL oreadipiscing </p>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="link_text">social media</h4>
                     <div class="social_icon">
                        <ul>
                           <li><a href="#"><img src="images/fb-icon.png"></a></li>
                           <li><a href="#"><img src="images/twitter-icon.png"></a></li>
                           <li><a href="#"><img src="images/linkedin-icon.png"></a></li>
                           <li><a href="#"><img src="images/youtub-icon.png"></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="link_text">Our Branchs</h4>
                     <p class="footer_text_1">Lorem ipsum dolor sit amet, consectetur adipiscinaliquaLoreadipiscing </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--client section end -->
      <!--copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">Copyright 2023 All Right Reserved By <a href="https://html.design">Free Html Templates</a> Distributed by: <a href="https://themewagon.com">ThemeWagon</a></p>
         </div>
      </div>
      <!--copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> 
      <script type="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2//2.0.0-beta.2.4/owl.carousel.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="../../assets/js/vendor/popper.min.js"></script>
      <script src="../../dist/js/bootstrap.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Handle click events on the navbar links
        document.getElementById('book-link').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('booking-form').style.display = 'block';
        document.getElementById('registration-form').style.display = 'none';
        });

        document.getElementById('register-link').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('booking-form').style.display = 'none';
        document.getElementById('registration-form').style.display = 'block';
        });
    </script>
   </body>
</html>