<?php include 'header.php'; ?>

<div class="header">
    <?php if (isset($_GET['err'])) {
        echo '<div class="alert alert-danger text-center" style="margin-top:100px;color:white;">Some error occured while entering team!</div>';
    } ?>
    <?php if (isset($_GET['teamsuccess'])) {
        echo '<center><div class="alert alert-danger text-center" style="margin-top:100px;color:white;">Team entered successfully!</div></center>';
    } ?>
    <center><img src="assets/images/animation.gif" alt="" style="width:600px;height:auto;"></center>
</div>
<?php
if (isset($_SESSION['email'])) {
    echo '<div class="side1">
    <a href="teamdetail.php" style="background:#27ae60;">Manage Teams</a>
    <a href="newmatch.php" style="background:#c0392b;">New Match</a>
    <a href="#" style="background:#2c3e50;">Resume Match</a>
    <a href="#" style="background:#2980b9;">History</a>
</div>';
}

?>


<?php include 'footer.php'; ?> 