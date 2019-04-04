<?php include 'header.php';
include 'db_conn.php'; ?>


<div class="wrapper">
    <form class="form1" method="post" action="newmatch.php">
        <div class="input-fields">
            <h1>MATCH DETAILS</h1>
            <input type="text" name="tname" class="input" placeholder="Tournment/series" required>
            <label for="">Batting Team</label>
            <select class="form-control" name="batting_team" id="" required>
                <?php
                $query = "SELECT * from teamdetails;";
                $result = mysqli_query($conn, $query);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo '<option value="' . $row['teamname'] . '">' . $row['teamname'] . '</option> ';
                    }
                }
                ?>
            </select>
            <label for="">Bowling Team</label>
            <select class="form-control" name="bowling_team" id="todays_patient" required>
                <?php
                $query = "SELECT * from teamdetails;";
                $result = mysqli_query($conn, $query);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo '<option value="' . $row['teamname'] . '">' . $row['teamname'] . '</option> ';
                    }
                }
                ?>
            </select>
            <label for="">Match type</label>
            <select name="match_type" id="">
                <option value="limited">Limited Overs</option>
                <option value="unlimited">Unimited Overs</option>
            </select>
            <input type="number" name="overs" class="input" placeholder="Overs" required>
            <input type="submit" name="submit" value="Next">
        </div>
    </form>
</div>
<?php include 'footer.php'; ?>
<?php 

if (isset($_POST['submit'])) {
    extract($_POST);
    $sql = "insert into matches (match_name,match_team1,match_team2,match_type,match_overs,user_id) values('$tname','$batting_team','$bowling_team','$match_type'," . $overs . "," . $_SESSION['user_id'] . ");";
    $_SESSION['team1']= $batting_team;
    $_SESSION['team2']= $bowling_team;
    $_SESSION['overs'] = $overs;
    if (!mysqli_query($conn, $sql)) {
        echo "<script>location.href='index.php';</script>";
    } else {
        echo "<script>location.href='player.php';</script>";
    }
}
