<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard</title>
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

    <section class="section dashboard">

        <div class="row">

            <div class="col-9">
                <div class="card info-card sales-card">
                    <div class="card-body px-0">
                      <h5 class="title-dash">Waktu Minum Obat Pasien yang Belum Terjadwal</h5>

                      <div class="px-2">
                        <div class="d-flex align-items-center">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Nama & UID</th>
                                        <th scope="col">Pengawasan Dokter</th>
                                        <th scope="col">Tanggal Pembuatan Akun</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $d)
                                        <tr>
                                            <th scope="row"><a href="/detail-pasien-{{ $d->slug }}" class="psn_dtl">
                                                {{ $d->name }}
                                            </a><br>
                                                <div class="u_name">
                                                    {{ $d->user->username }}
                                                </div>
                                            </th>
                                            <td>{{ $d->doctor_name }}<br>
                                                <div class="u_name">
                                                    {{ $d->doctor_nip }}
                                                </div>
                                            </td>
                                            <td>
                                                {{ $d->created_at->isoformat('dddd, D MMMM Y') }}
                                            </td>
                                            <td>
                                                <?php
                                                    if ($d['status'] == "0") {
                                                        echo '<div class="u-j">
                                                                <span class="u-jadwal">Belum Terjadwal</span>
                                                            </div>';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                      </div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card clock-card">
                    <img src="user/img/clock.jpg" class="img-fluid card-img-clock" alt="...">
                    <div class="card-img-overlay">
                        <div class="card-body">
                            <h5 class="card-title"><p id="clock"></p></h5>

                            <div class="date-d" style="color: rgb(255, 255, 255)">
                                {{ $day }} <br>
                                {{ $date }}
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                   setInterval(customClock, 500);
                   function customClock() {
                       var time = new Date();
                       var hrs = time.getHours();
                       var min = time.getMinutes();
                       var sec = time.getSeconds();

                       document.getElementById('clock').innerHTML = hrs + ":" + min + ":" + sec;
                   }
                </script>
            </div>
        </div>



        <div class="row">

            <!-- Revenue Card -->
            <div class="col">
              <div class="card info-card revenue-card">

                <div class="card-body px-0">
                  <h5 class="title-dash">Stok Obat Rendah ditangan Pasien</h5>

                  <div class="px-2">
                    <div class="d-flex align-items-center">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Nama & UID</th>
                                <th scope="col">Nama Obat</th>
                                <th scope="col">Tanggal Check-UP</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $d)
                                <tr>
                                    <th scope="row"><a href="/detail-pasien-{{ $d->slug }}" class="psn_dtl">
                                        {{ $d->name }}
                                        </a><br>
                                        <div class="u_name">
                                            {{ $d->username }}
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
                                        <div class="u-j">
                                            <span class="u-jadwal">Belum Terjadwal</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col">

              <div class="card info-card customers-card">

                <div class="card-body px-0">
                    <h5 class="title-dash">Notifikasi Konsultasi Pasien</h5>

                    <div class="px-2">
                        <div class="d-flex align-items-center">
                            <table class="table table-striped">

                                @foreach ($msg as $m)
                                <tr>
                                    <th scope="row">
                                        {{ $m->user->name }}<br>
                                        <div class="u_name">
                                            Message : {{ $m->body  }}
                                        </div>
                                    </th>
                                </tr>
                                @endforeach

                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

          </div>
    </section>
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
