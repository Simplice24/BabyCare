<?php
/** @var yii\web\View $this */
use yii\helpers\Html;
use app\models\Services;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Baby Care</title>
  <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...your-integrity-hash...==" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/styles.min.css" />
  <link rel="stylesheet" href="Dash/assets/css/styles.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <?php if (\Yii::$app->user->can('Babysitter') || \Yii::$app->user->can('Admin') || \Yii::$app->user->can('Parent')) { ?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['dashboard/index']) ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Home</span>
              </a>
            </li>
            <?php } ?>
            <?php if(\Yii::$app->user->can('Admin')) {?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['user/index']) ?>" aria-expanded="false">
                <span>
                  <i class="fas fa-users"></i>
                </span>
                <span class="hide-menu">User management</span>
              </a>
            </li>
            <?php } ?>
            <?php if (\Yii::$app->user->can('Babysitter') || \Yii::$app->user->can('Admin')) { ?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['bookings/index']) ?>" aria-expanded="false">
                <span>
                  <i class="fas fa-book"></i>
                </span>
                <span class="hide-menu">Bookings</span>
              </a>
            </li>
            <?php } ?>
            <?php if(\Yii::$app->user->can('Babysitter')) {?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['assignment/index']) ?>" aria-expanded="false">
                <span>
                  <i class="fas fa-book"></i>
                </span>
                <span class="hide-menu">Assignments</span>
              </a>
            </li>
            <?php } ?>
            <?php if(\Yii::$app->user->can('Admin')) {?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['babysitter/index'])  ?>" aria-expanded="false">
                <span>
                  <i class="fas fa-child"></i>
                </span>
                <span class="hide-menu">Babysitters</span>
              </a>
            </li>
            <?php } ?>
            <?php if(\Yii::$app->user->can('Admin')) {?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['services/index']) ?>" aria-expanded="false">
                <span>
                  <i class="fa fa-assistive-listening-systems"></i>
                </span>
                <span class="hide-menu">Services</span>
              </a>
            </li>
            <?php } ?>
            <?php if(\Yii::$app->user->can('Admin')) {?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['feedbacks/index'])  ?>" aria-expanded="false">
                <span>
                   <i class="fas fa-comment"></i>
                </span>
                <span class="hide-menu">Feedbacks</span>
              </a>
            </li>
            <?php } ?>
            <?php if(\Yii::$app->user->can('Babysitter')) {?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['availability/index'])  ?>" aria-expanded="false">
                <span>
                   <i class="fas fa-calendar-alt"></i>
                </span>
                <span class="hide-menu">Availability Calendar</span>
              </a>
            </li>
            <?php } ?>
            <?php if(\Yii::$app->user->can('Admin')) {?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['auth-item/index']) ?>" aria-expanded="false">
                <span>
                  <i class="fas fa-lock"></i>
                </span>
                <span class="hide-menu">Role | Permissions</span>
              </a>
            </li>
            <?php } ?>
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
                    <a href="<?= Yii::$app->urlManager->createUrl(['user/profile']) ?>" class="d-flex align-items-center gap-2 dropdown-item">
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
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <?php if (isset($successMessage)): ?>
                <div class="alert alert-success">
                    <?= $successMessage ?>
                </div>
            <?php endif; ?>

            <?php if (isset($errorMessage)): ?>
                <div class="alert alert-danger">
                    <?= $errorMessage ?>
                </div>
            <?php endif; ?>
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">User profile</h5>
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-md-3 text-center">
                      <div class="position-relative">
                        <img src="<?= Yii::getAlias('@web/' . $userProfileImage) ?>" alt="Profile Image" class="rounded-circle profile-image">
                        <label for="profile-image-input" class="btn btn-primary btn-sm position-absolute bottom-0 end-0 translate-middle">
                          <i class="ti ti-plus"></i>
                          <input type="file" id="profile-image-input" class="visually-hidden">
                        </label>
                      </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row align-items-center">
                        <div class="col-md-6">
                            Full name<h5 class="card-title d-flex align-items-center">
                            <?php echo $fullname; ?>
                            <!-- <button type="button" class="btn btn-primary btn-sm ms-2"><i class="ti ti-pencil me-1"></i>Edit</button> -->
                            </h5>
                            Username<h5 class="card-title d-flex align-items-center">
                            <?php echo $username; ?>
                            <button type="button" id="username_update" class="btn btn-primary btn-sm ms-2"><i class="ti ti-pencil me-1"></i>Edit</button>
                            </h5>
                        </div>
                        </div>
                        <div class="row mt-3">
                        <div class="col-md-6">
                            <button type="button" id="password_update" class="btn btn-outline-primary btn-sm">Change Password</button>
                            <?php 
                            if($userRole == "Babysitter"){
                            ?>
                            <button type="button" id="bio_update" class="btn btn-outline-primary btn-sm ml-md-2">Update Bio</button>
                            <?php
                            }
                            ?>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
              </div>
              <div id="username_form" style="display: none;">
              <h5 class="card-title fw-semibold mb-4">Username</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post" action="<?= Yii::$app->urlManager->createUrl(['profile/username']) ?>">
                    <?php
                            $csrf = Yii::$app->request->csrfToken;
                            echo "<input type='hidden' name='_csrf' value='$csrf'>";
                    ?>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Username</label>
                      <input type="text" name="new_username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $username ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </form>
                </div>
              </div>
              </div>
              <div id="password_form" style="display: none;">
              <h5 class="card-title fw-semibold mb-4">Change password</h5>
              <div class="card ">
                <div class="card-body">
                  <form method="post" action="<?= Yii::$app->urlManager->createUrl(['profile/password']) ?>">
                      <?php
                              $csrf = Yii::$app->request->csrfToken;
                              echo "<input type='hidden' name='_csrf' value='$csrf'>";
                      ?>
                      <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Current password</label>
                        <input type="password" name="current_password" id="disabledTextInput" class="form-control" placeholder="Current password">
                      </div>
                      <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">New password</label>
                        <input type="password" name="new_password" id="disabledTextInput" class="form-control" placeholder="Create new password">
                      </div>
                      <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Confirm new password</label>
                        <input type="password" name="confirm_password" id="disabledTextInput" class="form-control" placeholder="Confirm your password">
                      </div>
                      <button type="submit" class="btn btn-primary">Change</button>
                  </form>
                </div>
              </div>
              </div>
              <?php 
              if($userRole == "Babysitter")
              {
              ?>
              <div id="bio_form" style="display: none;">
              <h5 class="card-title fw-semibold mb-4">Babysitter's information</h5>
              <div class="card mb-0">
                <div class="card-body">
                <form method="post" action="<?= Yii::$app->urlManager->createUrl(['profile/bio']) ?>">
                  <?php
                      $csrf = Yii::$app->request->csrfToken;
                      echo "<input type='hidden' name='_csrf' value='$csrf'>";
                  ?>
                  <div class="mb-3">
                    <label class="form-label">Languages</label><br>
                    <div id="languages" class="checkbox-container">
                    <?php
                    foreach ($languages as $language) {
                        $languageId = $language['id'];
                        $languageName = $language['language'];
                        $isChecked = in_array($languageId, $languageIds) ? 'checked' : '';
                    ?>
                        <div class="checkbox-option">
                            <input type="checkbox" id="language<?php echo $languageId; ?>" name="languages[]" value="<?php echo $languageId; ?>" <?php echo $isChecked; ?>>
                            <label for="language<?php echo $languageId; ?>"><?php echo $languageName; ?></label>
                        </div>
                    <?php
                    }
                    ?>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Date of birth</label>
                    <input type="date" id="disabledTextInput" class="form-control" name="birthdate" value="<?php echo $birthdate; ?>">
                  </div>
                  <button type="submit" class="btn btn-primary">Save</button>
                </form>
                </div>
              </div>
              </div>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  <script src="Dash/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="Dash/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="Dash/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
  document.getElementById("username_update").addEventListener("click", function() {
    document.getElementById("username_form").style.display = "block";
  });
  document.getElementById("password_update").addEventListener("click", function() {
    document.getElementById("password_form").style.display = "block";
  });
  document.getElementById("bio_update").addEventListener("click", function() {
    document.getElementById("bio_form").style.display = "block";
  });
</script>
</body>
</html>