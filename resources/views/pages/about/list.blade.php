@extends('layouts.admin_layouts')
@section('body')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Portfolio List</h1>
            <ol class="breadcrumb mb-4 dotdoc">
                <li class="breadcrumb-item"><a href="{{ route('admin.portfolio.list') }}">Portfolio List</a>
                </li>
                <li class="breadcrumb-item active">Portfolio List</li>
            </ol>
            <table class="table table-hover">
                <thead>
                  <tr class="text-justify">
                    <th scope="col">S/R</th>
                    <th scope="col">Date/Time</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @if ($abouts->count())
                        @foreach ($abouts as $item)
                            <tr class="text-justify">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ Str::limit(strip_tags($item->description), 200)  }}</td>
                                <td>
                                    <img style="max-width: 15vh" src="{{ asset($item->image) }}" alt="Big Image">
                                </td>
                                <td>
                                    <a href="{{ route('admin.about.edit',$item->id) }}" class="btn btn-primary w-100 mb-2">Edit</a>
                                    <form action="{{ route('admin.about.destroy',$item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" name="submit" class="btn btn-danger" value="delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
              </table>
        </div>
    </main> 
@endsection
  
           