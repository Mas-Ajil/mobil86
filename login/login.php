<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'jualmobil');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Webkita</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <?php
    error_reporting(0);
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE nama_user = '$username' AND password = '$password'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);

        if ($row) {
            //berhasil login
    ?>
            <script language="javascript">
                alert('Anda Login Sebagai <?php echo $row['nama_user']; ?>');
                document.location = '../home.html';
            </script>
    <?php
        } else {
            //gagal login
    ?>
            <script language="javascript">
                alert('Gagal Login');
                document.location = 'login.php';
            </script>
    <?php
        }
    }
    ?>
    <div class="container">
        <form method="POST">
            <div class="form-group">
                <h1><img src="logobg.png" alt="logo"></h1>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="login-options">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember Me</label>
                </div>
                <a href="forgotpass.php" class="forgotpass">Forgot Password</a>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" id="login">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
