@extends('e_learning.dosen.layouts.master')

@section('content')
@foreach($absensi->where('status', '0') as $abs)
<div class="row">
    <div class="col-xl-4">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3">
                    <a><i class="icon-list-ordered text-primary icon-2x mt-1"></i></a>
                </div>

                <div class="media-body">
                    <h6 class="media-title font-weight-semibold"><a class="text-body">@if($abs->pertemuan == 'UTS') Ujian Tengah Semester (UTS) @elseif($abs->pertemuan == 'UAS') Ujian Akhir Semester (UAS) @else Pertemuan {{$abs->pertemuan}} @endif</a></h6>
                    <p>{{$abs->kelas->matkul->matkul}}<br>
                    {{$abs->created_at}}</p>
                    <form action="/dosen/{{$abs->id}}/absensi/update" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="1">
                        <button type="submit" class="btn btn-secondary btn-sm">Tutup Absensi <i class="icon-alarm-check ml-1"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8">

        <!-- Annual sales report -->
        <div class="card">
            <div class="card-header d-flex py-0">
                <h6 class="card-title font-weight-semibold py-3">Daftar Hadir</h6>
                <div class="d-inline-flex align-items-center ml-auto">
                    <span class="badge badge-white badge-striped badge-striped-right border-right-secondary font-weight-semibold">@if($abs->pertemuan == 'UTS') Ujian Tengah Semester (UTS) @elseif($abs->pertemuan == 'UAS') Ujian Akhir Semester (UAS) @else Pertemuan {{$abs->pertemuan}} @endif</span>
                </div>
            </div>
        
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Keterangan</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @foreach($d_absensi->where('absensi_id', $abs->id)->where('ket', '!=', 'x') as $d_abs)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$d_abs->mahasiswa->nim}}</td>
                            <td>{{$d_abs->mahasiswa->nm_mhs}}</td>
                            <td>{{$d_abs->ket}}</td>
                            <td>{{$d_abs->updated_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /annual sales report -->

    </div>
</div>
@endforeach

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex py-0">
                <h6 class="card-title font-weight-semibold py-3">Data Absensi</h6>
            
                <div class="d-inline-flex align-items-center ml-auto">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_buat_absensi">Buat <i class="icon-add-to-list ml-1"></i></button>
                </div>
            </div>

            <div class="card-body py-1">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="d-flex align-items-center justify-content-sm-center"> 
                            <p class="font-weight-semibold mb-0">Keterangan :</p>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="d-flex align-items-center justify-content-sm-center">
                            <span class="text-success mr-3">
                                <i class="icon-checkmark4 top-1"></i>
                            </span>
                            <div>
                                <p class="font-weight-semibold mb-0">Hadir</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="d-flex align-items-center justify-content-sm-center">
                            <span class="text-danger mr-3">
                                <h5 class="font-weight-semibold mb-0">i</h5>
                            </span>
                            <div>
                                <p class="font-weight-semibold mb-0">Izin</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="d-flex align-items-center justify-content-sm-center">
                            <span class="text-danger mr-3">
                                <h5 class="font-weight-semibold mb-1">s</h5>
                            </span>
                            <div>
                                <p class="font-weight-semibold mb-0">Sakit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive border-top-0">
                <table class="table text-nowrap">
                    <thead>
                        <tr class="bg-primary text-white text-center">
                            <th><i>Pertemuan</i></th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>UTS</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>UAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anggota as $agt)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a class="text-body font-weight-semibold">{{$agt->mahasiswa->nm_mhs}}</a>
                                        <div class="text-muted font-size-sm">{{$agt->mahasiswa->nim}}</div>
                                    </div>
                                </div>
                            </td>
                            <?php $no = 1 ?>
                            @foreach($absensi as $abs)
                                @foreach($d_absensi->where('absensi_id', $abs->id)->where('mahasiswa_id', $agt->mahasiswa->id) as $ket)
                                    <td>
                                        @if($ket->ket == 'Hadir') 
                                            <i class="icon-checkmark4 text-success"></i>
                                        @elseif($ket->ket == 'Izin')
                                            <h5 class="text-danger font-weight-semibold">i</h5>
                                        @elseif($ket->ket == 'Sakit') 
                                            <h5 class="text-danger font-weight-semibold">s</h5>
                                        @endif
                                    </td>    
                                @endforeach
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-primary text-white text-center">
                            <th><i>Pertemuan</i></th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>UTS</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>UAS</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Small modal -->
<div id="modal_buat_absensi" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Absensi</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="/dosen/{{$kelas->id}}/absensi/store" class="form-horizontal" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4">Pertemuan ke-</label>
                        <div class="col-sm-8">
                            <?php $pertemuan = 1 ?>
                            @foreach($absensi as $abs)
                                <?php $pertemuan++ ?>
                            @endforeach
                            <input type="text" name="pertemuan" value="@if($pertemuan == 8) UTS @elseif($pertemuan == 16) UAS @elseif($pertemuan > 16) 16 @else {{$pertemuan}} @endif" readonly style="background-color: #fff" class="form-control @error('judul') is-invalid @enderror">
                            @error('pertemuan')
							    <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
						    @enderror
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer mr-1">
                    <button type="submit" @if($pertemuan > 16) disabled @endif class="btn btn-secondary btn-sm">Mulai Absensi <i class="icon-alarm ml-1"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /small modal -->
@endsection