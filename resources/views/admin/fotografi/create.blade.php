@extends('layout.admin')

@section('title', 'Tambah Foto')

@section('content')

    <h1 class="mb-6 font-inter text-2xl font-bold">Tambah foto</h1>

    <form method="POST" action="{{ route('admin.fotografi.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.fotografi.form', ['genres' => $genres])
    </form>

@endsection