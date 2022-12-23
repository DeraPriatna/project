<div class="sidebar sidebar-light sidebar-main sidebar-expand-lg align-self-start">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Header -->
        <div class="sidebar-section sidebar-header">
            <div class="sidebar-section-body d-flex align-items-center justify-content-center pb-0">
                <h6 class="sidebar-resize-hide flex-1 mb-0">Navigasi</h6>
                <div>
                    <button type="button" class="btn btn-outline-light text-body border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="icon-transmission"></i>
                    </button>

                    <button type="button" class="btn btn-outline-light text-body border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                        <i class="icon-cross2"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /header -->


        <!-- User menu -->
        <div class="sidebar-section sidebar-user">
            <div class="sidebar-section-body d-flex justify-content-center">
                <a href="">
                    <img src="{{asset('global_assets/images/logo.jpeg')}}" alt="">
                </a>

                <div class="sidebar-resize-hide flex-1 ml-3">
                    <div class="font-weight-semibold">{{ Auth::guard('web')->user()->name }}</div>
                    <div class="font-size-sm line-height-sm text-muted">
                    Admin
                    </div>
                </div>
            </div>
        </div>					
        <!-- /user menu -->

        
        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link {{(request()->route()->getName()=='admin.home')?'active':''}}">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user') }}" class="nav-link ">
                        <i class="icon-users2"></i>
                        <span>
                            User
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.mahasiswa') }}" class="nav-link">
                        <i class="icon-vcard"></i>
                        <span>
                            Mahasiswa
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dosen') }}" class="nav-link">
                        <i class="icon-user-tie"></i>
                        <span>
                            Dosen
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.matkul') }}" class="nav-link">
                        <i class="icon-book"></i>
                        <span>
                            Mata Kuliah
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.kelas') }}" class="nav-link">
                        <i class="icon-reading"></i>
                        <span>
                            Kelas
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.arsip') }}" class="nav-link">
                        <i class="icon-archive"></i>
                        <span>
                            Arsip Kelas
                        </span>
                    </a>
                </li>
                <!-- /main -->
                    
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
    
</div>