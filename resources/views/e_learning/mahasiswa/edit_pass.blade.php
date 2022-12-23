<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>E-Learning STMIK Dharma Negara</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets_6/css/all.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('global_assets/js/plugins/visualization/echarts/echarts.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/maps/echarts/world.js')}}"></script>

	<script src="{{asset('assets_6/js/app.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard_6/light/area_gradient.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard_6/light/map_europe_effect.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard_6/light/progress_sortable.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard_6/light/bars_grouped.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_charts/pages/dashboard_6/light/line_label_marks.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-xl navbar-dark bg-indigo navbar-static px-0">
		<div class="d-flex flex-1 pl-3">
			<div class="navbar-brand wmin-0 mr-1">
				<a href="index.html" class="d-inline-block">
					<img src="{{asset('global_assets/images/e_learning.png')}}" class="d-none d-sm-block" alt="">
					<img src="{{asset('global_assets/images/e_learning2.png')}}" class="d-sm-none" alt="">
				</a>
			</div>
		</div>

        <div class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-light-100 border-top-xl-0 order-1 order-xl-0">
        <ul class="navbar-nav flex-row text-nowrap mx-auto">
            <li class="nav-item">
                <a href="{{route('mahasiswa.home')}}" class="navbar-nav-link">
                    <i class="icon-home4 mr-2"></i>
                    Kelas
                </a>
            </li>
        </ul>
    </div>

		<div class="d-flex flex-xl-1 justify-content-xl-end order-0 order-xl-1 pr-3">
			<ul class="navbar-nav flex-row">
		
				<li class="nav-item nav-item-dropdown-xl dropdown dropdown-user h-100">
					<a href="" class="navbar-nav-link navbar-nav-link-toggler d-flex align-items-center h-100 dropdown-toggle" data-toggle="dropdown">
						<span class="d-none d-xl-block">{{Auth::guard('mahasiswa')->user()->nm_mhs}}</span>
					</a>
		
					<div class="dropdown-menu dropdown-menu-right">
						<a href="/mahasiswa/password/edit" class="dropdown-item"><i class="icon-lock2"></i> Edit Password</a>
						<div class="dropdown-divider"></div>
						<a href="{{ route('mahasiswa.logout') }}" class="dropdown-item"><i class="icon-exit2"></i> Sign out</a>	
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
	
	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

		        <!-- Content area -->
				<div class="content">

                    <div class="row">
                        <div class="col-lg-3"></div>
                        
                        <div class="col-lg-6 pt-1">
                            @if(Session::has('success'))
                            <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold">Berhasil!</span> {{Session::get('success')}}
                            </div>
                            @endif
                            
                            @if(Session::has('error'))
                            <div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold">Gagal!</span> {{Session::get('error')}}
                            </div>
                            @endif
                            
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Edit Password</h5>
                                </div>

                                <div class="card-body">
                                    <form action="/mahasiswa/password/update" method="POST">
                                        @csrf                   
                                        <div class="form-group form-group-floating row">
                                            <i class="icon-lock2 icon-m pt-2 col-lg-2"></i>
                                            <div class="col-lg-10">
                                                <div class="form-group-feedback form-group-feedback-right">
                                                    <input type="password" name="opassword" class="form-control form-control-outline @error('opassword') is-invalid @enderror" autocomplete="off" placeholder="">
                                                    <label class="label-floating">Password Lama</label>
                                                </div>
                                                @error('opassword')
                                                    <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-floating row">
                                            <i class="icon-lock2 icon-m pt-2 col-lg-2"></i>
                                            <div class="col-lg-10">
                                                <div class="form-group-feedback form-group-feedback-right">
                                                    <input type="password" name="npassword" class="form-control form-control-outline @error('npassword') is-invalid @enderror" autocomplete="off" placeholder="">
                                                    <label class="label-floating">Password Baru</label>
                                                </div>
                                                @error('npassword')
                                                    <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-group-floating row">
                                            <i class="icon-lock2 icon-m pt-2 col-lg-2"></i>
                                            <div class="col-lg-10">
                                                <div class="form-group-feedback form-group-feedback-right">
                                                    <input type="password" name="cpassword" class="form-control form-control-outline @error('cpassword') is-invalid @enderror" autocomplete="off" placeholder="">
                                                    <label class="label-floating">Konfirmasi Password</label>
                                                </div>
                                                @error('cpassword')
                                                    <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <button type="submit" class="btn btn-secondary">Update Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
               
		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

     <!-- Footer -->
     <div class="navbar navbar-expand-lg navbar-light">
        <div class="text-center d-lg-none w-100">
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                <i class="icon-unfold mr-2"></i>
                Footer
            </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-footer">
            <span class="navbar-text">
            &copy; 2022. <a><i>E-Learning</i></a> STMIK Dharma Negara Bandung.
            </span>
        </div>
    </div>
    <!-- /footer -->

</body>
</html>