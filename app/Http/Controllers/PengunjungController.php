<?php

namespace App\Http\Controllers;

use App\Models\pengunjung;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengunjung = Pengunjung::latest()->get();
        return view('pengunjung.index', compact('pengunjung'));
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
            'nis' => 'required',
            'nama' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
        ]);

    pengunjung::create($request->all());

    return redirect()->route('pengunjung.index')
            ->with('succes','berhasil menyimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function show(pengunjung $pengunjung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function edit(pengunjung $pengunjung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengunjung $pengunjung)
    {
        $request-> validate([
            'nis' => 'required',
            'nama' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',

        ]);

        $pengunjung->update($request->all());
        return redirect()->route('pengunjung.index')
                            ->with('succes','pengunjung telah di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengunjung $pengunjung)
    {
        $pengunjung->delete();

        return redirect()->route('pengunjung.index')
                    ->with('succes','nerhasil di hapus');
    }
}
