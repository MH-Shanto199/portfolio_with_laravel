@extends('layouts.admin_layouts')
@section('body')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit About</h1>
            <ol class="breadcrumb mb-4 dotdoc">
                <li class="breadcrumb-item"><a href="{{ route('admin.about.create') }}">Create About</a>
                </li>
                <li class="breadcrumb-item active">Edit About</li>
            </ol>
            <form action="{{ route('admin.about.update',$about->id) }}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <h4>Image:</h4>
                        <img src="{{ asset($about->image) }}" alt="image" class="img-thumbnail" style="height: 20vw">
                        <input class="mt-2" type="file" name="image" id="big_img">
                    </div>
                    <div class="col-md-5">
                        <div class="mt-3"> 
                            <label for="title"><h4>Date:</h4></label>
                            <input type="text" name="date" id="date" class="form-control" value="{{ $about->date }}">
                        </div>
                        <div class="mt-3"> 
                            <label for="title"><h4>Title:</h4></label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $about->title }}">
                        </div>
                        <div class="mt-3">
                            <label for="title"><h4>Description:</h4></label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $about->description }}</textarea>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary mt-4">
                    </div>
                    
                </div>
            </form>
        </div>
    </main> 
@endsection
  
           