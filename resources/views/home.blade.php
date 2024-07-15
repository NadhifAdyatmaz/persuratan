@extends('layouts.master')
<style>
    body {
        padding-top: 20px;
    }

    .sidebar {
        height: 100vh;
        background-color: #f8f9fa;
        padding: 10px;
    }

    .content {
        padding: 20px;
    }

    .table-container {
        overflow-x: auto;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
    }

    .btn-download {
        background-color: #ffc107;
        color: white;
    }

    .btn-view {
        background-color: #007bff;
        color: white;
    }
</style>
@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h2>Arsip Surat</h2>
    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>Klik "Lihat" pada kolom aksi untuk
        menampilkan surat.</p>

    <div class="table-container mt-5">
        <table id="example" class="table table-bordered">
            <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Waktu Pengarsipan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($arsips as $arsip)
                    <tr>
                        <td>{{ $arsip->nomor }}</td>
                        <td>{{ $arsip->kategori->name }}</td>
                        <td>{{ $arsip->judul }}</td>
                        <td>{{ $arsip->created_at }}</td>
                        <td>
                            <a href="#" title="Hapus" data-toggle="modal" data-target="#delete-arsip{{ $arsip->id }}"
                                class="btn btn-delete btn-sm">Hapus</a>
                            <a href="{{ route('arsip.download', $arsip->id) }}" class="btn btn-download btn-sm">Unduh</a>
                            <a href="{{ route('viewsurat', $arsip->id) }}" class="btn btn-view btn-sm">Lihat >></a>
                        </td>
                        @include('arsip.delsurat')
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('addsurat') }}" class="btn btn-primary mt-5">Arsipkan Surat</a>
</div>
</div>
@endsection