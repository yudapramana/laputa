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

    <script>
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
    </script>
    <style>
        .container {
            display: none;
        }
    </style>

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

                <div class="well">

                    <h3 class="nopadding nomargin" style="margin-top: 0 !important; margin-bottom:10px !important;">
                        Daftar Data</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed table-striped table-hover table-smaller">

                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Satuan Kerja</th>
                                <th rowspan="2">Nama</th>
                                <th rowspan="2">NIP</th>
                                <th rowspan="2">NIK</th>
                                <th rowspan="2">Jenis Kelamin</th>
                                <th rowspan="2">Tempat Lahir</th>
                                <th rowspan="2">Tanggal Lahir</th>
                                <th rowspan="2">Agama</th>
                                <th rowspan="2">Nama Ibu Kandung</th>
                                <th rowspan="2">GDrive Link</th>
                                <th rowspan="2">Nomor HP</th>
                                <th rowspan="2">Email</th>
                                <th rowspan="2">Alamat</th>
                                <th rowspan="2">Kode Pos</th>
                                <th rowspan="2">Jabatan</th>
                                <th rowspan="2">Pendidikan</th>
                                <th rowspan="2">Nomor NPWP</th>
                                <th rowspan="2">Nomor KK</th>
                                <th rowspan="2">Status Pernikahan</th>
                                <th rowspan="2">Status Pasangan</th>
                                <th colspan="10" class="text-center">Data Pasangan</th>
                                <th rowspan="2">Punya Anak</th>
                                <th colspan="8" class="text-center">Anak 1</th>
                                <th colspan="8" class="text-center">Anak 2</th>
                                <th colspan="8" class="text-center">Anak 3</th>
                                <th colspan="8" class="text-center">Anak 4</th>
                            </tr>
                            <tr>
                                <!-- Sub-header Pasangan -->
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Tanggal Nikah</th>
                                <th>NIK</th>
                                <th>Pekerjaan</th>
                                <th>Nama Ibu</th>
                                <th>Nama Ayah</th>
                                <th>Tertanggung</th>
                                <!-- Sub-header Anak 1 -->
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>NIK</th>
                                <th>Pekerjaan</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Tertanggung</th>
                                <!-- Sub-header Anak 2 -->
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>NIK</th>
                                <th>Pekerjaan</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Tertanggung</th>
                                <!-- Sub-header Anak 3 -->
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>NIK</th>
                                <th>Pekerjaan</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Tertanggung</th>
                                <!-- Sub-header Anak 4 -->
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>NIK</th>
                                <th>Pekerjaan</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Tertanggung</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peserta as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->satuan_kerja }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nip }}</td>
                                    <td>{{ $item->nik ?? '-' }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->tempat_lahir ?? '-' }}</td>
                                    <td>{{ $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') : '-' }}</td>
                                    <td>{{ $item->agama }}</td>
                                    <td>{{ Str::upper($item->nama_ibu_kandung ?? '-') }}</td>
                                    <td>
                                        @if ($item->gdrive_link)
                                            <a href="{{ $item->gdrive_link }}" target="_blank">Link</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $item->nomor_hp ?? '-' }}</td>
                                    <td>{{ $item->email ?? '-' }}</td>
                                    <td>{{ $item->alamat ?? '-' }}</td>
                                    <td>{{ $item->kode_pos ?? '-' }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->pendidikan }}</td>
                                    <td>{{ $item->nomor_npwp ?? '-' }}</td>
                                    <td>{{ $item->nomor_kk ?? '-' }}</td>
                                    <td>{{ $item->status_pernikahan }}</td>
                                    <td>{{ $item->status_pernikahan == 'Menikah' ? $item->status_pasangan : '-' }}</td>
                                    <td>{{ $item->pasangan_nama ?? '-' }}</td>
                                    <td>{{ $item->pasangan_nip ?? '-' }}</td>
                                    <td>{{ $item->pasangan_tempat_lahir ?? '-' }}</td>
                                    <td>{{ $item->pasangan_tanggal_lahir ? \Carbon\Carbon::parse($item->pasangan_tanggal_lahir)->format('d-m-Y') : '-' }}</td>
                                    <td>{{ $item->pasangan_tanggal_nikah ? \Carbon\Carbon::parse($item->pasangan_tanggal_nikah)->format('d-m-Y') : '-' }}</td>
                                    <td>{{ $item->pasangan_nik ?? '-' }}</td>
                                    <td>{{ $item->pasangan_pekerjaan ?? '-' }}</td>
                                    <td>{{ $item->pasangan_nama_ibu ?? '-' }}</td>
                                    <td>{{ $item->pasangan_nama_ayah ?? '-' }}</td>
                                    <td>{{ $item->pasangan_tertanggung ? 'Ya' : 'Tidak' }}</td>
                                    <td>{{ $item->punya_anak ? 'Ya' : 'Tidak' }}</td>
                                    <!-- Anak 1 -->
                                    <td style="background-color:cornflowerblue">{{ $item->nama_anak_1 ?? '-' }}</td>
                                    <td>{{ $item->tempat_lahir_anak_1 ?? '-' }}</td>
                                    <td>{{ $item->tanggal_lahir_anak_1 ? \Carbon\Carbon::parse($item->tanggal_lahir_anak_1)->format('d-m-Y') : '-' }}</td>
                                    <td>{{ $item->nik_anak_1 ?? '-' }}</td>
                                    <td>{{ $item->nama_anak_1 != '' ? $item->pekerjaan_anak_1 : '-' }}</td>
                                    <td>{{ $item->nama_ayah_anak_1 ?? '-' }}</td>
                                    <td>{{ $item->nama_ibu_anak_1 ?? '-' }}</td>
                                    <td>{{ $item->nama_anak_1 != '' ? ($item->tertanggung_anak_1 ? 'Ya' : 'Tidak') : '-' }}</td>
                                    <!-- Anak 2 -->
                                    <td style="background-color:cornflowerblue">{{ $item->nama_anak_2 ?? '-' }}</td>
                                    <td>{{ $item->tempat_lahir_anak_2 ?? '-' }}</td>
                                    <td>{{ $item->tanggal_lahir_anak_2 ? \Carbon\Carbon::parse($item->tanggal_lahir_anak_2)->format('d-m-Y') : '-' }}</td>
                                    <td>{{ $item->nik_anak_2 ?? '-' }}</td>
                                    <td>{{ $item->nama_anak_2 != '' ? $item->pekerjaan_anak_2 : '-' }}</td>
                                    <td>{{ $item->nama_ayah_anak_2 ?? '-' }}</td>
                                    <td>{{ $item->nama_ibu_anak_2 ?? '-' }}</td>
                                    <td>{{ $item->nama_anak_2 != '' ? ($item->tertanggung_anak_2 ? 'Ya' : 'Tidak') : '-' }}</td>
                                    <!-- Anak 3 -->
                                    <td style="background-color:cornflowerblue">{{ $item->nama_anak_3 ?? '-' }}</td>
                                    <td>{{ $item->tempat_lahir_anak_3 ?? '-' }}</td>
                                    <td>{{ $item->tanggal_lahir_anak_3 ? \Carbon\Carbon::parse($item->tanggal_lahir_anak_3)->format('d-m-Y') : '-' }}</td>
                                    <td>{{ $item->nik_anak_3 ?? '-' }}</td>
                                    <td>{{ $item->nama_anak_3 != '' ? $item->pekerjaan_anak_3 : '-' }}</td>
                                    <td>{{ $item->nama_ayah_anak_3 ?? '-' }}</td>
                                    <td>{{ $item->nama_ibu_anak_3 ?? '-' }}</td>
                                    <td>{{ $item->nama_anak_3 != '' ? ($item->tertanggung_anak_3 ? 'Ya' : 'Tidak') : '-' }}</td>
                                    <!-- Anak 4 -->
                                    <td style="background-color:cornflowerblue">{{ $item->nama_anak_4 ?? '-' }}</td>
                                    <td>{{ $item->tempat_lahir_anak_4 ?? '-' }}</td>
                                    <td>{{ $item->tanggal_lahir_anak_4 ? \Carbon\Carbon::parse($item->tanggal_lahir_anak_4)->format('d-m-Y') : '-' }}</td>
                                    <td>{{ $item->nik_anak_4 ?? '-' }}</td>
                                    <td>{{ $item->nama_anak_4 != '' ? $item->pekerjaan_anak_4 : '-' }}</td>
                                    <td>{{ $item->nama_ayah_anak_4 ?? '-' }}</td>
                                    <td>{{ $item->nama_ibu_anak_4 ?? '-' }}</td>
                                    <td>{{ $item->nama_anak_4 != '' ? ($item->tertanggung_anak_4 ? 'Ya' : 'Tidak') : '-' }}</td>
                                </tr>
                            @endforeach
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
