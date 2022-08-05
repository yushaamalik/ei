@extends('layouts.masterTemplate')
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
                    <h4 class="mb-sm-0 font-size-18">ACL</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="">Acl/</li>
                            <li class="breadcrumb-item active"><a href="{{Request::segment(2)}}" style="text-transform: capitalize">{{Request::path()}}</a></li>
                        </ol>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="POST" action="{{route('acl.updateUser',['id'=>$obj->id])}}" enctype="multipart/form-data" class="needs-validation">
                                    @csrf
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="name">Name: <span class="mandatory_style">*</span></label>
                                                <input disabled type="text" name="name" id="name" value="{{$obj->name}}" class="form-control" placeholder="Type the Name" required>
                                                <div class="invalid-feedback">
                                                        Please select a valid state.
                                                    </div>
                                            </div>
                                             <?php
                                        $trole = (string)  $obj->roles[0]->id;
                                        if($trole !== "Vendor"){?>
                                        <div class="mb-3">
                                            <label class="form-label" for="name">Role <span class="mandatory_style">*</span></label>
                                            <select disabled name ="roleId" id="roleId" class="form-control select2" onchange="checkRole();" data-live-search="true">
                                                @foreach($roles as $role)
                                                <option value="{{$role->id}}" {{  $obj->roles[0]->id == $role->id ? 'selected': '' }}>{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <?php }?>
                                        </div>
                                        <div class="col-3">

                                            <div class="mb-3">
                                                <label class="form-label" for="mobile">Mobile Number: <span class="mandatory_style">*</span></label>
                                                <input disabled type="number" name="mobile" id="mobile" value="{{ $obj->mobile }}" class="form-control" placeholder="Type the Mobile Number" min="1" maxlength="11" step="1" onKeyPress="if(this.value.length==11) return false;" required>
                                            </div>
                                             <?php if($obj->roles[0]->id !== 7) { ?>
                                            <div class="mb-3" id="divisionDropdown">
                                            <label class="form-label" for="name">Division <span class="mandatory_style">*</span></label>
                                            <br>

                                            <?php
                                            if($obj->divisionUser){
                                                $divisionId = $obj->divisionUser->id;
                                            }
                                            else{
                                                $divisionId = 0;
                                            }
                                            ?>
                                            <select disabled name ="divisionId" id="divisionId" class="form-control select2" onchange="getDistrictsByDivisionId();"  data-live-search="true">
                                                @foreach($divisions as $divisione)
                                                <option value="{{$divisione->id}}" {{$divisione->id == $divisionId ? 'selected':'' }}>{{$divisione->name_en}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <?php }?>
                                        </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="cnic">CNIC: <span class="mandatory_style">*</span></label>
                                            <input disabled type="number" name="cnic" id="cnic" value="{{ $obj->cnic }}" min="1" maxlength="13" step="1" onKeyPress="if(this.value.length==13) return false;" class="form-control" placeholder="Type the CNIC Number" required>
                                        </div>
                                        <?php if($obj->roles[0]->id !== 7) { ?>
                                        <div class="mb-3" id="districtDropdown">
                                            <label for="name">District: <span class="mandatory_style">*</span></label>
                                            <select disabled class="form-control select2" name="districtId" id="districtId" onchange="getTehsilsByDistrictId();">
                                                <option value="null">Select</option>
                                            </select>
                                        </div>
                                        <?php }?>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                                <label class="form-label" for="email">Email Address: <span class="mandatory_style">*</span></label>
                                                <input disabled type="email" name="email" id="email" value="{{ $obj->email }}" class="form-control" placeholder="Type the Email Address" required>
                                            </div>
                                     <?php if($obj->roles[0]->id !== 7) { ?>
                                        <div class="mb-3" id="tehsilDropdown">
                                            <label for="name">Tehsil: <span class="mandatory_style">*</span></label>
                                            <select disabled class="form-control select2" name="tehsilId" id="tehsilId">
                                                <option value="null">Select</option>
                                            </select>
                                        </div>    
                                         <?php }?>
                                    </div>
                                    
                                   <div>
                                    <!-- <button type="submit" class="btn btn-primary w-md">Edit User</button> -->
                                   </div>
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
@endsection

@section('js')
<script src="{{asset('/skote/assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('/skote/assets/js/pages/form-advanced.init.js')}}"></script>

<script>
 <?php if( $obj->roles[0]->id !== 7) { ?>

    $(document).ready(function(){
        $("#divisionDropdown").hide();
        $("#districtDropdown").hide();
        $("#tehsilDropdown").hide();
        checkRole();
            getDistrictsByDivisionId();
    });

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
                <?php
                if( $obj->roles[0]->id == 6  || $obj->roles[0]->id == 9 || $obj->roles[0]->id == 8 )
                {
                     $value = $obj->districtUser->id;
                     }
                else{
                         $value = 0;
                     }?>
                $.each(JSON.parse(res), function(key, result) {
                                $('select[name="districtId"]').append('<option value="'+ result.id +'" >'+ result.district_name_en +'</option>');
                                $('select[name^="districtId"] option[value="'+ {{$value}} +'"]').attr("selected","selected");
                            });
                            // $("#districtId option[value='4']").prop('selected', true);
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
                    <?php
                    if( $obj->roles[0]->id == 8)
                    {
                         $value = $obj->tehsilUser->id;
                        }
                    else{
                        $value = 0;
                    }?>
                    $.each(JSON.parse(res), function(key, result) {
                                    $('select[name="tehsilId"]').append('<option value="'+ result.id +'">'+ result.tehsil_name +'</option>');
                                    // console.log(result.id);
                                });
                                $('select[name^="tehsilId"] option[value="'+ {{$value}} +'"]').attr("selected","selected");

                    }


                });

            }

        function checkRole(){
            $roleId = $("#roleId").val();
            if($roleId == 11){

                $("#divisionDropdown").show("slow");
                $("#districtDropdown").hide("slow");
                $("#tehsilDropdown").hide("slow");



            }
            else if($roleId == 9 || $roleId == 6){
                // alert("Division & District DropDown")
                $("#divisionDropdown").show("slow");
                $("#districtDropdown").show("slow");
                $("#tehsilDropdown").hide("slow");


            }

            else if($roleId == 8){
                // alert("Division & District DropDown")
                $("#divisionDropdown").show("slow");
                $("#districtDropdown").show("slow");
                $("#tehsilDropdown").show("slow");


            }

            else{
                $("#divisionDropdown").hide("slow");
                $("#districtDropdown").hide("slow");
                $("#tehsilDropdown").hide("slow");

            }
        }
        <?php } ?>
        $('#roleId').val({{$obj->roles[0]->id}}).trigger('change');
</script>
@endsection
