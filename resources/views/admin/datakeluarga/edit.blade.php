@extends('admin.layout.master')

@section('content')

<link rel="stylesheet" href="{{asset('public/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/themify-icons/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/flag-icon-css/css/flag-icon.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/selectFX/css/cs-skin-elastic.css')}}">

<link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">


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
                        <form action="{{route('datakeluarga.update', $datakk->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @method('PATCH')
                        @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Lengkap</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{$datakk->nama_lengkap}}" name="txt_nama" placeholder="Masukkan nama" class="form-control"><small class="form-text text-muted"></small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">NIK</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{$datakk->nik}}"name="txt_nik" placeholder="Masukkan NIK" class="form-control"><small class="form-text text-muted"></small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Sumber Air</label></div>
                                <div class="col-12 col-md-5">
                                    <select name="option_air" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($air as $air)
                                        <option value={{$air->id}}>{{$air->sumber_air}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">wajib diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Fasilitas MCK</label></div>
                                <div class="col-12 col-md-5">
                                    <select name="option_mck" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($mck as $mck)
                                        <option value={{$mck->id}}>{{$mck->fasilitas}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">wajib diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Peserta JKN</label></div>
                                <div class="col-12 col-md-5">
                                    <select name="option_jkn" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($jkn as $jkn)
                                        <?php $jn = "Ada";
                                        if ($jkn == "0") {
                                            $jn = "Tidak";
                                        }; ?>
                                        <option value={{$jkn}}><?= $jn; ?></option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">wajib diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Peserta PKH</label></div>
                               <div class="col-12 col-md-5">
                                    <select name="option_pkh" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($pkh as $pkh)
                                        <?php $p = "Ada";
                                        if ($pkh == "0") {
                                            $p = "Tidak";
                                        }; ?>
                                        <option value={{$pkh}}><?= $p; ?></option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">wajib diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Nilai Aset</label></div>
                                <div class="col-12 col-md-5">
                                    <select name="option_aset" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($aset as $aset)
                                        <option value={{$aset->id}}>{{$aset->nilai_aset}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">wajib diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Pendapatan Keluarga</label></div>
                                <div class="col-12 col-md-5">
                                    <select name="option_pendapatan" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($pendapatan as $p)
                                        <option value={{$p->id}}>{{$p->pendapatan}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">wajib diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Status Tempat Tinggal</label></div>
                                <div class="col-12 col-md-5">
                                    <select name="option_status" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($tempattinggal as $status)
                                        <option value={{$status->id}}>{{$status->status}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">wajib diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Kondisi Listrik</label></div>
                                <div class="col-12 col-md-5">
                                    <select name="option_listrik" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($listrik as $l)
                                        <option value={{$l->id}}>{{$l->listrik}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">wajib diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Jenis Bahan Bakar Memasak</label></div>
                                <div class="col-12 col-md-5">
                                    <select name="option_bahan" id="select" class="form-control" required>
                                        <option value=""></option>
                                        @foreach($bahanbakar as $b)
                                        <option value={{$b->id}}>{{$b->jenis}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">wajib diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Update Data
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


<script src="{{asset('public/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- <script src="{{asset('public/vendors/popper.js/dist/umd/popper.min.js')}}"></script> -->

<script src="{{asset('public/vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('public/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js')}}"></script>

<script src="{{asset('public/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/js/main.js')}}"></script>


@endsection