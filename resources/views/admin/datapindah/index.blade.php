@extends('admin.layout.master')

@section('content')

<link rel="stylesheet" href="{{asset('public/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/themify-icons/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/flag-icon-css/css/flag-icon.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/selectFX/css/cs-skin-elastic.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{$pagename}}</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Foto</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIK</th>
                                    <th>Nomor KK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Pindah</th>
                                    <th>Alamat Tujuan</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($data as $i=>$row)
                                <tr>

                                <?php 
                                    $f = $row->foto;
                                    $foto = asset($row->foto);
                                    if ($f == NULL) {
                                        $foto = asset('images/noimage.png');
                                    }
                                ;?>
                                    <td>{{++$i}}</td>
                                    <td><img src="<?= $foto;?>"></td>
                                    <td>{{$row->nama_lengkap}}</td>
                                    <td>{{$row->nik}}</td>
                                    <td>{{$row->nomor_kk}}</td>
                                    <?php
                                        $jk = "Pria";
                                        if ($row->jenis_kelamin == '0') {
                                            $jk = 'Wanita';
                                        }
                                    ?>
                                    <td>{{$jk}}</td>
                                    <td>{{$row->tanggal_pindah?:"-"}}</td>
                                    <td>{{$row->tujuan_pindah?:"-"}}</td>
                                    <td>
                                        <a href="{{route('datapindah.edit', $row->id)}}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{route('datapindah.destroy', $row->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
                                    </td>                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<script src="{{asset('public/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- <script src="{{asset('public/vendors/popper.js/dist/umd/popper.min.js')}}"></script> -->
<script src="{{asset('public/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/js/main.js')}}"></script>

<script src="{{asset('public/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('public/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('public/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('public/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>

@endsection