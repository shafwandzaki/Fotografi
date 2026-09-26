@extends('layout.admin')

@section('content')

    <h1 class="mb-6 font-syne text-2xl font-bold">Edit Tools</h1>

    <form method="POST" action="{{ route('admin.tools.update', $tool) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.tools.form', ['tool' => $tool])
    </form>

@endsection