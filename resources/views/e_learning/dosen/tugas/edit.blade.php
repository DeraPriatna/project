@extends('e_learning.dosen.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-2"></div>
    
    <div class="col-lg-8 pt-1">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Tugas</h5>
            </div>

            <div class="card-body">
                <form action="/dosen/{{$kelas->id}}/tugas/update/{{$item->id}}" method="POST" enctype="multipart/form-data">
                    @csrf                   
                    <div class="form-group form-group-floating row">
                        <i class="icon-pen6 icon-m pt-2 col-lg-2"></i>
                        <div class="col-lg-10">
                            <div class="form-group-feedback form-group-feedback-right">
                                <input type="text" name="judul" class="form-control form-control-outline @error('judul') is-invalid @enderror" autocomplete="off" placeholder="" value="{{$item->judul}}">
                                <label class="label-floating">Judul</label>
                            </div>
                            @error('judul')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group form-group-floating row">
                        <i class="icon-paragraph-left3 icon-m pt-2 col-lg-2"></i>
                        <div class="col-lg-10">
                            <div class="position-relative">
                                <textarea class="form-control form-control-outline" name="petunjuk" autocomplete="off" placeholder="">{{$item->petunjuk}}</textarea>
                                <label class="label-floating">Petunjuk (opsional)</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-floating row">
                        <i class="icon-file-pdf icon-m pt-2 col-lg-2"></i>
                        <div class="col-lg-10">
                            <iframe width="240" src="/storage/tugas/{{$item->file}}" frameborder="1"></iframe>
                            <br>{{$item->file}}
                        </div>
                    </div>
					
                    <div class="form-group form-group-floating row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <div class="form-group-feedback form-group-feedback-right">
                                <input type="file" name="file" class="form-control form-control-outline @error('file') is-invalid @enderror" autocomplete="off" placeholder="" value="{{old('file')}}">
                                <label class="label-floating">File (PDF)</label>
                            </div>
                            @error('file')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-secondary">Update <i class="icon-loop3 ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>	
@endsection