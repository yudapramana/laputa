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

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/docs/3.3/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/3.3/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">Kementerian Agama Kab. Pesisir Selatan</h3>
        </div>

        <div class="jumbotron" style="padding-top:10px!important; padding-bottom:10px!important">
            <h1>SUBBAGIANTU</h1>
            <p class="lead">Pengumpulan Data Pembuatan Rekening CPPPK Tahun 2025</p>
        </div>

        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="@if (app()->request->segment(1) == '') active @endif"><a href="/">Cari Data</a></li>
                        <li class="@if (app()->request->segment(1) == 'daftar') active @endif"><a href="/daftar">Lihat
                                Daftar
                                Data</a></li>

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

                @if (!isset($peserta))
                    <div class="well">

                        <h3 class="nopadding nomargin" style="margin-top: 0 !important; margin-bottom:10px !important;">Cari
                            Data</h3>
                        <form action="{{ route('input.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nik">Masukkan Nomor Induk Kependudukan (NIK) Anda</label>
                                <input class="form-control" type="text" name="nik" placeholder="NIK Calon PPPK" required>
                                @if ($errors->has('nik'))
                                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                                @endif
                            </div>
                            <button type="submit" id="submitBtn" class="btn btn-primary">
                                Cari Data CPPPK
                            </button>
                        </form>
                        @if (isset($sudah_isi))
                            <table class="table">
                                <tr>
                                    <th>nik</th>
                                    <td>{{ $peserta->nik }}</td>
                                </tr>
                                <tr>
                                    <th>nama</th>
                                    <td>{{ $peserta->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Satuan Kerja</th>
                                    <td>{{ $peserta->satuan_kerja }}</td>
                                </tr>
                                <tr>
                                    <th>nomor_hp</th>
                                    <td>{{ $peserta->nomor_hp }}</td>
                                </tr>
                                <tr>
                                    <th>email</th>
                                    <td>{{ $peserta->email }}</td>
                                </tr>
                                <tr>
                                    <th>nama_ibu_kandung</th>
                                    <td>{{ $peserta->nama_ibu_kandung }}</td>
                                </tr>
                            </table>
                        @endif
                    </div>
                @else
                    <div class="well">
                        <h3 class="nopadding nomargin" style="margin-top: 0 !important; margin-bottom:10px !important;">
                            Detail Peserta</h3>
                        <form action="{{ route('inputtilok.store') }}" method="post">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" id="id" value="{{ $peserta->id }}">
                            <div class="form-group">
                                <label for="satuan_kerja">Satuan Kerja</label>
                                <input class="form-control" type="text" name="satuan_kerja" value="{{ $peserta->satuan_kerja }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input class="form-control" type="text" name="nik" value="{{ $peserta->nik }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input class="form-control" type="text" name="nama" value="{{ $peserta->nama }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nomor_hp">Nomor Handphone</label>
                                <input class="form-control" type="text" name="nomor_hp" value="{{ $peserta->nomor_hp }}" required>
                                @if ($errors->has('nomor_hp'))
                                    <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" value="{{ $peserta->email }}" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama_ibu_kandung">Nama Ibu Kandung</label>
                                <input class="form-control" type="text" name="nama_ibu_kandung" value="{{ $peserta->nama_ibu_kandung }}" required>
                            </div>
                            @if ($errors->has('nama_ibu_kandung'))
                                <span class="text-danger">{{ $errors->first('nama_ibu_kandung') }}</span>
                            @endif
                            <input type="submit" class="btn btn-primary" value="Simpan Data">
                        </form>
                    </div>
                @endif

            </div>


        </div>

        <footer class="footer">
            <p>&copy; 2023 Pranata Komputer YD</p>
        </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('form').on('submit', function() {
                $('#submitBtn').prop('disabled', true).html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...');
            });
        });
    </script>

    <style>
        /* Gaya animasi untuk ikon loading */
        .glyphicon-refresh-animate {
            -animation: spin 1s infinite linear;
            -webkit-animation: spin 1s infinite linear;
        }

        @-webkit-keyframes spin {
            from {
                -webkit-transform: rotate(0deg);
            }

            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>

</body>

</html>
