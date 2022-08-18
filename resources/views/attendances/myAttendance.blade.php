@extends('layouts.skote')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        @include('layouts.partials.alerts')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">My Attendance</h4>


                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                            <thead class="table-success">
                                <tr>
                                    <th style="width: 10%">Sr #</th>
                                    <th>Name</th>
                                    <th>Roll Number</th>
                                    <th>Date time</th>
                                    <th style="width: 15%">Status</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studentAttendances as $key => $attendance)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{Auth::guard('web')->user()->name}}</td>
                                    <td>
                                        {{$attendance->rollNumber}}
                                    </td>
                                    <td>
                                        {{date('Y-m-d',strtotime($attendance->created_at))}}
                                    </td>
                                    <td>{{$attendance->status}}</td>
                                    {{-- <td >
                                    <div class="btn-group">
                                    <a href="permission-view/{{$permission->id}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                        <a href="permission-edit/{{$permission->id}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                         <form method="POST" action="{{route('admin.acl.deletePermission',['id'=>$permission->id])}}">
                                            @method('PUT')
                                            @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                         </form>
                                         </div>
                                   </td> --}}
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

              

@endsection