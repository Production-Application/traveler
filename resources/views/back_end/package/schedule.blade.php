@extends('back_end.layouts.app')

@section('title','Create Schedule')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form action="" method="post">
                    @csrf

                    {{-- Errors Showing Section --}}
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

                    {{-- Action Success or Failed Section--}}
                    @if(session()->has('message'))
                        <div class="alert alert-{{ session('type') }}">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="schedule">Select a Package</label>
                                    <select name="package_id" class="form-control form-control-sm" id="">
                                        <option value="">-- Please select a package --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="schedule">Schedule Date</label>
                                    <input type="calender" name="schedule_date"
                                           class="form-control form-control-sm" id="schedule"
                                           value="{{ old('schedule_date') }}"
                                    />
                                </div>
                                <div class="col">
                                    <label for="schedule">Schedule Date</label>
                                    <input type="time" name="schedule_time"
                                           class="form-control form-control-sm" id="schedule"
                                           value="{{ old('schedule_time') }}"
                                    />
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="schedule">Maximum Member</label>
                                    <input type="number" name="schedule_member"
                                           class="form-control form-control-sm" id="schedule"
                                           value="{{ old('schedule_member') }}"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
