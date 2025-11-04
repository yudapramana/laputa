<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; // <— penting untuk cek kolom
use SplFileObject;
use RuntimeException;

class EmployeesSeederCsv extends Seeder
{
    // Jika CSV di project root: database/seeds/csvs/employees.csv
    // gunakan base_path, bukan storage_path
    protected string $csvPath = 'database/seeds/csvs/employees.csv';

    protected string $defaultAgama = 'Islam';
    protected string $defaultPendidikan = 'S1';

    public function run(): void
    {
        // Pakai base_path agar file di folder proyek, bukan storage
        $fullPath = base_path($this->csvPath);
        if (!file_exists($fullPath)) {
            throw new RuntimeException("CSV tidak ditemukan: {$fullPath}");
        }

        $delimiter = $this->detectDelimiter($fullPath);

        $file = new SplFileObject($fullPath);
        $file->setFlags(SplFileObject::READ_CSV | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);
        $file->setCsvControl($delimiter);

        $header = null;
        $hasLabelCol = Schema::hasColumn('employees', 'label'); // <— cek apakah kolom label ada

        DB::transaction(function () use ($file, &$header, $hasLabelCol) {
            foreach ($file as $i => $row) {
                if ($row === [null] || $row === false) continue;
                $row = array_map(fn($v) => is_string($v) ? trim($v) : $v, $row);

                if ($i === 0) {
                    $header = $this->normalizeHeader($row);
                    continue;
                }

                $assoc       = $this->rowToAssoc($header, $row);
                $nip         = $this->getFirst($assoc, ['nip', 'nomor_nip']);
                $nama        = $this->getFirst($assoc, ['nama', 'nama_lengkap', 'full_name']);
                $jabatan     = $this->getFirst($assoc, ['jabatan', 'jabatan_terakhir']);
                $satuanKerja = $this->getFirst($assoc, ['satuan_kerja', 'satker', 'unit_kerja']);

                // Ambil label dari beberapa kemungkinan header
                $labelRaw    = $this->getFirst($assoc, ['label', 'kategori', 'kelompok', 'keterangan']);
                $label       = ($labelRaw !== null && $labelRaw !== '') ? trim($labelRaw) : null;

                if (!$nip) continue;

                $nip = preg_replace('/\D/', '', $nip);

                $existing = Employee::where('nip', $nip)->first();

                if ($existing) {
                    // UPDATE: hanya sentuh kolom yang diinginkan
                    $updateData = [
                        'nama'         => $nama ?? $existing->nama,
                        'jabatan'      => $jabatan ?? $existing->jabatan,
                        'satuan_kerja' => $satuanKerja ?? $existing->satuan_kerja,
                    ];

                    // Tambahkan label hanya jika kolomnya ada & value tidak null/kosong
                    if ($hasLabelCol && $label !== null && $label !== '') {
                        $updateData['label'] = $label;
                    }

                    $existing->update($updateData);
                } else {
                    $createData = [
                        'nip'           => $nip,
                        'nama'          => $nama ?? 'Tanpa Nama',
                        'jabatan'       => $jabatan ?? '-',
                        'satuan_kerja'  => $satuanKerja ?? '-',
                        'agama'         => $this->defaultAgama,
                        'pendidikan'    => $this->defaultPendidikan,
                    ];

                    // Tambahkan label saat INSERT jika kolomnya ada
                    if ($hasLabelCol) {
                        $createData['label'] = $label ?? '-';
                    }

                    Employee::create($createData);
                }
            }
        });

        $this->command?->info('EmployeesSeederCsv selesai.');
    }

    protected function detectDelimiter(string $path): string
    {
        $sample = file_get_contents($path, false, null, 0, 4096);
        return substr_count($sample, ';') > substr_count($sample, ',') ? ';' : ',';
    }

    protected function normalizeHeader(array $header): array
    {
        return array_map(function ($h) {
            $h = trim((string)$h);
            $h = mb_strtolower($h);
            $h = str_replace([' ', '.'], '_', $h);
            return preg_replace('/[^a-z0-9_]/u', '', $h);
        }, $header);
    }

    protected function rowToAssoc(array $header, array $row): array
    {
        $row = array_pad($row, count($header), null);
        return array_combine($header, $row);
    }

    protected function getFirst(array $r, array $keys): ?string
    {
        foreach ($keys as $k) {
            if (array_key_exists($k, $r) && $r[$k] !== '' && $r[$k] !== null) {
                return (string)$r[$k];
            }
        }
        return null;
    }
}
