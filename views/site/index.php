<?php
namespace app\controllers;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Feedbacks;
use yii\web\Controller;
use Yii;
$model = new Feedbacks();
$feedbacks = Feedbacks::find()->where(['status'=>1])->all();
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
                        <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['bookings/create', 'role' => 'Parent']) ?>">For parents</a>
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
            <div id="my_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="taital_main">
                                 <h4 class="banner_taital">Baby Care</h4>
                                 <p class="banner_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem I</p>
                                 <div class="read_bt"><a href="#">Read More</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div><img src="images/img-1.png" class="image_1"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="taital_main">
                                 <h4 class="banner_taital">Web Agency</h4>
                                 <p class="banner_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem I</p>
                                 <div class="read_bt"><a href="#">Read More</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div><img src="images/img-1.png" class="image_1"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="taital_main">
                                 <h4 class="banner_taital">Web Agency</h4>
                                 <p class="banner_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem I</p>
                                 <div class="read_bt"><a href="#">Read More</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div><img src="images/img-1.png" class="image_1"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
               <i class=""><img src="images/left-icon.png"></i>
               </a>
               <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
               <i class=""><img src="images/right-icon.png"></i>
               </a>
            </div>
         </div>
         <!--banner section end -->
      </div>
      <!--header section end -->
      <!--about section start -->
      <div class="about_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="image_2"><img src="images/img-2.png"></div>
               </div>
               <div class="col-md-6">
                  <h1 class="about_taital">About <span class="us_text">Us</span></h1>
                  <p class="about_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </p>
                  <div class="read_bt_1"><a href="#">Read More</a></div>
               </div>
            </div>
         </div>
      </div>
      <!--about section end -->
      <!--services section start -->
      <div class="services_section layout_padding">
      <div class="container">
         <h1 class="service_taital"><span class="our_text">Our</span> Services</h1>
         <p class="service_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered</p>
            <div class="services_section_2">
               <?php
               $services = \app\models\Services::find()->all(); // Assuming the Services model represents the services table

               $serviceChunks = array_chunk($services, 3); // Split the services into chunks of three for each row

               foreach ($serviceChunks as $serviceChunk) {
                  echo '<div class="row">';
                  foreach ($serviceChunk as $service) {
                     echo '<div class="col-sm-4">';
                     echo '<h4 class="design_text">' . $service->service . '</h4>';
                     
                     // Limit the number of words displayed in the description
                     $words = explode(' ', $service->description);
                     $limitedDescription = implode(' ', array_slice($words, 0, 10)); // Change 10 to the desired number of words
                     
                     echo '<p class="lorem_text">' . $limitedDescription . '</p>';
                     echo '<div class="read_bt_2"><a href="#" data-toggle="modal" data-target="#serviceModal' . $service->id . '">Read More</a></div>';
                     
                     // Modal for the full description
                     echo '<div class="modal fade" id="serviceModal' . $service->id . '" tabindex="-1" role="dialog" aria-labelledby="serviceModalLabel' . $service->id . '" aria-hidden="true">';
                     echo '<div class="modal-dialog modal-dialog-centered" role="document">';
                     echo '<div class="modal-content">';
                     echo '<div class="modal-header">';
                     echo '<h5 class="modal-title" style="color: black; font-weight: bold;" id="serviceModalLabel' . $service->id . '">' . $service->service . '</h5>';
                     echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                     echo '<span aria-hidden="true">&times;</span>';
                     echo '</button>';
                     echo '</div>';
                     echo '<div class="modal-body">';
                     echo '<p class="lorem_text" style="color: black; font-weight: bold;">' . $service->description . '</p>';
                     echo '</div>';
                     echo '</div>';
                     echo '</div>';
                     echo '</div>';
                     echo '</div>';
                  }
                  echo '</div>';
               }
               ?>
            </div>
      </div>

      </div>
      </div>
      <!--services section end -->
      <!--blog section start -->
      <div class="blog_section layout_padding">
         <div class="container">
            <h1 class="blog_taital"><span class="our_text">Our</span> Blog</h1>
            <p class="blog_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered </p>
            <div class="services_section_2 layout_padding">
               <div class="row">
                  <div class="col-md-4">
                     <div class="box_main">
                        <div class="student_bg"><img src="images/img-3.png" class="student_bg"></div>
                        <div class="image_15">19<br>Feb</div>
                        <h4 class="hannery_text">There are many variations</h4>
                        <p class="fact_text">dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="box_main">
                        <div class="student_bg"><img src="images/img-4.png" class="student_bg"></div>
                        <div class="image_15">19<br>Feb</div>
                        <h4 class="hannery_text">There are many variations</h4>
                        <p class="fact_text">dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="box_main">
                        <div><img src="images/img-5.png" class="student_bg"></div>
                        <div class="image_15">19<br>Feb</div>
                        <h4 class="hannery_text">There are many variations</h4>
                        <p class="fact_text">dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--blog section end -->
      <!--newsletter section start -->
      <div class="newsletter_section">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <h1 class="newsletter_text">Send us your Feedback </h1>
                  <p class="tempor_text">dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </p>
               </div>
               <div class="col-md-6">
                  <?php $form = ActiveForm::begin(['action' => ['feedbacks/create']]); ?>
                  <div class="mail_bt_main">
                     <?= $form->field($model, 'names')->label(false)->textInput(['type' =>'text', 'class' =>'mail_text mt-3','placeholder' => 'Enter your name','maxlength' => true]) ?>
                     <?= $form->field($model, 'email')->label(false)->textInput(['type' =>'text', 'class' =>'mail_text mt-3','placeholder' => 'Enter your E-mail','maxlength' => true]) ?>
                     <?= $form->field($model, 'message')->label(false)->textarea(['type' => 'text','class' =>'mail_text mt-3','rows' => 5, 'cols' => 5,'placeholder' => 'Write down your feedback']) ?>
                  </div>
                  <?= Html::submitButton('Send', ['class' => 'subscribe_bt mt-3']) ?>
                  <?php ActiveForm::end(); ?>
               </div>
            </div>
         </div>
      </div>
      <!--newsletter section end -->
      <!--client section start -->
      <div class="client_section layout_padding">
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <?php $active = true; ?>
               <?php foreach (array_chunk($feedbacks, 2) as $chunk) : ?>
                  <div class="carousel-item <?= $active ? 'active' : '' ?>">
                        <div class="container">
                           <h1 class="blog_taital"><span class="tes_text">Tes</span>timonial</h1>
                           <div class="client_section_2 layout_padding">
                              <div class="row">
                                    <?php foreach ($chunk as $feedback) : ?>
                                       <div class="col-md-6">
                                          <div class="client_box <?= $active ? 'active' : '' ?>">
                                                <div class="right_main">
                                                   <h6 class="magna_text <?= $active ? 'active' : '' ?>"><?php echo $feedback->names; ?></h6>
                                                   <div class="quote_icon <?= $active ? 'active' : '' ?>"></div>
                                                </div>
                                                <p class="ipsum_text <?= $active ? 'active' : '' ?>"><?php echo $feedback->message; ?></p>
                                          </div>
                                       </div>
                                    <?php endforeach; ?>
                              </div>
                           </div>
                        </div>
                  </div>
                  <?php $active = false; ?>
               <?php endforeach; ?>
            </div>
         </div>
      </div>
      <!--client section end -->
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
   </body>
</html>