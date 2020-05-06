@extends('back_end.layouts.app')

@section('title','Create Category')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <form action="{{ route('category') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @if($errors->count() == 1)
                                {{ $errors->first() }}
                            @else
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endif

                    @if(session()->has('message'))
                        <div class="alert alert-{{ session('type') }}">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">Create New Category</div>
                        <div class="card-body">
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="categoryForm">Category Name</label>
                                    <input type="text" name="category_name" class="form-control"
                                           id="categoryForm" value="{{ old('category_name') }}"/>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="categoryForm">Category Description</label>
                                    <textarea name="category_des" class="form-control"
                                              id="categoryForm" rows="3">{{ old('category_des') }}</textarea>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <div class="radio">
                                        <input type="radio" name="category_status" id="radioPub" value="1">
                                        <label for="radioPub">Published</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="category_status" id="radioUnpub" value="0">
                                        <label for="radioUnpub">Unpublished</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="categoryForm">Select a Category Image</label>
                                    <input type="file" name="category_img" class="form-control" id="dropify-event">
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
