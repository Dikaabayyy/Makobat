<!DOCTYPE html>
<html lang="en">

<head>
  <title>Detail Pasien</title>
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

    <div class="row row-profile">
        <div class="col-3 mb-4" style="text-align: center">
            <img src="{{ asset('public/ImageUser/'.auth()->user()->avatar) }}" alt="Profile" class="rounded-circle pic-pasien">
        </div>
        <div class="col-9">
            @foreach ($data as $d)
                <h4>
                    {{ $d->name }}
                </h4>
                <label class="id_p">
                    {{ $d->user->username }} / UID
                </label><br>
            @endforeach
            <a href="/edit-data-pasien-{slug}" type="button" class="btn btn-int">
                Edit Data
            </a>
        </div>
    </div>

    <div class="card-detail">
        <div class="card-hdetail">
            <ul class="nav nav-tabs">
                <li class="nav-ditem">
                    <button class="nav-link {{ Route::currentRouteName() == 'pasien' ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#profile-overview">Data Diri</button>
                </li>
                <li class="nav-ditem">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-riwayat">Riwayat Medik</button>
                </li>
                <li class="nav-ditem">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-log-lab">Log Laboratorium</button>
                </li>
                <li class="nav-ditem">
                    <button class="nav-link {{ Route::currentRouteName() == 'set-timer' ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#profile-time-medic">Waktu Konsumsi Obat</button>
                </li>
                <li class="nav-ditem">
                    <button class="nav-link {{ Route::currentRouteName() == 'keluhan-pasien' ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#profile-drp">DRP</button>
                </li>
            </ul>
        </div>

        <div class="card-bdetail">

            <div class="tab-content pt-2">
                <div class="tab-pane fade show {{ Route::currentRouteName() == 'pasien' ? 'active' : '' }} profile-overview pt-3" id="profile-overview">
                    <div class="row">
                        <div class="col">

                            <h4 class="card-htitle">Informasi Pasien</h4>

                                @foreach ($data as $d)
                                    <h5 class="header-dpasien">Nomor Induk Kewarganegaraan</h5>
                                    <span class="dpasien">
                                        {{ $d->nik }}
                                    </span>

                                    <h5 class="header-dpasien">Nama Lengkap</h5>
                                    <span class="dpasien">
                                        {{ $d->name }}
                                    </span>

                                    <h5 class="header-dpasien">Tanggal Lahir</h5>
                                    <span class="dpasien">
                                        {{ $d->tgl_lahir }}
                                    </span>

                                    <h5 class="header-dpasien">Gender</h5>
                                    <span class="dpasien">
                                        {{ $d->gender }}
                                    </span>

                                    <h5 class="header-dpasien">Emergency Contact</h5>
                                    <span class="dpasien">
                                        {{ $d->user->phone_number }}
                                    </span>

                                    <h5 class="header-dpasien">Helper</h5>
                                    <span class="dpasien">
                                        {{ $d->user->phone_number }}
                                    </span>
                                @endforeach
                            </div>

                            <div class="col">
                                <br><h4 class="card-htitle">Detail Obat Pasien</h4>
                                <h5>
                                    Estimasi Obat Habis :
                                </h5>

                                    <div class="d-flex align-items-center">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Nama Obat</th>
                                                    <th scope="col">Stok Pada Pasien</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($obat as $o)
                                                    <tr>
                                                        <th scope="row">
                                                            {{ $o->nama_obat}}
                                                        </th>
                                                        <td>
                                                            {{ $o->jumlah_obat }}
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                    <br><br><h4 class="card-htitle">Schedule Terdekat</h4>

                                    <h5>
                                        Tanggal Bertemu :
                                        @foreach ($data as $d)


                                        @if ($d->status == '0' )

                                            <form action="/add-schedule" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="slug" value="{{ $d->slug }}">
                                                <input type="hidden" name="status" value="1">
                                                <div class="align-items-end mt-3">
                                                    <input name="schedule" type="text" class="form-control int-lbl" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                                                </div>
                                                <button type="submit" class="btn btn-int mt-3">Add Schedule</button>
                                            </form>

                                        @else
                                            @foreach ($sch as $s)
                                                {{ $s->schedule }}
                                                <a href="" type="button" class="delAcc" data-bs-toggle="modal" data-bs-target="#deleteMed">Delete Data</a>
                                            @endforeach
                                        @endif
                                        @endforeach
                                    </h5>

                                    <div class="modal fade" id="deleteMed" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="dellApolabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="dellApolabel">Delete Account</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="/delete-schedule" method="post" enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" name="slug" value="{{ $d->slug }}">
                                                @foreach ($sch as $s)
                                                <input type="hidden" name="id" value="{{ $s->id }}">
                                                @endforeach
                                                <div class="modal-body">
                                                    Are you sure you want to delete this Schedule?
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-danger" type="submit">Delete Schedule</button>
                                            </form>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                          </div>
                                        </div>
                                    </div>


                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade profile-edit pt-3" id="profile-riwayat">
                        <h4 class="card-htitle">Riwayat Medik Pasien</h4>

                        @foreach ($data as $d)
                        <h5 class="header-dpasien">Berat Badan</h5>
                        <span class="dpasien">
                            {{ $d->bb }} Kg
                        </span>

                        <h5 class="header-dpasien">Tinggi Badan</h5>
                        <span class="dpasien">
                            {{ $d->tb }} cm
                        </span>

                        <h5 class="header-dpasien">Tekanan Darah</h5>
                        <span class="dpasien">
                            {{ $d->td_tds }} /  {{ $d->td_tdd }} mmHg
                        </span>

                        <h5 class="header-dpasien">Heart Rate</h5>
                        <span class="dpasien">
                            {{ $d->h_rate }}
                        </span>

                        <h5 class="header-dpasien">History Life</h5>
                        <div class="row">
                            <div class="col-1">
                                Merokok <br>
                                Diet <br>
                                Alkohol
                            </div>
                            <div class="col">
                                {!! $d->cigarettes($d->cigarettes) !!} <br>
                                {!! $d->diet($d->diet) !!} <br>
                                {!! $d->alcohol($d->alcohol) !!}
                            </div>
                        </div>
                    @endforeach

                    </div>
                    <div class="tab-pane fade pt-3" id="profile-log-lab">
                        <h4 class="card-htitle">Log Laboratorium Pasien</h4>

                        <div class="d-flex align-items-center">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Kolesterol</th>
                                    <th scope="col">Kreatinin</th>
                                    <th scope="col">Gula Darah Puasa</th>
                                    <th scope="col">Gula Darah Sewaktu</th>
                                    <th scope="col">Gula Darah 2 jam PP</th>
                                    <th scope="col">hbA1c</th>
                                    <th scope="col">Log Data</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach ($lab as $l)
                                    <tr>
                                        <td scope="row">
                                            {{ $l->kolesterol}} mg/dl
                                        </td>
                                        <td>
                                            {{ $l->kreatinin }} µmol/L
                                        </td>
                                        <td>
                                            {{ $l->gd_puasa }} mmol/L
                                        </td>
                                        <td>
                                            {{ $l->gd_sewaktu }} mg/dL
                                        </td>
                                        <td>
                                            {{ $l->gd_2jam_pp }} mg/dL
                                        </td>
                                        <td>
                                            {{ $l->hbA1c }} %
                                        </td>
                                        <td>
                                            {{ $l->created_at->isoformat('dddd, D MMMM Y') }}
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <button type="button" class="btn btn-int" data-bs-toggle="modal" data-bs-target="#addDataLab">
                            Add Data
                        </button>

                        <div class="modal fade" id="addDataLab" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content modal-input">
                                <div class="modal-header modal-head">
                                  <h1 class="modal-title" id="addDataLabel">Log Laboratorium</h1>
                                </div>
                                <form action="/submit-datalab" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body modal-bd">
                                        <div class="card-addData">
                                            <div class="card-body-data">

                                                @foreach ($data as $d)
                                                    <input type="hidden" name="slug" value="{{ $d->slug }}">
                                                @endforeach

                                                <div class="mb-3 row">
                                                    <label for="inputname" class="col-sm-5 col-form-label">Kolesterol</label>
                                                    <div class="align-items-end col-sm-4">
                                                      <input type="name" class="form-control int-lbl" id="kl" oninput="numberOnly(this.id);" name="kolesterol" required>
                                                    </div>
                                                    <label for="inputname" class="col-sm-3 col-form-label">mg/dl</label>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="inputname" class="col-sm-5 col-form-label">Kreatinin</label>
                                                    <div class="align-items-end col-sm-4">
                                                      <input type="name" class="form-control int-lbl" id="kr" oninput="numberOnly(this.id);" name="kreatinin" required>
                                                    </div>
                                                    <label for="inputname" class="col-sm-3 col-form-label">µmol/L</label>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="inputname" class="col-sm-5 col-form-label">Gula Darah Puasa</label>
                                                    <div class="align-items-end col-sm-4">
                                                      <input type="name" class="form-control int-lbl" id="gdp" oninput="numberOnly(this.id);" name="gd_puasa" required>
                                                    </div>
                                                    <label for="inputname" class="col-sm-3 col-form-label">mmol/L</label>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="inputname" class="col-sm-5 col-form-label">Gula Darah Sewaktu</label>
                                                    <div class="align-items-end col-sm-4">
                                                      <input type="name" class="form-control int-lbl" id="gds" oninput="numberOnly(this.id);" name="gd_sewaktu" required>
                                                    </div>
                                                    <label for="inputname" class="col-sm-3 col-form-label">mg/dL</label>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="inputname" class="col-sm-5 col-form-label">Gula Darah 2 jam PP</label>
                                                    <div class="align-items-end col-sm-4">
                                                      <input type="name" class="form-control int-lbl" id="gdpp" oninput="numberOnly(this.id);" name="gd_2jam_pp" required>
                                                    </div>
                                                    <label for="inputname" class="col-sm-3 col-form-label">mg/dL</label>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="inputname" class="col-sm-5 col-form-label">hbA1c</label>
                                                    <div class="align-items-end col-sm-4">
                                                      <input type="name" class="form-control int-lbl" id="hb" oninput="numberOnly(this.id);" name="hbA1c" required>
                                                    </div>
                                                    <label for="inputname" class="col-sm-3 col-form-label">%</label>
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

                    </div>

                    <div class="tab-pane fade show {{ Route::currentRouteName() == 'set-timer' ? 'active' : '' }} pt-3" id="profile-time-medic">
                        <h4 class="card-htitle">Waktu Konsumsi Obat Pasien</h4>

                        <div class="d-flex align-items-center">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Nama Obat</th>
                                    <th scope="col">Jumlah Konsumsi per-Hari</th>
                                    <th scope="col">Waktu Konsumsi</th>
                                    <th scope="col">Sesudah/Sebelum Makan</th>
                                    <th scope="col">Stok Pada Pasien</th>
                                    <th scope="col">TanggaL Pemberian Obat</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach ($obat as $o)
                                    <tr>
                                        <th scope="row">
                                            {{ $o->nama_obat}}
                                        </th>
                                        <td>
                                            {{ $o->dosis_harian }}
                                        </td>
                                        <td>
                                            {{ $o->waktu }}
                                        </td>
                                        <td>
                                            {{ $o->waktu_minum }}
                                        </td>
                                        <td>
                                            {{ $o->jumlah_obat }}
                                        </td>
                                        <td>
                                            {{ $o->created_at->isoformat('dddd, D MMMM Y') }}
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <button type="button" class="btn btn-int" data-bs-toggle="modal" data-bs-target="#addMedicine">
                            Add Data
                        </button>

                        <div class="modal fade" id="addMedicine" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                              <div class="modal-content modal-input">
                                <div class="modal-header modal-head">
                                  <h1 class="modal-title" id="addDataLabel">Input Data Obat</h1>
                                </div>
                                <form action="/submit-obat" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body modal-bd">
                                  <div class="row">
                                    <div class="col">
                                        <div class="card-addData">
                                            <div class="card-body-data">
                                              <h5 class="card-title addData-h">Konsumsi Obat</h5>
                                              <hr class="int-l">

                                                @foreach ($data as $d)
                                                    <input type="hidden" name="slug" value="{{ $d->slug }}">
                                                @endforeach

                                              <div class="mb-3 row">
                                                <label for="inputname" class="col-sm-4 col-form-label">Nama Obat</label>
                                                <div class="align-items-end col-sm-8">
                                                  <input type="text" list="nama_obat" name="nama_obat" class="form-control int-lbl" id="inputTextBox" required>
                                                  <datalist id="nama_obat">
                                                    @foreach ($dataobat as $do)
                                                        <option value="{{ $do->nama_obat }}">
                                                    @endforeach
                                                  </datalist>
                                                </div>
                                              </div>

                                              <div class="mb-3 row">
                                                <label for="inputname" class="col-sm-4 col-form-label">Jumlah Konsumsi per Hari</label>
                                                <div class="align-items-end col-sm-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dosis_harian" id="dosis_harian1" value="1" required>
                                                        <label class="form-check-label" for="dosis_harian1">
                                                          1
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dosis_harian" id="dosis_harian2" value="2" required>
                                                        <label class="form-check-label" for="dosis_harian2">
                                                          2
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dosis_harian" id="dosis_harian3" value="3" required>
                                                        <label class="form-check-label" for="dosis_harian3">
                                                          3
                                                        </label>
                                                    </div>
                                                </div>
                                              </div>

                                              <div class="mb-3 row">
                                                <label for="inputname" class="col-sm-4 col-form-label">Diminum Saat</label>
                                                <div class="align-items-end col-sm-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="waktu_minum" id="waktu_minum1" value="Sebelum Makan" required>
                                                        <label class="form-check-label" for="waktu_minum1">
                                                          Sebelum Makan
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="waktu_minum" id="waktu_minum2" value="Sesudah Makan" required>
                                                        <label class="form-check-label" for="waktu_minum2">
                                                          Sesudah Makan
                                                        </label>
                                                    </div>
                                                </div>
                                              </div>

                                              <div class="mb-3 row">
                                                <label for="inputname" class="col-sm-4 col-form-label">Waktu Konsumsi</label>
                                                <div class="align-items-end col-sm-8">
                                                    <input type="text" name="waktu" class="form-control int-lbl" onfocus="(this.type='time')" onblur="if(!this.value)this.type='text'" required>
                                                </div>
                                              </div>

                                            </div>
                                          </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-addData">
                                            <div class="card-body">
                                              <h5 class="card-title addData-h">Detail Obat</h5>
                                              <hr class="int-l">

                                              <div class="mb-3 row">
                                                <label for="inputname" class="col-sm-4 col-form-label">Resep Oleh</label>

                                                <div class="align-items-end col-sm-8">
                                                    <label for="inputname" class="col-form-label">{{ auth()->user()->name }}</label>
                                                </div>
                                              </div>

                                              <div class="mb-3 row">
                                                <label for="inputname" class="col-sm-4 col-form-label">Jumlah Obat</label>
                                                <div class="align-items-end col-sm-3">
                                                  <input type="text" name="jumlah_obat" class="form-control int-lbl" id="bb" oninput="numberOnly(this.id);" name="bb" required>
                                                </div>
                                              </div>

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
                </div>
                <div class="tab-pane fade show {{ Route::currentRouteName() == 'keluhan-pasien' ? 'active' : '' }} pt-3" id="profile-drp">
                    <h4 class="card-htitle">DRP Pasien</h4>

                    <h4> Pertanyaan</h4>
                    <span class="dpasien">
                        Jawaban Pasien
                    </span>

                </div>


        </div><!-- End Bordered Tabs -->

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
