<div class="navbar navbar-expand-lg navbar-dark bg-indigo navbar-static shadow-none">

    <div class="navbar-brand text-center text-lg-left">
        <a href="" class="d-inline-block">
            <img src="{{asset('global_assets/images/e_learning.png')}}" class="d-none d-sm-block" alt="">
            <img src="{{asset('global_assets/images/e_learning2.png')}}" class="d-sm-none" alt="">
        </a>
    </div>

    <div class="collapse navbar-collapse order-2 order-lg-1" id="navbar_search">
        <div class="navbar-search d-flex align-items-center py-3 py-lg-0">
            
        </div>
    </div>

    <div class="order-1 order-lg-2 d-flex flex-1 flex-lg-0 justify-content-end align-items-center">

        <ul class="navbar-nav flex-row align-items-center h-100">

            <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
                <a href="#" class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100" data-toggle="dropdown">
                    <span class="d-none d-lg-inline-block ml-2">
                        {{ Auth::guard('web')->user()->name }}
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right py-2">
                    <a href="{{ route('admin.password.edit') }}" class="dropdown-item d-flex py-2">
                        <div class="flex-1">
                            <div class="font-weight-semibold">Edit Password</div>
                        </div>
                        <span class="btn btn-dark-100 btn-icon btn-sm text-body border-transparent rounded-pill ml-1">
                            <i class="icon-lock2"></i>
                        </span>
                    </a>

                    <a href="{{ route('admin.logout') }}" class="dropdown-item d-flex py-2">
                        <div class="flex-1">
                            <div class="font-weight-semibold">Sign out</div>
                        </div>
                        <span class="btn btn-dark-100 btn-icon btn-sm text-body border-transparent rounded-pill ml-1">
                            <i class="icon-exit2"></i>
                        </span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>