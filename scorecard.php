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
<?php 
    if (isset($_POST['player_submit'])){
        extract($_POST);
    }
?>

<body style="background: linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)),url('assets/images/stadium.jpg'); background-size: cover; color: white;">
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
            <center><span id="team_id">Your Team</span> &nbsp <span id="runs_your_team">0</span>/<span id="wickets_your_team">0</span> <br><br>
                <span id="team_id">Oppponent Team</span> &nbsp <span id="runs_opponent_team">0</span>/<span id="balls_your_team">0</span></center>

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
                                            echo '<td><span id="runs_' . $row['player' . $i] . '">0</span></td>';
                                            echo '<td><span id="balls_' . $row['player' . $i] . '">0</span></td>';
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
                                        <th><span id="bowler_over">0</span></th>
                                        <th><span id="bowler_run">0</span></th>
                                        <th><span id="bowler_wicket">0</span></th>
                                        <th><span id="bowler_maiden">0</span></th>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg">

                                <center>
                                    <div class="round-btns">
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="#one" class="btn" id="one">1</a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#two"class="btn" id="two">2</a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#three" class="btn" id="three">3</a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#four" class="btn" id="four">4</a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#five" class="btn" id="five">5</a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#six" class="btn" id="six">6</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="#wicket" class="btn" id="wicket">W</a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#noBall" class="btn" id="noBall">NB</a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#bold" class="btn" id="B">B</a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#legBy" class="btn" id="LB">LB</a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#wide" class="btn" id="wide">WD</a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#" class="btn" id="zero">0</a>
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
                                            echo '<td><span id="overs_' . $row['player' . $i] . '">0</span></td>';
                                            echo '<td><span id="runs_' . $row['player' . $i] . '">0</span></td>';
                                            echo '<td><span id="wickets_' . $row['player' . $i] . '">0</span></td>';
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

        <!-- choose bowler modal -->
        <div class="modal" id="changeBowler" tabindex="-1" role="dialog" style="color:black;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Bowler</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="form-control" name="bowler" id="bowler_choose" required>
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
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_choose_bowler_modal_okay" class="btn btn-dark" data-dismiss="modal">okay</button>
                </div>
                </div>
            </div>
        </div>

        <!-- choose batsman modal -->
        <div class="modal" id="changeBatsman" tabindex="-1" role="dialog" style="color:black;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Next Batsman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="form-control" name="batsman" id="batsman_choose" required>
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
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_choose_batsman_modal_okay" class="btn btn-dark" data-dismiss="modal">okay</button>
                </div>
                </div>
            </div>
        </div>

        <!-- no ball modal -->
        <div class="modal" id="noBallModal" tabindex="-1" role="dialog" style="color:black;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">No Ball</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="form-control" name="bowler" id="no_ball_score" required>
                        <option value="0">no ball + 0</option>
                        <option value="1">no ball + 1</option>
                        <option value="2">no ball + 2</option>
                        <option value="3">no ball + 3</option>
                        <option value="4">no ball + 4</option>
                        <option value="5">no ball + 5</option>
                        <option value="6">no ball + 6</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_no_ball_modal_okay" class="btn btn-dark" data-dismiss="modal">okay</button>
                </div>
                </div>
            </div>
        </div>

        <!-- byes modal -->
        <div class="modal" id="BModal" tabindex="-1" role="dialog" style="color:black;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bye</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="form-control" name="bowler" id="bye_score" required>
                        <option value="0">Bye0</option>
                        <option value="1">Bye1</option>
                        <option value="2">Bye2</option>
                        <option value="3">Bye3</option>
                        <option value="4">Bye4</option>
                        <option value="5">Bye5</option>
                        <option value="6">Bye6</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_B_modal_okay" class="btn btn-dark" data-dismiss="modal">okay</button>
                </div>
                </div>
            </div>
        </div>

        <!--leg byes modal -->
        <div class="modal" id="LBModal" tabindex="-1" role="dialog" style="color:black;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Leg Bye</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="form-control" name="bowler" id="leg_bye_score" required>
                        <option value="0">LegBye0</option>
                        <option value="1">LegBye1</option>
                        <option value="2">LegBye2</option>
                        <option value="3">LegBye3</option>
                        <option value="4">LegBye4</option>
                        <option value="5">LegBye5</option>
                        <option value="6">LegBye6</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_LB_modal_okay" class="btn btn-dark" data-dismiss="modal">okay</button>
                </div>
                </div>
            </div>
        </div>

        <!-- wide modal -->
        <div class="modal" id="wideModal" tabindex="-1" role="dialog" style="color:black;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Wide Ball</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="form-control" name="bowler" id="wide_ball_score" required>
                        <option value="0">wide + 0</option>
                        <option value="1">wide + 1</option>
                        <option value="2">wide + 2</option>
                        <option value="3">wide + 3</option>
                        <option value="4">wide + 4</option>
                        <option value="5">wide + 5</option>
                        <option value="6">wide + 6</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_wide_ball_modal_okay" class="btn btn-dark" data-dismiss="modal">okay</button>
                </div>
                </div>
            </div>
        </div>
        
        <script src="assets/js/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="assets/js/jquery.in.js"></script>
    </body>

