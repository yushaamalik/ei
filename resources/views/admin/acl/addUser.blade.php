@extends('admin.layouts.skote')
@section('css')
<link href="{{asset('/skote/assets/libs/select2/css/select2.min.css" rel="stylesheet')}}" type="text/css" />
@endsection

@section('content')
<div class="page-content">
    @include('layouts.partials.alerts')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add User</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="">Users/</li>
                            <li class="breadcrumb-item active"><a href="{{Request::segment(2)}}" style="text-transform: capitalize">Add New</a></li>
                        </ol>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{route('admin.acl.saveUser')}}" enctype="multipart/form-data" class="needs-validation">
                                    @csrf
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="name">Name: <span class="mandatory_style">*</span></label>
                                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Type the Name" required>
                                                <div class="invalid-feedback">
                                                        Please select a valid state.
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="email">Email Address: <span class="mandatory_style">*</span></label>
                                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Type the Email Address" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="cnic">CNIC/User Name: <span class="mandatory_style">*</span></label>
                                                <input type="text" name="cnic" id="cnic" value="{{ old('cnic') }}" min="1" maxlength="13" step="1" onKeyPress="if(this.value.length==13) return false;" class="form-control" placeholder="Type the CNIC Number" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="user_picture">Image: <span class="mandatory_style">*</span></label>
                                                <div class="custom-file">
                                                    <input class="form-control" type="file" name="user_picture" id="user_picture">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="password">Password: <span class="mandatory_style">*</span></label>
                                                <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control" placeholder="Type the Password" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="confirmpassword">Confirm Password: <span class="mandatory_style">*</span></label>
                                                <input type="password" name="confirmpassword" id="confirmpassword" value="{{ old('confirmpassword') }}" class="form-control" placeholder="Type the Confirm Password" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="mobile">Mobile Number: <span class="mandatory_style">*</span></label>
                                                <input type="text" name="mobile" id="mobile" value="{{ old('mobile') }}" class="form-control" placeholder="Type the Mobile Number" min="1" maxlength="11" step="1" onKeyPress="if(this.value.length==11) return false;" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="name">Role <span class="mandatory_style">*</span></label>
                                                <br>
                                                <select name ="roleId" id="roleId" class="form-control select2" onchange="checkRole();" data-live-search="true">
                                                    @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-4">
                                            <div class="mb-3" id="divisionDropdown">
                                                <label class="form-label" for="name">Division <span class="mandatory_style">*</span></label>
                                                <br>
                                                <select name ="divisionId" id="divisionId" class="form-control select2" onchange="getDistrictsByDivisionId();"  data-live-search="true">
                                                    @foreach($divisions as $division)
                                                    <option value="{{$division->id}}">{{$division->name_en}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3" id="districtDropdown">
                                                <label for="name">District: <span class="mandatory_style">*</span></label>
                                                <select class="form-control select2" name="districtId" id="districtId" onchange="getTehsilsByDistrictId();">
                                                    <option value="null">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3" id="tehsilDropdown">
                                            <label for="name">Tehsil: <span class="mandatory_style">*</span></label>
                                            <select class="form-control select2" name="tehsilId" id="tehsilId">
                                                <option value="null">Select</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mb-3" id="companyDropdown">
                                                <label class="form-label" for="name">Company <span class="mandatory_style">*</span></label>
                                                <br>
                                                <select name ="companyId" id="companyId" class="form-control select2" data-live-search="true">
                                                    <option value="" hidden selected>Select Company</option>
                                                    @foreach($companies as $company)
                                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-3">
                                            <button type="submit" class="btn btn-green">Add User</button>
                                        </div>
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
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('/skote/assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('/skote/assets/js/pages/form-advanced.init.js')}}"></script>
<script src="{{asset('/skote/assets/libs/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>

{{-- <script>


    $(document).ready(function(){
        $("#divisionDropdown").hide();
        $("#districtDropdown").hide();
        $("#tehsilDropdown").hide();
        $("#companyDropdown").hide();
        getDistrictsByDivisionId();


    });
    function checkRole(){
        $roleId = $("#roleId").val();
        if($roleId == 11){

            $("#divisionDropdown").show("slow");
            $("#districtDropdown").hide("slow");
            $("#tehsilDropdown").hide("slow");
            $("#companyDropdown").hide("slow");



        }
        else if($roleId == 9 || $roleId == 6){
            // alert("Division & District DropDown")
            $("#divisionDropdown").show("slow");
            $("#districtDropdown").show("slow");
            $("#tehsilDropdown").hide("slow");
            $("#companyDropdown").hide("slow");



        }

        else if($roleId == 8){
            // alert("Division & District DropDown")
            $("#divisionDropdown").show("slow");
            $("#districtDropdown").show("slow");
            $("#tehsilDropdown").show("slow");
            $("#companyDropdown").hide("slow");



        }else if ($roleId == 7){
            $("#divisionDropdown").hide("slow");
            $("#districtDropdown").hide("slow");
            $("#tehsilDropdown").hide("slow");
            $("#companyDropdown").show("slow");

        }

        else{
            $("#companyDropdown").hide("slow");
            $("#divisionDropdown").hide("slow");
            $("#districtDropdown").hide("slow");
            $("#tehsilDropdown").hide("slow");


        }
    }


    function getDistrictsByDivisionId(){

    var divisionId = $('#divisionId').val();
    var postData = {divisionId : divisionId};
    $.ajax({

        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
        cache:false,
        processData:false,
        contentType:false,
        url: '{{route('district.getDistrictsByDivisionId')}}',
        data: divisionId,
        headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        success: function(res) {
        $('select[name="districtId"]').empty();
        $.each(JSON.parse(res), function(key, result) {
                        $('select[name="districtId"]').append('<option value="'+ result.id +'">'+ result.district_name_en +'</option>');
                    });
        getTehsilsByDistrictId();

        }


    });

    }

    function getTehsilsByDistrictId(){
        var districtId = $('#districtId').val();
        var postData = {districtId : districtId};
        $.ajax({

            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            cache:false,
            processData:false,
            contentType:false,
            url: '{{route('tehsil.getTehsilsByDistrictId')}}',
            data: districtId,
            headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            success: function(res) {
            $('select[name="tehsilId"]').empty();

            $.each(JSON.parse(res), function(key, result) {
                            $('select[name="tehsilId"]').append('<option value="'+ result.id +'">'+ result.tehsil_name +'</option>');
                            // console.log(result.id);
                        });

            }


        });

        }
</script> --}}
@endsection
