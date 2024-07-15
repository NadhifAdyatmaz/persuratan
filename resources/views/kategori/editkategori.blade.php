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
    <h2>Kategori Surat >> Edit</h2>
    <!-- <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>Catatan:<br> - Gunakan file berformat PDF</p> -->
    <div class="form-container">
    <div class="form-container">
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $kategori->name }}">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan">{{ $kategori->keterangan }}</textarea>
            </div>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                << Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection