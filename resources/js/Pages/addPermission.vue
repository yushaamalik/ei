
<template>
    <div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Users</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="">Users/</li>
                            <li class="breadcrumb-item active"><a href="{{Request::segment(2)}}" style="text-transform: capitalize">Permissions</a></li>
                        </ol>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Add Permission</h4>

                                <form method="POST" action="{{route('admin.acl.savePermission')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Permission Name</label>
                                        <input type="text" class="form-control" id="formrow-firstname-input" name="permissionName" placeholder="Permission Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Permission Description</label>
                                        <input type="text" class="form-control" id="formrow-firstname-input" name="permissionDescription" placeholder="Permission Description" required>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-green w-md">Add Permission</button>
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
    
</template>

<script>
export default {
    props: {
        // books: Object
    }
}
</script>
