@extends('e_learning.mahasiswa.layouts.master')

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
					{{$kelas->hari}}, {{$kelas->waktu}} <br>
					Tahun Akademik {{$kelas->thn_akademik}}
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-xl-9">
		
		@if(Session::has('success'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
			{{Session::get('success')}}
		</div>
		@endif

		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Forum Diskusi</h5>
				<div class="header-elements">
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_buat_forum">Buat <i class="icon-reading ml-1"></i></button>
				</div>
			</div>

			<div class="table-responsive">
				<table class="table text-nowrap">
					<tbody>
						@if(count($items) == 0)
							<div class="flex-fill">

								<!-- Error title -->
								<div class="text-center mb-4">
									<img src="../../../../global_assets/images/error_bg.svg" class="mt-3 mb-4" alt="" height="120px">
									<h1 class="display-5 font-weight-semibold line-height-1 mb-2">Belum ada forum</h1>
									<p>Gunakan forum untuk membuat pertanyaan <br>dan berdiskusi dengan anggota kelas.</p>
								</div>
								<!-- /error title -->


								<!-- Error content -->
								<div class="text-center">
									
								</div>
								<!-- /error wrapper -->

							</div>
						@endif

						@foreach($items as $item)
						<tr>
							<td>
								<div class="py-1">
									<ul class="media-list">
										<li class="media">
											<i class="icon-reading text-primary icon-2x mr-3 mt-1"></i>
											<div class="media-body">
												<ul class="media-title list-inline list-inline-dotted">
													<li class="list-inline-item"><a class="font-weight-semibold">@if($item->dosen_id == 0) {{$item->mahasiswa->nm_mhs}} @else {{$item->dosen->nm_dsn}} @endif</a></li>
													<li class="list-inline-item"><span class="font-size-sm text-muted">{{$item->created_at->diffForHumans()}}</span></li>
												</ul>
												<a href="/mahasiswa/f/{{$kelas->id}}/forum/{{$item->id}}/view" style="color: #333">{{$item->judul}}</a>
											</div>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>	

	</div>
</div>

<!-- Small modal -->
<div id="modal_buat_forum" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Forum</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="/mahasiswa/{{$kelas->id}}/forum/store" class="form-horizontal" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul</label>
						<input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" autofocus autocomplete="off" value="{{old('judul')}}">
						@error('judul')
							<label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
						@enderror
                    </div>
					<div class="form-group">
                        <label>Konten</label>
						<textarea name="konten" class="form-control @error('konten') is-invalid @enderror" rows="3">{{old('konten')}}</textarea>
						@error('konten')
							<label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
						@enderror
                    </div>
                </div>
                
                <div class="modal-footer mr-1">
                    <button type="submit" class="btn btn-secondary btn-sm">Buat Forum <i class="icon-reading ml-1"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /small modal -->
@endsection