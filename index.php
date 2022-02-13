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
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-danger align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
                <!--Bot Users-->
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3 ">Users <i class="mdi mdi-account-box mdi-24px float-right"></i>
                    </h4>
                     <h2 class="mb-5"><?=get_t_user_data() ?></h2> 
                     <h6 class="font-weight-normal mb-3">tarjimon bot umumiy foydalanuvchilar soni
                    </h6>
                  </div>
                </div>
              </div>
            </div>

            <!-- shdujhsfujnfvhijv -->
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                      
                    <h4 class="card-title text-dark">foydalanuvchilarga xabar yuborish 
                    </h4>
                    <h5 class="font-weight-normal mb-1 text-danger">Message:</h5>
					  <h4 class="card-title text-danger text-center"><?send_message();?></h4>

                    <form class="forms-sample" method="post" action="index.php">
                      <div class="form-group">
                        <textarea class="form-control" rows="10" name="message"></textarea>
                      </div>
                      <button 
                      type="submit" 
                      name="submit_message"
                      class="btn btn-success mr-2">Send
                    </button>
                    </form>
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
    <script>
window.replainSettings = { id: '96827d4a-84e0-4d4a-8741-54b1bc91abdb' };
(function(u){var s=document.createElement('script');s.async=true;s.src=u;
var x=document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);
})('https://widget.replain.cc/dist/client.js');
</script>
    <!-- End custom js for this page -->
  </body>
</html>
