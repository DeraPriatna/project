@extends('e_learning.dosen.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-2"></div>

    <div class="col-lg-8">     
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            {{Session::get('success')}}
        </div>
        @endif

        @if(count($items) == 0)
        <div class="flex-fill">

            <!-- Error title -->
            <div class="text-center mb-4">
                <img src="../../../../global_assets/images/error_bg.svg" class="img-fluid mb-4" alt="" height="230">
                <h1 class="display-5 font-weight-semibold line-height-1 mb-2">Belum ada materi</h1>
                <h5>Anda dapat menambahkan materi pembelajaran <br>untuk kelas Anda.</h5>
            </div>
            <!-- /error title -->


            <!-- Error content -->
            <div class="text-center">
                <a href="/dosen/m/{{$kelas->id}}/materi/create" class="btn btn-primary"><i class="icon-file-plus mr-2"></i> Buat Materi</a>
            </div>
            <!-- /error wrapper -->

        </div>
        @else
        <div class="d-flex">
            <a href="/dosen/m/{{$kelas->id}}/materi/create" class="btn btn-primary">
                <i class="icon-file-plus mr-2"></i> Buat
            </a>
            <div class="d-inline-flex align-items-center ml-auto">
                <span class="badge badge-primary badge-striped badge-striped-right border-right-yellow font-weight-semibold">{{$kelas->matkul->matkul}}</span>
            </div>
        </div>
        @endif
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
                            <span class="font-size-sm text-muted">Diposting {{$item->created_at}}</span>
                            <a class="list-icons-item" data-action="fullscreen"></a>
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-more2"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="/dosen/m/{{$kelas->id}}/materi/edit/{{$item->id}}" class="dropdown-item"><i class="icon-pencil3"></i> Edit</a>
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