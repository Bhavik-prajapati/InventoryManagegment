<?php
include("config/connection.php");

if (isset($_POST['login-btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $remember = isset($_POST['remember']);

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Password should be hashed in the database for security
    $query = "SELECT * FROM user_master WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['id'] = $row['id'];
        // $role = $row['role'];
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        if ($remember) {
            setcookie("username", $username, time() + (86400 * 30), "/");
            setcookie("password", $password, time() + (86400 * 30), "/");
        } else {
            setcookie("username", "", time() - 3600, "/");
            setcookie("password", "", time() - 3600, "/");
        }

        $user_type = $_SESSION['role'];
        $email = $_SESSION['username'];
        $activity_details = "logged in";

        $stmt = $conn->prepare("
            INSERT INTO activity_master (user_id, email, user_type, activity_timestamp, activity_details)
            VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?)
        ");
        $stmt->bind_param('isss', $_SESSION['id'], $_SESSION['username'], $_SESSION['role'], $activity_details);
        $stmt->execute();

        if ($role == "Inward") {
            echo "<script>window.location = 'inward/inward-form.php';</script>";
        } elseif ($role == "Process") {
            echo "<script>window.location = 'process/process-form.php';</script>";
        } elseif ($role == "Outward") {
            echo "<script>window.location = 'outward/outward-form.php';</script>";
        }
    } else {
        echo "<script>alert('Login failed. Incorrect username or password.');</script>";
        echo "<script>window.location = 'index.php';</script>";
    }
}

if (isset($_SESSION['role']) && isset($_SESSION['username'])) {
    if ($_SESSION['role'] == "Inward") {
        echo "<script>window.location = 'inward/inward-form.php';</script>";
    } elseif ($_SESSION['role'] == "Process") {
        echo "<script>window.location = 'process/process-form.php';</script>";
    } elseif ($_SESSION['role'] == "Outward") {
        echo "<script>window.location = 'outward/outward-form.php';</script>";
    }
}

$username_cookie = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
$password_cookie = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>User Login</title>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    .text-danger {
      display: none;
    }
  </style>
  <script>
  function validateForm() {
    let form = document.forms["dataForm"];
    let valid = true;

    function checkField(fieldName, labelId) {
      let field = form[fieldName].value;
      let label = document.getElementById(labelId);
      if (!field) {
        label.style.display = 'block';
        valid = false;
      } else {
        label.style.display = 'none';
      }
    }

    // Validate each field
    checkField("yourUsername", "usernameValidation");
    checkField("yourPassword", "passwordValidation");
    checkField("yourRole", "roleValidation");


    const formFields = ["yourUsername", "yourPassword", "yourRole"];

  formFields.forEach(fieldName => {
    document.getElementById(fieldName).onchange = function() {
      validateForm(false);
    };
  });


    
    return valid;
  }
</script>

</head>
<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a class="d-flex align-items-center">
                  <img src="assets/img/logop.png" style="width: 250px" >
                  <!-- <span class="d-none d-lg-block">User Login</span> -->
                </a>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">User Login</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>
                  <form name="dataForm" method="POST" action="" class="row g-3" onsubmit="return validateForm(true)">
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" value="<?php echo htmlspecialchars($username_cookie); ?>" >
                      </div>
                      <div id="usernameValidation" class="text-danger">*Please enter your username.</div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" value="<?php echo htmlspecialchars($password_cookie); ?>" >
                      <div id="passwordValidation" class="text-danger">*Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourRole" class="form-label">User Module</label>
                      <select class="form-control" name="role" id="yourRole" >
                        <option value="" selected disabled>-- select module --</option>
                        <option value="Inward">Inward</option>
                        <option value="Process">Process</option>
                        <option value="Outward">Outward</option>
                      </select>
                      <div id="roleValidation" class="text-danger">*Select user module!</div>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe" <?php if ($username_cookie && $password_cookie) echo 'checked'; ?>>
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button name="login-btn" class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="credits">
                <a href="admin">Admin login</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
