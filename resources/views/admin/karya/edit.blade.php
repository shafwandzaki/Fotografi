@extends('layout.admin')

@section('content')

    <h1 class="mb-6 font-syne text-2xl font-bold">Edit karya</h1>

    <form method="POST" action="{{ route('admin.karya.update', $karya) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.karya.form', ['karya' => $karya])
    </form>

@endsection