@extends('layouts.skote')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        @include('layouts.partials.alerts')

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="">Dashboard/</li>
                            <li class="breadcrumb-item active"><a href="{{Request::path()}}" style="text-transform: capitalize">{{Request::path()}}</a></li>
                        </ol>
                    </div>



                </div>
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid widget-box widget-box-blue">
                                <div class="card-body">
                                

                                    Dashboard


                        
                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

              

@endsection