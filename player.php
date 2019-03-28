<?php include 'header.php'; ?>
<div class="wrapper">
    <div class="form1">
        <div class="input-fields">
            <h1>Batting team</h1>
            <select class="form-control" name="batting_team" id="todays_patient" required>
                <?php
                $query = "SELECT * from teamdetails where teamname ='" . $batting_team . "';";
                $result = mysqli_query($conn, $query);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo '<option value="' . $row['teamname'] . '">' . $row['teamname'] . '</option> ';
                    }
                }
                ?>
            </select>
            <select class="form-control" name="batting_team" id="todays_patient" required>
                <?php
                $query = "SELECT * from teamdetails where teamname ='" . $batting_team . "';";
                $result = mysqli_query($conn, $query);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['player'] . '">' . $row['teamname'] . '</option> ';
                    }
                }
                ?>
            </select>

            <h1>Bowling team</h1>
            <select class="form-control" name="batting_team" id="todays_patient" required>
                <?php
                $query = "SELECT * from teamdetails where teamname ='" . $bowling_team . "';";
                $result = mysqli_query($conn, $query);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo '<option value="' . $row['teamname'] . '">' . $row['teamname'] . '</option> ';
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
    