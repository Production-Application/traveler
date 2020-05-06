@extends('back_end.layouts.app')

@section('title','Create Package')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('package') }}" method="post">
                    @csrf

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @if($errors->count() == 1)
                                {{ $errors }}
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
                    <div class="form-row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">Package General Information</div>
                                <div class="card-body">
                                    <div class="form-row mb-3">
                                        <label for="package">Select a category</label>
                                        <select name="category_id" class="form-control form-control-sm" id="package">
                                            <option value="">-- Please select a category --</option>
                                        </select>
                                    </div>
                                    <div class="form-row mb-3">
                                        <label for="package">Select a sub category</label>
                                        <select name="sub_category_id" class="form-control form-control-sm" id="package">
                                            <option value="">-- Please select a sub category --</option>
                                        </select>
                                    </div>
                                    <div class="form-row mb-3">
                                        <label for="package">Package Title</label>
                                        <input type="text" name="package_title"
                                               class="form-control form-control-sm" id="package"
                                               value="{{ old('package_name') }}"
                                               placeholder="Coxsbazar is world's longest sea beach"
                                        >
                                    </div>
                                    <div class="form-row mb-3">
                                        <label for="package">Package Sub Title</label>
                                        <input type="text" name="package_sub_title"
                                               class="form-control form-control-sm" id="package"
                                               value="{{ old('package_name') }}"
                                               placeholder="120 km longest sea beach is consist with verities eco system"
                                        >
                                    </div>
                                    <div class="form-row mb-3">
                                        <label for="package">Package Duration</label>
                                        <input type="text" name="package_duration"
                                               class="form-control form-control-sm" id="package"
                                               value="{{ old('package_duration') }}"
                                               placeholder="10 days / 11 nights"
                                        >
                                    </div>
                                </div>
{{--                                Card Body End point --}}
                            </div>
                        </div>

                        <div class="col">Right site panel</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
