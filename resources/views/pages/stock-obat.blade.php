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

    <button type="button" class="btn btn-int" data-bs-toggle="modal" data-bs-target="#addObat">
        Add Data
    </button>

    <div class="modal fade" id="addObat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-l">
            <div class="modal-content modal-input">
                <div class="modal-header modal-head">
                    <h1 class="modal-title" id="addDataLabel">Input Data Obat</h1>
                </div>
                <form action="/add-dataobat" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body modal-bd">
                        <div class="card-addData">
                            <div class="card-body-data">

                                <div class="mb-3 row">
                                    <label for="inputname" class="col-sm-4 col-form-label">Nama Obat</label>
                                    <div class="align-items-end col-sm-7">
                                        <input type="name" class="form-control int-lbl" id="kl" name="nama_obat" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="inputname" class="col-sm-4 col-form-label">Jumlah Stock Obat</label>
                                    <div class="align-items-end col-sm-7">
                                        <input type="name" class="form-control int-lbl" id="kr" oninput="numberOnly(this.id);" name="stock_obat" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="inputname" class="col-sm-4 col-form-label">Gambar Obat</label>
                                    <div class="align-items-end col-sm-7">
                                        <input type="file" class="form-control int-lbl" name="gambar" placeholder="yes">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer modal-foot mb-3">
                        <button type="submit " class="btn btn-int">Save</button>
                </form>
                        <button type="button" class="btn btn-dcl" data-bs-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>

        <input class="form-control int-lbl mt-3" id="searchbar" onkeyup="search_obat()" type="text" name="search" placeholder="Cari Data Obat.." style="width: 50%">

        <div class="row">

            @foreach ($data as $d)

                <div class="col-3 nama_obat" id="list_obat">
                    <div class="card card-obat">
                        <img src="{{asset('public/ObatPic/'.$d->gambar) }}" class="card-img-top img-obat" alt="...">
                        <div class="card-body">
                        <h5 class="card-title pb-0" >{{ $d->nama_obat }} </h5>
                        <p class="card-text">Stok : {{ $d->stock_obat }}</p>
                        </div>
                    </div>
                </div>

            @endforeach

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
