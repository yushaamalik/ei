{{-- @extends('layouts.adminTemplate')
@section('content')

<div class="content">
    @include('layouts.partials.alerts')

    <section class="stat-container">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
								<h4 class="h4 my-md-4 my-3">Assign Permission To Role</h4>
							</div>
							<div class="col-md-6 text-md-right pt-md-4 pr-md-0">
								
							</div>
						</div>
					</div>
				</section>
                <section class="report-listing">
					<div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="POST" action="{{route('acl.assignPermissionToRoleSave')}}" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label >Role</label>
                                    <select name="roleId" class="form-control">
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Permissions</label>
                                    <ul>
                                        @foreach($permissions as $permission)
                                        <li><input type="checkbox" name="permissionIds[]" value="{{$permission->id}}">  {{$permission->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>    
                                    <button type="submit" class="btn btn-theme">Save</button>
                                    
                                </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </section>
			</div>
@endsection --}}


@extends('layouts.masterTemplate')
@section('css')
<link href="/skote/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

@endsection
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
                                <h4 class="card-title mb-4">Assign Permissions to Role</h4>

                                <form method="POST" action="{{route('acl.assignPermissionToRoleSave')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Role Name</label>
                                        {{-- <input type="text" class="form-control" id="formrow-firstname-input" name="roleName" placeholder="Role Name" required> --}}
                                        <select name="roleId" class="form-control select2">
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="formrow-firstname-input" class="form-label">Permissions</label>
                                        <ol>
                                            @foreach($permissions as $permission)
                                            <li><input type="checkbox" name="permissionIds[]" value="{{$permission->id}}" class="form-check-input" style="width: 20px; height:20px;">  {{$permission->name}}</li>
                                            @endforeach
                                        </ol>
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Save</button>
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

@section('js')
<script src="/skote/assets/libs/select2/js/select2.min.js"></script>
<script src="/skote/assets/js/pages/form-advanced.init.js"></script>
@endsection