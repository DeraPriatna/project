@extends('e_learning.mahasiswa.layouts.master')

@section('content')
<div class="row">
    
    @if(count($absensi) == 0)
    <div class="col-xl-4">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3">
                    <a href=""><i class="icon-list-ordered text-primary icon-2x mt-1"></i></a>
                </div>

                <div class="media-body">
                    <h6 class="media-title font-weight-semibold"><a href="" class="text-body">Belum ada absensi</a></h6>
                    Tidak ada absensi untuk diisi.. <br>
                    Absensi akan ditampilkan apabila Dosen telah memulai absensi.
                </div>
            </div>
        </div>
    </div>
    @else
        @foreach($absensi as $abs)
        <div class="col-xl-4">
            <div class="card card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href=""><i class="icon-list-ordered text-primary icon-2x mt-1"></i></a>
                    </div>

                    <div class="media-body">
                        <h6 class="media-title font-weight-semibold">Pertemuan {{$abs->pertemuan}}</h6>
                        <p>{{$abs->kelas->matkul->matkul}}<br>
                        {{$abs->created_at}}</p>
                        <form action="/mahasiswa/{{$kelas->id}}/absensi/{{$abs->id}}/store" method="POST">
                            @csrf
                            <div class="border px-3 pt-2 pb-0 rounded">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="custom-control custom-control-success custom-radio mb-2">
                                            <input type="radio" class="custom-control-input" name="ket" value="Hadir" checked="">
                                            <span class="custom-control-label">Hadir</span>
                                        </label>

                                        <label class="custom-control custom-control-danger custom-radio mb-2">
                                            <input type="radio" class="custom-control-input" name="ket" value="Izin">
                                            <span class="custom-control-label">Izin</span>
                                        </label>

                                        <label class="custom-control custom-control-danger custom-radio mb-2">
                                            <input type="radio" class="custom-control-input" name="ket" value="Sakit">
                                            <span class="custom-control-label">Sakit</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @foreach($d_absensi->where('absensi_id',$abs->id) as $d_abs)
                                @if($d_abs->ket == 'x')
                                <div class="pt-2">
                                    <button type="submit" class="btn btn-secondary btn-sm">Kirim Absensi <i class="icon-paperplane ml-1"></i></button>
                                </div>
                                @else
                                <div class="pt-2">
                                    <button type="submit" disabled class="btn btn-secondary btn-sm">Absensi Terkirim<i class="icon-paperplane ml-1"></i></button>
                                </div>
                                @endif
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif

    <div class="col-xl-8">

        @if(Session::has('success'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
			{{Session::get('success')}}
		</div>
		@endif

        <!-- Annual sales report -->
        <div class="card">
            <div class="card-header d-flex py-0">
                <h6 class="card-title font-weight-semibold py-3">Absensi Saya</h6>
                <div class="d-inline-flex align-items-center ml-auto">
                    <span class="badge badge-white badge-striped badge-striped-right border-right-secondary font-weight-semibold">{{$kelas->matkul->matkul}}</span>
                </div>
            </div>
        
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="bg-primary text-white text-center">
                            <th>Pertemuan</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($d_absensi as $d_abs)
                        <tr class="text-center">
                            <td>{{$d_abs->absensi->pertemuan}}</td>
                            <td>{{$d_abs->created_at}}</td>
                            <td>@if($d_abs->ket != 'x') {{$d_abs->ket}} @endif</td>
                            <td>@if($d_abs->ket != 'x') {{$d_abs->updated_at}} @endif</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count($d_absensi) == 0)
                    <div class="flex-fill mb-4">

                        <!-- Error title -->
                        <div class="text-center mb-4">
                            <img src="../../../../global_assets/images/error_bg.svg" class="mt-3 mb-3" alt="" height="115px">
							<h4 class="font-weight-semibold line-height-1 mb-2">Belum ada pertemuan</h4>
                            <p>Di sinilah data absensi Anda <br>akan ditampilkan.</p>
                        </div>
                        <!-- /error title -->


                        <!-- Error content -->
                        <div class="text-center">
                            
                        </div>
                        <!-- /error wrapper -->

                    </div>
                @endif
            </div>
        </div>
        <!-- /annual sales report -->

    </div>
</div>
@endsection