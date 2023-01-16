@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Create new Project</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{Route('admin.projects.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Project name...">
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="3" placeholder="Project body...">{{old('body')}}</textarea>
        </div>

        <div class="mb-3">
            <label for="cover_img" class="form-label">Cover Image</label>
            <input type="file" name="cover_img" id="cover_img" class="form-control @error('cover_img') is-invalid @enderror" placeholder="Cover image...">
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                <option value="null" selected>No type</option>

                @foreach($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection