<?php
  include("../config/connection.php");

  // Check if user is already logged in
  if (isset($_SESSION['adminuser'])) {
    echo "<script>window.location = 'inventory-show.php';</script>";
  }

  // Handle form submission
  if (isset($_POST['login-btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM admin_master WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
      $_SESSION['adminuser'] = $username;

      if ($remember) {
        setcookie("usernameadmin", $username, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie("passwordadmin", $password, time() + (86400 * 30), "/"); // For demonstration purposes only
      } else {
        // Clear cookies if "Remember Me" is not checked
        setcookie("usernameadmin", "", time() - 3600, "/");
        setcookie("passwordadmin", "", time() - 3600, "/");
      }

      echo "<script>window.location = 'inventory-show.php';</script>";
    } else {
      echo "<script>alert('Login failed. Incorrect username or password.');</script>";
      echo "<script>window.location = 'index.php';</script>";
    }
  }
  
  
  if (isset($_POST['sendMail'])) {

	$otp = rand(1000, 9999);
	$_SESSION['userotp'] = $otp;
	$otpmessage = "
	<html>
	<head>
			<title>Your OTP for Verification</title>
			<style>
					*{
						margin:0;
						padding:0;
					}
					body {
							font-family: Arial, sans-serif;
							background-color: #f5f5f5;
							color: #333;
							line-height: 1.6;
							margin: 0;
							padding: 20px;
					}
					.container {
							max-width: 600px;
							margin: 0 auto;
							background-color: #fff;
							padding: 20px;
							border: 1px solid #ddd;
							border-radius: 5px;
					}
					h2 {
							color: #007bff;
					}
					.otp-code {
					    width: 134px;
    					letter-spacing: 4px;
    					text-align: center;
    					padding: 8px 0;
    					margin: 26px auto;
							font-size: 24px;
							background-color: #2d3436;
							color: #fff;
							border-radius: 5px;
					}
					.footer {
							margin-top: 20px;
							color: #666;
					}
			</style>
	</head>
	<body>
			<div class='container'>
					<h2 style='margin-bottom: 16px;'>Your OTP for Verification</h2>
					<p>Here is your OTP (One-Time Password) for verification:</p>
					<div class='otp-code'>$otp</div>
					<p>Please use this OTP to proceed with your verification process.</p>
					<p>This OTP is valid for a single use and expires in a short time.</p>
					<p class='footer'>Thank you</p>
			</div>
	</body>
	</html>
";


	$to = "psohum15501@gmail.com";
	$subject = "Verify Your OM EXIM Corporation Admin Account";
	$message = $otpmessage;
	$headers = "From: admin@omeximcorporation.com\r\n" .
						 "Reply-To: admin@omeximcorporation.com\r\n" .
						 "Content-type: text/html; charset=UTF-8\r\n".
						 "X-Mailer: PHP/" . phpversion();

	if (mail($to, $subject, $message, $headers)) {
		echo "<script>location.href='verification.php'</script>";

	} else {
		echo "<script>alert('Failed to send email.')</script>";
	}

	

}

  
  
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <title>Admin Login</title>

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

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
  
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a class="d-flex align-items-center w-auto">
                  <img src="../assets/img/logop.png" style="width: 250px" >
                  <!-- <span class="d-none d-lg-block">Admin Login</span> -->
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Admin Login</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form method="POST" action="" class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" value="<?php echo isset($_COOKIE['usernameadmin']) ? htmlspecialchars($_COOKIE['usernameadmin']) : ''; ?>" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" value="<?php echo isset($_COOKIE['passwordadmin']) ? htmlspecialchars($_COOKIE['passwordadmin']) : ''; ?>" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button name="login-btn" class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>
                  <form method="POST" action="">
                    <div class="col-12">
                        <button class="small mb-0 text-primary" style="margin-top:10px; background-color:#00000000; border:none; outline:none;" name="sendMail">Forgot Password</button>
                      <!--<p class="small mb-0"><a href="verification.php"></a></p>-->
                    </div>
                </form>   

                </div>
              </div>

              <div class="credits">
                <a href="../">User login</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
