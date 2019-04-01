<?php include 'header.php';
include 'db_conn.php'; ?>


<form class="box" action="signup.php" method="post">
    <div class="imgcontainer">
        <img src="assets/images/avtar.png" alt="Avatar" class="avtar">
    </div>
    <?php if (isset($_GET['exist'])) {
      echo '<div class="alert alert-danger text-center">User does not exist. Please Sign up!</div>';
    } ?>
    <h1>Sign Up</h1>
    <input type="text" name="user_name" placeholder="Full Name" class="txtb">
    <input type="email" name="email" placeholder="Email" class="txtb">
    <input type="password" name="password" placeholder="Password" class="txtb">
    <input type="submit" name="signup" value="Create Account" class="signup-btn">
    <a href="login.php">Already Have one ?</a>

</form>
<?php include 'footer.php'; ?>
<?php 
if (isset($_POST['signup'])) {
  extract($_POST);
  $sql = "select * from users where email = '$email'";
  $check = mysqli_num_rows(mysqli_query($conn, $sql));
  if ($check > 0) {
    echo "<script> location.href='login.php?err=true'; </script>";
    exit();
  } else {
    $sql = "insert into users (user_name, email, password) values ('$user_name', '$email', '$password');";
    mysqli_query($conn, $sql);
    echo "<script> location.href='login.php?signup=true'; </script>";
    exit();
  }
}
