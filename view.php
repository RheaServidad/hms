<?php include 'header.php';
include 'conn.php';
if (!isset($_SESSION['logged_in'])) {
    header("location: login.php");
    ob_end_flush();
}
?>
<style>
    body {
        background-image: url("img/kh2.jpg");
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-attachment: fixed;
    }

    .main {
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .main1 {
        height: 470px;
        width: 35%;
        font-family: Tahoma;
        padding: 30px;
        border-radius: 10px;
        background-image: url("img/kh8.jpg");


    }

    p {
        font-size: 17px;
    }

    h5 {
        text-align: center;
    }
</style>

<body>
    <?php $id = $_GET['id'];
    $selectData = $conn->prepare("SELECT * FROM appointment WHERE id = ?");
    $selectData->execute([$id]);
    foreach ($selectData as $data) { ?>
    <?php }
    ?>
    <div class="main">
        <div class="main1">
            <h5>PATIENT INFORMATION</h5>
            <br>
            <p>Name:
                <?= $data['fname'] ?>
                <?= $data['lname'] ?>
            </p>
            <p>Age:
                <?= $data['age'] ?>
            </p>
            <p> Gender:
                <?= $data['gender'] ?>
            </p>
            <p> Contact:
                <?= $data['contact'] ?>
            </p>
            <p> Address:
                <?= $data['address'] ?>
            </p>
            <p> Date:
                <?= $data['date'] ?>
            </p>
            <p> Time:
                <?= $data['time'] ?>
            </p>
            <p> Reason:
                <?= $data['reason'] ?>
            </p>
            <center> <a href="index.php"> <button class="btn btn-primary"><b>Back</b> </button></a> </center>

        </div>
    </div>
</body>