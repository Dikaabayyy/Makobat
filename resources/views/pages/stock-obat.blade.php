<!DOCTYPE html>
<html lang="en">

<head>
  <title>Stok Obat</title>
    @include('layouts.head')
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    @include('layouts.header')
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    @include('layouts.sidebar')
    </aside><!-- End Sidebar-->

  <main id="main" class="main">

    @if (session()-> has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="pagetitle">
      <h1>Stok Obat</h1>
    </div><!-- End Page Title -->

        <button type="button" class="btn b-prnt">
            <i class="bi bi-plus-circle-fill"></i>
            <span class="t-prnt">Create</span>
        </button>

        <input class="form-control int-lbl mt-3" list="datalistOptions" id="exampleDataList" placeholder="Type to search..." style="width: 50%">
        <datalist id="datalistOptions">
            <option value="San Francisco">
            <option value="New York">
            <option value="Seattle">
            <option value="Los Angeles">
            <option value="Chicago">
        </datalist>

        <div class="row">
            <div class="col-3">
                <div class="card card-obat">
                    <img src="user/img/obat.jpg" class="card-img-top img-obat" alt="...">
                    <div class="card-body">
                      <h5 class="card-title pb-0">Chlorothiazide </h5>
                      <p class="card-text">Stok : 50.</p>
                    </div>
                  </div>
            </div>
            <div class="col-3">
                <div class="card card-obat">
                    <img src="user/img/obat.jpg" class="card-img-top img-obat" alt="...">
                    <div class="card-body">
                      <h5 class="card-title pb-0">Chlorthalidone </h5>
                      <p class="card-text">Stok : 75.</p>
                    </div>
                  </div>
            </div>
            <div class="col-3">
                <div class="card card-obat">
                    <img src="user/img/obat.jpg" class="card-img-top img-obat" alt="...">
                    <div class="card-body">
                      <h5 class="card-title pb-0">Hydrochlorothiazide/HCT </h5>
                      <p class="card-text">Stok : 30.</p>
                    </div>
                  </div>
            </div>
            <div class="col-3">
                <div class="card card-obat">
                    <img src="user/img/obat.jpg" class="card-img-top img-obat" alt="...">
                    <div class="card-body">
                      <h5 class="card-title pb-0">Metolazone </h5>
                      <p class="card-text">Stok : 10.</p>
                    </div>
                  </div>
            </div>
            <div class="col-3">
                <div class="card card-obat">
                    <img src="user/img/obat.jpg" class="card-img-top img-obat" alt="...">
                    <div class="card-body">
                      <h5 class="card-title pb-0">Indapamide </h5>
                      <p class="card-text">Stok : 50.</p>
                    </div>
                  </div>
            </div>
            <div class="col-3">
                <div class="card card-obat">
                    <img src="user/img/obat.jpg" class="card-img-top img-obat" alt="...">
                    <div class="card-body">
                      <h5 class="card-title pb-0">Bumetanide </h5>
                      <p class="card-text">Stok : 75.</p>
                    </div>
                  </div>
            </div>
            <div class="col-3">
                <div class="card card-obat">
                    <img src="user/img/obat.jpg" class="card-img-top img-obat" alt="...">
                    <div class="card-body">
                      <h5 class="card-title pb-0">Furosemide </h5>
                      <p class="card-text">Stok : 30.</p>
                    </div>
                  </div>
            </div>
            <div class="col-3">
                <div class="card card-obat">
                    <img src="user/img/obat.jpg" class="card-img-top img-obat" alt="...">
                    <div class="card-body">
                      <h5 class="card-title pb-0">Triamterene </h5>
                      <p class="card-text">Stok : 10.</p>
                    </div>
                  </div>
            </div>

        </div>




  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    @include('layouts.footer')
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="Admin/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Admin/vendor/chart.js/chart.min.js"></script>
  <script src="Admin/vendor/echarts/echarts.min.js"></script>
  <script src="Admin/vendor/quill/quill.min.js"></script>
  <script src="Admin/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="Admin/vendor/tinymce/tinymce.min.js"></script>
  <script src="Admin/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="Admin/js/main.js"></script>

</body>

</html>
