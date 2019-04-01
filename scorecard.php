<?php session_start();
include 'db_conn.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Cricket Score Sheet </title>
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body style="background: linear-gradient(rgba(0,0,0,.5)), url(' ../images/stadium.jpg') no-repeat; background-size: cover; color: white;">

    <div class="navbar">

        <div class="logo">
            <img src="assets/images/logo.png" alt="Avatar" class="symbol">
        </div>

        <a class="btn1">
            <span></span>
            <span></span>
            <span></span>
        </a>

        <div class="menu">
            <a href="index.php">Home</a>
            <a href="#">How to use</a>
            <a href="#">About us</a>

            <?php if (isset($_SESSION['email'])) {
                echo '<a href="logout.php">Logout</a>';
            } else {
                echo '<a href="login.php">Login</a>';
            }
            ?>
        </div>
    </div>

    <div class="">
        <center><span id="team_id">Your team</span> &nbsp <span id="current_score">0/0</span> <br><br>
            <span id="team_id">Your team</span> &nbsp <span id="current_score">0/0</span></center>

        <br><br>
        <div class="details">
            <div class="row">
                <div class="col">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Batting Team</th>
                                <th scope="col">Runs</th>
                                <th scope="col">Balls</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "select * from teamdetails where teamname = '" . $_SESSION['team1'] . "';";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);
                            if ($resultCheck > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    for ($i = 1; $i < 12; $i++) {
                                        echo '<tr>';
                                        echo '<td>' . $i . '</td>';
                                        echo '<td>' . $row['player' . $i] . '</td>';
                                        echo '<td><span id="runs' . $i . '">0</span></td>';
                                        echo '<td><span id="balls' . $i . '">0</span></td>';
                                        echo '</tr>';
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-lg">
                            <table border="" align="center" cellpadding="10px" cellspacing="1px" class="table table-dark">
                                <tr>
                                    <th>Batsman</th>
                                    <th>Runs</th>
                                    <th>Balls</th>
                                    <th>4s</th>
                                    <th>6s</th>
                                </tr>
                                <tr>
                                    <th><span id="player1_id">player1</span></th>
                                    <th><span id="player1_run">0</span></th>
                                    <th><span id="player1_ball">0</span></th>
                                    <th><span id="player1_four">0</span></th>
                                    <th><span id="player1_six">0</span></th>
                                </tr>
                                <tr>
                                    <th><span id="player2_id">player2</span></th>
                                    <th><span id="player2_run">0</span></th>
                                    <th><span id="player2_ball">0</span></th>
                                    <th><span id="player2_four">0</span></th>
                                    <th><span id="player2_six">0</span></th>
                                </tr>

                                <tr>
                                    <th>Bowler</th>
                                    <th>Over</th>
                                    <th>Runs</th>
                                    <th>Wickets</th>
                                    <th>Maiden</th>
                                </tr>
                                <tr>
                                    <th><span id="bowler_id">Bowler</span></th>
                                    <th><span id="bowler_run">0</span></th>
                                    <th><span id="bowler_ball">0</span></th>
                                    <th><span id="bowler_four">0</span></th>
                                    <th><span id="bowler_six">0</span></th>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg">

                            <center>
                                <div class="round-btns">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#one">1</a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#two">2</a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#three">3</a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#four">4</a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#five">5</a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#six">6</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#wicket">W</a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#noBall">NB</a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#bold">B</a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#legBy">LB</a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#wide">WD</a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">X</a>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Bowling Team</th>
                                <th scope="col">Overs</th>
                                <th scope="col">Runs</th>
                                <th scope="col">Wickets</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "select * from teamdetails where teamname = '" . $_SESSION['team2'] . "';";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);
                            if ($resultCheck > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    for ($i = 1; $i < 12; $i++) {
                                        echo '<tr>';
                                        echo '<td>' . $i . '</td>';
                                        echo '<td>' . $row['player' . $i] . '</td>';
                                        echo '<td><span id="overs' . $i . '">0</span></td>';
                                        echo '<td><span id="runs' . $i . '">0</span></td>';
                                        echo '<td><span id="wickets' . $i . '">0</span></td>';
                                        echo '</tr>';
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <script type="text/javascript">
        $(".btn1").on("click", function() {
            $('.menu').toggleClass("show");
        });
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/jquery.in.js"></script>
</body>

</html>

<script type="text/javascript">

</script> 