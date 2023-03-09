<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Error 403 - Forbidden</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="<?php echo asset('/Admin')?>">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="Admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="Admin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="Admin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="Admin/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="Admin/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="Admin/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="Admin/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="Admin/css/style.css" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h2>Error 403 : Access is denied</h2>
        <img src="user/img/logo.png" class="img-fluid py-5" alt="Page Not Found">
        <form action="/logout" method="post">
            @csrf
          <button type="submit " class="btn btn-danger">Logout</button>
          </form>
      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
