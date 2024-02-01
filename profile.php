<?php include 'header.php';
include 'conn.php';
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

?>
<style>
    body {
        background-image: url("img/kh.jpg");
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-attachment: fixed;
    }

    .main3 {
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;

    }

    .main5 {
        height: 100%;
        width: 40%;
        font-family: Tahoma;
        padding: 50px;
        font-family: Segoe UI;
    }

    .card-title {
        padding: 10px;
    }

    h4 {
        padding: 15px;
    }
</style>

<div class="main3">
    <div class="main5">
        <?php

        if (isset($_GET['profile'])) {
            $id = $_GET['id'];
            $selectData = $conn->prepare("SELECT * FROM users WHERE u_id = ?");
            $selectData->execute([$id]);

            foreach ($selectData as $data) { ?>
                <center>
                    <div class="card-body">
                        <h4 class="card-title"><b>INFORMATION</b></h4>
                </center>
                <h6>Name:
                    <?= $data['u_fname'] ?>
                    <?= $data['u_lname'] ?>
                </h6> <br>
                <h6>Email:
                    <?= $data['u_email'] ?>
                </h6> <br>
                <div class="row mb-3">

                </div>
                <center>
                    <a href="profile.php?EditProfile&id=<?= $_SESSION['u_id'] ?>" class="btn btn-primary"><b>Edit
                            Profile</b></a>
                </center>
            </div>

        <?php }
        } ?>


    <?php
    if (isset($_GET['EditProfile'])) {

        $id = $_GET['id'];
        $selectData = $conn->prepare("SELECT * FROM users WHERE u_id = ?");
        $selectData->execute([$id]);

        foreach ($selectData as $data) {
            ?>
            <form method="POST" action="process.php">
                <input type="hidden" name="user_id" value="<?= $_SESSION['u_id'] ?>">

                <center>
                    <h4><b>INFORMATION</b></h4>
                </center>
                <div class="row mb-3">
                    <label for="fname" class="col-sm-4 col-form-label">First Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="fname" name="f_name" required
                            value="<?= $data['u_fname'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lname" class="col-sm-4 col-form-label">Last Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lname" name="l_name" required
                            value="<?= $data['u_lname'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" required
                            value="<?= $data['u_email'] ?>">
                    </div>
                    <a href="profile.php?ResetPassword&id=<?= $_SESSION['u_id'] ?>" class=""><b>Forgot
                        Password</b></a>

                </div>
                <center>
                    <button type="submit" class="btn btn-primary" name="updateP"><b>Update</b></button>
                </center>
            </form>
        </div>

    <?php }

    } ?>


<?php
if (isset($_GET['ResetPassword'])) {
    $id = $_GET['id'];
    $selectData = $conn->prepare("SELECT * FROM users WHERE u_id = ?");
    $selectData->execute([$id]);

    foreach ($selectData as $data) {
        ?>
        <form method="POST" action="process.php">
            <center>
                <h4><b> Password Account Reset</b></h4>
            </center>
            <p>We heard that you lost your Password Account. <br>
                Sorry about that! <br> <br>
            But don't worry! You can use the following button to reset your password: </p>

            <center><a href="profile.php?ChangePassword&id=<?= $_SESSION['u_id'] ?>" class="btn btn-success">Reset
                        Password</a></center>      


            <?php
    }
}
?>

         

<?php
if (isset($_GET['ChangePassword'])) {
    $id = $_GET['id'];
    $selectData = $conn->prepare("SELECT * FROM users WHERE u_id = ?");
    $selectData->execute([$id]);

    foreach ($selectData as $data) {
        ?>
        <form method="POST" action="process.php">
            <center>
                <h4><b>SECURITY</b></h4>
            </center>
            <input type="hidden" name="user_id" value="<?= $data['u_id'] ?>">
            <div class="row mb-3">
                <label for="New_password" class="col-sm-4 col-form-label">New Password</label>
                <input type="password" class="form-control" id="New_password" name="New_password" required>
            </div>
            <div class="row mb-3">
                <label for="Confirm_password" class="col-sm-4 col-form-label">Confirm Password</label>
                <input type="password" class="form-control" id="Confirm_password" name="Confirm_password" required>
            </div>
            <center>
                <button type="submit" name="change_password" class="btn btn-primary"><b>Change Password</b></button>
            </center>
        </form>
        <?php
    }
}
?>