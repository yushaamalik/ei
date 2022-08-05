@extends('admin.layouts.skote')
@section('content')

<div class="page-content">
    @include('layouts.partials.alerts')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Student</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="">Users/</li>
                            <li class="breadcrumb-item active"><a href="{{Request::segment(2)}}" style="text-transform: capitalize">Add Student</a></li>
                        </ol>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">

                                <form method="POST" action="{{route('admin.student.saveStudent')}}">
                                    @csrf
                                    <div class="row mb-4">
                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="horizontal-firstname-input" name="name" placeholder="Enter Name ">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="horizontal-firstname-input" name="username" placeholder="Enter Username ">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Roll Number</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="horizontal-firstname-input" name="rollNumber" placeholder="Enter Roll Number ">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="horizontal-email-input" name="email" placeholder="Enter Email ID">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">CNIC</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="horizontal-email-input" name="cnic" placeholder="Enter CNIC">
                                        </div>
                                    </div>
                                   
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">

                                
                                    <div class="row mb-4">
                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Session</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="horizontal-firstname-input" name="session" placeholder="Enter Session ">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Department</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="dept" placeholder="Enter Department">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Section</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="section" placeholder="Enter Section">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                          <input type="password" class="form-control" id="horizontal-password-input" name="password" placeholder="Enter Your Password">
                                        </div>
                                    </div>

                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">

                                            <div class="form-check mb-4">
                                                <input class="form-check-input" type="checkbox" id="horizontalLayout-Check">
                                                <label class="form-check-label" for="horizontalLayout-Check">
                                                    Remember me
                                                </label>
                                            </div>

                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection