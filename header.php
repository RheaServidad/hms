<?php
ob_start();
session_start();
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<style>
    .icon {
        grid-row: 3/4;
        grid-column: 4/5;
    }

    .rhea {
        margin-left: 605px;
    }

    .avatar {
        width: 7%;
            height: 7%;
            margin-left: 95%;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/m.jpg" style="border-radius: 50%;" width="70" height="70"
                    alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><b>Home</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="client.php"><b>Clients</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php?edit&id"><b>About</b></a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto rhea"> <!-- Added ms-auto class to move the ul to the right -->
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION['logged_in'])) { ?>
                        <div class="dropdown text-end" > <!-- Added text-end class to move the dropdown to the right -->
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="profileDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="avatar" align="right">
                                    <img src="img/pIcon1.jpg" height="100%" width="100%" style="border-radius: 50%; ">
                                </div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="profileDropdown" style="margin-left:78%;">
                                <li>
                                    <a class="dropdown-item" href="profile.php?profile&id=<?= $_SESSION['u_id'] ?>">View
                                        Profile</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="process.php?logout">Logout</a>
                                </li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <a href="login.php" class="nav-link">Login</a>
                    <?php } ?>

                </li>
            </ul>
            </div>
        </div>
    </nav>
</body>

</html>