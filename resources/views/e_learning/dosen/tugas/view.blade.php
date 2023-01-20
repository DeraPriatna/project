@extends('e_learning.dosen.layouts.master')

@section('content')
<div class="row">    
    <div class="col-lg-12 pt-1">
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            {{Session::get('success')}}
        </div>
        @endif
        <div class="card">
            <div class="card-header d-flex py-0">
                <h6 class="card-title font-weight-semibold py-3">{{$tugas->judul}} <span class="font-size-sm text-muted">(Tenggat: {{$tugas->tenggat}})</span></h6>
            
                <div class="d-inline-flex align-items-center ml-auto">
                    <span class="badge badge-white badge-striped badge-striped-right border-right-secondary font-weight-semibold">{{$kelas->matkul->matkul}}</span>
                </div>
            </div>

            <div class="table-responsive border-top-0">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>File</th>
                            <th>Diserahkan</th>
                            <th>Nilai</th>
                            <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @foreach($d_tugas as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a class="text-body font-weight-semibold">{{$item->mahasiswa->nm_mhs}}</a>
                                        <div class="text-muted font-size-sm">{{$item->mahasiswa->nim}}</div>
                                    </div>
                                </div>
                            </td>
                            <td><a href="/dosen/t/{{$kelas->id}}/tugas/{{$tugas->id}}/view/{{$item->id}}" data-popup="tooltip" title="" data-placement="top" data-original-title="Lihat Tugas">{{$item->file}}</a></td>
                            <td>{{$item->created_at}}</td>
                            <td>@if($item->nilai == 0) <span class="font-size-sm text-muted">Belum dinilai</span> @else {{$item->nilai}} @endif</td>
                            <td class="text-center">
                                <a href="/dosen/t/{{$kelas->id}}/tugas/{{$tugas->id}}/view/{{$item->id}}" class="icon-file-eye" data-popup="tooltip" title="" data-placement="top" data-original-title="Lihat Tugas"></a>
                                @if($item->nilai != 0)
                                    <a href="/dosen/t/{{$kelas->id}}/tugas/{{$tugas->id}}/view/{{$item->id}}/edit" class="icon-pencil6" data-popup="tooltip" title="" data-placement="top" data-original-title="Edit Nilai"></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
</div>	
@endsection