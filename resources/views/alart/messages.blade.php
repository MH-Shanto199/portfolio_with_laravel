@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissable mt-3">
            <strong>Error!</strong>{{ $error }}
            {{-- <button type="button" class="btn-close" data-dismiss="alert">&times;</button> --}}
        </div>
    @endforeach
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissable mt-3">
        <strong>Error!</strong>{{ session('error') }}
        {{-- <button type="button" class="btn-close" data-dismiss="alert">&times;</button> --}}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissable mt-3">
        <strong>Success!</strong>{{ session('success') }}
        {{-- <button type="button" class="btn-close" data-dismiss="alert">&times;</button> --}}
    </div>
@endif