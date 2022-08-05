


@extends('admin.layouts.skote')
@section('content')
<div class="page-content">
    @include('layouts.partials.alerts')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">ACL</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="">ACL/</li>
                            <li class="breadcrumb-item active"><a href="{{Request::segment(2)}}" style="text-transform: capitalize">{{Request::path()}}</a></li>
                        </ol>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">View Permission</h4>

                                <form method="POST" action="{{route('admin.acl.savePermission')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Permission Name</label>
                                         {{$permission->name}}  
                                    </div>
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Permission Description</label>
                                       {{$permission->description}} 
                                    </div>
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Roles</label>
                                        @foreach($permission->roles as $key => $role)
                                        {{$role->name}} 
                                        
                                        @endforeach
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