<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/3.3/favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/jumbotron-narrow/">

    <title>Pengumpulan Data Pembuatan Rekening CPPPK Tahun 2025</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    {{-- <script>
        $(document).ready(function() {
            var allowed = false;
            var password = prompt("Masukkan password untuk mengakses halaman:");

            if (password === "pesselterdepan") {
                allowed = true;
                $(".container").show(); // Menampilkan konten jika benar
            } else {
                $("body").html("<h3 style='text-align:center; margin-top: 20%; color: red;'>Akses ditolak. Password salah.</h3>");
            }
        });
    </script> --}}
    {{-- <style>
        .container {
            display: none;
        }
    </style> --}}

    <style>
        table.table-smaller {
            font-size: 10px !important;
            width: 100% !important;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="header clearfix">
            {{-- <nav>
                <ul class="nav nav-pills pull-right">
                    <li role="presentation" class="active"><a href="#">Home</a></li>
                    <li role="presentation"><a href="#">About</a></li>
                    <li role="presentation"><a href="#">Contact</a></li>
                </ul>
            </nav> --}}
            <h3 class="text-muted">Kementerian Agama Kab. Pesisir Selatan</h3>
        </div>

        <div class="jumbotron" style="padding-top:10px!important; padding-bottom:10px!important">
            <h1>SUBBAGIANTU</h1>
            <p class="lead">Daftar Data Input Aplikasi Keuangan - Penggajian</p>
        </div>

        <nav class="navbar navbar-default">
            <div class="container">

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="@if (app()->request->segment(1) == '') active @endif"><a href="/">Cari Data</a></li>
                        <li class="@if (app()->request->segment(1) == 'daftar') active @endif">
                            <a href="/daftar">Lihat Daftar Data</a>
                        </li>
                        <li class="@if (app()->request->segment(1) == 'incomplete') active @endif">
                            <a href="/incomplete">Incomplete</a>
                        </li>

                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>

        <div class="row">
            <div class="col-lg-12">

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <h3 class="text-center">Daftar PPPK Belum Lengkap / Belum mengisi</h3>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-smaller">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Satuan Kerja</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($peserta as $item)
                                @php
                                    // Cek kondisi kelengkapan (misal: jika salah satu data penting kosong)
                                    $isIncomplete = empty($item->nik) || empty($item->tempat_lahir) || empty($item->tanggal_lahir) || empty($item->alamat) || empty($item->nomor_kk);
                                @endphp
                                @if ($isIncomplete)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->satuan_kerja }}</td>
                                        <td>{{ $item->nama }}</td>
                                    </tr>
                                @endif
                            @endforeach

                            @if ($no === 1)
                                <tr>
                                    <td colspan="4" class="text-center">Semua peserta telah mengisi data dengan lengkap.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>


        </div>

        <footer class="footer">
            <p>&copy; 2023 Pranata Komputer YD</p>
        </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
