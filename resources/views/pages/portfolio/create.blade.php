@extends('layouts.admin_layouts')
@section('body')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Create Portfolio</h1>
            <ol class="breadcrumb mb-4 dotdoc">
                <li class="breadcrumb-item"><a href="{{ route('admin.portfolio.create') }}">Portfolio</a>
                </li>
                <li class="breadcrumb-item active">Portfolio</li>
            </ol>
            <form action="{{ route('admin.portfolio.store') }}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3 mt-3 ">
                        <h4>Thumbnail image:</h4>
                        <img src="https://via.placeholder.com/300.png?text=Thumbnail+image" alt="Thumbnail image" class="img-thumbnail">
                        <input class="mt-2" type="file" name="big_image" id="big_img">
                    </div>
                    <div class="col-md-3 mt-3">
                        <h4>Cover Image:</h4>
                        <img src="https://via.placeholder.com/200.png?text=Cover+image" alt="Cover image" class="img-thumbnail">
                        <input class="mt-2" type="file" name="small_image" id="big_img">
                    </div>
                    <div class="col-md-6">
                        <div class="mt-3"> 
                            <label for="title"><h4>Title:</h4></label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="mt-3"> 
                            <label for="title"><h4>Sub Title:</h4></label>
                            <input type="text" name="sub_title" id="sub_title" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="title"><h4>Description:</h4></label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="mt-3"> 
                            <label for="title"><h4>Clint Name:</h4></label>
                            <input type="text" name="clint" id="sub_title" class="form-control">
                        </div>
                        <div class="mt-3"> 
                            <label for="title"><h4>Category Name:</h4></label>
                            <input type="text" name="category" id="sub_title" class="form-control">
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary mt-4">
                    </div>
                    
                </div>
            </form>
        </div>
    </main> 
@endsection
  
           