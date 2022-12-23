@extends('e_learning.dosen.layouts.master')

@section('content')
<div class="card card-body bg-primary text-white" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png);">
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
					Hari / Waktu : <br>
					{{$kelas->hari}}, {{$kelas->waktu}}<br>
					Tahun Akademik {{$kelas->thn_akademik}}
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-xl-9">

		<div class="card">
			<div class="card-header">
				<div class="d-flex py-0">
					<h5 class="card-title">{{$forum->judul}}</h5>
					
					<div class="d-inline-flex align-items-center ml-auto">
						<a href="/dosen/f/{{$kelas->id}}/forum" class="text-body">
							<i class="icon-cross"></i>
						</a>
					</div>
				</div>
				
				<li class="media">
					<i class="icon-reading text-primary icon-2x mr-3 mt-1"></i>
					<div class="media-body">
						<ul class="media-title list-inline list-inline-dotted">
							<li class="list-inline-item"><a class="font-weight-semibold">@if($forum->dosen_id == 0) {{$forum->mahasiswa->nm_mhs}} @else {{$forum->dosen->nm_dsn}} @endif</a></li>
							<li class="list-inline-item"><span class="font-size-sm text-muted">{{$forum->created_at->diffForHumans()}}</span></li>
						</ul>
						{{$forum->konten}}	
					</div>
				</li>
				<li class="media text-muted"><i class="icon-bubbles5 mr-2 mt-1"></i> Komentar kelas</li>
			</div>

			<div class="card-body">
				<div class="media-chat-scrollable mb-3">
					<ul class="media-list">
						@foreach($forum->komentar as $item)
						<li class="media">
							<div class="media-body">
								<ul class="media-title list-inline list-inline-dotted">
									<li class="list-inline-item"><a class="font-weight-semibold">@if($item->dosen_id == 0) {{$item->mahasiswa->nm_mhs}} @else {{$item->dosen->nm_dsn}} @endif</a></li>
									<li class="list-inline-item"><span class="font-size-sm text-muted">{{$item->created_at->diffForHumans()}}</span></li>
								</ul>
								{{$item->konten}}
							</div>
						</li>
						@endforeach
					</ul>
				</div>

				<form action="" method="POST">
					@csrf
					<textarea name="konten" class="form-control mb-3 @error('konten') is-invalid @enderror" rows="3" placeholder="Tambahkan komentar kelas..."></textarea>
					@error('konten')
						<label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
					@enderror
					<input type="hidden" name="forum_id" value="{{$forum->id}}">

					<div class="d-flex align-items-center">
						<button type="submit" class="btn btn-secondary btn-labeled btn-labeled-right ml-auto"><b><i class="icon-paperplane"></i></b> Kirim</button>
					</div>
				</form>
			</div>
		</div>	

	</div>
</div>	
@endsection