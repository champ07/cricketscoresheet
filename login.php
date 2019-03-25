<?php include 'header.php';?>
    <form class="box" action="index.html" method="post">
        <div class="imgcontainer">
            <img src="assets/images/avtar.png" alt="Avatar" class="avtar">
        </div>
        <h1>Login</h1>
        <div class="middle">
            <a class="btn2" href="#">
                <i class="fab fa-facebook-f"></i>
            </a>

            <a class="btn2" href="#">
                <i class="fab fa-google"></i>
            </a>

        </div>
        <input type="text" name="uname" placeholder="Username" required>
        <input type="password" name="psw" placeholder="Password" required>
        <label>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </label>
        <input type="submit" name="" value="Login">
        <a href="signup.php"><input type="submit" name="" value="Signup"></a>
    </form>

<?php include 'footer.php';?>