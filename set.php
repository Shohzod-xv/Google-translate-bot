<?php 
include "main/db.php";
?>
<!DOCTYPE html>
<html lang="en">
  <?php
      include "main/head.php";
      ?>
  <body>
    <div class="container-scroller">
      <?php 
      include "main/navbar.php";
      ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!--sidebar -->
        <?php
          include "main/sidebar.php";
        ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-dark text-danger mr-2">
                  <i class="mdi mdi-settings"></i>
                </span> Settings
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
  <body>

    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->

      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <!-- partial -->
        <div class="main-panel ">
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card ">
                  <div class="card-body">
                    <h4 class="card-title">API:</h4>
                    <h4 class="card-title text-danger text-center">
                    <?
                    save_api();
                    ?>
                    </h4>
                    <form class="forms-sample" action="set.php" method="POST">
                    <div class="form-group">
                        <input 
                        type="text"
                        name="api_key"
                        value="<?=get_settings_data('API')['value']?>"
                        class="form-control" 
                        id="exampleInputName1">
                    </div>
                    <button 
                      type="submit" 
                      name="submit_api"
                      class="btn btn-success mr-2">Yangilash
                    </button>
                      </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>


<div>
</div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"> Copyright by Xayrullayev Shahzodbek</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="https://t.me/uz_ru_tarjimonbot">Translate bot</a> uchun Admin Panel</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
