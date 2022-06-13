@extends('e_learning.dosen.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-2"></div>

    <div class="col-lg-8">     
        @if(Session::has('success'))
        <div class="alert alert-primary alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            <span class="font-weight-semibold">Berhasil!</span> {{Session::get('success')}}
        </div>
        @endif

        <a href="/dosen/{{$kelas->id}}/materi/create" class="btn btn-primary btn-lg">
            <i class="icon-file-plus mr-1"></i> Tambah
        </a>
    </div>
</div>
    
<div class="row">
    <div class="col-lg-2"></div>

    <div class="col-lg-8 pt-3">
        <div class="accordion-sortable" id="accordion-controls">
            @foreach($items as $item)
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">
                        <i class="icon-stack-text text-primary icon-2x mr-3"></i>
                        <a class="text-body collapsed" data-toggle="collapse" href="#accordion-controls-group{{$item->id}}" aria-expanded="false">{{$item->judul}}</a>
                    </h6>

                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="fullscreen"></a>
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-more2"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="/dosen/{{$kelas->id}}/materi/edit/{{$item->id}}" class="dropdown-item"><i class="icon-pencil3"></i> Edit</a>
                                    <a href="/dosen/materi/delete/{{$item->id}}" class="dropdown-item" onclick="return confirm('Hapus materi?')"><i class="icon-trash-alt"></i> Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="accordion-controls-group{{$item->id}}" class="collapse" data-parent="#accordion-controls" style="">
                    <div class="card-body">
                        {{$item->deskripsi}}
                        <iframe width="100%" height="460" src="/storage/materi/{{$item->file}}" frameborder="1"></iframe>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>	
@endsection