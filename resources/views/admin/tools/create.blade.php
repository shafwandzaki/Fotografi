@extends('layout.admin')

@section('content')

    <h1 class="mb-6 font-syne text-2xl font-bold">Tambah Tools</h1>

    <form method="POST" action="{{ route('admin.tools.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.tools.form')
    </form>

@endsection