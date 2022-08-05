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
                    <h4 class="mb-sm-0 font-size-18"> Provinces</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="">Provinces/</li>
                            <li class="breadcrumb-item active"><a href="{{Request::segment(2)}}" style="text-transform: capitalize">List </a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!----- Applied FIlters -->
                                <form id="filter_data" name="filter_data">
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <div class="row">
                                                <h4>Filters</h4>
                                                <div class="col-2">
                                                    <select id="status1" name="status" class="form-control">
                                                        <option value="" hidden selected>Status</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">In Active</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-2 text-right">
                                                    <button type="submit" id="submit_filter" class="btn btn-green">Submit</button>                                                
                                                    <button id="reset_filter" class="btn btn-green">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                <!--- End Applied Filters-->
                            </div>
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead class="table-success">
                                        <tr>
                                            <th style="width: 10%">Sr #</th>
                                            <th >Name</th>
                                            <th >Description</th>
                                            <th >Location</th>
                                            <th >Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!--end Row-->
            </div>
        </div>
    </div>
</div>
 <!--- Modal -->
 <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id ="modalcontent">
                    <!-- modal contrnt will be palced here by ajax html component-->
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection
@section('js')
<script src="{{asset('/skote/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/skote/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/skote/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/skote/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
$(function (){

    var testTable = $('#datatable').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        language: {
              processing: '<i class="fa fa-spinner bx-spin text-warning bigger-500" style="font-size:60px;margin-top:50px;"></i>'
            },
        sClass:'text-center',
        ajax:{
            url:"{{ route('admin.province.listing') }}",
            data:function(d){
            d.status = $('#status1').val();
            // d.divisionId= $('#divisionId').val();
            // d.districtId = $('#districtId').val();
            // d.tehsilId = $('#districtId').val();
            // d.cnic = $('#cnic').val();
            }
        },

        columns: [
            {data: 'DT_RowIndex', searchable: false, orderable: false},
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'location', name: 'location'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'},
        ]
    });

    $('#submit_filter').click(function(e){
    e.preventDefault();
    testTable.draw();
    });

})



$(document).on('click','#reset_filter',function(e){
				e.preventDefault();
				$('#filter_data').trigger("reset");
                // $('#districtId').empty();
                // $('#tehsilId').empty();
                // $('select[name="districtId"]').append('<option value="" hidden selected > Select district </option>');
                // $('select[name="tehsilId"]').append('<option value="" hidden selected > Select Tehsil </option>');
                $('#datatable').DataTable().ajax.reload();
});


</script>
@endsection

