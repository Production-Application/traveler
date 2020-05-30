@extends('back_end.layouts.app')

@section('title','Packages List')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Exportable</strong> Examples </h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle"
                                                    data-toggle="dropdown" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Attractions</th>
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach($packages as $index=>$package)
                                    <tr>
                                        <td>{{ $index +1 }}</td>
                                        <td>{{ $package->package_title }}</td>
                                        <td>{!! Str::limit($package->package_des,'200') !!}</td>
                                        <td>{{ $package->package_attractions }}</td>
                                        <td style="width: 120px"><img src="{{ asset("uploads/$package->package_img") }}" alt=""></td>
                                        <td style="width:75px">
                                            <a href="{{ route('category.edit',['slug'=>$package->slug]) }}" class="btn btn-warning btn-sm"><i class="zmdi zmdi-eyedropper"></i></a>
                                            <a href="" class="btn btn-danger btn-sm"
                                               onclick="event.preventDefault();
                                               document.getElementById('deleteCategory').submit()">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>

                                            <form action="{{ route('category.delete') }}" method="post" id="deleteCategory">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $package->id }}">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
