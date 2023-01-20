@extends('e_learning.dosen.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3">
                    <a href=""><i class="icon-clipboard3 text-primary icon-2x mt-1"></i></a>
                </div>

                <div class="media-body">
                    <h6 class="media-title font-weight-semibold">{{$d_tugas->mahasiswa->nm_mhs}}, <span class="font-size-sm">{{$d_tugas->mahasiswa->nim}}</span></h6>
                    <p>Diserahkan {{$d_tugas->created_at}}</p>
                    
                    <form action="/dosen/{{$kelas->id}}/tugas/{{$tugas->id}}/view/{{$d_tugas->id}}/nilai" method="POST">
                        @csrf
                        <div class="form-group form-group-floating row">
                            <div class="col-lg-10">
                                <div class="form-group-feedback form-group-feedback-right">
                                    <input type="text" name="nilai" class="form-control form-control-outline @error('nilai') is-invalid @enderror" autofocus value="{{$d_tugas->nilai}}">
                                    <label class="label-floating">Nilai /100</label>
                                </div>
                                @error('nilai')
                                    <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                                @enderror
                            </div>
                        </div> 
                        
                        <button type="submit" class="btn btn-secondary btn-sm">Update Nilai <i class="icon-clippy ml-1"></i></button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">{{$d_tugas->file}}</h6>
                <div class="header-elements">
                    <a class="list-icons-item" data-action="fullscreen"></a>
                </div>
            </div>

            <div class="card-body">
                <iframe width="100%" height="500" src="/storage/detail_tugas/{{$d_tugas->file}}" frameborder="1"></iframe>
            </div>
        </div>  
    </div>
</div>	
@endsection