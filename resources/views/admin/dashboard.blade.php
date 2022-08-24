@extends('admin.layout.master')

@section('content')

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
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- .content -->

<div class="content mt-3">
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">{{$jumlah}}</span>
                </h4>
                <p class="text-light">Jumlah Penduduk Desa Lemahbangkulon</p>
                <div class="chart-wrapper px-0" style="height:90px;" height="90">
                    <canvas id="widgetChart1"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">{{$jumlahkk}}</span>
                </h4>
                <p class="text-light">Jumlah Kepala Keluarga Desa Lemahbangkulon</p>
                <div class="chart-wrapper px-0" style="height:90px;" height="90">
                    <canvas id="widgetChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">{{$usiab}}</span>
                </h4>
                <p class="text-light">Jumlah Penduduk Usia Balita</p>
                <div class="chart-wrapper px-0" style="height:90px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">{{$usiap}}</span>
                </h4>
                <p class="text-light">Jumlah Penduduk usia produktiv</p>
                <div class="chart-wrapper px-0" style="height:90px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Data Jenis Kelamin </h4>
                            <h1 id="jklkrajanlor" style="display:none">{{$jklkrajanlor}}</h1>
                            <h1 id="jkpkrajanlor" style="display: none;">{{$jkpkrajanlor}}</h1>
                            <h1 id="jklkrajankidul" style="display:none">{{$jklkrajankidul}}</h1>
                            <h1 id="jkpkrajankidul" style="display: none;">{{$jkpkrajankidul}}</h1>
                            <h1 id="jkltalangrejo" style="display:none">{{$jkltalangrejo}}</h1>
                            <h1 id="jkptalangrejo" style="display: none;">{{$jkptalangrejo}}</h1>
                            <h1 id="jklsukorejo" style="display:none">{{$jklsukorejo}}</h1>
                            <h1 id="jkpsukorejo" style="display: none;">{{$jkpsukorejo}}</h1>
                            <h1 id="jklbarurejo" style="display:none">{{$jklbarurejo}}</h1>
                            <h1 id="jkpbarurejo" style="display: none;">{{$jkpbarurejo}}</h1>
                            <canvas id="jk"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Data Jumlah Penduduk Per Dusun </h4>
                            <h1 id="dusun1" style="display:none">{{$krajanlor}}</h1>
                            <h1 id="dusun2" style="display: none;">{{$krajankidul}}</h1>
                            <h1 id="dusun3" style="display:none">{{$talangrejo}}</h1>
                            <h1 id="dusun4" style="display: none;">{{$sukorejo}}</h1>
                            <h1 id="dusun5" style="display:none">{{$barurejo}}</h1>
                            <canvas id="dusun"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Data Mutasi Penduduk </h4>
                                <h1 id="dtm1" style="display:none">{{$dtm1}}</h1>
                                <h1 id="dtm2" style="display:none">{{$dtm2}}</h1>
                                <h1 id="dtm3" style="display:none">{{$dtm3}}</h1>
                                <h1 id="dtm4" style="display:none">{{$dtm4}}</h1>
                                <h1 id="dtm5" style="display:none">{{$dtm5}}</h1>
                                <h1 id="dtp1" style="display:none">{{$dtp1}}</h1>
                                <h1 id="dtp2" style="display:none">{{$dtp2}}</h1>
                                <h1 id="dtp3" style="display:none">{{$dtp3}}</h1>
                                <h1 id="dtp4" style="display:none">{{$dtp4}}</h1>
                                <h1 id="dtp5" style="display:none">{{$dtp5}}</h1>
                                <canvas id="mutasi"></canvas>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Data Pekerjaan</h4>
                            <h1 id="pns" style="display:none">{{$pns}}</h1>
                            <h1 id="wiraswasta" style="display:none">{{$wiraswasta}}</h1>
                            <h1 id="guru" style="display:none">{{$guru}}</h1>
                            <h1 id="petani" style="display:none">{{$petani}}</h1>
                            <h1 id="medis" style="display:none">{{$medis}}</h1>
                            <h1 id="karyawan" style="display:none">{{$karyawan}}</h1>
                            <h1 id="peternak" style="display:none">{{$peternak}}</h1>
                            <h1 id="nelayan" style="display:none">{{$nelayan}}</h1>
                            <h1 id="sopir" style="display:none">{{$sopir}}</h1>
                            <h1 id="bumn" style="display:none">{{$bumn}}</h1>
                            <h1 id="pelajar" style="display:none">{{$pelajar}}</h1>
                            <h1 id="lain" style="display:none">{{$lain}}</h1>
                            <h1 id="belum" style="display:none">{{$belum}}</h1>
                            <canvas id="pekerjaan"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Data Penduduk</h4>
                            <h1 id="terdata" style="display:none">{{$terdata}}</h1>
                            <h1 id="belumterdata" style="display: none;">{{$belumterdata}}</h1>
                            <canvas id="datapenduduk"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Peserta JKN</h4>
                            <h1 id="jkn" style="display: none;">{{$jkn}}</h1>
                            <h1 id="jknx" style="display: none;" >{{$jknx}}</h1>
                            <canvas id="jamkesmas"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Data Peserta PKH</h4>
                            <h1 id="pkh" style="display: none;">{{$pkh}}</h1>
                            <h1 id="pkhx" style="display: none;" >{{$pkhx}}</h1>
                            <canvas id="pesertapkh"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Data Sumber Air Bersih Keluarga</h4>
                            <h1 id="air" style="display: none;">{{$air}}</h1>
                            <h1 id="airx" style="display: none;" >{{$airx}}</h1>
                            <h1 id="airz" style="display: none;" >{{$airz}}</h1>
                            <canvas id="airbersih"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Data Sumber Fasilitas MCK Keluarga</h4>
                            <h1 id="mck" style="display: none;">{{$mck}}</h1>
                            <h1 id="mckx" style="display: none;" >{{$mckx}}</h1>
                            <h1 id="mckz" style="display: none;" >{{$mckz}}</h1>
                            <canvas id="fasilitasmck"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Data Nilai Aset Keluarga</h4>
                            <h1 id="aset" style="display: none;">{{$aset}}</h1>
                            <h1 id="asetx" style="display: none;" >{{$asetx}}</h1>
                            <h1 id="asetz" style="display: none;" >{{$asetz}}</h1>
                            <canvas id="nilaiaset"></canvas>
                        </div>
                    </div>
                </div>

                <!-- /# column -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Data Pendapatan Per Keluarga</h4>
                            <h1 id="pendapatan" style="display: none;">{{$pendapatan}}</h1>
                            <h1 id="pendapatanx" style="display: none;" >{{$pendapatanx}}</h1>
                            <h1 id="pendapatanz" style="display: none;" >{{$pendapatanz}}</h1>
                            <canvas id="totalpendapatan"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Data Status Tempat Tinggal Keluarga</h4>
                            <h1 id="tempattinggal" style="display: none;">{{$tempattinggal}}</h1>
                            <h1 id="tempattinggalx" style="display: none;" >{{$tempattinggalx}}</h1>
                            <h1 id="tempattinggalz" style="display: none;" >{{$tempattinggalz}}</h1>
                            <canvas id="statustempattinggal"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Data Listrik Keluarga</h4>
                            <h1 id="listrik" style="display: none;">{{$listrik}}</h1>
                            <h1 id="listrikx" style="display: none;" >{{$listrikx}}</h1>
                            <h1 id="listrikz" style="display: none;" >{{$listrikz}}</h1>
                            <canvas id="teganganlistrik"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Data Bahan Bakar Memasak Per Keluarga</h4>
                            <h1 id="bahan" style="display: none;">{{$bahan}}</h1>
                            <h1 id="bahanx" style="display: none;" >{{$bahanx}}</h1>
                            <h1 id="bahanz" style="display: none;" >{{$bahanz}}</h1>
                            <canvas id="bahanbakar"></canvas>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Bar chart</h4>
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div> -->
                <!-- column -->
            </div>
        </div>
    </div>
    
