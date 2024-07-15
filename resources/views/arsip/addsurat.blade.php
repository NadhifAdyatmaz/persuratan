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
    <h2>Arsip Surat >> Unggah</h2>
    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>Catatan:<br> - Gunakan file berformat PDF</p>
    <div class="form-container">
        <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nomor">Nomor Surat</label>
                <input type="text" class="form-control" id="nomor" name="nomor" required>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="form-control" id="kategori" name="kategori_id" required>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="form-group">
                <label for="file">File Surat (PDF)</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file" name="file" required>
                    <label class="custom-file-label" for="file">Choose file</label>
                </div>
            </div>
            <a href="{{ route('home') }}" class="btn btn-secondary"><< Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
