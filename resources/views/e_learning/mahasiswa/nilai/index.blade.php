@extends('e_learning.mahasiswa.layouts.master')

@section('content')    
<div class="row">
    <div class="col-lg-2"></div>

    <div class="col-lg-8">

        <div class="card">
            <div class="card-header d-flex py-0">
                <h6 class="card-title font-weight-semibold py-3">Data Nilai</h6>
                <div class="d-inline-flex align-items-center ml-auto">
                    <span class="badge badge-white badge-striped badge-striped-right border-right-secondary font-weight-semibold">{{$kelas->matkul->matkul}}</span>
                </div>
            </div>
        
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="bg-primary text-white text-center">
                            <th>No</th>
                            <th>Tugas</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @foreach($tugas as $tgs)
                            <tr class="text-center">
                                <td>{{$no++}}</td>
                                <td>{{$tgs->judul}}</td>
                                <td>
                                    @foreach($d_tugas->where('tugas_id',$tgs->id)->where('mahasiswa_id',Auth::guard('mahasiswa')->user()->id) as $d_tgs)
                                        {{$d_tgs->nilai}}
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count($tugas) == 0)
                    <div class="flex-fill mb-4">

                        <!-- Error title -->
                        <div class="text-center mb-4">
                            <img src="../../../../global_assets/images/error_bg.svg" class="mt-3 mb-3" alt="" height="115px">
							<h4 class="font-weight-semibold line-height-1 mb-2">Belum ada nilai</h4>
                            <p>Di sinilah data nilai Anda <br>akan ditampilkan.</p>
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
    </div>
</div>	
@endsection