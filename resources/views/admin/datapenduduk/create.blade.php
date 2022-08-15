@extends('admin.layout.master')

@section('content')

<link rel="stylesheet" href="{{asset('public/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/themify-icons/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/flag-icon-css/css/flag-icon.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/selectFX/css/cs-skin-elastic.css')}}">

<link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Forms</a></li>
                    <li class="active">Basic</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @if(session()->get('sukses'))
                    <div class="alert alert-success">
                        {{session()->get('sukses')}}
                    </div>
                    @endif
                    <div class="card-header">
                        <strong>Masukkan Data Penduduk</strong>
                    </div>
                    <div class="card-body card-block">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <div class="list-group">
                                @foreach($errors->all() as $error)
                                <li class="list-group-item">
                                    {{$error}}
                                </li>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <form action="{{route('datapenduduk.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal was-validated">
                            @csrf
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="text-input" class=" form-control-label">Input Foto</label>
                                    <input name="photo" type="file" class="form-control" id="formFile"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="text-input" class="form-control-label">Nama Lengkap</label>
                                    <input type="text" id="text-input" name="txt_nama" placeholder="Masukkan nama" class="form-control" required>
                                    <div class="invalid-feedback">Wajib Diisi</div>
                                    <div class="valid-feedback">valid</div>
                               </div>
                                <div class="col">
                                    <label for="text-input" class="form-control-label">NIK</label>
                                    <input type="text" id="text-input" name="txt_nik" placeholder="Masukkan NIK" class="form-control" required>
                                    <div class="invalid-feedback">Wajib Diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="text-input" class=" form-control-label">Nomor KK</label>
                                    <input type="text" id="text-input" name="txt_nomorkk" placeholder="Masukkan Nomor KK" class="form-control" required>
                                    <div class="invalid-feedback">Wajib Diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                                <div class="col-md-3">
                                    <label for="select" class=" form-control-label">Kepala Keluarga</label>
                                    <select name="option_status" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($status as $status)
                                        <?php $st = "Ya";
                                        if ($status == "0") {
                                            $st = "Tidak";
                                        }; ?>
                                        <option value={{$status}}><?= $st; ?></option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">wajib diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="select" class=" form-control-label">Jenis Kelamin</label>
                                    <select name="option_jeniskelamin" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($jeniskelamin as $jeniskelamin)

                                        <?php
                                            $jk = "Pria";
                                            if ($jeniskelamin == "0") {
                                                $jk = "Wanita";
                                            }
                                        ?>
                                        <option value={{$jeniskelamin}}><?= $jk ?></option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                                <div class="col">
                                    <label for="select" class=" form-control-label">Tempat lahir</label>
                                    <select name="txt_tmptlhr" id="selectkab" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($data_kab as $data)
                                        <option value={{$data->id}}>{{$data->nama_kab}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">wajib diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                                <div class="col">
                                    <label for="text-input" class=" form-control-label">Tanggal Lahir</label>
                                    <input type="date" id="text-input" name="txt_tgllhr" placeholder="Masukkan Tanggal Lahir" class="form-control" required>
                                    <div class="invalid-feedback">wajib diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="select" class=" form-control-label">Dusun</label>
                                    <select name="option_dusun" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($data_dusun as $dusun)
                                        <option value={{$dusun->id}}>{{$dusun->nama_dusun}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                                <div class="col">
                                    <label for="select" class=" form-control-label">RW</label>
                                    <select name="option_rw" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($data_rw as $rw)
                                        <option value={{$rw->id}}>{{$rw->rw}}</option>

                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                                <div class="col">
                                    <label for="select" class=" form-control-label">RT</label>
                                    <select name="option_rt" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($data_rt as $rt)
                                        <option value={{$rt->id}}>{{$rt->rt}}</option>

                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="select" class=" form-control-label">Status Pernikahan</label>
                                    <select name="option_statuspernikahan" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($statuspernikahan as $statuspernikahan)
                                        <option value={{$statuspernikahan}}>{{$statuspernikahan}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                                <div class="col">
                                    <label for="select" class=" form-control-label">Pekerjaan</label>
                                    <select name="option_pekerjaan" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($data_pekerjaan as $pekerjaan)
                                            <option value={{$pekerjaan->id}}>{{$pekerjaan->jenis_pekerjaan}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                                <div class="col">
                                    <label for="select" class=" form-control-label">Status Penduduk</label>
                                    <select name="option_statuspenduduk" id="select" class="form-control" required>
                                        <option value=""></option>
                                       
                                        @foreach($statuspenduduk as $statuspenduduk)
                                        <?php
                                            $sp = "Terdata"; 
                                            if ($statuspenduduk == "0") {
                                                $sp = "Belum";
                                            }
                                        ?>
                                        <option value={{$statuspenduduk}}><?= $sp ?></option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Simpan Data
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#selectkab').select2();
    });
</script>

<script src="{{asset('public/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- <script src="{{asset('public/vendors/popper.js/dist/umd/popper.min.js')}}"></script> -->

<script src="{{asset('public/vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('public/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js')}}"></script>

<script src="{{asset('public/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/js/main.js')}}"></script>

@endsection