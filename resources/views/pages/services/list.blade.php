@extends('layouts.admin_layouts')
@section('body')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Service List</h1>
            <ol class="breadcrumb mb-4 dotdoc">
                <li class="breadcrumb-item"><a href="{{ route('admin.service.list') }}">Service List</a>
                </li>
                <li class="breadcrumb-item active">Service List</li>
            </ol>
            <table class="table table-hover">
                <thead>
                  <tr class="text-justify">
                    <th scope="col" style="width: 5%">S/R</th>
                    <th scope="col" style="width: 20%">Icon</th>
                    <th scope="col" style="width: 15%">Title</th>
                    <th scope="col" style="width: 50%">Description</th>
                    <th scope="col" style="width: 10%">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($service->count())
                        @foreach ($service as $item)
                            <tr class="text-justify">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->icon }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ Str::limit(strip_tags($item->description), 200)  }}</td>
                                <td>
                                    <a href="{{ route('admin.service.edit',$item->id) }}" class="btn btn-primary w-75 mb-2">Edit</a>
                                    <form action="{{ route('admin.service.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" name="submit" class="btn btn-danger w-75" value="delete">
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
  
           