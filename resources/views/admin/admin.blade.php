<!DOCTYPE html>
<html lang="en">

<head>
  <title>Daftar Akun Apoteker & Dokter</title>
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

  <div class="modal fade" id="addAcc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-input">
          <div class="modal-header modal-head">
            <h1 class="modal-title" id="addDataLabel">Log Laboratorium</h1>
          </div>
          <form action="/store-account" method="post" enctype="multipart/form-data">
            @csrf
          <div class="modal-body modal-bd">
                  <div class="card-addData">
                      <div class="card-body-data">

                            <div class="mb-3 row">
                                <label for="inputname" class="col-sm-4 col-form-label">Username</label>
                                <div class="align-items-end col-sm-8">
                                    <label for="inputname" class="col-sm-8 col-form-label">Generate Automaticly</label>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                              <input name="name" class="form-control int-lbl @error ('name') is-invalid @enderror" id="name" placeholder="Full Name" required>
                              <label for="name">Full Name</label>
                            </div>

                            <div class="form-floating mb-3">
                              <input name="email" type="email" class="form-control int-lbl" id="floatingInput" placeholder="name@example.com">
                              <label for="floatingInput">Email</label>
                            </div>

                            <select class="form-select selectAcc mb-3" aria-label="Default select example" name="role">
                                <option selected>Account for</option>
                                <option value="Apoteker">Apoteker</option>
                                <option value="Dokter">Dokter</option>
                            </select>

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

<main id="main" class="main">

    @if (session()-> has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="pagetitle">
        <h1>Daftar Akun Apoteker & Dokter</h1>
    </div><!-- End Page Title -->

    <button type="button" class="btn b-prnt" data-bs-toggle="modal" data-bs-target="#addAcc">
        <i class="bi bi-plus-circle"></i>
        <span class="t-prnt">Add Account</span>
    </button>

    <div class="row">
        <div class="col">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">Nama Apoteker</th>
                        <th scope="col">Email Apoteker</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($apoteker as $a)

                    <div class="modal fade" id="deleteApo-{{ $a->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="dellApolabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="dellApolabel">Delete Account</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Are you sure you want to delete this Apoteker account?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <a href="/delete-account-{{ $a->id }}" class="btn btn-danger">Delete Account</a>
                            </div>
                          </div>
                        </div>
                    </div>

                        <tr>
                            <td>{{ $a->name }}</td>
                            <td>{{ $a->email }}</td>
                            <td>
                                <a href="" type="button" class="delAcc" data-bs-toggle="modal" data-bs-target="#deleteApo-{{ $a->id }}">Delete Data</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">Email Dokter</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dokter as $d)

                    <div class="modal fade" id="deleteDok-{{ $d->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="dellDokterlabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="dellDokterlabel">Delete Account</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Are you sure you want to delete this Dokter account?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <a href="/delete-account-{{ $d->id }}" class="btn btn-danger">Delete Account</a>
                            </div>
                          </div>
                        </div>
                      </div>


                        <tr>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>
                                <a href="" type="button" class="delAcc" data-bs-toggle="modal" data-bs-target="#deleteDok-{{ $d->id }}">Delete Data</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
