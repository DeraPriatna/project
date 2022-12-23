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

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content container header-elements-md-inline">
						<div class="d-flex">
							<div class="page-title">
								<h4 class="font-weight-semibold"><i>E-Learning</i></h4>
								<div class="text-muted">STMIK Dharma Negara</div>
							</div>
							
						</div>

						<div class="header-elements d-none py-0 mb-3 mb-md-0">
						
						</div>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content container pt-0">
					
					<!-- Blocks with chart -->
					<div class="row">
						
						@foreach($items as $item)
						<div class="col-lg-4">

							<!-- Current server load -->
							<div class="card bg-primary text-white" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
								<div class="card-body">
									<div class="d-flex">
										<h5 class="font-weight-semibold mb-0"><a href="/mahasiswa/f/{{$item->kelas->id}}/forum" style="color: #fff">{{$item->kelas->matkul->matkul}}</a></h5>
									</div>

									<div>
										<div class="media">
											<div class="mr-3">
												<i class="icon-laptop text-white icon-2x mt-2"></i>
											</div>
											<div class="media-body">
												<h4 class="font-weight-bold mb-0">Semester {{$item->kelas->matkul->semester}} <small class="text-white font-size-sm ml-2">{{$item->kelas->matkul->sks}} SKS</small></h4>
												Hari/Waktu : {{$item->kelas->hari.', '.$item->kelas->waktu}} <br>
												Tahun Akademik {{$item->kelas->thn_akademik}}
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer text-center">
									<span><i>Teknik Informatika</i></span>
								</div>
							</div>
							<!-- /current server load -->

						</div>
						@endforeach
					
					</div>
					<!-- /blocks with chart -->

				</div>
				<!-- /content area -->


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

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
