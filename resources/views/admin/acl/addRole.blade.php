@extends('admin.layouts.skote')
@section('content')
<div class="page-content">
    @include('layouts.partials.alerts')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Users</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="">Users/</li>
                            <li class="breadcrumb-item active"><a href="{{Request::segment(2)}}" style="text-transform: capitalize">Add Role</a></li>
                        </ol>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Add Role</h4>

                                <form method="POST" action="{{route('admin.acl.saveRole')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Role Name</label>
                                        <input type="text" class="form-control" id="formrow-firstname-input" name="roleName" placeholder="Role Name" required>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="formrow-firstname-input" class="form-label">Permissions</label>
                                        <ol>
                                            @foreach($permissions as $permission)
                                            <li><input type="checkbox" name="permissionIds[]" value="{{$permission->id}}" class="form-check-input" style="width: 20px; height:20px;">  {{$permission->description}}</li>
                                            @endforeach
                                        </ol>
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-green w-md">Add Role</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
        </div>
@endsection
