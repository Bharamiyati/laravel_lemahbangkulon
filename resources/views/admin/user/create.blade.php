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
            <!--/.col-->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>{{$pagename}}</strong>
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

                        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal was-validated">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama User</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="txtnama_user" placeholder="Nama User" class="form-control" required><small class="form-text text-muted"></small>
                                    <div class="invalid-feedback">Wajib Diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="txtemail_user" placeholder="Email" class="form-control" required><small class="form-text text-muted"></small>
                                    <div class="invalid-feedback">Wajib Diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="text-input" name="txtpassword_user" placeholder="Password" class="form-control" required><small class="form-text text-muted"></small>
                                    <div class="invalid-feedback">Wajib Diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Konfirmasi Password</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="text-input" name="txtkonfirmasipassword_user" placeholder="Password" class="form-control" required><small class="form-text text-muted"></small>
                                    <div class="invalid-feedback">Wajib Diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Role</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="role_user" id="select" class="form-control">

                                        @foreach($allRoles as $role)
                                        <option value={{$role->id}}>
                                        {{$role->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('public/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- <script src="{{asset('public/vendors/popper.js/dist/umd/popper.min.js')}}"></script> -->

<script src="{{asset('public/vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('public/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js')}}"></script>

<script src="{{asset('public/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/js/main.js')}}"></script>
@endsection