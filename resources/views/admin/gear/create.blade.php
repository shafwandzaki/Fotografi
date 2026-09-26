@extends('layout.admin')

@section('content')

    <h1 class="mb-6 font-syne text-2xl font-bold">Tambah gear</h1>

    <form method="POST" action="{{ route('admin.gear.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.gear.form')
    </form>

@endsection