
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html">Admin</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="{{ asset('backend-assets/img/users/avatar.png') }}" alt="Shekh Mohsin"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="{{ asset('backend-assets/img/users/avatar.png') }}" alt="Shekh Mohsin"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">Shekh Mohsin</div>
                                <div class="profile-data-title">Web Developer/Designer</div>
                            </div>
                            <div class="profile-controls">
                                <a href="{{ route('profile.edit') }}" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="{{ route('contacts.index') }}" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboard</span></a>
                    </li>                    
                    {{-- <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Pages</span></a>
                        <ul>
                            <li><a href="pages-gallery.html"><span class="fa fa-image"></span> Gallery</a></li>
                            <li><a href="pages-invoice.html"><span class="fa fa-dollar"></span> Invoice</a></li>
                            <li><a href="pages-edit-profile.html"><span class="fa fa-wrench"></span> Edit Profile</a></li>
                            <li><a href="pages-profile.html"><span class="fa fa-user"></span> Profile</a></li>
                            <li><a href="pages-address-book.html"><span class="fa fa-users"></span> Address Book</a></li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-clock-o"></span> Timeline</a>
                                <ul>
                                    <li><a href="pages-timeline.html"><span class="fa fa-align-center"></span> Default</a></li>
                                    <li><a href="pages-timeline-simple.html"><span class="fa fa-align-justify"></span> Full Width</a></li>
                                </ul>
                            </li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-envelope"></span> Mailbox</a>
                                <ul>
                                    <li><a href="pages-mailbox-inbox.html"><span class="fa fa-inbox"></span> Inbox</a></li>
                                    <li><a href="pages-mailbox-message.html"><span class="fa fa-file-text"></span> Message</a></li>
                                    <li><a href="pages-mailbox-compose.html"><span class="fa fa-pencil"></span> Compose</a></li>
                                </ul>
                            </li>
                            <li><a href="pages-messages.html"><span class="fa fa-comments"></span> Messages</a></li>
                            <li><a href="pages-calendar.html"><span class="fa fa-calendar"></span> Calendar</a></li>
                            <li><a href="pages-tasks.html"><span class="fa fa-edit"></span> Tasks</a></li>
                            <li><a href="pages-content-table.html"><span class="fa fa-columns"></span> Content Table</a></li>
                            <li><a href="pages-faq.html"><span class="fa fa-question-circle"></span> FAQ</a></li>
                            <li><a href="pages-search.html"><span class="fa fa-search"></span> Search</a></li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-file"></span> Blog</a>
                                
                                <ul>                                    
                                    <li><a href="pages-blog-list.html"><span class="fa fa-copy"></span> List of Posts</a></li>
                                    <li><a href="pages-blog-post.html"><span class="fa fa-file-o"></span>Single Post</a></li>
                                </ul>
                            </li>
                            <li><a href="pages-lock-screen.html"><span class="fa fa-lock"></span> Lock Screen</a></li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-sign-in"></span> Login</a>
                                <ul>                                                                        
                                    <li><a href="pages-login.html">Login v1</a></li>
                                    <li><a href="pages-login-v2.html">Login v2</a></li>
                                    <li><a href="pages-login-inside.html">Login v2 Inside</a></li>
                                    <li><a href="pages-login-website.html">Website Login</a></li>
                                    <li><a href="pages-login-website-light.html"> Website Login Light</a></li>
                                </ul>
                            </li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-plus"></span> Registration</a>
                                <ul>                                                                        
                                    <li><a href="pages-registration.html">Default</a></li>
                                    <li><a href="pages-registration-login.html">With Login</a></li>                                    
                                </ul>
                            </li>
                            <li><a href="pages-forgot-password.html"><span class="fa fa-question"></span> Forgot Password</a></li>                            
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-warning"></span> Error Pages</a>
                                <ul>                                    
                                    <li><a href="pages-error-404.html">Error 404 Sample 1</a></li>
                                    <li><a href="pages-error-404-2.html">Error 404 Sample 2</a></li>
                                    <li><a href="pages-error-500.html"> Error 500</a></li>
                                </ul>
                            </li>                            
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Layouts</span></a>
                        <ul>
                            <li><a href="layout-boxed.html">Boxed</a></li>
                            <li><a href="layout-nav-toggled.html">Navigation Toggled</a></li>
                            <li><a href="layout-nav-toggled-hover.html">Nav Toggled (Hover)</a></li>
                            <li><a href="layout-nav-toggled-item-hover.html">Nav Toggled (Item Hover)</a></li>
                            <li><a href="layout-nav-top.html">Navigation Top</a></li>
                            <li><a href="layout-nav-right.html">Navigation Right</a></li>
                            <li><a href="layout-nav-top-fixed.html">Top Navigation Fixed</a></li>
                            <li><a href="layout-nav-custom.html">Custom Navigation</a></li>
                            <li><a href="layout-nav-top-custom.html">Custom Top Navigation</a></li>
                            <li><a href="layout-frame-left.html">Frame Left Column</a></li>
                            <li><a href="layout-frame-right.html">Frame Right Column</a></li>
                            <li><a href="layout-search-left.html">Search Left Side</a></li>
                            <li><a href="layout-page-sidebar.html">Page Sidebar</a></li>
                            <li><a href="layout-page-loading.html">Page Loading</a></li>
                            <li><a href="layout-rtl.html">Layout RTL</a></li>
                            <li><a href="layout-tabbed.html">Page Tabbed</a></li>
                            <li><a href="layout-custom-header.html">Custom Header</a></li>
                            <li><a href="layout-adaptive-panels.html">Adaptive Panels</a></li>                            
                            <li><a href="blank.html">Blank Page</a></li>
                        </ul>
                    </li> --}}
                    <li class="xn-title">Components</li>
                    <li class="xn-openable {{ request()->routeIs('services.*') ? 'active' : '' }}">
                        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Services</span></a>                        
                        <ul>
                            <li class="{{ request()->routeIs('services.index') ? 'active' : '' }}">
                                <a href="{{ route('services.index') }}"><span class="fa fa-list-ul"></span>All Services</a>
                            </li>
                            <li class="{{ request()->routeIs('services.create') ? 'active' : '' }}">
                                <a href="{{ route('services.create') }}"><span class="fa fa-magic"></span> Add New</a>
                            </li>
                            <li class="{{ request()->routeIs('service-categories.*') ? 'active' : '' }}">
                                <a href="{{ route('service-categories.index') }}"><span class="fa fa-align-justify"></span>Categories</a>
                            </li>
                        </ul>
                    </li>                    
                    <li class="xn-openable {{ request()->routeIs('projects.*') || request()->routeIs('project-categories.*') ? 'active' : '' }}">
                        <a href="#"><span class="fa fa-pencil"></span> <span class="xn-text">Projects</span></a>
                        <ul>
                            <li class="{{ request()->routeIs('projects.index') ? 'active' : '' }}">
                                <a href="{{ route('projects.index') }}"><span class="fa fa-list-ul"></span>All Projects</a>
                            </li>
                            <li class="{{ request()->routeIs('projects.index') ? 'active' : '' }}">
                                <a href="{{ route('projects.create') }}"><span class="fa fa-magic"></span> Add New</a>
                            </li>
                            <li class="{{ request()->routeIs('project-categories.*') ? 'active' : '' }}">
                                <a href="{{ route('project-categories.index') }}"><span class="fa fa-align-justify"></span>Categories</a>
                            </li>
                        </ul>
                    </li>
                    <li class="xn-openable {{ request()->routeIs('blogs.*') || request()->routeIs('blog-categories.*') ? 'active' : '' }}">
                        <a href="#"><span class="fa fa-table"></span> <span class="xn-text">Posts</span></a>
                        <ul>
                            <li class="{{ request()->routeIs('blogs.index') ? 'active' : '' }}">
                                <a href="{{ route('blogs.index') }}"><span class="fa fa-list-ul"></span>All Posts</a>
                            </li>
                            <li class="{{ request()->routeIs('blogs.create') ? 'active' : '' }}">
                                <a href="{{ route('blogs.create') }}"><span class="fa fa-magic"></span> Add New</a>
                            </li>
                            <li class="{{ request()->routeIs('blog-categories.*') ? 'active' : '' }}">
                                <a href="{{ route('blog-categories.index') }}"><span class="fa fa-align-justify"></span>Categories</a>
                            </li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Charts</span></a>
                        <ul>
                            <li><a href="charts-morris.html">Morris</a></li>
                            <li><a href="charts-nvd3.html">NVD3</a></li>
                            <li><a href="charts-rickshaw.html">Rickshaw</a></li>
                            <li><a href="charts-other.html">Other</a></li>
                        </ul>
                    </li>                    
                    <li>
                        <a href="maps.html"><span class="fa fa-map-marker"></span> <span class="xn-text">Maps</span></a>
                    </li>                    
                    
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->

           