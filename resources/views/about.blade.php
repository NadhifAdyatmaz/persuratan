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
    .profile-pic {
            width: 100px;
            height: 100px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            margin-right: 20px;
    }
</style>
@section('content')
<div class="container">
    <div class="content-header">
        <h2>About</h2>
    </div>
    <div class="d-flex">
        <div class="profile-pic">
            <span>&#128100;</span>
        </div>
        <div>
            <p>Aplikasi ini dibuat oleh:</p>
            <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Prodi:</strong> {{ Auth::user()->prodi }}</p>
            <p><strong>NIM:</strong> {{ Auth::user()->nim }}</p>
            <p><strong>Tanggal:</strong> {{ Auth::user()->created_at }}</p>
        </div>
    </div>
</div>
@endsection