@extends('layout.admin')

@section('content')

    <h1 class="mb-6 font-syne text-2xl font-bold">Tambah karya</h1>

    <form method="POST" action="{{ route('admin.karya.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.karya.form')
    </form>

@endsection