</html>
<script type="text/javascript">
            $(".btn1").on("click", function() {
                $('.menu').toggleClass("show");
            });
        </script>
<script type="text/javascript">
    $(document).ready(function(){
        var old_striker;
        var striker_batsman = "<?php echo $striker_batsman;?>";
        $('#player1_id').html(striker_batsman);
        $('#player1_id').attr('id','main_table_'+striker_batsman);
        $('#player1_run').attr('id','main_table_'+striker_batsman+'_run');
        $('#player1_ball').attr('id','main_table_'+striker_batsman+'_ball');
        $('#player1_four').attr('id','main_table_'+striker_batsman+'_four');
        $('#player1_six').attr('id','main_table_'+striker_batsman+'_six');
        var nonstriker_batsman = "<?php echo $nonstriker_batsman;?>";
        $('#player2_id').html(nonstriker_batsman);
        $('#player2_id').attr('id','main_table_'+nonstriker_batsman);
        $('#player2_run').attr('id','main_table_'+nonstriker_batsman+'_run');
        $('#player2_ball').attr('id','main_table_'+nonstriker_batsman+'_ball');
        $('#player2_four').attr('id','main_table_'+nonstriker_batsman+'_four');
        $('#player2_six').attr('id','main_table_'+nonstriker_batsman+'_six');
        var bowler = "<?php echo $opening_bowler;?>";
        //to keep a track of 6 balls of an over
        var ball_count=0;
        var batting_team = "<?php echo $_SESSION['team1']?>";
        var bowling_team = "<?php echo $_SESSION['team2']?>";
        var overs = <?php echo $_SESSION['overs'];?>;
        var total_balls = overs * 6;
        
        $('#one').click(function(){
            //for batting team table
            var i = parseInt($("#runs_"+ striker_batsman).text());
            $("#runs_"+striker_batsman).html(i+1);
            i = parseFloat($("#balls_"+ striker_batsman).text());
            $("#balls_"+striker_batsman).html(i+1);

            //bowling team table
            i = parseInt($("#runs_"+ bowler).text());
            $("#runs_"+bowler).html(i+1);
            i = parseFloat($("#overs_"+ bowler).text());
            if(((i%1.0)*10) == 5){
                $("#overs_"+bowler).html((i+0.5).toFixed(1));
            }
            else{
                $("#overs_"+bowler).html((i+0.1).toFixed(1));
            }

            //main table bowler
            i = parseInt($("#bowler_run").text());
            $("#bowler_run").html(i+1);
            i = parseFloat($("#bowler_over").text());
            $("#bowler_over").html((i+0.1).toFixed(1));
            if(((i%1.0)*10) == 5){
                $("#bowler_over").html((i+0.5).toFixed(1));
            }
            else{
                $("#bowler_over").html((i+0.1).toFixed(1));
            }

            //main table batsman
            var i = parseInt($('#main_table_'+striker_batsman+'_run').text());
            $('#main_table_'+striker_batsman+'_run').html(i+1);
            i = parseFloat($('#main_table_'+striker_batsman+'_ball').text());
            $('#main_table_'+striker_batsman+'_ball').html(i+1);

            //runs and balls current score
            i = parseInt($("#runs_your_team").text());
            $("#runs_your_team").html(i+1);

            //increase ball count on every ball
            ball_count++;
            if(ball_count%6 == 0){
                $('#changeBowler').modal('show');
                $('#btn_choose_bowler_modal_okay').click(function(){
                    bowler = $("#bowler_choose").val();
                    $('#bowler_over').html(0);
                    $('#bowler_run').html(0);
                    $('#bowler_wicket').html(0);
                    $('#bowler_maiden').html(0);
                });
                [striker_batsman, nonstriker_batsman] = [nonstriker_batsman, striker_batsman];
            }
            else{
                [striker_batsman, nonstriker_batsman] = [nonstriker_batsman, striker_batsman];
            }

            //check inning end
            checkInning();
        });

        $('#two').click(function(){
            //for batting team table
            var i = parseInt($("#runs_"+ striker_batsman).text());
            $("#runs_"+striker_batsman).html(i+2);
            i = parseFloat($("#balls_"+ striker_batsman).text());
            $("#balls_"+striker_batsman).html(i+1);

            //bowling team table
            i = parseInt($("#runs_"+ bowler).text());
            $("#runs_"+bowler).html(i+2);
            i = parseFloat($("#overs_"+ bowler).text());
            if(((i%1.0)*10) == 5){
                $("#overs_"+bowler).html((i+0.5).toFixed(1));
            }
            else{
                $("#overs_"+bowler).html((i+0.1).toFixed(1));
            }

            //main table
            i = parseInt($("#bowler_run").text());
            $("#bowler_run").html(i+2);
            i = parseFloat($("#bowler_over").text());
            $("#bowler_over").html((i+0.1).toFixed(1));
            if(((i%1.0)*10) == 5){
                $("#bowler_over").html((i+0.5).toFixed(1));
            }
            else{
                $("#bowler_over").html((i+0.1).toFixed(1));
            }

            //main table batsman
            var i = parseInt($('#main_table_'+striker_batsman+'_run').text());
            $('#main_table_'+striker_batsman+'_run').html(i+2);
            i = parseFloat($('#main_table_'+striker_batsman+'_ball').text());
            $('#main_table_'+striker_batsman+'_ball').html(i+1);

            //runs and balls current score
            i = parseInt($("#runs_your_team").text());
            $("#runs_your_team").html(i+2);

            //increase ball count on every ball
            ball_count++;
            if(ball_count%6 == 0){
                $('#changeBowler').modal('show');
                $('#btn_choose_bowler_modal_okay').click(function(){
                    bowler = $("#bowler_choose").val();
                    $('#bowler_over').html(0);
                    $('#bowler_run').html(0);
                    $('#bowler_wicket').html(0);
                    $('#bowler_maiden').html(0);
                });
                [striker_batsman, nonstriker_batsman] = [nonstriker_batsman, striker_batsman];
            }

            //check inning end
            checkInning();
        });

        $('#three').click(function(){
            //for batting team table
            var i = parseInt($("#runs_"+ striker_batsman).text());
            $("#runs_"+striker_batsman).html(i+3);
            i = parseFloat($("#balls_"+ striker_batsman).text());
            $("#balls_"+striker_batsman).html(i+1);

            //bowling team table
            i = parseInt($("#runs_"+ bowler).text());
            $("#runs_"+bowler).html(i+3);
            i = parseFloat($("#overs_"+ bowler).text());
            if(((i%1.0)*10) == 5){
                $("#overs_"+bowler).html((i+0.5).toFixed(1));
            }
            else{
                $("#overs_"+bowler).html((i+0.1).toFixed(1));
            }

            //main table
            i = parseInt($("#bowler_run").text());
            $("#bowler_run").html(i+3);
            i = parseFloat($("#bowler_over").text());
            $("#bowler_over").html((i+0.1).toFixed(1));
            if(((i%1.0)*10) == 5){
                $("#bowler_over").html((i+0.5).toFixed(1));
            }
            else{
                $("#bowler_over").html((i+0.1).toFixed(1));
            }

            //main table batsman
            var i = parseInt($('#main_table_'+striker_batsman+'_run').text());
            $('#main_table_'+striker_batsman+'_run').html(i+3);
            i = parseFloat($('#main_table_'+striker_batsman+'_ball').text());
            $('#main_table_'+striker_batsman+'_ball').html(i+1);

            //runs and balls current score
            i = parseInt($("#runs_your_team").text());
            $("#runs_your_team").html(i+3);

           //increase ball count on every ball
           ball_count++;
            if(ball_count%6==0){
                $('#changeBowler').modal('show');
                $('#btn_choose_bowler_modal_okay').click(function(){
                    bowler = $("#bowler_choose").val();
                    $('#bowler_over').html(0);
                    $('#bowler_run').html(0);
                    $('#bowler_wicket').html(0);
                    $('#bowler_maiden').html(0);
                });
                [striker_batsman, nonstriker_batsman] = [nonstriker_batsman, striker_batsman];
            }
            else{
                [striker_batsman, nonstriker_batsman] = [nonstriker_batsman, striker_batsman];
            }

            //check inning end
            checkInning();
        });

        $('#four').click(function(){
            //for batting team table
            var i = parseInt($("#runs_"+ striker_batsman).text());
            $("#runs_"+striker_batsman).html(i+4);
            i = parseFloat($("#balls_"+ striker_batsman).text());
            $("#balls_"+striker_batsman).html(i+1);

            //bowling team table
            i = parseInt($("#runs_"+ bowler).text());
            $("#runs_"+bowler).html(i+4);
            i = parseFloat($("#overs_"+ bowler).text());
            if(((i%1.0)*10) == 5){
                $("#overs_"+bowler).html((i+0.5).toFixed(1));
            }
            else{
                $("#overs_"+bowler).html((i+0.1).toFixed(1));
            }

            //main table
            i = parseInt($("#bowler_run").text());
            $("#bowler_run").html(i+4);
            i = parseFloat($("#bowler_over").text());
            $("#bowler_over").html((i+0.1).toFixed(1));
            if(((i%1.0)*10) == 5){
                $("#bowler_over").html((i+0.5).toFixed(1));
            }
            else{
                $("#bowler_over").html((i+0.1).toFixed(1));
            }

            //main table batsman
            var i = parseInt($('#main_table_'+striker_batsman+'_run').text());
            $('#main_table_'+striker_batsman+'_run').html(i+4);
            i = parseFloat($('#main_table_'+striker_batsman+'_ball').text());
            $('#main_table_'+striker_batsman+'_ball').html(i+1);
            i = parseFloat($('#main_table_'+striker_batsman+'_four').text());
            $('#main_table_'+striker_batsman+'_four').html(i+1);

            //runs and balls current score
            i = parseInt($("#runs_your_team").text());
            $("#runs_your_team").html(i+4);

            //increase ball count on every ball
            ball_count++;
            if(ball_count%6==0){
                $('#changeBowler').modal('show');
                $('#btn_choose_bowler_modal_okay').click(function(){
                    bowler = $("#bowler_choose").val();
                    $('#bowler_over').html(0);
                    $('#bowler_run').html(0);
                    $('#bowler_wicket').html(0);
                    $('#bowler_maiden').html(0);
                    [striker_batsman, nonstriker_batsman] = [nonstriker_batsman, striker_batsman];
                });
            }

            //check inning end
            checkInning();
        });

        $('#five').click(function(){
            //for batting team table
            var i = parseInt($("#runs_"+ striker_batsman).text());
            $("#runs_"+striker_batsman).html(i+5);
            i = parseFloat($("#balls_"+ striker_batsman).text());
            $("#balls_"+striker_batsman).html(i+1);

            //bowling team table
            i = parseInt($("#runs_"+ bowler).text());
            $("#runs_"+bowler).html(i+5);
            i = parseFloat($("#overs_"+ bowler).text());
            if(((i%1.0)*10) == 5){
                $("#overs_"+bowler).html((i+0.5).toFixed(1));
            }
            else{
                $("#overs_"+bowler).html((i+0.1).toFixed(1));
            }

            //main table
            i = parseInt($("#bowler_run").text());
            $("#bowler_run").html(i+5);
            i = parseFloat($("#bowler_over").text());
            $("#bowler_over").html((i+0.1).toFixed(1));
            if(((i%1.0)*10) == 5){
                $("#bowler_over").html((i+0.5).toFixed(1));
            }
            else{
                $("#bowler_over").html((i+0.1).toFixed(1));
            }

            //main table batsman
            var i = parseInt($('#main_table_'+striker_batsman+'_run').text());
            $('#main_table_'+striker_batsman+'_run').html(i+5);
            i = parseFloat($('#main_table_'+striker_batsman+'_ball').text());
            $('#main_table_'+striker_batsman+'_ball').html(i+1);

            //runs and balls current score
            i = parseInt($("#runs_your_team").text());
            $("#runs_your_team").html(i+5);

            //increase ball count on every ball
            ball_count++;
            if(ball_count%6==0){
                $('#changeBowler').modal('show');
                $('#btn_choose_bowler_modal_okay').click(function(){
                    bowler = $("#bowler_choose").val();
                    $('#bowler_over').html(0);
                    $('#bowler_run').html(0);
                    $('#bowler_wicket').html(0);
                    $('#bowler_maiden').html(0);
                });
                [striker_batsman, nonstriker_batsman] = [nonstriker_batsman, striker_batsman];
            }
            else{
                [striker_batsman, nonstriker_batsman] = [nonstriker_batsman, striker_batsman];
            }

            //check inning end
            checkInning();
        });

        $('#six').click(function(){
            //for batting team table
            var i = parseInt($("#runs_"+ striker_batsman).text());
            $("#runs_"+striker_batsman).html(i+6);
            i = parseFloat($("#balls_"+ striker_batsman).text());
            $("#balls_"+striker_batsman).html(i+1);

            //bowling team table
            i = parseInt($("#runs_"+ bowler).text());
            $("#runs_"+bowler).html(i+6);
            i = parseFloat($("#overs_"+ bowler).text());
            if(((i%1.0)*10) == 5){
                $("#overs_"+bowler).html((i+0.5).toFixed(1));
            }
            else{
                $("#overs_"+bowler).html((i+0.1).toFixed(1));
            }

            //main table
            i = parseInt($("#bowler_run").text());
            $("#bowler_run").html(i+6);
            i = parseFloat($("#bowler_over").text());
            $("#bowler_over").html((i+0.1).toFixed(1));
            if(((i%1.0)*10) == 5){
                $("#bowler_over").html((i+0.5).toFixed(1));
            }
            else{
                $("#bowler_over").html((i+0.1).toFixed(1));
            }

            //main table batsman
            var i = parseInt($('#main_table_'+striker_batsman+'_run').text());
            $('#main_table_'+striker_batsman+'_run').html(i+6);
            i = parseFloat($('#main_table_'+striker_batsman+'_ball').text());
            $('#main_table_'+striker_batsman+'_ball').html(i+1);
            i = parseFloat($('#main_table_'+striker_batsman+'_six').text());
            $('#main_table_'+striker_batsman+'_six').html(i+1);

            //runs and balls current score
            i = parseInt($("#runs_your_team").text());
            $("#runs_your_team").html(i+6);

            //increase ball count on every ball
            ball_count++;
            if(ball_count%6==0){
                $('#changeBowler').modal('show');
                $('#btn_choose_bowler_modal_okay').click(function(){
                    bowler = $("#bowler_choose").val();
                    $('#bowler_over').html(0);
                    $('#bowler_run').html(0);
                    $('#bowler_wicket').html(0);
                    $('#bowler_maiden').html(0);
                });
                [striker_batsman, nonstriker_batsman] = [nonstriker_batsman, striker_batsman];
            }

            //check inning end
            checkInning();
        });

        $('#wicket').click(function(){
            //bowling team table
            i = parseInt($("#wickets_"+ bowler).text());
            $("#wickets_"+bowler).html(i+1);
            i = parseFloat($("#overs_"+ bowler).text());
            if(((i%1.0)*10) == 5){
                $("#overs_"+bowler).html((i+0.5).toFixed(1));
            }
            else{
                $("#overs_"+bowler).html((i+0.1).toFixed(1));
            }

            //main table
            i = parseInt($("#bowler_wicket").text());
            $("#bowler_wicket").html(i+1);
            i = parseFloat($("#bowler_over").text());
            $("#bowler_over").html((i+0.1).toFixed(1));
            if(((i%1.0)*10) == 5){
                $("#bowler_over").html((i+0.5).toFixed(1));
            }
            else{
                $("#bowler_over").html((i+0.1).toFixed(1));
            }

            //runs and balls current score
            i = parseInt($("#wickets_your_team").text());
            $("#wickets_your_team").html(i+1);

            //increase ball count on every ball
            ball_count++;
            if(ball_count%6==0){
                $('#changeBowler').modal('show');
                $('#btn_choose_bowler_modal_okay').click(function(){
                    bowler = $("#bowler_choose").val();
                    $('#bowler_over').html(0);
                    $('#bowler_run').html(0);
                    $('#bowler_wicket').html(0);
                    $('#bowler_maiden').html(0);
                });
            }

            old_striker = striker_batsman;
            alert(old_striker);
            // var old_non_striker = non_striker_batsman;

            //choose another batsman
            $('#changeBatsman').modal('show');
                $('#btn_choose_batsman_modal_okay').click(function(){
                    striker_batsman = $("#batsman_choose").val();
                    //updating main table IDs on fall of wicket
                    $('#main_table_'+old_striker).html(striker_batsman);
                    $('#main_table_'+old_striker).attr('id','main_table_'+striker_batsman);
                    $('#main_table_'+old_striker+'_run').attr('id','main_table_'+striker_batsman+'_run');
                    $('#main_table_'+old_striker+'_ball').attr('id','main_table_'+striker_batsman+'_ball');
                    $('#main_table_'+old_striker+'_four').attr('id','main_table_'+striker_batsman+'_four');
                    $('#main_table_'+old_striker+'_six').attr('id','main_table_'+striker_batsman+'_six');

                    //setting values to 0 after update
                    $('#main_table_'+striker_batsman+'_run').html(0);
                    $('#main_table_'+striker_batsman+'_ball').html(0);
                    $('#main_table_'+striker_batsman+'_four').html(0);
                    $('#main_table_'+striker_batsman+'_six').html(0);

                    //check inning end
                    checkInning();
                });
        });

        $('#noBall').click(function(){
            $('#noBallModal').modal('show');
            $('#btn_no_ball_modal_okay').click(function(){
                    var no_ball_score = parseInt($("#no_ball_score").val());
                    //runs and balls current score
                    var j = parseInt($("#runs_your_team").text());
                    $("#runs_your_team").html(j+no_ball_score+1);

                    //for batting team table
                    j = parseInt($("#runs_"+ striker_batsman).text());
                    $("#runs_"+striker_batsman).html(j+no_ball_score);
                
                    //bowling team table
                    j = parseInt($("#runs_"+ bowler).text());
                    $("#runs_"+bowler).html(j+no_ball_score+1);
                
                    //main table
                    j = parseInt($("#bowler_run").text());
                    $("#bowler_run").html(j+no_ball_score+1);
                
                    //main table batsman
                    var i = parseInt($('#main_table_'+striker_batsman+'_run').text());
                    $('#main_table_'+striker_batsman+'_run').html(i+no_ball_score);

                    //check inning end
                    checkInning();
            });
        });

        $('#B').click(function(){
            $('#BModal').modal('show');
            $('#btn_B_modal_okay').click(function(){
                    var bye_score = parseInt($("#bye_score").val());
                    //runs and balls current score
                    var j = parseInt($("#runs_your_team").text());
                    $("#runs_your_team").html(j+bye_score);
                
                    //bowling team table
                    j = parseInt($("#runs_"+ bowler).text());
                    $("#runs_"+bowler).html(j+bye_score);
                    j = parseFloat($("#overs_"+ bowler).text());
                    if(((j%1.0)*10) == 5){
                        $("#overs_"+bowler).html((j+0.5).toFixed(1));
                    }
                    else{
                        $("#overs_"+bowler).html((j+0.1).toFixed(1));
                    }
                
                    //main table
                    j = parseInt($("#bowler_run").text());
                    $("#bowler_run").html(j+bye_score);
                    j = parseFloat($("#bowler_over").text());
                    $("#bowler_over").html((j+0.1).toFixed(1));
                    if(((j%1.0)*10) == 5){
                        $("#bowler_over").html((j+0.5).toFixed(1));
                    }
                    else{
                        $("#bowler_over").html((j+0.1).toFixed(1));
                    }
                    //main table batsman
                    j = parseFloat($('#main_table_'+striker_batsman+'_ball').text());
                    $('#main_table_'+striker_batsman+'_ball').html(j+1);

                    //for batting team table
                    j = parseFloat($("#balls_"+ striker_batsman).text());
                    $("#balls_"+striker_batsman).html(j+1);

                    //check inning end
                    checkInning();
                    });
        });

        $('#LB').click(function(){
            $('#LBModal').modal('show');
            $('#btn_LB_modal_okay').click(function(){
                    var bye_score = parseInt($("#leg_bye_score").val());
                    //runs and balls current score
                    var j = parseInt($("#runs_your_team").text());
                    $("#runs_your_team").html(j+bye_score);
                
                    //bowling team table
                    j = parseInt($("#runs_"+ bowler).text());
                    $("#runs_"+bowler).html(j+bye_score);
                    j = parseFloat($("#overs_"+ bowler).text());
                    if(((j%1.0)*10) == 5){
                        $("#overs_"+bowler).html((j+0.5).toFixed(1));
                    }
                    else{
                        $("#overs_"+bowler).html((j+0.1).toFixed(1));
                    }
                
                    //main table
                    j = parseInt($("#bowler_run").text());
                    $("#bowler_run").html(j+bye_score);
                    j = parseFloat($("#bowler_over").text());
                    $("#bowler_over").html((j+0.1).toFixed(1));
                    if(((j%1.0)*10) == 5){
                        $("#bowler_over").html((j+0.5).toFixed(1));
                    }
                    else{
                        $("#bowler_over").html((j+0.1).toFixed(1));
                    }
                    //main table batsman
                    j = parseFloat($('#main_table_'+striker_batsman+'_ball').text());
                    $('#main_table_'+striker_batsman+'_ball').html(j+1);

                    //for batting team table
                    j = parseFloat($("#balls_"+ striker_batsman).text());
                    $("#balls_"+striker_batsman).html(j+1);

                    //check inning end
                    checkInning();
                    });
        });

        $('#wide').click(function(){
            $('#wideModal').modal('show');
            $('#btn_wide_ball_modal_okay').click(function(){
                    var no_ball_score = parseInt($("#wide_ball_score").val());
                    //runs and balls current score
                    var j = parseInt($("#runs_your_team").text());
                    $("#runs_your_team").html(j+no_ball_score+1);

                    //for batting team table
                    j = parseInt($("#runs_"+ striker_batsman).text());
                    $("#runs_"+striker_batsman).html(j+no_ball_score);
                
                    //bowling team table
                    j = parseInt($("#runs_"+ bowler).text());
                    $("#runs_"+bowler).html(j+no_ball_score+1);
                
                    //main table
                    j = parseInt($("#bowler_run").text());
                    $("#bowler_run").html(j+no_ball_score+1);
                
                    //main table batsman
                    var i = parseInt($('#main_table_'+striker_batsman+'_run').text());
                    $('#main_table_'+striker_batsman+'_run').html(i+no_ball_score);

                    //check inning end
                    checkInning();
            });
        });

        $('#zero').click(function(){
             //for batting team table
            i = parseFloat($("#balls_"+ striker_batsman).text());
            $("#balls_"+striker_batsman).html(i+1);

            //bowling team table
            i = parseFloat($("#overs_"+ bowler).text());
            if(((i%1.0)*10) == 5){
                $("#overs_"+bowler).html((i+0.5).toFixed(1));
            }
            else{
                $("#overs_"+bowler).html((i+0.1).toFixed(1));
            }

            //main table
            i = parseFloat($("#bowler_over").text());
            $("#bowler_over").html((i+0.1).toFixed(1));
            if(((i%1.0)*10) == 5){
                $("#bowler_over").html((i+0.5).toFixed(1));
            }
            else{
                $("#bowler_over").html((i+0.1).toFixed(1));
            }

            //main table batsman
            i = parseFloat($('#main_table_'+striker_batsman+'_ball').text());
            $('#main_table_'+striker_batsman+'_ball').html(i+1);

            //increase ball count on every ball
            ball_count++;
            if(ball_count%6==0){
                $('#changeBowler').modal('show');
                $('#btn_choose_bowler_modal_okay').click(function(){
                    bowler = $("#bowler_choose").val();
                    $('#bowler_over').html(0);
                    $('#bowler_run').html(0);
                    $('#bowler_wicket').html(0);
                    $('#bowler_maiden').html(0);
                });
                [striker_batsman, nonstriker_batsman] = [nonstriker_batsman, striker_batsman];
            }

            //check inning end
            checkInning();
        });

        function checkInning(){
            //check inning end
            if(ball_count >= total_balls){
                //switch batting and bowling team
                [batting_team, bowling_team]=[bowling_team, batting_team];
                alert("1st inning over");
            }
        }
    });
</script> 