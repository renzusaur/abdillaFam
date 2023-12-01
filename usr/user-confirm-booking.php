<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['u_id'];
  //Add Booking
  if(isset($_POST['book_vehicle']))
    {
            $u_id = $_SESSION['u_id'];
            //$u_fname=$_POST['u_fname'];
            //$u_lname = $_POST['u_lname'];
            //$u_phone=$_POST['u_phone'];
            //$u_addr=$_POST['u_addr'];
            $u_car_type = $_POST['u_car_type'];
            $u_car_regno  = $_POST['u_car_regno'];
            $u_car_bookdate = $_POST['u_car_bookdate'];
            $u_car_book_status  = $_POST['u_car_book_status'];
            $query="update tms_user set u_car_type=?, u_car_bookdate=?, u_car_regno=?, u_car_book_status=? where u_id=?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssssi', $u_car_type, $u_car_bookdate, $u_car_regno, $u_car_book_status, $u_id);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Booking Subitted";
                }
                else 
                {
                    $err = "Please Try Again Later";
                }
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <?php include('vendor/inc/head.php');?>
</head>
<body id="page-top">
    <?php include("vendor/inc/nav.php");?>
    <div id="wrapper">
        <?php include("vendor/inc/sidebar.php");?>
        <div id="content-wrapper">
            <div class="container-fluid">
                <?php if(isset($succ)) {?>
                    <script>
                        setTimeout(function () { 
                            swal("Success!","<?php echo $succ;?>!","success");
                        }, 100);
                    </script>
                <?php } ?>
                <?php if(isset($err)) {?>
                    <script>
                        setTimeout(function () { 
                            swal("Failed!","<?php echo $err;?>!","Failed");
                        }, 100);
                    </script>
                <?php } ?>

                <!-- Breadcrumbs -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="user-dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">Cottage</li>
                    <li class="breadcrumb-item ">Book Cottage</li>
                    <li class="breadcrumb-item active">Confirm Booking</li>
                </ol>
                <hr>
                <div class="card">
                    <div class="card-header">
                        Confirm Booking
                    </div>
                    <div class="card-body">
                        <?php
                            $aid = $_GET['v_id'];
                            $ret = "select * from tms_vehicle where v_id=?";
                            $stmt = $mysqli->prepare($ret);
                            $stmt->bind_param('i', $aid);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            while($row = $res->fetch_object()) {
                        ?>
                        <form method ="POST" id="bookingForm"> 
                            <div class="form-group">
                                <label for="exampleInputEmail1">Booking Type</label>
                                <input type="text" value="<?php echo $row->v_category;?>" readonly class="form-control" name="u_car_type">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">To Pay</label>
                                <input type="email" value="<?php echo $row->v_reg_no;?>" readonly class="form-control" name="u_car_regno">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Booking Date</label>
                                <input type="date" class="form-control" id="exampleInputEmail1" name="u_car_bookdate">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPaymentMethod">Payment Method</label>
                                <select class="form-control" id="exampleInputPaymentMethod" name="u_pay_method">
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="Gcash">Gcash</option>
                                    <option value="Pay at Counter">Pay at counter <a href="">(Downpayment)</a></option>
                                </select>
                            </div>
                            <div class="form-group" style="display:none">
                                <label for="exampleInputEmail1">Book Status</label>
                                <input type="text" value="Pending" class="form-control" id="exampleInputEmail1" name="u_car_book_status">
                            </div>
                           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#paymentModal">
        Confirm Booking
    </button>

                       
                        <?php }?>
                    </div>
                </div>

               <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Confirm Payment Method</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               <div class="modal-body">
    <h2>Are you sure you want to confirm the booking with the selected payment method?</h2> 
    If you will meet the restrictions of the <a href="terms-and-conditions.html" target="_blank">Terms and Conditions</a>, you will not get your money back.

    <!-- Display the selected payment method -->
    <p>Payment Method:<b> <span id="selectedPaymentMethod"></b></span></p>
</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="book_vehicle" class="btn btn-success">Confirm Booking</button>
                </div>
            </div>
        </div>
    </div>
</form>

                <hr>
                <?php include("vendor/inc/footer.php");?>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Sweet Alert -->
    <script src="vendor/js/swal.js"></script>

    <!-- jQuery to update selected payment method in the modal -->
    <script>
        $(document).ready(function() {
            $('#exampleInputPaymentMethod').change(function() {
                var selectedPaymentMethod = $(this).val();
                $('#selectedPaymentMethod').text(selectedPaymentMethod);
            });
        });
    </script>

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
 <!--INject Sweet alert js-->
 <script src="vendor/js/swal.js"></script>



</body>

</html>