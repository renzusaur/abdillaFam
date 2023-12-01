<?php
session_start();
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
check_login();
$aid = $_SESSION['u_id'];
?>

<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="LOGO.jpg" type="image/x-icon">
<title>Dashboard</title>
<!--Head-->
<?php include('vendor/inc/head.php'); ?>
<!--End Head-->

<body id="page-top">
    <!--Navbar-->
    <?php include('vendor/inc/nav.php'); ?>
    <!--End Navbar-->

    <div id="wrapper">
        <!-- Sidebar -->
        <?php include('vendor/inc/sidebar.php'); ?>
        <!--End Sidebar-->

        <div id="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="user-dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

                <!-- Terms and Conditions Modal -->
                <?php
                // Check if the user has already agreed to the terms using a cookie
                $termsAgreed = isset($_COOKIE['terms_agreed']) && $_COOKIE['terms_agreed'] == 'yes';

                if (!$termsAgreed) {
                ?>

        <!-- Terms and Conditions Modal -->
      <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong style="font-weight: bold; text-align: justify;">Guests are obliged to observe the provisions of these House Rules. If a guest is in breach of these rules, the resort has the right to repudiate the agreement on the provision of accommodation services before the agreed period has elapsed.</strong></p>

<p style="text-align: justify;">
    This section outlines the rules that must be followed at all times on the ABADILLA FAMILY RESORT property. Should guests violate any of the following rules, management has the right to evict guests from the property with no refund:
</p>

<ol style="text-align: justify;">
    <li><strong>The use and/or possession of illegal drugs and drug paraphernalia is strictly prohibited inside the property.</strong></li>
    <li><strong>Guests are required to conduct themselves reasonably at all times. Should the guests become unruly, disrespectful, or verbally abusive, management has the right to evict them from the property with no refund.</strong></li>
    <li><strong>Guests shall be held responsible for the proper use of the facilities including furniture, appliances, and equipment.</strong></li>
    <li><strong>Management reserves the right to hold the guests liable for any damages and/or loss of property. Damages and breakages must be reported to the caretaker. Guests must settle their liabilities before leaving the resort's premises.</strong></li>
    <li><strong>Please observe cleanliness. Management will charge a cleaning fee of half their payment or more for excessive dirt or other mess requiring excessive cleaning.</strong></li>
    <li><strong>Pool Rules: NO diving. NO running. NO Pushing. NO rough play. Shower before entering the pool. Use Restrooms.</strong></li>
    <li><strong>Children (14 and under) must be accompanied by an adult while swimming at all times. Do not use the pool while intoxicated (drunk).</strong></li>
    <li><strong>Use of videoke or other sound amplifying equipment is prohibited after 10:00 PM. This is by the mandatory law set by the local government.</strong></li>
</ol>

<p style="text-align: justify;"><strong>REFUNDS AND CANCELLATIONS</strong></p>

<ol style="text-align: justify;">
    <li><strong>The down payment is non-refundable. However, the deposit may be used to rebook to a future date if the guests fail to show up on the reserved date due to unforeseen events (e.g. typhoons, floods, sudden change of quarantine status/guidelines).</strong></li>
    <li><strong>Rebooking and/or change of date is only allowed when done at least 14 days before the check-in date.</strong></li>
    <li><strong>For rebookings due to health-related reasons, the guest will be required to provide proof (i.e. doctor's note, medical certificate). The proof must be dated after the reservation was made. As soon as you have the proof, kindly contact us immediately. You can choose to redact sensitive information (except for name and date) before sending the proof. Rest assured that we will treat your disclosure with utmost privacy.</strong></li>
    <li><strong>Management shall not be held liable for accidents, injuries or any untoward incident that may occur while inside the resort premises.</strong></li>
</ol>

<p style="text-align: justify;">This is where you put your terms and conditions content.</p>
<p style="text-align: justify;">By proceeding, you agree to abide by the terms and conditions.</p>

             </div>
             
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="acceptTermsBtn">I Agree</button>
            </div>
        </div>
    </div>
</div>


        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <script>
                        // Add a script to show the terms modal on page load
                        $(document).ready(function() {
                            $('#termsModal').modal('show');

                            // Close the modal and set a cookie when "I Agree" is clicked
                            $('#acceptTermsBtn').on('click', function() {
                                $('#termsModal').modal('hide');
                                // Set a cookie to remember that the user has agreed to the terms
                                document.cookie = 'terms_agreed=yes; path=/';
                            });
                        });
                    </script>
                <?php
                }
                ?>


        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user"></i>
                </div>
                <div class="mr-5">My Profile</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="user-view-profile.php">
                <span class="float-left">View</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-clipboard"></i>
                </div>
                <div class="mr-5">My Booking</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="user-view-booking.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa fa-times"></i>
                </div>
                <div class="mr-5">Cancel Booking</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="user-manage-booking.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-clipboard"></i> <i class="fas fa-fw fa-calendar"></i>
                </div>
                <div class="mr-5">Book Cottage</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="usr-book-vehicle.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

       <!--Bookings-->
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-calendar"></i>
            List of Cottages</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Cottage</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Capacity</th>
                    <th>Status</th>
                  </tr>
                </thead>
                
                <tbody>
                <?php

                  $ret="SELECT * FROM tms_vehicle "; //get all bookings
                  $stmt= $mysqli->prepare($ret) ;
                  $stmt->execute() ;//ok
                  $res=$stmt->get_result();
                  $cnt=1;
                  while($row=$res->fetch_object())
                {
                ?>
                  <tr>
                    <td><?php echo $cnt;?></td>
                    <td><?php echo $row->v_name;?></td>
                    <td><?php echo $row->v_reg_no;?></td>
                    <td><?php echo $row->v_pass_no;?></td>
                    <td><?php echo $row->v_driver;?></td>
                    <td><?php if($row->v_status == "Available"){ echo '<span class = "badge badge-success">'.$row->v_status.'</span>'; } else { echo '<span class = "badge badge-danger">'.$row->v_status.'</span>';}?></td>
                    
                  </tr>
                  <?php  $cnt = $cnt +1; }?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            <?php
              date_default_timezone_set("Asia/Manila");
              echo "Generated At : " . date("h:i:sa");
            ?> 
        </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     <?php include("vendor/inc/footer.php");?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="user-logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

 <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="vendor/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="vendor/js/demo/datatables-demo.js"></script>
  <script src="vendor/js/demo/chart-area-demo.js"></script>

</body>

</html>