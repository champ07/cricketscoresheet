<?php include 'header.php';
include 'db_conn.php'; ?>
<div class="wrapper">
    <div class="form1">
        <div class="input-fields">
            <h1>Batting team</h1>
            <select class="form-control" name="striker_batsman" required>
                <?php
                $query = 'SELECT * from teamdetails where teamname ="' . $_SESSION['team1'] . '";';
                $result = mysqli_query($conn, $query);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        for ($i = 1; $i < 12; $i++) {
                            echo '<option value="' . $row['player' . $i] . '">' . $row['player' . $i] . '</option> ';
                        }
                    }
                }
                ?>
            </select>
            <select class="form-control" name="nonstriker_batsman" id="todays_patient" required>
                <?php
                $query = 'SELECT * from teamdetails where teamname ="' . $_SESSION['team1'] . '";';
                $result = mysqli_query($conn, $query);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        for ($i = 1; $i < 12; $i++) {
                            echo '<option value="' . $row['player' . $i] . '">' . $row['player' . $i] . '</option> ';
                        }
                    }
                }
                ?>
            </select>

            <h1>Bowling team</h1>
            <select class="form-control" name="opening_bowler" id="todays_patient" required>
                <?php
                $query = 'SELECT * from teamdetails where teamname ="' . $_SESSION['team2'] . '";';
                $result = mysqli_query($conn, $query);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        for ($i = 1; $i < 12; $i++) {
                            echo '<option value="' . $row['player' . $i] . '">' . $row['player' . $i] . '</option> ';
                        }
                    }
                }
                ?>
            </select>

            <a href="scorecard.php"><input type="submit" name="" value="Next"></a>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <?php 
    if (isset($_POST['submit'])) {
        extract($_POST);
    }
    