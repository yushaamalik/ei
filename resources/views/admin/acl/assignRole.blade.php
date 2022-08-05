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
                            <li class="breadcrumb-item active"><a href="{{Request::segment(2)}}" style="text-transform: capitalize">Assign Role</a></li>
                        </ol>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Assign Role</h4>

                                <form method="POST" action="{{route('admin.acl.assignRoleSave')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">User</label>
                                        <select class="form-control select2" name="userId">
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="mb-3 ">
                                        <label for="formrow-firstname-input" class="form-label">Role</label>
                                        <select class="form-control select2" name="roleId">
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-green w-md">Save</button>
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
