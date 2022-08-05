<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{ route('dashboard') }}" class="logo">
            <span><img src="{{ asset('assets/images/logo-white.png') }}" alt="" height="50" class="img-fluid"> </span>
            <i><img src="{{ asset('assets/images/logo-small.png') }}" alt="" height="35"></i>
        </a>
    </div>
    <nav class="navbar-custom">
        <!-- Menu right-->
        <ul class="navbar-right list-inline float-right mb-0">
            <li class="dropdown notification-list list-inline-item">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect border-right" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell-outline noti-icon"></i> <span class="badge badge-pill badge-danger noti-icon-badge">8</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                        <!-- item-->
                        <h6 class="dropdown-item-text">Notifications (258)</h6>
                        <div class="slimscroll notification-item-list">
                            
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                            </a>
                            
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning"><i class="mdi mdi-message-text-outline"></i></div>
                                <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
                            </a>
                            
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info"><i class="mdi mdi-glass-cocktail"></i></div>
                                <p class="notify-details">Your item is shipped<span class="text-muted">It is a long established fact that a reader will</span></p>
                            </a>
                            
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                            </a>
                            
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                                <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
                            </a>
                        </div>
                        <!-- All-->
                        <!-- <a href="javascript:void(0);" class="dropdown-item text-center text-primary">View all <i class="fi-arrow-right"></i></a> -->
                    </div>
                </li>
            <li class="dropdown notification-list list-inline-item">
                <div class="dropdown notification-list nav-pro-img">
                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="mr-3 small">{{{ (Auth::user()->name) ?? Auth::user()->email }}}</span>
                    <img src="{{ asset((Auth::user()->user_picture) ? config('constants._USER_PICTURE_THUMBNAIL').Auth::user()->user_picture : config('constants._USER_DUMMY_IMAGE')) }}" class="rounded-circle" alt="{{{ (Auth::user()->name) ?? Auth::user()->email }}}"/>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                    <div class=" dropdown-header">
                        <h6 class="text-overflow m-0 font-weight-normal small">Hello {{{ (Auth::user()->name) ?? Auth::user()->email }}}</h6>
                        </div>
                    <!-- item--> 
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="mdi mdi-power text-danger"></i> Logout</a>
                </div>
                </div>
            </li>
        </ul>
        <!-- Menu Left-->
        <ul class="list-inline menu-left mb-0">
            <li class="float-left"><button class="button-menu-mobile open-left waves-effect"><i class="mdi mdi-menu"></i></button></li>
            <!-- <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                <form role="search" class="app-search">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control" placeholder="Search.." /> <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </li> -->
        </ul>
    </nav>
</div>