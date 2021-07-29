    @extends('layouts.admin_layouts')
    @section('body')
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Main</h1>
                <ol class="breadcrumb mb-4 dotdoc">
                    <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Main</a>
                    </li>
                    <li class="breadcrumb-item active">Main</li>
                </ol>
                <form action="{{ route('admin.main.update') }}" method="post"             enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <h4>background image</h4>
                            <img src="{{ asset( $main->bg_image) }}" alt="background image" style="height: 30vh" class="img-thumbnail">
                            <input class="mt-2" type="file" name="bg_img" id="bg_img">
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="mt-3"> 
                                <label for="title"><h4>Title</h4></label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $main->title }}">
                            </div>
                            <div class="mt-3"> 
                                <label for="title"><h4>Sub Title</h4></label>
                                <input type="text" name="sub_title" id="sub_title" class="form-control" value="{{ $main->sub_title }}">
                            </div>
                            <div class="mt-3"> 
                                <label for="title"><h4>Upload Resume</h4></label>
                                <input class="mt-2" type="file" name="resume" id="resume">
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary mt-4">
                </form>
            </div>
        </main> 
    @endsection
      
               