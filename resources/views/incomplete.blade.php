{{-- resources/views/notfinished.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Peserta Belum Lengkap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .table-smaller {
            font-size: 12px !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Daftar Peserta yang Belum Lengkap</h3>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-smaller">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Satuan Kerja</th>
                        <th>Nama</th>
                        <th>NIP</th>
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
                                <td>{{ $item->nip }}</td>
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
</body>

</html>
