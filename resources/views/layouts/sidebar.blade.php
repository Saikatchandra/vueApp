  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <router-link to="/" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </router-link>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                       
                    </ul> --}}
                </li>
                <li class="nav-item">
                    <router-link to="/categoryList" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Category
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/subCategoryList" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Sub-Category
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/contentList" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Content
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/userList" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            User
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/roleList" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Role
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </router-link>
                </li>
              
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Layout Options
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation + Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/boxed.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Boxed</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Sidebar</p>
                            </a>
                        </li>
                        
                    </ul>
                </li> --}}

                <li class="nav-item">
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="nav-link">
                      <i class="nav-icon fas fa-power-off"></i>
                      <p>
                        
                           Logout
                      

                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                       </form>
                      </p>
                  </a>
              </li>
              
              
              
              
                
            
               

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
