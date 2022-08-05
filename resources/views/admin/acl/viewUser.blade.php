
<!--- Called in Modal -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="name">Name: {{$obj->name}}</label><br>
                        <label class="form-label" for="name">Mobile Number: {{$obj->mobile}}</label><br>
                        <label class="form-label" for="name">Cnic: {{$obj->cnic}}</label><br>
                        <label class="form-label" for="name">Role:
                            @foreach ($obj->roles as $role )
                            {{$role->name}} , &nbsp;
                            @endforeach
                        </label><br>
                        <label class="form-label" for="name">Division: {{$obj->divisionUser?$obj->divisionUser->name_en:'NA'}}</label><br>
                        <label class="form-label" for="name">District: {{$obj->districtUser?$obj->districtUser->district_name_en:'NA'}}</label><br>
                        <label class="form-label" for="name">Tehsil: {{$obj->tehsilUser?$obj->tehsilUser->tehsil_name:'NA'}}</label><br>
                        <label class="form-label" for="name">Status: {{$obj->status==1?'Active':'Inactive'}}</label><br>
                    </div>
                    <div class="col-6">

                        <img width="70%" height="auto" src="{{$obj->user_picture}}" width="auto">
                    </div>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div><!-- end row -->
<!--- end Called in Modal -->
