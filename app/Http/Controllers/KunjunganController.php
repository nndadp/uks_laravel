<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\pengunjung;
use App\Models\obat;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kunjungan = kunjungan::latest()->get();
        $pengunjung = pengunjung::latest()->get();
        $obat = obat::latest()->get();
        return view('kunjungan.index',compact('kunjungan', 'pengunjung', 'obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis'=> 'required',
            'tgl_kunjungan'=> 'required',
            'keperluan'=> 'required',
            'nama_obat'=> 'required',
            'jumlah_obat'=> 'required',
        ]);

    kunjungan::create($request->all());

    return redirect()->route('kunjungan.index')
            ->with('succes','berhasil menyimpan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function show(Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kunjungan $kunjungan)
    {
        $request-> validate([
            'nis' => 'required',
            'tgl_kunjungan' => 'required',
            'keperluan' => 'required',
            'nama_obat' => 'required',
            'jmlh_obat' => 'required',
        ]);

        $kunjungan->update($request->all());
        return redirect()->route('kunjungan.index')
                            ->with('succes','telah di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kunjungan $kunjungan)
    {
        $kunjungan->delete();

        return redirect()->route('kunjungan.index')
                        ->with('succes','telah ditambah');
    }
}
