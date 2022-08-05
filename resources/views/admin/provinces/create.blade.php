@extends('admin.layouts.skote')
@section('content')

<div class="page-content">
    @include('layouts.partials.alerts')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Proince</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="">Proinces/</li>
                            <li class="breadcrumb-item active"><a href="{{Request::segment(2)}}" style="text-transform: capitalize">Add New</a></li>
                        </ol>
                    </div>

                </div>
                <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Add Province</h4>
    
                                    <form method="POST" action="{{route('admin.province.save')}}" enctype="multipart/form-data">
                                        @csrf
                                        {{-- @foreach ($errors->all() as $error)
                                            <p class="text-danger">{{ $error }}</p>
                                        @endforeach  --}}
                                    <div class="mb-3">
                                        <label >Name</label>
                                        <div class="input-group auth-pass-inputgroup">
                                        <input type="text" id="text" name="name" class="form-control @error('name') is-invalid @enderror">  
                                        </div>
    
                                    </div>
                                    <div class="mb-3">
                                        <label >Description</label>
                                        <textarea class="form-control" name="description"></textarea>
    
                                    </div>
                                    <div class="mb-3">
                                        <label >Location</label>
                                        <input type="text" id="text" name="location" class="form-control @error('location') is-invalid @enderror">
    
                                    </div>  

                                    <div class="mb-3">
                                        <label >Image</label>
                                        <input type="file" name="provinceImage" class="form-control">
    
                                    </div>
                                    <div class="float-end"> 
                                        <button type="submit" class="btn btn-green">Create</button>
                                    </div>
                                        
                                
                                    </form>
                                  
                                </div>
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>


@endsection