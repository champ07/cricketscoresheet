<?php include 'header.php';
include 'db_conn.php'; ?>
<form class="box" action="login.php" method="post">
    <div class="imgcontainer">
        <img src="assets/images/avtar.png" alt="Avatar" class="avtar">
    </div>
    <?php if (isset($_GET['signup'])) {
        echo '<div class="alert alert-danger text-center">Signup Successful!</div>';
    } ?>
    <?php if (isset($_GET['err'])) {
        echo '<div class="alert alert-danger text-center">User with that email already exist!</div>';
    } ?>
    <h1>Login</h1>
    <div class="middle">
        <a class="btn2" href="#">
            <i class="fab fa-facebook-f"></i>
        </a>

        <a class="btn2" href="#">
            <i class="fab fa-google"></i>
        </a>

    </div>
    <input type="text" name="email" placeholder="Email *" required>
    <input type="password" name="password" placeholder="Password *" required>
    <input type="submit" name="submit" value="Login">
    <a href="signup.php"></a>
</form>

<?php include 'footer.php'; ?>

<?php

if (isset($_POST['submit'])) {
    extract($_POST);
    $sql = "select * from users where email = '$email';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck < 1) {
        header("Location: signup.php?exist=true");
        exit();
    } elseif ($row = mysqli_fetch_assoc($result)) {
        // $hashedPwdCheck = password_verify($pwd, $row['healer_password']);
        // if ($hashedPwdCheck == false) {

        // elseif ($hashedPwdCheck == true) {
        // Log in the user here
        if ($email == $row['email']) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            header("Location: index.php");
            exit();
        } else {
            header("Location: index.php?loginerr=true");
            exit();
        }
    }
}
