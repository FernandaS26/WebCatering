<?php
session_start(); // Start the session at the top of the file
include 'db.php'; // Include the database connection

if(isset($_POST['submit'])){
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username ='".$user."' AND password = '".$pass."'");
    if(mysqli_num_rows($cek) > 0) {
        $d = mysqli_fetch_object($cek);
        $_SESSION['status_login'] = true;
        $_SESSION['a_global'] = $d;
        $_SESSION['id'] = $d->admin_id;
        echo '<script>window.location="dashboard.php"</script>';
    } else {
        echo '<script>alert("username atau password Anda salah")</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2> Login </h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="submit" name="submit" value="Login" class="btn">
        </form>
    </div>
</body>
</html>
