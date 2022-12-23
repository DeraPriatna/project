@extends('e_learning.mahasiswa.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-2"></div>
    
    <div class="col-lg-8 pt-1">
        @if(Session::has('success'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
			{{Session::get('success')}}
		</div>
		@endif

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Serahkan Tugas</h5>
            </div>

            <div class="card-body">
                <form action="/mahasiswa/{{$kelas->id}}/tugas/{{$tugas->id}}/store" method="POST" enctype="multipart/form-data">
                    @csrf                   
                    <div class="form-group form-group-floating row">
                        <i class="icon-clipboard3 icon-m pt-2 col-lg-2"></i>
                        <div class="col-lg-10">
                            <div class="form-group-feedback form-group-feedback-right">
                                <input type="text" class="form-control form-control-outline" readonly style="background-color: #fff" value="{{$tugas->judul}}">
                                <label class="label-floating">Tugas</label>
                            </div>
                        </div>
                    </div>

					@if(count($d_tugas) == 0)
                    <div class="form-group form-group-floating row">
                        <i class="icon-file-pdf icon-m pt-2 col-lg-2"></i>
                        <div class="col-lg-10">
                            <div class="form-group-feedback form-group-feedback-right">
                                <input type="file" name="file" class="form-control form-control-outline @error('file') is-invalid @enderror" autocomplete="off" value="{{old('file')}}">
                                <label class="label-floating">File (PDF)</label>
                            </div>
                            @error('file')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-secondary">Serahkan <i class="icon-file-upload ml-2"></i></button>
                    </div>
                    @else
                        @foreach($d_tugas as $d_tugas)
                        <div class="form-group form-group-floating row">
                            <i class="icon-file-pdf icon-m pt-2 col-lg-2"></i>
                            <div class="col-lg-10">
                                <iframe width="240" src="/storage/detail_tugas/{{$d_tugas->file}}" frameborder="1"></iframe>
                                <br>{{$d_tugas->file}}
                            </div>
                        </div>

                        <div class="text-right">
                            <button disabled class="btn btn-light">Tugas Diserahkan <i class="icon-file-check ml-1"></i></button>
                        </div>
                        @endforeach
                    @endif

                    
                        
                </form>
            </div>
        </div>
    </div>
</div>	
@endsection