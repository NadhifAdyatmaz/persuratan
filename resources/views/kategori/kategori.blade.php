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
    <h2>Kategori Surat</h2>
    <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.<br>Klik "Tambah" pada kolom untuk
        menambahkan kategori baru.</p>
    
    <div class="table-container mt-5">
        <table id="example" class="table table-bordered">
            <thead>
                <tr>
                    <th>No Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $key => $item)

                    <tr>
                        <td scope="row">{{ $key + 1 }}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->keterangan}}</td>
                        <td>
                            <a href="#" title="Hapus" data-toggle="modal" data-target="#delete-kat{{ $item->id }}"
                                class="btn btn-delete btn-sm">Hapus</a>
                                <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-view btn-sm">Edit</a>
                        </td>

                        @include('kategori.delkategori')
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary mt-5">[+] Tambah Kategori Baru..</a>
</div>
</div>
@endsection