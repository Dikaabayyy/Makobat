<!DOCTYPE html>
<html lang="en">

<head>
  <title>Daftar Pasien</title>
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
        <h1>Daftar Pasien</h1>
    </div><!-- End Page Title -->

    <button type="button" class="btn b-prnt" onclick="window.print()">
        <i class="bi bi-printer i-prnt"></i>
        <span class="t-prnt">Print</span>
    </button>

    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col" style="width: 20%">Nama & UID</th>
            <th scope="col" style="width: 20%">Nama Obat</th>
            <th scope="col" style="width: 10%">Stock obat</th>
            <th scope="col" style="width: 15%">Pengawasan</th>
            <th scope="col" style="width: 15%">Last Login</th>
            <th scope="col" style="width: 20%">Klasifikasi</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            <tr>
                <th scope="row">
                    <a href="/detail-pasien-{{ $d->slug }}" class="psn_dtl">
                        {{ $d->name }}
                    </a>
                    <div class="u_name">
                        {{ $d->user->username }}
                    </div>
                </th>
                <td>
                    @foreach ( $d->obatTest($d->id) as $obat )
                    <div class="u_name">
                        {{ $obat->nama_obat }}
                    </div>
                    @endforeach
                </td>
                <td>
                    @foreach ( $d->obatTest($d->id) as $obat )
                    <div class="u_name">
                        {{ $obat->jumlah_obat }}
                    </div>
                    @endforeach
                </td>
                <td>
                    {{ $d->doctor_name }}<br>
                    <div class="u_name">
                        {{ $d->doctor_nip }}
                    </div>
                </td>
                <td>
                    {{ $d->created_at->isoformat('dddd, D MMMM Y') }}
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
