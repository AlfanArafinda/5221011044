<?php

namespace App\Http\Controllers;

use App\Models\dealer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dealerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = dealer::where('kode', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('jenis', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        }else {
            $data = dealer::orderBy('kode','desc')->paginate($jumlahbaris);
        }
        return view('dealer.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dealer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Session::flash('kode',$request->kode);
        Session::flash('nama',$request->nama);
        Session::flash('jenis',$request->jenis);
        $request->validate([
            'kode'=>'required|numeric|unique:dealer,kode',
            'nama'=>'required',
            'jenis'=>'required',
        ],[
            'kode.required'=>'KODE wajib diisi',
            'kode.numeric'=>'KODE wajib dalam bentuk angka',
            'kode.unique'=>'KODE yang diisikakn sudah ada dalam database',
            'nama.required'=>'Nama wajib diisi',
            'jenis.required'=>'Jenis wajib diisi',
        ]);
        $data = [
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'jenis'=>$request->jenis,
        ];
        dealer::create($data);
        return redirect()->to('dealer')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = dealer::where('kode', $id)->first();
        return view('dealer.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'jenis'=>'required',
        ],[
            'nama.required'=>'Nama wajib diisi',
            'jenis.required'=>'Jenis wajib diisi',
        ]);
        $data = [
            'nama'=>$request->nama,
            'jenis'=>$request->jenis,
        ];
        dealer::where('kode',$id)->update($data);
        return redirect()->to('dealer')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dealer::where('kode',$id)->delete();
        return redirect()->to('dealer')->with('succes','Berhasil Menghapus Data');
    }
}
