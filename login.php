<?php

$users = [
    'admin' => 'admin',
    'inward' => 'inward',
    'process' => 'process',
    'outward' => 'outward',
    'three' => 'user'
];

$redirectPages = [
    'admin' => 'adminpage.php',
    'inward' => 'inwardpage.php',
    'process' => 'processpage.php',
    'outward' => 'outwardpage.php',
    'three' => 'threepage.php'
];
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($users[$email]) && $users[$email] == $password) {
        setcookie('user', $email, time() + (86400 * 30), "/");
        header('Location: ' . $redirectPages[$email]);
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>
