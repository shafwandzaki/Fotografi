@extends('layout.admin')

@section('content')

    <h1 class="mb-6 font-inter text-2xl font-bold">Edit foto</h1>

    <form method="POST" action="{{ route('admin.fotografi.update', $foto) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.fotografi.form', ['genres' => $genres, 'foto' => $foto])
    </form>

@endsection