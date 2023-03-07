<title>{{ config('chatify.name') }}</title>

{{-- Meta tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="id" content="{{ $id }}">
<meta name="type" content="{{ $type }}">
<meta name="messenger-color" content="{{ $messengerColor }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="url" content="{{ url('').'/'.config('chatify.routes.prefix') }}" data-user="{{ Auth::user()->id }}">

{{-- scripts --}}
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/chatify/font.awesome.min.js') }}"></script>
<script src="{{ asset('js/chatify/autosize.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

{{-- styles --}}
<link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
<link href="{{ asset('css/chatify/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/chatify/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />

{{-- Messenger Color Style--}}
@include('Chatify::layouts.messengerColor')

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('Admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('Admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('Admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('Admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('Admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link href="{{ asset('Admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('Admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">

<!-- Template Main CSS File -->
<link rel="stylesheet" href="{{ asset('css/chat.css') }}" />
<link href="{{ asset('Admin/css/style.css') }}" rel="stylesheet">
<script src="{{ asset('Admin/js/main.js') }}"></script>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"> Warning!!!</h5>
      </div>
      <div class="modal-body">
        Are you sure want to Logout??
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="/logout" method="post">
          @csrf
        <button type="submit " class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDataLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content modal-input">
      <div class="modal-header modal-head">
        <h5 class="modal-title" id="addDataLabel"> Input Pasien</h5>
      </div>

      <form action="/submit" method="POST" enctype="multipart/form-data">
          @csrf
      <div class="modal-body modal-bd">
        <div class="row">
          <div class="col">
              <div class="card-addData">
                  <div class="card-body-data">
                    <h5 class="card-title addData-h">Data Diri Pasien</h5>
                    <hr class="int-l">

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Username</label>
                      <div class="align-items-end col-sm-8">
                          <label for="inputname" class="col-sm-8 col-form-label">Generate Automaticly</label>
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">NIK</label>
                      <div class="align-items-end col-sm-8">
                        <input type="text" name="nik" class="form-control int-lbl" id="inputname" oninput="numberOnly(this.id);" maxlength="16" required>
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Nama Lengkap</label>
                      <div class="align-items-end col-sm-8">
                        <input type="text" name="fullname" class="form-control int-lbl" id="inputTextBox" required>
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Email</label>
                      <div class="align-items-end col-sm-8">
                        <input type="email" name="email" class="form-control int-lbl" id="inputname" required>
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                      <div class="align-items-end col-sm-8">
                          <input name="tgl_lahir" type="text" class="form-control int-lbl" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Alamat</label>
                      <div class="align-items-end col-sm-8">
                          <textarea name="address" class="form-control int-lbl" id="exampleFormControlTextarea1" rows="3" required></textarea>
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Gender</label>
                      <div class="align-items-end col-sm-8">
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="gender" id="gender1" value="Laki-laki" required>
                              <label class="form-check-label" for="gender1">
                                Laki-Laki
                              </label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="gender" id="gender2" value="Perempuan" required>
                              <label class="form-check-label" for="gender2">
                                Perempuan
                              </label>
                          </div>
                      </div>
                    </div>

                  </div>
                </div>
          </div>
          <div class="col">
              <div class="card-addData">
                  <div class="card-body">
                    <h5 class="card-title addData-h">Medical Check-Up</h5>
                    <hr class="int-l">

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Tekanan Darah</label>

                      <div class="align-items-end col-3">
                        <input type="text" class="form-control int-drh"  name="td_tds" id="td_tds" oninput="numberOnly(this.id);" required>
                      </div>

                      <label for="inputname" class="col-1 col-form-label drh"> /</label>

                      <div class="align-items-end col-sm-2">
                          <input type="text" class="form-control int-drh"  name="td_tdd" id="td_tdd" oninput="numberOnly(this.id);" required>
                        </div>

                      <label for="inputname" class="col-sm-1 col-form-label">mmHg</label>
                    </div>

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Berat badan</label>
                      <div class="align-items-end col-sm-4">
                        <input type="name" class="form-control int-lbl" id="bb" oninput="numberOnly(this.id);" name="bb" required>
                      </div>
                      <label for="inputname" class="col-sm-4 col-form-label">Kg</label>
                    </div>

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Tinggi Badan</label>
                      <div class="align-items-end col-sm-4">
                        <input type="name" class="form-control int-lbl" id="tb" oninput="numberOnly(this.id);" name="tb" required>
                      </div>
                      <label for="inputname" class="col-sm-4 col-form-label">cm</label>
                    </div>

                    <div class="mb-3 row">
                      <label for="inputname" class="col-sm-4 col-form-label">Heart Rate</label>
                      <div class="align-items-end col-sm-4">
                        <input type="name" class="form-control int-lbl" id="h_rate" oninput="numberOnly(this.id);" name="h_rate" required>
                      </div>
                      <label for="inputname" class="col-sm-4 col-form-label">bpm</label>
                    </div>

                  </div>
                </div>
          </div>
        </div>

        <div class="">
          <div class="card-addData">
              <div class="card-body">
                <h5 class="card-title addData-h">Lifestyle</h5>
                <hr class="int-l">

                <div class="mb-3 row">

                  <div class="col">
                      <label for="inputname" class="col-form-label">Apakah pasien sedang atau pernah melakukan diet?</label>
                      <div class="align-items-end col-sm-8 row">

                          <div class="col-2">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="diet" id="diet1" value="Yes" required>
                                  <label class="form-check-label" for="diet1">
                                      Ya
                                  </label>
                              </div>
                          </div>
                          <div class="col-2">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="diet" id="diet2" value="No" required>
                                  <label class="form-check-label" for="diet2">
                                      Tidak
                                  </label>
                              </div>
                          </div>
                      </div>

                      <label for="inputname" class="col-form-label">Apakah pasien pernah mengkonsumsi alkohol?</label>
                      <div class="align-items-end col-sm-8 row">

                          <div class="col-2">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="alcohol" id="alcohol1" value="Yes" required>
                                  <label class="form-check-label" for="alcohol1">
                                      Ya
                                  </label>
                              </div>
                          </div>
                          <div class="col-2">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="alcohol" id="alcohol2" value="No" required>
                                  <label class="form-check-label" for="alcohol2">
                                      Tidak
                                  </label>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col">
                      <label for="inputname" class="col-form-label">Apakah pasien pernah merokok?</label>
                      <div class="align-items-end col-sm-8 row">

                          <div class="col-2">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="cigarettes" id="cigarettes1" value="Yes" required>
                                  <label class="form-check-label" for="cigarettes1">
                                      Ya
                                  </label>
                              </div>
                          </div>
                          <div class="col-2">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="cigarettes" id="cigarettes2" value="No" required>
                                  <label class="form-check-label" for="cigarettes2">
                                      Tidak
                                  </label>
                              </div>
                          </div>
                      </div>
                  </div>


                </div>

              </div>
          </div>
      </div>

      </div>
      <div class="modal-footer modal-foot">
              <button type="submit " class="btn btn-int">Save</button>
      </form>
          <button type="button" class="btn btn-dcl" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>

</div>

