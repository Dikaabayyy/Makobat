<!DOCTYPE html>
<html lang="en">

<head>
  <title>Daftar User</title>
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

  <div class="modal fade" id="dellAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="dellAccountLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="dellAccountLabel">Delete Account</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this account?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger">Delete Account</button>
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
        <h1>Daftar Account Pasien</h1>
    </div><!-- End Page Title -->

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">Nama Account Pasien</th>
                <th scope="col">Email Account Pasien</th>
                <th scope="col">Role Account</th>
                <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $s)

            <div class="modal fade" id="delete-{{ $s->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="dellAccountLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="dellAccountLabel">Delete Account</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to delete this account?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="/delete-account-{{ $s->id }}" class="btn btn-danger">Delete Account</a>
                    </div>
                  </div>
                </div>
              </div>

                <tr>
                    <td>{{ $s->username }}</td>
                    <td>{{ $s->email }}</td>
                    <td>{{ $s->role }}</td>
                    <td>
                        <a href="" type="button" class="delAcc" data-bs-toggle="modal" data-bs-target="#delete-{{ $s->id }}">Delete Data</a>
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
