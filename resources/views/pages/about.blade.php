@extends('layouts.admin_layouts')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">About</h1>
        <ol class="breadcrumb mb-4 dotdoc">
            <li class="breadcrumb-item"><a href="{{ route('admin.about') }}">About</a></li>
            <li class="breadcrumb-item active">About</li>
        </ol>
    </div>
</main> 
@endsection
