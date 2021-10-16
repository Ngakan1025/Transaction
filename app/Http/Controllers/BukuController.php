<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori')->paginate(100);
        return view('buku', compact('buku'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('input', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $message=[
            'required' => "Kolom :attribute harus lengkap",
            'date' => "Kolom :attribute harus tanggal",
            'numeric' => "Kolom :attribute harus angka"
            ];
            $validasi = $request->validate([
                'judul' => 'required|unique:buku|max:255',
                'kategori_id'=> 'required',
                'penulis' => 'required',
                'penerbit' => 'required',
            ],$message);
            Buku::create($validasi);
            DB::commit();
            return redirect('buku')->with('success', 'Data berhasil tersimpan');
        } catch (\Throwable $e) {
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $buku = Buku::with('kategori')->find($id);
        return view('input', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message=[
            'required' => "Kolom :attribute harus lengkap",
            'date' => "Kolom :attribute harus tanggal",
            'numeric' => "Kolom :attribute harus angka"
        ];
        $validasi = $request->validate([
            'judul' => 'required|unique:buku|max:255',
            'kategori_id' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required'
        ],$message);       
        Buku::where('id', $id)->update($validasi);

        return redirect('buku')->with('success', 'Data berhasil terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        if ($buku != null) {
            Storage::delete($buku->cover);
            $buku = Buku::find($buku->id);
            Buku::where('id', $id)->delete();
        }
        
        return redirect('buku')->with('success', 'Data berhasil terhapus');
    }


}