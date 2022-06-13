<div class="navbar navbar-expand-xl navbar-dark bg-indigo navbar-static px-0">
    <div class="d-flex flex-1 pl-3">
        <div class="navbar-brand wmin-0 mr-1">
            <a href="index.html" class="d-inline-block">
                <img src="{{asset('global_assets/images/logo_light.png')}}" class="d-none d-sm-block" alt="">
                <img src="{{asset('global_assets/images/logo_icon_light.png')}}" class="d-sm-none" alt="">
            </a>
        </div>
    </div>

    <div class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-light-100 border-top-xl-0 order-1 order-xl-0">
        <ul class="navbar-nav flex-row text-nowrap mx-auto">
            <li class="nav-item">
                <a href="/dosen/{{$kelas->id}}/forum" class="navbar-nav-link active">
                    <i class="icon-collaboration mr-2"></i>
                    Forum
                </a>
            </li>
      
            <li class="nav-item">
                <a href="/dosen/{{$kelas->id}}/absensi" class="navbar-nav-link">
                    <i class="icon-list-ordered mr-2"></i>
                    Absensi
                </a>
            </li>
        
            <li class="nav-item">
                <a href="/dosen/{{$kelas->id}}/materi" class="navbar-nav-link">
                    <i class="icon-stack-text mr-2"></i>
                    Materi
                </a>
            </li>
        
            <li class="nav-item">
                <a href="/dosen/{{$kelas->id}}/tugas" class="navbar-nav-link">
                    <i class="icon-clipboard3 mr-2"></i>
                    Tugas
                </a>
            </li>

            <li class="nav-item">
                <a href="/dosen/{{$kelas->id}}/tugas" class="navbar-nav-link">
                    <i class="icon-clippy mr-2"></i>
                    Nilai
                </a>
            </li>
        
            <li class="nav-item">
                <a href="{{route('dosen.home')}}" class="navbar-nav-link">
                    <i class="icon-home4 mr-2"></i>
                    Kelas
                </a>
            </li>
        </ul>
    </div>

    <div class="d-flex flex-xl-1 justify-content-xl-end order-0 order-xl-1 pr-3">
        <ul class="navbar-nav flex-row">
    
            <li class="nav-item nav-item-dropdown-xl dropdown dropdown-user h-100">
                <a href="#" class="navbar-nav-link navbar-nav-link-toggler d-flex align-items-center h-100 dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle mr-xl-2" height="38" alt="">
                    <span class="d-none d-xl-block">{{Auth::guard('dosen')->user()->nm_dsn}}</span>
                </a>
    
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</div>