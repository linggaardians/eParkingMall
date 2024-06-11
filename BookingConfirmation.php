<?php
include("connection.php");
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/BookingConfirmation.css">
    <style>
        .logo a {
            color: white;
            text-decoration: none;
        }
        </style>
  </head>
  <body>
    <header>
        <div class="logo"><a href="home.php" >eParking Mall </a>
      </div>
      <nav>
    <?php
    if (isset($_SESSION['email'])) {
        echo '<div class="menu">
                <a href="#" class="account-link"><img style="width:30px; height:30px;" src="./assets/resource/Account circle.svg" alt="Account"></a>
                <div class="submenu">
                    <a href="settings.php">Settings</a>
                    <span class="submenu-line"></span>
                    <a href="myres.php">Reservations</a>
                    <span class="submenu-line"></span>
                    <a href="car.php">Add Vehicle</a>
                </div>
            </div>';
        echo '<a href="logout.php"><img style="width:30px; height:30px;" src="./assets/resource/logout.svg" alt="Logout"></a>';
    } else {
        echo '<a href="signup&in.php" class="signin">Sign In</a>';
        echo '<a href="signup&in.php" class="signup">Sign Up</a>';
    }
    ?>
</nav>
      </header>
      <div class="menu-icons-container">
     </div>
    </header>
    <div class="center">
      <img src="./assets/resource/Confirm1.svg" alt="Booking Confirmation">
    </div>
    <p class="center bold">Your Booking Number is:</p>
    <p class="center unique" id="booking-number">
    <?php
$sql = "SELECT `booking_number` FROM `reservation` WHERE `customer_id` = '{$_SESSION['customer_id']}' AND `status` = 'pending'";
$result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
  echo '<div style="text-align: center;">';
  echo '<p style="color: #00A3FF; font-size: 20px; font-weight: bold;">' . $row['booking_number'] . '</p>';
  echo '<a href="home.php" style="color: #00a3ff; text-decoration: underline; font-size: 20px; font-weight:bold;">Home</a>';
  echo '</div>';
?>

<?php
if ($_SESSION['type'] === "hourly") {
    echo '<p class="center bold">Notes:</p>';
    echo '<p id="notes" class="center">Saat Sudah Sampai di Mall. Temui petugas khusus eParkingMall</p>';
    echo '<p id="notes" class="center">Dia akan mengarahkan Anda ke sheet khusus pengguna eParkingMall.</p>';
    echo '<p id="notes" class="center">Jika anda telat dari durasi, booking Anda akan otomatis di cancel</p>';
} else {
  echo '<p id="notes" class="center">Saat Sudah Sampai di Mall. Temui petugas khusus eParkingMall</p>';
  echo '<p id="notes" class="center">Mohon dicatat bahwa nomor pemesanan yang terkait dengan pemesanan Anda saat ini harus diperiksa sebelum membuat pemesanan baru</p>';
}
?>


    
    
  </body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="./script/menu.js"></script>
</html>