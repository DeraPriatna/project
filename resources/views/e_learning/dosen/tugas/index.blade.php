@extends('e_learning.dosen.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-1"></div>

    <div class="col-lg-10">
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
                <h1 class="display-5 font-weight-semibold line-height-1 mb-2">Belum ada tugas</h1>
                <h5>Anda dapat memberikan tugas kelas <br>untuk kelas Anda.</h5>
            </div>
            <!-- /error title -->


            <!-- Error content -->
            <div class="text-center">
                <a href="/dosen/t/{{$kelas->id}}/tugas/create" class="btn btn-primary"><i class="icon-file-plus mr-2"></i> Buat Tugas</a>
            </div>
            <!-- /error wrapper -->

        </div>
        @else
        <div class="d-flex">
            <div class="btn-group position-static">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-file-plus mr-2"></i> Buat</button>
                <div class="dropdown-menu dropdown-menu-right" style="">
                    <a href="/dosen/t/{{$kelas->id}}/tugas/create" class="dropdown-item"><i class="icon-clipboard6"></i> Tugas</a>
                    <?php $uts = 0 ?>
                    @foreach($items->where('status','1') as $item)
                        <?php $uts = $uts + 1 ?>
                    @endforeach
                    <a href="/dosen/t/{{$kelas->id}}/uts/create" class="dropdown-item @if($uts == 1) disabled @endif"><i class="icon-clipboard6"></i> UTS</a>
                    <?php $uas = 0 ?>
                    @foreach($items->where('status','2') as $item)
                        <?php $uas = $uas + 1 ?>
                    @endforeach
                    <a href="/dosen/t/{{$kelas->id}}/uas/create" class="dropdown-item @if($uas == 1 || $uts == 0) disabled @endif"><i class="icon-clipboard6"></i> UAS</a>
                </div>
            </div>
            <div class="d-inline-flex align-items-center ml-auto">
                <span class="badge badge-primary badge-striped badge-striped-right border-right-yellow font-weight-semibold">{{$kelas->matkul->matkul}}</span>
            </div>
        </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-lg-1"></div>
    
    <div class="col-lg-10 pt-3">
        <div class="accordion-sortable" id="accordion-controls">
            @foreach($items as $item)
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">
                        <i class="icon-clipboard6 text-primary icon-2x mr-3"></i>
                        <a class="text-body collapsed" data-toggle="collapse" href="#accordion-controls-group{{$item->id}}" aria-expanded="false">{{$item->judul}}</a>
                    </h6>

                    <div class="header-elements">
                        <div class="list-icons">
                            <span class="font-size-sm text-muted">Diposting {{$item->created_at}}</span>
                            <a class="list-icons-item" data-action="fullscreen"></a>
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-more2"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="/dosen/t/{{$kelas->id}}/tugas/edit/{{$item->id}}" class="dropdown-item"><i class="icon-pencil3"></i> Edit</a>
                                    <a href="/dosen/t/{{$kelas->id}}/tugas/{{$item->id}}/view" class="dropdown-item"><i class="icon-file-check"></i> Tugas Diserahkan</a>
                                    <a href="/dosen/tugas/delete/{{$item->id}}" class="dropdown-item" onclick="return confirm('Hapus tugas?')"><i class="icon-trash-alt"></i> Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="accordion-controls-group{{$item->id}}" class="collapse" data-parent="#accordion-controls" style="">
                    <div class="card-body">
                        <span class="font-size-sm text-danger">Tenggat: {{$item->tenggat}} </span><br>
                        @if($item->petunjuk != null)
                            {{$item->petunjuk}} <br>
                        @endif
                        <br>
                        <iframe width="100%" height="460" src="/storage/tugas/{{$item->file}}" frameborder="1"></iframe>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>	
@endsection