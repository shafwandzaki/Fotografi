@extends('layout.admin')

@section('content')

    <h1 class="mb-6 font-syne text-2xl font-bold">Edit gear</h1>

    <form method="POST" action="{{ route('admin.gear.update', $gear) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.gear.form', ['gear' => $gear])
    </form>

@endsection