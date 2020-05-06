@extends('back_end.layouts.app')

@section('title','Create Sub Category')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form action="" method="post" >
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
                        <div class="card-header">Create Sub Category</div>
                        <div class="card-body">
                            <div class="form-row mb-4">
                                <div class="col">
                                    <label for="subCategory">Select Category</label>
                                    <select name="category_id" id="subCategory">
                                        <option value="">Select a Category</option>
{{--                                        @foreach($categories as $index=>$category)--}}
{{--                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>--}}
{{--                                        @endforeach--}}
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="subCategory">Sub Category Name</label>
                                    <input type="text" name="sub_category_name" class="form-control"
                                           id="subCategory" placeholder="What is your sub category"
                                    >
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <div class="radio">
                                        <input type="radio" name="sub_category_status" id="radioSub" value="1">
                                        <label for="radioSub">Published</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="sub_category_status" id="radioSubc" value="0">
                                        <label for="radioSubc">Unpublished</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
