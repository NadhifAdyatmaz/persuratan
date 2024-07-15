@extends('layouts.master')

@section('content')
<div class="container">
    <div class="content-header">
        <h2>Arsip Surat &gt;&gt; Lihat</h2>
        <p><strong>Nomor:</strong> {{ $arsip->nomor }}</p>
        <p><strong>Kategori:</strong> {{ $arsip->kategori->name }}</p>
        <p><strong>Judul:</strong> {{ $arsip->judul }}</p>
        <p><strong>Waktu Unggah:</strong> {{ $arsip->created_at }}</p>
    </div>
    <div class="file-content">
        <embed src="{{ Storage::url($arsip->file) }}" type="application/pdf" width="100%" height="600px" />
    </div>
    <div class="d-flex justify-content-between mt-3">
        <a href="{{ route('home') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
        <div>
            <a href="{{ route('arsip.download', $arsip->id) }}" class="btn btn-primary">Unduh</a>
            <a href="{{ route('arsip.edit', $arsip->id) }}" class="btn btn-warning">Edit/Ganti File</a>
        </div>
    </div>
</div>
@endsection
