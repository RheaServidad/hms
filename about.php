<?php include 'header.php';
include 'conn.php';

?>
<style>
    body {
        background-image: url("img/kh5.jpg");
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

    .right {
        height: 90%;
        width: 90%;
        font-family: Tahoma;
        padding: 40px;
    }

    .right p {
        color: grey;
    }

    .img {
        height: 200px;
        width: 200px;
        border-radius: 50%;
        overflow: hidden;
        margin-top: 50px;

    }

    h4 {
        text-align: center;
    }

    .left {
        height: 90%;
        width: 60%;
        font-family: Tahoma;
        padding: 40px;
        font-size: 20px;
    }

    .left p {
        margin-top: 50px;
    }
</style>

<body>
    <div class="main">
        <div class="left">
            <h4>ABOUT US</h4>
            <hr>
            <p>"Welcome to the Hospital Management System a comprehensive solution designed to streamline and optimize
                healthcare operations. This system seamlessly integrates various aspects of hospital management, from
                patient records and appointments to staff scheduling and inventory management. With user-friendly
                interfaces and robust functionalities, it aims to enhance efficiency, reduce errors, and ultimately
                improve the overall healthcare experience."</p>
        </div>
        <div class="right">
            <h4>DEVELOPER</h4>
            <hr>
            <p></p>
            <center>
                <div class="img">
                    <img src="img/profile1.jpg" width="100%" height="100%">
                </div>

                <h5>RHEA MAY M. SERVIDAD </h5><br>
                <p>Email : hms@gmail.com <br>
                    Contact Number : 09630116494</p>
            </center>

        </div>
    </div>
    <center>
        <a href="index.php"> <button class="btn btn-primary"><b>Back</b> </button></a>
    </center>

</body>