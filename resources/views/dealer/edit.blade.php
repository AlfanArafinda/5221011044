@extends('layout.template')
    <!-- START FORM -->
    @section('konten')

    <div style="text-align: center;"> 
        <img src="{{ asset('images/dealer.png') }}" alt="Logo" style="max-width: 900px; display: inline-block; vertical-align: middle; margin-right: 50px;">
    </div>

    <form action='{{ url('dealer/'.$data->kode) }}' method='post'>
    @csrf
    @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('dealer') }}' class="btn btn-secondary"><< Kembali</a>
            <div class="mb-3 row">
                <label for="kode" class="col-sm-2 col-form-label">KODE</label>
                <div class="col-sm-10">
                    {{ $data->kode }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ $data->nama }}"id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='jenis' value="{{ $data->jenis }}"id="jenis">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jenis" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div> 
        </div>
    </form>
        <!-- AKHIR FORM -->
    @endsection

        