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
                  <i class="mdi mdi-home"></i>
                </span>Obunachilar
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-danger align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <?
            $code = query("SELECT * FROM users ORDER BY id DESC");
            $customers = $code->fetch_all(MYSQLI_ASSOC);
            ?>
                <!--Bot Users-->
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">DB users data</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th> Id</th>
                                    <th> Firt name</th>
                                    <th> Chat ID</th>
                                    <th> Lang</th>
                                    </tr>
                                </thead>
                    <? foreach ($customers as $customer) :
                    ?>
                    <tbody>
                        <tr>
                            <td>
                               <? echo $customer["id"]; ?>
                            </td>
                            <td>
                                <? echo $customer["first_name"]; ?>
                            </td>
                            <td>
                                <? echo $customer["chat_id"]; ?>
                            </td>
                            <td>
                                <? echo $customer["lang"]; ?>
                            </td>
                        </tr>
                    </tbody>
                    <?
                    endforeach;
                    ?>
                    </table>
                </div>
                </div>
            </div>
            </div>
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
