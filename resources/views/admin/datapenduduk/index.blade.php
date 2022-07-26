@extends('admin.layout.master')

@section('content')



<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <!-- <div id="inputan" class="col-lg-12 sembunyi">
                <div class="card">
                    @if(session()->get('sukses'))
                    <div class="alert alert-success">
                        {{session()->get('sukses')}}
                    </div>
                    @endif
                    <div class="card-header">
                        <strong>Masukkan Data Penduduk</strong>
                        button class="btn btn-success pull-right" id="tutup"> Close </button>
                    </div>
                    <div class="card-body card-block">

                        <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal was-validated">

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="text-input" class=" form-control-label">Input Foto</label>
                                    <input name="photo" type="file" class="form-control" id="formFile" />
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
                                    <label for="text-input" class=" form-control-label">Tempat Lahir</label>
                                    <input type="text" id="text-input" name="txt_tmptlhr" placeholder="Masukkan Tempat Lahir" class="form-control" required>
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
                                        <option value={{$dusun->nama_dusun}}>{{$dusun->nama_dusun}}</option>
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
                                        <option value={{$rw->rw}}>{{$rw->rw}}</option>

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
                                        <option value={{$rt->rt}}>{{$rt->rt}}</option>

                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Wajib Diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
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
                                    <label for="text-input" class=" form-control-label">Pekerjaan</label>
                                    <input type="text" id="text-input" name="txt_pekerjaan" placeholder="Masukkan Pekerjaan" class="form-control" required>
                                    <div class="invalid-feedback">wajib diisi</div>
                                    <div class="valid-feedback">valid</div>
                                </div>
                                <div class="col-md-3">
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
            </div> -->


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
                            <table id="table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Foto</th>
                                        <th>Nama Lengkap</th>
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
                                        <td><img src="<?php echo $foto; ?>"></td>
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
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn btn- dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <form action="{{route('datapenduduk.edit', $row->id)}}" class="dropdown-item">
                                                        <button class="btn">Edit</button>
                                                    </form>
                                                    <form action="{{route('pindah.destroy',$row->id)}}" class="dropdown-item" method="post" style="z-index: -1;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn">Pindah</button>
                                                    </form>
                                                    <form action="{{route('datapenduduk.destroy',$row->id)}}" class="dropdown-item" method="post" style="z-index: -1;" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn">Meninggal</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <!-- @can('data-edit')
                                        <td><a href="{{route('datapenduduk.edit', $row->id)}}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                        @endcan
                                        @can('data-delete')
                                        <td>
                                            <form action="{{route ('pindah.destroy',$row->id)}}" method="post" style="z-index: -1;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Pindah</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route ('datapenduduk.destroy',$row->id)}}" method="post" style="z-index: -1;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Meninggal</button>
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
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<!-- Modal -->




<script type="text/javascript">
    $('#tambah').click(function() {
        $('#inputan').removeClass("sembunyi");
        $('#datane').addClass('sembunyi');
    });

    $('#tutup').click(function(p) {
        $('#inputan').addClass("sembunyi");
        $('#datane').removeClass('sembunyi');
    });
</script>

@endsection