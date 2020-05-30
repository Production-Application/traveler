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
                        <div class="card-header">Create Schedule</div>
                        <div class="card-body">
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="schedule">Select a Package</label>
                                    <select name="package_id" class="form-control form-control-sm" id="packageTitle" >
                                        <option selected> -- Please select a package -- </option>
                                        @foreach($packages as $package)
                                            <option value="{{ $package->id }}">{{ $package->package_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="scheduleDate">Departure Date</label>
                                    <input type="text" name="package_date"
                                           class="form-control form-control-sm timepicker" id="departureDate"
                                           value="{{ old('package_date') }}"
                                    />
                                </div>
                                <div class="col">
                                    <label for="scheduleTime">Departure Time</label>
                                    <input type="text" name="package_time"
                                           class="form-control form-control-sm" id="departureTime"
                                           value="{{ old('package_time') }}"
                                           min="1"
                                    />
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="schedule">Maximum Member</label>
                                    <input type="number" name="package_member"
                                           class="form-control form-control-sm" id="packageMember"
                                           value="{{ old('package_member') }}"
                                    />
                                </div>
                                <div class="col">
                                    <label for="schedule">Package Expense</label>
                                    <input type="number" name="package_expense"
                                           class="form-control form-control-sm" id="schedule"
                                           value="{{ old('package_expense') }}"
                                    />
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="schedule">Package Duration</label>
                                    <input type="text" name="package_duration" id="schedule"
                                    class="form-control form-control-sm" onblur="createPackageCode()"
                                    />
                                </div>
                                <div class="col">
                                    <label for="schedule">Package Code</label>
                                    <input type="text" name="package_code" id="packageCode"
                                           class="form-control form-control-sm" readonly
                                    />
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <input type="submit" class="btn btn-success" value="Submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $( "#departureDate" ).dateDropper({
            theme: 'leaf',
            format:'d-m-Y',
        });
    </script>
    <script>
        $('#departureTime').wickedpicker()
    </script>
    <script>
        function createPackageCode() {
            var rand = Math.random().toString(36).slice(2, 10).split('').map(c => Math.random() < 1.5 ? c.toUpperCase() : c).join('');
            var title = rand+'-'+'M'+ document.getElementById('packageTitle').value;
            var date = document.getElementById('departureDate').value;
            var time = document.getElementById('departureTime').value;
            var member = document.getElementById('packageMember').value;

            const code = title+'-'+date+'-'+time.slice(0,7).replace(' ','')+'-'+'MAM'+member;

            document.getElementById('packageCode').value = code;
        }
    </script>
@endpush
