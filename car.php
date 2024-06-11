<?php
include("connection.php");
ob_start();
session_start();
if (isset($_SESSION['email'])) {
    $t = "SELECT `id` FROM `customer` WHERE `email` = '{$_SESSION['email']}'";
    $h = mysqli_query($con, $t);
    if ($row = mysqli_fetch_assoc($h)) {
        $customer_id = $row['id'];
        $_SESSION['customer_id'] = $customer_id;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9ff4d293d6.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./script/menu.js"></script>
    <title>eParking Mall</title>
    <link rel="stylesheet" href="./assets/car.css">
    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
        }

        .logo a {
            color: white;
            text-decoration: none;
        }

        .menu {
            position: relative;
            display: inline-block;
            text-align: center;
        }

        .menu .submenu {
            display: none;
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(255, 255, 255, 0.9);
            min-width: 120px;
            padding: 8px;
            border-radius: 5px;
            z-index: 1;
            overflow: visible;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .menu.open .submenu {
            display: block;
        }

        .menu .submenu a {
            display: block;
            padding: 8px 12px;
            text-decoration: none;
            color: #333;
        }

        .menu .submenu-line {
            display: block;
            height: 1px;
            background-color: #ddd;
            margin: 8px 0;
        }

        .menu .submenu a:hover {
            background-color: #ddd;
            color: #007c51;
        }

        .menu a.account-link {
            display: inline-block;
            padding: 4px;
            text-decoration: none;
            color: #333;
        }

        .menu .submenu a:hover,
        .menu .account-link:hover {
            background-color: transparent;
        }

        .customer-id-container {
            text-align: center;
            width: 80%;
            max-width: 150px;
            margin: 0 auto;
            background-color: #007c51;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            margin-top: 20px;
            justify-content: center;
            /* Atur jarak dari header */
        }

        .CarForm {
            width: 90%;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            justify-content: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            width: 33.33%;
        }

        th {
            background-color: #007c51;
            color: white;
        }
    </style>
</head>
<header>
    <?php
    if (isset($_SESSION['email'])) {
        $email = "SELECT * FROM vehicle WHERE customer_id = {$_SESSION['customer_id']}";
        $re = mysqli_query($con, $email);
        if (mysqli_num_rows($re) > 0) {
            echo '<div class="logo"><a href="home.php">eParking Mall</a></div>';
        } else {
            echo '<div class="logo">eParking Mall</div>';
        }
    } else {
        echo '<div class="logo">eParking Mall</div>';
    }
    ?>
    <nav>
        <?php
        if (isset($_SESSION['email'])) {
            $check = "SELECT * FROM vehicle WHERE customer_id = {$_SESSION['customer_id']}";
            $rt = mysqli_query($con, $check);
            if (mysqli_num_rows($rt) > 0) {
                echo '<div class="menu">
                <a href="#" class="account-link"><img src="./assets/resource/Account circle.svg" alt="Account"></a>
                <div class="submenu">
                    <a href="settings.php">Settings</a>
                    <span class="submenu-line"></span>
                    <a href="myres.php">Reservations</a>
                    <span class="submenu-line"></span>
                    <a href="car.php">Add Vehicle</a>
                </div>
            </div>';
                echo '<a href="logout.php"><img style="width:30px; height:30px;" src="./assets/resource/logout.svg" alt="Logout"></a>';
            }
        }
        ?>
    </nav>
</header>

<body>
<?php
if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];
    $ck = "SELECT * FROM vehicle WHERE customer_id = {$customer_id}";
    $rs = mysqli_query($con, $ck);
?>
    <div class="table-container">
        <form class="CarForm">
            <table>
                <thead>
                    <tr>
                        <th>Car Brand</th>
                        <th>Car Model</th>
                        <th>Plate Number</th>
                    </tr>
                </thead>
                <tbody>
<?php
    if (mysqli_num_rows($rs) > 0) {
        $row = mysqli_fetch_assoc($rs);
        $brand = $row['brand'];
        $model = $row['model'];
        $licenseNumber = $row['license_number'];
?>
                    <tr>
                        <td><?php echo htmlspecialchars($brand); ?></td>
                        <td><?php echo htmlspecialchars($model); ?></td>
                        <td><?php echo htmlspecialchars($licenseNumber); ?></td>
                    </tr>
<?php
    }
?>
                </tbody>
            </table>
        </form>
    </div>

    <div class="customer-id-container">
        Customer ID: <?php echo htmlspecialchars($customer_id); ?>
    </div>

    <div class="settings-label">Update Vehicle</div>
    <div class="add-car-form">
        <form action="" method="post">
            <input type="text" name="car_name" placeholder="Car Brand ex: toyota, BMW, etc.." required>
            <input type="text" name="car_model" placeholder="Car Model ex: optra, lanos, etc.." required>
            <input type="text" name="car_num" placeholder="License Number" required>
            <input type="submit" value="Update" name="update">
        </form>
    </div>

<?php
}
?>

</body>

</html>