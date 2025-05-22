<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InputController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->input();

        $validatedData = $request->validate([
            'nik' => 'required',
        ], [
            'nik.required' => 'NIK CPPPK Perlu Diisi'
        ]);


        $peserta = DB::table('employees')
            ->selectRaw('*')
            ->where('nik', trim($request->nik))
            ->first();

        if ($peserta) {
            if ($peserta->email && $peserta->nomor_hp && $peserta->nama_ibu_kandung) {
                $errors = [
                    'nik' => 'Peserta dengan nomor ' . $request->nik . ' telah mengisi tilok',
                    'sudah_isi' => true,
                    'peserta' => $peserta
                ];
                return back()->withErrors($errors);
            } else {
                return view('input', compact('peserta'));
            }
        } else {
            $errors = [
                'nik' => 'NIK tidak ditemukan'
            ];
            return back()->withErrors($errors)->withInput($request->all());
        }

        return back()->with('success', 'User created successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeTilok(Request $request)
    {
        // return $request->input();

        $validatedData = $request->validate([
            'nomor_hp' => 'required',
            'email' => 'required',
            'nama_ibu_kandung' => 'required',
        ], [
            'nomor_hp.required' => 'Nomor HP Perlu Diisi',
            'email.required' => 'Email Perlu Diisi',
            'nama_ibu_kandung.required' => 'Nama Ibu Kandung Perlu Diisi'
        ]);

        if ($request->nomor_hp == '') {
            $errors = [
                'nomor_hp' => 'Nomor HP tidak boleh kosong'
            ];
            return back()->withErrors($errors)->withInput($request->all());
        }
         if ($request->email == '') {
            $errors = [
                'email' => 'Email tidak boleh kosong'
            ];
            return back()->withErrors($errors)->withInput($request->all());
        }
         if ($request->nama_ibu_kandung == '') {
            $errors = [
                'nama_ibu_kandung' => 'Nama Ibu Kandung tidak boleh kosong'
            ];
            return back()->withErrors($errors)->withInput($request->all());
        }


        DB::table('employees')
        ->where('id', $request->id)
        ->update([
                'nomor_hp' =>  $request->nomor_hp,
                'email' =>  $request->email,
                'nama_ibu_kandung' =>  $request->nama_ibu_kandung
            ]);


        $peserta = DB::table('employees')
            ->selectRaw('*')
            ->where('id', $request->id)
            ->first();

        return redirect('/')->with('success', 'Data PPPK untuk (' . $peserta->nama .  ' - '. $peserta->nik . ') Sudah Tersimpan');
    }
}
