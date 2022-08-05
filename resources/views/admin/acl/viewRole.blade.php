{{-- @extends('layouts.adminTemplate')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.0/b-colvis-2.1.0/b-html5-2.1.0/b-print-2.1.0/cr-1.5.5/date-1.1.1/fc-4.0.1/fh-3.2.0/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/sp-1.4.0/sl-1.3.3/sr-1.0.1/datatables.min.css"/>

	
@endsection
@section('content')

<div class="content">
    
    <section class="stat-container">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
								<h4 class="h4 my-md-4 my-3">Role</h4>
							</div>
							<div class="col-md-6 text-md-right pt-md-4 pr-md-0">
								
							</div>
						</div>
					</div>
				</section>
    
    <section class="report-listing">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 px-0">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h4>{{$role->name}}</h4> 
                            <hr>

                            Permissions : 
                            <ol>
                                @foreach($rolePermissions as $key => $permission)
                                <li>
                                    {{$permission->name}}
                                </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <meta name="csrf-token" content="{{ csrf_token() }}">             
</div>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.0/b-colvis-2.1.0/b-html5-2.1.0/b-print-2.1.0/cr-1.5.5/date-1.1.1/fc-4.0.1/fh-3.2.0/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/sp-1.4.0/sl-1.3.3/sr-1.0.1/datatables.min.js"></script>


@endsection --}}



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
                            <li class="breadcrumb-item active"><a href="{{Request::segment(3)}}" style="text-transform: capitalize">{{Request::path()}}</a></li>
                        </ol>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">{{$role->name}}</h4>

                                Permissions : 
                            <ol>
                                @foreach($rolePermissions as $key => $permission)
                                <li>
                                    {{$permission->name}}
                                </li>
                                @endforeach
                            </ol>
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