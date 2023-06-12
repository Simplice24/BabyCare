
<?php
/** @var yii\web\View $this */
use yii\helpers\Html;
use app\models\Availability;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Baby Care</title>
  <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="Calendar/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...your-integrity-hash...==" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/styles.min.css" />
  <link rel="stylesheet" href="Dash/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .username {
        margin-top: 15px; /* Adjust the value as per your requirements */
    }
    .dropdown {
    position: relative;
    display: inline-block;
    }

    .dropbtn {
    background-color: transparent;
    color: gray;
    padding: 8px 12px;
    font-size: 14px;
    border: none;
    cursor: pointer;
    }

    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #ffffff;
    width: 200px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 4px;
    padding: 8px;
    z-index: 1;
    }

    .dropdown-content a {
    color: gray;
    display: block;
    padding: 6px 0;
    text-decoration: none;
    }

    .dropdown-content a:hover {
    background-color: rgba(135, 206, 250, 0.1);;
    width: 100%;
    }

    .dropdown:hover .dropdown-content {
    display: block;
    }

    .dropdown:hover .dropbtn {
    background-color: transparent;
    }
    .table-height {
    height: 100%;
    }
    table.inputs td {
    padding: 5px;
    }
  </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="<?= Yii::$app->urlManager->createUrl(['dashboard/index']) ?>" class="text-nowrap logo-img">
            <img src="images/favicon.png" width="30" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['dashboard/index']) ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Home</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['user/index']) ?>" aria-expanded="false">
                <span>
                  <i class="fas fa-users"></i>
                </span>
                <span class="hide-menu">User management</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['bookings/index']) ?>" aria-expanded="false">
                <span>
                  <i class="fas fa-book"></i>
                </span>
                <span class="hide-menu">Bookings</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['babysitters/index']) ?>" aria-expanded="false">
                <span>
                  <i class="fas fa-child"></i>
                </span>
                <span class="hide-menu">Babysitters</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['notifications/index']) ?>" aria-expanded="false">
                <span>
                  <i class="fas fa-bell"></i>
                </span>
                <span class="hide-menu">Notifications</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['reviews/index']) ?>" aria-expanded="false">
                <span>
                   <i class="fas fa-comments"></i>
                </span>
                <span class="hide-menu">Reviews</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['cancellations/index']) ?>" aria-expanded="false">
                <span>
                  <i class="fas fa-undo"></i>
                </span>
                <span class="hide-menu">Cancellation/Refund</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['feedback/index']) ?>" aria-expanded="false">
                <span>
                   <i class="fas fa-comment"></i>
                </span>
                <span class="hide-menu">Feedback/Support</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['availability/index']) ?>" aria-expanded="false">
                <span>
                   <i class="fas fa-calendar-alt"></i>
                </span>
                <span class="hide-menu">Availability Calendar</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['favorites/index']) ?>" aria-expanded="false">
                <span>
                  <i class="fas fa-heart"></i>
                </span>
                <span class="hide-menu">Favorites</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['auth-item/index']) ?>" aria-expanded="false">
                <span>
                  <i class="fas fa-lock"></i>
                </span>
                <span class="hide-menu">Role | Permissions</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            <div class="dropdown">
                <button class="dropbtn">Languages</button>
                <div class="dropdown-content">
                <a href="#">English</a>
                <a href="#">French</a>
                </div>
            </div>  
              <?php if (!Yii::$app->user->isGuest): ?>
                <p class="username"><?= Yii::$app->user->identity->username ?></p>
              <?php endif; ?>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="<?= Yii::getAlias('@web/' . $userProfileImage) ?>" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <?= Html::a('Logout', ['site/logout'], ['class' => 'btn btn-outline-primary mx-3 mt-2 d-block', 'data' => ['method' => 'post']]) ?>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>

<div class="availability-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'starting_time')->textInput() ?>

    <?= $form->field($model, 'ending_time')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



<script src="Dash/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="Dash/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="Calendar/script.js"></script>
</body>
<script>
// Optional: Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.style.display === 'block') {
        openDropdown.style.display = 'none';
      }
    }
  }
};
</script>
</html>

