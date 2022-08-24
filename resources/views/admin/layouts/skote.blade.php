<!doctype html>
<html lang="en">
<head>

        <meta charset="utf-8" />
        <title>Dashboard | EI</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <!-- Bootstrap Css -->
        <link href="{{asset('/skote/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('/skote/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/skote/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('/skote/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

        @yield('css')
    </head>

    <body data-sidebar="colored">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
        {{-- @inertia --}}
        <!-- Begin page -->
        <div id="layout-wrapper">


            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="{{route('admin.dashboard')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    {{-- <img src="{{asset('/skote/assets/images/icon-white.png')}}" alt="Punjab Govt Logo"> --}}
                                </span>
                                <span class="logo-lg">
                                    
                                </span>
                            </a>

                            <a href="{{route('admin.dashboard')}}" class="logo logo-light">
                                <span class="logo-sm">
                                </span>
                                <span class="logo-lg">
                                  
                                    <h2 style="margin-top: 10px;">Education Intelligence</h2>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-align-left"></i>
                        </button>
                        <h5 class="mb-0 mt-3">Education Intelligence <br/>Education made intelligent</h5>
                        <!-- App Search-->

                    </div>

                    <div class="d-flex">
                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{Auth::guard('admin')->user()->userImage}}"
                                    alt="User Image">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{Auth::guard('admin')->user()->name}}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                {{-- <a class="dropdown-item" href="{{route('admin.dashboard')}}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a> --}}
                                {{-- <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My Wallet</span></a> --}}
                                <a class="dropdown-item d-block" href="#"><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Change Password</span></a>
                                {{-- <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Lock screen</span></a> --}}
                                <div class="dropdown-divider"></div>
                                {{-- <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a> --}}
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                 @csrf
                                             </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu bg-transparent">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>
                            <li>
                                <a href="{{route('admin.dashboard')}}" class="waves-effect">
                                    <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end"></span>
                                    <span key="t-dashboards">Dashboard</span>
                                </a>
                            </li>

                            {{-- <li class="menu-title" key="t-menu">Super Admin</li> --}}
                            {{-- @canany(['user.read', 'user.create', 'role.read','role.create','permission.read','permission.create']) --}}
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-user-plus"></i>
                                    <span key="t-ecommerce">User Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    {{-- @can('user.create') --}}
                                    <li><a href="#"><i class="typcn typcn-media-record"></i>Add User</a></li>
                                    {{-- @endcan --}}
                                     {{-- @can('user.create') --}}
                                     <li><a href="{{route('admin.student.addStudent')}}"><i class="typcn typcn-media-record"></i>Add Student</a></li>
                                     {{-- @endcan --}}
                                    

                                    {{-- @can('user.read') --}}
                                    <li><a href="#"><i class="typcn typcn-media-record"></i>Users</a></li>
                                    {{-- @endcan --}}
                                    {{-- @can('user.read') --}}
                                    <li><a href="#"><i class="typcn typcn-media-record"></i>Students</a></li>
                                    {{-- @endcan --}}

                                    {{-- @can('role.create') --}}
                                    <li><a href="{{route('admin.acl.addRole')}}"><i class="typcn typcn-media-record"></i>Add Role</a></li>
                                    {{-- @endcan --}}

                                    {{-- @can('role.read') --}}
                                    <li><a href="{{route('admin.acl.rolesListing')}}"><i class="typcn typcn-media-record"></i>Roles</a></li>
                                    {{-- @endcan --}}
                                    <li><a href="#"><i class="typcn typcn-media-record"></i>Assign Role</a></li>

                                    {{-- @can('permission.create') --}}
                                    <li><a href="{{route('admin.acl.addPermission')}}"><i class="typcn typcn-media-record"></i>Add Permission</a></li>
                                    {{-- @endcan --}}

                                    {{-- @can('permission.read') --}}
                                    <li><a href="{{route('admin.acl.permissionsListing')}}"><i class="typcn typcn-media-record"></i>Permissions</a></li>
                                    {{-- @endcan --}}

                                </ul>
                            </li>
                            {{-- @endcanany --}}
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-user-plus"></i>
                                    <span key="t-ecommerce">Attendance</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    {{-- @can('user.create') --}}
                                    <li><a href="{{route('admin.attendance.runFaceRecognition')}}"><i class="typcn typcn-media-record"></i>Mark Attendance</a></li>
                                    <li><a href="{{route('admin.attendance.getStudentAttendance')}}"><i class="typcn typcn-media-record"></i>Attendance List</a></li>


                                    
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-user-plus"></i>
                                    <span key="t-ecommerce">Lectures</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    {{-- @can('user.create') --}}
                                    <li><a href="{{route('admin.lecture.speechToText')}}"><i class="typcn typcn-media-record"></i>Record Lecture</a></li>

                                    
                                </ul>
                            </li>
                            {{-- @canany(['vendor.create', 'vendor.read', 'focalPerson.read']) --}}
                            
                            {{-- @endcanany --}}
                            

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
            @yield('content')


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Education Intelligence.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Powered by <strong>EI.</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->

        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('/skote/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('/skote/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('/skote/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('/skote/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('/skote/assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('/skote/assets/libs/select2/js/select2.min.js')}}"></script>

        <script>
        </script>
        <!-- App js -->
        <script src="{{asset('/skote/assets/js/app.js')}}"></script>

        @yield('js')
    </body>
</html>
