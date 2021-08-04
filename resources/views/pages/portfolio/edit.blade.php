@extends('layouts.admin_layouts')
@section('body')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Services</h1>
            <ol class="breadcrumb mb-4 dotdoc">
                <li class="breadcrumb-item"><a href="{{ route('admin.service.create') }}">Edit Services</a>
                </li>
                <li class="breadcrumb-item active">Edit Services</li>
            </ol>
            <form action="{{ route('admin.service.update',$service->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 mt-4">
                        <div class="mt-3"> 
                            <label for="icon"><h4>Font Awesome Icon:</h4></label>
                            <input type="text" name="icon" id="icon" class="form-control" value="{{ $service->icon }}">
                        </div>
                        <div class="mt-3"> 
                            <label for="title"><h4>Title:</h4></label>
                            <input type="text" name="title" id="title" class="form-control"  value="{{ $service->title }}">
                        </div>
                        <div class="mt-3"> 
                            <label for="title"><h4>Description:</h4></label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $service->description }}</textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary mt-4">
            </form>
        </div>
    </main> 
@endsection
  
           