<?php include 'header.php';
include 'db_conn.php'; ?>


<div class="wrapper">
    <form class="form1" method="post" action="teamdetail.php">
        <div class="input-fields">
            <h1>TEAM $ PLAYERS DETAILS</h1>
            <input type="text" name="teamname" class="input" placeholder="Team Name" required>
            <input type="text" name="name1" class="input" placeholder="player Name 1" required>
            <input type="text" name="name2" class="input" placeholder="player Name 2" required>
            <input type="text" name="name3" class="input" placeholder="player Name 3" required>
            <input type="text" name="name4" class="input" placeholder="player Name 4" required>
            <input type="text" name="name5" class="input" placeholder="player Name 5" required>
            <input type="text" name="name6" class="input" placeholder="player Name 6" required>
            <input type="text" name="name7" class="input" placeholder="player Name 7" required>
            <input type="text" name="name8" class="input" placeholder="player Name 8" required>
            <input type="text" name="name9" class="input" placeholder="player Name 9" required>
            <input type="text" name="name10" class="input" placeholder="player Name 10" required>
            <input type="text" name="name11" class="input" placeholder="player Name 11" required>

            <input type="submit" name="submit" value="add">
        </div>
    </form>
</div>
<?php include 'footer.php'; ?>

<?php 
if (isset($_POST['submit'])) {
    extract($_POST);
    $sql = "insert into teamdetails(teamname,player1,player2,player3,player4,player5,player6,player7,player8,player9,player10,player11) values('$teamname','$name1','$name2','$name3','$name4','$name5','$name6','$name7','$name8','$name9','$name10','$name11');";
    mysqli_query($conn, $sql);
}
