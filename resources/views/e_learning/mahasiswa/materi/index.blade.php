@extends('e_learning.mahasiswa.layouts.master')

@section('content')    
<div class="row">
    <div class="col-lg-1"></div>

    <div class="col-lg-10">

        @if(count($items) == 0)
        <div class="flex-fill">

            <!-- Error title -->
            <div class="text-center mb-4">
                <img src="../../../../global_assets/images/error_bg.svg" class="img-fluid mb-4" alt="" height="230">
                <h1 class="display-5 font-weight-semibold line-height-1 mb-2">Belum ada materi</h1>
                <h5>Di sinilah materi pembelajaran akan ditampilkan <br>setelah Dosen memposting materi.</h5>
            </div>
            <!-- /error title -->

        </div>
        @else
        <div class="d-flex pb-1">
            <h4 class="font-weight-semibold">Materi</h4>
            <div class="d-inline-flex align-items-center ml-auto">
                <span class="badge badge-primary badge-striped badge-striped-right border-right-yellow font-weight-semibold">{{$kelas->matkul->matkul}}</span>
            </div>
        </div>	
        @endif			
	
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
                        </div>
                    </div>
                </div>

                <div id="accordion-controls-group{{$item->id}}" class="collapse" data-parent="#accordion-controls" style="">
                    <div class="card-body">
                        @if($item->deskripsi != null)
                            {{$item->deskripsi}} <br><br>
                        @endif
                        <iframe width="100%" height="460" src="/storage/materi/{{$item->file}}" frameborder="1"></iframe>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>	
@endsection