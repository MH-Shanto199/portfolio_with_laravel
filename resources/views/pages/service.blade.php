@extends('layouts.admin_layouts')
@section('body')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Services</h1>
            <ol class="breadcrumb mb-4 dotdoc">
                <li class="breadcrumb-item"><a href="{{ route('admin.service') }}">Services</a></li>
                <li class="breadcrumb-item active">Services</li>
            </ol>
        </div>
    </main> 
@endsection
  
           