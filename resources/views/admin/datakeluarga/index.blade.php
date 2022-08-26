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
                        <strong class="card-title text-center">Jumlah : {{$jumlah}} Keluarga</strong>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    @can('data-edit')
                                    <th>Action</th>
                                    @endcan
                                    <th>Nama Kepala Keluarga</th>
                                    <th>NIK</th>
                                    <th>sumber air</th>
                                    <th>fasilitas mck</th>
                                    <th>peserta JKN</th>
                                    <th>peserta PKH</th>
                                    <th>nilai aset</th>
                                    <th>pendapatan</th>
                                    <th>status tempat tinggal</th>
                                    <th>listrik</th>
                                    <th>bahan bakar untuk memasak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datakk as $i=>$row)
                                <?php 
                                    $jkn = "-";
                                    $pkh = "-";

                                    if ($row->peserta_jkn == '1') {
                                        $jkn = "Peserta";
                                    } elseif ($row->peserta_jkn == '0') {
                                        $jkn = "Bukan Peserta";
                                    }

                                    if ($row->peserta_pkh == '1') {
                                        $pkh = "Peserta";
                                    } elseif ($row->peserta_pkh == '0') {
                                        $pkh = "Bukan Peserta";
                                    };

                                ?>

                                <tr>
                                    <td>{{++$i}}</td>
                                    @can('data-edit')
                                    <td>
                                        <a href="{{route('datakeluarga.edit', $row->id)}}" class="btn btn-success">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    @endcan
                                    <td>{{$row->nama_lengkap}}</td>
                                    <td>{{$row->nik}}</td>
                                    <td>{{$row->sumber_air?:"-"}}</td>
                                    <td>{{$row->fasilitas_mck?:"-"}}</td>
                                    <td>{{$jkn?:"-"}}</td>
                                    <td>{{$pkh?:"-"}}</td>
                                    <td>{{$row->nilai_aset?:"-"}}</td>
                                    <td>{{$row->pendapatan?:"-"}}</td>
                                    <td>{{$row->tempat_tinggal?:"-"}}</td>
                                    <td>{{$row->listrik?:"-"}}</td>
                                    <td>{{$row->bahan_bakar_memasak?:"-"}}</td>
                                    <!-- @can('data-delete')
                                    <td>
                                        <form action="{{route ('datakeluarga.destroy',$row->id)}}" method="post" style="z-index: -1;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" >Hapus</button>
                                        </form> 
                                    </td>
                                    @endcan -->
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

<!-- Modal -->


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/init-scripts/data-table/datatables-init.js')}}"></script>

@endsection