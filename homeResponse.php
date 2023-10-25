<!DOCTYPE html>
<html lang="en">
<?php 
include('db.php'); 
include('session.php'); 

if (isset($_SESSION['username'])) {
    $result = mysqli_query($conn,"select * from account where username='".$_SESSION['username']."'");
    $row = mysqli_fetch_array($result);
}
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Smart Emergency Response System(Smart Emergency Response System) - Response</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="homeuser.php">Smart Emergency Response System</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#form">Emergency</a></li>
          <li><a class="getstarted scrollto" href="logout.php">Log Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>Welcome <?php echo $_SESSION['username'];?></h1>
        </div>
      </div>
      <div class="text-center">
        <a href="#about" class="btn-get-started scrollto">Emergency</a>
      </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

      <!-- ======= table Section ======= -->
      <section id="form" class="appointment section-bg">
      <div class="container">
        <div class="section-title">
          <h2>List of Emergency</h2>
          <p>List of Emergency from User</p>
        </div>
        <body>
          <?php
              include_once('db.php');
              $query=
              "SELECT * FROM emergency WHERE status='pending'";
              $result= mysqli_query($conn, $query);
          ?>  
          <table>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Phone</th>
              <th>Emergency</th>
              <th>Send</th>
            </tr>
            <?php
              while($row=mysqli_fetch_assoc($result))
              {
            ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td><?php echo $row['emergency'] ?></td>
                <td>
                  <form action="update-response.php" <?php echo $row['id']; ?> method="POST">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                      <input type="submit" class="btn btn-sm" name="submit" value="Send Help?">
                  </form>
                </td>
            </tr>
            <?php  
            }
            ?>
          </table>
      </body>
      </div>
    </section><!-- End table Section -->
          <!-- ======= table Section ======= -->
          <section id="form" class="appointment section-bg">
      <div class="container">
        <div class="section-title">
          <h2>In-Progress Emergency</h2>
          <p>List of In-Progress Emergency</p>
        </div>
        <body>
          <?php
              include_once('db.php');
              $query=
              "SELECT * FROM emergency WHERE status='Help on the Way!'";
              $result= mysqli_query($conn, $query);
          ?>  
          <table>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Phone</th>
              <th>Emergency</th>
              <th>Finish?</th>
            </tr>
            <?php
              while($row=mysqli_fetch_assoc($result))
              {
            ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td><?php echo $row['emergency'] ?></td>
                <td>
                  <form action="finish.php" <?php echo $row['id']; ?> method="POST">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                      <input type="submit" class="btn btn-sm" name="submit" value="Completed?">
                  </form>
                </td>
            </tr>
            <?php  
            }
            ?>
          </table>
      </body>
      </div>
    </section><!-- End table Section -->   
              <!-- ======= table Section ======= -->
              <section id="form" class="appointment section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Finished</h2>
          <p>Finished Response</p>
        </div>
        <body>
          <?php
              include_once('db.php');
              $query=
              "SELECT * FROM emergency WHERE status='Completed!'";
              $result= mysqli_query($conn, $query);
          ?>  
          <table>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Phone</th>
              <th>Emergency</th>
              <th>Delete?</th>
            </tr>
            <?php
              while($row=mysqli_fetch_assoc($result))
              {
            ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td><?php echo $row['emergency'] ?></td>
                <td><a href="delete-emergency.php?id=<?php echo $row["id"]; ?>">DELETE</a></td>
            </tr>
            <?php  
            }
            ?>
          </table>
      </body>
      </div>
    </section><!-- End table Section -->  
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Smart Emergency Response System</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">Smart Emergency Response System</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>