@extends('e_learning.dosen.layouts.master')

@section('content')
<div class="card card-body bg-pink text-white" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png);">
	<div class="media">
		<div class="mr-3 align-self-center">
			<i class="icon-laptop icon-2x "></i>
		</div>
		<div class="media-body text-right">
			<h6 class="media-title font-weight-semibold">{{$kelas->matkul->matkul}}</h6>
			<span class="opacity-75"><i>Teknik Informatika</i></span>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xl-3">
		<div class="card card-body">
			<div class="media">
				<div class="mr-3">
					<a href="#"><i class="icon-info22 text-info icon-2x mt-1"></i></a>
				</div>
				<div class="media-body">
					<h6 class="media-title font-weight-semibold">Semester {{$kelas->matkul->semester}} <small class="font-size-sm ml-2">{{$kelas->matkul->sks}} SKS</small></h6>
					Waktu {{$kelas->waktu}}<br>
					Tahun Akademik {{$kelas->thn_akademik}}
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-xl-9">

		<div class="card card-body">
			<div class="media">
				<div class="mr-3">
					<a href="#"><i class="icon-stack-text text-primary icon-2x mt-1"></i></a>
				</div>

				<div class="media-body pt-1">
					<h6 class="media-title font-weight-semibold"><a href="#" class="text-body">Nutria and rewound</a></h6>
					
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Left annotation position</h5>
			</div>

			<div class="card-body">

				<textarea name="enter-message" class="form-control mb-3" rows="3" cols="1" placeholder="Enter your message..."></textarea>

				<div class="media-chat-scrollable mb-3">
					<ul class="media-list">
						<li class="media text-muted">Saturday, Feb 12</li>

						<li class="media">
							<div class="mr-3"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" alt="" width="40" height="40"></div>
							<div class="media-body">
								<ul class="media-title list-inline list-inline-dotted">
									<li class="list-inline-item"><a href="#" class="font-weight-semibold">Margo Baker</a></li>
									<li class="list-inline-item"><span class="font-size-sm text-muted">2:03 pm</span></li>
								</ul>
								<div class="media-chat-item">Crud reran and while much withdrew ardent much crab hugely met dizzily that more jeez gent equivalent unsafely far one hesitant so therefore.</div>
							</div>
						</li>
					</ul>
				</div>

				

				<div class="d-flex align-items-center">
					<div>
						<a href="#" class="btn btn-light btn-icon rounded-pill btn-sm mr-1" data-popup="tooltip" title="" data-original-title="Send photo"><i class="icon-file-picture"></i></a>
						<a href="#" class="btn btn-light btn-icon rounded-pill btn-sm mr-1" data-popup="tooltip" title="" data-original-title="Send video"><i class="icon-file-video"></i></a>
						<a href="#" class="btn btn-light btn-icon rounded-pill btn-sm mr-1" data-popup="tooltip" title="" data-original-title="Send file"><i class="icon-file-plus"></i></a>
					</div>

					<button type="button" class="btn btn-teal btn-labeled btn-labeled-right ml-auto"><b><i class="icon-paperplane"></i></b> Send</button>
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection