<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{ url('/') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Departments
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @if (isset(auth()->user()->role->permission['name']['department']['can-list']))
                                <a class="nav-link" href="{{ route('departments.index') }}">View Departments</a>
                            @endif
                            
                            @if (isset(auth()->user()->role->permission['name']['department']['can-add']))
                                <a class="nav-link" href="{{ route('departments.create') }}">Create Department</a>
                            @endif
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        User Settings
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <!-- ROLES MENU -->
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#rolesCollapseAuth" aria-expanded="false"
                                aria-controls="rolesCollapseAuth">
                                Roles
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="rolesCollapseAuth" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    @if (isset(auth()->user()->role->permission['name']['role']['can-list']))
                                        <a class="nav-link" href="{{ route('roles.index') }}">View Roles</a>
                                    @endif

                                    @if (isset(auth()->user()->role->permission['name']['role']['can-add']))
                                        <a class="nav-link" href="{{ route('roles.create') }}">Create User Role</a>
                                    @endif
                                </nav>
                            </div>
                            <!-- /ROLES MENU -->

                            <!-- USER MENU -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#usersCollapseError" aria-expanded="false"
                                aria-controls="usersCollapseError">
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="usersCollapseError" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    @if (isset(auth()->user()->role->permission['name']['user']['can-list']))
                                        <a class="nav-link" href="{{ route('users.index') }}">View Users</a>
                                    @endif
                                    @if (isset(auth()->user()->role->permission['name']['user']['can-add']))
                                        <a class="nav-link" href="{{ route('users.create') }}">Create User</a>
                                    @endif
                                </nav>
                            </div>
                            <!-- /USER MENU -->

                            <!-- PERMISSIONS MENU -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#permissionsCollapseError" aria-expanded="false"
                                aria-controls="permissionsCollapseError">
                                Permission
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="permissionsCollapseError" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    @if (isset(auth()->user()->role->permission['name']['permission']['can-list']))
                                        <a class="nav-link" href="{{ route('permission.index') }}">View Permissions</a>
                                    @endif

                                    @if (isset(auth()->user()->role->permission['name']['permission']['can-add']))
                                        <a class="nav-link" href="{{ route('permission.create') }}">Create Permission</a>
                                    @endif
                                </nav>
                            </div>
                            <!-- /PERMISSIONS MENU -->
                        </nav>
                    </div>

                <!-- lEAVES MENU -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                data-bs-target="#leaveRequestCollapse" aria-expanded="false"
                aria-controls="leaveRequestCollapse">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt	"></i></div>
                    Leave Requests
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="leaveRequestCollapse" aria-labelledby="headingThree"
                    data-bs-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if (isset(auth()->user()->role->permission['name']['leave']['can-list']))
                            <a class="nav-link" href="{{ route('leaves.index') }}">View Leave Requests</a>
                        @endif

                        <a class="nav-link" href="{{ route('leaves.create') }}">Create Leave Request</a>
                        
                    </nav>
                </div>
                <!-- /LEAVES MENU -->

                <!-- NOTICE MENU -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                data-bs-target="#noticeRequestCollapse" aria-expanded="false"
                aria-controls="noticeRequestCollapse">
                    <div class="sb-nav-link-icon"><i class="fas fa-door-open"></i></div>
                    Staff Notice
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="noticeRequestCollapse" aria-labelledby="headingFour"
                    data-bs-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if (isset(auth()->user()->role->permission['name']['notice']['can-list']))
                            <a class="nav-link" href="{{ route('notices.index') }}">View Notice Requests</a>
                        @endif
                        
                        @if (isset(auth()->user()->role->permission['name']['notice']['can-add']))
                            <a class="nav-link" href="{{ route('notices.create') }}">Create Notice Request</a>
                        @endif

                    </nav>
                </div>
                <!-- /LEAVES MENU -->
                </div>
            </div>
            {{-- <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div> --}}
        </nav>
    </div>