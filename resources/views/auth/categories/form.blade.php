@extends('auth.layouts.master')

@isset($category)
    @section('title', 'Редактировать категорию ' . $category->name)
@else
    @section('title', 'Создать категорию')
@endisset

@section('content')
    <div style="margin-top: 40px;">
        @isset($category)
            <h1>Edit category: <b>{{ $category->name }}</b></h1>
        @else
            <h1>Create new category</h1>
        @endisset
    </div>
    <form style="width: 600px; margin-top: 50px;" method="POST" enctype="multipart/form-data"
          @isset($category)
          action="{{ route('categories.update', $category) }}"
          @else
          action="{{ route('categories.store') }}" @endisset >
        @isset($category)
            @method('PUT')
        @endisset
        @csrf
        <div class="form-group">
            <label for="code">Code</label>
            @error('code')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" class="form-control" name="code" id="code"
                   value="{{ old('code', isset($category) ? $category->code : null) }}">
        </div>
        <div class="form-group">
            <label for="name">Name </label>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" class="form-control" name="name" id="name"
                   value="@isset($category){{ $category->name }}@endisset">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <textarea class="form-control" name="description" id="description" cols="72" rows="7">@isset($category){{ $category->description }}@endisset </textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:  </label>
                <label class="btn btn-default btn-file">
                    Upload <input type="file" style="display: none;" name="image" id="image">
                </label>
        </div>
        <button style="margin-top: 15px; height: 50px; font-size: 14px;" class="btn btn-success">Save Category</button>
    </form>
@endsection