@extends('layouts.master')

<style>
    .content {
        padding: 20px;
    }
    .form-container {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 5px;
    }
</style>

@section('content')
<div class="container">
    <h2>Arsip Surat >> Edit</h2>
    <p>Edit surat yang telah terbit pada form ini untuk diarsipkan.<br>Catatan:<br> - Gunakan file berformat PDF</p>
    <div class="form-container">
        <form action="{{ route('arsip.update', $arsip->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- karena menggunakan method PUT untuk update -->

            <div class="form-group">
                <label for="nomor">Nomor Surat</label>
                <input type="text" class="form-control" id="nomor" name="nomor" value="{{ $arsip->nomor }}" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="form-control" id="kategori" name="kategori_id" required>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $arsip->kategori_id == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $arsip->judul }}" required>
            </div>

            <div class="form-group">
                <label for="file">File Surat (PDF)</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file" name="file">
                    <label class="custom-file-label" for="file">Choose file</label>
                </div>
            </div>

            <a href="{{ route('home') }}" class="btn btn-secondary"><< Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
