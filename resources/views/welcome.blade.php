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
						<span class="d-none d-xl-block">Login</span>
					</a>
		
					<div class="dropdown-menu dropdown-menu-right">
						<a href="/dosen/login" class="dropdown-item"><i class="icon-user-tie"></i> Dosen</a>
						<div class="dropdown-divider"></div>
						<a href="/mahasiswa/login" class="dropdown-item"><i class="icon-vcard"></i> Mahasiswa</a>
                        <div class="dropdown-divider"></div>
						<a href="/admin/login" class="dropdown-item"><i class="icon-users2"></i> Admin</a>
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
						
                        <div class="card">
                            <div class="card-body">
                                <div class="card-img-actions mb-3">
                                    <img class="card-img img-fluid" src="{{asset('global_assets/images/placeholders/logo.png')}}" alt="">
                                    <div class="card-img-actions-overlay card-img">
                                        <a class="btn btn-outline-white border-2 btn-icon rounded-pill">
                                            <i class="icon-reading"></i>
                                        </a>
                                    </div>
                                </div>

                                <h6 class="mb-3">
                                    <i class="icon-comment-discussion mr-2"></i>
                                    Selamat datang di <a href=""><i>E-Learning</i> </a>STMIK Dharma Negara Bandung
                                </h6>

                                <blockquote class="blockquote blockquote-bordered py-2 pl-3 mb-0">
                                    <p class="mb-2 font-size-base"><i>" </i>Perkembangan teknologi informasi telah memberikan dampak yang cukup besar dalam dunia pendidikan salah satunya internet yang dapat digunakan sebagai sarana belajar dan telah melahirkan konsep <i>e-learning</i>. <i>E-learning</i> merupakan salah satu metode dalam pendidikan yang memanfaatkan fasilitas internet sebagai sarana dan media dalam pembelajaran.<i> "</i></p>
                                </blockquote>
                            </div>

                            <div class="card-footer bg-transparent d-sm-flex justify-content-sm-between align-items-sm-center border-top-0 pt-0 pb-3">
                                <ul class="list-inline mb-0">
                                    <h5>Manfaat <i>E-Learning</i></h5>
                                    <p>Dampak dan manfaat <i>e-learning</I> dapat dirasakan oleh banyak pihak. Terlebih lagi bagi institusi. Di antaranya adalah memberikan kemudahan bagi para peserta pelatihan dalam mendapatkan materi yang optimal. Sementara bagi para pengelola pembelajaran, manfaat e-learning dapat memantau perkembangan peserta dengan mudah dan cepat.</p>
                                    <br><b>1. Menunjang proses pembelajaran</b>
                                    <br>Peserta pelatihan dapat mengakses materi <i>e-learning</i> dengan mudah, semua materi yang dibagikan tersebut berbentuk digital. Hal ini akan memberikan dampak yang sangat positif bagi para peserta. Mereka bisa mengakses materi dengan mudah, di mana saja dan kapan saja dan memilih materi yang sesuai dengan minat dan kebutuhan masing-masing individu.
                                    <br><b>2. Waktu belajar yang lebih fleksibel</b>
                                    <br>Para peserta pelatihan juga seringkali kesulitan dalam menentukan waktu belajar yang tepat. Terlebih jika mereka harus memilah-milah materi apa yang harus dipelajari dengan cara konvensional. Dengan adanya <i>e-learning</i>, maka peserta dapat dengan fleksibel menentukan waktu belajar mereka. Sebab, metode <i>e-learning</i> dilengkapi dengan berbagai ragam fitur yang bisa digunakan.
                                    <br><b>3. Dapat memonitor performa</b>
                                    <br>Bagi para pengajar, keberadaan <i>e-learning</i> juga bisa digunakan dalam melacak atau memonitor perkembangan peserta pelatihan. Khususnya dalam pencapaian terhadap materi yang diberikan. Di sini baik para pengajar maupun pengelola pembelajaran dapat menemukan sebuah solusi bersama terjadi masalah dalam proses belajar mengajar. 
                                    <br><b>4. Menghemat biaya pembelajaran</b>
                                    <br>Manfaat terakhir yang bisa didapatkan ketika menggunakan <i>e-learning</i> adalah menghemat dari segi biaya. Bagi institusi, manfaat yang bisa dirasakan adalah dapat mengurangi biaya pelatihan. Sebab semuanya dilakukan secara <i>online</i> sehingga dapat meminimalisir biaya tambahan lainnya yang diperlukan seperti layaknya kelas konvensional. Contohnya seperti biaya sewa ruang kelas, akomodasi maupun mencetak materi pembelajaran, karena semua  materi tersedia dalam bentuk digital.
                                    <br><br>
                                    <p>Dari ulasan di atas dapat disimpulkan bahwa:</p>
                                    <blockquote class="blockquote blockquote-bordered py-2 pl-3 mb-0">
                                        <p class="mb-2 font-size-bold"><i>" E-learning</i> dapat memberikan manfaat terbaik bagi para peserta maupun para pengajar.<i> "</i></p>
                                    </blockquote>
                                </ul>
                            </div>
                        </div>
					
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
