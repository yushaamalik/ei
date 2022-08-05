@extends('admin.layouts.skote')
@section('css')
<link href="{{asset('/skote/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/skote/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"  type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{asset('/skote/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"  type="text/css"  />
<link href="{{asset('/skote/assets/libs/sweetalert2/sweetalert2.min.css')}}"  rel="stylesheet"  type="text/css"  />

@endsection
@section('content')
<div class="page-content">
    @include('layouts.partials.alerts')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"> Roles</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="">Roles/</li>
                            <li class="breadcrumb-item active"><a href="{{Request::segment(2)}}" style="text-transform: capitalize">Listing</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Roles Listing</h4>


                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead class="table-success">
                                        <tr>
                                            <th style="width: 10%">Sr #</th>
                                            <th style="width:55%">Name</th>

                                            <th style="width: 15%">Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $key => $role)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$role->name}}</td>
                                            <td>Active</td>

                                            <td><div class="btn-group">
                                                {{-- <a href="/acl/role-view/{{$role->id}}" class="btn btn-primary"><i class="far fa-eye"></i></a> --}}
                                                <a href="{{route('admin.acl.viewRole',['id'=>$role->id])}}" class="btn btn-primary"><i class="far fa-eye"></i></a>

                                                <a href="{{route('admin.acl.editRole',['id'=>$role->id])}}" class="btn btn-success"><i class="fas fa-edit"></i></a>

                                                <form method="POST" action="{{route('admin.acl.deleteRole',['id'=>$role->id])}}">
                                                    @method('PUT')
                                                    @csrf
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                                {{-- <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-warning-custom">Delete</button> --}}
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div>
        </div>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('js')
<script src="{{asset('/skote/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/skote/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('/skote/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/skote/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/skote/assets/libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('/skote/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('/skote/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('/skote/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/skote/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/skote/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('/skote/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/skote/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{asset('/skote/assets/js/pages/datatables.init.js')}}"></script>

<script src="{{asset('/skote/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

        <!-- Sweet alert init js-->
<script src="{{asset('/skote/assets/js/pages/sweet-alerts.init.js')}}"></script>


@endsection
