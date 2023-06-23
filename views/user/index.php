<?php
/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
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
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['babysitter/index']) ?>" aria-expanded="false">
                <span>
                  <i class="fas fa-child"></i>
                </span>
                <span class="hide-menu">Babysitters</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['services/index']) ?>" aria-expanded="false">
                <span>
                  <i class="fas fa-bell"></i>
                </span>
                <span class="hide-menu">Services</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= Yii::$app->urlManager->createUrl(['feedbacks/index']) ?>" aria-expanded="false">
                <span>
                   <i class="fas fa-comment"></i>
                </span>
                <span class="hide-menu">Feedbacks</span>
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
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <div class="mb-4">
                  <h5 class="card-title fw-semibold">Recent Registrations</h5>
                </div>
                <div class="card-body p-4" style="max-height: 550px;">
                  <ul class="timeline-widget mb-0 position-relative mb-n5">
                    <?php foreach ($recentRegistrations as $registration) : ?>
                      <li class="timeline-item d-flex position-relative overflow-hidden">
                        <div class="timeline-time text-dark flex-shrink-0 text-end">
                          <?php echo date('Y-m-d H:i', $registration['created_at']); ?>
                        </div>
                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                          <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                          <span class="timeline-badge-border d-block flex-shrink-0"></span>
                        </div>
                        <div class="timeline-desc fs-3 text-dark mt-n1">
                          <?php echo $registration['fullname']; ?> who is <?php echo $registration['role']; ?> is registered
                        </div>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">All System users</h5>
                  <?php
                  echo \yii\grid\GridView::widget([
                    'id' => 'my-gridview',
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel, // Add your search model here
                    'options' => [
                      'class' => 'table text-nowrap mb-0 align-middle table-height',
                    ],
                    'tableOptions' => [
                      'class' => 'table text-nowrap mb-0 align-middle',
                    ],
                    'headerRowOptions' => [
                      'class' => 'text-dark fs-4',
                    ],
                    'columns' => [
                      [
                        'class' => 'yii\grid\SerialColumn',
                        'header' => '<h6 class="fw-semibold mb-0">#</h6>',
                      ],
                      [
                        'attribute' => 'fullname',
                        'header' => '<h6 class="fw-semibold mb-0">Fullname</h6>',
                        'value' => function ($model) {
                          // Modify this to return the appropriate value for the 'date' attribute of your model
                          return $model->fullname. '<br><span>' . $model->role . '</span>';
                        },
                        'format' => 'raw',
                      ],
                      [
                        'attribute' => 'username',
                        'header' => '<h6 class="fw-semibold mb-0">Username</h6>',
                        'value' => function ($model) {
                          // Modify this to return the appropriate value for the 'babysitters' attribute of your model
                          return $model->username;
                        },
                        'format' => 'raw',
                      ],
                      [
                        'attribute' => 'email',
                        'header' => '<h6 class="fw-semibold mb-0">Email</h6>',
                        'value' => function ($model) {
                          // Modify this to return the appropriate value for the 'age_range' attribute of your model
                          return $model->email;
                        },
                        'format' => 'raw',
                      ],
                      [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {ban} {delete}',
                        'buttons' => [
                          'view' => function ($url, $model) {
                            return \yii\helpers\Html::a('<i class="fas fa-eye"></i>', ['view', 'id' => $model->id], ['class' => 'btn-icon']);
                          },
                          'delete' => function ($url, $model) {
                            return \yii\helpers\Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id], [
                              'class' => 'btn-icon',
                              'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                              ],
                            ]);
                          },
                          'ban' => function ($url, $model, $key) {
                            $iconClass = ($model->status === 10) ? 'fas fa-ban text-danger' : 'fas fa-ban text-success';
                            $confirmMessage = ($model->status === 10) ? 'Are you sure you want to ban this user account?' : 'Are you sure you want to perform this action?';

                            return Html::a('<i class="' . $iconClass . '"></i>', ['user/ban', 'id' => $model->id,'status' => $model->status], [
                              'class' => 'btn-icon',
                              'data' => [
                                'confirm' => $confirmMessage,
                                'method' => 'post',
                              ],
                            ]);
                          },
                        ],
                      ],
                    ],
                  ]);
                  ?>
                </div>
            </div>
          </div>
        </div>
      </div>

  <script src="Dash/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="Dash/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
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