<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link {{ Request::is('admin/dashboard') ? 'active':''}}" href="{{url('admin/dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/add-category1') ||  Request::is('admin/edit-category/*') ? 'collapse active':'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Category
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse {{ Request::is('admin/category') || Request::is('admin/add-category1') ||  Request::is('admin/edit-category/*') ? 'show':''}}" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ Request::is('admin/add-category1') ? 'active':''}}" href="{{url('admin/add-category1')}}">Add Category</a>
                                    <a class="nav-link {{ Request::is('admin/category') ||  Request::is('admin/edit-category/*')? 'active':''}}" href="{{url('admin/category')}}">View Category</a>
                                </nav>
                            </div>

                            
                            <a class="nav-link {{ Request::is('admin/posts') || Request::is('admin/add-post') ||  Request::is('admin/edit-post/*') ? 'collapse active':'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePost" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                      Posts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse  {{ Request::is('admin/posts') || Request::is('admin/add-post') ||  Request::is('admin/edit-post/*') ? 'show':''}}" id="collapsePost" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ Request::is('admin/add-post') ? 'active':''}}" href="{{url('admin/add-post')}}">Add Posts</a>
                                    <a class="nav-link {{ Request::is('admin/posts') ||  Request::is('admin/edit-post/*')? 'active':''}}" href="{{url('admin/posts')}}">View Posts</a>
                                </nav>
                            </div>
                         
                            <a class="nav-link {{ Request::is('admin/users') ? 'active':''}}" href="{{url('admin/users')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Users
                            </a>
                            
                            <div class="sb-sidenav-menu-heading">Orders</div>
                            <a class="nav-link {{ Request::is('admin/orders') ? 'active':''}}" href="{{url('admin/orders')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                               Order
                            </a>   
                         
                            
                            <div class="sb-sidenav-menu-heading">Settings</div>
                            <a class="nav-link {{ Request::is('admin/sliders') ? 'active':''}}" href="{{url('admin/sliders')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-sliders"></i></div>
                             Home Slider
                            </a> 
                            
                            <a class="nav-link {{ Request::is('admin/aboutus') ? 'active':''}}" href="{{url('admin/aboutus')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                             About Us
                            </a> 

                            <a class="nav-link {{ Request::is('admin/sitesetting') ? 'active':''}}" href="{{url('admin/sitesetting')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                             Site Setting
                            </a>  
                        
                            </div>
                    </div>


                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       Medigreen Admin Panel
                    </div>
                </nav>
            </div>