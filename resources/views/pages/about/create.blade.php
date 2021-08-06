@extends('layouts.admin_layouts')
@section('body')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Create About</h1>
            <ol class="breadcrumb mb-4 dotdoc">
                <li class="breadcrumb-item"><a href="{{ route('admin.about.create') }}">About</a>
                </li>
                <li class="breadcrumb-item active">About</li>
            </ol>
            <form action="{{ route('admin.about.store') }}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mt-3 ">
                        <h4>Image:</h4>
                        <img src="https://via.placeholder.com/300.png?text=Image" alt="Image" class="img-thumbnail">
                        <input class="mt-2" type="file" name="image" id="img">
                    </div>
                    <div class="col-md-5">
                        <div class="mt-3"> 
                            <label for="title"><h4>Date/Time:</h4></label>
                            <input type="text" name="date" id="date" class="form-control">
                        </div>
                        <div class="mt-3"> 
                            <label for="title"><h4>Title:</h4></label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="title"><h4>Description:</h4></label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary mt-4">
                    </div>
                    
                </div>
            </form>
        </div>
    </main> 
@endsection
  
           