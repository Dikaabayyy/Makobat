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
            <i class="bi bi-printer i-prnt"></i>
            <span class="t-prnt">Print</span>
        </button>

        <button type="button" class="btn b-prnt">
            <i class="bi bi-printer i-prnt"></i>
            <span class="t-prnt">Print</span>
        </button>

        <table class="table table-striped" style="width: 100%">
            <thead>
                <tr>
                    <th scope="col" style="width: 5%">
                        <div class="form-check">
                            <input class="form-check-input mx-auto" type="checkbox" value="" id="flexCheckDisable" disabled>
                        </div>
                    </th>
                    <th scope="col" style="width: 30%">Nama Obat</th>
                    <th scope="col" style="width: 20%">Stok Obat</th>
                    <th scope="col" style="width: 20%">Dibawah Pengawasan</th>
                    <th scope="col" style="width: 20%">Klasifikasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input mx-auto" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                    </td>
                        <td>
                            <a href="/detail-pasien-{{ $d->slug }}" class="psn_dtl">
                                {{ $d->name }}
                            </a>
                        </td>
                        <td>
                            <div class="u-j">
                                <span class="u-jadwal">Belum Terjadwal</span>
                            </div>
                        </td>
                        <td>
                            {{ $d->doctor_name }}
                        </td>
                        <td>
                            {!! $d->classification($d->klasifikasi) !!}
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>

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
