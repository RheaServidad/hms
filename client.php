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
</style>
<!--display-->
<hr>
<div class="row mt-4 justify-content-center">
    <div class="col-sm-10">
        <!--search-->
        <div class="container mt-4" align="right">
            <form class="d-flex w-50" role="search" method="post">
                <input class="form-control me-2" type="search" name="search" placeholder="Search for Something"
                    aria-label="Search">
                <button class="btn btn-outline-primary active" name="submit">Search</button>
            </form>
        </div>

        <div class="table" id="appointmentTable">
            <table class="table shadow p-2">
                <thead>
                    <th>No.</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Age</th>
                    <th>Disease</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $userID = $_SESSION['u_id'];
                    $cnt = 1;

                    // Check if the search form is submitted
                    if (isset($_POST['submit'])) {
                        $search = $_POST['search'];
                        $select = $conn->prepare("SELECT * FROM appointment WHERE user_id = ? AND (fname LIKE ? OR lname LIKE ? OR age LIKE ? OR gender LIKE ? OR reason LIKE ?)");
                        $select->execute([$userID, "%$search%", "%$search%", "%$search%", "%$search%", "%$search%"]);
                    } else {
                        $select = $conn->prepare("SELECT * FROM appointment WHERE user_id = ?");
                        $select->execute([$userID]);
                    }

                    foreach ($select as $value) { ?>
                        <tr>
                            <td>
                                <?= $cnt++ ?>
                            </td>
                            <td>
                                <?= $value['fname'] ?>
                            </td>
                            <td>
                                <?= $value['lname'] ?>
                            </td>
                            <td>
                                <?= $value['age'] ?>
                            </td>
                            <td>
                                <?= $value['reason'] ?>
                            </td>
                            <td>
                                <a href="view.php?view&id=<?= $value['id'] ?>" class="text-decoration-none">👁‍🗨</a> |
                                <a href="index.php?edit&id=<?= $value['id'] ?>" class="text-decoration-none">✏️</a>
                                <a href="process.php?delete&id=<?= $value['id'] ?>" class="text-decoration-none">❌</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


</body>

</html>