<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <title>About Us</title>
    <style>
body {
  margin: 0;
  font-family: 'Ubuntu', Arial, sans-serif;
  font-size: 16px;
  min-height: 100vh; 
  display: flex;
  flex-direction: column; 
}

      header {
	width: 100%;
	height: 52px;
	background-color: #007c51;
	display: flex;
	justify-content: space-between;
	align-items: flex-start;
}

.logohd {
	font-size: 24px;
	font-weight: bold;
	margin-top: 5px;
	margin-left: 10px;
	color: white;
}

.logohd a{
  text-decoration: none;
  color: white;
}

.menu {
    position: relative;
    display: inline-block;
    text-align: center;
  }
  
  .menu .submenu {
    display: none;
    position: absolute;
    top: 80%; /* Adjust the top position as per your preference */
    left: 50%;
    transform: translateX(-50%);
    background-color: rgba(255, 255, 255, 0.9); 
    min-width: 120px;
    padding: 8px;
    border-radius: 5px;
    z-index: 1;
    overflow: visible; /* Allow content overflow to be visible */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
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
  

nav {
	display: flex;
	gap: 30px;
	align-items: center;
	margin-right: 10px;
	margin-top: 5px;
}

nav a {
	text-decoration: none;
	color: white;
	font-size: 18px;
}

.signup {
	border: 1px solid white;
	border-radius: 5px;
	padding: 5px 10px;
}

.signup::before {
	position: absolute;
	top: -2px;
	left: -2px;
	right: -2px;
	bottom: -2px;
	border: 1px solid white;
}
       .container {
        text-align: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 50px; /* Added padding for spacing */
      }
      .container img {
        height: 371px;
        width: 526px;
        margin-bottom: 0px;
      }

      img {display: block;
  margin-left: auto;
  margin-right: auto;
      
  width: 50%;

        max-width: 100%;
        height: auto;
      }

      h1 {
  font-size: 40px;
  color: #007c51;
  text-align: center;
  margin-top: 5px;
}

p{
 line-height: 1.5rem; 
 margin-bottom: 20px;
}




footer {
  background-color: #007c51;
  height: 235px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: #fff;
  font-size: 18px;
}

footer a {
  color: #fff;
  text-decoration: none;
  margin: 0 10px;
}

footer a:hover {
  text-decoration: underline;
}

footer img {
  max-width: 2000px;
  margin: 0 10px;
}
      .logo {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100px;
}

.logo img {
  height: 80%;
  width: auto;
}
.social {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0 auto;
}

.social img {
  height: 25px; 
  width: 25px;
  margin: 0 auto;
}
.links {
  text-align: center;
  line-height: 1.5;
  margin-top: 0px;
}

.links a {
  display: block;
}

.links img {
  display: block;
  margin: 0 auto;
  max-width: 100%;
  height: auto;
}

    </style>
  </head>
  <body>
    <header>
      <div class="logohd"> <a href="home.php" >eParking Mall </a>
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
    <div class="content"> 
      <div class="container">
        <img  src="./assets/resource/About.svg" alt="About Us">
        <h1 class="titile"> About US  </h1>
       <p> Selamat datang di eParking Mall, destinasi belanja dan hiburan terdepan di kota ini! Sebagai pusat perbelanjaan modern yang menggabungkan kemudahan teknologi dengan kenyamanan konvensional, eParking Mall mempersembahkan pengalaman belanja yang tak tertandingi bagi pengunjung dari segala kalangan.

Dengan inovasi teknologi, eParking Mall menawarkan layanan parkir canggih yang membuat kunjungan Anda menjadi lebih efisien. Melalui sistem parkir otomatis yang terhubung secara digital, Anda dapat dengan mudah menemukan tempat parkir yang tersedia dan melakukan pembayaran tanpa kerumitan. Ini hanya salah satu contoh bagaimana kami memanfaatkan teknologi untuk meningkatkan kenyamanan pengalaman belanja Anda.

Tidak hanya itu, eParking Mall juga menawarkan beragam toko dan merek ternama yang memenuhi segala kebutuhan belanja Anda, mulai dari fashion, kebutuhan rumah tangga, hingga hiburan elektronik terkini. Dengan pilihan yang beragam dan terus diperbarui, Anda pasti akan menemukan sesuatu yang sesuai dengan selera dan gaya hidup Anda di setiap sudut eParking Mall.

Tak hanya menjadi destinasi belanja, eParking Mall juga merupakan tempat bertemunya komunitas lokal. Dengan adanya ruang terbuka yang dirancang untuk mengadakan berbagai acara dan pertemuan, kami berusaha menciptakan lingkungan yang ramah dan inklusif bagi semua pengunjung. Mulai dari konser musik hingga pameran seni lokal, eParking Mall selalu memiliki sesuatu yang menarik untuk dinikmati bersama keluarga dan teman-teman.

Kami, tim eParking Mall, berkomitmen untuk terus memberikan pengalaman belanja yang tak terlupakan bagi setiap pengunjung kami. Dengan fokus pada kualitas, kenyamanan, dan inovasi, kami percaya bahwa eParking Mall akan terus menjadi destinasi favorit bagi mereka yang mencari lebih dari sekadar belanja. Terima kasih telah memilih eParking Mall sebagai bagian dari petualangan belanja dan hiburan Anda. Ayo bergabung dan nikmati pengalaman berbelanja yang tak tertandingi di eParking Mall! </p>
      </div>
    </div>
    
    <footer>
      <div class="container">
        <div class="social">
          <a href="#"><img src="./assets/resource/facebook.svg" alt="Facebook"></a>
          <a href="#"><img src="./assets/resource/Twitter.svg" alt="Twitter"></a>
          
        </div>
        <div class="links">
          <a href="about us.php">About Us</a>
          <a href="contact us.php">Contact Us</a>
          <a href="FAQs.php">FAQs</a>
        </div>
            <div class="logo">
          <a href="#"><img src="./assets/resource/footerlogo.svg" alt="logo"></a>
        </div>
            
      </div>
    </footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $(".menu .account-link").click(function(e) {
    e.preventDefault();
    var $submenu = $(this).closest('.menu').find('.submenu');
    $submenu.slideToggle(200); // Adjust the animation speed as desired
  });
});
</script>
  </body>
</html>