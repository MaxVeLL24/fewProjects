<?php
require_once 'autoloader.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>"JSC Korostenskiy Open-pit"</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Jura" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background: url("img/footer_lodyas.png");
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="main col-md-12">
    <div class="sub-main">
        <?php require_once 'header.php' ?>
        <?php
        date_default_timezone_set('Europe/Kiev');
        if (!$_POST) {
            require_once 'work_background.php';
        } else if (!empty($_POST)) {
            $db = new DB();
            if (isset($_POST['detailId'])) {
                if ($_POST['Give']) {
                    $operation = $db->operation("INSERT INTO `DetailsAccounting`(`detail_id`, `operation`, `count`, `taker`, `giver`, `operation_time`) VALUES ('{$_POST['detailId']}','{$_POST['Give']}','{$_POST['DetailsCount']}','{$_POST['taker']}','{$_POST['giver']}',CURRENT_TIMESTAMP)");
                    $balanceCheck = $db->find("SELECT `countOnBalance` FROM `DetailsBalance` WHERE `detail_id`='{$_POST['detailId']}'")->fetch_assoc();
                    $balanceChange = $balanceCheck['countOnBalance'] - $_POST['DetailsCount'];
                    $balanceUpdate = $db->operation("UPDATE `DetailsBalance` SET `countOnBalance`='$balanceChange',`LastUpdateTime`=CURRENT_TIMESTAMP WHERE `detail_id`='{$_POST['detailId']}'");
                    if (!$balanceUpdate === false) {
                        require_once 'operations/operation_success.php';
                    } else if ($balanceUpdate === false) {
                        require_once 'operations/operation_error.php';
                    }
                }
                if ($_POST['Take']) {
                    $operation = $db->operation("INSERT INTO `DetailsAccounting`(`detail_id`, `operation`, `count`, `taker`, `giver`, `operation_time`) VALUES ('{$_POST['detailId']}','{$_POST['Take']}','{$_POST['DetailsCount']}','{$_POST['taker']}','{$_POST['giver']}',CURRENT_TIMESTAMP)");
                    $balanceCheck = $db->find("SELECT `countOnBalance` FROM `DetailsBalance` WHERE `detail_id`='{$_POST['detailId']}'")->fetch_assoc();
                    $balanceChange = $balanceCheck['countOnBalance'] + $_POST['DetailsCount'];
                    $balanceUpdate = $db->operation("UPDATE `DetailsBalance` SET `countOnBalance`='$balanceChange',`LastUpdateTime`=CURRENT_TIMESTAMP WHERE `detail_id`='{$_POST['detailId']}'");
                    if (!$balanceUpdate === false) {
                        require_once 'operations/operation_success.php';
                    } else if ($balanceUpdate === false) {
                        require_once 'operations/operation_error.php';
                    }
                }
            }
            if (isset($_POST['pmmId'])) {
                if ($_POST['Give']) {
                    $operation = $db->operation("INSERT INTO `pmmAccounting`(`pmm_id`, `operation`, `count`, `taker`, `giver`, `operationTime`) VALUES ('{$_POST['pmmId']}','{$_POST['Give']}','{$_POST['pmmCount']}','{$_POST['taker']}','{$_POST['giver']}',CURRENT_TIMESTAMP)");
                    $balanceCheck = $db->find("SELECT `countOnBalance` FROM `pmmBalance` WHERE `pmm_id`='{$_POST['pmmId']}'")->fetch_assoc();
                    $balanceChange = $balanceCheck['countOnBalance'] - $_POST['pmmCount'];
                    $balanceUpdate = $db->operation("UPDATE `pmmBalance` SET `countOnBalance`='$balanceChange',`LastUpdateTime`=CURRENT_TIMESTAMP WHERE `pmm_id`='{$_POST['pmmId']}'");
                    if (!$balanceUpdate === false) {
                        require_once 'operations/operation_success.php';
                    } else if ($balanceUpdate === false) {
                        require_once 'operations/operation_error.php';
                    }
                }
                if ($_POST['Take']) {
                    $operation = $db->operation("INSERT INTO `pmmAccounting`(`pmm_id`, `operation`, `count`, `taker`, `giver`, `operationTime`) VALUES ('{$_POST['pmmId']}','{$_POST['Take']}','{$_POST['pmmCount']}','{$_POST['taker']}','{$_POST['giver']}',CURRENT_TIMESTAMP)");
                    $balanceCheck = $db->find("SELECT `countOnBalance` FROM `pmmBalance` WHERE `pmm_id`='{$_POST['pmmId']}'")->fetch_assoc();
                    $balanceChange = $balanceCheck['countOnBalance'] + $_POST['pmmCount'];
                    $balanceUpdate = $db->operation("UPDATE `pmmBalance` SET `countOnBalance`='$balanceChange',`LastUpdateTime`=CURRENT_TIMESTAMP WHERE `pmm_id`='{$_POST['pmmId']}'");
                    if (!$balanceUpdate === false) {
                        require_once 'operations/operation_success.php';
                    } else if ($balanceUpdate === false) {
                        require_once 'operations/operation_error.php';
                    }
                }
            }
            if (isset($_POST['detailsLogin']) && isset($_POST['detailsPassword'])) {
                $result = $db->login("SELECT * FROM `users` WHERE `login`='{$_POST['detailsLogin']}' AND `password`='{$_POST['detailsPassword']}'")->fetch_assoc();
                if ($result['access'] == 'all' or $result['access'] == 'details') {
                    require_once 'operations/details_op.php';
                } else {
                    require_once 'wrong_way.php';
                }
            } else if (isset($_POST['pmmLogin']) && isset($_POST['pmmPassword'])) {
                $result = $db->login("SELECT * FROM `users` WHERE `login`='{$_POST['pmmLogin']}' AND `password`='{$_POST['pmmPassword']}'")->fetch_assoc();
                if ($result['access'] == 'all' or $result['access'] == 'pmm') {
                    require_once 'operations/pmm_operations.php';
                } else {
                    require_once 'wrong_way.php';
                }

            }  else if (isset($_POST['balanceLogin']) && isset($_POST['balancePassword'])) {
                $result = $db->login("SELECT * FROM `users` WHERE `login`='{$_POST['balanceLogin']}' AND `password`='{$_POST['balancePassword']}'")->fetch_assoc();
                if ($result['access'] == 'all') {
                    require_once 'operations/balance.php';
                } else {
                    require_once 'wrong_way.php';
                }
            }
        } else {
            require_once 'login_error.php';
        }
        ?>
        <?php require_once 'footer.php' ?>
    </div>
</div>


<script src="js/script.js"></script>
</body>
</html>