</div>
<script>
    //pie chart data penduduk
    var terdata = document.getElementById("terdata").innerHTML;
    var belumterdata = document.getElementById("belumterdata").innerHTML;
    var ctx = document.getElementById( "datapenduduk" );
    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ terdata, belumterdata],
                backgroundColor: [
                                    "rgb(111, 237, 214)",
                                    "rgb(255, 74, 74)",
                                    
                                ],
                hoverBackgroundColor: [
                                    "rgb(111, 237, 214)",
                                    "rgb(255, 74, 74)",
                                    
                                ]

                            } ],
            labels: [
                            "Lokal",
                            "pendatang",
                            
                        ]
        },
        options: {
            responsive: true
        }
    } );

    //pie chart data jamkesmas
    var jkn = document.getElementById("jkn").innerHTML;
    var jknx = document.getElementById("jknx").innerHTML;
    var ctx = document.getElementById( "jamkesmas" );
    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ jkn, jknx],
                backgroundColor: [
                                    "rgb(39, 123, 192)",
                                    "rgb(255, 203, 66)",
                                    
                                ],
                hoverBackgroundColor: [
                                    "rgb(39, 123, 192)",
                                    "rgb(255, 203, 66)",
                                ]

                            } ],
            labels: [
                            "peserta jkn",
                            "bukan peserta jkn",
                            
                        ]
        },
        options: {
            responsive: true
        }
    } );

    //pie chart data pkh
    var pkh = document.getElementById("pkh").innerHTML;
    var pkhx = document.getElementById("pkhx").innerHTML;
    var ctx = document.getElementById( "pesertapkh" );
    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ pkh, pkhx],
                backgroundColor: [
                                    "rgb(26, 77, 46)",
                                    "rgb(255, 159, 41)",
                                    
                                ],
                hoverBackgroundColor: [
                                    "rgb(26, 77, 46)",
                                    "rgb(255, 159, 41)",
                                    
                                ]

                            } ],
            labels: [
                            "peserta",
                            "bukan peserta",
                            
                        ]
        },
        options: {
            responsive: true
        }
    } );

    //pie chart data sumber air bersih
    var air = document.getElementById("air").innerHTML;
    var airx = document.getElementById("airx").innerHTML;
    var airz = document.getElementById("airz").innerHTML;
    var ctx = document.getElementById( "airbersih" );
    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ air, airx, airz],
                backgroundColor: [
                                    "rgb(97, 164, 188)",
                                    "rgb(91, 125, 177)",
                                    "rgb(26, 19, 47)"
                                    
                                ],
                hoverBackgroundColor: [
                                    "rgb(97, 164, 188)",
                                    "rgb(91, 125, 177)",
                                    "rgb(26, 19, 47)"
                                    
                                ]

                            } ],
            labels: [
                            "Tidak Terlindungi",
                            "Sumber Terlindungi/Sumur",
                            "PDAM"
                            
                        ]
        },
        options: {
            responsive: true
        }
    } );

    //pie chart fasilitas mck
    var mck = document.getElementById("mck").innerHTML;
    var mckx = document.getElementById("mckx").innerHTML;
    var mckz = document.getElementById("mckz").innerHTML;
    var ctx = document.getElementById( "fasilitasmck" );
    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ mck, mckx, mckz],
                backgroundColor: [
                                    "rgb(63, 167, 150)",
                                    "rgb(254, 194, 96)",
                                    "rgb(161, 0, 53)",
                                    
                                ],
                hoverBackgroundColor: [
                                    "rgb(63, 167, 150)",
                                    "rgb(254, 194, 96)",
                                    "rgb(161, 0, 53)",
                                ]

                            } ],
            labels: [
                            "Sungai/Tidak Punya",
                            "Milik Bersama",
                            "Milik Sendiri"
                            
                        ]
        },
        options: {
            responsive: true
        }
    } );

    //pie chart nilai aset keluarga
    var aset = document.getElementById("aset").innerHTML;
    var asetx = document.getElementById("asetx").innerHTML;
    var asetz = document.getElementById("asetz").innerHTML;
    var ctx = document.getElementById( "nilaiaset" );
    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ aset, asetx, asetz],
                backgroundColor: [
                                    "rgb(255, 30, 0)",
                                    "rgb(89, 206, 143)",
                                    "rgb(232, 249, 253)",
                                    
                                ],
                hoverBackgroundColor: [
                                    "rgb(255, 30, 0)",
                                    "rgb(89, 206, 143)",
                                    "rgb(232, 249, 253)",
                                ]

                            } ],
            labels: [
                            "< 500000",
                            "500000 - 1000000",
                            "> 1000000"
                            
                        ]
        },
        options: {
            responsive: true
        }
    } );

    //pie chart pendapatan
    var pendapatan = document.getElementById("pendapatan").innerHTML;
    var pendapatanx = document.getElementById("pendapatanx").innerHTML;
    var pendapatanz = document.getElementById("pendapatanz").innerHTML;
    var ctx = document.getElementById( "totalpendapatan" );
    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ pendapatan, pendapatanx, pendapatanz],
                backgroundColor: [
                                    "rgb(111, 237, 214)",
                                    "rgb(255, 149, 81)",
                                    "rgb(255, 74, 74)",
                                   
                                    
                                ],
                hoverBackgroundColor: [
                                     "rgb(111, 237, 214)",
                                    "rgb(255, 149, 81)",
                                    "rgb(255, 74, 74)",
                                ]

                            } ],
            labels: [
                            "< 500000",
                            "500000 - 1000000",
                            "> 1000000"
                            
                        ]
        },
        options: {
            responsive: true
        }
    } );

    //pie chart status tempat tinggal
    var tempattinggal = document.getElementById("tempattinggal").innerHTML;
    var tempattinggalx = document.getElementById("tempattinggalx").innerHTML;
    var tempattinggalz = document.getElementById("tempattinggalz").innerHTML;
    var ctx = document.getElementById( "statustempattinggal" );
    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ tempattinggal, tempattinggalx, tempattinggalz],
                backgroundColor: [
                                    "rgb(239, 91, 12)",
                                    "rgb(0, 56, 101)",
                                    "rgb(60, 207, 78)",
                                    
                                ],
                hoverBackgroundColor: [
                                    "rgb(239, 91, 12)",
                                    "rgb(0, 56, 101)",
                                    "rgb(60, 207, 78)",
                                ]

                            } ],
            labels: [
                            "Numpang Karang",
                            "Kontrak / Sewa",
                            "Milik Sendiri"
                            
                        ]
        },
        options: {
            responsive: true
        }
    } );

    //pie chart listrik
    var listrik = document.getElementById("listrik").innerHTML;
    var listrikx = document.getElementById("listrikx").innerHTML;
    var listrikz = document.getElementById("listrikz").innerHTML;
    var ctx = document.getElementById( "teganganlistrik" );
    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ listrik, listrikx, listrikz],
                backgroundColor: [
                                    "rgb(254, 219, 57)",
                                    "rgb(28, 214, 206)",
                                    "rgb(214, 28, 78)"
                                    
                                ],
                hoverBackgroundColor: [
                                    "rgb(254, 219, 57)",
                                    "rgb(28, 214, 206)",
                                    "rgb(214, 28, 78)"
                                ]

                            } ],
            labels: [
                            "< 450 Watt",
                            "450 Watt - 900 Watt",
                            "> 900 Watt"
                            
                        ]
        },
        options: {
            responsive: true
        }
    } );

    //pie chart fasilitas mck
    var bahan = document.getElementById("bahan").innerHTML;
    var bahanx = document.getElementById("bahanx").innerHTML;
    var bahanz = document.getElementById("bahanz").innerHTML;
    var ctx = document.getElementById( "bahanbakar" );
    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ bahan, bahanx, bahanz],
                backgroundColor: [
                                    "rgb(235, 83, 83)",
                                    "rgb(249, 217, 35)",
                                    "rgb(54, 174, 124)",
                                    
                                ],
                hoverBackgroundColor: [
                                    "rgb(235, 83, 83)",
                                    "rgb(249, 217, 35)",
                                    "rgb(54, 174, 124)",
                                ]

                            } ],
            labels: [
                            "Kayu/Sejenisnya",
                            "Gas 3Kg",
                            "> Gas 3Kg"
                            
                        ]
        },
        options: {
            responsive: true
        }
    } );

    // dusun single bar chart
    var krajanlor = document.getElementById("dusun1").innerHTML;
    var krajankidul = document.getElementById("dusun2").innerHTML;
    var talangrejo = document.getElementById("dusun3").innerHTML;
    var sukorejo = document.getElementById("dusun4").innerHTML;
    var barurejo = document.getElementById("dusun5").innerHTML;
    var ctx = document.getElementById( "dusun" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: [ "Krajan Lor", "Krajan Kidul", "Talangrejo", "Sukorejo", "Barurejo"],
            datasets: [
                {
                    label: "Penduduk Per Dusun",
                    data: [ krajanlor, krajankidul, talangrejo, sukorejo, barurejo ],
                    borderColor: "rgba(255, 255, 255, 0.9)",
                    borderWidth: "0",
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                    ]
                            }
                        ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                                } ]
            }
        }
    } );

    //doughut chart
    var pns = document.getElementById("pns").innerHTML;
    var wiraswasta = document.getElementById("wiraswasta").innerHTML;
    var guru = document.getElementById("guru").innerHTML;
    var petani = document.getElementById("petani").innerHTML;
    var medis = document.getElementById("medis").innerHTML;
    var karyawan = document.getElementById("karyawan").innerHTML;
    var peternak = document.getElementById("peternak").innerHTML;
    var nelayan = document.getElementById("nelayan").innerHTML;
    var sopir = document.getElementById("sopir").innerHTML;
    var bumn = document.getElementById("bumn").innerHTML;
    var pelajar = document.getElementById("pelajar").innerHTML;
    var lain = document.getElementById("lain").innerHTML;
    var belum = document.getElementById("belum").innerHTML;
    var ctx = document.getElementById( "pekerjaan" );
    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'doughnut',
        data: {
            datasets: [ {
                data: [ pns, wiraswasta, guru, petani, medis, karyawan, peternak, nelayan, sopir, bumn, pelajar, lain, belum],
                backgroundColor: [
                                    "rgba(255, 37, 37, 0.93)",
                                    "rgba(255, 158, 38, 0.93)",
                                    "rgba(255, 248, 38, 0.93)",
                                    "rgba(135, 255, 38, 0.93)",
                                    "rgba(0, 255, 8, 0.93)",
                                    "rgba(0, 255, 162, 0.93)",
                                    "rgba(0, 242, 255, 0.93)",
                                    "rgba(0, 135, 255, 0.93)",
                                    "rgba(0, 13, 255, 0.93)",
                                    "rgba(146, 0, 255, 0.93)",
                                    "rgba(220, 0, 255, 0.93)",
                                    "rgba(234, 134, 0, 0.93)",
                                    "rgba(93, 53, 0, 0.93)"
                                ],
                hoverBackgroundColor: [
                                    "rgba(255, 37, 37, 0.93)",
                                    "rgba(255, 158, 38, 0.93)",
                                    "rgba(255, 248, 38, 0.93)",
                                    "rgba(135, 255, 38, 0.93)",
                                    "rgba(0, 255, 8, 0.93)",
                                    "rgba(0, 255, 162, 0.93)",
                                    "rgba(0, 242, 255, 0.93)",
                                    "rgba(0, 135, 255, 0.93)",
                                    "rgba(0, 13, 255, 0.93)",
                                    "rgba(146, 0, 255, 0.93)",
                                    "rgba(220, 0, 255, 0.93)",
                                    "rgba(234, 134, 0, 0.93)",
                                    "rgba(93, 53, 0, 0.93)"
                                ]

                            } ],
            labels: [
                            "pns",
                            "wiraswasta",
                            "guru",
                            "petani",
                            "tenaga medis",
                            "karyawan swasta",
                            "peternak",
                            "nelayan",
                            "sopir",
                            "bumn",
                            "pelajar/mahasiswa",
                            "lain-lain",
                            "belum Bekerja"

                        ]
        },
        options: {
            responsive: true
        }
    } );

    //data jenis kelamin
    var jklkl = document.getElementById("jklkrajanlor").innerHTML;
    var jkpkl = document.getElementById("jkpkrajanlor").innerHTML;
    var jklkk = document.getElementById("jklkrajankidul").innerHTML;
    var jkpkk = document.getElementById("jkpkrajankidul").innerHTML;
    var jklt = document.getElementById("jkltalangrejo").innerHTML;
    var jkpt = document.getElementById("jkptalangrejo").innerHTML;
    var jkls = document.getElementById("jklsukorejo").innerHTML;
    var jkps = document.getElementById("jkpsukorejo").innerHTML;
    var jklb = document.getElementById("jklbarurejo").innerHTML;
    var jkpb = document.getElementById("jkpbarurejo").innerHTML;
    var ctx = document.getElementById( "jk" );
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: [ "Krajan Lor", "Krajan Kidul", "Talangrejo", "Sukorejo", "Barurejo"],
            datasets: [
                {
                    label: "Laki-laki",
                    data: [ jklkl, jklkk, jklt, jkls, jklb ],
                    borderColor: "rgba(200, 255, 0, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(200, 255, 0, 0.5)"
                            },
                {
                    label: "Perempuan",
                    data: [ jkpkl, jkpkk, jkpt, jkps, jkpb ],
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "rgba(0,0,0,0.07)"
                            }
                        ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                                } ]
            }
        }
    } );

    //Data penduduk meninggal dan pindah
    var dtm1 = document.getElementById("dtm1").innerHTML;
    var dtm2 = document.getElementById("dtm2").innerHTML;
    var dtm3 = document.getElementById("dtm3").innerHTML;
    var dtm4 = document.getElementById("dtm4").innerHTML;
    var dtm5 = document.getElementById("dtm5").innerHTML;
    var dtp1 = document.getElementById("dtp1").innerHTML;
    var dtp2 = document.getElementById("dtp2").innerHTML;
    var dtp3 = document.getElementById("dtp3").innerHTML;
    var dtp4 = document.getElementById("dtp4").innerHTML;
    var dtp5 = document.getElementById("dtp5").innerHTML;
    var ctx = document.getElementById( "mutasi" );
    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "2022", "2023", "2024", "2025", "2026"],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                label: "Data Meninggal Per Tahun",
                data: [ dtm1, dtm2, dtm3, dtm4, dtm5 ],
                backgroundColor: 'transparent',
                borderColor: 'rgba(220,53,69,0.75)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(220,53,69,0.75)',
                    }, {
                label: "Data Pindah Per Tahun",
                data: [ dtp1, dtp2, dtp3, dtp4, dtp5],
                backgroundColor: 'transparent',
                borderColor: 'rgba(40,167,69,0.75)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(40,167,69,0.75)',
                    } ]
        },
        options: {
            responsive: true,

            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },
            },
            scales: {
                xAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                        } ],
                yAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                        } ]
            },
            title: {
                display: false,
                text: 'Normal Legend'
            }
        }
    } );

</script>

@endsection('content')