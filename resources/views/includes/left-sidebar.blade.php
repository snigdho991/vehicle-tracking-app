<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
        @if(Auth::check())
            <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" key="t-menu">Dashboard Stuff</li>
                        <li>
                            <a href="{{ route('dashboard') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-calendar">Dashboard</span>
                            </a>
                        </li>
                
                    <li class="menu-title" key="t-apps">Bus Tools</li>
                        <li>
                            <a href="{{ route('bus.index') }}" class="waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-calendar">Bus List</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('bus.create') }}" class="waves-effect">
                                <i class="bx bx-task"></i>
                                <span key="t-calendar">Add Bus</span>
                            </a>
                        </li>

                    <li class="menu-title" key="t-apps">Location Tools</li>
                        <li>
                            <a href="{{ route('share.location') }}" class="waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-calendar">Share Your Location <span class="badge bg-info float-end">new</span> </span>
                            </a>
                        </li>

                    <li class="menu-title" key="t-apps">Profile Tools</li>
                        
                        <li>
                            <a href="{{ route('edit.profile') }}" class="waves-effect">
                                <i class="bx bxs-user-detail"></i>
                                <span key="t-calendar">Edit Profile</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/user/profile') }}" class="waves-effect">
                                <i class="bx bx-news"></i>
                                <span key="t-calendar">Manage Security Profile</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('social.media.links') }}" class="waves-effect">
                                <i class="bx bx-share-alt"></i>
                                <span key="t-calendar">Manage Social Links</span>
                            </a>
                        </li>

                @if(Auth::user()->hasRole('Administrator'))

                    <li class="menu-title" key="t-apps">Administrator Tools</li>
                        
                        <li>
                            <a href="{{ route('social.index') }}" class="waves-effect">
                                <i class="bx bx-play-circle"></i>
                                <span key="t-calendar">All Social Links</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('social.create') }}" class="waves-effect">
                                <i class="bx bx-task"></i>
                                <span key="t-calendar">Add Social Link</span>
                            </a>
                        </li>

                @endif

                    {{-- <li class="menu-title" key="t-apps">Customer Tools</li>
                        <li>
                            <a href="" class="waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-calendar">Customer List</span>
                            </a>
                        </li>

                        <li>
                            <a href="" class="waves-effect">
                                <i class="bx bx-task"></i>
                                <span key="t-calendar">Add Customer</span>
                            </a>
                        </li>
                
                    <li class="menu-title" key="t-apps">History Stuffs</li>
                        <li>
                            <a href="" class="waves-effect">
                                <i class="mdi mdi-calendar-weekend"></i>
                                <span key="t-calendar">This Week</span>
                            </a>
                        </li>
                    
                        <li>
                            <a href="" class="waves-effect">
                                <i class="mdi mdi-clock-start"></i>
                                <span key="t-calendar">This Month</span>
                            </a>
                        </li>

                        <li>
                            <a href="" class="waves-effect">
                                <i class="mdi mdi-table-clock"></i>
                                <span key="t-calendar">This Year</span>
                            </a>
                        </li>

                        <li>
                            <a href="" class="waves-effect">
                                <i class="bx bx-aperture"></i>
                                <span key="t-calendar">Advanced Search</span>
                            </a>
                        </li> --}}
            </ul>
            
        @endif
        </div>
        <!-- Sidebar -->
    </div>
    
</div>