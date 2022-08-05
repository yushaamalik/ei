@extends('layouts.adminTemplate')
@section('content')

<div class="content">
    {{-- <section class="mx-md-n3 mb-3 dashboard-banner">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    
                </div>
                <!-- end row -->
            </div>
        </div>
    </section> --}}
    <section class="stat-container">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
								<h4 class="h4 my-md-4 my-3">Assign Role To User</h4>
							</div>
							<div class="col-md-6 text-md-right pt-md-4 pr-md-0">
								
							</div>
						</div>
					</div>
				</section>
				{{--  --}}
                <section class="report-listing">
					<div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="POST" action="{{route('acl.assignRoleToUserSave')}}" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label >User</label>
                                    <select name="userId" class="form-control">
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Role</label>
                                    <select name="roleId" class="form-control">
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>    
                                    <button type="submit" class="btn btn-theme">Save</button>
                                    
                                </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </section>
			</div>
@endsection