<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Verification</title>
  <link href="../assets/img/favicon.png" rel="icon">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>



    </style>

</head>

<body>
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Forgot your password</h5>
                    <!-- <p class="text-center small">Enter your username & password to login</p> -->
                  <p class="text-center small text-muted">We've sent an OTP to <b>psohum15501@gmail.com</b>. </p>
                  </div>

                  <form action="" method="post" class="row g-3" novalidate>

                    <div class="col-12">
                      <div class="modal-body">

                        <div class="d-flex align-items-center p-4">
                          <input type="text" style="font-size:20px;" class="m-2 form-control text-center my-otp-box" onkeyup="pass1()" id="otp1" name="otp1" >
                          <input type="text" style="font-size:20px;" class="m-2 form-control text-center my-otp-box" onkeyup="pass2()" id="otp2" name="otp2" >
                          <input type="text" style="font-size:20px;" class="m-2 form-control text-center my-otp-box" onkeyup="pass3()" id="otp3" name="otp3" >
                          <input type="text" style="font-size:20px;" class="m-2 form-control text-center my-otp-box" onkeyup="pass4()" id="otp4" name="otp4" >
                          </div>
                        <p id="otpval" class="small text-danger d-none">Invalid OTP</p>

                      </div>
                    </div>


                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="btnSubmit" type="submit">Submit</button>
                    </div>
                  <div class="col-12">
                    <p  class="small text-muted">Please check your inbox (and spam/junk folder, just in case) for an email from us.</p>
                  
                  <p class="small mb-0"><a href=""></a></p>
                </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <a href="index.php">Back to login</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
      		const otps = document.querySelectorAll(".my-otp-box");
		const btn  = document.querySelectorAll(".otpBtn");

		otps[0].focus();

		function pass1(){
			otps[1].focus();
		}
		function pass2(){
			otps[2].focus();
		}
		function pass3(){
			otps[3].focus();
		}
		function pass4(){
			otps[3].blur();
		}
    </script>

</body>

</html>


<?php

if (isset($_POST['btnSubmit'])) {

	$otp1 = $_POST['otp1'];
	$otp2 = $_POST['otp2'];
	$otp3 = $_POST['otp3'];
	$otp4 = $_POST['otp4'];

  $otp = $otp1.$otp2.$otp3.$otp4;

  if($_SESSION["userotp"] == $otp){
    $_SESSION["otpstatus"] = "active";
    echo "<script>document.getElementById('otpval').classList.add('d-none');";
    echo "window.location.href = 'forgot.php'</script>";
  }
  else{
    echo "<script>document.getElementById('otpval').classList.remove('d-none');</script>";

  }


}

?>