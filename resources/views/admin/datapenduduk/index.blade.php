@extends('admin.layout.master')

@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div id="datane" class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{$pagename}}</strong>
                        <strong class="card-title text-center">Jumlah : {{$jumlah}} Penduduk</strong>
                        @can('data-create')
                        <a href="{{route('datapenduduk.create')}}" class="btn btn-success pull-right"> Tambah Data </a>
                        @endcan
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                        <th>Nomor</th>
                                        <th>Foto</th>
                                        <th style="padding: 0 50px; width: 50% !important;">Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>Nomor KK</th>
                                        <th>Kepala Keluarga</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Dusun</th>
                                        <th>Status Perkawinan</th>
                                        <th>Pekerjaan</th>
                                        <th>Status Penduduk</th>
                                        @can('data-edit')
                                        <th>Action</th>
                                        @endcan
                                </thead>
                                <tbody>

                                    @foreach($data as $i=>$row)
                                    <tr>
                                        <?php
                                            $st = "Ya";
                                            if ($row->status == "0") {
                                                $st = "Tidak";
                                            };
                                            $jk = "Pria";
                                            if ($row->jenis_kelamin == 0) {
                                                $jk = "Wanita";
                                            };

                                            $d = 'Krajan Lor';
                                            if ($row->alamat_dusun == 2) {
                                                $d = 'Krajan Kidul';
                                            } elseif ($row->alamat_dusun == 3) {
                                                $d = 'Sukorejo';
                                            } elseif ($row->alamat_dusun == 4) {
                                                $d = 'Talangrejo';
                                            } elseif ($row->alamat_dusun == 5) {
                                                $d = 'Barurejo';
                                            };

                                            $p = 'PNS';
                                            if ($row->pekerjaan == 2) {
                                                $p = 'Wiraswasta';
                                            } elseif ($row->pekerjaan == 5) {
                                                $p = 'Guru';
                                            } elseif ($row->pekerjaan == 6) {
                                                $p = 'Petani';
                                            } elseif ($row->pekerjaan == 7) {
                                                $p = 'Tenaga Medis';
                                            } elseif ($row->pekerjaan == 8) {
                                                $p = 'Karyawan Swasta';
                                            } elseif ($row->pekerjaan == 9) {
                                                $p = 'Peternak';
                                            } elseif ($row->pekerjaan == 10) {
                                                $p = 'Nelayan';
                                            } elseif ($row->pekerjaan == 11) {
                                                $p = 'Sopir';
                                            } elseif ($row->pekerjaan == 12) {
                                                $p = 'Pegawai BUMN';
                                            } elseif ($row->pekerjaan == 13) {
                                                $p = 'Pelajar/Mahasiswa';
                                            } elseif ($row->pekerjaan == 14) {
                                                $p = 'Lain-lain';
                                            } elseif ($row->pekerjaan == 15) {
                                                $p = 'Belum Bekerja';
                                            };
                                        ?>
                                        <td>{{++$i}}</td>
                                        @empty($row->foto)
                                        <td><img src="{{url('images/noimage.png')}}"></td>   
                                        @else
                                        <td><img src="{{url('public/photo/'.$row->foto)}}"></td>
                                        @endempty
                                        <td>{{$row->nama_lengkap}}</td>
                                        <td>{{$row->nik}}</td>
                                        <td>{{$row->nomor_kk}}</td>
                                        <td>{{$st}}</td>
                                        <td>{{$jk}}</td>
                                        <td>{{$d}}</td>
                                        <td>{{$row->status_perkawinan}}</td>
                                        <td>{{$p}}</td>
                                        <?php
                                        $sp = "Terdata";
                                        if ($row->status_penduduk == 0) {
                                            $sp = "Belum";
                                        }; ?>
                                        <td>{{$sp}}</td>
                                        @can('data-edit')
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <form action="{{route('datapenduduk.edit', $row->id)}}" class="dropdown-item">
                                                        <button class="btn btn-success btn-sm">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{route('pindah.destroy',$row->id)}}" class="dropdown-item" method="post" style="z-index: -1;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-warning btn-sm">
                                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{route('datapenduduk.destroy',$row->id)}}" class="dropdown-item" method="post" style="z-index: -1;" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        @endcan
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<!-- Modal -->

<!-- <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script> -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script> -->
<script src="{{asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
@endsection